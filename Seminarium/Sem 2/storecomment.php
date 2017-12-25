<?php

require_once 'serversetup.php';

// Establish connection with server
$conn = new mysqli($servername, $serverusername, $serverpassword, "users");

$username = $_POST["user"];
$comment = $_POST["comment"];
$recipe = $_POST["recipe"];


$res = $conn->query('INSERT INTO ' . $recipe . 'comments values("'. $username .'", "' . $comment .'", now())');

// if probably not needed
if($res === TRUE){
	include $recipe . '.php';
} else{
	include $recipe . '.php';
	//echo $res;
}

?>