<?php
include "settings.php";

	$url = RELATIVE_URL;


	if(isset($_GET['redirectTo']) && $_GET['redirectTo'] != '')
			$url = addslashes(htmlspecialchars(trim($_GET['redirectTo'])));


	if(post('login'))
	{
		$correo = post('correo');
		$clave = post('clave');
		$fail = false;
		

		$usuario = checkUser($correo, $clave, $DB);

		if($usuario)
		{
			session_start();
			$_SESSION['id'] = $usuario['id'];
			$_SESSION['nombre'] = $usuario['nombre'];
			$_SESSION['CREATED'] = time();
			$_SESSION['LAST_ACTIVITY'] = time();


			header("Location: " . $url); // Redirect
		}
		else
		{
			$fail = true;
		}

	}

?><!DOCTYPE HTML>
<!--
	Telephasic 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Inicio Sesión - Distribook</title>
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
<?php
printHeader($DB);
?>

			</div>

		<!-- Main Wrapper -->
			<div class="wrapper">

				<div class="container">
						<div class="12u">
									<header>
										<h2>Entrar a mi cuenta</h2>
										<span>Estás a punto de disponer de la mayor librería online.</span>
									</header>

						</div>

					<div class="row features">
						<section class="4u"> &nbsp;
						</section>
						<section class="4u">

							<form action="<?=ACTUAL_URL?>" method="post">

<?php
	if($fail)
	{
?>
									<div class="row half">
										<div class="12u">
											<p class="alert">¡Oops! Algo salió mal...</p>
										</div>
									</div>

<? 
	}
?>								
									<div class="row half">
										<div class="12u">
											<input name="correo" placeholder="Correo" type="email" value="<?=$correo?>" class="text" />
										</div>
									</div>

									<div class="row half">
										<div class="12u">
											<input name="clave" placeholder="Clave" type="password" value="<?=$clave?>" class="text" />
										</div>
									</div>

									<div class="row half">
										<div class="12u">
											<ul class="actions major">
												<li><input type="submit" class="button" name="login" value="Iniciar Sesión"></li>
											</ul>
										</div>
									</div>
								</form>

						</section>
						<section class="4u"> &nbsp;
						</section>						

					</div>

				</div>
			</div>

		<!-- Footer Wrapper -->
<?php
	printFooter();
?>
	</body>
</html>