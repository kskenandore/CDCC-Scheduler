<?php # Script 12.12 - login.php #4
// This page processes the login form submission.
// The script now stores the HTTP_USER_AGENT value for added security.

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Need two helper files:
	require ('../private/shared/login_functions.inc.php');
  require ('../private/shared/mysqli_connect.php');

	// Check the login:
	list ($check, $data) = check_login($dbc, $_POST['username'], $_POST['password']);

	if ($check) { // OK!

		// Set the session data:
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['first_name'] = $data['first_name'];
    $_SESSION['admin'] = $data['manager_indicator'];

		// Store the HTTP_USER_AGENT:
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

		// Redirect:
		redirect_user('reservations/index.php');

	} else { // Unsuccessful!

		// Assign $data to $errors for login_page.inc.php:
		$errors = $data;

	}

	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.

?>
<?php //require_once('../private/initialize.php'); ?>

<?php $page_title = 'Log in'; ?>
<?php include('../private/shared/login_header.php'); ?>

<?php
  // Print any error messages, if they exist:
  if (isset($errors) && !empty($errors)) {
    echo '<h1>Error!</h1>
    <p class="error">The following error(s) occurred:<br />';
    foreach ($errors as $msg) {
      echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again.</p>';
  }
?>

<div id="content">
    <form action="index.php" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username"/><br/>

        <label for="password">Password: </label>
        <input type="password" name="password"/><br/>

        <input type="submit" value="Sign In"/>
    </form>
    <a href="#" id="forgot">Forgot password?</a>
</div>

<?php include('../private/shared/footer.php'); ?>
