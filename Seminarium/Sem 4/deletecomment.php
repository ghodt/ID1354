<?php

require_once 'serversetup.php';

// Establish connection with server
$conn = new mysqli($servername, $serverusername, $serverpassword, "users");

$username = $_POST["deleteusername"];
$timestamp = $_POST["deletetimestamp"];
$recipe = $_POST["recipe"];


$res = $conn->query('DELETE FROM ' . $recipe . 'comments WHERE username="' . $username . '" AND timestamp="' . $timestamp . '"');

if($res == TRUE){
	echo "Comment deleted.";
} else{
	echo "Could not delete comment.";
}

//include $recipe . '.php';

?>
