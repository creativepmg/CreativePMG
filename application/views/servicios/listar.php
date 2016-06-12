<nav class="blue darken-2">
	<div class="nav-wrapper">
	  <div class="col s12">
	    <a href="<?= base_url() ?>" class="breadcrumb">Inicio</a>
	    <a href="#!" class="breadcrumb">Servicios</a>
	  </div>
	</div>
</nav>
<section class="container">
	
    <div class="row">
		<?php if($servicios){ foreach ($servicios->result() as $servicio) {   
			$debe = $servicio->TOTAL - $servicio->A_CUENTA ?>
	            <div class="col s12 m6">
	              <div class="card">
	                <div class="card-content">
	                  <span class="card-title">Nro. Servicio: <?= $servicio->ID_ORDEN_SERVICIO ?></span>
	                  <p>
	                  	<strong>Cliente: </strong> 
	                  	<?= $servicio->NOMBRE_CLIENTE ?>
	                  </p>
	                  <p>
	                  	<strong>Detalle: </strong> 
	                  	<span><?= $servicio->DETALLE ?></span>
	                  </p>
	                  <p class="valign-wrapper">
	                  	<i class="material-icons valign">event</i>
	                  	<span><?= $servicio->date_register ?></span>
	                  </p>
	                  <div class="row">
	                  	<div class="col s12 m4 btn">Total: <?= $servicio->TOTAL ?> USD</div>
	                  	<div class="col s12 m4 btn">A cuenta: <?= $servicio->A_CUENTA ?> USD</div>
	                  	<div class="col s12 m4 btn">Debe: <?= $debe ?> USD</div>
	                  </div>
	                </div>
	                <div class="card-action">
	                  <a href="#"><?= $servicio->DESCRIPTION ?></a>
	                </div>
	              </div>
	            </div>
	    <?php }  ?>
    </div>
    <?php }else{ ?> 
        <div class="row">
          <h3 class="blue-text">No hemos encontrado ningun servicio, empieza creando uno.</h3>
        </div>  
    <?php } ?>
</section>