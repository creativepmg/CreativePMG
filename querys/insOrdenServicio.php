<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_menu		= "INSERT INTO orden_servicio (ID_CLIENTE,
												   DETALLE,
												   A_CUENTA,
												   TOTAL)
				   	   VALUES ('$_POST[id_cliente]',
				   	   		   '$_POST[detalle]',
				   	   		   '$_POST[a_cuenta]',
				   	   		   '$_POST[monto_total]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_menu = mysql_query($ins_menu,$con);
	echo "nuevo nota insertada";
?>