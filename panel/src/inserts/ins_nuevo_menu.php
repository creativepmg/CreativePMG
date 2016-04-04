<?php 
	require '../../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);
	mysql_set_charset('utf8');					
	
	$ins_menu		= "INSERT INTO menu (DESCRIPCION,
										 URL,
										 CLASS_ICON)
				   	   VALUES ('$_POST[titulo_pagina]',
				   	   	  	   '$_POST[link]',
				   	   	  	   '$_POST[class_icon]')"
				       or die("Error en la consulta.." . $mysqli->error);
	$result_ins_menu = $mysqli->query($ins_menu);

	echo "nuevo menu insertado";
?>