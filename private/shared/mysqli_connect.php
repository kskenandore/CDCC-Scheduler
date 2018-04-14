<?php

	// Set up the connection information for the database
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_USER', 'groupfou_admin');
	DEFINE ('DB_PASS', 'Y[V};Pb5RKwH');
	DEFINE ('DB_NAME', 'groupfou_reservations');

	// Establish connect to database
	$dbc = @mysqli_connect( DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//For troubleshooting
	 /* if (!$dbc) {
		echo "Issue with mysqli_connect " . mysqli_connect_errno() . ": " . mysqli_connect_error();
	} else {
		echo "connected to " . DB_NAME;
	} */

?>
