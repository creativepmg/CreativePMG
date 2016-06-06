<?php 
	$mysqli = new mysqli($host, $user, $pw, $db);
	if ($mysqli->connect_errno) {
   		echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$usuarioSesion	= $_SESSION['username'];
	$user = $mysqli->query("SELECT * FROM usuarios 
						 WHERE USER = '$usuarioSesion'")
			or die("problemas en consulta:".mysqli_error());
	$arrayUsuario=mysqli_fetch_array($user);
	
	//Variables de usuario
		$email 			= $arrayUsuario['EMAIL'];
		$userId 		= $arrayUsuario['ID_USUARIO'];
		$user_name	 	= $arrayUsuario['NOMBRE_USUARIO'];
		$user_avatar 	= $arrayUsuario['AVATAR_USUARIO']; 
		$user_user 		= $arrayUsuario['USER'];
	//Suma de totales que adeudan los usuarios
	function totalDeudaUsuario($email)
	{
		$resultDeudaUsuario = $mysqli->query("SELECT SUM(MONTO) as total
			    					   FROM deuda_cliente
				     				   WHERE ID_CLIENTE='$email'")
						  or die("No sabemos cuanto debes"); 

		$totalDeudaUsuario 	= mysql_fetch_array($resultDeudaUsuario, MYSQL_ASSOC);
		$resulTotal = $totalDeudaUsuario['total'];

		if (!isset($resulTotal)) {
			$resulTotal = '0';
			return $resulTotal;
		}
		else
		{
			return $resulTotal;	
		}		
	}
	
	/*
	 *	Consultas
	 */

	
	
	$usuario_menu 	= $mysqli->query("SELECT * FROM usuario_menu as a
									INNER JOIN menu as b
										ON b.ID_MENU = a.ID_MENU
									where a.ID_USUARIO = '$arrayUsuario[ID_USUARIO]'
									ORDER BY DESCRIPCION")
									or die("problemas en consulta:".mysqli_error());

	$lis_clients = $mysqli->query("SELECT * FROM clientes AS A
                                ORDER BY A.NOMBRE_CLIENTE") 
             		or die("Error en la consulta.." . mysqli_error($con));

	$lis_tipo_productos = $mysqli->query("SELECT * FROM producto_tipo ORDER BY DESCRIPCION")
						or die("Error en la consulta lis_tipo_productos.." . mysqli_error($con));
						

	$lis_notificaciones	= $mysqli->query("SELECT * FROM notificaciones 
									   WHERE ID_RECEPTOR = '$userId'
								  	   ORDER BY FECHA_REGISTRO DESC") 
							or die("Error en la consulta.." . mysqli_error($con));
	$conteoNotificaciones = mysqli_num_rows($lis_notificaciones);
	$usuarios 		= $mysqli->query("SELECT * FROM usuarios ORDER BY ID_USUARIO DESC")
						or die("problemas en consulta:".mysqli_error());
 ?>