<?php require 'template/inicio.php'; ?>
	
	<p class="mensajeParaElUsuario">Bienvenido <strong><?= $arrayUsuario['USER']; ?></strong>, estamos trabajando para habilitarte las aplicaciones que tenemos para ti, se paciente y vuelve luego. </p>

	
	<div class="contenedorIcono">		
		<div class="iconoClientes"></div>
		<div class="inf">
			<div class="numeroClientes"> <?= $countClientes ?> </div>
			<p>Clientes</p>
		</div>
	</div>

	<div id="ver_pendientes" class="contenedorIcono">		
		<div class="iconoOrdenesP"></div>
		<div class="inf">
			<div class="numeroOrden"> <?= $countServPendientes ?> </div>
			<p>Ordenes Pendientes</p>
		</div>
		<form action="orden-servicio" style="display:none;">
			<input type="hidden" name="nroOrden" value="">
			<input type="hidden" name="estado" value="1">
			<input id="btn_ver_pendientes" type="submit">
		</form>
	</div>
	<div class="contenedorIcono">		
		<div class="iconoProductos"></div>
		<div class="inf">
			<div class="numeroProductos"> <?= '0' ?> </div>
			<p>Total de productos</p>
		</div>
	</div>
	
	<div class="agenda">
		<div class="titulo">AGENDA</div>
		<div class="lista">
			<?php while ($arrAgenda=mysql_fetch_array($lis_agenda)) {?>
			<div class="item">
				<p><?= $arrAgenda['DESCRIPCION'] ?></p>
			</div>
			<?php } ?>
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