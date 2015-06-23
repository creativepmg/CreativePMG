<?php require 'template/inicio.php'; ?>

      <div class="listaUsuarios">
        <?php while ($arrUsuarios=mysql_fetch_array($usuarios)) {?>
          <div class="tarjeta">
            <div id="idUsuario" style="display: none;"><?= $arrUsuarios['ID_USUARIO']; ?></div>
            <div class="titulo"><?= $arrUsuarios['USER']; ?></div>
            <div class="imagen">
              <img src="img/avatares/<?= $arrUsuarios['AVATAR_USUARIO']; ?>">
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
      
      <div id="respuestaUsuarioMenu"></div>
       <!-- Acceso -->
      <div class="popup popMenus" style="display: none;">
        <div class="tarjeta acceso">
          <div class="titulo">ACCESO <?= $arrUsuarios['USER']; ?>
            <div class="cerrar cerrarPopups"></div>
          </div>
          <form id="formMenuUsuarios" class="formulario" class="formularioPopup" method="post">
            <input id="inputIdUsuario" class="vaciar" name="id_usuario" type="hidden" value="">
            <div class="listaMenus">
              <?php while ($arrMenus=mysql_fetch_array($lis_menus)) {?>
                <div class="opcionMenu">
                  <input type="checkbox" id="Menu<?= $arrMenus['ID_MENU']; ?>" name="id_menu[]" value="<?= $arrMenus['ID_MENU']; ?>" />
                  <label for="Menu<?= $arrMenus['ID_MENU']; ?>"><?= $arrMenus['DESCRIPCION']; ?></label>
                </div>
              <?php } mysql_data_seek($lis_menus, 0);?>      
            </div>
            <input id="actualizarMenusUsuarios" class="botonFormulario" type="submit" value="Actualizar" >
          </form>
        </div>
      </div>

      <!-- Nuevo usuario -->
      <?php require 'src/form/frm_nuevo_usuario.php' ?>

     
     <div class="botonNuevo" onclick="mostraCajaDialogo('#dNewUsuario')"></div>  
 
<?php require 'template/fin.php'; ?>