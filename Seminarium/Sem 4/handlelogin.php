<?php

require_once 'serversetup.php';

// Create connection
$conn = new mysqli($servername, $serverusername, $serverpassword, "users");

if (!empty($_POST["username"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = "select username, password from users where username='". $username ."'and password='" . $password . "'";

	$result = $conn->query($sql);

	if($result->num_rows == 0){
		include'failedlogin.php';
	} else{
		$_SESSION["username"] = $username;
		include 'index.php';
	}
} else{
	include 'login.php';
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







