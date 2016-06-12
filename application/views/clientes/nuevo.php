<nav class="blue darken-2">
	<div class="nav-wrapper">
	  <div class="col s12">
	    <a href="panel" class="breadcrumb">Inicio</a>
	    <a href="<?= base_url() ?>clientes" class="breadcrumb">Clientes</a>
	    <a href="#!" class="breadcrumb">Nuevo</a>
	  </div>
	</div>
</nav>
<section class="container">
	<div class="progress">
    	<div class="indeterminate"></div>
  	</div>
	<div class="row">
		<h4 class="blue-text text-darken-2">Nuevo cliente</h4>
	</div>
	<form action="insertar" method="post">
		<div class="row">
			<div class="input-field col s12 m6">
	          <input id="name" name="name" type="text" class="validate" required>
	          <label for="name">Nombre</label>
	        </div>
	        <div class="input-field col s12 m6">
	          <input id="phone" name="phone" type="text" class="validate" required>
	          <label for="phone">Celular</label>
	        </div>
		</div>
		<div class="row">
	        <div class="input-field col s12">
	          <input id="email" name="email" type="email" class="validate">
	          <label for="email">Email</label>
	        </div>
		</div>
        <div class="row">
	        <div class="input-field col s12">
	          <input type="submit" class="btn-large blue col s12">
	        </div>
        </div>
	</form>
</section>