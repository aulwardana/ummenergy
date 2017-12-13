<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
?>

<script>
    $(document).ready(function () {
        initDataT();

        dataserWattT = [
            { label: "Real Power:", data: wattT, lines:{fill:true, lineWidth:1.2}, color: "#00FF00" }       
        ];
        
        datasetVoltampereT = [
            { label: "Apparent Power:", data: voltampereT, lines:{fill:true, lineWidth:1.2}, color: "#f6a00a" }        
        ];
        
        datasetCosphiT = [
            { label: "Power Factor:", data: cosphiT, lines:{fill:true, lineWidth:1.2}, color: "#f60af3" }
        ];
        
        datasetVrmsT = [
            { label: "Voltage:", data: vrmsT, lines:{fill:true, lineWidth:1.2}, color: "#0044FF" }
        ];
        
        datasetIrmsT = [
            { label: "Ampere:", data: irmsT, lines:{fill:true, lineWidth:1.2}, color: "#FF0000" }    
        ];
		
		$.plot($("#phaseTwatt"), dataserWattT, options);
        $.plot($("#phaseTvoltampere"), datasetVoltampereT, options);
        $.plot($("#phaseTcosphi"), datasetCosphiT, options);
        $.plot($("#phaseTvrms"), datasetVrmsT, options);
        $.plot($("#phaseTirms"), datasetIrmsT, options);
        setTimeout(GetDataTall, updateIntervalT);
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
                                Metering Chart Phase T
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Metering Chart Phase T<span class="divider-last">&nbsp;</span>
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
                                        <div id="phaseTwatt" class="chart"></div>
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
                                        <div id="phaseTvoltampere" class="chart"></div>
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
                                        <div id="phaseTcosphi" class="chart"></div>
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
                                        <div id="phaseTvrms" class="chart"></div>
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
                                        <div id="phaseTirms" class="chart"></div>
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