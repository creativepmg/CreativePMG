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
					<input id="nombre_cliente" type="text" class="vaciar" disabled style="text-transform: uppercase; width: 78%; display: inline-block">
					<div class="btn_cliente" onclick="mostraCajaDialogo('#dListaCliente')"></div>		   
				</div>
				
				<label>Observaciones</label>
				<textarea name="detalle"></textarea>
				<label>A cuenta</label>
				<input name="a_cuenta" type="number" value="0.00">
				<label>Total</label>
				<input name="a_cuenta" type="number" value="0.00">

				<div class="opcion_check">
					<input type="checkbox" id="programacion" name="con_fecha_programada" value="1">
					<label for="programacion">CON FECHA DE ENTREGA</label>
				</div>

				<input type="date" name="fecha_programada" class="fecha_programada">
				
				<input class="botonFormulario" id="btnNotaCliente" type="submit" value="Crear Orden">
			</form>
		</div>
	</div>
</div>