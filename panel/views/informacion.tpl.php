<?php require 'template/inicio.php'; ?>
	
	<div class="contenedor_informacion">

		<div class="bloques">
			<h3>NOMBRE BASE DE DATOS</h3>
			<p><?= $db ?></p>
		</div>

		<div class="bloques">
			<h3>NOMBRE DEL SERVIDOR</h3>
			<p><?= $servidor ?></p>
		</div>
	</div>
<?php require 'template/fin.php'; ?>