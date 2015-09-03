<?php 
	require '../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);

	$mes_de_consulta = 2;

	$resultado = $mysqli->query("	SELECT IFNULL(SUM(TOTAL),0) AS TOTAL_DEL_MES
									FROM orden_servicio
									WHERE MONTH(FECHA_REGISTRO_ORDEN) = '$mes_de_consulta'");
	$arregloResultado=mysqli_fetch_array($resultado);
	echo $arregloResultado['TOTAL_DEL_MES'];
?>