<?php

    //file paths
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH, '/public');
    define("SHARED_PATH", PRIVATE_PATH, '/shared');
    define("WWW_ROOT", "");

    require_once('functions.php');

    include('shared/mysqli_connect.php');

?>
