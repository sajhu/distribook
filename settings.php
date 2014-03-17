<?php
include "MySQL.php";


	// -- Configuraciones de Entorno

	global $DB;
	mb_internal_encoding("UTF-8");
	error_reporting(E_ALL ^ E_NOTICE);

	// -- Acceso MySQL

	define("MYSQL_NAME", "distribook");
	define("MYSQL_USER", "root");
	define("MYSQL_PASS", "coovxpexrask");
	define("MYSQL_HOST", "localhost");

	$DB = new MySQL(MYSQL_NAME, MYSQL_USER, MYSQL_PASS, MYSQL_HOST) or die("Error accediendo a la base de datos");

include "functions.php";

	// -- URLs

	define("RELATIVE_URL", "/distribook/");
	define("ABSOLUTE_URL", "http://localhost/distribook/");

	define('ACTUAL_URL', $_SERVER['PHP_SELF']); // Don't edit this one

	define("PICS_URL", ABSOLUTE_URL. "pubs/img/");
	define("READER_URL", ABSOLUTE_URL. "reader/?l=");
	define("DOWNLOAD_URL", ABSOLUTE_URL. "descargar.php?l=");

	
	// -- Tablas MySQL

	define("TABLA_LIBROS", "pubs");
//	define("TABLA_USUARIOS", "usuario");


	// -- Conexión a la DB


	
		

?>
