<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_cliente		= "INSERT INTO clientes (NOMBRE_CLIENTE,EMAIL)
				   	   VALUES ('$_POST[nombre_cliente]','$_POST[email]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_menu = mysql_query($ins_cliente,$con);
	echo "Nuevo cliente insertado correctamente";
?>