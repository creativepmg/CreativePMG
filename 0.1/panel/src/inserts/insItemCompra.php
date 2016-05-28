<?php 
	require '../../querys/conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$lis_monto_total = mysql_query("SELECT MONTO_TOTAL FROM compras 
									WHERE ID_COMPRA = '$_POST[id_compra]'",$con);
	$monto_total = mysql_fetch_array($lis_monto_total);
	$monto = $monto_total['MONTO_TOTAL'] + $_POST['costo'];
	/*actualizar monto total de compra*/
	$upd_compra	=  "UPDATE compras 
				   	SET MONTO_TOTAL = '$monto'
				   	WHERE ID_COMPRA = '$_POST[id_compra]'"
				    or die("Error en la insercion compra detalle.." . mysqli_error($con));
	$result_upd_compra = mysql_query($upd_compra,$con);
	/*insertar detalle de la compra*/
	$ins_item_producto	= "INSERT INTO compra_detalle (ID_COMPRA,
											 	   ID_TIPO_PRODUCTO,
											 	   CANTIDAD,
											 	   COSTO)
				   	   		VALUES ('$_POST[id_compra]',
				   	   			    '$_POST[id_tipo_producto]',
				   	   			    '$_POST[cantidad]',
				   	   			    '$_POST[costo]')"
				       		or die("Error en la insercion compra detalle.." . mysqli_error($con));
	$result_ins_item_producto = mysql_query($ins_item_producto,$con);
	/*actualizar stock de productos o insertar nuevo producto*/
	$lis_stock_producto = mysql_query("SELECT ID_PRODUCTO,
											  ID_PROVEEDOR,
    								   		  ID_TIPO_PRODUCTO,
    								   		  STOCK
    								   FROM producto_stock
    								   WHERE ID_PROVEEDOR 	  = '$_POST[id_proveedor]'
    								   AND 	 ID_TIPO_PRODUCTO = '$_POST[id_tipo_producto]'",$con);
    $stock_productos = mysql_fetch_array($lis_stock_producto);
    $el_producto = mysql_num_rows($lis_stock_producto);
    $stock = $stock_productos['STOCK'] + $_POST['cantidad'];
    $mensaje = 'Item insertado correctamente';
	if($el_producto == '0')
	{
		$ins_producto	= "INSERT INTO producto_stock (ID_PROVEEDOR,
													   ID_TIPO_PRODUCTO,
													   STOCK)
					   	   		VALUES ('$_POST[id_proveedor]',
					   	   				'$_POST[id_tipo_producto]',
					   	   				'$_POST[cantidad]')"
				       			or die("Error en la insercion producto.." . mysqli_error($con));
		mysql_query($ins_producto,$con);
		//$mensaje = 'es igual a cero y debio insertar';
	}
	else
	{

		$ins_stock_producto	= "UPDATE producto_stock 
								SET STOCK = '$stock'
								WHERE ID_PRODUCTO = '$stock_productos[ID_PRODUCTO]'"
				       			or die("Error en la insercion stock producto.." . mysqli_error($con));
		$result_ins_stock_producto = mysql_query($ins_stock_producto,$con);
		//$mensaje = 'es diferente de cero';
	}
	echo $mensaje;
?>