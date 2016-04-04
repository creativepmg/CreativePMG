<?php 
	require '../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);

	//seteo de variables	
	$postNombre	 = $_POST['nombre_cliente'];
	$postCelular = $_POST['numero_celular'];
	$postEmail	 = $_POST['email'];
	//
	$ins_cliente	= "INSERT INTO clientes (NOMBRE_CLIENTE,
											 NUMERO_CELULAR,
											 EMAIL_CLIENTE,
											 FOTO_CLIENTE
											 )
				   	   VALUES ('$postNombre',
				   	   		   '$postCelular',
				   	   		   '$postEmail',
				   	   		   'user.png')"
				       or die("Error en la consulta.." . mysqli_error($con));
	
	$result_ins_menu = $mysqli->query($ins_cliente);

	$ultimoCliente = $mysqli->query("SELECT ID_CLIENTE FROM clientes 
							  	     ORDER BY ID_CLIENTE DESC 
							  	 	 LIMIT 1 ");	
	$arryCliente=mysqli_fetch_array($ultimoCliente);
	echo $arryCliente['ID_CLIENTE'];
?>