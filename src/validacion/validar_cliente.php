<?php 
	require '../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);	
	$cliente=$mysqli->query("SELECT * 
							 FROM clientes 
						     WHERE EMAIL_CLIENTE 	= '$_POST[email]'
						   	    OR NUMERO_CELULAR 	= '$_POST[numero_celular]'");
	$dataCliente = mysqli_fetch_array($cliente);
	//Datos Cliente	
	$numeroCel = $dataCliente['NUMERO_CELULAR'];
	$emailCliente = $dataCliente['EMAIL_CLIENTE'];
	//datos enviados por post
	$postCelular = $_POST['numero_celular'];
	$postEmail	 = $_POST['email'];

	if ($postCelular == "") 
	{
		echo "deberias llenar el campo celular";
	}
	else 
		if($numeroCel == $postCelular)
		{
			echo "El numero ya existe";
		}
		else
		{
			echo "continuar";
		}

?>