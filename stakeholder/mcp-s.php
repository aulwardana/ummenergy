<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
?>

<script>
    $(document).ready(function () {
        initDataS();

        dataserWattS = [
            { label: "Real Power:", data: wattS, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" }       
        ];
        
        datasetVoltampereS = [
            { label: "Apparent Power:", data: voltampereS, lines:{fill:true, lineWidth:1.2}, color: "#f6a00a" }        
        ];
        
        datasetCosphiS = [
            { label: "Power Factor:", data: cosphiS, lines:{fill:true, lineWidth:1.2}, color: "#f60af3" }
        ];
        
        datasetVrmsS = [
            { label: "Voltage:", data: vrmsS, lines:{fill:true, lineWidth:1.2}, color: "#0044FF" }
        ];
        
        datasetIrmsS = [
            { label: "Ampere:", data: irmsS, lines:{fill:true, lineWidth:1.2}, color: "#FF0000" }    
        ];
		
		$.plot($("#phaseSwatt"), dataserWattS, options);
        $.plot($("#phaseSvoltampere"), datasetVoltampereS, options);
        $.plot($("#phaseScosphi"), datasetCosphiS, options);
        $.plot($("#phaseSvrms"), datasetVrmsS, options);
        $.plot($("#phaseSirms"), datasetIrmsS, options);
        setTimeout(GetDataSall, updateIntervalS);
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
                                Metering Chart Phase S
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Metering Chart Phase S<span class="divider-last">&nbsp;</span>
                                </li>
                                <li class="pull-right search-wrap"></li>
                            </ul>
                        </div>
                    </div>

                    <div id="page" class="dashboard">
                        <div class="row-fluid">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Real Power Meter</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="phaseSwatt" class="chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Apparent Power Meter</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="phaseSvoltampere" class="chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Power Factor Meter</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="phaseScosphi" class="chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Voltage Meter</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="phaseSvrms" class="chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Ampere Meter</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="phaseSirms" class="chart"></div>
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