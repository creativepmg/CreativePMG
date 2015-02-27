<?php
	$host 			= "localhost";
	$user 			= "creative_admin";
	$pw 			= "phillip1707";
	$db 			= "creative_main";
	$con = mysql_connect($host,$user,$pw)
	or die("problemas al conectar con el servidor");
	mysql_select_db($db,$con)
	or die("problemas al conectar db");
	
?>