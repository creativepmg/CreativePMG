<?php include('control.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<meta charset="UTF-8" />
</head>
<body>
	<h1>Bienvenido <?= $_SESSION['username'] ?></h1>
	<a href="salir.php">Cerrar Sesión</a>
</body>
</html>