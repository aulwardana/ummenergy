<?php
//Just redirect to login.php when not login and redirect to dashboard.php when user already login
include_once('includes/_session-web.php');

sec_session_start();

if (login_check() == true) {
    header ("location:dashboard.php");
} else {
    header ("location:prelogin.php");
}
?>