<section class="container">
	<div class="row">
		<h3 class="blue-text">Servicios</h3>
	</div>	
	<div class="row">
	    <form class="col s12" action="buscar" method="post">
	      	<div class="row">
		        <div class="input-field col s12">
		          <input id="phone" name="phone" type="text" class="validate">
		          <label for="phone">Ingrese su Nro. Telefono</label>
		        </div>
	    	</div>
	    	<div class="row">
	    		<div class="input-field col s12">
	    			<input type="submit" class="btn-large" value="Consultar">
	    		</div>
	    	</div>
	    </form>
	</div>
	<?php if($servicio){  $debe = $servicio->TOTAL - $servicio->A_CUENTA ?>
  <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Nro. Servicio: <?= $servicio->ID_ORDEN_SERVICIO ?></span>
              <p>
              	<strong>Cliente: </strong> 
              	<?= $servicio->NOMBRE_CLIENTE ?>
              </p>
              <p>
              	<strong>Detalle: </strong> 
              	<?= $servicio->DETALLE ?>
              </p>
              <div class="row">
              	<div class="col s12 m4 btn">Total: <?= $servicio->TOTAL ?> USD</div>
              	<div class="col s12 m4 btn">A cuenta: <?= $servicio->A_CUENTA ?> USD</div>
              	<div class="col s12 m4 btn">Debe: <?= $debe ?> USD</div>
              </div>
            </div>
            <div class="card-action">
              <a href="#">RECEPCIONADO</a>
            </div>
          </div>
        </div>
  </div> 
  <?php }else{  ?>
    <div class="row">
      <h3 class="blue-text">Lo sentimos no hemos encontrado ningun servicio para este numero</h3>
    </div>  
  <?php } ?>
</section>