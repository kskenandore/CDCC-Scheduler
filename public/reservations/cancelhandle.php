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
	  $cancelreason = $_POST['cancel-reason'];

		// SQL to insert form data into database
		$sql = "update reservations set
				cancellation = 1,
				cancel_date = CURRENT_TIMESTAMP(),
				cancel_reason_id = $cancelreason
				WHERE reservation_id =" . $_GET['id'] . ";";

		// Execute SQL and save result
		$result = mysqli_query($dbc, $sql);

		// Test result and inform user
		if (!$result) {
			echo "Were sorry but your reservation wasn't canceled  " . mysqli_connect_errno() . ": " . mysqli_connect_error();
		} else {
			echo "Your reservation has been canceled.";
		}

	 ?>

	 <br />

	 <a href="index.php" class="cancel-btn">&#8592; Return</a>

</div>

<?php include('../../private/shared/footer.php'); ?>
