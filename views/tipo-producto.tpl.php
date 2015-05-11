<?php require 'template/inicio.php'; ?>
	<!-- Contenido mostrado -->
	<div class="tabla">
		<div class="titulos">
			<div class="id">ID</div>
			<div class="descripcion">DESCRIPCION</div>
		</div>
	<?php while ($arrProductos=mysql_fetch_array($lis_tipo_productos)) {?>
		<div class="item">
			<div class="id"><?= $arrProductos['ID_TIPO_PRODUCTO'] ?></div>
			<div class="descripcion"><?= $arrProductos['DESCRIPCION'] ?></div>
		</div>
	<?php } ?>
	</div>
	<?php include 'forms/producto.form.php' ?>

	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProducto')"></div>
<?php require 'template/fin.php'; ?>