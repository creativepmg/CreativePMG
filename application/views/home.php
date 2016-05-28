<!DOCTYPE html>
<html>
    <head>
    	<title>Estado de Orden de Servicio - LatinoPMG</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="template/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="template/css/main.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
		<header>
			<nav class="blue">
			    <div class="nav-wrapper">
			      <a href="#!" class="brand-logo">LatinoPMG</a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			        <li><a href="login" class="btn">Iniciar Sesión</a></li>
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        <li><a href="login" class="btn">Iniciar Sesión</a></li>
			      </ul>
			    </div>
			</nav>
		</header>
		<section class="container">
			<div class="row">
				<h3 class="blue-text">Bienvenido, desde aqui puede consultar el estado de su orden de servicio</h3>
			</div>	
			<div class="row">
			    <form class="col s12">
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
		</section>
		<footer class="page-footer blue">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">LatinoPMG</h5>
                <p class="grey-text text-lighten-4">Empresa relacionada con todo tipo de tecnología y sobre todo dedicados a lo que incluye reparación, compra y venta.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contáctanos</h5>
                <ul>
                  <li class="white-text"><i class="material-icons">phone</i> 3023390742</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Copyright Text
            </div>
          </div>
        </footer>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="template/js/materialize.min.js"></script>
      <script type="text/javascript" src="template/js/main.js"></script>
    </body>
</html>

