<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<div id="content" class="clear">

	<?php

		/*	// For troubleshooting purposes
			print_r($_POST);
			echo "<br />";
		*/

		// Create code friendly handles for select form data elements
	  $date = $_POST['date'];
	  $starttime = $_POST['start-time'];
	  $endtime = $_POST['end-time'];
		$customer = $_POST['customer'];
		$venue = $_POST['venue'];

		// MySQL datetime format YYYY-MM-DD HH:MM:SS

		$ins_starttime = $date . ' ' . $starttime;
		$ins_endtime = $date . ' ' . $endtime;

		// SQL to insert form data into database
		$sql = "INSERT INTO reservations VALUES (NULL, '$customer', '$venue', NULL, NULL,  '$ins_starttime',
				'$ins_endtime', NULL, NULL, NULL, '1', NULL);";

		// Execute SQL and save result
		$result = mysqli_query($dbc, $sql);

		// Test result and inform user
		if (!$result) {
			echo "Were sorry but your reservation wasn't entered  " . mysqli_connect_errno() . ": " . mysqli_connect_error();
		} else {
			echo "Your reservation has been added successfully.";
		}

	 ?>

	 <br />

	 <a href="index.php" class="cancel-btn">&#8592; Return</a>

</div>

<?php include('../../private/shared/footer.php'); ?>
