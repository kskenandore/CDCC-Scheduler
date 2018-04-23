<?php

session_start(); // Start the session.

    //file paths
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH, '/public');
    define("SHARED_PATH", PRIVATE_PATH, '/shared');
    define("WWW_ROOT", "");

    // If no session value is present, redirect the user:
    // Also validate the HTTP_USER_AGENT!
    if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {

    	// Need the functions:
    	require ('shared/login_functions.inc.php');

      $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

      // Remove any trailing slashes:
      $url = rtrim($url, '/\\');

      // Add the page:
      $url .= '/' . $page;

      // Redirect the user:
      header("Location: http://groupfour.uwmsois.com/cdcc-scheduler/public/index.php");
      exit(); // Quit the script.

    	redirect_user('/home/groupfour/public_html/cdcc-scheduler/public/index.php');

    }

    require_once('functions.php');

    include('shared/mysqli_connect.php');

?>
