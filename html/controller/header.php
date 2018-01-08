<?php 	

// Prepare range / start date vars
if (isset($_GET['range'])) {
  $range = $_GET['range'];
} else {
  $range = 7;
}

// Set the dates in the correct format
$start_date = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - $range, date("Y")));
$formatted_start_date = date('D, M jS', mktime(0, 0, 0, date("m") , date("d") - $range, date("Y")));