<?php 
	require '../../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);

	mysql_set_charset('utf8');					
	
	$sql	= "INSERT INTO proveedores (DESCRIPCION_PROVEEDOR,
										USUARIO_REGISTRANTE)
				   	   VALUES ('$_POST[descripcion]',
				   	   		   '$_POST[username]')"
				       or die("Error en la consulta.." . $mysqli->error);
	$result_ins_producto = $mysqli->query($sql);
	echo "Has creado un nuevo proveedor";
?>