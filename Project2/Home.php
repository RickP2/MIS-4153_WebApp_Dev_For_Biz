<?php
session_start();
$username="rick";
$password="heck";

if ($username == $_POST["username"] && $password==$_POST["password"]){
	$_SESSION["username"] = $username;
} else {
	unset($_SESSION["username"]);
}
?>

<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Project 2 Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body class="single is-preload">

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
										<h2>Wizard for hire! Curse your friends! Fireball your boss!</h2>
									</div>
									
								</header>
								
	
								<?php 
								if (isset($_SESSION["username"])){
									echo "<h3>Login successful</h3>";
									echo "<p>See the <a href='AddressBook.php'>Address Book!</a></p><br>";
								} else {
								?>
								
								<span class="image featured"><img src="images/wizard1.jpg" alt="" /></span><br>
								
								<form action="Home.php" method="POST" id="myFormCSS">
									<input type="text" name="username" placeholder="                                    Username"><br><br>
									<input type="password" name="password" placeholder="                                    Password"><br><br>
									<input type="submit" value="Login" name="submit"><br>
									
								</form>
								
								<?php
								}
								?>

								<?php
									 //Testing code. Delete before production
									 //echo "Current session variable is: " . $_SESSION["username"];
								?>

					</div>

				

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>