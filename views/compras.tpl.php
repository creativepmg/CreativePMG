<?php require 'template/inicio.php' ?>
	<!-- Contenido mostrado -->
	<div class="tabla">
		<div class="titulos">
			<div class="id">ID</div>
			<div class="descripcion">DESCRIPCION</div>
			<div class="monto">TOTAL</div>
			<div class="opciones">OPCIONES</div>
		</div>
	<?php while ($arrCompras=mysql_fetch_array($lis_compras)) {?>
		<div class="item">
			<div class="id"><?= $arrCompras['ID_COMPRA'] ?></div>
			<div class="descripcion"><?= $arrCompras['DESCRIPCION'] ?></div>
			<div class="monto"><?= $arrCompras['MONTO_TOTAL'] ?> USD</div>
			<div class="opciones">
				<form action="compra-detalle" method="post">
					<input type="hidden" name="id_compra" value="<?= $arrCompras['ID_COMPRA'] ?>">
					<input class="mas" type="submit" value="">
				</form>
			</div>
		</div>
	<?php } ?>
	</div>
	<!-- Cajas de dialogo -->
	<div id="dNewCompra" class="cajaDialogo">
		<div class="newCompra formulario">
			<div class="encabezado">
				NUEVA COMPRA	
				<div class="cerrar"></div>
			</div>
			<div class="detalles">
				<form id="frmNuevaCompra" method="post">
					<label>Escoge el proveedor</label>
					<select name="id_proveedor">
						<?php while ($arrProveedores=mysql_fetch_array($lis_proveedores)) {?>
							<option value="<?= $arrProveedores['ID_PROVEEDOR'] ?>"><?= $arrProveedores['DESCRIPCION'] ?></option>
						<?php } ?>
					</select>
					<label>Fecha compra</label>
					<input name="fecha_compra" type="date" value="">
					<input id="btnInsCompra" type="submit" value="Guardar">
				</form>
			</div>
		</div>
	</div>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewCompra')"></div>
<?php require 'template/fin.php' ?>