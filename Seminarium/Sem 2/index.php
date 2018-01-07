<?php
// Start the session
session_start();
if(!empty($_POST["username"])){
	$_SESSION["username"] = $_POST["username"];
	$username = $_POST["username"];
}

?>

<!DOCTYPE html>

<html>
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
				<li id="active"><a href="index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	<section class="content">
		<h2 class="index-heading">Welcome</h2>
		<p> Bacon ipsum dolor amet swine officia pastrami tenderloin pancetta mollit occaecat. In shank ham velit.
		Dolore minim strip steak, beef ribs pastrami swine nisi quis pork chop sirloin irure elit short ribs ham hock filet mignon.
		Labore dolor landjaeger drumstick dolore aliqua pork belly eu laboris bacon chuck pork.

		Meatloaf commodo exercitation tempor culpa adipisicing turkey, consectetur brisket voluptate bresaola. Shoulder in ut voluptate
		dolore eiusmod. Biltong doner kielbasa eu shank, prosciutto sirloin meatloaf venison anim. Ham hock ham leberkas commodo nisi,
		spare ribs tri-tip laboris lorem ullamco bacon labore.
		
		Culpa short loin in, ground round kevin aliqua hamburger cillum. Beef ribs consectetur short ribs pork belly strip steak,
		sed pastrami excepteur pork biltong cillum exercitation kevin ground round reprehenderit. Meatloaf laborum consequat incididunt,
		sausage salami jowl. Sirloin frankfurter hamburger filet mignon venison labore.</p>

		<h3 class="index-heading" >Calendar</h3>
		<!-- ska ha l�nk till kalendern -->
		<p>This is a link to the <a href="calendar.php" class="non-nav-link">calendar page.</a></p>
	</section>
</body>
</html>
