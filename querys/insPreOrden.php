<?php 
	session_start();
	require 'conexion.php';
	require 'session.php';
	mysql_set_charset('utf8');	
	echo "todo esta funcionando correctamente <br/>"; 
	$cliente=mysql_query("SELECT * FROM clientes 
						  WHERE NUMERO_CELULAR 	= '$_POST[numero_celular]'",$con);
	$dataCliente = mysql_fetch_array($cliente);
	$idCliente = $dataCliente['ID_CLIENTE'];
	$nombreCliente = $dataCliente['NOMBRE_CLIENTE'];
	$numeroCel = $dataCliente['NUMERO_CELULAR'];

	$postCelular = $_POST['numero_celular'];

	if (empty($postCelular)) {
		echo "el campo numero es un campo obligatorio <br />";
	}
	else
	{
		if ($numeroCel == $postCelular) 
		{
			echo "El cliente ".$nombreCliente." tiene el numero ".$numeroCel." registrado <br />";

			$ins_orden_servicio		= "INSERT INTO orden_servicio (ID_CLIENTE,
												   DETALLE,
												   REFERENCIA,
												   A_CUENTA,
												   TOTAL,
												   ID_USUARIO)
				   	   				VALUES ('$idCliente',
							   	   		    '$_POST[detalle]',
							   	   		    '$_POST[nombre_cliente]',
							   	   		    '0',
							   	   		    '0',
							   	   		    '$userId')"
				       				or die("Error en la consulta.." . mysqli_error($con));
			$result_ins_orden_servicio = mysql_query($ins_orden_servicio,$con);
			echo "Nueva orden agregada al cliente con id <br/>";
		}
		else
		{		
			echo "Este es un cliente nuevo";
			mysql_query("INSERT INTO clientes (NOMBRE_CLIENTE,
											   NUMERO_CELULAR,
											   EMAIL_CLIENTE,
											   FOTO_CLIENTE,
											   ID_USUARIO) 
						 VALUES ('$_POST[nombre_cliente]',
						 	 	 '$_POST[numero_celular]',
						 	 	 'NULL',
						 	 	 'user.png',
						 	 	 '0')",$con);

			$newCliente=mysql_query("SELECT * FROM clientes 
						  WHERE NUMERO_CELULAR 	= '$_POST[numero_celular]'",$con);
			$dataNewCliente = mysql_fetch_array($newCliente);
			$idNewCliente = $dataNewCliente['ID_CLIENTE'];

			$ins_new_orden		= "INSERT INTO orden_servicio (ID_CLIENTE,
												   DETALLE,
												   REFERENCIA,
												   A_CUENTA,
												   TOTAL,
												   ID_USUARIO)
				   	   				VALUES ('$idNewCliente',
							   	   		    '$_POST[detalle]',
							   	   		    '$_POST[nombre_cliente]',
							   	   		    '0',
							   	   		    '0',
							   	   		    '$userId')"
				       				or die("Error en la consulta.." . mysqli_error($con));
			$result_ins_orden_servicio = mysql_query($ins_new_orden,$con);
			echo "<br /> Nuevo cliente y Orden agregados al usuario ";
		}
	}

?>