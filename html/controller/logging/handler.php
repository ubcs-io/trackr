<?php 

// This section detects query strings and does the logging
$event_logger = new event_logger($con);


// Check if there's a query string for logging an event
if (isset($_GET['log']) && $_GET['log'] == "true") {

	// If the value parameter is set assign it to 1 or 0
	if (isset($_GET['complete'])) {

		// If the value is true, give it a 1, otherwise 0
		$value = ($_GET['complete'] == "true" ? 1 : 0);

	} else {

		// If there isn't a value parameter assign value to the value query string
		$value = $_GET['value'];

	}

	// Log to the correct event
	$event = $_GET['event'];

	// Scale events use a value query
	$event_logger->log_event ( $event, $value );


	// Redirect to the overview page without query strings
    header("Location: index.php" );
    exit;

}
