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
	<body class="no-sidebar is-preload">
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

			<!-- Main -->
				<section id="main">
					<div class="container">
						<div id="content">

							<!-- Post -->
								<article class="box post">
									<header>
										<h2>Currency Exchange</h2>
										<!--This is where we want to connect to an API and return a currency rate exchange-->
										<?php

											$curl = curl_init();

											curl_setopt_array($curl, [
												CURLOPT_URL => "https://currency-exchange.p.rapidapi.com/exchange?from=". $_GET["from"] ."&to=" . $_GET["to"] . "&q=" . $_GET["amount"] ."",
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
											$exchangeRate = json_decode($response, true);
											//print_r($exchangeRate);
											if ($err) {
												echo "cURL Error #:" . $err;
											} else {
												echo "Value of ". $_GET["amount"] ." ". $_GET["from"] . " to " . $_GET["to"] . " is ". $exchangeRate*$_GET["amount"] . "<br>";
												//echo $_GET["from"];
											}
										?>
									</header>
								</article>
						</div>
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