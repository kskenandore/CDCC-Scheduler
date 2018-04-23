<?php # Script 12.11 - logout.php #2
// This page lets the user logout.
// This version uses sessions.

session_start(); // Access the existing session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['user_id'])) {

	// Need the functions:
	require ('login_functions.inc.php');
	redirect_user();

} else { // Cancel the session:

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}

//include ('includes/footer.html');
?>

<!doctype html>

<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="../../public/stylesheets/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
</head>

<body>

<header id="login">
    <h1>CD & CC Scheduler</h1>
</header>

<div id="divider">
    <h2>Employee Logged Out</h2>
</div>

<a href="../../public/index.php" class="cancel-btn">&#8592; Return to Login</a>
