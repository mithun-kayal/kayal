<?php  namespace server;

use server\Table as Table;
use connection\Connection as Connection;

class DB extends Connection {
    function connection($conectionName) {
        $DB = [];
        settype($DB, "object");
        $DB->conection = parent::createNewConnection($conectionName);
        
        return new Table($DB);
    }
    function table($argument) {
        $DB = [];
        settype($DB, "object");
        $DB->conection = parent::defaultConnection();
        $table = new Table($DB);
        return $table->table($argument);
    }
}
