<?php


	
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
	echo '
					<div id="header" class="container">
						
						<!-- Logo -->
							<h1 id="logo"><a href="index.html">Distribook</a></h1>
						
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li>
										<a href="que-es.php"	>¿Qué es?</a>
										
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
									<li><span>Mi Cuenta</span>

										<ul>
											<li><span align="center">Santiago Rojas</span></li>
											<li><a href="#">Mis Favoritos</a></li>
											<li><a href="#">Salir</a></li>
										</ul>
									</li>
								</ul>
							</nav>

					</div>
	';
}

?>