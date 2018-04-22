<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Customers'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2><?php echo $page_title; ?></h2>
        <a href="new.php" class="button">+ New</a>

        <table class="clear">
            <tr>
                <th>Customer ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php
              // SQL to retrieve database records
            	$sql = "SELECT customer_id, last_name, first_name, email, phone
                      from customers order by customer_id";

            	// Execute SQL and save result
            	$result = mysqli_query($dbc, $sql);

              // Loop through each row returned by datbase
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['customer_id'] . '</td>';
                echo '<td>' . $row['last_name'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['customer_id'] . '" class="button">Edit</a> </td>';
                //echo '<td><a href="edit.php" class="button">Edit</a> <a href="cancel.php" class="button">Cancel</a></td>';
                echo '</tr>';
              }

             ?>
            <!-- Comment out for future referenc
            <tr>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td><a href="edit.php" class="button">Edit</a> <a href="delete.php" class="button">Delete</a></td>
            </tr>
            -->
        </table>
    </div>

<?php include('../../private/shared/footer.php'); ?>
