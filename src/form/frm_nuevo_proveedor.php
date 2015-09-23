<div id="dNewProveedor" class="popup">
	<div class="cajaDialogo nuevo_proveedor">
		<div class="titulo">
			NUEVO PROVEEDOR	
			<div class="cerrar"></div>
		</div>
		<div class="formulario">
			<form id="frm_nuevo_proveedor" method="post">
				<label>Descripcion</label>
				<input name="descripcion" type="text" class="vaciar">
				<input name="username" type="hidden" value="<?= $user_user ?>">
				<input id="btnInsProveedor" type="submit" value="Guardar">
			</form>
		</div>
	</div>
</div>