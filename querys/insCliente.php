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
			echo "No hay coincidencia en email, continuamos <br />";
			if ($numeroCel == '') 
			{
				echo "No hay conicidencia en el celular, continuamos<br/>
					  Insertar Cliente: ".$postCliente."<br/>
					  Insertar Celular: ".$postCelular."<br/>
					  Insertar Email: ".$postEmail."<br/>";
	  			$result_ins_menu = mysql_query($ins_cliente,$con);
				echo "Nuevo cliente insertado correctamente";		

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

	/*if(isset($emailCliente))
	{
		if(empty($numeroCel))
		{
			$result_ins_menu = mysql_query($ins_cliente,$con);
			echo "Nuevo cliente insertado correctamente";		
		}
		else
		{
			echo "El numero ya existe";	
		}
	}
	else
	{
		echo "El email enviado ya existe";
	}*/

?>