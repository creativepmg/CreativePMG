<?php require 'template/inicio.php'; ?>
	<!-- Contenido mostrado -->
   
      <!--productos-->

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
        <div class="cantidadcabecera" >Cantidad</div>
        <div class="precioCabecera">precio</div>
      </div>
      
      <div class="cuerpo">
          <div class="id">1</div>
          <div class="cantidad">5</div>
          <div class="precio">20.000</div>
      </div>
            <div>
                <div class="contenedorCrp">
                    <div class="tittle">PROVEEDORES</div>
                    <div  class="tittle">STOCK</div>
                </div>
                <div class="contCuerpo">
                   <div class="blqCuerpo">
                        <div class="proveedores comun">
                          <div >esandex</div>
                          <div >El trebol</div>
                          <div >Exito</div>
                          <div >microsoft</div>
                          <div >apple</div>
                        </div>
                    </div>
                    <div class="blqCuerpo">
                        <div class="comun">
                          <div>50</div>
                          <div>100</div>
                          <div>200</div>
                          <div>300</div>
                          <div>900</div>
                        </div>
                    </div>
              </div>
          </div>
    </div>
  </div>
</div>

<!-- productos-->

 
  <!-- Nuevo Cliente  -->
  <?php require 'src/form/frm_nuevo_producto.php' ?>  

	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProducto')"></div>
<?php require 'template/fin.php'; ?>