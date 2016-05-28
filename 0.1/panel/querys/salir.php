<?php
	session_start();
	session_destroy();
	require '../../config/conexion.php';
	header('location: http://'. $servidor);
?>