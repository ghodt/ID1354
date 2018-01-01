<?php

// fucking shit mannen
require_once "/wamp64\www\sem3\classes\Recipesite\Integration\DatabaseConnection.php";


class Controller{
	
	const CONTROLLER_NAME = "controller";
	private $conn;
	
	public function __construct() {
        $this->conn = new DatabaseConnection();
    }
	
	public static function getController() {
        if (!isset($_SESSION[self::CONTROLLER_NAME])) {
            return new Controller();
        } else{
			return unserialize($_SESSION[self::CONTROLLER_NAME]);
		}
    }
	
	public function login(){
		if($this->conn->login()){
			return true;
		}else{
			return false;
		}
	}
	
	public function getComments($recipe){
		return $this->conn->getComments($recipe);
	}
	
	public function addComment($recipe){
		return $this->conn->addComment($recipe);
	}
	
	public function deleteComment($recipe){
		return $this->conn->deleteComment($recipe);
	}
	
	// anropas alltid innan filen dör?
	public function __destruct() {
        $_SESSION[self::CONTROLLER_NAME] = serialize($this);
    }
	
}