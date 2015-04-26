<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_producto	= "INSERT INTO productos (DESCRIPCION,
											 PRECIO_VENTA)
				   	   VALUES ('$_POST[descripcion]',
				   	   		   '$_POST[precio_venta]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_producto = mysql_query($ins_producto,$con);
	echo "Has creado un nuevo producto";
?>