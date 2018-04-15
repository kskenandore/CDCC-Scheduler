<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<?php

  	// For troubleshooting purposes
  	print_r($_POST);
  	print_r($_GET);
  	echo "<br />";

    // Create code friendly handles for select form data elements
	  $cancelreason = $_POST['cancel-reason'];

    // Test for update request from GET
    $updaterequest = !empty($_GET);

	  $updateid = $_GET['id'];

    /* Set logic handling variables named to improve readability */
  	$fieldsfilled = false;
  	$firstpageload = empty($_POST);

    if ( $_POST['cancel-reason'] != "Select Reason" ) {
        $ddsfilled = true;
      } else {
        $ddsfilled = false;
      }

    // Create arrays for processing conditions on data elements
  	$rlist = array('cancel-reason');

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
        <h2>Cancel Reservation</h2>

        <table class="clear">
            <tr>
              <th>Reservation ID</th>
              <th>Customer</th>
              <th>Venue</th>
              <th>Date</th>
              <th>Start Time</th>
            </tr>
            <?php
              // SQL to retrieve database records with formatted date result
            	$sql = "SELECT a.reservation_id, concat(c.last_name, ', ', c.first_name  ) cname, v.name vname, DATE_FORMAT(`start_timestamp`, \"%c-%d-%Y\") rdate, DATE_FORMAT(`start_timestamp`, \"%l:%i %p\") rtime
                      from reservations a
                      inner join customers c
                      on a.customer_id = c.customer_id
                      inner join venues v
                      on a.venue_id = v.venue_id
                      where a.reservation_id = $updateid
                      order by a.reservation_id";

            	// Execute SQL and save result
            	$result = mysqli_query($dbc, $sql);

              // Loop through each row returned by datbase
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['reservation_id'] . '</td>';
                echo '<td>' . $row['cname'] . '</td>';
                echo '<td>' . $row['vname'] . '</td>';
                echo '<td>' . $row['rdate'] . '</td>';
                echo '<td>' . $row['rtime'] . '</td>';
                echo '</tr>';
              }

             ?>

        </table>

        <form class="clear" id="fcform" action=<?php
        	/* Determine if form is good to proceed to confirmation page */
        	if ( $firstpageload || !$fieldsfilled ) {
        		echo "\"cancel.php?id=$updateid\"";
        	} else {
        		echo "\"cancelhandle.php?id=$updateid\"";
        		$autosubmit = false;
        	}
        	?>
        method="post">
            <label for="cancel-reason">Reason for Cancellation: </label>
            <select name="cancel-reason">
              <option>Select Reason</option>
              <?php
                // SQL to retrieve database records with formatted date result
              	$sql = "SELECT cancel_reason_id, cancel_type FROM cancel_reasons order by cancel_type";

              	// Execute SQL and save result
              	$result = mysqli_query($dbc, $sql);

                // Loop through each row returned by datbase
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  if ( $_POST['cancel-reason'] == $row['cancel_reason_id'] ) {
                    echo '<option value="' . $row['cancel_reason_id'] . '" selected>' . $row['cancel_type'] . '</option>';
                  } else {
                    echo '<option value="' . $row['cancel_reason_id'] . '">' . $row['cancel_type'] . '</option>';
                  }
                }

              ?>
            </select><?php
              /* Determine if field is not filled */
              if ( $_POST['cancel-reason'] == "Select Reason" ) {
                echo "* Reason Required";
              }
            ?>

            </select><br/>

            <!-- comment out for base requirements
            <label for="description">Cancellation Description: </label>
            <textarea name="description" rows="5">Optional Description</textarea>
          -->

            <p class="warn">Once this reservation has been canceled, it cannot be retrieved.</p>
            <p class="warn">Are you sure you want to continue?</p>

            <input type="submit" value="Yes, Cancel this Reservation" />
            <a href="index.php" class="cancel-btn">&#8592; Return</a>
        </form>
    </div>

<?php include('../../private/shared/footer.php'); ?>
