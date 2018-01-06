
<?php

?>
  <hr>
  <div class="row">
  <h2 class="sub-header">Recent Events</h2>

    <div class="table-responsive">
     
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Value</th>
          </tr>
        </thead>
        <tbody>

	<?php

		// For each of those modules that is active, call the widget view

		foreach ($recent_events->events as $event) { 

			?>
			    <tr>
                  <td><?php echo $event["table_name"]; ?></td>
                  <td><?php echo $event["date"]; ?></td>
                  <td><?php echo $event["value"]; ?></td>
                </tr>
			
		<?php }

	?>

      </tbody>
    </table>
  </div>
</div>
