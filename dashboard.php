<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
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
            <!--FINISH CONTENT-->
        </div>

<?php 
include_once('includes/_footer.php');
?>