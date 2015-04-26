<?php require 'template/inicio.php'; ?>
<?php 
	if(empty($_POST['nroOrden']))
	{
		$id_orden = 'null';
		$redirec = '<meta http-equiv="refresh" content="0; url=orden-servicio">';
	}
	else
	{
		$id_orden = $_POST['nroOrden'];
		$redirec = '';
	}
	$lisDetalleOrden	= mysql_query("SELECT * FROM orden_servicio_detalle								   	  
								   	   WHERE ID_ORDEN_SERVICIO  = '$id_orden'
								   ORDER BY ITEM DESC") 
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
	<div class="detalle">
		<div class="titulos">
			<div class="cantidad">CANT</div>
			<div class="detalle">DETALLE</div>
			<div class="precio">PRECIO</div>
		</div>	
	
	<?php while ($arrOrdenDetalle=mysql_fetch_array($lisDetalleOrden)) {?>
		<div class="item">
			<div class="cantidad"><?= $arrOrdenDetalle['CANTIDAD'] ?></div>
			<div class="detalle"><?= $arrOrdenDetalle['DETALLE'] ?></div>
			<div class="precio"><?= $arrOrdenDetalle['MONTO'] ?></div>
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
			    		<div class="item" onclick="guardadoLocal(this);">
							<div class="avatar">
								<img src="">
							</div>
							<div class="descripcion">
								<p id="id_cliente" class="id_cliente"><?= $arrProductos['ID_PRODUCTO'] ?></p>
								<p id="nombre_cliente"><?= $arrProductos['DESCRIPCION'] ?></p>
							</div>
						</div>		    
			    	<?php } ?>
			</div>
			<div class="btn_nuevo" onclick="mostraCajaDialogo('#dNewCliente')">NUEVO CLIENTE</div>
		</div>
	</div>
	<!--  -->


	<!-- ESCOGER PRODUCTO -->
	<div id="dElegirProducto" class="cajaDialogo">
		<div class="lisProducto formulario">
			<div class="encabezado">
				ELIGE UNA OPCION
				<div class="cerrar"></div>
			</div>
			<div class="descripcion">			 
			    <div class="boton" onclick="mostraCajaDialogo('#dListaProducto')">PRODUCTOS</div>
			</div>
		</div>
	</div>
	<!--  -->

	<div class="manoDeObra">
		<form method="post">
			<input type="number" >
			<input type="submit">
		</form>
	</div>

	<!-- <div class="botonNuevo" onclick="mostraCajaDialogo('#dListaProducto')"></div> -->

	<div class="redirec"><?= $redirec ?></div>
<?php require 'template/fin.php'; ?>