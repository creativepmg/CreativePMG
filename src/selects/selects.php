<?php 
	require 'config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);
	if ($mysqli->connect_errno) {
    	echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else
	{
		echo "Conexion exitosa";
	}
	$hoy = getdate();
	//AGENDA
	$lis_agenda		= $mysqli->query("SELECT * 
									  FROM agenda 
									  ORDER BY FECHA_PROGRAMACION DESC")
					  or die("problemas en consulta:".mysqli_error());
	
    
	//COMPRAS
	$lis_compras = $mysqli->query("SELECT 	A.ID_COMPRA,
										A.ID_PROVEEDOR,
										B.ID_PROVEEDOR,
										B.DESCRIPCION_PROVEEDOR,
										A.MONTO_TOTAL
								FROM compras AS A
								INNER JOIN proveedores AS B
									ON B.ID_PROVEEDOR = A.ID_PROVEEDOR
								ORDER BY A.FECHA_COMPRA")
						or die("Error en la consulta lis_compras.." . mysqli_error($con));
	//MENUS
	$lis_menus		= $mysqli->query("SELECT * FROM menu ORDER BY ID_MENU DESC")
					  or die("problemas en consulta:".mysqli_error());
	//PRODUCTOS
	$lis_productos 		= $mysqli->query("SELECT * 
										  FROM producto_tipo")
					   	or die("Error en la consulta lis_productos:  " . mysqli_error($mysqli));
	//PROVEEDORES
	$lis_proveedores = $mysqli->query("SELECT * FROM proveedores 
									ORDER BY DESCRIPCION_PROVEEDOR")
						or die("Error en la consulta proveedores.." . mysqli_error($con));
	//SERVICIOS PENDIENTES
	$lis_serv_pendientes = $mysqli->query("SELECT * FROM orden_servicio
										WHERE ID_ESTADO_SERVICIO = '1'")
						or die("Error en la consulta proveedores.." . mysqli_error($con));
	$countServPendientes = mysqli_num_rows($lis_serv_pendientes);
?>