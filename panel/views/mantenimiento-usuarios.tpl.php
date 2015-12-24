<?php require 'template/inicio.php'; ?>

      <div class="listaUsuarios">
        <?php while ($arrUsuarios=mysqli_fetch_array($usuarios)) {?>
          <div class="tarjeta">
            <div id="idUsuario" style="display: none;"><?= $arrUsuarios['ID_USUARIO']; ?></div>
            <div class="titulo"><?= $arrUsuarios['USER']; ?></div>
            <div class="imagen">
              <img src="data:image/png;base64,<?= $arrUsuarios['AVATAR_USUARIO']; ?>">
            </div>
            <div class="detalles">
              <p class="email"><?= $arrUsuarios['EMAIL']; ?></p>
            </div>
            <div class="social"></div>
            <div class="opciones">
              <div class="agregarMenus" onclick="asignarMenu(this);"></div>
            </div>   
          </div>
        <?php } ?>
      </div>
      
      <!-- Acceso menus  -->
      <?php require 'src/form/frm_acceso_menus.php' ?>
      <!-- Nuevo usuario -->
      <?php require 'src/form/frm_nuevo_usuario.php' ?>

     
     <div class="botonNuevo" onclick="mostraCajaDialogo('#dNewUsuario')"></div>  
 
<?php require 'template/fin.php'; ?>