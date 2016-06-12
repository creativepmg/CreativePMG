<nav class="blue darken-2">
	<div class="nav-wrapper">
	  <div class="col s12">
	    <a href="<?= base_url() ?>" class="breadcrumb">Inicio</a>
	    <a href="#!" class="breadcrumb">Clientes</a>
	  </div>
	</div>
</nav>
<section class="container">
	<div class="row">
		<?php if($clientes != false){ foreach ($clientes->result() as $cliente) { ?>	
	        <div class="col s12 m6">
	          <div class="card">
	            <div class="card-content ">
	              <span class="card-title"><?= $cliente->NOMBRE_CLIENTE ?></span>
	              <p class="valign-wrapper">
	              	<i class="material-icons valign">email</i>
	              	<span class="valign"><?= $cliente->EMAIL_CLIENTE ?></span>
	              </p>
	              <p class="valign-wrapper">
	              	<i class="material-icons valign">phone</i>
	              	<span class="valign"><?= $cliente->NUMERO_CELULAR ?></span>
	              </p>
	              <p class="valign-wrapper">
	              	<i class="material-icons valign">event</i>
	              	<span class="valign"><?= $cliente->FECHA_REGISTRO ?></span>
	              </p>
	            </div>
	            <div class="card-action">
	              <a href="#!" onclick="alert('Opción en desarrollo')">editar</a>              
	            </div>
	          </div>
	        </div>
		<?php } ?>
	</div>
	<?php }else{ ?>
		<h4>No hemos encontrado ningun cliente, empieza agregando el primero.</h4>
	<?php } ?>
</section>
<div class="fixed-action-btn">
	<a class="btn-floating btn-large waves-effect waves-light blue lighten-1" href="clientes/nuevo">
		<i class="material-icons">add</i>
	</a>
</div>