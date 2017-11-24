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
                                Settings
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Settings<span class="divider-last">&nbsp;</span>
                                </li>
                                <li class="pull-right search-wrap"></li>
                            </ul>
                        </div>
                    </div>

                    <div id="page" class="dashboard">
                        <div class="row-fluid">
                            <div class="widget">
                                <form action="settings.php" method="post">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i> Settings </h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body form">
                                        <div class="control-group">		
                                            <label class="control-label">Database Backup :</label>
                                            <div class="controls">
                                                <div class="success-toggle-button">
                                                    <input type="checkbox" class="toggle" value="database" name='db1'/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email Notification :</label>
                                            <div class="controls">
                                                <div class="success-toggle-button">
                                                    <input type="checkbox" class="toggle" value="email" name='mail1'/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" value="Submit" name="submit" />
                                        </div>
                                    </div>
                                </form>
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