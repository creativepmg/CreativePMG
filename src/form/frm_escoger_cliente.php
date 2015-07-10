<div id="dListaCliente" class="popup">
		<div class="cajaDialogo lisClientes">
			<div class="titulo">
				CLIENTES
				<div class="cerrar"></div>
			</div>
			<div class="formulario">
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
	</div>