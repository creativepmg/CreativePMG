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
		    <select name="id_cliente">
		    	<?php while ($arrClientes=mysql_fetch_array($lis_clientes)) {?>
		    		<option value="<?= $arrClientes['ID_CLIENTE'] ?>"><?= $arrClientes['NOMBRE_CLIENTE'] ?></option>
		    	<?php } ?>
		    </select>
		    <label>Detalle</label>
		    <textarea name="detalle"></textarea>
		    <label>A cuenta</label>
		    <input name="a_cuenta" type="number" >
		    <label>Monto Total</label>
		    <input name="monto_total" type="number" >
		    <!-- Ocultos  -->
		    <input type="text" value="<?= $userId ?>">
		    <!--  -->
		    <input class="botonFormulario" id="btnNotaCliente" type="submit" value="Añadir Nota">
		  </form>
		</div>
	</div>

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