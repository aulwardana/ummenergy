<?php
   include("../includes/_connect-db.php");

   $core = Core::getInstance();

   if (isset($_GET['watt'], $_GET['voltampere'], $_GET['cosphi'], $_GET['volt'], $_GET['ampere'])) {
        $watt = filter_input(INPUT_GET, 'watt', FILTER_SANITIZE_STRING);
        $voltampere= filter_input(INPUT_GET, 'voltampere', FILTER_SANITIZE_STRING);
        $cosphi= filter_input(INPUT_GET, 'cosphi', FILTER_SANITIZE_STRING);
        $volt = filter_input(INPUT_GET, 'volt', FILTER_SANITIZE_STRING);
        $ampere = filter_input(INPUT_GET, 'ampere', FILTER_SANITIZE_STRING);

        if (empty($msg)) {
  
            if ($insert_stmt = $core->dbh->prepare("INSERT INTO pltmh_data_r (watt, voltampere, cosphi, volt, ampere) VALUES (?, ?, ?, ?, ?)")) {
                $insert_stmt->bindParam('1', $watt);
                $insert_stmt->bindParam('2', $voltampere);
                $insert_stmt->bindParam('3', $cosphi);
                $insert_stmt->bindParam('4', $volt);
                $insert_stmt->bindParam('5', $ampere);
                if (! $insert_stmt->execute()) {
                    exit();
                }
            }
  
            header ("location:./_sensing-get-pltmh-r.php");
            exit();
        }
  
    }
?>