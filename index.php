<?php

include "settings.php";

	handdleSession();

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
							<li><a href="registrarme.php" class="button">¡Registrarme!</a></li>
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


<?php
	$novedades = $DB->Select(TABLA_LIBROS, '', 'id DESC', 6);
	if(count($novedades) == 1)
	{
		$novedades = array($novedades);
	}

	for ($i = 0; $i < count($novedades); $i++) {
		$libro = $novedades[$i];

		if($i % 3 == 0 && $i > 0)
			echo '
					</div>
					<div class="row features">
';
?>

						<section class="4u feature">
							<div class="image-wrapper">
								<a href="libro.php?l=<?=$libro['url']?>" class="image full"><img src="<?=PICS_URL . $libro['url']?>.png" alt="" /></a>
							</div>
							<header>
								<a href="libro.php?l=<?=$libro['url']?>"><h3><?=$libro['nombre']?></h3></a>
								<span><?=$libro['autor']?></span>
							</header>
							<p><?=mb_substr($libro['descripcion'], 0, 150)?> ...</p>
						</section>
<?
	}

?>



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
					<a href="registrarme.php" class="button">Comienza Ahora</a>
				</section>
			
			</div>

		<!-- Footer Wrapper -->

<?php
	printFooter();
?>

	</body>
</html>