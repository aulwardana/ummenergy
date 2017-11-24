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
                                Data Report
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Data Report<span class="divider-last">&nbsp;</span>
                                </li>
                                <li class="pull-right search-wrap"></li>
                            </ul>
                        </div>
                    </div>

                    <div id="page" class="dashboard">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i>Managed Table</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <table id="conto">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Real Power</th>
                                                    <th>Apparent Power</th>
                                                    <th>Power Factor</th>
                                                    <th>Voltage</th>
                                                    <th>Ampere</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-bolt"></i> Export Data by Date Range</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <form method="post" action="exportxls.php">
                                        <p>Select a date range: </p><label style="color:#FFF;" for="from">From</label>
                                        From:&nbsp<input type="text" id="from" name="from" />
                                        <label style="color:#FFF;" for="to" >to</label>
                                        To:&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="to" name="to" />
                                        <br /><br /><input name="export" type="submit" value="Export Excel" />
                                        </form>
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