<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_menu		= "INSERT INTO menu (DESCRIPCION,URL)
				   	   VALUES ('$_POST[nombre_menu]','$_POST[link]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_menu = mysql_query($ins_menu,$con);
	echo "nuevo menu insertado";
?>