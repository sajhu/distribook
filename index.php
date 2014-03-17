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
		<title>Distribook</title>
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
	<body class="homepage">

		<!-- Header Wrapper -->
			<div id="header-wrapper">
						
				<!-- Header -->
<?php

printHeader($DB);

?>

				<!-- Hero -->
					<section id="hero" class="container">
						<header>
							<h2>Tu biblioteca médica<br />
							</h2>
						</header>
						<p>La plataforma en donde encuentras toda tu librería médica al alcance de un click.</p>
						<ul class="actions">
							<li><a href="registrarme.html" class="button">¡Registrarme!</a></li>
						</ul>
					</section>

			</div>



			
		<!-- Features 2 -->
			<div class="wrapper">
			
				<section class="container">
					<header class="major">
						<h2 id="novedades">Las últimas novedades</h2>
						<span>Estos son los últimos titulos en llegar a la librería</span>
					</header>
					<div class="row features">
						<section class="4u feature">
							<div class="image-wrapper first">
								<a href="http://ineedchemicalx.deviantart.com/art/Time-goes-by-too-fast-335982438" class="image full"><img src="images/pic03.jpg" alt="" /></a>
							</div>
							<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur 
							vel sem sit dolor neque semper magna lorem ipsum.</p>
						</section>
						<section class="4u feature">
							<div class="image-wrapper">
								<a href="http://ineedchemicalx.deviantart.com/art/Kingdom-of-the-Wind-348268044" class="image full"><img src="images/pic04.jpg" alt="" /></a>
							</div>
							<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur 
							vel sem sit dolor neque semper magna lorem ipsum.</p>
						</section>
						<section class="4u feature">
							<div class="image-wrapper">
								<a href="http://ineedchemicalx.deviantart.com/art/Elysium-355393900" class="image full"><img src="images/pic05.jpg" alt="" /></a>
							</div>
							<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur 
							vel sem sit dolor neque semper magna lorem ipsum.</p>
						</section>
					</div>
					<ul class="actions major">
						<li><a href="catalogo.php" class="button">Ver la librería completa</a></li>
					</ul>
				</section>
			
			</div>


			
		<!-- Promo -->
			<div id="promo-wrapper">
			
				<section id="promo">
					<h2>Ahorra <b>$20</b> con la suscripción anual</h2>
					<a href="registrarme.html" class="button">Comienza Ahora</a>
				</section>
			
			</div>

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">

				<!-- Footer -->
					<div id="footer" class="container">
						<header class="major">
							<h2 id="contactanos">Respondemos todas tus preguntas	</h2>
							<span>En Distribook estamos disponibles para ayudarte a conseguir la información que necesites, incluso de la mano de los autores.</span>
						</header>
						<div class="row">
							<section class="6u">
								<form method="post" action="#">
									<div class="row half">
										<div class="6u">
											<input name="name" placeholder="Nombre" type="text" class="text" required />
										</div>
										<div class="6u">
											<input name="email" placeholder="Correo" type="email" class="text" required />
										</div>
									</div>
									<div class="row half">
										<div class="12u">
											<textarea name="message" placeholder="Mensaje"></textarea>
										</div>
									</div>
									<div class="row half">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" class="button" value="Enviar"></li>
												<li><a href="#" class="button">Volver a empezar</a></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section class="6u">
								<div class="row no-collapse-1">
									<ul class="divided icons 6u">
										<li class="fa fa-twitter"><a href="#"><span class="extra">twitter.com/</span>untitled</a></li>
										<li class="fa fa-facebook"><a href="#"><span class="extra">facebook.com/</span>untitled</a></li>
										<li class="fa fa-dribbble"><a href="#"><span class="extra">dribbble.com/</span>untitled</a></li>
									</ul>
									<ul class="divided icons 6u">
										<li class="fa fa-linkedin"><a href="#"><span class="extra">linkedin.com/</span>untitled</a></li>
										<li class="fa fa-youtube"><a href="#"><span class="extra">youtube.com/</span>untitled</a></li>
										<li class="fa fa-pinterest"><a href="#"><span class="extra">pinterest.com/</span>untitled</a></li>
									</ul>
								</div>
							</section>
						</div>
					</div>

				<!-- Copyright -->
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Distribook. Todos los derechos reservados	.</li>
							<li>Desarrollado por: <a href="http://santiagorojas.co/">Santiago Rojas</a></li>
						</ul>
					</div>

			</div>

	</body>
</html>