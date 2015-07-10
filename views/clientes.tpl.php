<?php require 'template/inicio.php'; ?>
  <div class="buscador">
    <form method="get">
      <div class="bloque">
        <label>Nombre</label>
        <input name="name" type="text">       
      </div>
      
      <input class="boton" type="submit" value="BUSCAR">
    </form>
  </div>
    <?php
      if(empty($_GET['name']))
        {
          $nombre = '%';
        }
        else
        {
          $nombre = $_GET['name'].'%';
        } 
      $lis_clientes = mysql_query("SELECT * FROM clientes AS A
                   LEFT JOIN usuarios AS B
                      ON A.ID_USUARIO = B.ID_USUARIO
                    WHERE A.NOMBRE_CLIENTE LIKE '$nombre'
                   ORDER BY A.NOMBRE_CLIENTE") 
             or die("Error en la consulta.." . mysqli_error($con));
     ?>
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
   
    <div id="respuestaRegister"></div>
    <!-- Nuevo cliente -->
    <?php require 'src/form/frm_nuevo_cliente.php' ?>
    <!-- Boton Nuevo cliente -->  
    <div class="botonNuevo" onclick="mostraCajaDialogo('#dNewCliente')"></div>

 <?php require 'template/fin.php'; ?>