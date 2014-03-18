<?php
include "lib/MySQL.php";


	// -- Configuraciones de Entorno

	global $DB;
	mb_internal_encoding("UTF-8");
	error_reporting(E_ALL ^ E_NOTICE);

	// -- Acceso MySQL

	define("MYSQL_NAME", "distribook");
	define("MYSQL_USER", "root");
	define("MYSQL_PASS", "coovxpexrask");
	define("MYSQL_HOST", "localhost");


	/*
	$mysql_host = "mysql9.000webhost.com";
	$mysql_database = "a8533807_distrib";
	$mysql_user = "a8533807_distrib";
	$mysql_password = "distribook1";
	*/

	define("SESSION_REGENERATE_TIME", 60);
	define("SESSION_EXPIRE_TIME", 60 * 60);
	
	

	$DB = new MySQL(MYSQL_NAME, MYSQL_USER, MYSQL_PASS, MYSQL_HOST) or die("Error accediendo a la base de datos");


	// -- URLs

	define("RELATIVE_URL", "/distribook/");
	define("ABSOLUTE_URL", "http://localhost/distribook/");

	define('ACTUAL_URL', $_SERVER['REQUEST_URI']); // Don't edit this one

	define("PICS_URL", ABSOLUTE_URL. "pubs/img/");
	define("READER_URL", ABSOLUTE_URL. "reader/?l=");
	define("DOWNLOAD_URL", ABSOLUTE_URL. "descargar.php?l=");

	define("LOGIN_PAGE", ABSOLUTE_URL. "inicio.php");

	// -- Tablas MySQL

	define("TABLA_LIBROS", "pubs");
	define("TABLA_CLIENTES", "clientes");


	include "functions.php";

		

?>
