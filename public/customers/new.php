<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Customers'; ?>
<?php include('../../private/shared/header.php'); ?>

<?php

	// For troubleshooting purposes
	print_r($_POST);
	echo "<br />";

  /* Set logic handling variables named to improve readability */
	$fieldsfilled = false;
	$firstpageload = empty($_POST);

  // Create code friendly handles for select form data elements
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];

?>


    <div id="content" class="clear">
        <h2>New Customer</h2>
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
            <label for="fname">First name: </label>
            <input type="text" name="fname" value="<?php
              /* Determine if date to keep exists */
        			if ($_POST['fname'] != NULL) {
        				echo "$fname";
        			}
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['fname'] == NULL && !$firstpageload) {
      					echo "* First Name Required";
      				}
             ?>

            <label for="lname">Last name: </label>
            <input type="text" name="lname"value="<?php
              /* Determine if date to keep exists */
        			if ($_POST['lname'] != NULL) {
        				echo "$lname";
        			}
      			?>"/><?php
              /* Determine if field needed */
      				if ($_POST['lname'] == NULL && !$firstpageload) {
      					echo "* Last Name Required";
      				}
             ?>

            <label for="address1">Address 1: </label>
            <input type="text" name="address1"/>

            <label for="address2">Address 2: </label>
            <input type="text" name="address2"/>

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
                <?php
                  // SQL to retrieve database records with formatted date result
                  $sql = "SELECT org_id, name FROM organizations order by name";

                  // Execute SQL and save result
                  $result = mysqli_query($dbc, $sql);

                  // Loop through each row returned by datbase
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo '<option value="' . $row['org_id'] . '">' . $row['name'] . '</option>';
                  }
                ?>
            </select>

            <input type="submit" value="Create New Customer"/>
        </form>

        <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
    </div>

<?php //include('../../private/shared/footer.php'); ?>
