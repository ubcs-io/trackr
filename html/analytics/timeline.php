<?php 

include ("../model/db/operations.php");

include ("../controller/authorization.php");

include ("../controller/header.php");

include ("../view/header.php");

?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("../view/dashboard/dashboard_sidebar.php"); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <h1 class="page-header">Timeline</h1>

            <div class="lead">View all your events over a certain period of time on the chart below</div>

            <div style="width:100%">
              <div id="AffectOT" style="height:500px; margin:auto; border:#000000; border-style: solid; border-width:2px;"></div>
            </div>

            // Have the javascript for this chart render in the head of this page

        </div>
      </div>
    </div>

<?php include ("../view/footer.php"); ?>
