<?php

?>

<div class="row">

  <?php

    // For each of those modules that is active, call the widget view
    foreach ($db->binary_widgets_logging as $widget) { ?>

        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12">
          <div class="thumbnail">
            <div class="caption">
              <h3><?php echo $widget['name']; ?></h3>
              <p>
                <?php echo $widget['description']; ?><br><br></p>
              <p>
                <a href="?log=true&complete=true&id=<?php echo $widget['id']; ?>" class="btn btn-primary" role="button">
                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;Complete 
                </a> 
                <a href="?log=true&complete=false&id=<?php echo $widget['id']; ?>" class="btn btn-default" role="button">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
                <a href="settings.php?view=true&id=<?php echo $widget['id']; ?>" class="btn btn-default pull-right" role="button">
                  <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>&nbsp;&nbsp;Edit
                </a>
              </p>
            </div>
          </div>
        </div>
      
    <?php }

  ?>

</div>


