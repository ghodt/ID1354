<?php
// Start the session
session_start();

?>

<!DOCTYPE html>

<html>
<head>
	<title>Tasty Recipes</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
	<header>
		<p><a href="index.html" id="logo">Tasty Recipes</a></p>
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
				<li id="active"><a href="calendar.php" class="nav-link">Calendar</a></li>
				<li><a href="pancakes.php" class="nav-link">Pancakes</a></li>
				<li><a href="meatballs.php" class="nav-link">Meatballs</a></li>
				<li><a href="../../index.php" class="nav-link">Home</a></li>
			</ul>
		</nav>
	</header>
	<section class="content">
		<h2>Calendar</h2>
		<div id="calendar">
			<div id="month">
				October
			</div>
			<ul class="weekdays">
				<li>Mon</li>
				<li>Tue</li>
				<li>Wed</li>
				<li>Thu</li>
				<li>Fri</li>
				<li>Sat</li>
				<li>Sun</li>
			</ul>
			<div class="days">
				<ul class="week">
					<li>1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
					<li>6</li>
					<li>7</li>
				</ul>
				<ul class="week">
					<li>8</li>
					<li>9</li>
					<li>10</li>
					<li>11<br/><a href="pancakes.php"><img src="../images/pancakes.jpg" alt="image of pancakes" class="calendar-img"></a></li>
					<li>12</li>
					<li>13</li>
					<li>14</li>
				</ul>
				<ul class="week">
					<li>15</li>
					<li>16</li>
					<li>17</li>
					<li>18</li>
					<li>19</li>
					<li>20</li>
					<li>21</li>
				</ul>
				<ul class="week">
					<li>22</li>
					<li>23</li>
					<li>24</li>
					<li>25</li>
					<li>26</li>
					<li>27<br/><a href="meatballs.php"><img src="../images/meatballs_cropped.jpg" alt="image of meatballs" class="calendar-img"></a></li>
					<li>28</li>
				</ul>
				<ul class="week">
					<li>29</li>
					<li>30</li>
					<li>31</li>
				</ul>
			</div>
		</div>
	</section>
	<footer>
	</footer>
</body>
</html>