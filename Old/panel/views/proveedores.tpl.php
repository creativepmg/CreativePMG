<?php require 'template/inicio.php' ?>
	<!-- Contenido mostrado -->
	
	<?php while ($arrProveedores=mysqli_fetch_array($lis_proveedores)) {?>
		<div class="tarjeta">
	        <div id="idUsuario" style="display: none;"><?= $arrProveedores['ID_PROVEEDOR'] ?></div>
	        <div class="titulo">ID: <?= $arrProveedores['ID_PROVEEDOR'] ?></div>
	        
	        <div class="detalles">
	          <p class="nombre"><?= $arrProveedores['DESCRIPCION_PROVEEDOR'] ?></p>
	        </div>
	        <div class="social"></div>
	        <div class="opciones" style="display: none;">
	          <div class="agregarMenus" onclick="asignarMenu(this);"></div>
	        </div>   
      	</div>
	<?php } ?>
	
	<?php include 'src/form/frm_nuevo_proveedor.php' ?>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProveedor')"></div>
<?php require 'template/fin.php' ?>