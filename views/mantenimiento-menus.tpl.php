<?php require 'template/inicio.php'; ?>
	


<div class="secciones">
    <div class="datos">
         <div>
          <div>ID</div>
          <p>1</p>
         </div>
         <div>
          <div>DESCRIPCION:</div>
          <p>TIPO DE SERVICIOS</p>
        </div>
         <div>
          <div>ENLACE:</div>
          <p>www.google.com</p>
        </div>
        <div>
          <div>OPCIONES</div>
          <p>dos</p>
        </div>
    </div>
    <div class="opcion1">
      <div class="borrar">
      </div>
    </div>
    <div class="opcion2">
       <div class="agregar">
      </div>
    </div>
   </div>	
	<!-- Cajas de dialogo -->
	<?php require 'src/form/frm_nuevo_menu.php' ?>
	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewMenu')"></div>
<?php require 'template/fin.php'; ?>