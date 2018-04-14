<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<div id="content" class="clear">
    <h2>New Reservation</h2>
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
              echo '<option value="' . $row['customer_id'] . '">' . $row['last_name'] . ', ' . $row['first_name'] . '</option>';
            }
          ?>
            <option>Existing Customer</option>
            <option>Existing Customer</option>
        </select>
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
