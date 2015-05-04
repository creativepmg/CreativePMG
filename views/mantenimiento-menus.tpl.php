<?php require 'template/inicio.php'; ?>
	
	<div class="tabla">
		<div class="titulos">
			<div class="id">ID</div>
			<div class="descripcion">DESCRIPCION</div>
			<div class="enlace">ENLACE</div>
			<div class="opciones">OPCIONES</div>
		</div>
	<?php  while ($arrMenus=mysql_fetch_array($lis_menus)) { ?>
		<div class="item">
			<div class="id"><?= $arrMenus['ID_MENU'] ?></div>
			<div class="descripcion"><?= $arrMenus['DESCRIPCION'] ?></div>
			<div class="enlace"><?= $arrMenus['URL'] ?></div>
			<div class="opciones">
			</div>
		</div>
	<?php } ?>
	</div>
	<!-- Cajas de dialogo -->
	<div id="dNewMenu" class="cajaDialogo">
		<div class="newMenu formulario">
			<div class="encabezado">
				NUEVO MENU	
				<div class="cerrar"></div>
			</div>
			<div class="detalles">
				<form id="nuevoMenu" method="post">
					<label>Nombre Menu</label>
					<input name="nombre_menu" class="vaciar" type="text">
					<label>Link menu</label>
					<input name="link" class="vaciar" type="text">
					<input id="botonNuevoMenu" type="submit">
				</form>
			</div>
		</div>
	</div>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewMenu')"></div>
<?php require 'template/fin.php'; ?>