<?php
// Start the session
session_start();
if(!empty($_POST["username"])){
	$_SESSION["username"] = $_POST["username"];
	$username = $_POST["username"];
}

require_once 'serversetup.php';

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Tasty Recipes</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="style.css" />
	<script
		src="https://code.jquery.com/jquery-3.2.1.js"
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		crossorigin="anonymous">
	</script>
	<script src="js/savecomment.js"></script>
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
						echo ('<a href="logout.php" class="nav-link">Log out</a>');
					}
					?>
				</li>
				<li><a href="calendar.php" class="nav-link">Calendar</a></li>
				<li id="active"><a href="pancakes.php" class="nav-link">Pancakes</a></li>
				<li><a href="meatballs.php" class="nav-link">Meatballs</a></li>
				<li><a href="index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	<section class="content">
		<h2>Pancakes</h2>
		<figure>
			<img src="images/pancakes.jpg" alt="image of pancakes" class="recipe-img">
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
		</div>

		<h3>Comments</h3>
		<div id="comment-section">
			<?php
				if(isset($_SESSION["username"])){
					echo '<form id="write-comment" action="" method="post">
						<div class="input-description">Comment on this recipe:</div><br/>
						<textarea id="comment-box" name="comment" cols="60"></textarea><br/>
						<input type="hidden" name="user" value="' . $_SESSION["username"] . '">
						<input id="recipe" type="hidden" name="recipe" value="pancakes">
						<input id="submit-button" type="submit" value="Send comment">
					</form>';
				}
				
			?>
			
			<script> readComments("pancakes");</script>
			
			<div id="comments"></div>
			
		</div>
	</section>

	<footer>
	</footer>
</body>
</html>