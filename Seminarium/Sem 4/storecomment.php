<?php

require_once 'serversetup.php';

/*if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
	echo "ajaxstuff here\n";
	echo $_POST['comment'];
} */

// Establish connection with server
$conn = new mysqli($servername, $serverusername, $serverpassword, "users");

$username = $_POST["user"];
$comment = $_POST["comment"];
$recipe = $_POST["recipe"];


$res = $conn->query('INSERT INTO ' . $recipe . 'comments values("'. $username .'", "' . $comment .'", now())');

if($res == TRUE){
	echo "Comment sent.";
} else{
	echo "Could not send comment.";
}



?>