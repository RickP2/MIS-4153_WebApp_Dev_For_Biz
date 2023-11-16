


</table>
<!DOCTYPE HTML>
<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Project 3: Part 4</title>
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
								<li><a class="icon solid fa-home" href="page5.php"><span>Bonus: Page 5: For Funsies</span></a></li>
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
											<h3>Project 3 Fourth Part</h3>
										</header>
				</section>
					<h4>Restricted to ID numbers less than 4800 to cut down on loading time.</h4>
				<table>
							<tr><th>Zip</th><th>City</th><th>State</th></tr>

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
			$sql = "SELECT * FROM vendoraddresses WHERE ID< 4800";
			$result = mysqli_query($con, $sql);
			
			//3. Use returned data: mysqli_fetch_row(), mysqli_fetch_array(),
			// 	or mysqli_fetch_assoc()
			

			while($row = mysqli_fetch_assoc($result)){;
			$zipcode = $row['Zip'];	
			
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
					echo "<tr>";
					echo "<td>" . $zip_info["post code"] . "</td>";
					echo "<td>" . $zip_info["places"][0]["place name"] . "</td>";
					echo "<td>" . $zip_info["places"][0]["state"] ."</td>";
					echo "</tr>";
				}
					
				}
				

			
			//4. Release returned data: mysqli_free_result()
				mysqli_free_result($result);
				
			}
			//5. Close database connection: mysqli_close()
			mysqli_close($con);
			?>
			</table>
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