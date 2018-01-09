<?php

require_once 'classes/Recipesite/Controller/Controller.php';


if (!empty($_POST["username"]) && !empty($_POST["password"]) && ctype_alnum($_POST["username"]) && ctype_alnum($_POST["password"])){
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$conn = Controller::getController();
	$result = $conn->login();

	if($result){
		$_SESSION["username"] = $_POST["username"];
		include'index.php';
	} else{
		include 'failedlogin.php';
	}
} else{
	include 'failedlogin.php';
}








