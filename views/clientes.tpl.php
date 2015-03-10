<?php require 'template/inicio.php'; ?>

    <!-- Lista de Clientes -->
    <?php while ($arrClientes=mysql_fetch_array($lis_clientes)) {?>
      <div class="tarjeta">
        <div id="idUsuario" style="display: none;"><?= $arrClientes['ID_CLIENTE']; ?></div>
        <div class="titulo"><?= $arrClientes['USER']; ?></div>
        
        <div class="detalles">
          <p class="nombre"><?= $arrClientes['NOMBRE_CLIENTE']; ?></p>
          <p class="email"><?= $arrClientes['EMAIL_CLIENTE']; ?></p>
          <p class="mobile"><?= $arrClientes['NUMERO_CELULAR']; ?></p>
        </div>
        <div class="social"></div>
        <div class="opciones">
          <div class="agregarMenus" onclick="asignarMenu(this);"></div>
        </div>   
      </div>
    <?php } ?>

    <div id="respuesta"></div>
   
    <!-- Nuevo cliente -->
    <div id="respuestaRegister"></div>
    <div class="popup popNuevoUsuario">
      <div class="tarjeta nuevoCliente">
        <div class="titulo">NUEVO CLIENTE
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
    <div id="nuevoCliente" class="botonNuevo"></div>

 <?php require 'template/fin.php'; ?>