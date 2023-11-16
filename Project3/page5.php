<!DOCTYPE html>
<html>
  <head>
	<title>Project 3: Part 5</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <!-- The callback parameter is required, so we use console.debug as a noop -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARO-5Cx9J90Ebua0KsklMzihv74Y4cAyE&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      gmp-map {
        height: 50%;
		    width:50%;
        margin-left: 25%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 500;
        padding: 500;
      }
    </style>
  </head>
  <body class="homepage is-preload">
		<div id="page-wrapper">
			<!-- Header -->
				<section id="header">
					<div class="container">

						<!-- Logo -->
						<h1 id="logo">Project 3</h1>
          </div>
        
        <!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a class="icon solid fa-home" href="page1.php"><span>Back to Page 1</span></a></li><br>
                <li><a class="icon solid fa-home" href="https://music.youtube.com/watch?v=5wXVEF5wNXo&si=yKIH3kMGwm6usAmj" target="_blank"><span>This played while I was finishing up. Not usually my style, but I enjoyed it.</span></a></li><br>
							</ul>
						</nav>
        </section>
    </div>
      <gmp-map center="35.606666564941406,-77.35601043701172" zoom="14" map-id="DEMO_MAP_ID">
      <gmp-advanced-marker position="35.606666564941406,-77.35601043701172" title="My location">
      </gmp-advanced-marker>
      </gmp-map>
  </body>
</html>