<?php
include "settings.php";
?><!DOCTYPE HTML>
<!--
	Telephasic 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>¿Qué es Distribook?</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-n1.css" />
		</noscript>
	</head>
	<body class="no-sidebar">

		<!-- Header Wrapper -->
			<div id="header-wrapper">
						
				<!-- Header -->
<?printHeader($DB);?>

			</div>

		<!-- Main Wrapper -->
			<div class="wrapper">

				<div class="container">
					<div class="row" id="main">
						<div class="12u">
					
							<!-- Content -->
								<article id="content">
									<header>
										<h2>¿Qué es Distribook?</h2>
										<span>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit
										dolor neque semper.</span>
									</header>
									<a href="registrarme.html" class="image full"><img src="images/nina.jpg" alt="" /></a>
									<p>Ut sed tortor luctus, gravida nibh eget, volutpat odio. Proin rhoncus, sapien 
									mollis luctus hendrerit, orci dui viverra metus, et cursus nulla mi sed elit. Vestibulum 
									condimentum, mauris a mattis vestibulum, urna mauris cursus lorem, eu fringilla lacus 
									ante non est. Nullam vitae feugiat libero, eu consequat sem. Proin tincidunt neque 
									eros. Duis faucibus blandit ligula, mollis commodo risus sodales at. Sed rutrum et 
									turpis vel blandit. Nullam ornare congue massa, at commodo nunc venenatis varius. 
									Praesent mollis nisi at vestibulum aliquet. Sed sagittis congue urna ac consectetur.</p>
									<p>Mauris eleifend eleifend felis aliquet ornare. Vestibulum porta velit at elementum
									gravida nibh eget, volutpat odio. Proin rhoncus, sapien 
									mollis luctus hendrerit, orci dui viverra metus, et cursus nulla mi sed elit. Vestibulum 
									condimentum, mauris a mattis vestibulum, urna mauris cursus lorem, eu fringilla lacus 
									ante non est. Nullam vitae feugiat libero, eu consequat sem. Proin tincidunt neque 
									eros. Duis faucibus blandit ligula, mollis commodo risus sodales at. Sed rutrum et 
									turpis vel blandit. Nullam ornare congue massa, at commodo nunc venenatis varius. 
									Praesent mollis nisi at vestibulum aliquet. Sed sagittis congue urna ac consectetur.</p>
									<p>Vestibulum pellentesque posuere lorem non aliquam. Mauris eleifend eleifend 
									felis aliquet ornare. Vestibulum porta velit at elementum elementum.</p>
								</article>

						</div>

				</div>
			</div>


		<!-- Promo -->
			<div id="promo-wrapper">
			
				<section id="promo">
					<h2>Ahorra <b>$20</b> con la suscripción anual</h2>
					<a href="registrarme.php" class="button">Comienza Ahora</a>
				</section>
			
			</div>	

		<!-- Footer Wrapper -->
<?php
	printFooter();
?>


	</body>
</html>