<?php 
	$usuarioSesion	= $_SESSION['username'];
	$user = $mysqli->query("SELECT * FROM usuarios 
						 WHERE USER = '$usuarioSesion'")
			or die("problemas en consulta:".mysqli_error());
	$arrayUsuario=mysqli_fetch_array($user);
	//Variables de usuario
		$email = $arrayUsuario['EMAIL'];
		$userId = $arrayUsuario['ID_USUARIO'];
		$userCategori = $arrayUsuario['CATEGORIA'];
?>