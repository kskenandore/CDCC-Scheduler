<!doctype html>

<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="../stylesheets/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
</head>

<body>
<header id="head">
    <h1>Scheduler</h1>
</header>

<nav>
    <ul>
        <li><a href="../reservations/index.php" class="blue">Reservations</a></li>
        <li><a href="../customers/index.php" class="green">Customers</a></li>
        <li><a href="../orgs/index.php" class="purple">Organizations</a></li>
        <li><a href="../venues/index.php" class="red">Venues</a></li>
        <li><?php
          if( $_SESSION['admin'] == 1 ) {
          	echo '<a href="../admin/index.php" class="orange">User Admin</a>';
          }
        ?></li>
    </ul>
    <div id="nav-divider" class="clear" onload="dividerColor()">
    </div>
</nav>
<a href="../../private/shared/logout.php" style="float:right" class="cancel-btn">&#8592; Logout</a>
<script src="../scripts/scripts.js"></script>
