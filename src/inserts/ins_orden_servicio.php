<?php 
	session_start();
	require '../conexion.php';
	require '../session.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$ins_orden_servicio		=  "INSERT INTO orden_servicio (ID_CLIENTE,
												   		   DETALLE,
												   		   A_CUENTA,
												   		   ID_ESTADO_SERVICIO,
												   	 	   ID_USUARIO)
					   	   		VALUES ('$_POST[id_cliente]',
							   	   		'$_POST[detalle]',
							   	   		'$_POST[a_cuenta]',
							   	   		'1',
							   	   		'$userId')"
				       			or die("Error en la consulta.." . mysqli_error($con));
	if(
		isset($_POST['id_cliente'])	&& !empty($_POST['id_cliente'])	&& 
	 	isset($_POST['detalle'])	&& !empty($_POST['detalle'])	&&
	 	isset($_POST['a_cuenta'])	&& !empty($_POST['a_cuenta'])	
	  )
	{
		$result_ins_orden_servicio = mysql_query($ins_orden_servicio,$con);
		echo "Nuevo servicio agregado correctamente";
	}
	else
	{
		echo "Deberia llenar todos los campos";
	}
	
	
?>