<?php 

include ("model/db/operations.php");

include ("controller/authorization.php");

include ("controller/header.php");

include ("model/events/event_logger.php");

include ("model/events/event_manager.php");

include ("controller/logging/handler.php");

include ("view/header.php");

?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("view/dashboard/dashboard_sidebar.php"); ?>
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Settings</h1> 
    
            <a href="?view=true&event=" class="btn btn-primary pull-right" role="button">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp; New Event
            </a> 

          <div class="lead">Update tracked events, create new events, and generally modify things</div>

            <?php include ("controller/settings/settings_handler.php"); ?>

        </div>
      </div>
    </div>

<?php include ("view/footer.php"); ?>
