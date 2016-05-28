<?php 
	require '../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);

	mysql_set_charset('utf8');					
	$mysqli->query("UPDATE orden_servicio 
	          	 SET 	DETALLE 			= '$_POST[detalle]',
	          	 		A_CUENTA			= '$_POST[a_cuenta]',
	          	 		TOTAL				= '$_POST[monto_total]',
	          	 		ID_ESTADO_SERVICIO 	= '$_POST[id_estado_servicio]'
				 WHERE ID_ORDEN_SERVICIO = '$_POST[id_orden_servicio]'",$con);
	echo "La orden ha sido actualizada";

 ?>