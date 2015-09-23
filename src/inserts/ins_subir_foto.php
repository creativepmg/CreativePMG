<?php
		require '../../config/conexion.php';
		$mysqli = new mysqli($host, $user, $pw, $db);
		$carpeta = "../../img/avatares/";
		opendir($carpeta);
		$destino = $carpeta.$_FILES['avatar']['name'];
		copy($_FILES['avatar']['tmp_name'],$destino);
		
		$im = file_get_contents($destino);
		$imdata = base64_encode($im);
		
		$id_usuario = $_POST['id_usuario']; 

		$mysqli->query("UPDATE usuarios 
						SET AVATAR_USUARIO = '$imdata'
						WHERE ID_USUARIO = '$id_usuario'",$con);
		unlink($destino);
		header("Location: ../../configuracion");
?>