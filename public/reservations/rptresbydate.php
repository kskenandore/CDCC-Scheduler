<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations by Date'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2><?php echo $page_title; ?></h2>

<!--        <table class="clear"> -->
        <table>
            <?php
              // SQL to retrieve database records with formatted date result
            	$sql = "SELECT
                  b.reservation_id,
                	a.customer_id,
                	d.name org_name,
                	a.last_name,
                	a.first_name,
                	a.address1,
                	a.address2,
                	a.city,
                	a.state,
                	a.zip,
                	a.email,
                	a.phone,
                  DATE_FORMAT(`start_timestamp`, \"%Y-%m-%d\") start_date,
                  DATE_FORMAT(`start_timestamp`, \"%W\") start_day,
                  DATE_FORMAT(`start_timestamp`, \"%H:%i\") start_time,
                	b.start_timestamp noformat_date,
                	b.cancellation,
                	c.name
                FROM
                	customers a
                INNER JOIN
                	reservations b
                	on a.customer_id = b.customer_id
                INNER JOIN
                	venues c
                	on b.venue_id = c.venue_id
                LEFT OUTER JOIN
                	organizations d
                	on a.org_id = d.org_id
                ORDER BY start_timestamp, c.name";

            	// Execute SQL and save result
            	$result = mysqli_query($dbc, $sql);

              $breakid = '';
              // Loop through each row returned by datbase
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ( $breakid != $row['start_date'] ) {
                  echo '<tr style="background-color: rgb(226, 226, 226)">';
                  echo '<td>' . $row['start_date'] . '</td>';
                  echo '<td style="padding:10px;">' . $row['start_day'] . '</td>';
                  echo '<td></td>';
                  echo '</tr>';
                  $breakid = $row['start_date'];
                }
                echo '<tr style="background-color: rgb(255, 255, 255)">';
                echo '<td style="text-align:right; padding:10px;">';
                echo $row['start_time'];
                echo '</td>';
                echo '<td style="text-align:left; padding:10px;">' .
                  $row['name'] . ' - ' . $row['last_name'] . ', ' .
                  $row['first_name'];
                if ( $row['org_name'] != null ) {
                  echo ' (' .  $row['org_name'] . ')';
                }
                echo '</td>' ;
                echo '<td>' . $row['phone'] . '</td>';
                echo '</tr>';
              }
             ?>
        </table>

        <p id="report">Reporting Options:</p>
        <a href="rptresbycust.php" class="report">Reservations by Customers</a>
        <a href="rptresbydate.php" class="report">Reservations by Date</a>
    </div>

<?php include('../../private/shared/footer.php'); ?>
