<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
?>

<script>
    $(document).ready(function() {
        $('#tablePhaseR').DataTable( {
            ajax:           './sensing/_table-get-pltmh-r.php',
            deferRender:    true,
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true,
            initComplete: function () {
                this.api().row( 1000 ).scrollTo();
            }
        } );
        jQuery( "#from" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: function( selectedDate ) {
            $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        jQuery( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: function( selectedDate ) {
            jQuery( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    } );
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
                                        <table id="tablePhaseR" class="display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                    <th>Watt</th>
                                                    <th>Volt Ampere</th>
                                                    <th>Cosphi</th>
                                                    <th>Volt</th>
                                                    <th>Ampere</th>
                                                </tr>
                                            </thead>
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
                                        <form method="post" action="./sensing/_export-xls-r.php">
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