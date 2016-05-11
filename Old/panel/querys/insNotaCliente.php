<?php 
	require '../conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_menu		= "INSERT INTO orden_servicio (ID_CLIENTE,NOTA)
				   	   VALUES ('$_POST[id_cliente]','$_POST[nota]')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_menu = mysql_query($ins_menu,$con);
	echo "nuevo nota insertada";
?>