<?php require 'template/inicio.php'; ?>
	
	<h4>Nuevo Servicio</h4>
	<div id="respuesta"></div>
	<form id="nuevoMenu" class="formulario" method="post">
		<label>Nombre del Servicio</label>
		<input name="nombre_menu" type="text">
		<label>Link menu</label>
		<input name="link" type="text">
		<input id="botonNuevoMenu" type="submit">
	</form>
	
<?php require 'template/fin.php'; ?>