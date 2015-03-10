<?php require 'template/inicio.php'; ?>
	
	<h4>Nuevo Menu</h4>
	<div id="respuesta"></div>
	<form id="nuevoMenu" class="formulario" method="post">
		<label>Nombre Menu</label>
		<input name="nombre_menu" class="vaciar" type="text">
		<label>Link menu</label>
		<input name="link" class="vaciar" type="text">
		<input id="botonNuevoMenu" type="submit">
	</form>
	
<?php require 'template/fin.php'; ?>