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
	$lisDetalleOrden	= mysql_query("SELECT * FROM detalle_orden_servicio								   	  
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
	<div class="cabecera">
		<div class="nroOrden">Nro Orden: <?= $arrOrden['ID_ORDEN_SERVICIO'] ?> </div>
		<div class="cliente">Cliente: <?= $arrOrden['NOMBRE_CLIENTE'] ?></div>
	</div>
	<div class="boton">AGREGAR DETALLE</div>
	<div class="totalDetalles">Total Items: <?= $countDetalles ?></div>
	<div class="detalle">
		<div class="titulos">
			<div class="cantidad">CANT</div>
			<div class="detalle">DETALLE</div>
			<div class="precio">PRECIO</div>
		</div>	
	
	<?php while ($arrOrdenDetalle=mysql_fetch_array($lisDetalleOrden)) {?>
		<div class="item">
			<div class="cantidad">CANT</div>
			<div class="detalle">DETALLE</div>
			<div class="precio">PRECIO</div>
		</div>	

	<?php } ?>
	</div>

	<div class="redirec"><?= $redirec ?></div>
<?php require 'template/fin.php'; ?>