<?php 

// Create a new db objects
$db = new db($con);

// Fetch the binary tracked events
$sql = "SELECT * FROM tracked_events WHERE type = 'binary' AND active = 1";
$db->binary_widgets_logging = $db->query( $sql );

// Fetch the scalar tracked events
$sql = "SELECT * FROM tracked_events WHERE type = 'scale' AND active = 1";
$db->scalar_widgets_logging = $db->query( $sql );


// If there are active BINARY events, show the block
if ($db->binary_widgets_logging != NULL) {


	include ( $_SERVER['DOCUMENT_ROOT'] . $location . "/view/event_logging/binary.php");	

}

// If there are qualifying SCALAR widgets, show the block below
if ($db->scalar_widgets_logging != NULL) {
	
	include ( $_SERVER['DOCUMENT_ROOT'] . $location . "/view/event_logging/scalar.php");	

}




	