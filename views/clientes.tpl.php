<?php 
  require 'querys/control.php';
  require 'querys/conexion.php';
  require 'querys/querys.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  <title> Clientes - Esandex</title>
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

    <!-- Lista de Clientes -->
    <?php while ($arrClientes=mysql_fetch_array($lis_clientes)) {?>
      <div class="tarjeta">
        <div id="idUsuario" style="display: none;"><?= $arrClientes['ID_CLIENTE']; ?></div>
        <div class="titulo"><?= $arrClientes['USER']; ?></div>
        
        <div class="detalles">
          <p class="email"><?= $arrClientes['NOMBRE_CLIENTE']; ?></p>
          <p class="email"><?= $arrClientes['EMAIL_CLIENTE']; ?></p>
          <p class="email"><?= $arrClientes['NUMERO_CELULAR']; ?></p>
        </div>
        <div class="social"></div>
        <div class="opciones">
          <div class="agregarMenus" onclick="asignarMenu(this);"></div>
        </div>   
      </div>
    <?php } ?>

    <div class="botonNuevo"></div>
    <div id="respuesta"></div>
   
    <!-- Nuevo cliente -->
    <div id="respuestaRegister"></div>
    <div class="popup popNuevoUsuario">
      <div class="tarjeta nuevoCliente">
        <div class="titulo">NUEVO USUARIO
          <div class="cerrar cerrarPopups"></div>
        </div>
        <form class="formulario" id="formInsCliente" method="post">
          <label>Nombre</label>
          <input type="text" name="nombre_cliente" class="vaciar">
          <label>Numero Celular</label>
          <input type="number" name="numero_celular" class="vaciar">
          <label>Email</label>
          <input type="text" name="email" class="vaciar">
          <input class="botonFormulario" id="btnInsCliente" type="submit" value="Guardar">
        </form>
      </div>
    </div>
    <div class="botonNuevo"></div>  

  <?php require 'template/footer.html' ?>
  <!-- Scripts -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/analytics.js"></script>
  </body>
</html>