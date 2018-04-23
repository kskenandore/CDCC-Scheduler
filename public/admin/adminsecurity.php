<?php require_once('../../private/initialize.php'); ?>

<?php
  if ( $_SESSION['admin'] != 1 && basename(dirname((__FILE__))) == "admin" ) {

    echo '<h2>' . $_SESSION['username'] . ' not authorized for user admin functions</h2>';
    exit();
  }
?>
