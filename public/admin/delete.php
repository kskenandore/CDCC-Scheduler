<?php require_once('../../private/initialize.php'); ?>

<?php include('adminsecurity.php'); ?>

<?php $page_title = 'Admin'; ?>
<?php include('../../private/shared/header.php'); ?>

<!-- HTML for columnar output format  -->

    <div id="content" class="clear">
        <h2>Delete Employee</h2>

        <table class="clear">
            <tr>
                <th>Primary Key</th>
                <th>Attribute</th>
                <th>Attribute</th>
                <th>Attribute</th>
                <th>Attribute</th>
            </tr>
            <tr>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
                <td>Example Data</td>
            </tr>
        </table>

        <form class="clear">
            <p class="warn">Once this information has been deleted, it cannot be retrieved.</p>
            <p class="warn">Are you sure you want to continue?</p>

            <input type="submit" value="Yes, Delete this Employee" />
        </form>

        <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
    </div>

<?php include('../../private/shared/footer.php'); ?>
