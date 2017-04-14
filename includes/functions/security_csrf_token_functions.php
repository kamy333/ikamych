<?php


function request_is_get() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function request_is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// Must call session_start() before this loads

// Generate a token for use with CSRF protection.
// Does not store the token.
function csrf_token() {
	return md5(uniqid(rand(), TRUE));
}

// Generate and store CSRF token in user session.
// Requires session to have been started already.
function create_csrf_token($id="") {
	$token = csrf_token();
  $_SESSION['csrf_token'.$id] = $token;
  $_SESSION['csrf_token_time'.$id] = time();
	return $token;
}

// Destroys a token by removing it from the session.
function destroy_csrf_token($id="") {
  $_SESSION['csrf_token'.$id] = null;
  $_SESSION['csrf_token_time'.$id] = null;
	return true;
}

// Return an HTML tag including the CSRF token
// for use in a form.
// Usage: echo csrf_token_tag();
function csrf_token_tag($id="") {
	$token = create_csrf_token($id);
	return "<input type=\"hidden\" name=\"csrf_token{$id}\" value=\"".$token."\">";
}

// Returns true if user-submitted POST token is
// identical to the previously stored SESSION token.
// Returns false otherwise.
function csrf_token_is_valid($id="") {
	if(isset($_POST['csrf_token'.$id])) {
		$user_token = $_POST['csrf_token'.$id];
		$stored_token = $_SESSION['csrf_token'.$id];
		return $user_token === $stored_token;
	} else {
		return false;
	}
}

// You can simply check the token validity and
// handle the failure yourself, or you can use
// this "stop-everything-on-failure" function.
function die_on_csrf_token_failure($id="") {
	if(!csrf_token_is_valid($id)) {
		die("CSRF token validation failed.");
	}
}

// Optional check to see if token is also recent
function csrf_token_is_recent($id="") {
	$max_elapsed = 60 * 60 * 24; // 1 day
	if(isset($_SESSION['csrf_token_time'.$id])) {
		$stored_time = $_SESSION['csrf_token_time'.$id];
		return ($stored_time + $max_elapsed) >= time();
	} else {
		// Remove expired token
		destroy_csrf_token($id);
		return false;
	}
}

?>
