<?php require 'template/inicio.php'; ?>
	
	<p class="mensajeParaElUsuario">Bienvenido <strong><?= $arrayUsuario['USER']; ?></strong>, estamos trabajando para habilitarte las aplicaciones que tenemos para ti, se paciente y vuelve luego. </p>

	<!--<div class="deuda">
        <p>Tu estado de cuenta es</p>   
        <div class="montoDeuda"> S/. <span class="monto"> <?= totalDeudaUsuario($email) ?> </span></div>
    </div>
    <div class="listaDeudas">
      <?php while ($reg=mysql_fetch_array($deudaUsuario)) {?>
        <div class="item">
          <?php $date = date_create($reg['FECHA_REGISTRO']); ?>      
          <div class="fecha"><?= date_format($date, 'd M Y') ?></div>
          <div class="detalle"><?= $reg['DETALLE']  ?></div>
          <div class="monto">S/. <?= $reg['MONTO']  ?></div>
        </div>
      <?php } ?>
    </div>-->

    <!-- Lista de servicios -->
    <div class="listaNotas">
		<?php while ($arrServi=mysql_fetch_array($lis_orden_serv)) {?>
		<div class="item">
			<div class="id_orden_servicio">Numero de Orden: <?= $arrServi['ID_ORDEN_SERVICIO'] ?></div>
		 	<?php $date = date_create($arrServi['FECHA_REGISTRO_ORDEN']) ?> 
		 	<div class="fecha"><?= date_format($date, 'd M Y') ?></div>     
			<div class="cliente"><?= $arrServi['NOMBRE_CLIENTE'] ?></div>
			<div class="detalle"><?= $arrServi['DETALLE'] ?></div>
			<form id="frmFinalizado" method="post">
				<input name="id_orden_servicio" type="hidden" value="<?= $arrServi['ID_ORDEN_SERVICIO'] ?>">
			</form>
			<div class="opcionesItem">
				<div class="listo" id="btnListo" title="Marcar como terminado" onclick="updOrdenFinalizada(this);"></div>
			</div>
			<div class="montos">
				<?php  
					$acuenta = $arrServi['A_CUENTA'];
					$total = $arrServi['TOTAL'];
					$deuda = $total - $acuenta;
				?>
				<div class="a_cuenta">
					<p>A cuenta</p>
					<p><?= $acuenta." USD" ?></p>
				</div>
				
				<div class="debe">
					<p>Debe</p>
					<p><?= number_format($deuda, 2)." USD" ?></p>
				</div>
				<div class="monto_total">
					<p>Monto Total</p>
					<p><?= $total." USD" ?></p>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	

	<div id="respuesta"></div>

	<!-- NUEVA SERVICIO -->
	<div class="popup popNuevoUsuario">
		<div class="tarjeta nuevoServicio">
		  <div class="titulo">SERVICIO CLIENTE
		    <div class="cerrar cerrarPopups"></div>
		  </div>
		  <form  id="formNotaCliente" class="formulario" method="post">
		  	<label>Cliente</label>
		    <input id="id_cliente" class="vaciar" name="id_cliente" type="hidden" >
		  	<input id="nombre_cliente" type="text" class="vaciar" disabled style="text-transform: uppercase; width: 80%; display: inline-block">
		  	<div class="btn_cliente" onclick="guardadoLocal();"></div>
		    <label>Detalle</label>
		    <textarea name="detalle"></textarea>
		    <label>A cuenta</label>
		    <input name="a_cuenta" type="number" >
		    <label>Monto Total</label>
		    <input name="monto_total" type="number" >
		    <input class="botonFormulario" id="btnNotaCliente" type="submit" value="Añadir Nota">
		  </form>
		</div>
	</div>

	<!--  -->
	<div class="cuadro_clientes">
		<div class="encabezado">
			<p class="titulo">CLIENTES</p>
			<div class="cerrar"></div>
		</div>
		<div class="listaClientes">
			 
		    	<?php while ($arrClientes=mysql_fetch_array($lis_clientes)) {?>
		    		<div class="item" onclick="guardadoLocal(this);">
						<div class="avatar">
							<img src="">
						</div>
						<div class="descripcion">
							<p id="id_cliente" class="id_cliente"><?= $arrClientes['ID_CLIENTE'] ?></p>
							<p id="nombre_cliente"><?= $arrClientes['NOMBRE_CLIENTE'] ?></p>
						</div>
					</div>
		    
		    	<?php } ?>
		</div>
		<div id="btn_new_cliente" class="btn_nuevo">NUEVO CLIENTE</div>
	</div>
	<!--  -->
	<!-- Nuevo Cliente  -->
	 <div class="popup popNuevoCliente">
      <div class="tarjeta nuevoCliente">
        <div class="titulo">NUEVO CLIENTE
          <div class="cerrar cerrarPopups"></div>
        </div> 
        <form class="formulario" id="formInsCliente" method="post">
          <label>Nombre</label>
          <input type="text" name="nombre_cliente" class="vaciar">
          <label>Numero Celular</label>
          <input type="number" name="numero_celular" class="vaciar">
          <label>Email</label>
          <input type="text" name="email" class="vaciar">
          <input class="botonFormulario" id="btnInsCliente" type="submit" value="Guardar">
        </form>
      </div>
    </div>
	<!--  -->
<!-- nueva Pre orden -->
	<div class="popup nuevaPreOrden">
		<div class="tarjeta newPreOrder">
		  <div class="titulo">PRE SERVICIO
		    <div class="cerrar cerrarPopups"></div>
		  </div>
		  <form  id="frmPreOrden" class="formulario" method="post">
		  	<label>Cliente</label>
		    <input type="text" class="vaciar" name="nombre_cliente">
		    <label>Numero</label>
		    <input type="number" class="vaciar" name="numero_celular">
		    <label>Detalle</label>
		    <textarea name="detalle" class="vaciar"></textarea>		    
		    <input class="botonFormulario" id="btnPreOrden" type="submit" value="Nueva Pre Orden">
		  </form>
		</div>
	</div>

	<div id="nuevoServicio" class="botonNuevo"></div>  
	<div id="nuevoPreServicio" class="botonNuevo"></div>  

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
	    function tipoUsuario()
	    {
	    	var userCategori = <?= $userCategori ?>;
	    	console.log('La categoria del usuario es ' + userCategori);
	    	if (userCategori == '2') {
	    		$('#nuevoServicio').css('display', 'none');
	    	};
	    	if (userCategori == '1') {
	    		$('#nuevoPreServicio').css('display', 'none');
	    	};
	    }
      pepe();
      tipoUsuario();
    </script>
 <?php require 'template/fin.php'; ?>