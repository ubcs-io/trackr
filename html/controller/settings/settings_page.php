<?php 

// Create a new db object
$db = new db($con);

// Fetch the binary tracked events
$sql = "SELECT * FROM tracked_events WHERE type = 'binary' AND active = 1 LIMIT 4";
$db->binary_widgets_logging = $db->query( $sql );

// Fetch the scalar tracked events
$sql = "SELECT * FROM tracked_events WHERE type = 'scale' AND active = 1 LIMIT 3";
$db->scalar_widgets_logging = $db->query( $sql );



// If there are active BINARY events, show the block
if ($db->binary_widgets_logging != NULL) {
	
	include ("/var/www/html/www.trackr-dev.com/public_html/view/event_logging/binary.php");

}

// If there are qualifying SCALAR widgets, show the block below
if ($db->scalar_widgets_logging != NULL) {
	
	include ("/var/www/html/www.trackr-dev.com/public_html/view/event_logging/scalar.php");

}




	