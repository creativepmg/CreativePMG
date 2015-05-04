<?php require 'template/inicio.php' ?>
	<!-- Contenido mostrado -->
	<div class="tabla">
		<div class="titulos">
			<div class="id">ID</div>
			<div class="descripcion">DESCRIPCION</div>
		</div>
	<?php while ($arrProveedores=mysql_fetch_array($lis_proveedores)) {?>
		<div class="item">
			<div class="id"><?= $arrProveedores['ID_PROVEEDOR'] ?></div>
			<div class="descripcion"><?= $arrProveedores['DESCRIPCION'] ?></div>
		</div>
	<?php } ?>
	</div>
	<?php include 'forms/proveedor.form.php' ?>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProveedor')"></div>
<?php require 'template/fin.php' ?>