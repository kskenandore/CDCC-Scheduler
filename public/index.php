<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Log in'; ?>
<?php include('../private/shared/login_header.php'); ?>

<div id="content">
    <form>
        <label for="username">Username: </label>
        <input type="text" name="username"/><br/>

        <label for="password">Password: </label>
        <input type="password" name="password"/><br/>

        <input type="submit" value="Sign In"/>
    </form>
    <a href="#" id="forgot">Forgot password?</a>
</div>

<?php include('../private/shared/footer.php'); ?>