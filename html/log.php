<?php 

include ("model/db/operations.php");

include ("controller/authorization.php");

include ("controller/header.php");

include ("model/events/event_logger.php");

include ("controller/logging/handler.php");

include ("view/header.php");

?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("view/dashboard/dashboard_sidebar.php"); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">Event Logger</h1>

            <div class="lead">Record events and mark things as completed </div>

            <?php include ("controller/logging/events.php"); ?>

        </div>
      </div>
    </div>

<?php include ("view/footer.php"); ?>
