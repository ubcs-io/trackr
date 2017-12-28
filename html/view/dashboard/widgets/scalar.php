
<?php


?>

<div class="row">

	<?php

		// For each of those modules that is active, call the widget view
		foreach ($db->scalar_widgets as $widget) { 

		$event = new event_manager( $con );

		$event->set_event_details( $widget['id'] );

		$event->event_status( );

		?>

			<div class="col-sm-6 col-md-6">

				<div class="lead"><?php echo $event->name; ?> <br></div>
					<div class="progress">
					  <div class="progress-bar progress-bar-default progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $event->percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $event->percentage; ?>%"> <?php echo $event->percentage_label; ?>%
					  </div>
					</div>

				<span class="text-muted"><?php echo $event->description; ?></span>
			</div>
			
		<?php }

	?>

</div>