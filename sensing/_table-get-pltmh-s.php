<?php
include("../includes/_connect-db.php");

$core = Core::getInstance();

$prep_stmt_table = 'SELECT * FROM pltmh_data_s ORDER BY id DESC';
$stmt_table = $core->dbh->prepare($prep_stmt_table);
$stmt_table->execute();

while($row = $stmt_table->fetch(PDO::FETCH_NUM)){
        $table_data['data'][] = $row ;
}

echo json_encode($table_data);
?>