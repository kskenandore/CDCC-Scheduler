<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Venues'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2><?php echo $page_title; ?></h2>
        <a href="new.php" class="button">+ New</a>

        <table class="clear">
            <tr>
                <th>Venue ID</th>
                <th>Name</th>
                <th>Rental Fee</th>
                <th>Size</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
            <?php
            // SQL to retrieve database records with formatted date result
            $sql = "SELECT venue_id, name, rental_fee, size, capacity
                      from venues order by venue_id";

            // Execute SQL and save result
            $result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['venue_id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>$' . $row['rental_fee'] . '</td>';
                echo '<td>' . $row['size'] . '</td>';
                echo '<td>' . $row['capacity'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['venue_id'] . '" class="button">Edit</a> <a href="delete.php?id=' . $row['venue_id'] . '" class="button">Delete</a></td>';
                echo '</tr>';
            }

            ?>
        </table>
    </div>

<?php include('../../private/shared/footer.php'); ?>