<?php
include "settings.php";
	if(post('new'))
	{
		$correo = post('correo');
		$clave = post('clave');

		$tipo = post('tipo');
		$nombre = post('nombre') . ' ' . post('apellido');

		$hasher = new PasswordHash(8, TRUE);

		$hash = $hasher->HashPassword($clave);

		$insert = array(
			"nombre" => $nombre,
			"tipo" => $tipo,
			"clave" => $hash,
			"correo" => $correo

		);
		$DB->Insert($insert, TABLA_CLIENTES);

		header("Location: " .LOGIN_PAGE);
	}


?><!DOCTYPE HTML>
<!--
	Telephasic 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->	
<html>
	<head>
		<title>Registrarme - Distribook</title>
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
										<h2>Crear mi cuenta	</h2>
										<span>Empieza a consultar toda tu literatura en 5 minutos.</span>
									</header>

						</div>
<script type="text/javascript">

function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('clave');
    var pass2 = document.getElementById('repetirClave');
    //Store the Confimation Message Object ...
    var message = document.getElementById('doMatch');
    //Set the colors we will be using ...
    var goodColor = "#D8F2D8";
    var badColor = "#FEADAD";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "¡Buena clave!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Las claves no coinciden."
    }
}  
</script>

				<form method="post" action="<?=ACTUAL_URL?>" id="registro" name="registro">

					<div class="row features">
						<section class="6u ">


									<div class="row half">
										<div class="6u">
											<input name="nombre" placeholder="Nombre" type="text" class="text" />
										</div>
										<div class="6u">
											<input name="apellido" placeholder="Apellido" type="text" class="text" />
										</div>
									</div>

									<div class="row half">
										<div class="12u">
											<input name="correo" placeholder="Correo" type="email" class="text" />
										</div>
									</div>

									<div class="row half">
										<div class="12u">
											
											<input type="radio" name="tipo" id="tipoEstudiante" value="Estudiante"> <label for="tipoEstudiante">Estudiante</label>
										

											<input type="radio" name="tipo" id="tipoProfesor" value="Profesor"> <label for="tipoProfesor">Profesor</label>


											<input type="radio" checked name="tipo" id="tipoProfesional" value="Profesional"> <label for="tipoProfesional">Profesional</label>
																			
										</div>
									</div>


									<div class="row half">
										<div class="6u">
											<input name="clave" id="clave" placeholder="Clave" type="password" class="text" />
										</div>
										<div class="6u">
											<input name="repetirclave" id="repetirClave" onKeyUp="checkPass(); return false;" placeholder="Repetir clave" type="password" class="text" />
											<span id="doMatch"></span>
										</div>
									</div>


						</section>
						<section class="6u feature">
							<header>
								<h3>Modo de Suscripción</h3>
								<p>Elige tu estilo de pago y de suscripción. Con cualquier opción tendrás acceso a toda la librería.</p>
							</header>
							<img src="images/visa.gif">
							<img src="images/mastercard.gif">
							<img src="images/amex.gif">
							<img src="images/discover.gif">

							<br>
								<form method="post" action="#">

							<input type="radio" name="pago" id="mensual" value="mensual"> <label for="mensual">Mensual ($10)</label>	
							<input type="radio" name="pago" id="anual" value="anual"> <label for="Anual">Anual ($100)</label>	
							<input type="radio" name="pago" id="vitalicia" value="vitalicia"> <label for="vitalicia">Vitalicia ($250)</label>		
							<br>

									<div class="row half">
										<div class="9u">
											<input name="numeroTarjeta" placeholder="Número" type="text" class="text" />
										</div>
										<div class="3u">
											<input name="CVC" placeholder="CVC" min="100" max="999" type="number" class="text" />
										</div>
									</div>

									<div class="row half">
										<div class="3u">
										</div>										
										<div class="3u">
											<input name="mes" placeholder="MM" type="number" min="01" max="12" class="text" />
										</div>
								
										<div class="3u">
											<input name="ano" placeholder="AA" type="number" min="14" max="30" class="text" />
										</div>
										
									</div>

									<br>

						</section>

					</div>

						<div align="center">
							<ul class="actions" align="center">
								<li><input type="submit" name="new" value="Terminar mi Registro" class="button"></li>
					</ul>
				</div>
				</form>

				</div>


			</div>

		<!-- Footer Wrapper -->
<?php
	printFooter();
?>
	</body>
</html>