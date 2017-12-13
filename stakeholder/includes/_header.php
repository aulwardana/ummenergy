<?php
//securing include file from direct access
if (strstr($_SERVER["PHP_SELF"], "/includes/")) {
    die ("Istighfar, jangan di hack. Makasih :)");
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
        <link rel="apple-touch-icon" sizes="144x144" href="../assets/img/apple-touch-icon-ipad-retina.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/apple-touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/apple-touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="../assets/img/apple-touch-icon-iphone.png" />

		<link href="../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="../assets/css/font-awesome/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/css/data-table/jquery.dataTables.min.css" rel="stylesheet" />
		<link href="../assets/css/style-main.css" rel="stylesheet" />
		<link href="../assets/css/style_responsive.css" rel="stylesheet" />
		<link href="../assets/css/style_default.css" rel="stylesheet" id="style_color" />

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script language="javascript" type="text/javascript" src="../assets/js/jquery.js"></script>
        <script language="javascript" type="text/javascript" src="includes/systems/global-chart.js"></script>
	</head>