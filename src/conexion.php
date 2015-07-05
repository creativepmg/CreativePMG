<?php
	$host 			= "localhost";
	$user 			= "latinopm_admin";
	$pw 			= "phillip1707";
	$db 			= "latinopm_desarrollo";
	$con = mysql_connect($host,$user,$pw)
	or die("problemas al conectar con el servidor");
	mysql_select_db($db,$con)
	or die("problemas al conectar db");
	
?>