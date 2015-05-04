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