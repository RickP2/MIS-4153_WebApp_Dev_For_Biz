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
		<title>Add A Vendor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<style type="text/css">
			#center{
				/*display: flex;
				justify-content: center;
				align-items: center;*/
				display: grid;
				place-items: center;
			}
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

					<div class="box" id="center">
					<?php
							$company = $_POST["Company"];
							$salesRep = $_POST["SalesRep"];
							$address1 = $_POST["Address1"];
							$address2 = $_POST["Address2"];
							$city = $_POST["City"];
							$state = $_POST["State"];
							$zip = $_POST["Zip"];
							$phone = $_POST["Phone"];
							$email = $_POST["Email"];
							$notes = $_POST["Comment"];

							echo "<ul>";
							echo "<li>Company: $company</li>";
							echo "<li>Sales Rep Name: $salesRep</li>";
							echo "<li>Address: $address1 <br> $address2 <br> $city, $state $zip</li>";
							echo "<li>Phone Number: $phone</li>";
							echo "<li>e-mail: $email</li>";
							echo "<li>Notes: $notes</li>";
							echo "</ul>";

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
							$sql = "INSERT INTO vendoraddresses (Company, SalesRep, Address1, Address2, City, State, Zip, Phone, Email, Comment, pirateID) 
							VALUES ('$company', '$salesRep', '$address1', '$address2', '$city', '$state', '$zip', '$phone', '$email', '$notes', '$username');";
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
							<li><a href="VendorUpdate.php?ID=<?php echo $lastID ?>" class="button">Edit</a></li>
							<li><a href="AddressBook.php" class="button">View All</a></li>
						</ul>
						
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