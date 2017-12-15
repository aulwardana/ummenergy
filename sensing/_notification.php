<?php
   include("../includes/_connect-db.php");
   include_once('Mail.php');
   include_once('Mail/mime.php');

   $core = Core::getInstance();
   $status = "1";

   if (isset($_POST['notif'])) {
        $notif = filter_input(INPUT_POST, 'notif', FILTER_SANITIZE_STRING);
        
        $sendfrom = "Platform Notif <notification@ummenergy.com>";
        $sendsubject = "Device Notification";
        $bodyofemail = "Notification : $notif.";

        if ($stmt = $core->dbh->prepare("SELECT email FROM account WHERE notification = :statuss")) {
            $stmt->bindParam(':statuss', $status);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
              $row = $stmt->fetchAll(PDO::FETCH_NUM);
 
              foreach($row as $row){
                  $email=$row[0];
                  $sendto = "Webmaster <$email>";
                  $message = new Mail_mime();
                  $text = "$bodyofemail";
                  $message->setTXTBody($text);
                  $message->AddAttachment($backupfile);
                  $body = $message->get();
                  $extraheaders = array("From"=>"$sendfrom", "Subject"=>"$sendsubject");
                  $headers = $message->headers($extraheaders);
                  $mail = Mail::factory("mail");
                  $mail->send("$sendto", $headers, $body);
              }
            }
        }
  
    }
?>