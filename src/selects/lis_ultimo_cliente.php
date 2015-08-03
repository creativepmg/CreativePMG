<?php 
	$ultimoCliente = mysql_query("SELECT ID_CLIENTE FROM clientes 
							  	ORDER BY ID_CLIENTE DESC 
							  	LIMIT 1 
							  	",$con);	
	$arryCliente=mysql_fetch_array($ultimoCliente);
	echo $arryCliente['ID_CLIENTE'];