<?php
		require '../../config/conexion.php';
		$mysqli = new mysqli($host, $user, $pw, $db);
		$carpeta = "../../img/";
		opendir($carpeta);
		$destino = $carpeta.$_FILES['producto']['name'];
		copy($_FILES['producto']['tmp_name'],$destino);
		
		$im = file_get_contents($destino);
		$imdata = base64_encode($im);
		
		$id_producto = $_POST['id_producto']; 

		$mysqli->query("UPDATE usuarios 
						SET AVATAR_USUARIO = '$imdata'
						WHERE ID_USUARIO = '$id_producto'",$con);
		unlink($destino);
		header("Location: ../../configuracion");
?>