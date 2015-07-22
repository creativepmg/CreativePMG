<?php 
	require 'querys/control.php';
    require 'config/conexion.php';
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
	<link rel="shortcut icon" type="image/x-icon" href="img/iconos/ico.png" />
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
    <a href="panel" class="logo"></a>
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
            <div class="avatar">
                <img src="img/avatares/<?= $arrayUsuario['AVATAR_USUARIO']; ?>">
            </div>
        	<p class="username"><?= $user_user ?></p>
            <span class="icon-keyboard_arrow_down"></span>
        </div>        
    </div>
    
</header>

<h1><?= $titulo ?></h1>

<div class="menu">
    <ul>
    <?php while ($reg=mysqli_fetch_array($usuario_menu)) {?>
        <li>
            <a href="<?= $reg['URL'] ?>"><?= $reg['DESCRIPCION']  ?></a>
        </li>
    <?php } ?>
        <li>
            <a href="configuracion"><span class="icon-configuracion"></span>CONFIGURACION</a>
        </li>
        <li>
            <a href="informacion"><span class="icon-informacion"></span>INFORMACION</a>
        </li>
        <li>
            <a href="querys/salir.php">CERRAR SESIÓN</a>
        </li>
    </ul>
</div>

<div class="contenido">
