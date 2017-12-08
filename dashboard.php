<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');

	//count user
	$sqlCountUser = "SELECT count(*) FROM account"; 
	$resultCountUser = $core->dbh->prepare($sqlCountUser); 
	$resultCountUser->execute(); 
	$number_of_CountUser = $resultCountUser->fetchColumn(); 

	//count all sensing data from 3 phase
	$sqlCountPhaseR = "SELECT count(*) FROM pltmh_data_r"; 
	$sqlCountPhaseS = "SELECT count(*) FROM pltmh_data_s";
	$sqlCountPhaseT = "SELECT count(*) FROM pltmh_data_t";
	$resultCountPhaseR = $core->dbh->prepare($sqlCountPhaseR); 
	$resultCountPhaseS = $core->dbh->prepare($sqlCountPhaseS); 
	$resultCountPhaseT = $core->dbh->prepare($sqlCountPhaseT);
	$resultCountPhaseR->execute(); 
	$resultCountPhaseS->execute();
	$resultCountPhaseT->execute();
	$number_of_CountPhaseR = $resultCountPhaseR->fetchColumn(); 
	$number_of_CountPhaseS = $resultCountPhaseS->fetchColumn();
	$number_of_CountPhaseT = $resultCountPhaseT->fetchColumn();
	$total_sensing_data = $number_of_CountPhaseR + $number_of_CountPhaseS + $number_of_CountPhaseT

?>

<script>
	$(document).ready(function () {
        initDataR();
        initDataS();
        initDataT();
        initDataTemp();
        
        datasetR = [        
            { label: "Real Power:", data: wattR, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampereR, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphiR, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrmsR, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irmsR, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];
        
        datasetS = [        
            { label: "Real Power:", data: wattS, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampereS, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphiS, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrmsS, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irmsS, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];
        
        datasetT = [        
            { label: "Real Power:", data: wattT, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" },
            { label: "Apparent Power:", data: voltampereT, color: "#f6a00a", bars: { show: true } },
            { label: "Power Factor:", data: cosphiT, color: "#f60af3", bars: { show: true }, yaxis: 2 },
            { label: "Voltage:", data: vrmsT, color: "#0044FF", bars: { show: true } },
            { label: "Ampere:", data: irmsT, lines: { lineWidth: 1.2}, color: "#FF0000", yaxis: 3 }
        ];

        datasetTemp = [
            { label: "Temperature:", data: temperature, lines:{fill:true, lineWidth:1.2}, color: "#f2e900" }     
		];
		
		$.plot($("#phaseRAll"), datasetR, options);
        $.plot($("#phaseSAll"), datasetS, options);
        $.plot($("#phaseTAll"), datasetT, options);
		$.plot($("#temperatureData"), datasetTemp, optionsTemp);
		setTimeout(GetDataR, updateIntervalR);
        setTimeout(GetDataS, updateIntervalS);
        setTimeout(GetDataT, updateIntervalT);
        setTimeout(GetDataTemp, updateIntervalTemp);
	});
</script>

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
											<strong><div class="number"><?php echo $number_of_CountUser; ?></div></strong>
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
											<div class="number"><?php echo $total_sensing_data; ?></div>
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
											<div id="phaseRAll" class="chart"></div>
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
											<div id="phaseSAll" class="chart"></div>
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
											<div id="phaseTAll" class="chart"></div>
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
											<div id="temperatureData" class="chart"></div>
										</div>
									</div>
								</div>
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