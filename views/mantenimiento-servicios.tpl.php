<?php 
	require 'querys/control.php';
	require 'querys/conexion.php';
	require 'querys/querys.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>	Mantenimiento menus - CreativePMG</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	 <!-- Hojas de estilo -->
	<link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<style type="text/css">
	    body
	    {
	      border-top: 0!important;          
	    }
	    #respuestaUbicacion
	    {
	        position: fixed;
	        width: 100%;
	        background: #e9e9e9;
	        color: #333;
	        line-height: 25px;
	        height: 25px;
	        font-size: 15px;
	        bottom: 0; 
	    }
	</style>
</head>
<body>
	<?php require 'template/header.html'; ?>
	
	<h4>Nuevo Servicio</h4>
	<div id="respuesta"></div>
	<form id="nuevoMenu" class="formulario" method="post">
		<label>Nombre del Servicio</label>
		<input name="nombre_menu" type="text">
		<label>Link menu</label>
		<input name="link" type="text">
		<input id="botonNuevoMenu" type="submit">
	</form>
	<?php include 'template/footer.html'; ?>
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/analytics.js"></script>
</body>
</html>