<?php

// Just default to an array of 7 items
$scale = array_fill(1, 7, 0);

?>

<div class="row">

  <?php

    // For each of those modules that is active, call the widget view
    foreach ($db->scalar_widgets_logging as $widget) { ?>

      <div class="col-sm-6 col-md-4">
        <h3><?php echo $widget['name']; ?></h3>
        <p><?php echo $widget['description']; ?></p>
        <div class="btn-group" role="group">

          <?php 

            foreach ($scale as $key => $value) {
              echo '<a href="?log=true&value=' . $key . '&event=' . $widget['name'] . '"><button type="button" class="btn btn-default">' . $key . '</button>';
            }

          ?>

        </div>
      </div>
      
    <?php }

  ?>

</div>


