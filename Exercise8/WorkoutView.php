<?php
session_start();
$username = $_SESSION["username"];
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
							$ID = $_GET["ID"];
							$sql = "SELECT * FROM workouts WHERE PirateID='$username' and ID='$ID'";
							$workoutArray = mysqli_query($con,$sql);
							
							//3. Use returned data: mysqli_fetch_row(), mysqli_fetch_array(),
							// 	or mysqli_fetch_assoc()

							$previousWorkout = mysqli_fetch_assoc($workoutArray);
								echo "Date: " . $previousWorkout["Date"] . "<br>";
								echo "Bench Press Weight: " . $previousWorkout["BPweight"] . "<br>";
								echo "Bench Press Time: " . $previousWorkout["BPtime"] . "<br>";
								echo "Overhead Press Weight: " . $previousWorkout["OPweight"] . "<br>";
								echo "Overhead Press Time: " . $previousWorkout["OPtime"] . "<br>";
								echo "Pulldown Weight: " . $previousWorkout["PDweight"] . "<br>";
								echo "Pulldown Time: " . $previousWorkout["PDtime"] . "<br>";
								echo "Row Weight: " . $previousWorkout["Rweight"] . "<br>";
								echo "Row Time: " . $previousWorkout["Rtime"] . "<br>";
								echo "Squat Weight: " . $previousWorkout["Sweight"] . "<br>";
								echo "Squat Time: " . $previousWorkout["Stime"] . "<br>";
								echo "Comment: " . $previousWorkout["Comment"] . "<br>";



							//4. Release returned data: mysqli_free_result()
							mysqli_free_result($workoutArray);

							}
							//5. Close database connection: mysqli_close()
							mysqli_close($con);
						?>
						<ul class="actions special">
							<li><a href="WorkoutUpdate.php?ID=<?php echo $ID ?>" class="button">Edit</a></li>
							<li><a href="WorkoutHistory.php" class="button">View All</a></li>
						</ul>
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