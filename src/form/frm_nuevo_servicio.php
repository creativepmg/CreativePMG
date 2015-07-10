<div id="dNewOrdenService" class="popup">
	<div class="cajaDialogo nuevaOrdenServicio">
		<div class="titulo">
			NUEVA ORDEN DE SERVICIO
			<div class="cerrar"></div>
		</div>
		<div class="formulario">
			<form  id="formNotaCliente" class="" method="post">
				<div class="cliente">
					<label>Cliente</label>
					<input id="id_cliente" class="vaciar" name="id_cliente" type="hidden" >
					<input id="nombre_cliente" type="text" class="vaciar" disabled style="text-transform: uppercase; width: 80%; display: inline-block">
					<div class="btn_cliente" onclick="mostraCajaDialogo('#dListaCliente')"></div>		   
				</div>
				
				<label>Observaciones</label>
				<textarea name="detalle"></textarea>
				<label>A cuenta</label>
				<input name="a_cuenta" type="number" value="0.00">
				<input class="botonFormulario" id="btnNotaCliente" type="submit" value="Crear Orden">
			</form>
		</div>
	</div>
</div>