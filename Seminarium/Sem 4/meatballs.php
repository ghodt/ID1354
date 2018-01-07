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
				<li class="nav-link">
					<?php if(!isset($_SESSION["username"])){
						echo ('<a href="login.php" class="nav-link">Log in</a>');
					} else{
						echo ('<a href="logout.php" class="nav-link">Log out</a>');
					}
					//print_r($_POST);
					?>
				</li>
				<li><a href="calendar.php" class="nav-link">Calendar</a></li>
				<li><a href="pancakes.php" class="nav-link">Pancakes</a></li>
				<li id="active"><a href="meatballs.php" class="nav-link">Meatballs</a></li>
				<li><a href="index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	<section class="content">
		<h2>Meatballs</h2>
		<figure>
			<img src="images/meatballs.jpg" alt="image of meatballs" class="recipe-img">
			<figcaption>Recipe and image source: <a href="https://therecipecritic.com/2016/08/the-best-swedish-meatballs/" class="non-nav-link">therecipecritic.com</a>.</figcaption>
		</figure>
		<div id="meta">
			<ul id="recipe-info">
				<li id="servings">6 servings</li>
				<li id="time">30 min</li>
			</ul>
		</div>
		<h3>Ingredients</h3>
		<ul id="ingredients">
			<li>1 pound ground </li>
			<li>1/4 cup panko bread crumbs</li>
			<li>1 tablespoon parsley, chopped</li>
			<li>1/4 teaspoon ground allspice</li>
			<li>1/4 teaspoon ground nutmeg</li>
			<li>1/4 cup onion, finely chopped</li>
			<li>1/2 teaspoon Garlic Powder</li>
			<li>1/8 teaspoon Pepper</li>
			<li>1/2 teaspoon salt</li>
			<li>1 egg</li>
			<li>1 tbsp. olive oil</li>
			<li>5 tbsp. butter</li>
			<li>3 tbsp. flour</li>
			<li>2 cups beef broth</li>
			<li>1 cup heavy cream</li>
			<li>1 Tablespoon Worcestershire sauce</li>
			<li>1 tsp. Dijon mustard</li>
			<li>salt and pepper to taste</li>
		</ul>
		<div id="instructions">
			<h3>Instructions</h3>
			<ol id="instruction-list">
				<li>In a medium sized bowl combine ground beef, panko, parsley, allspice, nutmeg, onion, garlic powder, pepper, salt and egg. Mix until combined.</li>
				<li>Roll into 12 large meatballs or 20 small meatballs. In a large skillet heat olive oil and 1 Tablespoon butter. Add the meatballs and cook turning continuously until brown on each side and cooked throughout. Transfer to a plate and cover with foil.</li>
				<li>Add 4 Tablespoons butter and flour to skillet and whisk until it turns brown. Slowly stir in beef broth and heavy cream. Add worchestershire sauce and dijon mustard and bring to a simmer until sauce starts to thicken. Salt and pepper to taste.</li>
				<li>Add the meatballs back to the skillet and simmer for another 1-2 minutes. Serve over egg noodles or rice.</li>
			</ol>
		</div>

		<h3>Comments</h3>
		<div id="comment-section">
			<?php
				if(isset($_SESSION["username"])){
					echo '<form id="write-comment" action="" method="post" >
						<div class="input-description">Comment on this recipe:</div><br/>
						<textarea id="comment-box" name="comment" cols="60"></textarea><br/>
						<input type="hidden" name="user" value="' . $_SESSION["username"] . '">
						<input id="recipe" type="hidden" name="recipe" value="meatballs">
						<input id="submit-button" type="submit" value="Send comment">
					</form>';
					//var_dump($_POST);
				}

			?>
			
			<script> readComments("meatballs");</script>
			
			<div id="comments"></div>

		</div>
	</section>
	<footer>
	</footer>
</body>
</html>