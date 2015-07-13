<?php 
	session_start();
	require '../conexion.php';
	require '../session.php';
	//mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	
	$mensaje = '';
	$id_orden_de_servicio = '';
	$fecha_programacion = '';
	//insercion de orden 
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

	

	//buscar la ultima orden generada 
	$ultima_orden = "SELECT ID_ORDEN_SERVICIO FROM orden_servicio ORDER BY ID_ORDEN_SERVICIO DESC LIMIT 1" or die("Error en la consulta.." . mysqli_error($con));

	if(
		isset($_POST['id_cliente'])	&& !empty($_POST['id_cliente'])	&& 
	 	isset($_POST['detalle'])	&& !empty($_POST['detalle'])	&&
	 	isset($_POST['a_cuenta'])	&& !empty($_POST['a_cuenta'])	
	  )
	{
		$result_ins_orden_servicio = mysql_query($ins_orden_servicio,$con);
		echo "Nuevo servicio agregado ";

		if ($_POST['con_fecha_programada'] == '1')
		{
			$id = mysql_query($ultima_orden,$con);
			$array_orden = mysql_fetch_array($id);
			$id_orden_de_servicio = $array_orden['ID_ORDEN_SERVICIO'];
			$fecha_programacion = $_POST['fecha_programada'];
			$mensaje = 'La orden de Servicio Nro: '.$id_orden_de_servicio.' está programada para '.$fecha_programacion;
			//insercion a agenda 
			$ins_agenda = "INSERT INTO agenda (ID_ORDEN_SERVICIO,
									   DESCRIPCION,
									   FECHA_PROGRAMACION)
					VALUES ('$id_orden_de_servicio',
							'$mensaje',
							'$fecha_programacion'
					       )" or die("Error en la consulta.." . mysqli_error($con));

			mysql_query($ins_agenda,$con);
			echo $id_orden_de_servicio;
			echo " ";
			echo $fecha_programacion;
		}
	}
	else
	{
		echo "Deberia llenar todos los campos ";
	}
		
	
?>