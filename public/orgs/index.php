<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Organizations'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2><?php echo $page_title; ?></h2>
        <a href="new.php" class="button">+ New</a>

        <table class="clear">
            <tr>
                <th>Organization ID</th>
                <th>Name</th>
                <th>City</th>
                <th>State</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php
            // SQL to retrieve database records with formatted date result
            $sql = "SELECT org_id, name, city, state, phone
                      from organizations order by org_id";

            // Execute SQL and save result
            $result = mysqli_query($dbc, $sql);

            // Loop through each row returned by datbase
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['org_id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['city'] . '</td>';
                echo '<td>' . $row['state'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['org_id'] . '" class="button">Edit</a> <a href="delete.php?id=' . $row['org_id'] . '" class="button">Delete</a></td>';
                echo '</tr>';
            }

            ?>
        </table>
    </div>

<?php include('../../private/shared/footer.php'); ?>