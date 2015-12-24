<?php 
	require '../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);

	mysql_set_charset('utf8');					
	
	$ins_proveedor	= "INSERT INTO proveedores (DESCRIPCION_PROVEEDOR,
												USUARIO_REGISTRANTE)
				   	   VALUES ('$_POST[descripcion]',
				   	   		   '$_POST[username]')"
				       or die("Error en la consulta.." . mysqli_error($mysqli));
	$result_ins_producto = $mysqli->query($ins_proveedor);
	echo "Has creado un nuevo proveedor";
?>