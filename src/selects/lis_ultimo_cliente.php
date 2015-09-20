<?php 
    require '../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);
    $sql = "SELECT ID_CLIENTE 
            FROM clientes 
            WHERE NUMERO_CELULAR = '$_POST[numero_celular]'
			ORDER BY ID_CLIENTE DESC 
			LIMIT 1";
	$ultimoCliente = $mysqli->query($sql);	
	$arryCliente=mysqli_fetch_array($ultimoCliente);
	echo $arryCliente['ID_CLIENTE'];