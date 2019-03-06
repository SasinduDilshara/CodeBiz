<?php 
function array_sanitize(&$item) {
	$item = mysqli_real_escape_string($GLOBALS['conn'], $item);
}

function sanitize($data) {
	return mysqli_real_escape_string($GLOBALS['conn'], $data);
}

function output_errors($errors) {
	// function to output errors
	$output = array();
	foreach ($errors as $error) {
		$output[] = '<li>'. $error. '</li>';
	}
	return '<ul>'. implode('', $output). '</li>';
}
?>