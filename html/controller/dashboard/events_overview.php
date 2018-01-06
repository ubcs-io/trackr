<?php 

// Create a new db objects
$recent_events = new recent_events($con);

// Fetch the recent events
$recent_events->fetch_recent_5();


// // If there are recent events show the table
if ($recent_events->events != NULL) {
	
	include ("/var/www/html/www.trackr-dev.com/public_html/view/dashboard/recent_events.php");

}