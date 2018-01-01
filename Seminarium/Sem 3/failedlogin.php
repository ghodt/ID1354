<?php
// Start the session
require '/wamp64\www\sem3\startup.php';
//require '../../startup.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Tasty Recipes</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="resources/css/style.css" />
</head>

<body>
	<header>
		<p><a href="../../index.php" id="logo">Tasty Recipes</a></p>
		<nav id="menu">
			<ul>
				<li id="active"><a href="resources/views/login.php" class="nav-link">Log in</a></li>
				<li><a href="resources/views/calendar.php" class="nav-link">Calendar</a></li>
				<li><a href="resources/views/pancakes.php" class="nav-link">Pancakes</a></li>
				<li><a href="resources/views/meatballs.php" class="nav-link">Meatballs</a></li>
				<li><a href="index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	<section class="content">
		<h2>Log in</h2>
		<form id="loginform" action="handlelogin.php" method="post">
			<div id="inputs">
				<div id="wrong-login">Wrong username or password.</div>
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