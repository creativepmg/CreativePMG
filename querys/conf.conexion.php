<?php
	$host 			= "localhost";
	$user 			= "servicio_admin";
	$pw 			= "phillip1707";
	$db 			= "servicio_main";
	$con = mysql_connect($host,$user,$pw)
	or die("problemas al conectar con el servidor");
	mysql_select_db($db,$con)
	or die("problemas al conectar db");
	
?>