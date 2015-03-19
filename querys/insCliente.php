<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$user 	=mysql_query("SELECT * FROM usuarios WHERE EMAIL='$_POST[email]'",$con);
	$cliente=mysql_query("SELECT * FROM clientes 
						  WHERE EMAIL_CLIENTE 	= '$_POST[email]'
						   	OR 	NUMERO_CELULAR 	= '$_POST[numero_celular]'",$con);
	$dataUser=mysql_fetch_array($user);
	$dataCliente = mysql_fetch_array($cliente);
	//Datos Usuario
	$idUsuario = $dataUser['ID_USUARIO'];
	//Datos Cliente
	$nombreCliente = $dataCliente['NOMBRE_CLIENTE']; 
	$numeroCel = $dataCliente['NUMERO_CELULAR'];
	$emailCliente = $dataCliente['EMAIL_CLIENTE'];

	//echo 'seleccionado '.$numeroCel;
	//echo 'enviado por post '.$_POST['numero_celular'];
	/* echo 	"Email: ".$emailCliente."<br/>
	 *		Celular: ".$numeroCel."<br/>";
	 */

	$postCliente = $_POST['nombre_cliente'];
	$postCelular = $_POST['numero_celular'];
	$postEmail	 = $_POST['email'];


	if ($postCelular == '') {
		$postCelular = 'NULL';
	}
	if ($postEmail == '') {
		$postEmail = 'NULL';
	}
	if ($postCliente == '') {
		$postCliente = 'NULL';
	}
	$ins_cliente	= "INSERT INTO clientes (NOMBRE_CLIENTE,
											 NUMERO_CELULAR,
											 EMAIL_CLIENTE,
											 FOTO_CLIENTE,
											 ID_USUARIO)
				   	   VALUES ('$postCliente',
				   	   		   '$postCelular',
				   	   		   '$postEmail',
				   	   		   'user.png',
				   	   		   '$idUsuario')"
				       or die("Error en la consulta.." . mysqli_error($con));
	//Validacion de insercion 
	if ($postCliente == 'NULL') 
	{
		echo "No puede registrar cliente sin nombre";	
	}
	else
	{
		if ($emailCliente == '') 
		{
			
			if ($numeroCel == '') 
			{
	  			$result_ins_menu = mysql_query($ins_cliente,$con);
				
				$ultimoCliente = mysql_query("SELECT ID_CLIENTE FROM clientes 
							  	ORDER BY ID_CLIENTE DESC 
							  	LIMIT 1 
							  	",$con);	
				$arryCliente=mysql_fetch_array($ultimoCliente);
				echo $arryCliente['ID_CLIENTE'];
				
			}
			else
			{
				echo "El numero de cel ya existe";
			}
		}
		else
		{
			echo "	Ya existe un cliente registrado con esos Datos<br />
					Nombre:  ".$nombreCliente."<br />
					Numero Celular:  ".$numeroCel." <br />
				  	El email: ".$emailCliente."<br />";
		}
	}
?>