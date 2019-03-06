<?php
function user_data($user_id) {
	// input user id and needed field names, then output array of values of those fields
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1) {
		unset($func_get_args[0]);

		$fields = implode(', ', $func_get_args);

		$sql = "SELECT $fields FROM users WHERE user_id = $user_id";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		return mysqli_fetch_assoc($result);
	}
}

function logged_in() {
	// return true if logged in
	return (isset($_SESSION['user_id']))? true: false;
}

function user_exists($email) {
	// return true if email exists
	$email = sanitize($email);
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($GLOBALS['conn'], $sql);
	return (mysqli_num_rows($result) > 0) ? true : false; 
}

function user_active($email) {
	// return true if the user account is activated
	$email = sanitize($email);
	$sql = "SELECT * FROM users WHERE email = '$email' AND active = 1";
	$result = mysqli_query($GLOBALS['conn'], $sql);
	return (mysqli_num_rows($result) > 0) ? true : false; 
}

function user_id_from_email($email) {
	// return user_id when email is given
	$email = sanitize($email);
	$sql = "SELECT user_id FROM users WHERE email = '$email'";
	$result = mysqli_query($GLOBALS['conn'], $sql);
	return mysqli_fetch_array($result, MYSQLI_NUM)[0];
}

function login($email, $password) {
	// when email and password is given, return if u/n and p/w is correct or not.
	$user_id = user_id_from_email($email);

	$email = sanitize($email);
	$password = md5($password);

	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($GLOBALS['conn'], $sql);
	return (mysqli_num_rows($result) > 0) ? true : false; 
}
 ?>