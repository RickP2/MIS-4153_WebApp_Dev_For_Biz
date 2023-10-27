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
							<tr><th>Date</th><th>Total Weight</th><th>Total Time</th><th>Open</th><th>Edit</th><th>Delete</th></tr>
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
							$sql = "SELECT * FROM workouts WHERE PirateID='jdrake'";
							$workoutArray = mysqli_query($con,$sql);
							//3. Use returned data: mysqli_fetch_row(), mysqli_fetch_array(),
							// 	or mysqli_fetch_assoc()

							while($previousWorkout = mysqli_fetch_assoc($workoutArray)) {
								echo "<tr>";
								echo "<td>" . $previousWorkout["Date"] . "</td>";
								$totalWeight = $previousWorkout["BPweight"] + $previousWorkout["OPweight"] + $previousWorkout["PDweight"] + $previousWorkout["Rweight"] + $previousWorkout["Sweight"];
								$totalTime = $previousWorkout["BPtime"] + $previousWorkout["OPtime"] + $previousWorkout["PDtime"] + $previousWorkout["Rtime"] + $previousWorkout["Stime"];
								echo "<td>" . $totalWeight . "</td>";
								echo "<td>" . $totalTime . "</td>";
								echo "<td><a href='WorkoutView.php?ID=" . $previousWorkout["ID"] ."'><img src='images/openFolder.png' width='20px'></a></td>";
								echo "<td><img src='images/editIcon.png' width='20px'></a></td>";
								echo "<td><img src='images/Delete-Button.svg' width='20px'></a></td>";
								echo "</tr>";

							}

							//4. Release returned data: mysqli_free_result()
							mysqli_free_result($workoutArray);

							}
							//5. Close database connection: mysqli_close()
							mysqli_close($con);



						//foreach ($previousWorkout as $previousWorkout){
						//		echo "<tr>";
						//		echo "<td>" . $previousWorkout[0] . "</td>";
						//		$totalWeight = $previousWorkout[1] + $previousWorkout[3] + $previousWorkout[5] + $previousWorkout[7] + $previousWorkout[9] . "<br/>"; 
						//		echo "<td>" . $totalWeight . "</td>";
						//		$totalTime = $previousWorkout[2] + $previousWorkout[4] + $previousWorkout[6] + $previousWorkout[8] + $previousWorkout[10] . "<br/>";
						//		echo "<td>" . $totalTime . "</td>"; 
						//		echo "<td>O</td>";
						//		echo "<td>E</td>";
						//		echo "<td>D</td>";
						//		echo "</tr>";
						//	}
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