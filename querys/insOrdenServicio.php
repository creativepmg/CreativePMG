<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_orden_servicio		= "INSERT INTO orden_servicio (ID_CLIENTE,
												   DETALLE,
												   A_CUENTA,
												   TOTAL)
				   	   		VALUES ('$_POST[id_cliente]',
						   	   		   '$_POST[detalle]',
						   	   		   '$_POST[a_cuenta]',
						   	   		   '$_POST[monto_total]')"
				       		or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_orden_servicio = mysql_query($ins_orden_servicio,$con);
	echo "Nuevo servicio agregado correctamente";
?>