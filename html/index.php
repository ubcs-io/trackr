<?php 

include ("model/db/operations.php");

include ("model/events/event_manager.php");

include ("model/dashboard/recent_events.php");

include ("model/dashboard/widget.php");

include ("controller/authorization.php");

include ("controller/header.php");

include ("view/header.php");

// Turn off all error reporting
//error_reporting(0);

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

          <?php include ("controller/dashboard/widgets.php"); ?>

          <?php include ("controller/dashboard/events_overview.php"); ?>

        </div>
      </div>
    </div>

<?php include ("view/footer.php"); ?>

