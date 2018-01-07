<?php 

namespace Recipesite\Util;

// Pretty empty now, but shows where you should place more init stuff in the future.

class Init{

	public static function init(){
		session_start();
		if(!empty($_POST["username"])){
			$_SESSION["username"] = $_POST["username"];
			$username = $_POST["username"];
		}
	}
	
}
