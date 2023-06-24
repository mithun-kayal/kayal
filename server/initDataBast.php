<?php
echo "init data base";
$arDataBaseStucture = array(

    'DB_test'=>array(
        'userBack'=> array(
            "column"=>array(
                'id'=> "int(11) NOT NULL",
                'email'=> "varchar(255) NOT NULL",
                "password" => "varchar(255) NOT NULL",
                "userName" => "varchar(255) DEFAULT NULL",
                "lastName" => "varchar(255) DEFAULT NULL",
                "firstName" => "varchar(255) DEFAULT NULL"
            ),
            'ENGINE'=>"InnoDB DEFAULT CHARSET=latin1",
            'PRIMARY'=>'id',
            'INCREMENT'=>'id',
        ),
    ),

);
$mycon = mysqli_connect('localhost', 'root', '');
// echo "<pre>";
if($mycon) {
    if(count($arDataBaseStucture)) {
        foreach ($arDataBaseStucture as $dataBaseName => $arTablse) {
            $createDB = mysqli_query($mycon, "CREATE DATABASE IF NOT EXISTS `$dataBaseName`");
            echo "<h5 style=".'"color: #6285e8;"'.">CREATE DATABASE IF NOT EXISTS `$dataBaseName`</h5>";
            echo "<h5 style=".'"color: #6285e8;"'.">Ressult: $createDB</h5>";
            if(count($arTablse)) {
                foreach ($arTablse as $tableName => $details) {
                    $tableStucre = "CREATE TABLE IF NOT EXISTS `$tableName` (";
                    $INCREMENT = "";
                    if(isset($details['column']) && count($details['column'])) {
                        $totalColumn = count($details['column']);
                        $index = 1;
                        foreach ($details['column'] as $columnName => $value) {
                            $tableStucre .= " `$columnName` $value";
                            if($index < $totalColumn) {
                                $tableStucre .= ", ";
                            }
                            $index ++;
                            if(isset($details['INCREMENT'])) {
                                if($details['INCREMENT'] == $columnName) {
                                    $INCREMENT = '`'.$details['INCREMENT'].'`'."$value AUTO_INCREMENT;";
                                }
                            }
                        }
                    }
                    $tableStucre .= " ) ";
                    if(isset($details['ENGINE'])) {
                        $tableStucre .= "ENGINE=".$details['ENGINE'];
                    }
                    $tableStucre .= "; ";
                    if(isset($details['PRIMARY'])) {
                        $tableStucre .= "ALTER TABLE `$tableName` ADD PRIMARY KEY (".'`'.$details['PRIMARY'].'`'.")";
                        $tableStucre .= "; ";
                    }
                    if($INCREMENT != "") {
                        $tableStucre .= "ALTER TABLE `$tableName` MODIFY ".$INCREMENT;
                    }
                    $tableStucre .= " COMMIT;";

                    $myDBcon = mysqli_connect('localhost', 'root', '', $dataBaseName);
                    if($myDBcon) {
                        $createTable = mysqli_query($myDBcon, $tableStucre);
                        echo "<h5 style=".'"color: #6285e8;"'.">$tableStucre</h5>";
                        echo "<h5 style=".'"color: #6285e8;"'.">Ressult: $createTable</h5>";
                    }
                }
            }
        }
    }
    
}
// echo "</pre>";