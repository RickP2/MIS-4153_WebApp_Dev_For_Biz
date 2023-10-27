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
			#myFormCSS{
				/*display: flex;
				justify-content: center;
				align-items: center;*/
				display: grid;
				place-items: center;
			}
			/*label{
				display: inline-block;
				text-align: right;
				width: 10%;
				
			}
			textarea{
				display: inline-block;
				
				margin-left: 10px;
				width: 20%;
			}
			*/
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
						
						<form action="VendorAddProcessing.php" method="POST">
								<label for="Company">Company:<input type="text" name="Company"></label>
								<label for="SalesRep">Sales Rep Name:<input type="text" name="SalesRep"></label>
								<label for="Address1">Address 1:<input type="text" name="Address1"></label>
								<label for="Address2">Address 2:<input type="text" name="Address2"></label>
								<label for="City">City:<input type="text" name="City"></label>
								<label for="State">State:<input type="text" name="State"></label>
								<label for="Zip">Zip:<input type="text" name="Zip"></label>
								<label for="Phone">Phone Number:<input type="tel" name="Phone"></label>
								<label for="Email">e-mail:<input type="email" name="Email"></label>
								<label for="Comment">Notes:<textarea name="Comment"></textarea></label>
								<input type="submit" name="submit" value="Submit">
						</form>
						
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