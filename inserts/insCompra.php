<?php 
	require '../querys/conexion.php';

	if(isset($_POST['fecha_compra']) && !empty($_POST['fecha_compra']))
	{
		mysql_query("INSERT INTO compras (ID_PROVEEDOR,
										  FECHA_COMPRA,
										  ESTADO_COMPRA) 
					 	VALUES ('$_POST[id_proveedor]',
								'$_POST[fecha_compra]',
								'1')",$con);
		echo "Compra insertada correctamente";
	}
	else
	{
		echo "No ha escogido fecha";
	}