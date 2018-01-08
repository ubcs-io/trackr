
<?php

?>

<div class="row">

	<?php

		// For each of those modules that is active, call the widget view

		foreach ($db->binary_widgets as $widget) { 

			$event = new event_manager( $con );

			$event->set_event_details( $widget['id'] );

			$event->event_status( );

			?>

		    <div class="col-xs-6 col-sm-3 placeholder">
		      <img src="view/media<?php echo $event->background; ?>" width="200" height="200" class="img-responsive">
		      <h4><?php echo $event->name; ?></h4>
		      <span class="text-muted"><?php echo $event->description; ?></span>
		    </div>
			
		<?php }

	?>

</div>