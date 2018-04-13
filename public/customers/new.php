<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Customers'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2>New Customer</h2>
        <form class="clear">
            <label for="fname">First name: </label>
            <input type="text" name="fname"/>

            <label for="lname">Last name: </label>
            <input type="text" name="lname"/>

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

            <label for="email">Email: </label>
            <input type="email" name="email"/>

            <label for="org">Organization: </label>
            <select name="org">
                <option>None</option>
                <option>Organization 1</option>
                <option>Organization 2</option>
                <option>Organization 3</option>
            </select>

            <input type="submit" value="Create New Customer"/>
        </form>

        <a href="index.php" class="cancel-btn">&#8592; Cancel</a>
    </div>

<?php include('../../private/shared/footer.php'); ?>