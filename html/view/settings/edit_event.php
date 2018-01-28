<?php 

$name = $event_manager->name ?: "Event Name";
$description = $event_manager->description ?: "Give some context for what you are planning on tracking";
$instruction = ($name == "Event Name") ? "Create Event" : "Update";
$name = $event_manager->name ?: "Event Name";

?>

<div class="col-md-8 col-md-offset-2 well">
  <div class="page-header">Event Editor</div>
  <form method="GET">

    <input type="hidden" name="id" id="name" value="<?php echo $event_manager->id; ?>">

    <div class="form-group">
      <label for="new_name">Event Name</label>
      <input type="text" name="event" class="form-control" id="new_name" value="<?php echo $name ?>">
    </div>

    <div class="form-group">
      <label for="type">Type</label>
      <select class="form-control" id="type" name="type">
        <?php $event_manager->create_type_view( ); ?>
      </select>
    </div>

    <div class="form-group">
      <label for="delay">Days Before Reset</label>
      <input type="text" name="delay" class="form-control" id="delay" value="<?php echo $event_manager->delay; ?>">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" name="description" class="form-control" id="description" value="<?php echo $description; ?>">
    </div>

  <hr>

    <button type="submit" class="btn btn-primary">
      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp; <?php echo $instruction ?>
    </button>

    <?php 

      // Check whether to show the disable or enable button
      if ($event_manager->status === "1") { ?>

        <a href="?edit=true&fields=status&value=disabled&id=<?php echo $event_manager->id; ?>" class="btn btn-danger" role="button">
          <span class="glyphicon glyphicon-pause" aria-hidden="true"></span>&nbsp;&nbsp; Disable
        </a> 

      <?php } elseif ($event_manager->status === "0") { ?>
    
        <a href="?edit=true&fields=status&value=enabled&id=<?php echo $event_manager->id; ?>" class="btn btn-success" role="button">
          <span class="glyphicon glyphicon-play" aria-hidden="true"></span>&nbsp;&nbsp; Enable
        </a> 
    
      <?php }
    
    ?>

    <a href="?exit=true" class="btn btn-default pull-right" role="button">
      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;&nbsp; Cancel
    </a>

  </form>

</div>