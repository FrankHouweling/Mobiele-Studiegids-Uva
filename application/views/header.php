<!doctype html>
<html>
	<head>
		
		<title>Mobiele Studiegids UvA</title>
		
		<base href="http://localhost/~frankhouweling/Mobiele-Studiegids-Uva/" />
		
		<!-- Apple Specific META-codes -->
		
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black /">
		<meta name ="viewport" content ="initial-scale = 1, user-scalable = no" />
		<link rel="apple-touch-icon" href="ontwerp/client/img/apple-icon.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
		<!-- Jquery Mobile -->	
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.js"></script>
			
		<link type="text/css" rel="stylesheet" media="screen" href="ontwerp/client/main.css" />
			
		<!-- For Drag & Drop action -->
		<script type="text/javascript" src="ontwerp/client/jquery-ui.min.js"></script>
		
			
	</head>
	<body>
		
		<div class="topbar">
			<a href="index.html">
				<?php
					if( $page == "home" )
					{
						?>
							<img src="ontwerp/client/img/main-logo.png" alt="Mobiele Studiegids Uva" title="Logo Mobiele Studiegids Uva" />
						<?php
					}
					else
					{
						?>
								<div class="backbutton">
									<a href="../../../../index.php">Vorige</a>
								</div>
							<h1>
								<?php 
									if( strlen($pagetitle) > 20 )
									{
										echo substr($pagetitle,0,17) . "...";
									}
									else
									{
										echo $pagetitle;
									}
								?>
							</h1>
						<?php	
					}
				?>
			</a>
		</div>