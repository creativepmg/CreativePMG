<?php require 'template/inicio.php'; ?>

	<div class="cabecera">
		<div class="nroOrden">Nro:  <?= $_POST['nroOrden'] ?></div>
		<div class="cliente">Cliente: </div>
	</div>

	<div class="detalle-servicios">
		<div class="titulos">
			<div class="cantidad">CANT</div>
			<div class="detalle">DETALLE</div>
			<div class="precio">PRECIO</div>
		</div>	
	
		<div class="item">
			<div class="cantidad">CANT</div>
			<div class="detalle">DETALLE</div>
			<div class="precio">PRECIO</div>
		</div>		
	</div>
<?php require 'template/fin.php'; ?>