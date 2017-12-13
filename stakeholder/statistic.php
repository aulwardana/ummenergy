<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
    //Statistic for Phase R
    $prep_stmt_result_r_1 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 7 HOUR) GROUP BY date(time)';
    $stmt_result_r_1 = $core->dbh->prepare($prep_stmt_result_r_1);
    $stmt_result_r_1->execute();
    if ($stmt_result_r_1->fetchColumn() > 0){
        while($row_r_1 = $stmt_result_r_1->fetchAll(PDO::FETCH_NUM)){
                $times_r_1[]=array($row_r_1[0]);
                $data_r_1[]=array($row_r_1[1]); 
            }
            $atimes_r_1 = implode($times_r_1[0]);
            $_times_r_1 = strtotime($atimes_r_1)*1000;
            $_data_r_1 = implode($data_r_1[0]);
    }else{
        $atimes_r_1 = date_default_timezone_get();
        $_times_r_1 = strtotime($atimes_r_1)*1000;
        $_data_r_1 = 0;
    }
    $prep_stmt_result_r_2 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 6 HOUR) GROUP BY date(time)';
    $stmt_result_r_2 = $core->dbh->prepare($prep_stmt_result_r_2);
    $stmt_result_r_2->execute();
    if ($stmt_result_r_2->fetchColumn() > 0){
        while($row_r_2 = $stmt_result_r_2->fetchAll(PDO::FETCH_NUM)){
                $times_r_2[]=array($row_r_2[0]);
                $data_r_2[]=array($row_r_2[1]); 
            }
            $atimes_r_2 = implode($times_r_2[0]);
            $_times_r_2 = strtotime($atimes_r_2)*1000;
            $_data_r_2 = implode($data_r_2[0]);
    }else{
        $atimes_r_2 = date_default_timezone_get();
        $_times_r_2 = strtotime($atimes_r_2)*1000;
        $_data_r_2 = 0;
    }
    $prep_stmt_result_r_3 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 5 HOUR) GROUP BY date(time)';
    $stmt_result_r_3 = $core->dbh->prepare($prep_stmt_result_r_3);
    $stmt_result_r_3->execute();
    if ($stmt_result_r_3->fetchColumn() > 0){
        while($row_r_3 = $stmt_result_r_3->fetchAll(PDO::FETCH_NUM)){
                $times_r_3[]=array($row_r_3[0]);
                $data_r_3[]=array($row_r_3[1]); 
            }
            $atimes_r_3 = implode($times_r_3[0]);
            $_times_r_3 = strtotime($atimes_r_3)*1000;
            $_data_r_3 = implode($data_r_3[0]);
    }else{
        $atimes_r_3 = date_default_timezone_get();
        $_times_r_3 = strtotime($atimes_r_3)*1000;
        $_data_r_3 = 0;
    }
    $prep_stmt_result_r_4 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 4 HOUR) GROUP BY date(time)';
    $stmt_result_r_4 = $core->dbh->prepare($prep_stmt_result_r_4);
    $stmt_result_r_4->execute();
    if ($stmt_result_r_4->fetchColumn() > 0){
        while($row_r_4 = $stmt_result_r_4->fetchAll(PDO::FETCH_NUM)){
                $times_r_4[]=array($row_r_4[0]);
                $data_r_4[]=array($row_r_4[1]); 
            }
            $atimes_r_4 = implode($times_r_4[0]);
            $_times_r_4 = strtotime($atimes_r_4)*1000;
            $_data_r_4 = implode($data_r_4[0]);
    }else{
        $atimes_r_4 = date_default_timezone_get();
        $_times_r_4 = strtotime($atimes_r_4)*1000;
        $_data_r_4 = 0;
    }
    $prep_stmt_result_r_5 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 3 HOUR) GROUP BY date(time)';
    $stmt_result_r_5 = $core->dbh->prepare($prep_stmt_result_r_5);
    $stmt_result_r_5->execute();
    if ($stmt_result_r_5->fetchColumn() > 0){
        while($row_r_5 = $stmt_result_r_5->fetchAll(PDO::FETCH_NUM)){
                $times_r_5[]=array($row_r_5[0]);
                $data_r_5[]=array($row_r_5[1]); 
            }
            $atimes_r_5 = implode($times_r_5[0]);
            $_times_r_5 = strtotime($atimes_r_5)*1000;
            $_data_r_5 = implode($data_r_5[0]);
    }else{
        $atimes_r_5 = date_default_timezone_get();
        $_times_r_5 = strtotime($atimes_r_5)*1000;
        $_data_r_5 = 0;
    }
    $prep_stmt_result_r_6 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 2 HOUR) GROUP BY date(time)';
    $stmt_result_r_6 = $core->dbh->prepare($prep_stmt_result_r_6);
    $stmt_result_r_6->execute();
    if ($stmt_result_r_6->fetchColumn() > 0){
        while($row_r_6 = $stmt_result_r_6->fetchAll(PDO::FETCH_NUM)){
                $times_r_6[]=array($row_r_6[0]);
                $data_r_6[]=array($row_r_6[1]); 
            }
            $atimes_r_6 = implode($times_r_6[0]);
            $_times_r_6 = strtotime($atimes_r_6)*1000;
            $_data_r_6 = implode($data_r_6[0]);
    }else{
        $atimes_r_6 = date_default_timezone_get();
        $_times_r_6 = strtotime($atimes_r_6)*1000;
        $_data_r_6 = 0;
    }
    $prep_stmt_result_r_7 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 1 HOUR) GROUP BY date(time)';
    $stmt_result_r_7 = $core->dbh->prepare($prep_stmt_result_r_7);
    $stmt_result_r_7->execute();
    if ($stmt_result_r_7->fetchColumn() > 0){
        while($row_r_7 = $stmt_result_r_7->fetchAll(PDO::FETCH_NUM)){
                $times_r_7[]=array($row_r_7[0]);
                $data_r_7[]=array($row_r_7[1]); 
            }
            $atimes_r_7 = implode($times_r_7[0]);
            $_times_r_7 = strtotime($atimes_r_7)*1000;
            $_data_r_7 = implode($data_r_7[0]);
    }else{
        $atimes_r_7 = date_default_timezone_get();
        $_times_r_7 = strtotime($atimes_r_7)*1000;
        $_data_r_7 = 0;
    }

    //Statistic for Phase S
    $prep_stmt_result_s_1 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 7 HOUR) GROUP BY date(time)';
    $stmt_result_s_1 = $core->dbh->prepare($prep_stmt_result_s_1);
    $stmt_result_s_1->execute();
    if ($stmt_result_s_1->fetchColumn() > 0){
        while($row_s_1 = $stmt_result_s_1->fetchAll(PDO::FETCH_NUM)){
                $times_s_1[]=array($row_s_1[0]);
                $data_s_1[]=array($row_s_1[1]); 
            }
            $atimes_s_1 = implode($times_s_1[0]);
            $_times_s_1 = strtotime($atimes_s_1)*1000;
            $_data_s_1 = implode($data_s_1[0]);
    }else{
        $atimes_s_1 = date_default_timezone_get();
        $_times_s_1 = strtotime($atimes_s_1)*1000;
        $_data_s_1 = 0;
    }
    $prep_stmt_result_s_2 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 6 HOUR) GROUP BY date(time)';
    $stmt_result_s_2 = $core->dbh->prepare($prep_stmt_result_s_2);
    $stmt_result_s_2->execute();
    if ($stmt_result_s_2->fetchColumn() > 0){
        while($row_s_2 = $stmt_result_s_2->fetchAll(PDO::FETCH_NUM)){
                $times_s_2[]=array($row_s_2[0]);
                $data_s_2[]=array($row_s_2[1]); 
            }
            $atimes_s_2 = implode($times_s_2[0]);
            $_times_s_2 = strtotime($atimes_s_2)*1000;
            $_data_s_2 = implode($data_s_2[0]);
    }else{
        $atimes_s_2 = date_default_timezone_get();
        $_times_s_2 = strtotime($atimes_s_2)*1000;
        $_data_s_2 = 0;
    }
    $prep_stmt_result_s_3 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 5 HOUR) GROUP BY date(time)';
    $stmt_result_s_3 = $core->dbh->prepare($prep_stmt_result_s_3);
    $stmt_result_s_3->execute();
    if ($stmt_result_s_3->fetchColumn() > 0){
        while($row_s_3 = $stmt_result_s_3->fetchAll(PDO::FETCH_NUM)){
                $times_s_3[]=array($row_s_3[0]);
                $data_s_3[]=array($row_s_3[1]); 
            }
            $atimes_s_3 = implode($times_s_3[0]);
            $_times_s_3 = strtotime($atimes_s_3)*1000;
            $_data_s_3 = implode($data_s_3[0]);
    }else{
        $atimes_s_3 = date_default_timezone_get();
        $_times_s_3 = strtotime($atimes_s_3)*1000;
        $_data_s_3 = 0;
    }
    $prep_stmt_result_s_4 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 4 HOUR) GROUP BY date(time)';
    $stmt_result_s_4 = $core->dbh->prepare($prep_stmt_result_s_4);
    $stmt_result_s_4->execute();
    if ($stmt_result_s_4->fetchColumn() > 0){
        while($row_s_4 = $stmt_result_s_4->fetchAll(PDO::FETCH_NUM)){
                $times_s_4[]=array($row_s_4[0]);
                $data_s_4[]=array($row_s_4[1]); 
            }
            $atimes_s_4 = implode($times_s_4[0]);
            $_times_s_4 = strtotime($atimes_s_4)*1000;
            $_data_s_4 = implode($data_s_4[0]);
    }else{
        $atimes_s_4 = date_default_timezone_get();
        $_times_s_4 = strtotime($atimes_s_4)*1000;
        $_data_s_4 = 0;
    }
    $prep_stmt_result_s_5 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 3 HOUR) GROUP BY date(time)';
    $stmt_result_s_5 = $core->dbh->prepare($prep_stmt_result_s_5);
    $stmt_result_s_5->execute();
    if ($stmt_result_s_5->fetchColumn() > 0){
        while($row_s_5 = $stmt_result_s_5->fetchAll(PDO::FETCH_NUM)){
                $times_s_5[]=array($row_s_5[0]);
                $data_s_5[]=array($row_s_5[1]); 
            }
            $atimes_s_5 = implode($times_s_5[0]);
            $_times_s_5 = strtotime($atimes_s_5)*1000;
            $_data_s_5 = implode($data_s_5[0]);
    }else{
        $atimes_s_5 = date_default_timezone_get();
        $_times_s_5 = strtotime($atimes_s_5)*1000;
        $_data_s_5 = 0;
    }
    $prep_stmt_result_s_6 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 2 HOUR) GROUP BY date(time)';
    $stmt_result_s_6 = $core->dbh->prepare($prep_stmt_result_s_6);
    $stmt_result_s_6->execute();
    if ($stmt_result_s_6->fetchColumn() > 0){
        while($row_s_6 = $stmt_result_s_6->fetchAll(PDO::FETCH_NUM)){
                $times_s_6[]=array($row_s_6[0]);
                $data_s_6[]=array($row_s_6[1]); 
            }
            $atimes_s_6 = implode($times_s_6[0]);
            $_times_s_6 = strtotime($atimes_s_6)*1000;
            $_data_s_6 = implode($data_s_6[0]);
    }else{
        $atimes_s_6 = date_default_timezone_get();
        $_times_s_6 = strtotime($atimes_s_6)*1000;
        $_data_s_6 = 0;
    }
    $prep_stmt_result_s_7 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 1 HOUR) GROUP BY date(time)';
    $stmt_result_s_7 = $core->dbh->prepare($prep_stmt_result_s_7);
    $stmt_result_s_7->execute();
    if ($stmt_result_s_7->fetchColumn() > 0){
        while($row_s_7 = $stmt_result_s_7->fetchAll(PDO::FETCH_NUM)){
                $times_s_7[]=array($row_s_7[0]);
                $data_s_7[]=array($row_s_7[1]); 
            }
            $atimes_s_7 = implode($times_s_7[0]);
            $_times_s_7 = strtotime($atimes_s_7)*1000;
            $_data_s_7 = implode($data_s_7[0]);
    }else{
        $atimes_s_7 = date_default_timezone_get();
        $_times_s_7 = strtotime($atimes_s_7)*1000;
        $_data_s_7 = 0;
    }

    //Statistic for Phase T
    $prep_stmt_result_t_1 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 7 HOUR) GROUP BY date(time)';
    $stmt_result_t_1 = $core->dbh->prepare($prep_stmt_result_t_1);
    $stmt_result_t_1->execute();
    if ($stmt_result_t_1->fetchColumn() > 0){
        while($row_t_1 = $stmt_result_t_1->fetchAll(PDO::FETCH_NUM)){
                $times_t_1[]=array($row_t_1[0]);
                $data_t_1[]=array($row_t_1[1]); 
            }
            $atimes_t_1 = implode($times_t_1[0]);
            $_times_t_1 = strtotime($atimes_t_1)*1000;
            $_data_t_1 = implode($data_t_1[0]);
    }else{
        $atimes_t_1 = date_default_timezone_get();
        $_times_t_1 = strtotime($atimes_t_1)*1000;
        $_data_t_1 = 0;
    }
    $prep_stmt_result_t_2 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 6 HOUR) GROUP BY date(time)';
    $stmt_result_t_2 = $core->dbh->prepare($prep_stmt_result_t_2);
    $stmt_result_t_2->execute();
    if ($stmt_result_t_2->fetchColumn() > 0){
        while($row_t_2 = $stmt_result_t_2->fetchAll(PDO::FETCH_NUM)){
                $times_t_2[]=array($row_t_2[0]);
                $data_t_2[]=array($row_t_2[1]); 
            }
            $atimes_t_2 = implode($times_t_2[0]);
            $_times_t_2 = strtotime($atimes_t_2)*1000;
            $_data_t_2 = implode($data_t_2[0]);
    }else{
        $atimes_t_2 = date_default_timezone_get();
        $_times_t_2 = strtotime($atimes_t_2)*1000;
        $_data_t_2 = 0;
    }
    $prep_stmt_result_t_3 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 5 HOUR) GROUP BY date(time)';
    $stmt_result_t_3 = $core->dbh->prepare($prep_stmt_result_t_3);
    $stmt_result_t_3->execute();
    if ($stmt_result_t_3->fetchColumn() > 0){
        while($row_t_3 = $stmt_result_t_3->fetchAll(PDO::FETCH_NUM)){
                $times_t_3[]=array($row_t_3[0]);
                $data_t_3[]=array($row_t_3[1]); 
            }
            $atimes_t_3 = implode($times_t_3[0]);
            $_times_t_3 = strtotime($atimes_t_3)*1000;
            $_data_t_3 = implode($data_t_3[0]);
    }else{
        $atimes_t_3 = date_default_timezone_get();
        $_times_t_3 = strtotime($atimes_t_3)*1000;
        $_data_t_3 = 0;
    }
    $prep_stmt_result_t_4 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 4 HOUR) GROUP BY date(time)';
    $stmt_result_t_4 = $core->dbh->prepare($prep_stmt_result_t_4);
    $stmt_result_t_4->execute();
    if ($stmt_result_t_4->fetchColumn() > 0){
        while($row_t_4 = $stmt_result_t_4->fetchAll(PDO::FETCH_NUM)){
                $times_t_4[]=array($row_t_4[0]);
                $data_t_4[]=array($row_t_4[1]); 
            }
            $atimes_t_4 = implode($times_t_4[0]);
            $_times_t_4 = strtotime($atimes_t_4)*1000;
            $_data_t_4 = implode($data_t_4[0]);
    }else{
        $atimes_t_4 = date_default_timezone_get();
        $_times_t_4 = strtotime($atimes_t_4)*1000;
        $_data_t_4 = 0;
    }
    $prep_stmt_result_t_5 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 3 HOUR) GROUP BY date(time)';
    $stmt_result_t_5 = $core->dbh->prepare($prep_stmt_result_t_5);
    $stmt_result_t_5->execute();
    if ($stmt_result_t_5->fetchColumn() > 0){
        while($row_t_5 = $stmt_result_t_5->fetchAll(PDO::FETCH_NUM)){
                $times_t_5[]=array($row_t_5[0]);
                $data_t_5[]=array($row_t_5[1]); 
            }
            $atimes_t_5 = implode($times_t_5[0]);
            $_times_t_5 = strtotime($atimes_t_5)*1000;
            $_data_t_5 = implode($data_t_5[0]);
    }else{
        $atimes_t_5 = date_default_timezone_get();
        $_times_t_5 = strtotime($atimes_t_5)*1000;
        $_data_t_5 = 0;
    }
    $prep_stmt_result_t_6 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 2 HOUR) GROUP BY date(time)';
    $stmt_result_t_6 = $core->dbh->prepare($prep_stmt_result_t_6);
    $stmt_result_t_6->execute();
    if ($stmt_result_t_6->fetchColumn() > 0){
        while($row_t_6 = $stmt_result_t_6->fetchAll(PDO::FETCH_NUM)){
                $times_t_6[]=array($row_t_6[0]);
                $data_t_6[]=array($row_t_6[1]); 
            }
            $atimes_t_6 = implode($times_t_6[0]);
            $_times_t_6 = strtotime($atimes_t_6)*1000;
            $_data_t_6 = implode($data_t_6[0]);
    }else{
        $atimes_t_6 = date_default_timezone_get();
        $_times_t_6 = strtotime($atimes_t_6)*1000;
        $_data_t_6 = 0;
    }
    $prep_stmt_result_t_7 = 'SELECT time, AVG(watt) FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 1 HOUR) GROUP BY date(time)';
    $stmt_result_t_7 = $core->dbh->prepare($prep_stmt_result_t_7);
    $stmt_result_t_7->execute();
    if ($stmt_result_t_7->fetchColumn() > 0){
        while($row_t_7 = $stmt_result_t_7->fetchAll(PDO::FETCH_NUM)){
                $times_t_7[]=array($row_t_7[0]);
                $data_t_7[]=array($row_t_7[1]); 
            }
            $atimes_t_7 = implode($times_t_7[0]);
            $_times_t_7 = strtotime($atimes_t_7)*1000;
            $_data_t_7 = implode($data_t_7[0]);
    }else{
        $atimes_t_7 = date_default_timezone_get();
        $_times_t_7 = strtotime($atimes_t_7)*1000;
        $_data_t_7 = 0;
    }

?>

<script type="text/javascript">
$(function () {
    var dataR = [
        [<?=$_times_r_1?>, <?=$_data_r_1?>], 
        [<?=$_times_r_2?>, <?=$_data_r_2?>],
        [<?=$_times_r_3?>, <?=$_data_r_3?>], 
        [<?=$_times_r_4?>, <?=$_data_r_4?>],
        [<?=$_times_r_5?>, <?=$_data_r_5?>],
        [<?=$_times_r_6?>, <?=$_data_r_6?>],
        [<?=$_times_r_7?>, <?=$_data_r_7?>]
    ];

    var dataS = [
        [<?=$_times_s_1?>, <?=$_data_s_1?>], 
        [<?=$_times_s_2?>, <?=$_data_s_2?>],
        [<?=$_times_s_3?>, <?=$_data_s_3?>], 
        [<?=$_times_s_4?>, <?=$_data_s_4?>],
        [<?=$_times_s_5?>, <?=$_data_s_5?>],
        [<?=$_times_s_6?>, <?=$_data_s_6?>],
        [<?=$_times_s_7?>, <?=$_data_s_7?>]
    ];

    var dataT = [
        [<?=$_times_t_1?>, <?=$_data_t_1?>], 
        [<?=$_times_t_2?>, <?=$_data_t_2?>],
        [<?=$_times_t_3?>, <?=$_data_t_3?>], 
        [<?=$_times_t_4?>, <?=$_data_t_4?>],
        [<?=$_times_t_5?>, <?=$_data_t_5?>],
        [<?=$_times_t_6?>, <?=$_data_t_6?>],
        [<?=$_times_t_7?>, <?=$_data_t_7?>]
    ];

    var previousPoint = null;

    $.fn.UseTooltip = function () {
        $(this).bind("plothover", function (event, pos, item) {                         
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
    
                    $("#tooltip").remove();
                    
                    var x = Math.floor((item.datapoint[0] %= 86400) / 3600);
                    var y = item.datapoint[1];                
    
                    console.log(x+","+y)
    
                    showTooltip(item.pageX, item.pageY,
                    x + "<br/>" + "<strong>" + y + "</strong> (" + item.series.label + ")");
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 20,
            border: '2px solid #4572A7',
            padding: '2px',     
            size: '10',   
            'border-radius': '6px 6px 6px 6px',
            'background-color': '#fff',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }
    
    var epochT = (new Date).getTime();

    $.plot($("#statPhaseR"), [dataR], {
        xaxis: {
            mode: "time",
            timeformat: "%H:%M",
            tickSize: [2, "hour"],
            twelveHourClock: true,
            min: epochT - 86400000,
            max: epochT,
            timezone: "browser"
        },
        series: {
        label : "Watt",
        lines: { show: true },
        points: { show: true }
        },
        grid: { 
        hoverable: true, 
        clickable: true 
        }
    });

    $("#statPhaseR").UseTooltip();

    $.plot($("#statPhaseS"), [dataS], {
        xaxis: {
            mode: "time",
            timeformat: "%H:%M",
            tickSize: [2, "hour"],
            twelveHourClock: true,
            min: epochT - 86400000,
            max: epochT,
            timezone: "browser"
        },
        series: {
        label : "Watt",
        lines: { show: true },
        points: { show: true }
        },
        grid: { 
        hoverable: true, 
        clickable: true 
        }
    });

    $("#statPhaseS").UseTooltip();

    $.plot($("#statPhaseT"), [dataT], {
        xaxis: {
            mode: "time",
            timeformat: "%H:%M",
            tickSize: [2, "hour"],
            twelveHourClock: true,
            min: epochT - 86400000,
            max: epochT,
            timezone: "browser"
        },
        series: {
        label : "Watt",
        lines: { show: true },
        points: { show: true }
        },
        grid: { 
        hoverable: true, 
        clickable: true 
        }
    });

    $("#statPhaseT").UseTooltip();
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
                                Statistic
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Statistic<span class="divider-last">&nbsp;</span>
                                </li>
                                <li class="pull-right search-wrap"></li>
                            </ul>
                        </div>
                    </div>

                    <div id="page" class="dashboard">
                        <div class="row-fluid">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Statistic Report Phase R</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="statPhaseR" class="chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Statistic Report Phase S</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="statPhaseS" class="chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bolt"></i> Statistic Report Phase T</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div id="site_statistics_content" class="show">
                                        <div id="statPhaseT" class="chart"></div>
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