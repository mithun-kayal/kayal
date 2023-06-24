<?php  namespace connection;

$GLOBALS['dbConfig'] = include_once('database/dbConfig.php');
class MysqlConnection {
    function mysql_connection($host, $user, $paswored, $databaseName) {
        try
        {
            return mysqli_connect($host, $user, $paswored, $databaseName);
        } catch (Exception $e) {
            $bt = debug_backtrace();
            $caller = array_shift($bt); // Get first array
            
            echo ('<div class="show-error-message"><h3>
            Fatal error: Connection faild..!!!</h3><h4> error from <b>
            <span style="color:red">'.$caller['file'].'</span> on line <span style="color:red">'.$caller['line'].'</span></b></h4></div>');
            exit();
        }
    }
}
if(isset($GLOBALS['dbConfig']['default'])) {
    $dbInfo = $GLOBALS['dbConfig']['default'];
    $port = isset($dbInfo['port'])?':'.$dbInfo['port']:"";
    $GLOBALS['defaultConnection'] = MysqlConnection::mysql_connection($dbInfo['host'].$port, $dbInfo['user'], $dbInfo['password'], $dbInfo['databaseName'], $dbInfo['port']);
} else {
    $bt = debug_backtrace();
    $caller = array_shift($bt); // Get first array
    
    echo ('<div class="show-error-message"><h3>
    Fatal error: Wrong conection name of <span style="color:blue;font-size: 16px;"><strong>default</strong></span>. Please include connection into database/dbConfig.php.</h3><h4> error from <b>
    <span style="color:red">'.$caller['file'].'</span> on line <span style="color:red">'.$caller['line'].'</span></b></h4></div>');
    exit();
}

class Connection
{
    function __construct() {}
    function createNewConnection($conectionName){
        if(isset($GLOBALS['dbConfig'][$conectionName])) {
            $dbInfo = $GLOBALS['dbConfig'][$conectionName];
            $port = isset($dbInfo['port'])?':'.$dbInfo['port']:"";
            return MysqlConnection::mysql_connection($dbInfo['host'].$port, $dbInfo['user'], $dbInfo['password'], $dbInfo['databaseName']);
        } else {
            $bt = debug_backtrace();
            $caller = array_shift($bt); // Get first array
            
            echo ('<div class="show-error-message"><h3>
            Fatal error: Wrong conection name of <span style="color:blue;font-size: 16px;"><strong>'.$conectionName.'</strong></span>. Please include connection into database/dbConfig.php.</h3><h4> error from <b>
            <span style="color:red">'.$caller['file'].'</span> on line <span style="color:red">'.$caller['line'].'</span></b></h4></div>');
            exit();
        }
    }
    function defaultConnection() {
        return $GLOBALS['defaultConnection'];
    }

}
