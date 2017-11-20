<?php
if (strstr($_SERVER["PHP_SELF"], "/includes/")) die ("Istighfar, jangan di hack. Makasih :)");
include_once('_connect-db.php');

function sec_session_start() {
    $session_name = 'sec_session_id';
    $secure = false;
    $httponly = true;

    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        echo "Could not initiate a safe session (ini_set)";
        exit();
    }

    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

    session_name($session_name);

    session_start();          
    session_regenerate_id();
}

function login($email, $password) {
    $core = Core::getInstance();
    if ($stmt = $core->dbh->prepare("SELECT id_account, username, password, salt FROM account WHERE email = :email LIMIT 1")) {
        $stmt->bindParam(':email', $email);
        $stmt->execute();  
        $row = $stmt->fetchAll(PDO::FETCH_NUM);
 
        foreach($row as $row){
            $user_id=$row[0];
            $username=$row[1];
            $db_password=$row[2];
            $salt=$row[3];
        }

        $password = hash('sha256', $password . $salt);

        if ($stmt->rowCount() == 1) {
            if (checkbrute($user_id) == true) {
                return false;
            } else {
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];

                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;

                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);

                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha256', $password . $user_browser);

                    // Login successful. 
                    return true;
                } else {
                    // Password is not correct 
                    // We record this attempt in the database 
                    $now = time();
                    if (!$core->dbh->query("INSERT INTO login_attempts(user_id, time) VALUES ('$user_id', '$now')")) {
                        echo "error 1";
                        exit();
                    }

                    return false;
                }
            }
        } else {
            return false;
        }
    } else {
        echo "error 2";
        exit();
    }
}

function checkbrute($user_id) {
    $core = Core::getInstance();
    $now = time();

    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $core->dbh->prepare("SELECT time FROM login_attempts WHERE user_id = id AND time > '$valid_attempts'")) {
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();

        // If there have been more than 5 failed logins 
        if ($stmt->rowCount() > 5) {
            return true;
        } else {
            return false;
        }
    } else {
        echo "error 3";
        exit();
    }
}

function login_check() {
    $core = Core::getInstance();

    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];

        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $core->dbh->prepare("SELECT password FROM account WHERE id_account = :id LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bindParam(':id', $user_id);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                while($row=$stmt->fetch()){
                    $db_password=$row['password'];
                }

                $login_check = hash('sha256', $db_password . $user_browser);

                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            echo "error 4";
            exit();
        }
    } else {
        // Not logged in 
        return false;
    }
}
?>
