<?php 
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';

//check if the user is logged in
if (logged_in() === true) {
	//collect logged in user data
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'email', 'password', 'first_name', 'last_name');
	//check if the user account is not active
	if (user_active($user_data['email']) === false) {
		//end user session
		session_destroy();
		//redirected to homepage
		header('Location: index.php');
		exit();
	}
}
$errors = array();

?>