<?php
   include("../includes/_connect-db.php");

   $core = Core::getInstance();
   $status = "1";

   if (isset($_POST['notif'])) {
        $notif = filter_input(INPUT_POST, 'notif', FILTER_SANITIZE_STRING);

        $subject = "Notification UMMEnergy";
        $message = $notif;
        $header = "From:notification@ummenergy.com \r\n";

        if ($stmt = $core->dbh->prepare("SELECT email FROM account WHERE notification = :statuss")) {
            $stmt->bindParam(':statuss', $status);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
              $row = $stmt->fetchAll(PDO::FETCH_NUM);
 
              foreach($row as $row){
                  $email=$row[0];
                  $to = $email;
                  mail ($to,$subject,$message,$header);
              }
            }
        }
  
    }
?>