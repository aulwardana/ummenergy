<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
include_once('includes/Mail.php');
include_once('includes/Mail/mime.php');

$user_id = $_SESSION['user_id'];
$time = gmdate("Y-m-d\TH:i:s\Z");

if (isset($_POST['backup'])) {
    $dbhost = Config::read('db.host');
    $dbuser = Config::read('db.user');
    $dbpass = Config::read('db.password');
    $dbname = Config::read('db.basename');
    $sendto = "Webmaster <$email>";
    $sendfrom = "Database Backup <notification@ummenergy.com>";
    $sendsubject = "Daily Database Backup";
    $bodyofemail = "Here is the backup for $time.";

	backup_database_tables($dbhost,$dbuser,$dbpass,$dbname, '*');
	
	function backup_database_tables($host,$user,$pass,$name,$tables){
	     
	    $link = mysql_connect($host,$user,$pass);
	    mysql_select_db($name,$link);
	     
	    //get all of the tables
	    if($tables == '*'){
	        $tables = array();
	        $result = mysql_query('SHOW TABLES');
	        while($row = mysql_fetch_row($result)){
	            $tables[] = $row[0];
	        }
	    }
	    else{
	        $tables = is_array($tables) ? $tables : explode(',',$tables);
	    }
	     
	    //cycle through each table and format the data
	    foreach($tables as $table){
	        $result = mysql_query('SELECT * FROM '.$table);
	        $num_fields = mysql_num_fields($result);
	         
	        $return.= 'DROP TABLE '.$table.';';
	        $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
	        $return.= "\n\n".$row2[1].";\n\n";
	         
	        for ($i = 0; $i < $num_fields; $i++){
	            while($row = mysql_fetch_row($result)){
	                $return.= 'INSERT INTO '.$table.' VALUES(';
	                for($j=0; $j<$num_fields; $j++){
	                    $row[$j] = addslashes($row[$j]);
	                    $row[$j] = ereg_replace("\n","\\n",$row[$j]);
	                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
	                    if ($j<($num_fields-1)) { $return.= ','; }
	                }
	                $return.= ");\n";
	            }
	        }
	        $return.="\n\n\n";
	    }
	     
	    //save the file
	    $handler = fopen(date("Y-m-d").'.sql','w+');
	    fwrite($handler,$return);
	    fclose($handler);
	}
	$backupfile = date("Y-m-d").'.sql';
    
    //mail sender
	$message = new Mail_mime();
	$text = "$bodyofemail";
	$message->setTXTBody($text);
	$message->AddAttachment($backupfile);
	$body = $message->get();
	$extraheaders = array("From"=>"$sendfrom", "Subject"=>"$sendsubject");
	$headers = $message->headers($extraheaders);
	$mail = Mail::factory("mail");
	$mail->send("$sendto", $headers, $body);
	
    unlink($backupfile);

    $prep_stmt_db = "UPDATE account SET date_backup_db = :date_backup_db WHERE id_account = :id";
    $db_stmt = $core->dbh->prepare($prep_stmt_db);
    $db_stmt->bindParam(':date_backup_db', $time);
    $db_stmt->bindParam(':id', $user_id);
    if ($db_stmt->execute()) {
        header('Location: ./settings.php');
        exit();
    }
}
?>

        <div id="container" class="row-fluid">
            <?php 
            include_once('includes/_sidebar.php');
            ?>
            <!--BEGIN CONTENT-->
            <div id="main-content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <h3 class="page-title">
                                Settings
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Microhydro Monitoring<span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    Settings<span class="divider-last">&nbsp;</span>
                                </li>
                                <li class="pull-right search-wrap"></li>
                            </ul>
                        </div>
                    </div>

                    <div id="page" class="dashboard">
                        <div class="row-fluid">
                            <div class="widget">
                                <form action="settings.php" method="post">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i> Email Notification </h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body form">
                                        <div class="control-group">
                                            <label class="control-label">Status : Deactive</label>
                                            <label class="control-label">Send To : <?php echo $email ?></label>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" value="Active" name="submit" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="widget">
                                <form action="settings.php" method="post">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i> Backup Database via Email </h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body form">
                                        <div class="control-group">		
                                            <label class="control-label">Last Database Backup : <?php echo $dbbackup ?></label>
                                            <label class="control-label">Send To : <?php echo $email ?></label>
                                            <input type='hidden' name ='backup'>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" value="Backup Now" name="submit" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--FINISH CONTENT-->
        </div>

<?php 
include_once('includes/_footer.php');
?>