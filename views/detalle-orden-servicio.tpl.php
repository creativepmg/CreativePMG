<?php require 'template/inicio.php'; ?>
<?php 
	if(empty($_GET['nroOrden']))
	{
		$id_orden = 'null';
		$redirec = '<meta http-equiv="refresh" content="0; url=orden-servicio">';
	}
	else
	{
		$id_orden = $_GET['nroOrden'];
		$redirec = '';
	}
	$lisDetalleOrden	= mysql_query("SELECT 	A.ID_PRODUCTO,
												B.ID_PRODUCTO,
												B.ID_TIPO_PRODUCTO,
												C.ID_TIPO_PRODUCTO,
												C.DESCRIPCION,
												C.PRECIO_VENTA
										FROM orden_servicio_detalle AS A
										INNER JOIN producto_stock 	AS B
											ON B.ID_PRODUCTO = A.ID_PRODUCTO
										INNER JOIN producto_tipo 	AS C
											ON C.ID_TIPO_PRODUCTO = B.ID_TIPO_PRODUCTO
								   	   WHERE A.ID_ORDEN_SERVICIO  = '$id_orden'") 
					   		or die("Error en la consulta.." . mysql_error($con));	

	$lis_not_clientes	= mysql_query("SELECT * FROM orden_servicio AS A
								   	   LEFT JOIN clientes 			AS B
								   		ON A.ID_CLIENTE 	= B.ID_CLIENTE
								   	   WHERE A.ID_ORDEN_SERVICIO  = '$id_orden'
								   ORDER BY A.FECHA_REGISTRO_ORDEN DESC") 
					   or die("Error en la consulta.." . mysql_error($con));
	$arrOrden=mysql_fetch_array($lis_not_clientes);
	$countDetalles = mysql_num_rows($lisDetalleOrden);
?>
	<div class="descripciones">
		<div class="nroOrden">
			<div>Nro Orden: </div>
			<p>	<?= $arrOrden['ID_ORDEN_SERVICIO'] ?> </p>
		</div>
		<div class="cliente">
			<div>Cliente: </div>
			<p><?= $arrOrden['NOMBRE_CLIENTE'] ?></p>
		</div>
	</div>
	<div class="optDetalle">
		<div class="agregarDetalle" onclick="mostraCajaDialogo('#dElegirProducto')">AGREGAR DETALLE</div>
	</div>
	<div class="totalDetalles">Total Items: <?= $countDetalles ?></div>

	<div class="tabla" style="max-width: 100%;">
			<div class="titulos">
				<div class="id">CANT</div>
				<div class="descripcion">DESCRIPCION</div>
				<div class="monto">TOTAL</div>
			</div>
		<?php while ($arrOrdenDetalle=mysql_fetch_array($lisDetalleOrden)) {?>
		<div class="item">
			<div class="id"><?= '1' ?></div>
			<div class="descripcion"><?= $arrOrdenDetalle['DESCRIPCION'] ?></div>
			<div class="monto"><?= $arrOrdenDetalle['PRECIO_VENTA'] ?></div>
		</div>
	<?php } ?>
		</div>



	<!-- ESCOGER PRODUCTO -->
	<div id="dListaProducto" class="cajaDialogo">
		<div class="lisProducto formulario">
			<div class="encabezado">
				PRODUCTOS
				<div class="cerrar"></div>
			</div>
			<div class="lista">			 
			    	<?php while ($arrProductos=mysql_fetch_array($lis_productos)) {?>
			    		<div class="item" onclick="guardadoLocalProducto(this);">
							<div class="avatar">
								<img src="">
							</div>
							<div class="descripcion">
								<p id="id_servicio" class="id_cliente"><?= $arrOrden['ID_ORDEN_SERVICIO'] ?></p>
								<p id="id_producto" class="id_cliente"><?= $arrProductos['ID_PRODUCTO'] ?></p>
								<p id="nombre_cliente"><?= $arrProductos['DESCRIPCION'] ?></p>
								<p class="proveedor">Proveedor:  <?= $arrProductos['DESCRIPCION_PROVEEDOR'] ?></p>
							</div>
						</div>		    
			    	<?php } ?>
			</div>
			
		</div>
	</div>
	<!--  -->


	<!-- ESCOGER PRODUCTO -->
	<div id="dElegirProducto" class="cajaDialogo">
		<div class="formulario">
			<div class="encabezado">
				ELIGE UNA OPCION
				<div class="cerrar"></div>
			</div>
			<div class="detalles">			 
			    <div class="boton" onclick="mostraCajaDialogo('#dListaProducto')">PRODUCTOS</div>
			    <div class="boton" onclick="mostraCajaDialogo('#dManoDeObra')">MANO DE OBRA</div>
			</div>
		</div>
	</div>
	<!--  -->
	<div id="dManoDeObra" class="cajaDialogo">
		<div class="formulario">
			<div class="encabezado">
				MANO DE OBRA
				<div class="cerrar"></div>
			</div>

			<div class="detalles">
				<form method="post">
					<label>Ingrese un monto</label>
					<input type="hidden" name="id_servicio" value="MANO DE OBRA">
					<input type="number" >
					<input type="submit">
				</form>
			</div>
		</div>
	</div>

	<!-- <div class="botonNuevo" onclick="mostraCajaDialogo('#dListaProducto')"></div> -->

	<div class="redirec"><?= $redirec ?></div>
<?php require 'template/fin.php'; ?>