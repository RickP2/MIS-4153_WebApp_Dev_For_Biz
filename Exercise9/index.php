<!DOCTYPE HTML>
<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Exchange Rate Calculator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<div class="container">

						<!-- Logo -->
						<h1 id="logo">Currency Exchange</h1>
							<p>You'll never guess what it does.</p>

						<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a class="icon solid fa-home" href="index.php"><span>Input</span></a></li>
							</ul>
						</nav>

					</div>
				</section>

			<!-- Features -->
				<section id="features">
					<div class="container">
						<header>
						</header>
						<div class="row aln-center">
							<div class="col-4 col-6-medium col-12-small">

								<!-- Feature -->
									<section>
										<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
										<header>
											<h3>Well, we're gonna need you to select some currencies below. I mean, that really should have been obvious.</h3>
										</header>
									</section>
									<form method="GET" action="exchangecalculator.php">
									<?php

										$curl = curl_init();

										curl_setopt_array($curl, [
											CURLOPT_URL => "https://currency-exchange.p.rapidapi.com/listquotes",
											CURLOPT_RETURNTRANSFER => true,
											CURLOPT_ENCODING => "",
											CURLOPT_MAXREDIRS => 10,
											CURLOPT_TIMEOUT => 30,
											CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
											CURLOPT_CUSTOMREQUEST => "GET",
											CURLOPT_HTTPHEADER => [
												"X-RapidAPI-Host: currency-exchange.p.rapidapi.com",
												"X-RapidAPI-Key: c8093afd76msh86df5ca4dde4f1cp16bbafjsn60df9c765134"
											],
										]);

										$response = curl_exec($curl);
										// echo $response;
										$err = curl_error($curl);

										curl_close($curl);

										if ($err) {
											echo "cURL Error #:" . $err;
										} else {
											$currencyOptions = json_decode($response);
											// print_r($currencyOptions);
											echo "From Currency: <select name='from'>";
											foreach($currencyOptions as $currency) {
												echo "<option value='$currency'>$currency</option>";
											}
											echo "</select><br>";
											echo "To Currency: <select name='to'>'";
											foreach($currencyOptions as $currency) {
												echo "<option value='$currency'>$currency</option>";
											}
											echo "</select><br>";
											echo "Amount: <input type='text' name='amount'><br>";
											echo "<input type='submit' name='submit' value='Calculate'>";
										}
									?>

										<!-- This is how to do a dropdown box normally:
										
										<label for="from_currency">From Currency:</label>
										<select name="from_currency">
											<option value="SGD">SGD</option>
											<option value="MYR">MYR</option>
											<option value="USD">USD</option>
											<option value="EUR">EUR</option>
											<option value="JPY">JPY</option>
										</select>
										-->
									</form>

							</div>
						</div>
					</div>
				</section>

			<!-- Footer -->
				<section id="footer">
					<div class="container">
						
					<div id="copyright" class="container">
						<ul class="links">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</section>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>