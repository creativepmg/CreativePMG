<?php 
	require '../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);
	mysql_set_charset('utf8');					
	
	$ins_producto	= "INSERT INTO producto_tipo (DESCRIPCION,
											 	  PRECIO_VENTA,
											 	  USUARIO_REGISTRANTE)
				   	   VALUES ('$_POST[descripcion]',
				   	   		   '$_POST[precio_venta]',
				   	   		   '$_POST[registrante]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_producto = $mysqli->query($ins_producto);
	if($result_ins_producto)
	{
		echo "Has creado un nuevo producto";
	}
	else
	{
		echo "algo raro pasó";
	}
?>