<?php 
  include("../includes/_connect-db.php");
  
  $core = Core::getInstance();
  
  $prep_stmt_temp = 'SELECT * FROM temperature WHERE time > DATE_SUB(NOW() , INTERVAL 20 SECOND) ORDER BY time desc';
  $stmt_temp = $core->dbh->prepare($prep_stmt_temp);
  $stmt_temp->execute();
  $row = $stmt_temp->fetch(PDO::FETCH_NUM);
    
  if ($stmt_temp->fetch(PDO::FETCH_NUM) > 0){
	  printf ("{\"temperature\": %s}",$row[2]); 
  }else {
    printf ("{\"temperature\": 0}");
  }

?>