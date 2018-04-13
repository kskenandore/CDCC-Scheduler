<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Venues'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2>Edit Venue</h2>
        <form class="clear">
            <label for="name">Name: </label>
            <input type="text" name="name"/>

            <label for="capacity">Capacity: </label>
            <input type="number" name="capacity"/>

            <label for="rental-fee">Rental Fee: </label>
            <input type="text" name="rental-fee"/>

            <label for="size">Size: </label>
            <select name="size">
                <option>Size 1</option>
                <option>Size 2</option>
                <option>Size 3</option>
            </select>

            <input type="submit" value="Edit this Venue"/>
        </form>

        <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
    </div>

<?php include('../../private/shared/footer.php'); ?>