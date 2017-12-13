<?php
//securing include file from direct access
if (strstr($_SERVER["PHP_SELF"], "/includes/")) {
    die ("Istighfar, jangan di hack. Makasih :)");
}
?>
            <div id="sidebar" class="nav-collapse collapse">
                <div class="sidebar-toggler hidden-phone"></div>
                    <ul class="sidebar-menu">
                        <li class="has-sub">
                        <li><a class="" href="./index.php"><span class="icon-box"><i class="icon-tasks"></i></span> Dashboard</a></li>
                        <li class="has-sub">
                        <a href="javascript:;" class="">
                                <span class="icon-box"> <i class="icon-dashboard"></i></span> Monitoring
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="./mcp-r.php">Metering Chart Phase R</a></li>
                                <li><a class="" href="./mcp-s.php">Metering Chart Phase S</a></li>
                                <li><a class="" href="./mcp-t.php">Metering Chart Phase T</a></li>
                                <li><a class="" href="./statistic.php">Statistic Chart</a></li>
                                <li><a class="" href="./drp-r.php">Data Report Phase R</a></li>
                                <li><a class="" href="./drp-s.php">Data Report Phase S</a></li>
                                <li><a class="" href="./drp-t.php">Data Report Phase T</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>