<?php require 'template/inicio.php'; ?>
	<!-- Contenido mostrado -->
     <div class="contenedorProductos">
      <div class="contenedorProducto">
        <div class="row2">
          <div class="ContImgProducto">
            <div class="imgProducto ">
                <img  src="data:image/png;base64,<?= $user_avatar ?>">    
                <form action="src/inserts/ins_subir_foto.php" method="post" enctype="multipart/form-data">
                  <label for="avatar">Subir imagen</label>
                  <input type="hidden" name="id_usuario" value="<?= $userId ?>">
                  <input type="file" id="avatar" name="avatar"> 
                  <input id="btn_subir_avatar" type="submit" value="" style="display: none;">
                </form>
            </div>
              <div class="datosImg">
                  <div class="decripcion">
                      DRONE SYMA X5C-1 EXPLORERS
                  </div>
                  <div class="editar">
                      
                  </div>
                  <div class="eliminar">
                      
                  </div>
              </div>
        </div>
    </div>
    <div class="row1">
      <div class="cabecera">
        <div class="idCabecera">id</div>
        <div class="precioCabecera">precio</div>
      </div>
      
      <div class="cuerpo">
          <div class="id">1</div>
          <div class="precio">20.000</div>
      </div>
    </div>
  </div>
</div>

<div class="contenedorProductos">
      <div class="contenedorProducto">
        <div class="row2">
          <div class="ContImgProducto">
            <img src="img/celular.jpg">
              <div class="datosImg">
                  <div class="decripcion">
                      DRONE SYMA X5C-1 EXPLORERS
                  </div>
                  <div class="editar">
                      
                  </div>
                  <div class="eliminar">
                      
                  </div>
              </div>
        </div>
    </div>
    <div class="row1">
      <div class="cabecera">
        <div class="idCabecera">id</div>
        <div class="precioCabecera">precio</div>
      </div>
      
      <div class="cuerpo">
          <div class="id">1</div>
          <div class="precio">20.000</div>
      </div>
    </div>
  </div>
</div>

<div class="contenedorProductos">
      <div class="contenedorProducto">
        <div class="row2">
          <div class="ContImgProducto">
            <img src="img/celular.jpg">
              <div class="datosImg">
                  <div class="decripcion">
                      DRONE SYMA X5C-1 EXPLORERS
                  </div>
                  <div class="editar">
                      
                  </div>
                  <div class="eliminar">
                      
                  </div>
              </div>
        </div>
    </div>
    <div class="row1">
      <div class="cabecera">
        <div class="idCabecera">id</div>
        <div class="precioCabecera">precio</div>
      </div>
      
      <div class="cuerpo">
          <div class="id">1</div>
          <div class="precio">20.000</div>
      </div>
    </div>
  </div>
</div>

<div class="contenedorProductos">
      <div class="contenedorProducto">
        <div class="row2">
          <div class="ContImgProducto">
            <img src="img/celular.jpg">
              <div class="datosImg">
                  <div class="decripcion">
                      DRONE SYMA X5C-1 EXPLORERS
                  </div>
                  <div class="editar">
                      
                  </div>
                  <div class="eliminar">
                      
                  </div>
              </div>
        </div>
    </div>
    <div class="row1">
      <div class="cabecera">
        <div class="idCabecera">id</div>
        <div class="precioCabecera">precio</div>
      </div>
      
      <div class="cuerpo">
          <div class="id">1</div>
          <div class="precio">20.000</div>
      </div>
    </div>
  </div>
</div>

<div class="contenedorProductos">
      <div class="contenedorProducto">
        <div class="row2">
          <div class="ContImgProducto">
            <img src="img/celular.jpg">
              <div class="datosImg">
                  <div class="decripcion">
                      DRONE SYMA X5C-1 EXPLORERS
                  </div>
                  <div class="editar">
                      
                  </div>
                  <div class="eliminar">
                      
                  </div>
              </div>
        </div>
    </div>
    <div class="row1">
      <div class="cabecera">
        <div class="idCabecera">id</div>
        <div class="precioCabecera">precio</div>
      </div>
      
      <div class="cuerpo">
          <div class="id">1</div>
          <div class="precio">20.000</div>
      </div>
    </div>
  </div>
</div>

<div class="contenedorProductos">
      <div class="contenedorProducto">
        <div class="row2">
          <div class="ContImgProducto">
            <img src="img/celular.jpg">
              <div class="datosImg">
                  <div class="decripcion">
                      DRONE SYMA X5C-1 EXPLORERS
                  </div>
                  <div class="editar">
                      
                  </div>
                  <div class="eliminar">
                      
                  </div>
              </div>
        </div>
    </div>
    <div class="row1">
      <div class="cabecera">
        <div class="idCabecera">id</div>
        <div class="precioCabecera">precio</div>
      </div>
      
      <div class="cuerpo">
          <div class="id">1</div>
          <div class="precio">20.000</div>
      </div>
    </div>
  </div>
</div>
  <!-- Nuevo Cliente  -->
  <?php require 'src/form/frm_nuevo_producto.php' ?>  

	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProducto')"></div>
<?php require 'template/fin.php'; ?>