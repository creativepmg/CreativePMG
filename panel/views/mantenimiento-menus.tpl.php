<?php require 'template/inicio.php'; ?>

  <?php while ($arrMenus=mysqli_fetch_array($lis_menus)) {?>
    <div class="secciones">
        <div class="datos">
          <div>
            <div class="titulo">ID</div>
            <p><?= $arrMenus['ID_MENU'] ?></p>
          </div>
          <div>
            <div class="titulo">DESCRIPCION:</div>
            <p><?= $arrMenus['DESCRIPCION'] ?></p>
          </div>
          <div>
            <div class="titulo">ENLACE:</div>
            <a href="http://<?= $servidor.$arrMenus['URL'] ?>">http://<?= $servidor.$arrMenus['URL'] ?></a>
          </div>
        </div>

        <div class="opcion1">
          <div class="borrar"></div>
        </div>
        <div class="opcion2">
           <div class="agregar"></div>
        </div>
    </div>	
  <?php } ?>

	<!-- Cajas de dialogo -->
	<?php require 'src/form/frm_nuevo_menu.php' ?>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewMenu')"></div>
<?php require 'template/fin.php'; ?>