<?php

include "settings.php";

	$categoria = get('c');
	$where = '';
	$titulo = "Catálogo";
	$slogan = "Aquí tienes todo el catálogo de Distribook. Puedes filtrar por categorías.";

	if($categoria && $categoria != '')
	{
		$where = array('categoria' => $categoria);
		$titulo = $categoria;
		$slogan = "Todos los libros relacionados con " .$titulo;
	}

	$novedades = $DB->Select(TABLA_LIBROS, $where, 'id DESC', 6);

	if($DB->records == 1)
	{
		$novedades = array($novedades);
	}
	elseif ($DB->records == 0) {
		$titulo = "No existe la categoría " . $categoria;
		$slogan = "Intenta seleccionar una de las categorías bajo el link de catálogo";
	}


?><!DOCTYPE HTML>
<!--
	Telephasic 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?=$titulo?> - Distribook</title>
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
<?
	printHeader($DB);
?>

			</div>

			
		<!-- Features 2 -->
			<div class="wrapper">
			
				<section class="container">
					<header class="major">
						<h2 id="novedades"><?=$titulo?></h2>
						<span><?=$slogan?></span>
					</header>


					<div class="row features">


<?php


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
							<p><?=mb_substr($libro['descripcion'], 0, 100)?></p>
						</section>
<?
	}

?>

					</div>

				</section>
			
			</div>


		<!-- Footer Wrapper -->
<?php
	printFooter();
?>



	</body>
</html>