<?php 
	$usuarioSesion	= $_SESSION['username'];
	$user = mysql_query("SELECT * FROM usuarios 
						 WHERE USER = '$usuarioSesion'")
			or die("problemas en consulta:".mysql_error());
	$arrayUsuario=mysql_fetch_array($user);
	
	//Variables de usuario
		$email = $arrayUsuario['EMAIL'];
		$userId = $arrayUsuario['ID_USUARIO'];
		$userName = $arrayUsuario['USER'];
		$userCategori = $arrayUsuario['CATEGORIA'];
	//Suma de totales que adeudan los usuarios
	function totalDeudaUsuario($email)
	{
		$resultDeudaUsuario = mysql_query("SELECT SUM(MONTO) as total
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
	$deudaUsuario 	= mysql_query("SELECT * 
								   FROM deuda_cliente  
								   WHERE ID_CLIENTE = '$arrayUsuario[EMAIL]'")
				      or die("No sabemos cuanto debes ".mysql_error($con));
	$menu 			= mysql_query("SELECT * FROM menu ORDER BY ID_MENU DESC")
					  or die("problemas en consulta:".mysql_error());
	$usuario_menu 	= mysql_query("SELECT * FROM usuario_menu as a
									INNER JOIN menu as b
										ON b.ID_MENU = a.ID_MENU
									where a.ID_USUARIO = '$arrayUsuario[ID_USUARIO]'
									ORDER BY DESCRIPCION")
									or die("problemas en consulta:".mysql_error());
	$lis_menus 		= "SELECT * FROM menu ORDER BY DESCRIPCION" 
					   or die("Error en la consulta.." . mysqli_error($con));
	$lis_clientes	= mysql_query("SELECT * FROM clientes AS A
								   LEFT JOIN usuarios AS B
								   		ON A.ID_USUARIO = B.ID_USUARIO
								   ORDER BY NOMBRE_CLIENTE") 
					   or die("Error en la consulta.." . mysqli_error($con));
	
	$lis_orden_serv		= mysql_query("SELECT * FROM orden_servicio AS A
								   	   LEFT JOIN clientes AS B
								   		ON A.ID_CLIENTE = B.ID_CLIENTE
								   	   WHERE 	A.ESTADO 		= '0'
								   	   	AND    ($userCategori 	= '1'
								   	   	OR 		A.ID_USUARIO 	= $userId)
								   	   ORDER BY A.FECHA_REGISTRO_ORDEN DESC") 
					   or die("Error en la consulta lis orden serv .." . mysql_error($con));
	$lis_notificaciones	= mysql_query("SELECT * FROM notificaciones 
									   WHERE ID_RECEPTOR = '$userId'
								  	   ORDER BY FECHA_REGISTRO DESC") 
							or die("Error en la consulta.." . mysqli_error($con));
	$conteoNotificaciones = mysql_num_rows($lis_notificaciones);
	$usuarios 		= mysql_query("SELECT * FROM usuarios ORDER BY ID_USUARIO DESC")
						or die("problemas en consulta:".mysql_error());
 ?>