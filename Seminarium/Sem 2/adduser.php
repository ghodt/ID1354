<?php

require_once 'serversetup.php';

$conn = new mysqli($servername, $serverusername, $serverpassword, "users");

// Use prepare and bind for security
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// Set parameters and execute
$username = $_POST["addusername"];
$password = $_POST["addpassword"];

$stmt->execute();

include 'accountcreated.html';
