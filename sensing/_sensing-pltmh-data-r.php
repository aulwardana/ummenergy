<?php 
  include("../includes/_connect-db.php");
  
  $core = Core::getInstance();
  
  $prep_stmt_sensing = 'SELECT * FROM pltmh_data_r WHERE time > DATE_SUB(NOW() , INTERVAL 20 SECOND) ORDER BY time desc';
  $stmt_sensing = $core->dbh->prepare($prep_stmt_sensing);
  $stmt_sensing->execute();
  $row = $stmt_sensing->fetch(PDO::FETCH_NUM);
    
  if ($stmt_sensing->fetch(PDO::FETCH_NUM) > 0){
	  printf ("{\"wattR\": %s, \"voltampereR\": %s, \"cosphiR\": %s, \"vrmsR\": %s, \"irmsR\": %s}",$row[2],$row[3],$row[4],$row[5],$row[6]); 
  }else {
    printf ("{\"wattR\": 0, \"voltampereR\": 0, \"cosphiR\": 0, \"vrmsR\": 0, \"irmsR\": 0}");
  }

?>