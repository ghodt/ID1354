<?php

// FUXKING FUNKAR NU SÅ NO TOUCHY
require_once 'classes/Recipesite/Controller/Controller.php';
//use Recipesite\Controller\Controller;

if (!empty($_POST["username"]) && !empty($_POST["password"])){
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	//$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	
	$conn = Controller::getController();
	$result = $conn->login();

	if($result){
		$_SESSION["username"] = $_POST["username"];
		include'/wamp64/www/sem3/index.php';
	} else{
		include 'failedlogin.php';
	}
} else{
	include 'failedlogin.php';
}

// Vid tilläggning av nya användare sen 
/*$sql = "INSERT INTO users (username, password) VALUES ('good', 'good')";

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// set parameters and execute
$username = $_POST["username"];
$password = $_POST["password"];
$stmt->execute();

*/







