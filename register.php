<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
include_once('includes/_connect-db.php');
include_once('includes/_seession-web.php');

sec_session_start();
$core = Core::getInstance();

if (login_check() == true) {
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];

        if ($stmt = $core->dbh->prepare("SELECT role FROM account WHERE id_account = :id LIMIT 1")) {
            $stmt->bindParam(':id', $user_id);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
              $row = $stmt->fetchAll(PDO::FETCH_NUM);
 
              foreach($row as $row){
                  $role=$row[0];
              }
            }
        }
    }
} else {
    header ("location:index.php");
}

if ($role == "Administrator") {
  $msg = "";
  $time = gmdate("Y-m-d\TH:i:s\Z");

  if (isset($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['role'])) {
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
      $firstname= filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
      $lastname= filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
      $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $msg .= '<p class="error">The email address you entered is not valid</p>';
      }
      
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
      
      $prep_stmt = "SELECT id_account FROM account WHERE email = ? OR username = ? LIMIT 1";
      $stmt = $core->dbh->prepare($prep_stmt);
      
      if ($stmt) {
          $stmt->bindParam('1', $email);
          $stmt->bindParam('2', $username);
          $stmt->execute();
          
          if ($stmt->rowCount() == 1) {
              $msg .= '<p class="error">A user with this email address / username already exists.</p>';
          }
      } else {
          $msg .= '<p class="error">Database error</p>';
      }
      
      if (empty($msg)) {
          $random_salt = hash('sha256', uniqid(openssl_random_pseudo_bytes(16), TRUE));

          $password = hash('sha256', $password . $random_salt);

          if ($insert_stmt = $core->dbh->prepare("INSERT INTO account (username, email, role, first_name, last_name, password, salt, date_joined) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
              $insert_stmt->bindParam('1', $username);
              $insert_stmt->bindParam('2', $email);
              $insert_stmt->bindParam('3', $role);
              $insert_stmt->bindParam('4', $firstname);
              $insert_stmt->bindParam('5', $lastname);
              $insert_stmt->bindParam('6', $password);
              $insert_stmt->bindParam('7', $random_salt);
              $insert_stmt->bindParam('8', $time);
              if (! $insert_stmt->execute()) {
                  header ("location:users.php");
                  exit();
              }
          }

          header ("location:users.php");
          exit();
      }
  }
} else {
  header ("location:index.php");
}

?>

        <div id="container" class="row-fluid">
            <?php 
            include_once('includes/_sidebar.php');
            ?>
            <!--BEGIN CONTENT-->
            <div id="main-content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <h3 class="page-title">
                                Register User
                                <small>register for a new user</small>
                            </h3>
                            <ul class="breadcrumb">
                                        <li>
                                            <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                        </li>
                                        <li>
                                            Microhydro Monitoring<span class="divider">&nbsp;</span>
                                        </li>
                                        <li>
                                            Register User<span class="divider-last">&nbsp;</span>
                                        </li>
                                        <li class="pull-right search-wrap"></li>
                                    </ul>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12"> 
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Register User</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                    <ul>
                                        <li>Emails must have a valid email format</li>
                                        <li>Passwords must contain :
                                            <ul>
                                                <li>At least one upper case letter (A..Z)</li>
                                                <li>At least one lower case letter (a..z)</li>
                                                <li>At least one number (0..9)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <form method="post" action="register.php">
                                        <div class="control-group">
                                            <label class="control-label">Username</label>
                                            <div class="controls">
                                                <input type="text" name='username' id='username' class="span6  popovers"/>
                                            </div>
                                        </div>  
                                        <div class="control-group">
                                            <label class="control-label">First Name</label>
                                            <div class="controls">
                                                <input type="text" name='firstname' id='firstname' class="span6  popovers"/>
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label">Last Name</label>
                                            <div class="controls">
                                                <input type="text" name='lastname' id='lastname' class="span6  popovers"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email</label>
                                            <div class="controls">
                                                <input type="email" name='email' id='email' class="span6  popovers"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Password</label>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="span6  popovers"/>
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label>Role</label>
                                            <select name="role">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Worker">Worker</option>
                                            </select>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit">Register</button>
                                        </div>
                                    </form>        
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
            <!--FINISH CONTENT-->
        </div>

<?php 
include_once('includes/_footer.php');
?>
