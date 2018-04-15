<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2><?php echo $page_title; ?></h2>
        <a href="new.php" class="button">+ New</a>
        <input type="search" placeholder="search..." name="search"/>

        <table class="clear">
            <tr>
                <th>Reservation ID</th>
                <th>Customer</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>Actions</th>
            </tr>
            <?php
              // SQL to retrieve database records with formatted date result
            	$sql = "SELECT a.reservation_id, concat(c.last_name, ', ', c.first_name  ) cname, v.name vname, DATE_FORMAT(`start_timestamp`, \"%c-%d-%Y\") rdate, DATE_FORMAT(`start_timestamp`, \"%l:%i %p\") rtime
                      from reservations a
                      inner join customers c
                      on a.customer_id = c.customer_id
                      inner join venues v
                      on a.venue_id = v.venue_id
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
                echo '<td><a href="edit.php?id=' . $row['reservation_id'] . '" class="button">Edit</a> <a href="cancel.php?id=' . $row['reservation_id'] . '" class="button">Cancel</a></td>';
                echo '</tr>';
              }

             ?>
            <!-- Comment for future reference
            <tr>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td><a href="edit.php" class="button">Edit</a> <a href="cancel.php" class="button">Cancel</a></td>
            </tr>
          -->
        </table>
    </div>

<?php include('../../private/shared/footer.php'); ?>
