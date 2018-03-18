<?php

// Just default to an array of 7 items
$scale = array_fill(1, 7, 0);

?>

<div class="row">

  <?php

    // For each of those modules that is active, call the widget view
    foreach ($db->scalar_widgets_logging as $widget) { ?>

      <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12">
        <div class="col-12 well">
          <a href="settings.php?view=true&id=<?php echo $widget['id']; ?>" class="btn btn-default pull-right" role="button">
            <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>&nbsp;&nbsp;Edit
          </a>
        <h3><?php echo $widget['name']; ?></h3>
        <p><?php echo $widget['description']; ?></p>

        <div class="btn-group" role="group">

          <?php 

            foreach ($scale as $key => $value) {
              echo '<a href="?log=true&value=' . $key . '&event=' . $widget['name'] . '"><button type="button" class="btn btn-default">' . $key . '</button></a>';
            }

          ?>

          </div>
        </div>
      </div>
      
    <?php }

  ?>

</div>


