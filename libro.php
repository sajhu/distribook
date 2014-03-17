<?php
include "settings.php";


	$l = get('l');
	$where = '';	
	if($l && $l != "")
	{
		$where = array('url' => $l);

	}
	else
		die("No se indico un libro a desplegar. Use libro.php?id=XX para indicar");


	$voto = post('votar');
	if($voto  && $voto != "" && is_numeric($voto))
	{
		$sql = "UPDATE`pubs` SET  `votos` =  `votos` +1, `suma` =  `suma` + {$voto}
		WHERE  `id` =  '1' ";
		$DB->ExecuteSQL($sql) or die($DB->lastError);
	}


	$libro = $DB->Select(TABLA_LIBROS, $where, '', 1) or die($DB->lastError);

	if(!$libro)
		die('No se encontró el libro solicitado');

	$id = $libro['id'];
	$nombre = $libro['nombre'];
	$autor = $libro['autor'];
	$descripcion = $libro['descripcion'];
	$url = $libro['url'];
	$votos = $libro['votos'];
	$suma = $libro['suma'];
	$categoria = $libro['categoria'];

?><!DOCTYPE HTML>
<!--
	Telephasic 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?=$nombre?> - Distribook</title>
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
	<body class="left-sidebar">

		<!-- Header Wrapper -->
			<div id="header-wrapper">
						
				<!-- Header -->
<? printHeader($DB);?>

			</div>

		<!-- Main Wrapper -->
			<div class="wrapper">

				<div class="container">

					<p><a href="catalogo.php">Catálogo</a> > <a href="catalogo.php?c=<?=$categoria?>"><?=$categoria?></a></p>

					<div class="row" id="main">
						<div class="4u">

							<!-- Sidebar -->
								<section id="sidebar">
									<section>

										<ul class="actions"	>
											<li><a href="<?=READER_URL.$url?>" class="button">Ver Online</a></li>
											<li><a href="<?=DOWNLOAD_URL.$url?>" class="button">Descargar</a></li>
										</ul>
									</section>

									<section>
										<header>
											<h3>Calificar esta Obra</h3>
										</header>
<?

	if($votos != 0)
	{
		$rating = round($suma / $votos, 1);
		$estrella = round($rating);

		switch ($estrella) {
		    case 1:
		        $check1 = "checked";
		        break;
		    case 2:
		        $check2 = "checked";
		        break;
		    case 3:
		        $check3 = "checked";
		        break;
		    case 4:
		        $check4 = "checked";
		        break;
		    case 5:
		        $check5 = "checked";
		        break;
		    default:
		    	break;
		}
	}
	else
	{
		$rating = 0;
	}
?>
										<p><?=$votos?> personas la han calificado en <b><?=$rating?></b></p>

										<form action="<?=ACTUAL_URL?>?l=<?=$url?>" method="post">

											<div align="center">

											<span class="star-rating">
											  <input <?=$check1?> type="radio" name="votar" value="1"><i></i>
											  <input <?=$check2?> type="radio" name="votar" value="2"><i></i>
											  <input <?=$check3?> type="radio" name="votar" value="3"><i></i>
											  <input <?=$check4?> type="radio" name="votar" value="4"><i></i>
											  <input <?=$check5?> type="radio" name="votar" value="5"><i></i>
											</span>
											<br><br>
										<ul class="actions">
											<li><input type="submit" value="Calificar" class="button"></li>
										</ul>

										</div>

										</form>
										

									</section>

								</section>
					
						</div>
						<div class="8u skel-cell-important">
					
							<!-- Content -->
								<article id="content">
									<header>
										<h2><?=$nombre?></h2>
										<span><?=$autor?></span>
									</header>
									<a href="<?=READER_URL . $url?>" class="image full"><img src="<?=PICS_URL . $url?>.png" alt="" /></a>
									<p><?=nl2br($descripcion)?></p>
								</article>


<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'distribook'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
						</div>
					</div>
				</div>
			</div>

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">

				<!-- Footer -->
					

				<!-- Copyright -->
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Untitled. All rights reserved.</li>
							<li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>
						</ul>
					</div>

			</div>

	</body>
</html>