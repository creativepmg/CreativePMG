<?php 
	require '../../querys/conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_producto	= "INSERT INTO orden_servicio_detalle (ID_ORDEN_SERVICIO,
													       ID_PRODUCTO)
				   	   VALUES ('$_GET[id_servicio]',
				   	   		   '$_GET[id_producto]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_producto = mysql_query($ins_producto,$con);


	echo "<script type='text/javascript'>
	window.location = '/detalle-orden-servicio?nroOrden=".$_GET['id_servicio']."';
	</script>";