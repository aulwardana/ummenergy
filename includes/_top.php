<?php 
include_once('includes/_connect-db.php');
include_once('includes/_session-web.php');

//securing include file from direct access
if (strstr($_SERVER["PHP_SELF"], "/includes/")) {
    die ("Istighfar, jangan di hack. Makasih :)");
}

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

?>

    <body class="fixed-top">    
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="index.php">
                        <img src="assets/img/logo.png" alt="Microhydro Monitoring System" />
                    </a>
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="arrow"></span>
                    </a>
                    <div id="top_menu" class="nav notify-row">
                        <ul class="nav top-menu">
                            <li class="dropdown">
                            </li>
                            <li class="dropdown" id="header_inbox_bar">
                            </li>
                            <li class="dropdown" id="header_notification_bar">
                            </li>

                        </ul>
                    </div>
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <li class="dropdown mtop5">
                            </li>
                            <li class="dropdown mtop5">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                                    <i class="icon-headphones"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/img/avatar1_small.jpg" alt="">
                                    <span class="username"><?php echo $username; ?></span>
                                <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.php"><i class="icon-user"></i> About Us</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>