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
                                Manage Account
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Manage Account<span class="divider-last">&nbsp;</span>
                                </li>
                                <li class="pull-right search-wrap"></li>
                            </ul>
                        </div>
                    </div>

                    <div id="page" class="dashboard">
                        <div class="row-fluid">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> Manage Account </h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th class="hidden-phone">Email</th>
                                                <th class="hidden-phone">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
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