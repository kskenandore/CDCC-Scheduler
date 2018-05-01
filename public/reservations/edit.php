<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<?php

  /*	// For troubleshooting purposes
  	print_r($_POST);
  	print_r($_GET);
  	echo "<br />";
    */

    // Create code friendly handles for select form data elements
    $customer_id = $_POST['customer'];
    $rdate = $_POST['date'];
    $start_timestamp = $_POST['start-time'];
    $end_timestamp = $_POST['end-time'];
    $venue_id = $_POST['venue'];

    // Test for update request from GET
    $updaterequest = !empty($_GET);

	  $updateid = $_GET['id'];

    if ($updaterequest && !($_SERVER['REQUEST_METHOD'] === 'POST')) {

  		// SQL to retrieve database record
  		$sql = "SELECT reservation_id, customer_id, venue_id, date_format(start_timestamp, \"%H:%i\") starttime,
       date_format(end_timestamp, \"%H:%i\") endtime, date_format(start_timestamp, \"%Y-%m-%d\") rdate
        FROM reservations WHERE reservation_id = $updateid";

  		// Execute SQL and save result
  		$result = mysqli_query($dbc, $sql);

  		$row = 	mysqli_fetch_row($result);

  		$reservation_id = $row['0'];
  		$customer_id = $row['1'];
  		$venue_id = $row['2'];
  		$start_timestamp = $row['3'];
      $end_timestamp = $row['4'];
      $rdate = $row['5'];

      //echo $reservation_id . $customer_id . $venue_id . $start_timestamp . $end_timestamp;

  	}

    /* Set logic handling variables named to improve readability */
  	$fieldsfilled = false;
  	$firstpageload = empty($_POST);

    // Create arrays for processing conditions on data elements
  	$rlist = array('date', 'start-time', 'end-time');

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
    <h2>Edit Reservation</h2>
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
        <label for="customer">Customer: </label>
        <select name="customer">
          <?php
            // SQL to retrieve database records with formatted date result
            $sql = "SELECT customer_id, first_name, last_name FROM customers order by last_name";

            // Execute SQL and save result
            $result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              if ( $customer_id == $row['customer_id'] ) {
                echo '<option value="' . $row['customer_id'] . '" selected>' . $row['last_name'] . ', ' . $row['first_name'] . '</option>';
              } else {
                echo '<option value="' . $row['customer_id'] . '">' . $row['last_name'] . ', ' . $row['first_name'] . '</option>';
              }
            }
          ?>
        </select>

        <label for="date">Date: </label>
        <input type="date" name="date" value="<?php
          /* Determine if date to keep exists */
    			//if ($_POST['date'] != NULL || ($updaterequest) ) {
    				echo "$rdate";
    			//}
  			?>"/><?php
          /* Determine if field needed */
  				if ($_POST['date'] == NULL && !$firstpageload) {
  					echo "<span class='valid'>* Date required</span>";
  				}
         ?>

        <label for="start-time">Start Time: </label>
        <input type="time" name="start-time" value="<?php
          /* Determine if date to keep exists */
    			//if ($_POST['date'] != NULL || ($updaterequest) ) {
    				echo "$start_timestamp";
    			//}
  			?>"/><?php
          /* Determine if field needed */
  				if ($_POST['start-time'] == NULL && !$firstpageload) {
  					echo "<span class='valid'>* Start Time Required</span>";
  				}
         ?>

        <label for="end-time">End Time: </label>
        <input type="time" name="end-time" value="<?php
          /* Determine if date to keep exists */
    			//if ($_POST['date'] != NULL || ($updaterequest) ) {
    				echo "$end_timestamp";
    			//}
  			?>"/><?php
          /* Determine if field needed */
  				if ($_POST['end-time'] == NULL && !$firstpageload) {
  					echo "<span class='valid'>* End Time Required</span>";
  				}
         ?>

        <label for="venue">Available Venues: </label>
        <select name="venue">
          <?php
            // SQL to retrieve database records with formatted date result
            $sql = "SELECT venue_id, name FROM venues order by name";

            // Execute SQL and save result
            $result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              if ( $venue_id == $row['venue_id'] ) {
                echo '<option value="' . $row['venue_id'] . '" selected>' . $row['name'] . '</option>';
              } else {
                echo '<option value="' . $row['venue_id'] . '">' . $row['name'] . '</option>';
              }
            }
          ?>
        </select><br/>

        <input type="submit" value="Edit this Reservation"/>
    </form>

    <?php if ($autosubmit) {
            //Submit form if all required fields are filled out
        echo"<script>document.getElementById('fcform').submit();</script> ";
    } ?>

    <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
</div>

<?php include('../../private/shared/footer.php'); ?>
