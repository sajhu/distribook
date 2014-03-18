<?php

include "lib/PasswordHash.php";
include "lib/Mailer.php";

function handdleSession($required = false)
	{
		if(!(defined('NO_SESSION')) || !NO_SESSION)
		{
			session_start();

			// If a logout parameter was passed by get, endSession
			if(isset($_GET['logout']))
			{
				endSession();
			}

			//TODO should re-verify hash
			else if($required && (!isset($_SESSION['nombre']) || !isset($_SESSION['id']))) // there is a session
			{
				header('Location: '.LOGIN_PAGE.'?redirectTo='.ACTUAL_URL);
			}
			
			// Regenerates Session if it was created a lot ago
			if ($reqired && isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['CREATED'] > SESSION_REGENERATE_TIME)) {
				session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
				$_SESSION['CREATED'] = time();  // update creation time
			}

			// End session if there was no activity
			if ($required && isset($_SESSION['LAST_ACTIVITY']) && ((time() - $_SESSION['LAST_ACTIVITY']) > SESSION_EXPIRE_TIME)) {
			    endSession();
			}
			$_SESSION['LAST_ACTIVITY'] = time(); // always update last activity time stamp

		}
	}

	function checkUser($mail, $pass, $db)
	{
		$usuario = $db->Select(TABLA_CLIENTES, array('correo' => $mail), '', 1);

		if($db->records == 0)
			return false;

		$realPass = $usuario['clave'];

		$t_hasher = new PasswordHash(8, TRUE);
		$check = $t_hasher->CheckPassword($pass, $realPass);

		if ($check)
			return $usuario;

		else
			return false;
				
	}
	// Deletes all Sessions
	function endSession()
	{
		session_start();
		unset($_SESSION['id']);
		unset($_SESSION['nombre']);
		unset($_SESSION['LAST_ACTIVITY']);
		unset($_SESSION['CREATED']);
		session_destroy();
		header('Location: '.LOGIN_PAGE);
	}

	/**
	 *	Returns the session atribute in the parameter
	 * @param $name the session name to be returned
	 */
	function getSession($name)
	{
		return $_SESSION[$name];
	}

	function setSession($name, $value = '')
	{
		$_SESSION[$name] = $value;
	}
	
		/**
	 * Sanitizes any input string agaist SQLInjections and XSS
	 * @requires 	An existing MySQL connection is required for it to work. Will put scape slashes if there isn't one.
	 */
	function sanitize($string)
	{
		//TODO should check first for Magic Quotes GPC
		try {
			return mysql_real_escape_string(htmlspecialchars(trim($string)));	
		} catch (Exception $e) {
			return addslashes(htmlspecialchars(trim($string)));
		}
	}
	
	function get($key)
	{
		return sanitize($_GET[$key]);
	}
	
	function post($key)
	{
		return sanitize($_POST[$key]);
	}

	/**
	 * Sends a mail
	 * @param $fromEmail senders email address
	 * @param $toEmail recipients email address
	 * @param $subject mail's subject
	 * @param $message mail's content
	 * @param $fromName senders name, optional
	 * @param $toName recipients name, optional
	 * @return should check === true for confirmation. otherwise a string with the error message will be returned
	 */
	function sendMail($fromEmail, $toEmail, $subject, $message, $fromName = '', $toName = '')
	{
		try {
			include_once(PHP_FOLDER.'Mailer.php');

			// minimal requirements to be set
			$Mailer = new Mailer();
			$Mailer->setFrom($fromName, $fromEmail);
			$Mailer->addRecipient($toName, $toEmail);
			$Mailer->fillSubject($subject);
			$Mailer->fillMessage($message);
			

			
			// now we send it!
			$Mailer->send();
			return true;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	/**
	 * Returns the time elapsed between a time given and now in human-readable form
	 * For example: 4 days, 3 minutes
	 * @param $time measured in the Unix Epoch format
	 * @return String saying the time between that date and now in a human form
	 */
	function humanTiming ($time)
	{

	    $time = time() - $time; // to get the time since that moment

	    $tokens = array (
	        31536000 => 'year',
	        2592000 => 'month',
	        604800 => 'week',
	        86400 => 'day',
	        3600 => 'hour',
	        60 => 'minute',
	        1 => 'second',
	        0 => 'just now'
	    );

	    foreach ($tokens as $unit => $text) {
	        if ($time < $unit) continue;
	        $numberOfUnits = floor($time / $unit);
	        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	    }
	}

function darCategorias(MySQL $link)
{
	$sql = "SELECT DISTINCT categoria FROM pubs ORDER BY categoria LIMIT 0 , 15";
	$resultado = $link->ExecuteSQL($sql) or die($link->lastError);
	$arreglado =  array();

	for ($i=0; $i < count($resultado); $i++) { 
		$arreglado[] = $resultado[$i]['categoria'];
	}

	return $arreglado;
}

function printHeader($link)
{
	$logeado = false;

	if(isset($_SESSION['id']))
		$logueado = true;
	echo '
					<div id="header" class="container">
						
						<!-- Logo -->
							<h1 id="logo"><a href="'.RELATIVE_URL.'">Distribook</a></h1>
						
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li>
										<a href="que-es.php">¿Qué es?</a>
										
									</li>
									<li><a href="catalogo.php">Catálogo</a>

										<ul>';
$categorias = darCategorias($link);
foreach($categorias as $key => $categoria)
{
	echo "											<li><a href=\"catalogo.php?c={$categoria}\">{$categoria}</a></li>
";
}

	echo '
										</ul>

									</li>
									<li class="break"><a href="index.php#novedades">Novedades</a></li>
									
									';
	if($logueado)
	{
	 echo '
									<li><span>Mi Cuenta</span>

										<ul>
											<li><span align="center">'.getSession('nombre').'</span></li>
											<li><a href="#">Mis Favoritos</a></li>
											<li><a href="'.RELATIVE_URL.'?logout">Salir</a></li>
										</ul>
									</li>';	
	}
	else
	{
	 echo '
									<li><a href="inicio.php">Entrar</a>

								
									</li>';			
	}



						echo '

								</ul>
							</nav>

					</div>
	';
}


function printFooter()
{
	echo '
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
										<li class="fa fa-facebook"><a href="#"><span class="extra">fb.com/</span>Distribook</a></li>
									</ul>
									<ul class="divided icons 6u">
										<li class="fa fa-twitter"><a href="#"><span class="extra">t.com/</span>Distribook</a></li>
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
			<script>
			  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

			  ga(\'create\', \'UA-48998274-1\', \'comxa.com\');
			  ga(\'send\', \'pageview\');

			</script>
			';
}
?>
