<?php 

// Verify user is supposed to be permitted. Left generic for end users.

if (isset($_COOKIE['trackr']) && $_COOKIE['trackr'] == "Authorized") {

  // User has permission already

} elseif (isset($_GET['user']) && $_GET['pass'] == "userpassword") {

	// Set a cookie with the value "Authorized"
	setcookie('trackr', 'Authorized', time() + (365 * 24 * 60), "/" );

} else {

	# The block below is commented out since each authorization file should be different
	# Please do not use this default layout in a live project

	// Otherwise, send them someplace else
	// header ("Location: http://lmgtfy.com/");
	// exit;

}