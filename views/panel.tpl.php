<?php 
	require 'template/inicio.php'; 
	 $lis_clientes = mysql_query("SELECT * FROM clientes ") 
             or die("Error en la consulta.." . mysqli_error($con));
	$countClientes = mysql_num_rows($lis_clientes);
?>
	
	<p class="mensajeParaElUsuario">Bienvenido <strong><?= $arrayUsuario['USER']; ?></strong>, estamos trabajando para habilitarte las aplicaciones que tenemos para ti, se paciente y vuelve luego. </p>

	
	<div class="contenedorIcono">		
		<div class="iconoClientes"></div>
		<div class="inf">
			<div class="numeroClientes"> <?= $countClientes ?> </div>
			<p>Clientes</p>
		</div>
	</div>
	<div class="contenedorIcono">		
		<div class="iconoOrdenesP"></div>
		<div class="inf">
			<div class="numeroOrden"> <?= $countServPendientes ?> </div>
			<p>Ordenes Pendientes</p>
		</div>
	</div>
	<div class="contenedorIcono">		
		<div class="iconoProductos"></div>
		<div class="inf">
			<div class="numeroProductos"> <?= $countServPendientes ?> </div>
			<p>Total de productos</p>
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