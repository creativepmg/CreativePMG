<?php 
	require 'conexion.php';
	mysql_set_charset('utf8');					
	//$result_ins_cliente = $link->query($ins_cliente); 
	$user=mysql_query("SELECT * FROM usuarios WHERE EMAIL='$_POST[email]'",$con);
	$dataUser=mysql_fetch_array($user);
	$idUsuario = $dataUser['ID_USUARIO'];

	$ins_cliente		= "INSERT INTO clientes (NOMBRE_CLIENTE,NUMERO_CELULAR,EMAIL_CLIENTE,FOTO_CLIENTE,ID_USUARIO)
				   	   VALUES ('$_POST[nombre_cliente]','$_POST[numero_celular]','$_POST[email]','user.png','$idUsuario')"
				       or die("Error en la consulta.." . mysqli_error($con));
	$result_ins_menu = mysql_query($ins_cliente,$con);
	echo "Nuevo cliente insertado correctamente";
?>