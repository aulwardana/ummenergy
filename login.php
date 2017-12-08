<?php
include_once('includes/_session-web.php');
include_once('includes/_connect-db.php');

sec_session_start();

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
  //your site secret key
  $secret = '6LcY9zsUAAAAANfQkfScjTml6XlAXbO0VpvHE9dP';
  //get verify response data
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
  $responseData = json_decode($verifyResponse);

  if($responseData->success) {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password']; // The hashed password.
        
        if (login($email, $password) == true) {
            // Login success 
            header ("location:dashboard.php");
            exit();
        } else {
            // Login failed 
            header ("location:login.php?error=1");
            exit();
        }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<meta name="description" content="Micro Hydro Power Plant Monitoring using Internet of Things Technology">
				<meta name="keywords" content="internet of things, energy monitoring, microhydro power plant, opensource hardware, monitoring platform">
				<meta name="author" content="UMM Energy by Aulia Arif Wardana">

				<title>UMM Energy | Microhydro Power Plant Monitoring</title>

				<link rel="icon" href="assets/img/favicon.png">
				<link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-ipad-retina.png" />
				<link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-iphone-retina.png" />
				<link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-ipad.png" />
				<link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-iphone.png" />

				<link rel="stylesheet" href="assets/css/style-login.css">
				<link rel="stylesheet" href="assets/css/animate.css"> 
				<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
				<form action="login.php" method="post" name="login_form"> 
					<section class="container">
						<div class="gambar">
							<img src="assets/img/loginlogo.png">
						</div>
						<div class="login">
							<h1>Login to Monitoring Website</h1>
							<p><input type="text" name="email" placeholder="Email" /></p>
							<p><input type="password" name="password" id="password" value="" placeholder="Password" /></p>
							<p>
								<div class="form-group has-feedback">
									<div class="g-recaptcha" data-sitekey="6LcY9zsUAAAAAEkPMHrulbOmelsdP0srBd7aJ_G5"></div>
								</div>
							</p>
							<p class="submit"><input type="submit" name="submit" value="Login" /></p>
						</div>

						<div class="login-help">
							<p>Welcome Admin <a href="prelogin.php">Click Here for Back to Home</a>.</p>
						</div>

						<section class="about">
								<p class="about-links">
									<a href="http://ft.umm.ac.id" target="_blank">Fakultas Teknik UMM</a>
								</p>
									<p class="about-author">
									&copy; 2014  -  <?php echo date('Y',time()); ?>
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