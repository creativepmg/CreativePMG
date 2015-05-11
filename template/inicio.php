<?php 
	require 'querys/control.php';
	require 'querys/conexion.php';
	require 'querys/querys.php';
    require 'src/selects/selects.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> <?= $titulo ?> - CreativePMG</title>
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
    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<header>
    <div class="btn_menu"></div>
    <a href="/panel" class="logo"></a>
    <div class="menuUsuario">
        <div class="notificaciones">
            <div id="btn_notificaciones" class="icono">
                <div class="contador"><?= $conteoNotificaciones ?></div>
            </div>
            <div class="listaNotificaciones">
                <div class="misNotificaciones">
                    <?php while ($reg=mysql_fetch_array($lis_notificaciones)) {?>
                        <div class="item">
                            <div class="descripcion"><?= $reg['DESCRIPCION'] ?></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="verTodos flechita">Ver Todos</div>
            </div>
        </div>
        <div class="usuario">
        	<p class="username"><?= $userName ?></p>
        	<div class="avatar">
            	<img src="img/avatares/<?= $arrayUsuario['AVATAR_USUARIO']; ?>">
            </div>
        </div>        
    </div>
    
</header>
<div class="opcionesUsuario">
    <ul>
        <li style="display: none;">
            <a href="settings">CONFIGURACION</a>
        </li>
        <li>
            <a href="querys/salir.php">CERRAR SESIÓN</a>
        </li>
    </ul>
</div>
<h1><?= $titulo ?></h1>

<div class="menu">
    <ul>
    <?php while ($reg=mysql_fetch_array($usuario_menu)) {?>
      <li>
        <a href="<?= $reg['URL'] ?>"><?= $reg['DESCRIPCION']  ?></a>
      </li>
    <?php } ?>
    </ul>
</div>

<div class="contenido">
