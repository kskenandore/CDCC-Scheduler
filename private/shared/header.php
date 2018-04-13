<!doctype html>

<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="../stylesheets/style.css" />
</head>

<body>

<header id="head">
    <h1>CD & CC Scheduler</h1>
</header>

<nav>
    <ul>
        <li><a href="../reservations/index.php" class="blue">Reservations</a></li>
        <li><a href="../customers/index.php" class="green">Customers</a></li>
        <li><a href="../orgs/index.php" class="purple">Organizations</a></li>
        <li><a href="../venues/index.php" class="red">Venues</a></li>
        <li><a href="../caterers/index.php" class="orange">Caterers</a></li>
    </ul>
    <div id="nav-divider" class="clear" onload="dividerColor()">
    </div>
</nav>
<script src="../scripts/scripts.js"></script>
