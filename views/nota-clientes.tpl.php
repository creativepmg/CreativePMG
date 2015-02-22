<?php 
	require 'querys/control.php';
	require 'querys/conexion.php';
	require 'querys/querys.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>	<?php $titulo ?> - CreativePGM</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	 <!-- Hojas de estilo -->
	<link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />
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
	</style>
</head>
<body>
	<?php require 'template/header.html'; ?>
	<div class="listaNotas">
		<?php while ($arrNota=mysql_fetch_array($lis_not_clientes)) {?>
		<div class="item">
			<div class="cliente"><?= $arrNota['NOMBRE_CLIENTE'] ?></div>
			<div class="nota"><?= $arrNota['NOTA'] ?></div>
		</div>
		<?php } ?>
	</div>
	<!-- NUEVA NOTA -->
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
	    <label>Nota</label>
	    <textarea name="nota"></textarea>
	    <input class="botonFormulario" id="btnNotaCliente" type="submit" value="Añadir Nota">
	  </form>
	</div>
	</div>
	<div class="botonNuevo"></div>  
	<?php include 'template/footer.html'; ?>
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/analytics.js"></script>
	
</body>
</html>