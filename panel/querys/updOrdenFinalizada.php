<?php 
	require '../conexion.php';
	mysql_set_charset('utf8');					
	mysql_query("UPDATE orden_servicio 
	          	 SET ESTADO = '1' 
				 WHERE ID_ORDEN_SERVICIO = '$_POST[id_orden_servicio]'",$con);
	echo "La orden ha sido marcada como finalizada";
 ?>