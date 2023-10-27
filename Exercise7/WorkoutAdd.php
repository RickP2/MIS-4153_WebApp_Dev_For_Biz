<?php
session_start();
?>

<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Add A Workout</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header">
				<h1><a href="index.php">Home</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="Logout.php">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Superslow Workout App</h2>
					</header>
					<?php
						if (isset($_SESSION["username"])){
					?>
					<div class="box">
						<form action="WorkoutAddProcessing.php" method="POST">
							Date: <input type="date" 	name="WorkoutDate"><br/>
							Bench Press Weight: <input type="text" 	name="BenchPressWeight"> kg <br/>
							Bench Press Time: <input type="text" 	name="BenchPressTime">sec <br/>
							Overhead Press Weight: <input type="text" 	name="OverheadPressWeight">kg <br/>
							Overhead Press Time: <input type="text" 	name="OverheadPressTime">sec <br/>
							Row Weight: <input type="text" 	name="RowWeight">kg <br/>
							Row Time: <input type="text" 	name="RowTime">sec <br/>
							Pulldown Weight: <input type="text" 	name="PulldownWeight">kg <br/>
							Pulldown Time: <input type="text" 	name="PulldownTime">sec <br/>
							Squat Weight: <input type="text" 	name="SquatWeight">kg <br/>
							Squat Time: <input type="text" 	name="SquatTime">sec <br/>
							Comments: <br/><textarea name="Comment"></textarea><br/>
							<input type="submit" name="submit" value="Submit">
						</form>
					</div>
					<?php
						} else {
							echo "<a href='index.php'><h1> You gotta login, friend.</a>";
						}
					?>
				</section>

			

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>