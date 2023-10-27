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
		<title>Workout History</title>
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
						<ul class="actions special">
							<li><a href="WorkoutAdd.php" class="button">Add New</a></li>
						</ul>
						<table>
							<tr><th>Date</th><th>Total Weight</th><th>Total Time</th><th>Open</th><th>Edit</th><th>Delete</th></tr>;
						<?php
							$previousWorkout = array(
								array("01/01/2023",50,75,70,87,35,87,70,94,140,84),
								array("01/08/2023",55,80,60,72,40,58,90,62,140,92)
							);

							foreach ($previousWorkout as $previousWorkout){
								echo "<tr>";
								echo "<td>" . $previousWorkout[0] . "</td>";
								$totalWeight = $previousWorkout[1] + $previousWorkout[3] + $previousWorkout[5] + $previousWorkout[7] + $previousWorkout[9] . "<br/>"; 
								echo "<td>" . $totalWeight . "</td>";
								$totalTime = $previousWorkout[2] + $previousWorkout[4] + $previousWorkout[6] + $previousWorkout[8] + $previousWorkout[10] . "<br/>";
								echo "<td>" . $totalTime . "</td>"; 
								echo "<td>O</td>";
								echo "<td>E</td>";
								echo "<td>D</td>";
								echo "</tr>";
							}
						?>
						</table>
						
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