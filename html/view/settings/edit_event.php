<?php 

$db = new db($con);

// Fetch the event details
$sql = "SELECT * FROM tracked_events WHERE name = '$event_name'";
$db->event_details = $db->query( $sql );

$name = $db->event_details[0]['name'] ?: "Event Name";
$description = $db->event_details[0]['description'] ?: "Description";

$instruction = ($name == "Event Name") ? "Create Event" : "Update";


?>

<div class="col-md-8 col-md-offset-2 well">
  <div class="page-header">Event Editor</div>
  <form method="GET">


    <input type="hidden" name="id" id="name" value="<?php echo $db->event_details[0]['id'] ?>">

    <div class="form-group">
      <label for="new_name">Event Name</label>
      <input type="text" name="event" class="form-control" id="new_name" value="<?php echo $name ?>">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" name="description" class="form-control" id="description" value="<?php echo $description ?>">
    </div>

  <hr>

    <button type="submit" class="btn btn-primary">
      <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp; <?php echo $instruction ?>
    </button>

    <?php 

      // Check whether to show the disable or enable button
      if ($db->event_details[0]['active'] === "1") { ?>

        <a href="?edit=true&fields=status&value=disabled&id=<?php echo $db->event_details[0]['id']; ?>" class="btn btn-danger" role="button">
          <span class="glyphicon glyphicon-pause" aria-hidden="true"></span>&nbsp;&nbsp; Disable
        </a> 

      <?php } elseif ($db->event_details[0]['active'] === "0") { ?>
    
        <a href="?edit=true&fields=status&value=enabled&id=<?php echo $db->event_details[0]['id']; ?>" class="btn btn-success" role="button">
          <span class="glyphicon glyphicon-play" aria-hidden="true"></span>&nbsp;&nbsp; Enable
        </a> 
    
      <?php }
    
    ?>

    <a href="?exit=true" class="btn btn-default pull-right" role="button">
      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;&nbsp; Cancel
    </a>

  </form>

</div>