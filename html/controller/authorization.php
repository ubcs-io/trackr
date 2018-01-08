<?php 

// Verify user is supposed to be permitted. Left generic for end users.

if (isset($_COOKIE['trackr']) && $_COOKIE['trackr'] == "Authorized") {

  // User has permission already

} elseif (isset($_GET['user']) && $_GET['user'] == $user_username && $_GET['pass'] == $user_password) {

	// Set a cookie with the value "Authorized"
	setcookie('trackr', 'Authorized', time() + (365 * 24 * 60), "/" );

} else {

	// Otherwise, send them someplace else

	// Verify authorization is enabled, defaults to no
	if ($authorization_enabled === "YES") {
		header ("Location: http://google.com/");
		exit;
	}

}