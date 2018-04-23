<?php session_start(); ?>
<?php

    //file paths
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH, '/public');
    define("SHARED_PATH", PRIVATE_PATH, '/shared');
    define("WWW_ROOT", "");

    require_once('functions.php');

    include('shared/mysqli_connect.php');

    // If no session value is present, redirect the user:
    // Also validate the HTTP_USER_AGENT!
    if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {

    	// Need the functions:
    	require ('login_functions.inc.php');
    	redirect_user();

    }

?>
