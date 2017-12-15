<?php
include_once('../includes/_connect-db.php');

$con = mysql_connect(Config::read('db.host'),Config::read('db.user'),Config::read('db.password'));
mysql_select_db(Config::read('db.basename'),$con);

$query = "SELECT * FROM pltmh_data_t WHERE time >= DATE_FORMAT('" .$_POST["from"]. "', '%Y/%m/%d') AND time <=  DATE_FORMAT('" .$_POST["to"]. "', '%Y/%m/%d')";
$header = '';
$data ='';
$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );

$fields = mysql_num_fields ( $export );

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}

while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export_phase_t.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>