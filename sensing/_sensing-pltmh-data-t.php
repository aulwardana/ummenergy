<?php 
  include("../includes/_connect-db.php");
  
  $core = Core::getInstance();
  
  $prep_stmt_sensing = 'SELECT * FROM pltmh_data_t WHERE time > DATE_SUB(NOW() , INTERVAL 20 SECOND) ORDER BY time desc';
  $stmt_sensing = $core->dbh->prepare($prep_stmt_sensing);
  $stmt_sensing->execute();
  $row = $stmt_sensing->fetch(PDO::FETCH_NUM);
    
  if ($stmt_sensing->fetch(PDO::FETCH_NUM) > 0){
	  printf ("{\"wattT\": %s, \"voltampereT\": %s, \"cosphiT\": %s, \"vrmsT\": %s, \"irmsT\": %s}",$row[2],$row[3],$row[4],$row[5],$row[6]); 
  }else {
    printf ("{\"wattT\": 0, \"voltampereT\": 0, \"cosphiT\": 0, \"vrmsT\": 0, \"irmsT\": 0}");
  }

?>