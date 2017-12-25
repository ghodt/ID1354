<?php
// Start the session
session_start();
if(!empty($_POST["username"])){
	$_SESSION["username"] = $_POST["username"];
	$username = $_POST["username"];
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Tasty Recipes</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="style.css" />
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
				<li><a href="pancakes.php" class="nav-link">Pancakes</a></li>
				<li><a href="meatballs.php" class="nav-link">Meatballs</a></li>
				<li><a href="index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	<section class="content">
		<?php
			echo "<p>" . $_POST["username"] . "</p>";
			echo "<p>" . $_POST["password"]. "</p>";
			echo "session: " . $_SESSION["username"];

			//file_put_contents('users.txt', $data, FILE_APPEND);
			$gris = "gris";
			echo '<p>You are now logged in.</p>' . $gris;
		?>
	</section>

	<footer>
	</footer>
</body>
</html>