<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Admin'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2>Current Employees</h2>
        <a href="new.php" class="button">+ New</a>

        <table class="clear">
            <tr>
                <th>Employee ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php
            // SQL to retrieve database records with formatted date result
            $sql = "SELECT user_id, last_name, first_name, position, phone
                      from users order by user_id";

            // Execute SQL and save result
            $result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['user_id'] . '</td>';
                echo '<td>' . $row['last_name'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
                echo '<td>' . $row['position'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['user_id'] . '" class="button">Edit</a> <a href="delete.php?id=' . $row['user_id'] . '" class="button">Delete</a></td>';
                echo '</tr>';
            }

            ?>
        </table>
    </div>

<?php include('../../private/shared/footer.php'); ?>