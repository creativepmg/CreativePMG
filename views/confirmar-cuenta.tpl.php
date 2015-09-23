<!DOCTYPE html>
<html>
<head>
	<title>Confirmar Cuenta - Esandex</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	<!-- Hojas de estilo -->
	<link rel="shortcut icon" type="image/x-icon" href="../img/ico.png">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">	
	<style type="text/css">
		body
		{
			border-top: 5px #2980b9 solid;
		}
	</style>
	<!-- Scripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<script type="text/javascript" src="js/analytics.js"></script>
</head>
<body>
	<div class="formulario">
		<h1>Confirmar Cuenta</h1>
		<div id="respuestaConfirmacionCuenta" class="cajaDialogo">
			<img src="../img/loader.gif">
		</div>
		<form id="formConfirmarCuenta" method="post">
			<label>Email</label>
			<input type="email" name="email" value="<?= $_GET['email']?>" readonly>
			<label>Usuario</label>
			<input type="text" name="user" placeholder="Nombre de usuario" >
			<label>Contraseña</label>
			<input type="password" name="password" placeholder="Contraseña">
			<input  id="confirmarCuenta" class="botonFormulario" value="Entrar" type="submit">
		</form>
	</div>
	<div class="opcionCuenta">
		<p>¿No tienes una cuenta?</p>
		<a href="../login">Iniciar Sesión</a>
	</div>
</body>
</html>