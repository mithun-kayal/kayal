<?php
    require_once('../server.php');
    session_start();
    session_destroy();
    header("Location: ".PROJET_URL_CLIENT."?login");
?>