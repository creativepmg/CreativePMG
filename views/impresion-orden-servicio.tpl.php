<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	<style type="text/css">
		.ticket
		{
			width: 300px;
			padding: 5px;
			margin: 0 auto;
			font-size: 14px;
		}
		.nroOrden
		{
			text-align: right;
		}
		.logo
		{
			width: 180px;
			height: 70px;
			margin: 0 auto;
			display: block;
		}
		.detalleOrden
		{
			margin-top: 10px;
			padding-bottom: 5px;
		}
		.detalleOrden .titulos
		{
			border-bottom: 1px #333 solid; 
			margin-bottom: 5px;
		}
		.detalleOrden .item
		{
			margin: 5px 0;
		}
		.totales
		{
			border-top: 1px #333 solid;
			text-align: right;
			padding: 5px 10px 0 0;
		}
		.totales div,
		.item div,
		.titulos div
		{
			display: inline-block;
		}
		.totales .cantidad,
		.titulos .cantidad,
		.item .cantidad
		{
			width: 45px;
			text-align: center;
			vertical-align: top;
		}
		.totales .descripcion,
		.titulos .descripcion,
		.item .descripcion
		{
			width: 160px;
			vertical-align: top;
			text-transform: uppercase;
		}
		.titulos .monto,
		.totales .monto,
		.item .monto
		{
			width: 70px;
			text-align: right;
			vertical-align: top;
		}
	</style>
</head>
<body>
	<div class="ticket">
		<img class="logo" src="../img/logo.png" />
		<div class="cabeceraOrden">
			<div class="nroOrden">N° Orden: 1</div>
			<div class="cliente">Cliente: Jose Luis Rodriguez</div>
		</div>
		<div class="detalleOrden">
			<div class="titulos">
				<div class="cantidad">CANT</div>
				<div class="descripcion">DESCRIPCION</div>
				<div class="monto">MONTO</div>
			</div>
			<div class="item">
				<div class="cantidad">1</div>
				<div class="descripcion">PANTALLA NEXUS 4</div>
				<div class="monto">50 USD</div>
			</div>
			<div class="item">
				<div class="cantidad">1</div>
				<div class="descripcion">PANTALLA NEXUS 7 </div>
				<div class="monto">2000 USD</div>
			</div>
			<div class="item">
				<div class="cantidad">1</div>
				<div class="descripcion">SERVICIO CAMBIO DE PANTALLA, BACK COVER Y BOTON DE ENCENDIDO IPHONE  </div>
				<div class="monto">50 USD</div>
			</div>
		</div>
		<div class="totales">
			<div>Total</div>
			<div class="monto">2100 USD</div>
		</div>
	</div>
</body>
</html>