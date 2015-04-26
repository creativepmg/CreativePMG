<?php require 'template/inicio.php'; ?>
	<?php  while ($arrMenus=mysql_fetch_array($lis_menus)) { ?>
	<div>
		<div class="descripcion"><?= $arrMenus['DESCRIPCION'] ?></div>
		<div class="enlace"><?= $arrMenus['URL'] ?></div>
	</div>
	<?php } ?>
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