
<?php


?>

<div class="row">

	<?php

		// For each of those modules that is active, call the widget view
		foreach ($db->scalar_widgets as $widget) { ?>

			<div class="col-xs-6 col-md-6">

				<div class="lead"><?php echo $widget['name']; ?> <br></div>
					<div class="progress">
					  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
					  </div>
					</div>

				<span class="text-muted"><?php echo $widget['description']; ?></span>
			</div>
			
		<?php }

	?>

</div>