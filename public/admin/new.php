<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Admin'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2>New Employee</h2>
        <form class="clear">
            <label for="name">Name: </label>
            <input type="text" name="name"/>

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

            <input type="submit" value="Create New Employee"/>
        </form>

        <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
    </div>

<?php include('../../private/shared/footer.php'); ?>