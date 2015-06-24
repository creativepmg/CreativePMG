<?php require 'template/inicio.php'; ?>
	
	<p class="mensajeParaElUsuario">Bienvenido <strong><?= $arrayUsuario['USER']; ?></strong>, estamos trabajando para habilitarte las aplicaciones que tenemos para ti, se paciente y vuelve luego. </p>

	<div class="estadisticas">		
		<a class="item">		
			<div class="titulo"></div>
			<div class="cantidad"></div>
		</a>
	</div>
	
	<div class="contenedorIcono">
		
		<div class="iconoClientes"></div>
		<div class="inf">
			<div class="numeroItem"> 100 </div>
			<p>Clientes</p>
		</div>
	</div>
	<div class="contenedorIcono">
		
		<div class="iconoOrdenesP"></div>
		<div class="inf">
			<div class="numeroOrden"> 100 </div>
			<p>pendientes</p>
		</div>
	</div>
	

	<!-- Footer -->
	<script type="text/javascript">
		function pepe()
	      {
	        console.log('se ejecuto la funcion');
	        if($('.menu ul li').length == 0)
	        {
	          console.log('no hay menus asignados');
	        } 
	        else
	        {
	          $('.mensajeParaElUsuario').css('display', 'none');
	          console.log('parece tener menus');          
	        }
	      }
	   
      pepe();
      
    </script>
 <?php require 'template/fin.php'; ?>