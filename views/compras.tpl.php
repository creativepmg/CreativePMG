<?php require 'template/inicio.php' ?>
	<!-- Contenido mostrado -->
	<?php while ($arrProveedores=mysql_fetch_array($lis_compras)) {?>
		<div class="tarjeta">
	        <div id="idUsuario" style="display: none;"></div>
	        <div class="titulo"></div>
	        
	        <div class="detalles">
	          <p><?= $arrProveedores['DESCRIPCION']; ?></p>	          
	        </div>
	        <div class="social"></div>
	        <div class="opciones">
	          <div class="agregarMenus" onclick="asignarMenu(this);"></div>
	        </div>   
      </div>
	<?php } ?>
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