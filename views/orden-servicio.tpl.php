<?php require 'template/inicio.php'; ?>
	<div class="buscador">
		<form method="get">
			<div class="bloque">
				<label>Nro Servicio</label>
				<input name="nroOrden" type="number">				
			</div>
			<input class="boton" type="submit" value="BUSCAR">
		</form>
	</div>
	<div class="listaNotas">
		<?php
				if(empty($_GET['nroOrden']))
				{
					$nroOrden = 'NULL';
				}
				else
				{
					$nroOrden = $_GET['nroOrden'];
				}
				$lis_not_clientes	= mysql_query("SELECT * FROM orden_servicio AS A
								   	   LEFT JOIN clientes AS B
								   		ON A.ID_CLIENTE = B.ID_CLIENTE
								   		WHERE ID_ORDEN_SERVICIO = '$nroOrden'
								   ORDER BY A.FECHA_REGISTRO_ORDEN DESC") 
					   or die("Error en la consulta.." . mysql_error($con));
		 while ($arrServi=mysql_fetch_array($lis_not_clientes)) {?>
		<div class="item">
			<div class="id_orden_servicio">Numero de Orden: <?= $arrServi['ID_ORDEN_SERVICIO'] ?></div>
			<div class="cliente"><?= $arrServi['NOMBRE_CLIENTE'] ?></div>
			<div class="detalle"><?= $arrServi['DETALLE'] ?></div>
			<div class="opcionesItem">
				<div class="editar" title="Marcar como terminado" onclick="verEditar(this);"></div>
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
		</div>
		<?php } ?>
	</div>
	<!-- NUEVA SERVICIO -->
	<div id="respuesta"></div>

	<div class="popup popNuevoUsuario">
		<div class="tarjeta nuevoServicio">
		  <div class="titulo">NUEVA ORDEN DE SERVICIO
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
		<div class="btn_nuevo">PROXIMAMENTE</div>
	</div>
	<!--  -->


	<div id="nuevoServicio" class="botonNuevo"></div>  
	
<?php require 'template/fin.php'; ?>