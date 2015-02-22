<?php 
	require 'querys/control.php';
	require 'querys/conexion.php';
	require 'querys/querys.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Panel - Esandex</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	 <!-- Hojas de estilo -->
	<link rel="shortcut icon" type="image/x-icon" href="/img/ico.png" />
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<style type="text/css">
	    body
	    {
	      border-top: 0!important;          
	    }
	    #respuestaUbicacion
	    {
	        position: fixed;
	        width: 100%;
	        background: #e9e9e9;
	        color: #333;
	        line-height: 25px;
	        height: 25px;
	        font-size: 15px;
	        bottom: 0; 
	    }
	    .<?= $arrayUsuario['USER']; ?>
	    {
	        display: none;
	    }
	</style>
</head>
<body>
	<?php require 'template/header.html'; ?>
	
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
			<div class="nota"><?= $arrServi['DETALLE'] ?></div>
			<form id="frmFinalizado" method="post">
				<input name="id_orden_servicio" type="hidden" value="<?= $arrServi['ID_ORDEN_SERVICIO'] ?>">
			</form>
			<div class="opcionesItem">
				<div class="listo" id="btnListo" title="Marcar como terminado" onclick="updOrdenFinalizada(this);"></div>
			</div>
		</div>
		<?php } ?>
	</div>

	<!-- NUEVA SERVICIO -->
	<div id="respuesta"></div>

	<div class="popup popNuevoUsuario">
		<div class="tarjeta nuevoUsuario">
		  <div class="titulo">NOTA CLIENTE
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
		    <input class="botonFormulario" id="btnNotaCliente" type="submit" value="Añadir Nota">
		  </form>
		</div>
	</div>

	<div class="botonNuevo"></div>  

	<!-- Footer -->
   	<?php require 'template/footer.html'  ?>
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/analytics.js"></script>
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
</body>
</html>