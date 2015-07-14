<?php 
	//AGENDA
	$lis_agenda		= mysql_query("SELECT * FROM agenda ORDER BY FECHA_PROGRAMACION DESC")
					  or die("problemas en consulta:".mysql_error());
	
    
	//COMPRAS
	$lis_compras = mysql_query("SELECT 	A.ID_COMPRA,
										A.ID_PROVEEDOR,
										B.ID_PROVEEDOR,
										B.DESCRIPCION_PROVEEDOR,
										A.MONTO_TOTAL
								FROM compras AS A
								INNER JOIN proveedores AS B
									ON B.ID_PROVEEDOR = A.ID_PROVEEDOR
								ORDER BY A.FECHA_COMPRA")
						or die("Error en la consulta lis_compras.." . mysql_error($con));
	//MENUS
	$lis_menus		= mysql_query("SELECT * FROM menu ORDER BY ID_MENU DESC")
					  or die("problemas en consulta:".mysql_error());
	//PRODUCTOS
	$lis_productos 		= mysql_query("SELECT 	A.ID_PRODUCTO,
												A.STOCK,
												A.ID_TIPO_PRODUCTO,
												B.ID_TIPO_PRODUCTO,
												A.ID_PROVEEDOR,
												C.ID_PROVEEDOR,
												C.DESCRIPCION_PROVEEDOR,
												B.DESCRIPCION
										FROM producto_stock 		AS A
										INNER JOIN producto_tipo    AS B
											ON B.ID_TIPO_PRODUCTO = A.ID_TIPO_PRODUCTO
										INNER JOIN proveedores		AS C
											ON C.ID_PROVEEDOR = A.ID_PROVEEDOR
										WHERE A.STOCK >= 0
									 ORDER BY B.DESCRIPCION")
					   	or die("Error en la consulta lis_productos:  " . mysql_error($con));
	//PROVEEDORES
	$lis_proveedores = mysql_query("SELECT * FROM proveedores 
									ORDER BY DESCRIPCION_PROVEEDOR")
						or die("Error en la consulta proveedores.." . mysql_error($con));
	//SERVICIOS PENDIENTES
	$lis_serv_pendientes = mysql_query("SELECT * FROM orden_servicio
										WHERE ID_ESTADO_SERVICIO = '1'")
						or die("Error en la consulta proveedores.." . mysql_error($con));
	$countServPendientes = mysql_num_rows($lis_serv_pendientes);
?>