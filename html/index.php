<?php 

include ("model/db/operations.php");

include ("controller/authorization.php");

include ("controller/header.php");

include ("view/header.php");

?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("view/dashboard/dashboard_sidebar.php"); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Since <?php echo $formatted_start_date; ?></h1>

          <div class="row visible-xs visible-sm">    
            <div class="container">     
              <a href="analytics/log.php"><div class="btn btn-lg btn-default btn-block">Log New Event</div></a>
            </div>
          </div>

          <div class="row placeholders">

            <?php include ("controller/dashboard/widgets.php"); ?>

          </div>

          <h2 class="sub-header">Recent Events</h2>
          <div class="table-responsive">
           
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Event Type</th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                <?php #getRows ($con, $start_date); ?>
              </tbody>
            </table>

             // Show the recent events that are being tracked actively

          </div>
        </div>
      </div>
    </div>

<?php include ("view/footer.php"); ?>

