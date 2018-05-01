<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Customers'; ?>
<?php include('../../private/shared/header.php'); ?>

<?php

 /*	// For troubleshooting purposes
  	print_r($_POST);
  	print_r($_GET);
  	echo "<br />";
 */

    // Create code friendly handles for select form data elements
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zipcode'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $org_id = $_POST['org'];

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

    // Create arrays for processing conditions on data elements
  	$rlist = array('fname', 'lname', 'address1', 'city', 'state', 'zipcode', 'phone', 'email');

  	/* Determine page state and if any required fields are empty */
  	if ( !$firstpageload ) {
  		foreach ( $rlist as $vval ) {
  			if ( $_POST[$vval] == NULL ) {
  				$fieldsfilled = false;
  				break;
  			} else {
  				$fieldsfilled = true;
  			}
  		}
  	}


?>

    <div id="content" class="clear">
        <h2>Edit Customer</h2>
        <form class="clear" id="fcform" action=<?php
        	/* Determine if form is good to proceed to confirmation page */
        	if ( $firstpageload || !$fieldsfilled ) {
        		echo "\"edit.php?id=$updateid\"";
        	} else {
        		echo "\"edithandle.php?id=$updateid\"";
        		$autosubmit = true;
        	}
        	?>
        method="post">
            <label for="fname">First name: </label>
            <input type="text" name="fname" value="<?php
        				echo "$first_name";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['fname'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* First Name Required</span>";
      				}
             ?>

            <label for="lname">Last name: </label>
            <input type="text" name="lname" value="<?php
        				echo "$last_name";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['lname'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* Last Name Required</span>";
      				}
             ?>

            <label for="address1">Address 1: </label>
            <input type="text" name="address1" value="<?php
        				echo "$address1";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['address1'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* Address 1 Required</span>";
      				}
             ?>

            <label for="address2">Address 2: </label>
            <input type="text" name="address2" value="<?php
        				echo "$address2";
      			?>"/>

            <label for="city">City: </label>
            <input type="text" name="city" value="<?php
        				echo "$city";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['city'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* City Required</span>";
      				}
             ?>

            <label for="state">State: <?php
              /* Determine if field needed */
      				if ($_POST['state'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* State Required</span>";
      				}
             ?></label>
            <input type="text" name="state" value="<?php
        				echo "$state";
      			?>"/>

            <label for="zipcode">Zipcode: </label>
            <input type="text" name="zipcode" value="<?php
        				echo "$zip";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['zipcode'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* Zipcode Required</span>";
      				}
             ?>

            <label for="phone">Phone: (xxx-xxx-xxxx)</label>
            <input type="tel" name="phone" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
              placeholder="123-4567-8901" value="<?php
        				echo "$phone";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['phone'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* Phone Required</span>";
      				}
             ?>

            <label for="email">Email: </label>
            <input type="email" name="email" value="<?php
        				echo "$email";
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['email'] == NULL && !$firstpageload) {
      					echo "<span class='valid'>* Email Required</span>";
      				}
             ?>

            <label for="org">Organization: </label>
            <select name="org">
              <?php
                // SQL to retrieve database records
                $sql = "SELECT org_id, name FROM organizations order by name";

                // Execute SQL and save result
                $result = mysqli_query($dbc, $sql);

                if ( is_null($org_id) ) {
                  echo '<option value="NULL" selected>None</option>';
                  $orgnull = true;
                } else {
                  echo '<option value="NULL">None</option>';
                  $orgnull = false;
                }

                // Loop through each row returned by database
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  if ( $org_id == $row['org_id'] && !$orgnull) {
                    echo '<option value="' . $row['org_id'] . '" selected>' . $row['name'] . '</option>';
                  } else {
                    echo '<option value="' . $row['org_id'] . '">' . $row['name'] . '</option>';
                  }
                }
              ?>
            </select>

            <input type="submit" value="Edit this Customer"/>
        </form>

        <?php if ($autosubmit) {
                //Submit form if all required fields are filled out
            echo"<script>document.getElementById('fcform').submit();</script> ";
        } ?>

        <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
    </div>

<?php  //include('../../private/shared/footer.php'); ?>
