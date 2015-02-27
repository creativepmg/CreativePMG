<?php 
	$usuarioSesion	= $_SESSION['username'];
	$user = mysql_query("SELECT * FROM usuarios 
						 WHERE USER = '$usuarioSesion'")
			or die("problemas en consulta:".mysql_error());
	$arrayUsuario=mysql_fetch_array($user);
	//Variables de usuario
		$email = $arrayUsuario['EMAIL'];
		$userId = $arrayUsuario['ID_USUARIO'];
		$userCategori = $arrayUsuario['CATEGORIA'];
?>