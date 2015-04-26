<?php require 'template/inicio.php'; ?>
	
	<p class="mensajeParaElUsuario">Bienvenido <strong><?= $arrayUsuario['USER']; ?></strong>, estamos trabajando para habilitarte las aplicaciones que tenemos para ti, se paciente y vuelve luego. </p>

	<div class="estadisticas">		
		<a class="item">		
			<div class="titulo"></div>
			<div class="cantidad"></div>
		</a>
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