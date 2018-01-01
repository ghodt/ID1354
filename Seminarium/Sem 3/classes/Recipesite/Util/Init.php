<?php 

namespace Recipesite\Util;

// Bunch of init stuff

class Init{

	public static function init(){
		session_start();
		self::createClassLoader();
		if(empty($_POST["username"])){
			$_SESSION["username"] = NULL;
		} else {
			$_SESSION["username"] = $_POST["username"];
			$username = $_POST["username"];
		}
	}

	private static function createClassLoader() {
		spl_autoload_register(function ($className) {
			require_once 'classes/' . \str_replace('\\', '/', $className) . '.php';
		});
	}
	
}
