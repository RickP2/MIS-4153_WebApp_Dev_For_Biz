<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Workout Add Processing</title>
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
							<li>
								<a href="#" class="icon solid fa-angle-down">Layouts</a>
								<ul>
									<li><a href="index.php">Home</a></li>
									
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Superslow Workout App</h2>
					</header>
					<div class="box">
						<?php
							$date = $_POST["WorkoutDate"];
							$bpweight = $_POST["BenchPressWeight"];
							$bptime = $_POST["BenchPressTime"];
							$opweight = $_POST["OverheadPressWeight"];
							$optime = $_POST["OverheadPressTime"];
							$rweight = $_POST["RowWeight"];
							$rtime = $_POST["RowTime"];
							$pdweight = $_POST["PulldownWeight"];
							$pdtime = $_POST["PulldownTime"];
							$sweight = $_POST["SquatWeight"];
							$stime = $_POST["SquatTime"];
							$comment = $_POST["Comment"];

							echo "On $date, you accomplished the following:<ul>";
							echo "<li>Bench Pressed $bpweight kg for $bptime sec</li>";
							echo "<li>Overhead Pressed $opweight kg for $optime sec</li>";
							echo "<li>Rowed $rweight kg for $rtime sec</li>";
							echo "<li>Pulled down $pdweight kg for $pdtime sec</li>";
							echo "<li>Squatted $sweight kg for $stime sec</li>";
							echo "</ul>";
							echo "You commented the following on the day: $comment <br>";
						?>
					</div>
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