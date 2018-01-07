<?php
require_once '../../startup.php';
require_once '../../classes/Recipesite/Controller/Controller.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Tasty Recipes</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
	<header>
		<p><a href="index.php" id="logo">Tasty Recipes</a></p>
		<nav id="menu">
			<ul>
				<li>
					<?php if(!isset($_SESSION["username"])){
						echo ('<a href="login.php" class="nav-link">Log in</a>');
					} else{
						echo ('<a href="../../logout.php" class="nav-link">Log out</a>');
					}
					?>
				</li>
				<li><a href="calendar.php" class="nav-link">Calendar</a></li>
				<li id="active"><a href="pancakes.php" class="nav-link">Pancakes</a></li>
				<li><a href="meatballs.php" class="nav-link">Meatballs</a></li>
				<li><a href="../../index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	
	<section class="content">
		<h2>Pancakes</h2>
		<figure>
			<img src="../images/pancakes.jpg" alt="image of pancakes" class="recipe-img">
			<figcaption>Recipe source: <a href="http://allrecipes.com/recipe/220142/fluffy-swedish-pancakes/" class="non-nav-link">allrecipes.com</a>. Image source: <a href="https://www.koket.se/pannkaka1" class="non-nav-link">koket.se</a>.</figcaption>
		</figure>
		<div id="meta">
			<ul id="recipe-info">
				<li id="servings">4 servings</li>
				<li id="time">15 min</li>
			</ul>
		</div>
		<h3>Ingredients</h3>
		<ul id="ingredients">
			<li>4 eggs</li>
			<li>1 cup milk </li>
			<li>1/2 cup warm water</li>
			<li>3 tablespoons white sugar</li>
			<li>1 cup all-purpose flour</li>
			<li>1/2 teaspoon salt</li>
			<li>1/2 cup butter, melted</li>
			<li>1 tablespoon butter, melted, or as needed</li>
		</ul>
		<div id="instructions">
			<h3>Instructions</h3>
			<ol id="instruction-list">
				<li>Blend eggs, milk, warm water, white sugar, flour, and salt together in a large mixing bowl with an electric mixer until well combined into a smooth batter.</li>
				<li>Stream the melted butter into the batter while continuing to beat.</li>
				<li>Heat a skillet or crepe pan over medium heat. Coat the cooking surface with a thin layer of butter.</li>
				<li>Pour a thin layer of batter onto the prepared cooking surface; swirl the pan to assure even coverage.</li>
				<li>Cook the crepe until browned on the bottom, 1 to 2 minutes; flip the crepe and continue cooking until the other side is browned. Serve immediately.</li>
			</ol>
			
			<?php
				if(isset($_SESSION["commentdeleted"])){
					if($_SESSION["commentdeleted"]){
						$_SESSION["commentdeleted"] = FALSE;
						echo '<div class="comment-status">Comment deleted</div>';
					} else {
						echo '<div class="comment-status">Comment could not be deleted</div>';
					}
				}
			?>
		</div>

		<h3>Comments</h3>
		<div id="comment-section">
			<?php
				if(isset($_SESSION["username"])){
					echo '<form id="write-comment" action="storecomment.php" method="post">
						<div class="input-description">Comment on this recipe:</div><br/>
						<textarea name="comment" cols="60"></textarea><br/>
						<input type="hidden" name="user" value="' . $_SESSION["username"] . '">
						<input type="hidden" name="recipe" value="pancakes">
						<input type="submit" value="Send comment">
					</form>';
				}
				
				$conn = Controller::getController();
				
				$result = $conn->getComments("pancakes");
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<div class="comment">
								<div class="username">' . $row["username"] . '</div>
								<div class="comment-time"> ' . $row["timestamp"] . '</div>
								<div class="user-comment">' . $row["comment"] . '</div>';
						if(isset($_SESSION["username"])){
							if($row["username"] === $_SESSION["username"]){
								echo '<form  action="deletecomment.php" method="post">
										<input type="submit" value="Delete">
										<input type="hidden" name="deletetimestamp" value="' . $row["timestamp"] . '">
										<input type="hidden" name="deleteusername" value="' . $row["username"] . '">
										<input type="hidden" name="recipe" value="pancakes">
									</form>';
							}
						}
						echo '</div>';
					}
				}

			?>
		</div>
	</section>

	<footer>
	</footer>
</body>
</html>