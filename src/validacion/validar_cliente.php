<?php 
	require '../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);	
	//datos enviados por post
	$postCelular = $_POST['numero_celular'];
	$postEmail	 = $_POST['email'];
	
    $cliente=$mysqli->query("SELECT * 
							 FROM clientes 
						     WHERE NUMERO_CELULAR 	= '$postCelular'");
	$dataCliente = mysqli_fetch_array($cliente);
	//Datos Cliente	
	$numeroCel = $dataCliente['NUMERO_CELULAR'];
	$emailCliente = $dataCliente['EMAIL_CLIENTE'];

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