<?php require 'template/inicio.php' ?>
	<?php 
		if(empty($_POST['id_compra']))
		{
			$id_compra = 'null';
			$redirec = '<meta http-equiv="refresh" content="0; url=orden-servicio">';
		}
		else
		{
			$id_compra = $_POST['id_compra'];
			$redirec = '';
		}
		$cabecera_compra	= mysql_query("SELECT A.ID_COMPRA,
												  A.ID_PROVEEDOR,
												  B.ID_PROVEEDOR,
												  B.DESCRIPCION
										    FROM compras			AS A
										    INNER JOIN proveedores 	AS B
										    ON 	B.ID_PROVEEDOR = A.ID_PROVEEDOR						   	  
								   	   		WHERE A.ID_COMPRA  = '$id_compra'") 
					   or die("Error en la consulta.." . mysql_error($con));

		$lis_item_compras 	= mysql_query("SELECT 	A.ID_TIPO_PRODUCTO,
													A.ID_COMPRA,
													A.CANTIDAD,
													A.COSTO,
													B.ID_TIPO_PRODUCTO,
													B.DESCRIPCION
											FROM compra_detalle 		AS A
											INNER JOIN producto_tipo 	AS B
											ON B.ID_TIPO_PRODUCTO = A.ID_TIPO_PRODUCTO
											WHERE A.ID_COMPRA = '$id_compra'") 
							or die("Error en la consulta items.." . mysql_error($con));
		$arrCabecera=mysql_fetch_array($cabecera_compra);
		$id_proveedor = $arrCabecera['ID_PROVEEDOR']
	?>
	<div class="bloque">
		<div class="titulo">
			DETALLE COMPRA
		</div>
		<div class="item">
			<div class="nombre">NOMBRE: </div>
			<p><?= $arrCabecera['DESCRIPCION'] ?></p>
		</div>
	</div>
	<div class="bloque">
		<div class="titulo">
			ITEMS COMPRADOS
		</div>
		<div class="tabla" style="max-width: 100%;">
			<div class="titulos">
				<div class="id">CANT</div>
				<div class="descripcion">DESCRIPCION</div>
				<div class="monto">TOTAL</div>
				<div class="opciones">OPCIONES</div>
			</div>
		<?php while ($arrItemCompra=mysql_fetch_array($lis_item_compras)) {?>
			<div class="item">
				<div class="id"><?= $arrItemCompra['CANTIDAD'] ?></div>
				<div class="descripcion"><?= $arrItemCompra['DESCRIPCION'] ?></div>
				<div class="monto"><?= $arrItemCompra['COSTO'] ?> USD</div>
				<div class="opciones">
					
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<!-- Cajas de dialogo -->
	<div id="dNewItemCompra" class="cajaDialogo">
		<div class="newItemCompra formulario">
			<div class="encabezado">
				NUEVO ITEM COMPRA	
				<div class="cerrar"></div>
			</div>
			<div class="detalles">
				<form id="frmNuevoItemCompra" method="post">
					<input type="hidden" name="id_compra" value="<?= $id_compra ?>">
					<input type="hidden" name="id_proveedor" value="<?= $id_proveedor ?>">
					<label>Tipo producto</label>
					<select name="id_tipo_producto">
						<?php while ($arrProductos=mysql_fetch_array($lis_tipo_productos)) {?>
							<option value="<?= $arrProductos['ID_TIPO_PRODUCTO'] ?>"><?= $arrProductos['DESCRIPCION'] ?></option>
						<?php } ?>
					</select>					
					<label>Cantidad</label>
					<input type="text" name="cantidad" >
					<label>Costo</label>
					<input type="number" name="costo">
					<input id="btnInsItemCompra" type="submit" value="Guardar">
				</form>
			</div>
		</div>
	</div>
	<div class="redirec"><?= $redirec ?></div>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewItemCompra')"></div>
<?php require 'template/fin.php' ?>