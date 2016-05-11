<!-- Cajas de dialogo -->
      <div id="dNewMenu" class="cajaDialogo">
        <div class="newMenu formulario">
          <div class="encabezado">
            NUEVO MENU  
            <div class="cerrar"></div>
          </div>
          <div class="detalles">
            <form id="formMenuUsuarios" method="post">
              <input id="inputIdUsuario" class="vaciar" name="id_usuario" type="hidden" value="">
              <div class="listaMenus">
              <?php while ($arrMenus=mysql_fetch_array($menu)) {?>
                <div class="opcionMenu">
                  <input type="checkbox" id="Menu<?= $arrMenus['ID_MENU']; ?>" name="id_menu[]" value="<?= $arrMenus['ID_MENU']; ?>" />
                  <label for="Menu<?= $arrMenus['ID_MENU']; ?>"><?= $arrMenus['DESCRIPCION']; ?></label>
                </div>
              <?php } mysql_data_seek($menu, 0);?>      
            </div>
            <input id="actualizarMenusUsuarios" class="botonFormulario" type="submit" value="Actualizar" >
            </form>
          </div>
        </div>
      </div>