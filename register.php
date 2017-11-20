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

        <link rel="icon" href="../assets/img/favicon.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-ipad-retina.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-iphone.png" />

		<link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="assets/css/font-awesome/font-awesome.min.css" rel="stylesheet" />
		<link href="assets/css/style-main.css" rel="stylesheet" />
		<link href="assets/css/style_responsive.css" rel="stylesheet" />
		<link href="assets/css/style_default.css" rel="stylesheet" id="style_color" />

        <script language="javascript" type="text/javascript" src="assets/js/jquery.js"></script>
	</head>
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
                                    <span class="username">aul</span>
                                <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.php"><i class="icon-user"></i> About Us</a></li>
                                    <li class="divider"></li>
                                    <li><a href="includes/logout.php"><i class="icon-key"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="container" class="row-fluid">
            <div id="sidebar" class="nav-collapse collapse">
                <div class="sidebar-toggler hidden-phone"></div>
                <ul class="sidebar-menu">
                    <li class="has-sub">
                    <li><a class="" href="index.php"><span class="icon-box"><i class="icon-tasks"></i></span> Dashboard</a></li>
                    <li class="has-sub">
                    <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-dashboard"></i></span> Monitoring
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="metering.php">Metering Chart Phase R</a></li>
                                        <li><a class="" href="meterings.php">Metering Chart Phase S</a></li>
                                        <li><a class="" href="meteringt.php">Metering Chart Phase T</a></li>
                            <li><a class="" href="statistik.php">Statistic Chart</a></li>
                            <li><a class="" href="data.php">Data Report Phase R</a></li>
                            <li><a class="" href="datas.php">Data Report Phase S</a></li>
                            <li><a class="" href="datat.php">Data Report Phase T</a></li>
                        </ul>
                    </li>
                    <li class="has-sub active">
                        <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Settings
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="settings.php">Monitoring Settings</a></li>
                            <li class="active"><a class="" href="register.php">Register New User</a></li>
                            <li><a class="" href="account.php">Manage Account</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
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
                        <form method="post" name="registration_form" action="">
                        <div class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input type="text" name='username' id='username' class="span6  popovers" data-trigger="hover" data-content="Input Username" data-original-title="Usernames may contain only digits, upper and lower case letters and underscores" />
                            </div>
                        </div>  
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on">@</span><input class=" " type="text" name="email" id="email" placeholder="Email Address" />
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password" id="password" class="span6  popovers" data-trigger="hover" data-content="Input Password" data-original-title="Passwords must be at least 6 characters long" />
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label">Retype Password</label>
                            <div class="controls">
                                <input type="password" name="confirmpwd" id="confirmpwd" class="span6  popovers" data-trigger="hover" data-content="Input Password Again" data-original-title="Your password and confirmation must match exactly" />
                            </div>
                        </div> 
                        <div class="form-actions">
                            <input type="button" value="Register" 
                            onclick="return regformhash(this.form,
                                            this.form.username,
                                            this.form.email,
                                            this.form.password,
                                            this.form.confirmpwd);" />
                        </div>
                        </form>        
                </div>
            </div>       
        </div>
        </div>
        </div>
        </div>
        </div>
        <div id="footer">
        2014 &copy; UMM Energy.
        <div class="span pull-right">
            <span class="go-top"><i class="icon-arrow-up"></i></span>
        </div>
        </div>
		<script src="assets/js/jquery-1.8.3.min.js"></script>
		<script src="assets/js/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="assets/js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/js/bootstrap/bootstrap.min.js"></script>
		<script src="assets/js/jquery-knob/jquery.knob.js"></script>
		<script src="assets/js/flot/jquery.flot.js"></script>
        <script src="assets/js/flot/jquery.flot.time.js"></script>
		<script src="assets/js/scripts.js"></script>
		<script>
			jQuery(document).ready(function() {
				App.init();
			});
		</script>
	</body>
</html>