<?php
   include("../includes/_connect-db.php");

   $core = Core::getInstance();

   if (isset($_POST['temp'])) {
        $temp = filter_input(INPUT_POST, 'temp', FILTER_SANITIZE_STRING);

        if (empty($msg)) {
  
            if ($insert_stmt = $core->dbh->prepare("INSERT INTO temperature (celcius) VALUES (?)")) {
                $insert_stmt->bindParam('1', $temp);
                if (! $insert_stmt->execute()) {
                    exit();
                }
            }
  
            header ("location:./_sensing-get-temp.php");
            exit();
        }
  
    }
?>