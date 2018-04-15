<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<?php

	// For troubleshooting purposes
	print_r($_POST);
	echo "<br />";

  /* Set logic handling variables named to improve readability */
	$fieldsfilled = false;
	$firstpageload = empty($_POST);
  if (
    $_POST['customer'] != "Select Customer" &&
    $_POST['venue'] != "Select Venue" ) {

      $ddsfilled = true;
    } else {
      $ddsfilled = false;
    }


  // Create arrays for processing conditions on data elements
	$rlist = array('customer', 'date', 'start-time', 'end-time', 'venue');

  // Create code friendly handles for select form data elements
  $date = $_POST['date'];
  $starttime = $_POST['start-time'];
  $endtime = $_POST['end-time'];


	/* Determine page state and if any required fields are empty */
	if ( !$firstpageload && $ddsfilled) {
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
    <h2>New Reservation</h2>
    <form id="fcform" class="clear" action=<?php
      /* Determine if form is good to proceed to confirmation page */
    	if ( $firstpageload || !$fieldsfilled ) {
    		echo '"new.php "';
    	} else {
    		echo '"newhandle.php "';
    		$autosubmit = true;
  	  }
    ?>
    method="post">
        <label for="customer">Customer: </label>
        <select name="customer">
          <option>Select Customer</option>
          <?php
            // SQL to retrieve database records with formatted date result
          	$sql = "SELECT customer_id, first_name, last_name FROM customers order by last_name";

          	// Execute SQL and save result
          	$result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
          	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              if ( $_POST['customer'] == $row['customer_id'] ) {
                echo '<option value="' . $row['customer_id'] . '" selected>' . $row['last_name'] . ', ' . $row['first_name'] . '</option>';
              } else {
                echo '<option value="' . $row['customer_id'] . '">' . $row['last_name'] . ', ' . $row['first_name'] . '</option>';
              }
            }
          ?>
        </select><?php
          /* Determine if field is not filled */
          if ( $_POST['customer'] == "Select Customer" ) {
            echo "* Customer Required";
          }

        ?>
        <a href="../customers/new.php" class="new-redirect">New Customer?</a>

        <label for="date">Date: </label>
        <input type="date" name="date" value="<?php
          /* Determine if date to keep exists */
    			if ($_POST['date'] != NULL) {
    				echo "$date";
    			}
  			?>"/><?php
          /* Determine if field needed */
  				if ($_POST['date'] == NULL && !$firstpageload) {
  					echo "* Date required";
  				}
         ?>

        <label for="start-time">Start Time: </label>
        <input type="time" name="start-time" value="<?php
          /* Determine if date to keep exists */
    			if ($_POST['start-time'] != NULL) {
    				echo "$starttime";
    			}
  			?>"/><?php
          /* Determine if field needed */
  				if ($_POST['start-time'] == NULL && !$firstpageload) {
  					echo "* Start time required";
  				}
         ?>

        <label for="end-time">End Time: </label>
        <input type="time" name="end-time" value="<?php
          /* Determine if date to keep exists */
    			if ($_POST['end-time'] != NULL) {
    				echo "$endtime";
    			}
  			?>"/><?php
          /* Determine if field needed */
  				if ($_POST['end-time'] == NULL && !$firstpageload) {
  					echo "* End time required";
  				}
         ?>


        <label for="venue">Available Venues: </label>
        <select name="venue">
          <option>Select Venue</option>
          <?php
            // SQL to retrieve database records with formatted date result
          	$sql = "SELECT venue_id, name FROM venues order by name";

          	// Execute SQL and save result
          	$result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              if ( $_POST['venue'] == $row['venue_id'] ) {
                echo '<option value="' . $row['venue_id'] . '" selected>' . $row['name'] . '</option>';
              } else {
                echo '<option value="' . $row['venue_id'] . '">' . $row['name'] . '</option>';
              }
            }

          ?>
        </select><?php
          /* Determine if field is not filled */
          if ( $_POST['venue'] == "Select Venue" ) {
            echo "* Venue Required";
          }

        ?>

        <!--  Commenting out for now, not required basic functionality

        <label for="caterer">Caterer: </label>
        <select name="caterer">
            <option>Caterer 1</option>
            <option>Caterer 2</option>
            <option>Caterer 3</option>
        </select>

        <label for="menu">Menu Options: </label>
        <select name="menu">
            <option>Menu 1</option>
            <option>Menu 2</option>
            <option>Menu 3</option>
        </select>

        <label for="contract">Contract: </label>
        <input type="file" name="contract" size="50"/>

      -->

        <input type="submit" value="Create New Reservation"/>
    </form>

    <?php if ($autosubmit) {
            //Submit form if all required fields are filled out
        echo"<script>document.getElementById('fcform').submit();</script> ";
    } ?>

    <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
</div>

<?php include('../../private/shared/footer.php'); ?>
