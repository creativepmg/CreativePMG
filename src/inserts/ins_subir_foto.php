<?php
		require '../../config/conexion.php';
		$mysqli = new mysqli($host, $user, $pw, $db);
		$carpeta = "../../img/avatares/";
		opendir($carpeta);
		$destino = $carpeta.$_FILES['avatar']['name'];
		copy($_FILES['avatar']['tmp_name'],$destino);
		$avatar_nombre = $_FILES['avatar']['name'];
		$id_usuario = $_POST['id_usuario'];

		$mysqli->query("UPDATE usuarios 
						SET AVATAR_USUARIO = '$avatar_nombre'
						WHERE ID_USUARIO = '$id_usuario'",$con);
		header("Location: ../../configuracion");
?>