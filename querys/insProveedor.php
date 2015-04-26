<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_proveedor	= "INSERT INTO proveedores (DESCRIPCION,
												ID_USUARIO_REGISTRANTE)
				   	   VALUES ('$_POST[descripcion]',
				   	   		   '$_POST[id_user]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_producto = mysql_query($ins_proveedor,$con);
	echo "Has creado un nuevo proveedor";
?>