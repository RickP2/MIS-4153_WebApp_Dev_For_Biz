<?php
session_start();
$username = $_SESSION["username"];
?>

						
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Vendor Address Book</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
		<div id="wrapper">
		<!-- Header -->
			<header id="header">
				<h1>Spells and Curses Inc.</h1>
				<nav class="main">
					<ul>
						<li class="menu">
							<a class="fa-bars" href="#menu">Menu</a>
						</li>
					</ul>
				</nav>
			</header>
		<!-- Menu -->
			<section id="menu">
				<!-- Links -->
					<section>
						<ul class="links">
							<li>
								<a href="AddressBook.php">
									<h3>Vendor Address Book</h3>
								</a>
							</li>
							<li>
								<a href="VendorAdd.php">
									<h3>Add a Vendor</h3>
								</a>
							</li>
						</ul>
					</section>
				<!-- Actions -->
					<section>
						<ul class="actions stacked">
							<li><a href="Logout.php" class="button large fit">Logout</a></li>
						</ul>
					</section>
			</section>
		<!-- Main -->
			<div id="main">

		<!-- Post -->
				<header>
					<div class="title">
						<h2>Vendor Address Book</h2>
					</div>
				</header>
					<?php
						if (isset($_SESSION["username"])){
					?>

					<div class="box">
						<ul class="actions special">
							<li><a href="VendorAdd.php" class="button">Add New</a></li>
						</ul>
						<table>
							<tr><th>Company</th><th>Rep Name</th><th>View</th><th>Edit</th><th>Delete</th></tr>
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
							$sql = "SELECT * FROM vendoraddresses WHERE PirateID='$username'";
							$VendorArray = mysqli_query($con,$sql);
							//3. Use returned data: mysqli_fetch_row(), mysqli_fetch_array(),
							// 	or mysqli_fetch_assoc()

							while($previousVendor = mysqli_fetch_assoc($VendorArray)) {
								echo "<tr>";
								echo "<td>" . $previousVendor["Company"] . "</td>";
								echo "<td>" . $previousVendor["SalesRep"] . "</td>";
								echo "<td><a href='VendorView.php?ID=" . $previousVendor["ID"] ."'><img src='images/openFolder.png' width='20px'></a></td>";
								echo "<td><a href='VendorUpdate.php?ID=" . $previousVendor["ID"] ."'><img src='images/editIcon.png' width='20px'></a></td>";
								echo "<td><a href='VendorDelete.php?ID=" . $previousVendor["ID"] ."'><img src='images/Delete-Button.svg' width='20px'></a></td>";
								echo "</tr>";

							}

							//4. Release returned data: mysqli_free_result()
							mysqli_free_result($VendorArray);

							}
							//5. Close database connection: mysqli_close()
							mysqli_close($con);
						
						?>
						</table>
						
					</div>
					<?php
						} else {
							echo "<a href='Home.php'><h1> You gotta login, friend.</a>";
						}
					?>
				</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>