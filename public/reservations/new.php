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

  // Create arrays for processing conditions on data elements
	$rlist = array('customer', 'date', 'start-time', 'end-time', 'venue', 'caterer', 'menu', 'contract');

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
    <h2>New Reservation</h2>
    <form id="fcform" class="clear" action=<?php
      /* Determine if form is good to proceed to confirmation page */
    	if ( $firstpageload || !$fieldsfilled ) {
    		echo '"new.php "';
    	} else {
    		echo '"newhandle.php "';
    		$autosubmit = false;
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
        <input type="date" name="date"/>

        <label for="start-time">Start Time: </label>
        <input type="time" name="start-time"/>

        <label for="end-time">End Time: </label>
        <input type="time" name="end-time"/>

        <label for="venue">Available Venues: </label>
        <select name="venue">
          <?php
            // SQL to retrieve database records with formatted date result
          	$sql = "SELECT venue_id, name FROM venues order by name";

          	// Execute SQL and save result
          	$result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
          	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo '<option value="' . $row['venue_id'] . '">' . $row['name'] . '</option>';
            }
          ?>
        </select>

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

        <input type="submit" value="Create New Reservation"/>
    </form>

    <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
</div>

<?php include('../../private/shared/footer.php'); ?>
