
<?php

	if (1) {
		// Default to the 
		$background = "/red.png";
	}

?>

<div class="row">

	<?php

		// For each of those modules that is active, call the widget view
		foreach ($db->binary_widgets as $widget) { 

			// var_dump($widget);
			// $widgets = new event_manager( $widget['id'] );
			// var_dump($widgets);

			?>

		    <div class="col-xs-6 col-sm-3 placeholder">
		      <img src="http://www.trackr-dev.com/view/media<?php echo $background?>" width="200" height="200" class="img-responsive">
		      <h4><?php echo $widget['name']; ?></h4>
		      <span class="text-muted"><?php echo $widget['description']; ?></span>
		    </div>
			
		<?php }

	?>

</div>