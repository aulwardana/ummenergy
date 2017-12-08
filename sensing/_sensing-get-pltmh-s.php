<?php
   include("../includes/_connect-db.php");

   $core = Core::getInstance();

   if (isset($_POST['watt'], $_POST['voltampere'], $_POST['cosphi'], $_POST['volt'], $_POST['ampere'])) {
        $watt = filter_input(INPUT_POST, 'watt', FILTER_SANITIZE_STRING);
        $voltampere= filter_input(INPUT_POST, 'voltampere', FILTER_SANITIZE_STRING);
        $cosphi= filter_input(INPUT_POST, 'cosphi', FILTER_SANITIZE_STRING);
        $volt = filter_input(INPUT_POST, 'volt', FILTER_SANITIZE_STRING);
        $ampere = filter_input(INPUT_POST, 'ampere', FILTER_SANITIZE_STRING);

        if (empty($msg)) {
  
            if ($insert_stmt = $core->dbh->prepare("INSERT INTO pltmh_data_s (watt, voltampere, cosphi, volt, ampere) VALUES (?, ?, ?, ?, ?)")) {
                $insert_stmt->bindParam('1', $watt);
                $insert_stmt->bindParam('2', $voltampere);
                $insert_stmt->bindParam('3', $cosphi);
                $insert_stmt->bindParam('4', $volt);
                $insert_stmt->bindParam('5', $ampere);
                if (! $insert_stmt->execute()) {
                    exit();
                }
            }
  
            header ("location:./_sensing-get-pltmh-s.php");
            exit();
        }
  
    }
?>