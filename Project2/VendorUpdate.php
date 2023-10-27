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
		<title>Update A Vendor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<style type="text/css">
			#myFormCSS{
				display: flex;
				justify-content: center;
			}
			/*input{
				width: 10%;
				display: inline-block;
				
				text-align: right;
				padding: 4px;
			}
			textarea{
				display: inline-block;
				margin-left: 10px;
				width: 10%;
			}*/
		</style>
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
					<div class="box" id="myFormCSS">
						<form action="VendorUpdateProcessing.php" method="POST">
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
							$sql = "SELECT * FROM vendoraddresses WHERE PirateID='$username' and ID='$ID'";
							$VendorArray = mysqli_query($con,$sql);

							//3. Use returned data: mysqli_fetch_row(), mysqli_fetch_array(),
							// 	or mysqli_fetch_assoc()

							$previousVendor = mysqli_fetch_assoc($VendorArray);
								
								echo "Company: <input type='text' 	name='Company' value='" . $previousVendor["Company"] . "'> <br>";
								echo "Sales Rep Name: <input type='text' name='SalesRep' value='" . $previousVendor["SalesRep"] . "'><br>";
								echo "Address 1: <input type='text' name='Address1' value='" . $previousVendor["Address1"] . "'><br>";
								echo "Address 2: <input type='text' name='Address2' value='" . $previousVendor["Address2"] . "'><br>";
								echo "City: <input type='text' name='City' value='" . $previousVendor["City"] . "'><br>";
								echo "State: <input type='text' name='State' value='" . $previousVendor["State"] . "'><br>";
								echo "Zip: <input type='text' name='Zip' value='" . $previousVendor["Zip"] . "'><br>";
								echo "Phone Number: <input type='tel' name='Phone' value='" . $previousVendor["Phone"] . "'><br>";
								echo "Email: <input type='email' name='Email' value='" . $previousVendor["Email"] . "'><br>";
								echo "<input type='hidden' name='ID' value='" . $ID . "'>";
								echo "Notes: <textarea name='Comment'>" . $previousVendor["Comment"] . "</textarea><br>";
								
								
								
								//4. Release returned data: mysqli_free_result()
								mysqli_free_result($VendorArray);
								
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