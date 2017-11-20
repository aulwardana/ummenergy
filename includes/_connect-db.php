<?php 
//securing include file from direct access
if (strstr($_SERVER["PHP_SELF"], "/includes/")) {
    die ("Istighfar, jangan di hack. Makasih :)");
}

/*
This configuration file for database connection.
Please note, you must grant all previlegae for user that you use for this configuration.
Do not use root to use this user database access.
*/
class Config{
    static $confArray;

    public static function read($name){
        return self::$confArray[$name];
    }

    public static function write($name, $value){
        self::$confArray[$name] = $value;
    }

}

Config::write('db.host', '127.0.0.1');
Config::write('db.basename', 'pltmh_db');
Config::write('db.user', 'root');
Config::write('db.password', '');

class Core{
    public $dbh; 
    private static $instance;

    private function __construct(){
        // building data source name from config
        $dsn = 'mysql:host=' . Config::read('db.host') .
               ';dbname='    . Config::read('db.basename') ;
        // getting DB user from config                
        $user = Config::read('db.user');
        // getting DB password from config                
        $password = Config::read('db.password');

        $this->dbh = new PDO($dsn, $user, $password);
    }

    public static function getInstance(){
        if (!isset(self::$instance)){
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}
?>
