<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Reservations by Customer'; ?>
<?php include('../../private/shared/header.php'); ?>

    <div id="content" class="clear">
        <h2><?php echo $page_title; ?></h2>

<!--        <table class="clear"> -->
        <table>
            <?php
              // SQL to retrieve database records with formatted date result
            	$sql = "SELECT
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
                  DATE_FORMAT(`start_timestamp`, \"%Y-%m-%d %H:%i\") start_timestamp,
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
                ORDER BY  a.last_name, a.customer_id, b.start_timestamp";

            	// Execute SQL and save result
            	$result = mysqli_query($dbc, $sql);

              $breakid = '';
              // Loop through each row returned by datbase
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ( $breakid != $row['customer_id'] ) {
                  echo '<tr style="background-color: rgb(226, 226, 226)">';
                  echo '<td>' . $row['last_name'] . ', ' . $row['first_name'] .'</td>';
                  echo '<td style="padding:10px;">' . $row['address1'] . '<br/>';
                  if ( $row['address2'] != null ) {
                    echo $row['address2'] . '<br/>';
                  }
                  echo $row['city'] . ', ' . $row['state'] . ' ' . $row['zip'] . '</td>';
                  echo '<td>';
                  if ( $row['org_name'] != null ) {
                    echo $row['org_name'] . '<br/>';
                  }
                  echo $row['phone'] . '<br/>' . $row['email'] . '</td>';
                  echo '</tr>';
                  $breakid = $row['customer_id'];
                }
                echo '<tr style="background-color: rgb(255, 255, 255)">';
                echo '<td style="text-align:right; padding:10px;">';
                if ( $row['cancellation'] != null ) {
                  echo ' Canceled';
                }
                echo '</td>';
                echo '<td colspan="2" style="text-align:left; padding:10px;">' . $row['start_timestamp'] . ' ' . $row['name'] . '</td>' ;
                //echo '<td>' . $row['name'] . '</td>';

                echo '</tr>';
              }
             ?>
        </table>

        <p id="report">Reporting Options:</p>
        <a href="rptresbycust.php" class="report">Reservations by Customers</a>
        <a href="rptresbydate.php" class="report">Reservations by Date</a>
    </div>

<?php //include('../../private/shared/footer.php'); ?>
