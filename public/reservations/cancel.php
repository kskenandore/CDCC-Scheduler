<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2>Cancel Reservation</h2>

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
            <label for="cancel-reason">Reason for Cancellation: </label>
            <select name="cancel-reason">
                <option>Reason 1</option>
                <option>Reason 2</option>
                <option>Reason 3</option>
            </select><br/>

            <label for="description">Cancellation Description: </label>
            <textarea name="description" rows="5">Optional Description</textarea>

            <p class="warn">Once this information has been deleted, it cannot be retrieved.</p>
            <p class="warn">Are you sure you want to continue?</p>

            <input type="submit" value="Yes, Cancel this Reservation" />
            <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
        </form>
    </div>

<?php include('../../private/shared/footer.php'); ?>