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
				<li id="active"><a href="login.php" class="nav-link">Log in</a></li>
				<li><a href="calendar.php" class="nav-link">Calendar</a></li>
				<li><a href="pancakes.php" class="nav-link">Pancakes</a></li>
				<li><a href="meatballs.php" class="nav-link">Meatballs</a></li>
				<li><a href="index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	<section class="content">
		<h2>Log in</h2>
		<form id="loginform" action="handlelogin.php" method="post">
			<div id="inputs">
				<div class="input-description">Username:</div><br/>
				<input type="text" name="username"><br/>
				<div class="input-description">Password:</div><br/>
				<input type="password" name="password"><br/>
				<input type="submit" value="Submit">
			</div>
		</form>
	</section>

	<footer>
	</footer>
</body>
</html>