<?php require 'template/inicio.php' ?>
	<!-- Contenido mostrado -->
	<?php while ($arrProductos=mysql_fetch_array($lis_proveedores)) {?>
		<div class="tarjeta">
	        <div id="idUsuario" style="display: none;"></div>
	        <div class="titulo"></div>
	        
	        <div class="detalles">
	          <p><?= $arrProductos['DESCRIPCION']; ?></p>
	         
	        </div>
	        <div class="social"></div>
	        <div class="opciones">
	          <div class="agregarMenus" onclick="asignarMenu(this);"></div>
	        </div>   
      </div>
	<?php } ?>
	<!-- Cajas de dialogo -->
	<div id="dNewProveedor" class="cajaDialogo">
		<div class="newProveedor formulario">
			<div class="encabezado">
				NUEVO PROVEEDOR	
				<div class="cerrar"></div>
			</div>
			<div class="detalles">
				<form id="nuevoProveedor">
					<label>Descripcion</label>
					<input name="descripcion" type="text" class="vaciar">
					<input name="id_user" type="hidden" value="<?= $userId ?>">
					<input id="btnInsProveedor" type="submit" value="Guardar">
				</form>
			</div>
		</div>
	</div>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProveedor')"></div>
<?php require 'template/fin.php' ?>