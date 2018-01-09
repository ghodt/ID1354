<?php

class DatabaseConnection{
	
	public $conn;
	private $servername = "localhost:3306";
	private $serverusername = "good";
	private $serverpassword = "good";
	
	public function __construct() {
        $this->conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, "users");
    }
	
	public function login(){
		
		$username = htmlspecialchars($_POST["username"]);
		$password = $_POST["password"];
		$hash = password_hash($password, PASSWORD_DEFAULT);
		
		// get stored passwords that belongs to the username
		$sql = "select password from users where username='". $username ."'";

		$result = $this->conn->query($sql);
		
		// check if the sent password matches a hashed one on the server
		
		if($result->num_rows == 0){
			return false;
		} else{
			while($dbpassword = $result->fetch_assoc()) {
				if(password_verify($dbpassword["password"], $hash)){
					$_SESSION["username"] = $_POST["username"];
					return true;
				} else {
					return false;
				}
			}
		}
	}
	
	public function getComments($recipe){
		
		$this->conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, "users");
		
		$sql = "select * from " . $recipe . "comments ORDER BY timestamp ASC";
		
		return $this->conn->query($sql);
	}
	
	public function addComment($recipe){
		
		$this->conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, "users");

		$username = $_POST["user"];
		$comment = htmlspecialchars($_POST["comment"]);
		$recipe = $_POST["recipe"];


		return $this->conn->query('INSERT INTO ' . $recipe . 'comments values("'. $username .'", "' . $comment .'", now())');
		
	}
	
	public function deleteComment($recipe){
		
		$this->conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, "users");

		$username = $_POST["deleteusername"];
		$timestamp = $_POST["deletetimestamp"];
		$recipe = $_POST["recipe"];


		return $this->conn->query('DELETE FROM ' . $recipe . 'comments WHERE username="' . $username . '" AND timestamp="' . $timestamp . '"');

		
		
	}
}