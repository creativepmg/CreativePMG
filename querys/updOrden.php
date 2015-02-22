<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	mysql_query("UPDATE orden_servicio 
	          	 SET DETALLE = '$_POST[detalle]'
				 WHERE ID_ORDEN_SERVICIO = '$_POST[id_orden_servicio]'",$con);
	echo "La orden ha sido actualizada";

 ?>