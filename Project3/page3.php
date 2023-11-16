<?php
		$id= 4924;
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "http://faber.ecu.edu/intra/drakejo/project3/addressAPI.php?id=" . $id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => "Accept: application/json",
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
		]);

		$zip_info = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// echo $response;
			$addressInfo = json_decode($zip_info, true);
			//print_r($addressInfo['Zip']);
			$zipcode = $addressInfo['Zip'];
			
		}
?>

<!DOCTYPE HTML>
<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Project 3: Part 3</title>
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
						<h1 id="logo">Project 3</h1>
							

						<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a class="icon solid fa-home" href="page4.php"><span>Bonus: Page 4</span></a></li><br>
								<li>It will take a couple seconds to load the page.</li>
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
										<header>
											<h3>Project 3 Third Part</h3>
										</header>
									</section>
									<?php
										
										$curl = curl_init();

										curl_setopt_array($curl, [
											CURLOPT_URL => "https://api.zippopotam.us/us/" . $zipcode,
											CURLOPT_RETURNTRANSFER => true,
											CURLOPT_FOLLOWLOCATION => true,
											CURLOPT_ENCODING => "",
											CURLOPT_MAXREDIRS => 10,
											CURLOPT_TIMEOUT => 30,
											CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
											CURLOPT_CUSTOMREQUEST => "GET",
											CURLOPT_HTTPHEADER => [
												"X-RapidAPI-Host: community-zippopotamus.p.rapidapi.com",
												"X-RapidAPI-Key: c8093afd76msh86df5ca4dde4f1cp16bbafjsn60df9c765134"
											],
										]);

										$response = curl_exec($curl);
										$err = curl_error($curl);

										curl_close($curl);

										if ($err) {
											echo "cURL Error #:" . $err;
										} else {
											// echo $response;
											$zip_info = json_decode($response, true);
											//print_r($zip_info);
											echo "The zipcode is " . $zip_info["post code"] . "<br>"
												. "The city is " . $zip_info["places"][0]["place name"] . "<br>"
												. "The state is " . $zip_info["places"][0]["state"];
										}
									?>
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