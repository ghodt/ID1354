<?php

require '../../classes/Recipesite/Controller/Controller.php';

$recipe = $_POST["recipe"];
	
$conn = Controller::getController();
$result = $conn->deleteComment($recipe);
if($result){
	$_SESSION["commentdeleted"] = TRUE;
} else {
	$_SESSION["commentdeleted"] = FALSE;
}


include $recipe . '.php'

?>
