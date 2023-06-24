<?php  namespace server;
try
{
    class mysqli_function {
        private $DB = [];
        function __construct($DB) {
            $this->DB = $DB;
            return $this->DB;
        }
        
        public function select(){
            $args = func_get_args();
            if(count($args)>0){
                $this->DB->select = implode(',', $args);
            } else {
                $this->DB->select = "*";
            }
            
            return $this;
        }
        public function join() {
            $args = func_get_args();
            $setJoin = "ERROR: Wrong condition join";
            if(count($args) == 4){
                $setJoin = $args[0]." ON ".$args[1]." ".$args[2]." ".$args[3];
            }
            if(isset($this->DB->join) && !empty($this->DB->join)){
                $this->DB->innerJoin .= " INNER JOIN ". $setJoin;
            } else {
                $this->DB->innerJoin = $setJoin;
            }
            return $this;
        }
        public function innerJoin(){
            $args = func_get_args();
            $setJoin = "ERROR: Wrong condition join";
            if(count($args) == 4){
                $setJoin = $args[0]." ON ".$args[1]." ".$args[2]." ".$args[3];
            }
            if(isset($this->DB->join) && !empty($this->DB->join)){
                $this->DB->innerJoin .= " INNER JOIN ". $setJoin;
            } else {
                $this->DB->innerJoin = $setJoin;
            }
            return $this;
        }
        public function leftJoin(){
            $args = func_get_args();
            $setJoin = "ERROR: Wrong condition join";
            if(count($args) == 4){
                $setJoin = $args[0]." ON ".$args[1]." ".$args[2]." ".$args[3];
            }
            if(isset($this->DB->join) && !empty($this->DB->join)){
                $this->DB->leftJoin .= " LEFT JOIN ". $setJoin;
            } else {
                $this->DB->leftJoin = $setJoin;
            }
            return $this;
        }
        public function rightJoin(){
            $args = func_get_args();
            $setJoin = "ERROR: Wrong condition join";
            if(count($args) == 4){
                $setJoin = $args[0]." ON ".$args[1]." ".$args[2]." ".$args[3];
            }
            if(isset($this->DB->join) && !empty($this->DB->join)){
                $this->DB->rightJoin .= " RIGHT JOIN ". $setJoin;
            } else {
                $this->DB->rightJoin = $setJoin;
            }
            return $this;
        }
        public function fullJoin(){
            $args = func_get_args();
            $setJoin = "ERROR: Wrong condition join";
            if(count($args) == 4){
                $setJoin = $args[0]." ON ".$args[1]." ".$args[2]." ".$args[3];
            }
            if(isset($this->DB->join) && !empty($this->DB->join)){
                $this->DB->fullJoin .= " FULL OUTER JOIN ". $setJoin;
            } else {
                $this->DB->fullJoin = $setJoin;
            }
            return $this;
        }
        public function where(){
            $args = func_get_args();
            $setCondition = "ERROR: Wrong condition";
            if(count($args) == 2){
                $argValue = (gettype($args[1])=='string')?"'".$args[1]."'":$args[1];
                $setCondition = $args[0]."=".$argValue;
            } else if(count($args) == 3){
                $argValue = (gettype($args[2])=='string')?"'".$args[2]."'":$args[2];
                $setCondition = $args[0]." ".$args[1]." ".$argValue;
            }
            if(isset($this->DB->where) && !empty($this->DB->where)){
                $this->DB->where .=  ' AND '.$setCondition;
            } else {
                $this->DB->where = $setCondition;
            }
            return $this;
        }
        public function whereNull($field){
            if(isset($this->DB->where) && !empty($this->DB->where)){
                $this->DB->where .=  ' AND '.$field." IS NULL ";
            } else {
                $this->DB->where = $field." IS NULL ";
            }
            return $this;
        }
        public function whereNotNull($field) {
            if(isset($this->DB->where) && !empty($this->DB->where)){
                $this->DB->where .=  ' AND '.$field." IS NOT NULL ";
            } else {
                $this->DB->where = $field." IS NOT NULL ";
            }
            return $this;
        }
        public function whereRaw($condition){
            if(isset($this->DB->where) && !empty($this->DB->where)){
                $this->DB->where .= " ".$condition;
            } else {
                $this->DB->where = $condition;
            }
            return $this;
        }
        public function groupBy($field){
            $this->DB->groupBy = $field;
            return $this;
        }
        public function orderBy($field,$order='asc'){
            $this->DB->orderBy = $field." ".$order;
            return $this;
        }
        public function limit($number){
            $this->DB->limit = $number;
            return $this;
        }
        public function offset($number){
            $this->DB->offset = $number;
            return $this;
        }
        public function unsetSql() {
            if(isset($this->DB->table)) unset($this->DB->table);
            if(isset($this->DB->select)) unset($this->DB->select);
            if(isset($this->DB->innerJoin)) unset($this->DB->innerJoin);
            if(isset($this->DB->leftJoin)) unset($this->DB->leftJoin);
            if(isset($this->DB->rightJoin)) unset($this->DB->rightJoin);
            if(isset($this->DB->fullJoin)) unset($this->DB->fullJoin);
            if(isset($this->DB->where)) unset($this->DB->where);
            if(isset($this->DB->groupBy)) unset($this->DB->groupBy);
            if(isset($this->DB->orderBy)) unset($this->DB->orderBy);
            if(isset($this->DB->limit)) unset($this->DB->limit);
            if(isset($this->DB->offset)) unset($this->DB->offset);
            return true;
        }
        public function toSql() {
            $sql = "SELECT ";
            $sql .= isset($this->DB->select)?$this->DB->select:"*";
            $sql .= " FROM ".$this->DB->table;

            $sql .= isset($this->DB->innerJoin)?" INNER JOIN ".$this->DB->innerJoin." ":"";
            $sql .= isset($this->DB->leftJoin)?" LEFT JOIN ".$this->DB->leftJoin." ":"";
            $sql .= isset($this->DB->rightJoin)?" RIGHT JOIN ".$this->DB->rightJoin." ":"";
            $sql .= isset($this->DB->fullJoin)?" FULL OUTER JOIN ".$this->DB->fullJoin." ":"";

            $sql .= isset($this->DB->where)?" WHERE ".$this->DB->where." ":"";

            $sql .= isset($this->DB->groupBy)?" GROUP BY ".$this->DB->groupBy." ":"";
            $sql .= isset($this->DB->orderBy)?" ORDER BY ".$this->DB->orderBy." ":"";

            $sql .= isset($this->DB->limit)?" LIMIT ".$this->DB->limit." ":"";
            $sql .= isset($this->DB->offset)?" OFFSET ".$this->DB->offset." ":"";
            
            $this->unsetSql();
            return $sql;
        }
        public function get() {
            $sql = $this->toSql();

            $result = mysqli_query($this->DB->conection,$sql);
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        public function first() {
            $sql = $this->toSql();

            $result = mysqli_query($this->DB->conection,$sql);
            return mysqli_fetch_assoc($result);
        }
        public function count() {
            $sql = $this->toSql();
            $result = mysqli_query($this->DB->conection,$sql);
            return count(mysqli_fetch_all($result,MYSQLI_ASSOC));
        }
        
        function removeSqlNullValue($prArray) {
            $returnArray = array();
            foreach($prArray as $key=>$value){
                if($value !== null) {
                    $returnArray[$key] = $value;
                }
            }
            return $returnArray;
        }
        function removeSqlNullValueAndMakeMysqlEscapeValueByArray($prArray) {
            $returnArray = array();
            foreach($prArray as $key=>$value){
                if($value !== null) {
                    if(is_string($value)) $value = "'".addslashes($value)."'";
                    $returnArray[$key] = $value;
                }
            }
            return $returnArray;
        }
        function removeSqlNullValueWithFormateForUpdate($prArray) {
            $returnArray = array();
            foreach($prArray as $key=>$value){
                if($value !== null) {
                    if(is_string($value)) $value = "'".addslashes($value)."'";
                    $returnArray[] = $key ."=". $value;
                }
            }
            return $returnArray;
        }
        function makeMysqlEscapeValueByArray($prArray) {
            $returnArray = array();
            foreach($prArray as $value) {
                if(is_string($value)) $value = "'".addslashes($value)."'";
                $returnArray[] = $value;
            }
            return $returnArray;
        }

        public function insertGetId($arInsertData) {
            $getType = gettype($arInsertData);
            if($getType === 'array') {
                $arInsertData = $this->removeSqlNullValueAndMakeMysqlEscapeValueByArray($arInsertData);
                $columns = implode(", ", array_keys($arInsertData));
                $values  = implode(", ", $arInsertData);
                $sqlQuery = "INSERT INTO ".$this->DB->table." ($columns) VALUES ($values)";
                
                $this->unsetSql();
                mysqli_query($this->DB->conection, $sqlQuery);
                return mysqli_insert_id($this->DB->conection);
            } else {
                $bt = debug_backtrace();
                $caller = array_shift($bt); // Get first array

                echo ('<div class="show-error-message"><h3>
                Fatal error: Wrong data formate '.$getType.'. You provide <strong style="color:blue;font-size: 16px;">'.$arInsertData.'</strong>.I neeed a array, please provide a array.</h3><h4> error from <b>
                <span style="color:red">'.$caller['file'].'</span> on line <span style="color:red">'.$caller['line'].'</span></b></h4></div>');
                exit();
                // trigger_error('', E_USER_ERROR);
            }
        }
        public function insert($arInsertData) {
            $getType = gettype($arInsertData);
            if($getType === 'array') {
                $arInsertData = $this->removeSqlNullValueAndMakeMysqlEscapeValueByArray($arInsertData);
                $columns = implode(", ", array_keys($arInsertData));
                $values  = implode(", ", $arInsertData);
                $sqlQuery = "INSERT INTO ".$this->DB->table." ($columns) VALUES ($values)";
                
                $this->unsetSql();
                return mysqli_query($this->DB->conection, $sqlQuery);
            } else {
                $bt = debug_backtrace();
                $caller = array_shift($bt); // Get first array

                echo ('<div class="show-error-message"><h3>
                Fatal error: Wrong data formate '.$getType.'. You provide <strong style="color:blue;font-size: 16px;">'.$arInsertData.'</strong>.I neeed a array, please provide a array.</h3><h4> error from <b>
                <span style="color:red">'.$caller['file'].'</span> on line <span style="color:red">'.$caller['line'].'</span></b></h4></div>');
                exit();
                // trigger_error('', E_USER_ERROR);
            }
        }
        public function update($arData) {
            $getType = gettype($arData);
            if($getType === 'array') {
                $arData = $this->removeSqlNullValueWithFormateForUpdate($arData);
                
                $sqlQuery = "UPDATE ".$this->DB->table." SET ". join(",",$arData);
                $sqlQuery .= isset($this->DB->where)?" WHERE ".$this->DB->where." ":"";
                $this->unsetSql();
                mysqli_query($this->DB->conection, $sqlQuery);
                return mysqli_affected_rows($this->DB->conection);
            } else {
                $bt = debug_backtrace();
                $caller = array_shift($bt); // Get first array

                echo ('<div class="show-error-message"><h3>
                Fatal error: Wrong data formate '.$getType.'. You provide <strong style="color:blue;font-size: 16px;">'.$arInsertData.'</strong>.I neeed a array, please provide a array.</h3><h4> error from <b>
                <span style="color:red">'.$caller['file'].'</span> on line <span style="color:red">'.$caller['line'].'</span></b></h4></div>');
                exit();
            }
        }
        public function delete() {
            $sqlQuery = "DELETE FROM ".$this->DB->table;
            $sqlQuery .= isset($this->DB->where)?" WHERE ".$this->DB->where." ":"";
            
            $this->unsetSql();
            mysqli_query($this->DB->conection, $sqlQuery);
            return mysqli_affected_rows($this->DB->conection);
        }
        public function truncate() {
            $sqlQuery = "TRUNCATE ".$this->DB->table;

            $this->unsetSql();
            return mysqli_query($this->DB->conection, $sqlQuery);
        }
    }

    class Table {
        private $DB = [];
        function __construct($DB) {
            $this->DB = $DB;
            return $this->DB;
        }
        function table($argument){
            $this->DB->table = $argument;
            return new mysqli_function($this->DB);
        }
    }
} catch (Exception $e) {
    $bt = debug_backtrace();
    $caller = array_shift($bt); // Get first array
    
    echo ('<div class="show-error-message"><h3>
    Fatal error: Mysql..!!!'.$e->message.'</h3><h4> error from <b>
    <span style="color:red">'.$caller['file'].'</span> on line <span style="color:red">'.$caller['line'].'</span></b></h4></div>');
    exit();
}

