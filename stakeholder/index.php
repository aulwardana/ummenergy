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
        <link rel="apple-touch-icon" sizes="144x144" href="../assets/img/apple-touch-icon-ipad-retina.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/apple-touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/apple-touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="../assets/img/apple-touch-icon-iphone.png" />

		<link href="../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="../assets/css/font-awesome/font-awesome.min.css" rel="stylesheet" />
		<link href="../assets/css/style-main.css" rel="stylesheet" />
		<link href="../assets/css/style_responsive.css" rel="stylesheet" />
		<link href="../assets/css/style_default.css" rel="stylesheet" id="style_color" />

        <script language="javascript" type="text/javascript" src="../assets/js/jquery.js"></script>

		<script type="text/javascript">
            $(function() {
                //watt : realpower (Watt (Joule/Detik)) || voltampere : apparentpower (VA) || cosphi : faktordaya (Tidak memiliki satuan) || Vrms : tegangan rata2 (Volt (V)) || Irms : arus (Ampere (A)) 
                var watt = [], voltampere = [], cosphi = [], vrms = [], irms = [], suhu = [];
                var watt3 = [], voltampere3 = [], cosphi3 = [], vrms3 = [], irms3 = [];
                var watt4 = [], voltampere4 = [], cosphi4 = [], vrms4 = [], irms4 = [];
                var dataset, dataset1, dataset2, dataset3;
                var totalPoints = 100, totalPoints2 = 100, totalPoints3 = 100, totalPoints4 = 100;
                var updateInterval = 5000;
                var updateInterval2 = 5000;
                var updateInterval3 = 5000;
                var updateInterval4 = 5000;
                var now = new Date().getTime();
                var now2 = new Date().getTime();
                var now3 = new Date().getTime();
                var now4 = new Date().getTime();

                var options = {
                    series: {
                        lines: {
                            lineWidth: 1.2
                        },
                        bars: {
                            align: "center",
                            fillColor: { colors: [{ opacity: 1 }, { opacity: 1}] },
                            barWidth: 500,
                            lineWidth: 1
                        }
                    },
                    xaxis: {
                        mode: "time",
                        tickSize: [60, "second"],
                        tickFormatter: function (v, axis) {
                            var date = new Date(v);

                            if (date.getSeconds() % 20 == 0) {
                                var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                                var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                                var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                                return hours + ":" + minutes + ":" + seconds;
                            } else {
                                return "";
                            }
                        },
                        axisLabel: "Time",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial',
                        axisLabelPadding: 10
                    },
                    yaxes: [
                        {
                            min: 0,
                            max: 900,
                            tickSize: 25,
                            tickFormatter: function (v, axis) {
                                if (v % 50 == 0) {
                                    return v + "";
                                } else {
                                    return "";
                                }
                            },
                            axisLabel: "Label 1",
                            axisLabelUseCanvas: true,
                            axisLabelFontSizePixels: 12,
                            axisLabelFontFamily: 'Verdana, Arial',
                            axisLabelPadding: 6
                        },
                        {
                            min: 0,
                            max: 1,
                            tickSize: 0.1,
                            tickFormatter: 0.1,
                            position: "right",
                            axisLabel: "Label 2",
                            axisLabelUseCanvas: true,
                            axisLabelFontSizePixels: 12,
                            axisLabelFontFamily: 'Verdana, Arial',
                            axisLabelPadding: 6
                        }, {
                            min: 0,
                            max: 20,
                            tickSize: 5,
                            tickFormatter: function (v, axis2) {
                                if (v % 5 == 0) {
                                    return v + "";
                                } else {
                                    return "";
                                }
                            },
                            position: "right",
                            axisLabel: "Label 2",
                            axisLabelUseCanvas: true,
                            axisLabelFontSizePixels: 12,
                            axisLabelFontFamily: 'Verdana, Arial',
                            axisLabelPadding: 6
                        }
                    ],
                    legend: {
                        noColumns: 0,
                        position:"nw"
                    },
                    grid: {      
                        backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
                    }
                };
                
                var options2 = {
                    series: {
                        lines: {
                            lineWidth: 1.2
                        },
                        bars: {
                            align: "center",
                            fillColor: { colors: [{ opacity: 1 }, { opacity: 1}] },
                            barWidth: 500,
                            lineWidth: 1
                        }
                    },
                    xaxis: {
                        mode: "time",
                        tickSize: [60, "second"],
                        tickFormatter: function (v, axis) {
                            var date = new Date(v);

                            if (date.getSeconds() % 20 == 0) {
                                var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                                var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                                var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                                return hours + ":" + minutes + ":" + seconds;
                            } else {
                                return "";
                            }
                        },
                        axisLabel: "Time",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial',
                        axisLabelPadding: 10
                    },
                    yaxes: [
                        {
                            min: 0,
                            max: 100,
                            tickSize: 10,
                            tickFormatter: 10,
                            position: "right",
                            axisLabel: "Label 2",
                            axisLabelUseCanvas: true,
                            axisLabelFontSizePixels: 12,
                            axisLabelFontFamily: 'Verdana, Arial',
                            axisLabelPadding: 6
                        }
                    ],
                    legend: {
                        noColumns: 0,
                        position:"nw"
                    },
                    grid: {      
                        backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
                    }
                };

                function initData() {
                    for (var i = 0; i < totalPoints; i++) {
                        var temp = [now += updateInterval, 0];

                        watt.push(temp);
                        voltampere.push(temp);
                        cosphi.push(temp);
                        vrms.push(temp);
                        irms.push(temp);
                    }
                }
                
                function initData2() {
                    for (var j = 0; j < totalPoints2; j++) {
                        var temp2 = [now2 += updateInterval2, 0];

                        suhu.push(temp2);
                    }
                }
                
                function initData3() {
                    for (var l = 0; l < totalPoints3; l++) {
                        var temp3 = [now3 += updateInterval3, 0];

                        watt3.push(temp3);
                        voltampere3.push(temp3);
                        cosphi3.push(temp3);
                        vrms3.push(temp3);
                        irms3.push(temp3);
                    }
                }
                
                function initData4() {
                    for (var r = 0; r < totalPoints3; r++) {
                        var temp4 = [now4 += updateInterval4, 0];

                        watt4.push(temp4);
                        voltampere4.push(temp4);
                        cosphi4.push(temp4);
                        vrms4.push(temp4);
                        irms4.push(temp4);
                    }
                }


                function GetData() {
                    $.ajaxSetup({ cache: false });

                    $.ajax({
                        url: "http://pltmh.ummenergy.com/jsonchart.php",
                        dataType: 'json',
                        success: update,
                        error: function () {
                            setTimeout(GetData, updateInterval);
                        }
                    });
                }
                
                function GetData2() {
                    $.ajaxSetup({ cache: false });

                    $.ajax({
                        url: "http://pltmh.ummenergy.com/jsonsuhuchart.php",
                        dataType: 'json',
                        success: update2,
                        error: function () {
                            setTimeout(GetData2, updateInterval2);
                        }
                    });
                }
                
                function GetData3() {
                    $.ajaxSetup({ cache: false });

                    $.ajax({
                        url: "http://pltmh.ummenergy.com/jsonchart2.php",
                        dataType: 'json',
                        success: update3,
                        error: function () {
                            setTimeout(GetData3, updateInterval3);
                        }
                    });
                }
                
                function GetData4() {
                    $.ajaxSetup({ cache: false });

                    $.ajax({
                        url: "http://pltmh.ummenergy.com/jsonchart3.php",
                        dataType: 'json',
                        success: update4,
                        error: function () {
                            setTimeout(GetData4, updateInterval4);
                        }
                    });
                }
                
                var temp;

                function update(_data) {
                    watt.shift();
                    voltampere.shift();
                    cosphi.shift();
                    vrms.shift();
                    irms.shift();

                    now += updateInterval

                    temp = [now, _data.watt];
                    watt.push(temp);

                    temp = [now, _data.voltampere];
                    voltampere.push(temp);

                    temp = [now, _data.cosphi];
                    cosphi.push(temp);

                    temp = [now, _data.vrms];
                    vrms.push(temp);
                    
                    temp = [now, _data.irms];
                    irms.push(temp);
                    
                    dataset = [
                        { label: "Real Power:" + _data.watt + "W", data: watt, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
                        { label: "Apparent Power:" + _data.voltampere + "VA", data: voltampere, color: "#f6a00a", bars: { show: true } },
                        { label: "Power Factor:" + _data.cosphi + "", data: cosphi, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
                        { label: "Voltage:" + _data.vrms + "V", data: vrms, color: "#0044FF", bars: { show: true } },
                        { label: "Ampere:" + _data.irms + "A", data: irms, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
                    ];

                    $.plot($("#placeholder"), dataset, options);
                    setTimeout(GetData, updateInterval);
                }
                
                var temp2;

                function update2(_data2) {
                    suhu.shift();

                    now2 += updateInterval2

                    temp2 = [now, _data2.suhu];
                    suhu.push(temp2);
                    
                    dataset1 = [
                        { label: "Suhu:" + _data2.suhu + "C", data: suhu, lines:{fill:true, lineWidth:1.2}, color: "#f2e900" }     
                    ];

                    $.plot($("#placeholder2"), dataset1, options2);
                    setTimeout(GetData2, updateInterval2);
                }
                
                var temp3;

                function update3(_data3) {
                    watt3.shift();
                    voltampere3.shift();
                    cosphi3.shift();
                    vrms3.shift();
                    irms3.shift();

                    now3 += updateInterval3

                    temp3 = [now3, _data3.watt3];
                    watt3.push(temp3);

                    temp3 = [now3, _data3.voltampere3];
                    voltampere3.push(temp3);

                    temp3 = [now3, _data3.cosphi3];
                    cosphi3.push(temp3);

                    temp3 = [now3, _data3.vrms3];
                    vrms3.push(temp3);
                    
                    temp3 = [now3, _data3.irms3];
                    irms3.push(temp3);
                    
                    dataset2 = [
                        { label: "Real Power:" + _data3.watt3 + "W", data: watt3, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
                        { label: "Apparent Power:" + _data3.voltampere3 + "VA", data: voltampere3, color: "#f6a00a", bars: { show: true } },
                        { label: "Power Factor:" + _data3.cosphi3 + "", data: cosphi3, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
                        { label: "Voltage:" + _data3.vrms3 + "V", data: vrms3, color: "#0044FF", bars: { show: true } },
                        { label: "Ampere:" + _data3.irms3 + "A", data: irms3, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
                    ];
                    
                    $.plot($("#placeholder3"), dataset2, options);
                    setTimeout(GetData3, updateInterval3);
                }
                
                var temp4;

                function update4(_data4) {
                    watt4.shift();
                    voltampere4.shift();
                    cosphi4.shift();
                    vrms4.shift();
                    irms4.shift();

                    now4 += updateInterval4

                    temp4 = [now4, _data4.watt4];
                    watt4.push(temp3);

                    temp4 = [now4, _data4.voltampere4];
                    voltampere4.push(temp4);

                    temp4 = [now4, _data4.cosphi4];
                    cosphi4.push(temp4);

                    temp4 = [now4, _data4.vrms4];
                    vrms4.push(temp4);
                    
                    temp4 = [now4, _data4.irms4];
                    irms4.push(temp4);
                    
                    dataset3 = [
                        { label: "Real Power:" + _data4.watt4 + "W", data: watt4, lines: { fill: true, lineWidth: 1.2 }, color: "#00FF00" },
                        { label: "Apparent Power:" + _data4.voltampere3 + "VA", data: voltampere4, color: "#f6a00a", bars: { show: true } },
                        { label: "Power Factor:" + _data4.cosphi4 + "", data: cosphi4, color: "#f60af3", lines: { lineWidth: 1.2}, yaxis: 2 },
                        { label: "Voltage:" + _data4.vrms4 + "V", data: vrms4, color: "#0044FF", bars: { show: true } },
                        { label: "Ampere:" + _data4.irms4 + "A", data: irms4, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }        
                    ];
                    
                    $.plot($("#placeholder4"), dataset3, options);
                    setTimeout(GetData4, updateInterval4);
                }
                
                $(document).ready(function () {
                    initData();
                    initData2();
                    initData3();
                    initData4();
                    
                    dataset = [        
                        { label: "Real Power:", data: watt, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
                        { label: "Apparent Power:", data: voltampere, color: "#f6a00a", bars: { show: true } },
                        { label: "Power Factor:", data: cosphi, color: "#f60af3", bars: { show: true }, yaxis: 2 },
                        { label: "Voltage:", data: vrms, color: "#0044FF", bars: { show: true } },
                        { label: "Ampere:", data: irms, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
                    ];
                    
                    dataset1 = [
                        { label: "Suhu:", data: suhu, lines:{fill:true, lineWidth:1.2}, color: "#f2e900" }     
                    ];
                    
                    dataset2 = [        
                        { label: "Real Power:", data: watt3, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
                        { label: "Apparent Power:", data: voltampere3, color: "#f6a00a", bars: { show: true } },
                        { label: "Power Factor:", data: cosphi3, color: "#f60af3", bars: { show: true }, yaxis: 2 },
                        { label: "Voltage:", data: vrms3, color: "#0044FF", bars: { show: true } },
                        { label: "Ampere:", data: irms3, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
                    ];
                    
                    dataset3 = [        
                        { label: "Real Power:", data: watt4, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
                        { label: "Apparent Power:", data: voltampere4, color: "#f6a00a", bars: { show: true } },
                        { label: "Power Factor:", data: cosphi4, color: "#f60af3", bars: { show: true }, yaxis: 2 },
                        { label: "Voltage:", data: vrms4, color: "#0044FF", bars: { show: true } },
                        { label: "Ampere:", data: irms4, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
                    ];

                    $.plot($("#placeholder"), dataset, options);
                    $.plot($("#placeholder2"), dataset1, options2);
                    $.plot($("#placeholder3"), dataset2, options);
                    $.plot($("#placeholder4"), dataset3, options);
                    setTimeout(GetData, updateInterval);
                    setTimeout(GetData2, updateInterval2);
                    setTimeout(GetData3, updateInterval3);
                    setTimeout(GetData4, updateInterval4);
                });
            });
		
		</script>
	</head>
	<body class="fixed-top">
		<div id="header" class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="index.php">
						<img src="../assets/img/logo.png" alt="Microhydro Monitoring System" />
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
								<img src="../assets/img/avatar1_small.jpg" alt="">
									<span class="username">aul</span>
								<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="about.php"><i class="icon-user"></i> About Us</a></li>
									<li class="divider"></li>
									<li><a href="includes/logout.php"><i class="icon-key"></i> Log Out</a></li>
								</ul>
							</li>
							<!-- user -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="container" class="row-fluid">
			<div id="sidebar" class="nav-collapse collapse">
				<div class="sidebar-toggler hidden-phone"></div>
				<ul class="sidebar-menu">
					<li class="has-sub active">
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
					<li class="has-sub">
						<a href="javascript:;" class="">
						<span class="icon-box"><i class="icon-cogs"></i></span> Settings
						<span class="arrow"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="settings.php">Monitoring Settings</a></li>
							<li><a class="" href="register.php">Register New User</a></li>
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
								Dashboard
								<small> General Information </small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i><span class="divider">&nbsp;</span>
								</li>
								<li>
									Microhydro Monitoring<span class="divider">&nbsp;</span>
								</li>
								<li>
									Dashboard<span class="divider-last">&nbsp;</span>
								</li>
								<li class="pull-right search-wrap"></li>
							</ul>
						</div>
					</div>
					<div id="page" class="dashboard">
						<div class="row-fluid circle-state-overview">
							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">
								<div class="circle-stat block">
									<div class="circle-wrap">
										<div class="stats-circle turquoise-color">
											<i class="icon-user"></i>
										</div>
										<div class="details">
											<strong><div class="number">3</div></strong>
											<div class="title">Users</div>
										</div>
									</div>
								</div>
							</div>

							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">
								<div class="circle-stat block">
									<div class="circle-wrap">
										<div class="stats-circle purple-color">
											<i class="icon-eye-open"></i>
										</div>
										<div class="details">
											<div class="number">1</div>
											<div class="title">Visitor</div>
										</div>
									</div>
								</div>
							</div>


							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">
								<div class="circle-stat block">
									 <div class="circle-wrap">
										<div class="stats-circle blue-color">
											<i class="icon-bar-chart"></i>
										</div>
										<div class="details">
											<div class="number">2</div>
											<div class="title">Data Receive</div>
										</div>
								     </div>
							    </div>
						   </div>
					</div>

						<div class="row-fluid">
							<div class="span16">
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-bar-chart"></i>Realtime Metering Data Phase R</h4>
										<span class="tools">
										<a href="javascript:;" class="icon-chevron-down"></a>
										<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									<div class="widget-body">
										<div id="site_statistics_content" class="show">
											<div id="placeholder" class="chart"></div>
										</div>
									</div>
								</div>
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-bar-chart"></i>Realtime Metering Data Phase S</h4>
										<span class="tools">
										<a href="javascript:;" class="icon-chevron-down"></a>
										<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									<div class="widget-body">
										<div id="site_statistics_content" class="show">
											<div id="placeholder3" class="chart"></div>
										</div>
									</div>
								</div>
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-bar-chart"></i>Realtime Metering Data Phase T</h4>
										<span class="tools">
										<a href="javascript:;" class="icon-chevron-down"></a>
										<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									<div class="widget-body">
										<div id="site_statistics_content" class="show">
											<div id="placeholder4" class="chart"></div>
										</div>
									</div>
								</div>
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-bar-chart"></i>Temperature Metering Data</h4>
										<span class="tools">
										<a href="javascript:;" class="icon-chevron-down"></a>
										<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									<div class="widget-body">
										<div id="site_statistics_content" class="show">
											<div id="placeholder2" class="chart"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			2014 - 2017 &copy; UMM Energy.
			<div class="span pull-right">
				<span class="go-top"><i class="icon-arrow-up"></i></span>
			</div>
		</div>
		<script src="../assets/js/jquery-1.8.3.min.js"></script>
		<script src="../assets/js/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="../assets/js/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../assets/js/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/jquery-knob/jquery.knob.js"></script>
		<script src="../assets/js/flot/jquery.flot.js"></script>
        <script src="../assets/js/flot/jquery.flot.time.js"></script>
		<script src="../assets/js/scripts.js"></script>
		<script>
			jQuery(document).ready(function() {
				App.init();
			});
		</script>
	</body>
</html>