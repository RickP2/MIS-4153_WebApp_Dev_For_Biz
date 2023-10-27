<?php
session_start();
$username = $_SESSION["username"];
$ID = $_GET["ID"];
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
						<form action="WorkoutUpdateProcessing.php" method="POST">
						<?php
							
							//1. Connect to database: mysqli_connect()
							$location ="localhost";
							$DBUsername ="MIS4153";
							$DBPassword ="pirates4thewin";
							$DBName ="mis4153";

							$con = mysqli_connect($location, $DBUsername, $DBPassword, $DBName);
							if(mysqli_connect_errno()){
								printf("Connect failed: %\n",mysqli_connect_error());
							} else {


							//2. Send query to database: mysqli_query()
							//echo "Great success!";
							$sql = "SELECT * FROM workouts WHERE PirateID='$username' and ID='$ID'";
							$workoutArray = mysqli_query($con,$sql);

							//3. Use returned data: mysqli_fetch_row(), mysqli_fetch_array(),
							// 	or mysqli_fetch_assoc()

							$previousWorkout = mysqli_fetch_assoc($workoutArray);
								echo "Date: <input type='date' 	name='WorkoutDate' value='" . $previousWorkout["Date"] . "'><br>";
								echo "Bench Press Weight: <input type='text' name='BenchPressWeight' value='" . $previousWorkout["BPweight"] . "'><br>";
								echo "Bench Press Time: <input type='text' 	name='BenchPressTime' value='" . $previousWorkout["BPtime"] . "'> <br>";
								echo "Overhead Press Weight: <input type='text' name='OverheadPressWeight' value='" . $previousWorkout["OPweight"] . "'><br>";
								echo "Overhead Press Time: <input type='text' name='OverheadPressTime' value='" . $previousWorkout["OPtime"] . "'><br>";
								echo "Pulldown Weight: <input type='text' name='PulldownWeight' value='" . $previousWorkout["PDweight"] . "'><br>";
								echo "Pulldown Time: <input type='text' name='PulldownTime' value='" . $previousWorkout["PDtime"] . "'><br>";
								echo "Row Weight: <input type='text' name='RowWeight' value='" . $previousWorkout["Rweight"] . "'><br>";
								echo "Row Time: <input type='text' name='RowTime' value='" . $previousWorkout["Rtime"] . "'><br>";
								echo "Squat Weight: <input type='text' name='SquatWeight' value='" . $previousWorkout["Sweight"] . "'><br>";
								echo "Squat Time: <input type='text' name='SquatTime' value='" . $previousWorkout["Stime"] . "'><br>";
								echo "<input type='hidden' name='ID' value='" . $ID . "'>";
								echo "Comment: <textarea name='Comment'>" . $previousWorkout["Comment"] . "</textarea><br>";



							//4. Release returned data: mysqli_free_result()
							mysqli_free_result($workoutArray);

							}
							//5. Close database connection: mysqli_close()
							mysqli_close($con);
						?>
						
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