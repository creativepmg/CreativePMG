<?php require 'template/inicio.php'; ?>
<?php
			
			if(empty($_POST['nroOrden']))
			{
				$id_orden = '%';
			}
			else
			{
				$id_orden = $_POST['nroOrden'];
			}
			if(empty($_POST['estado']))
			{
				$id_estado = '%';
			}
			else
			{
				$id_estado = $_POST['estado'];
			}

				
	$lis_not_clientes	= mysql_query("SELECT * FROM orden_servicio AS A
								   	   	LEFT JOIN clientes 			AS B
								   		ON A.ID_CLIENTE 	= B.ID_CLIENTE
								   	   WHERE A.ID_ORDEN_SERVICIO  like '$id_orden'
								   	   	AND  A.ID_ESTADO_SERVICIO like '$id_estado'
								   ORDER BY A.FECHA_REGISTRO_ORDEN DESC") 
					   or die("Error en la consulta.." . mysql_error($con));
	$countOrden = mysql_num_rows($lis_not_clientes);

	 
        
				 	
 ?>

 <div class="contResult"><?= $countOrden ?></div>


	<div class="buscador">
		<form method="post">
			<div class="bloque">
				<label>Numero Orden</label>
				<input name="nroOrden" type="text">
			</div>
			<div class="bloque">
				<label>Estado</label>
				<select name="estado">
					<option value="%">TODOS</option>
					<option value="1">INTERNADO</option>
					<option value="2">ENTREGADO</option>
				</select>
			</div>
			
			<input class="boton" type="submit" value="BUSCAR">
		</form>
	</div>
	<div class="listaNotas">
	
		<?php  while ($arrServi=mysql_fetch_array($lis_not_clientes)) {
		
				 	$date = date_create($arrServi['FECHA_REGISTRO_ORDEN']);   
				 	  
		 			if($arrServi['ID_ESTADO_SERVICIO'] == '1')
			 			{
			 				$resEstado = 'INTERNADO';
			 			}
			 		elseif ($arrServi['ID_ESTADO_SERVICIO'] == '2') 
				 		{
				 			$resEstado = 'ENTREGADO';
				 		}
		?>
		<div class="item">
			<div class="id_orden_servicio">Numero de Orden: <?= $arrServi['ID_ORDEN_SERVICIO'] ?></div>
			<div class="fechaRegistro">Fecha Ingreso: <?= date_format($date, 'd M Y') ?></div>
			<div class="cliente"><?= $arrServi['NOMBRE_CLIENTE'] ?></div>
			<div class="detalle"><?= $arrServi['DETALLE'] ?></div>
			<div class="opcionesItem">
				<div class="editar" title="Marcar como terminado" onclick="verEditar(this);"></div>
				<form action="detalle-orden-servicio" method="GET">
					<input name="nroOrden" type="hidden" value="<?= $arrServi['ID_ORDEN_SERVICIO'] ?>">
					<input type="submit" class="agregar" title="Agregar detalles" value="" />
				</form>
			</div>
			<form id="frmEditarOrden" class="editarOrden" method="post">
				<input type="hidden" name="id_orden_servicio" value="<?= $arrServi['ID_ORDEN_SERVICIO'] ?>">
				<textarea class="areaEditable" name="detalle"> <?= $arrServi['DETALLE'] ?></textarea>
				<div class="montos">
				<?php  
					$acuenta = $arrServi['A_CUENTA'];
					$total = $arrServi['TOTAL'];
					$deuda = $total - $acuenta;
				?>
				<div class="a_cuenta">
					<p>A cuenta</p>
					<input name="a_cuenta" type="number" value="<?= $acuenta ?>">
				</div>
				<div class="monto_total">
					<p>Monto Total</p>
					<input name="monto_total" type="number" value="<?= $total?>">
				</div>
				<div>
					<p>Estado</p>
					<select name="id_estado_servicio">
						<option value="1">Internado</option>
						<option value="2">Entregado</option>
					</select>
				</div>	
			</div>
				<div class="btnEditarOrden" onclick="updOrden(this)">Guardar</div>
			</form>
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
			<div class="estado"><?= 'ESTADO: '.$resEstado ?></div>
		</div>
		<?php } ?>
	</div>
	
	<!-- NUEVA SERVICIO -->
	

	<?php require 'src/form/frm_nuevo_servicio.php' ?>


	<!-- ESCOGER CLIENTE -->
	<div id="dListaCliente" class="cajaDialogo">
		<div class="lisClientes formulario">
			<div class="encabezado">
				CLIENTES
				<div class="cerrar"></div>
			</div>
			<div class="lista">			 
			    	<?php while ($arrClientes=mysql_fetch_array($lis_clients)) {?>
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
			<div class="btn_nuevo" onclick="mostraCajaDialogo('#dNewCliente')">NUEVO CLIENTE</div>
		</div>
	</div>
	<!--  -->

	<!-- Nuevo Cliente  -->
	<div id="dNewCliente" class="cajaDialogo">
		<div class="newCliente formulario">
			<div class="encabezado">
				NUEVO CLIENTE
				<div class="cerrar"></div>
			</div> 
			<div class="detalles">
				<form id="formInsCliente" method="post">
					<label>Nombre</label>
					<input id="nombre_cliente" type="text" name="nombre_cliente" class="vaciar">
					<label>Numero Celular</label>
					<input id="numero_cliente" type="number" name="numero_celular" class="vaciar">
					<label>Email</label>
					<input id="email_cliente" type="text" name="email" class="vaciar">
					<input class="botonFormulario" id="btnInsCliente" type="submit" value="Guardar">
				</form>
			</div>
		</div>
	</div>
	<!--  -->


	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewOrdenService')"></div>  
	
<?php require 'template/fin.php'; ?>