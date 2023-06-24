<?php
require_once('../server.php');

use server\DB as DB;

if(isset($_POST['changePage']) && $_POST['changePage']) {
    if(isset($_POST['page']) && !empty($_POST['page'])) header("Location: ".PROJET_URL_CLIENT."?".$_POST['page']);
    exit();
}
if(isset($_GET['action']) && $_GET['action'] == 'update') {
    // $update = DB::table('users')->where('id',2)->delete(['middleName'=>'test', 'lastName'=>'KoolBe', 'password'=>1233]);
    // $update = DB::table('users')->truncate();

    echo "<pre>";
    // print_r($update);
    echo "</pre>";
    exit;
}

exit('Nothing found');
// header("Location: ".PROJET_URL_CLIENT."?home");