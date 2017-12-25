<?php

?>

<div class="row">

  <?php

    // For each of those modules that is active, call the widget view
    foreach ($db->binary_widgets_logging as $widget) { ?>

        <div class="col-sm-6 col-md-3">
          <div class="thumbnail">
            <div class="caption">
              <h3><?php echo $widget['name']; ?></h3>
              <p><?php echo $widget['description']; ?><br><br></p>
              <p>
                <a href="?log=true&complete=true&event=<?php echo $widget['name']; ?>" class="btn btn-primary" role="button">
                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;Complete 
                </a> 
                <a href="?log=true&complete=false&event=<?php echo $widget['name']; ?>" class="btn btn-default pull-right" role="button">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
              </p>
            </div>
          </div>
        </div>
      
    <?php }

  ?>

</div>


