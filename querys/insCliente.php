<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$user=mysql_query("SELECT * FROM usuarios WHERE EMAIL='$_POST[email]'",$con);
	$cliente=mysql_query("SELECT * FROM clientes 
						  WHERE EMAIL_CLIENTE = '$_POST[email]'
						   	OR NUMERO_CELULAR = '$_POST[numero_celular]'",$con);
	$dataUser=mysql_fetch_array($user);
	$dataCliente = mysql_fetch_array($cliente);
	//Datos Usuario
	$idUsuario = $dataUser['ID_USUARIO'];
	//Datos Cliente
	$numeroCel = $dataCliente['NUMERO_CELULAR'];
	$emailCliente = $dataCliente['EMAIL_CLIENTE'];

	//echo 'seleccionado '.$numeroCel;
	//echo 'enviado por post '.$_POST['numero_celular'];
	if($emailCliente == $_POST['email'])
	{
		echo "El email ya existe";
	}
	else
	{
		if($numeroCel == $_POST['numero_celular'])
		{
			echo "El numero ya existe";	
		}
		else
		{

		$ins_cliente	= "INSERT INTO clientes (NOMBRE_CLIENTE,
												 NUMERO_CELULAR,
												 EMAIL_CLIENTE,
												 FOTO_CLIENTE,
												 ID_USUARIO)
					   	   VALUES ('$_POST[nombre_cliente]',
					   	   		   '$_POST[numero_celular]',
					   	   		   '$_POST[email]',
					   	   		   'user.png',
					   	   		   '$idUsuario')"
					       or die("Error en la consulta.." . mysqli_error($con));
		$result_ins_menu = mysql_query($ins_cliente,$con);
		echo "Nuevo cliente insertado correctamente";		
			
		}
	}

?>