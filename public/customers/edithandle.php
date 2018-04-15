<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<div id="content" class="clear">

	<?php

			// For troubleshooting purposes
			print_r($_POST);
			echo "<br />";


		// Create code friendly handles for select form data elements
	  $fname = $_POST['fname'];
	  $lname = $_POST['lname'];
	  $address1 = $_POST['address1'];
	  $address2 = $_POST['address2'];
	  $city = $_POST['city'];
	  $state = $_POST['state'];
	  $zipcode = $_POST['zipcode'];
	  $phone = $_POST['phone'];
	  $email = $_POST['email'];
		$org = $_POST['org'];

		// SQL to insert form data into database
		$sql = "update customers
				set org_id = $org,
				last_name = '$lname',
				first_name = '$fname',
				address1 = '$address1',
				address2 = '$address2',
				city = '$city',
				state = '$state',
				zip = '$zipcode',
				email = '$email',
				phone = '$phone'
				WHERE customer_id =" . $_GET['id'] . ";";


		// Execute SQL and save result
		$result = mysqli_query($dbc, $sql);

		// Test result and inform user
		if (!$result) {
			echo "Were sorry but the customer wasn't updated " . mysqli_connect_errno() . ": " . mysqli_connect_error();
		} else {
			echo "The customer has been updated successfully.";
		}

	 ?>

	 <br />

	 <a href="index.php" class="cancel-btn">&#8592; Return</a>

</div>

<?php include('../../private/shared/footer.php'); ?>
