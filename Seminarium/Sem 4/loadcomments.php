<?php

session_start();

require_once 'serversetup.php';

if(isset($_POST["recipe"])){

	$recipe = $_POST["recipe"];

	$conn = new mysqli($servername, $serverusername, $serverpassword, "users");

	$result = $conn->query("select * from " . $recipe . "comments ORDER BY timestamp ASC");

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<div class="comment">
				<div class="username">' . $row["username"] . '</div>
				<div class="comment-time"> ' . $row["timestamp"] . '</div>
				<div class="user-comment">' . $row["comment"] . '</div>';
			if(isset($_SESSION["username"])){
				if($row["username"] === $_SESSION["username"]){
					echo '<form id="delete" action="" method="post">
						<input type="hidden" name="deletetimestamp" value="' . $row["timestamp"] . '">
						<input type="hidden" name="deleteusername" value="' . $row["username"] . '">
						<input type="hidden" name="recipe" value="' . $recipe . '">
						<input id="delete-button" type="submit" value="Delete">
					</form>';
				}
			}
			
			echo '</div>';
		
		}
		
		echo '<script>
					$("form#delete").submit(function(e){
						
						e.preventDefault(); 
						
						var deleteUrl = "deletecomment.php";
						
						$.ajax({
						   type: "POST",
						   url: deleteUrl,
						   data: $(this).serialize(),
						   success: function(data)
						   {
							   alert(data);
								readComments("' . $recipe . '");
						   }
						});
						
						//e.preventDefault(); 
							
					});
				</script>';
	}
}