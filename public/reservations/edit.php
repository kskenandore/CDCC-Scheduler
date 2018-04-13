<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations'; ?>
<?php include('../../private/shared/header.php'); ?>

<div id="content" class="clear">
    <h2>Edit Reservation</h2>
    <form class="clear">
        <label for="customer">Customer: </label>
        <select name="customer">
            <option>Existing Customer</option>
            <option>Existing Customer</option>
        </select>

        <label for="date">Date: </label>
        <input type="date" name="date"/>

        <label for="start-time">Start Time: </label>
        <input type="time" name="start-time"/>

        <label for="end-time">End Time: </label>
        <input type="time" name="end-time"/>

        <label for="venue">Available Venues: </label>
        <select name="venue">
            <option>Venue 1</option>
            <option>Venue 2</option>
            <option>Venue 3</option>
        </select><br/>

        <label for="caterer">Caterer: </label>
        <select name="caterer">
            <option>Caterer 1</option>
            <option>Caterer 2</option>
            <option>Caterer 3</option>
        </select><br/>

        <label for="menu">Menu Options: </label>
        <select name="menu">
            <option>Menu 1</option>
            <option>Menu 2</option>
            <option>Menu 3</option>
        </select>

        <label for="contract">Contract: </label>
        <input type="file" name="contract" size="50"/>

        <input type="submit" value="Edit this Reservation"/>
    </form>

    <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
</div>

<?php include('../../private/shared/footer.php'); ?>