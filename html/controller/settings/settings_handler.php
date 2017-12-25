<?php 

// This section detects query strings and does the logging
$event_manager = new event_manager($con);

if (isset($_GET['event'])) {
	
	$event_name = $_GET['event'];

}

// Check if there's a query string for logging an event
if (isset($_GET['view']) && $_GET['view'] == "true") {

	// Show the details of the particular event
	include ("../view/settings/edit_event.php");

} elseif (isset($_GET['description']) && $_GET['origname'] == "Event Name") {

	$event_manager->add_event ( $event_name, "binary", $_GET['description'] ) ;

	// Now that a new event has been created, update the tables
	$event_manager->build_tables();

	// Redirect to the overview page without query strings
    // header("Location: http://www.health-dev.com/analytics/settings.php");
    // exit;

} elseif (isset($_GET['description'])) {

	$event_manager->update_event ( $_GET['origname'], "name", $event_name );
	$event_manager->update_event ( $_GET['origname'], "description", $_GET['description'] );

	// $event_manager->update_event ( $_GET['origname'], "name", $event_name );
	// $event_manager->update_event ( $_GET['origname'], "description", $_GET['description'] );

	// Redirect to the overview page without query strings
    // header("Location: http://www.health-dev.com/analytics/settings.php");
    // exit;

} elseif (isset($_GET['edit']) && $_GET['edit'] == "true") {

	// If there's a disable query, mark the event as not active
	if ($_GET['fields'] == "status" && $_GET['value'] == "disabled") {

		$event_manager->update_event ( $event_name, "active", 0 );

	} elseif ($_GET['fields'] == "status" && $_GET['value'] == "enabled") {

		$event_manager->update_event ( $event_name, "active", 1 );

	}
	
	// Redirect to the overview page without query strings
    // header("Location: http://www.health-dev.com/analytics/settings.php");
    // exit;

}

// Show the events table so a user can select different events
include ("../view/settings/events_table.php");


?>
