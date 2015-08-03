<?php 
	/*
	 *El frontend controller se encarga de configurar
	 *nuestra aplicacion
	 */
	require 'config.php';
	require 'helpers.php';
	date_default_timezone_set('America/Lima');
	//Llamar al controlador indicado
	controller($_GET['url']);
	
