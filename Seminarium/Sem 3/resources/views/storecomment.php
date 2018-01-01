<?php

require '../../classes/Recipesite/Controller/Controller.php';

$recipe = $_POST["recipe"];

if (!empty($_POST["comment"])){
	
	$conn = Controller::getController();
	$result = $conn->addComment($recipe);
}

include $recipe . '.php'
?>