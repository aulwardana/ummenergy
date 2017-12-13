<?php
include_once('includes/_connect-db.php');

class PHPCount{
   
    const HIT_OLD_AFTER_SECONDS = 2592000;
    const IGNORE_SEARCH_BOTS = true;
    const HONOR_DO_NOT_TRACK = false;

    private static $IP_IGNORE_LIST = array(
        '127.0.0.1',
    );

    public static function AddHit($pageID)
    {
        if(self::IGNORE_SEARCH_BOTS && self::IsSearchBot())
            return false;
        if(in_array($_SERVER['REMOTE_ADDR'], self::$IP_IGNORE_LIST))
            return false;
        if(
            self::HONOR_DO_NOT_TRACK &&
            isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT'] == "1"
        ) {
            return false;
        }

        self::Cleanup();
        self::CreateCountsIfNotPresent($pageID);
        if(self::UniqueHit($pageID))
        {
            self::CountHit($pageID, true);
            self::LogHit($pageID);
        }
        self::CountHit($pageID, false);

        return true;
    }
    
    public static function GetHits($pageID, $unique = false)
    {
        $core = Core::getInstance();
        self::CreateCountsIfNotPresent($pageID);

        $q = $core->dbh->prepare(
            'SELECT hitcount FROM hits
             WHERE pageid = :pageid AND isunique = :isunique'
        );
        $q->bindParam(':pageid', $pageID);
        $q->bindParam(':isunique', $unique);
        $q->execute();

        if(($res = $q->fetch()) !== FALSE)
        {
            return (int)$res['hitcount'];
        }
        else
        {
            die("Missing hit count from database!");
            return false;
        }
    }
    
    public static function GetTotalHits($unique = false)
    {
        $core = Core::getInstance();
        $q = $core->dbh->prepare(
            'SELECT hitcount FROM hits WHERE isunique = :isunique'
        );
        $q->bindParam(':isunique', $unique);
        $q->execute();
        $rows = $q->fetchAll();

        $total = 0;
        foreach($rows as $row)
        {
            $total += (int)$row['hitcount'];
        }
        return $total;
    }
    
    private static function IsSearchBot()
    {
        $keywords = array(
            'bot',
            'spider',
            'spyder',
            'crawlwer',
            'walker',
            'search',
            'yahoo',
            'holmes',
            'htdig',
            'archive',
            'tineye',
            'yacy',
            'yeti',
        );

        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);

        foreach($keywords as $keyword) 
        {
            if(strpos($agent, $keyword) !== false)
                return true;
        }

        return false;
    }

    private static function UniqueHit($pageID)
    {
        $core = Core::getInstance();
        $ids_hash = self::IDHash($pageID);

        $q = $core->dbh->prepare(
            'SELECT time FROM nodupes WHERE ids_hash = :ids_hash'
        );
        $q->bindParam(':ids_hash', $ids_hash);
        $q->execute();

        if(($res = $q->fetch()) !== false)
        {
            if($res['time'] > time() - self::HIT_OLD_AFTER_SECONDS)
                return false;
            else
                return true;
        }
        else
        {
            return true;
        }
    }
    
    private static function LogHit($pageID)
    {
        $core = Core::getInstance();
        $ids_hash = self::IDHash($pageID);

        $q = $core->dbh->prepare(
            'SELECT time FROM nodupes WHERE ids_hash = :ids_hash'
        );
        $q->bindParam(':ids_hash', $ids_hash);
        $q->execute();

        $curTime = time();

        if(($res = $q->fetch()) !== false)
        {
            $s = $core->dbh->prepare(
                'UPDATE nodupes SET time = :time WHERE ids_hash = :ids_hash'
            );
            $s->bindParam(':time', $curTime);
            $s->bindParam(':ids_hash', $ids_hash);
            $s->execute();
        }
        else
        {
            $s = $core->dbh->prepare(
                'INSERT INTO nodupes (ids_hash, time)
                 VALUES( :ids_hash, :time )'
            );
            $s->bindParam(':time', $curTime);
            $s->bindParam(':ids_hash', $ids_hash);
            $s->execute();
        }
    }
    
    private static function CountHit($pageID, $unique)
    {
        $core = Core::getInstance();
        $q = $core->dbh->prepare(
            'UPDATE hits SET hitcount = hitcount + 1 ' .
            'WHERE pageid = :pageid AND isunique = :isunique'
        );
        $q->bindParam(':pageid', $pageID);
        $unique = $unique ? '1' : '0';
        $q->bindParam(':isunique', $unique);
        $q->execute();
    }
    
    private static function IDHash($pageID)
    {
        $visitorID = $_SERVER['REMOTE_ADDR'];
        return hash("SHA256", $pageID . $visitorID);
    }
    
    private static function CreateCountsIfNotPresent($pageID)
    {
        $core = Core::getInstance();
        
        // Non-unique
        $q = $core->dbh->prepare(
            'SELECT pageid FROM hits WHERE pageid = :pageid AND isunique = 0'
        );
        $q->bindParam(':pageid', $pageID);
        $q->execute();

        if($q->fetch() === false)
        {
            $s = $core->dbh->prepare(
                'INSERT INTO hits (pageid, isunique, hitcount) 
                 VALUES (:pageid, 0, 0)'
            );
            $s->bindParam(':pageid', $pageID);
            $s->execute();
        }

        // Unique
        $q = $core->dbh->prepare(
            'SELECT pageid FROM hits WHERE pageid = :pageid AND isunique = 1'
        );
        $q->bindParam(':pageid', $pageID);
        $q->execute();

        if($q->fetch() === false)
        {
            $s = $core->dbh->prepare(
                'INSERT INTO hits (pageid, isunique, hitcount) 
                 VALUES (:pageid, 1, 0)'
            );
            $s->bindParam(':pageid', $pageID);
            $s->execute();
        }
    }
    
    private static function Cleanup()
    {
        $core = Core::getInstance();
        $last_interval = time() - self::HIT_OLD_AFTER_SECONDS;

        $q = $core->dbh->prepare(
            'DELETE FROM nodupes WHERE time < :time'
        );
        $q->bindParam(':time', $last_interval);
        $q->execute();
    }
}
