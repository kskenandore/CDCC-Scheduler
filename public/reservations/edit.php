<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<?php

  /*	// For troubleshooting purposes
  	print_r($_POST);
  	print_r($_GET);
  	echo "<br />";
 */

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

 ?>

<div id="content" class="clear">
    <h2>Edit Reservation</h2>
    <form class="clear">
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
    				echo "$rdate";
  			?>"/>

        <label for="start-time">Start Time: </label>
        <input type="time" name="start-time" value="<?php
    				echo "$start_timestamp";
  			?>"/>

        <label for="end-time">End Time: </label>
        <input type="time" name="end-time" value="<?php
    				echo "$end_timestamp";
  			?>"/>

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

        <label for="caterer">Caterer: </label>
        <select name="caterer">
            <option>Caterer 1</option>
            <option>Caterer 2</option>
            <option>Caterer 3</option>
        </select><br/>

        <label for="menu">Menu Options: </label>
        <select name="menu">
            <option>Menu 1</option>
            <option>Menu 2</option>
            <option>Menu 3</option>
        </select>

        <label for="contract">Contract: </label>
        <input type="file" name="contract" size="50"/>

        <input type="submit" value="Edit this Reservation"/>
    </form>

    <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
</div>

<?php include('../../private/shared/footer.php'); ?>
