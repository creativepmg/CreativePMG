<div id="acceso_menus" class="popup">
  <div class="cajaDialogo acceso_menus">
    <div class="titulo">
      ACCESO 
      <div class="cerrar"></div>
    </div>
    <form id="formMenuUsuarios" class="formulario" class="formularioPopup" method="post">
      <input id="inputIdUsuario" class="vaciar" name="id_usuario" type="hidden" value="">
      <div class="listaMenus">
        <?php while ($arrMenus=mysqli_fetch_array($lis_menus)) {?>
          <div class="opcionMenu">
            <input type="checkbox" id="Menu<?= $arrMenus['ID_MENU']; ?>" name="id_menu[]" value="<?= $arrMenus['ID_MENU']; ?>" />
            <label for="Menu<?= $arrMenus['ID_MENU']; ?>"><?= $arrMenus['DESCRIPCION']; ?></label>
          </div>
        <?php } mysqli_data_seek($lis_menus, 0);?>      
      </div>
      <input id="actualizarMenusUsuarios" class="botonFormulario" type="submit" value="Actualizar" >
    </form>
  </div>
</div>