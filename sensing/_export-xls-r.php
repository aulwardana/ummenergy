<?php
include_once('../includes/_connect-db.php');

$core = Core::getInstance();

$prep_stmt_xls = "SELECT * FROM pltmh_data_r WHERE time >= DATE_FORMAT('" .$_POST["from"]. "', '%Y/%m/%d') AND time <=  DATE_FORMAT('" .$_POST["to"]. "', '%Y/%m/%d')";
$stmt_xls = $core->dbh->prepare($prep_stmt_xls);
$stmt_xls->execute();

$header = '';
$data ='';

//$fields = $stmt_xls->fetchColumn();

foreach ( range(0, $stmt_xls->columnCount() - 1) as $column_index ){
    $all_column_header[] = $stmt_xls->getColumnMeta($column_index);
    $column_header[] = implode(',', $all_column_header[$column_index]);
}

foreach ($column_header as $aa) {
    $header .= $aa . "\t";
}

while($row = $stmt_xls->fetch(PDO::FETCH_NUM)){
    $line = '';
    foreach( $row as $column_index => $value ){                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) ){
            $value = "\t";
        } else {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" ){
    $data = "\nNo Record(s) Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export_phase_r.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>