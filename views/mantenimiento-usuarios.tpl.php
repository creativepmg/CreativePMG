<?php 
  require 'querys/control.php';
  require 'querys/conexion.php';
  require 'querys/querys.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <title> Mantenimiento menus - CreativePMG</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="HandheldFriendly" content="true">
   <!-- Hojas de estilo -->
  <link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />
  <link rel="stylesheet" type="text/css" href="../css/normalize.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
  <body>
    <?php require 'template/header.html'; ?>

      <div class="listaUsuarios">
        <?php while ($arrUsuarios=mysql_fetch_array($usuarios)) {?>
          <div class="tarjeta">
            <div id="idUsuario" style="display: none;"><?= $arrUsuarios['ID_USUARIO']; ?></div>
            <div class="titulo"><?= $arrUsuarios['USER']; ?></div>
            <div class="imagen">
              <img src="/img/avatares/<?= $arrUsuarios['AVATAR_USUARIO']; ?>">
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
      <div class="botonNuevo"></div>
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

        <!-- Nuevo usuario -->
      <div id="respuestaRegister"></div>

      <div class="popup popNuevoUsuario">
        <div class="tarjeta nuevoUsuario">
          <div class="titulo">NUEVO USUARIO
            <div class="cerrar cerrarPopups"></div>
          </div>
          <form class="formulario" id="formRegister" method="post">
            <label>Email</label>
            <input type="text" name="email" class="vaciar">
            <input class="botonFormulario" id="Register" type="submit" value="Enviar Invitacion">
          </form>
        </div>
      </div>

      <div class="botonNuevo"></div>  
    </div>
  <?php include 'template/footer.html'; ?>
  <!-- Scripts -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/analytics.js"></script>
  </body>
</html>