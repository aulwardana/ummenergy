<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<!--
System Name: PLC Monitoring 
Version: 1.0
Author: Aulia Arif Wardana
Email: auliawardan@yahoo.co.id
Design - Software - Embeded System
-->

<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Microhydro Power Plant</title>
	    <link rel="stylesheet" href="css/style.css">
	    <link rel="stylesheet" href="css/animate.css">
	    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
		<form action="includes/process_login.php" method="post" name="login_form"> 
		 <section class="container">
			<div class="gambar">
			<img src="loginlogo.png">
			</div>
			<div class="login">
			  <h1>Login to Monitoring Website</h1>
				<p><input type="text" name="email" placeholder="Email" /></p>
				<p><input type="password" name="password" id="password" value="" placeholder="Password" /></p>
				<p class="remember_me">
				  <label>
					<input type="checkbox" name="remember_me" id="remember_me">
					Remember me on this computer
				  </label>
				</p>
				<p class="submit"><input type="submit" name="submit" value="Login" onclick="formhash(this.form, this.form.password);" /></p>
			  </form>
			</div>

			<div class="login-help">
			  <p>Welcome Admin <a href="prelogin.php">Click Here for Back to Home</a>.</p>
			</div>

		   <section class="about">
			 <p class="about-links">
			   <a href="http://ft.umm.ac.id" target="_blank">Fakultas Teknik UMM</a>
			 </p>
			  <p class="about-author">
			   &copy; 2014  -
			   <a href="http://www.ummenergy.com" target="_blank">UMM Energy</a><br>
			   <a href="http://www.facebook.com/indoraya" target="_blank">Agus Eko Minarno, M. Kom.</a>
			   <a href="http://twitter.com/aulwardana" target="_blank">Aulia Arif Wardana</a><br/>
			   <a href="http://www.umm.ac.id" target="_blank">University of Muhammadiyah Malang</a>
			 </p>
		   </section>
		  </section>			             
        </form>        
    </body>
</html>