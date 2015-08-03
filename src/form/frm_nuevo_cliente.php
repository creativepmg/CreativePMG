	<div id="dNewCliente" class="popup">
		<div class="cajaDialogo newCliente">
			<div class="titulo">
				NUEVO CLIENTE
				<div class="cerrar"></div>
			</div> 
			<div class="formulario">
				<form id="formInsCliente" method="post">
					<input type="hidden" id="pagina">
					<label>Nombre</label>
					<input id="nombre_cliente" type="text" name="nombre_cliente" class="vaciar">
					<label>Numero Celular</label>
					<input id="numero_cliente" type="number" name="numero_celular" class="vaciar">
					<label>Email</label>
					<input id="email_cliente" type="text" name="email" class="vaciar">
					<input class="botonFormulario" id="btnInsCliente" type="submit" value="Guardar">
				</form>
			</div>
		</div>
	</div>