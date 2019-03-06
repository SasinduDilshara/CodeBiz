<?php 

// Create connection
$GLOBALS['conn'] = mysqli_connect('localhost', 'root', '', 'lr');

// Check connection
if ($GLOBALS['conn']->connect_error) {
    die("Connection failed: " . $GLOBALS['conn']->connect_error);
} 

?>