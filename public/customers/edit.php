<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Customers'; ?>
<?php include('../../private/shared/header.php'); ?>

<?php

  	// For troubleshooting purposes
  	print_r($_POST);
  	print_r($_GET);
  	echo "<br />";

    // Test for update request from GET
    $updaterequest = !empty($_GET);

	  $updateid = $_GET['id'];

    if ($updaterequest && !($_SERVER['REQUEST_METHOD'] === 'POST')) {

  		// SQL to retrieve database record
  		$sql = "SELECT org_id, last_name, first_name, address1, address2, city, state, zip, email, phone
        FROM customers WHERE customer_id = $updateid";

  		// Execute SQL and save result
  		$result = mysqli_query($dbc, $sql);

  		$row = 	mysqli_fetch_row($result);

  		$org_id = $row['0'];
  		$last_name = $row['1'];
  		$first_name = $row['2'];
  		$address1 = $row['3'];
      $address2 = $row['4'];
      $city = $row['5'];
      $state = $row['6'];
      $zip = $row['7'];
      $email = $row['8'];
      $phone = $row['9'];

      //echo $reservation_id . $customer_id . $venue_id . $start_timestamp . $end_timestamp;

  	}

    /* Set logic handling variables named to improve readability */
  	$fieldsfilled = false;
  	$firstpageload = empty($_POST);


?>

    <div id="content" class="clear">
        <h2>Edit Customer</h2>
        <form class="clear">
            <label for="fname">First name: </label>
            <input type="text" name="fname" value="<?php
        				echo "$first_name";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['fname'] == NULL && !$firstpageload) {
      					echo "* First Name Required";
      				}
             ?>

            <label for="lname">Last name: </label>
            <input type="text" name="lname" value="<?php
        				echo "$last_name";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['lname'] == NULL && !$firstpageload) {
      					echo "* Last Name Required";
      				}
             ?>

            <label for="address1">Address 1: </label>
            <input type="text" name="address1" value="<?php
        				echo "$address1";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['address1'] == NULL && !$firstpageload) {
      					echo "* Address 1 Required";
      				}
             ?>

            <label for="address2">Address 2: </label>
            <input type="text" name="address2" value="<?php
        				echo "$address2";
      			?>"/>

            <label for="city">City: </label>
            <input type="text" name="city"/>

            <label for="state">State: </label>
            <input type="text" name="state"/>

            <label for="zipcode">Zipcode: </label>
            <input type="text" name="zipcode"/>

            <label for="phone">Phone: </label>
            <input type="tel" name="phone"/>

            <label for="email">Email: </label>
            <input type="email" name="email"/>

            <label for="org">Organization: </label>
            <select name="org">
                <option>None</option>
                <option>Organization 1</option>
                <option>Organization 2</option>
                <option>Organization 3</option>
            </select>

            <input type="submit" value="Edit this Customer"/>
        </form>

        <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
    </div>

<?php include('../../private/shared/footer.php'); ?>
