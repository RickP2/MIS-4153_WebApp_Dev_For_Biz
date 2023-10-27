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
							$sql = "INSERT into workouts(Date, BPweight, BPtime, OPweight, OPtime, Rweight, Rtime, PDweight, PDtime, Sweight, Stime, Comment, PirateID) 
							values ('$date', '$bpweight', '$bptime', '$opweight', '$optime', '$rweight', '$rtime', '$pdweight', '$pdtime', '$sweight', '$stime', '$comment', '$username')";
							mysqli_query($con,$sql);
							$lastID = mysqli_insert_ID($con);

							//3. Use returned data: mysqli_fetch_row(), mysqli_fetch_array(),
							// 	or mysqli_fetch_assoc()

							//No step 3 stuff because we're just adding to a database

							

							//4. Release returned data: mysqli_free_result()
							//Nothing to do here either because we're still just adding info and returning nothing

							}
							//5. Close database connection: mysqli_close()
							mysqli_close($con);
						?>

						<ul class="actions special">
							<li><a href="workoutUpdate.php?ID=<?php echo $lastID ?>" class="button">Edit</a></li>
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