<?php 
  include("../includes/_connect-db.php");
  
  $core = Core::getInstance();
  
  $prep_stmt_sensing = 'SELECT * FROM pltmh_data WHERE time > DATE_SUB(NOW() , INTERVAL 20 SECOND) ORDER BY time desc';
  $stmt_sensing = $core->dbh->prepare($prep_stmt_sensing);
  $stmt_sensing->execute();
  $row = $stmt_sensing->fetch(PDO::FETCH_NUM);
    
  if ($stmt_sensing->fetch(PDO::FETCH_NUM) > 0){
	  printf ("{\"watt\": %s, \"voltampere\": %s, \"cosphi\": %s, \"vrms\": %s, \"irms\": %s}",$row[2],$row[3],$row[4],$row[5],$row[6]); 
  }else {
    printf ("{\"watt\": 0, \"voltampere\": 0, \"cosphi\": 0, \"vrms\": 0, \"irms\": 0}");
  }

?>