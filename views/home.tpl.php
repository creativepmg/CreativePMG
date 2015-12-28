<?php 
	require 'config/conexion.php';
	if(!empty($_GET['number'])){
		$getNumero = $_GET['number'];	
	}else{
		$getNumero = '';
	}
	
	$mysqli = new mysqli($host, $user, $pw, $db);
	if ($mysqli->connect_errno) {
   		echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$resultSetServices	= $mysqli->query("SELECT * 
										  FROM clientes 	AS A
										  LEFT JOIN orden_servicio 	AS B
										  	ON B.ID_CLIENTE 	= A.ID_CLIENTE
										  LEFT JOIN orden_servicio_estado AS C
										  	ON C.STATUS_ID = B.ID_ESTADO_SERVICIO
										  WHERE A.NUMERO_CELULAR  = '{$getNumero}'
										   	AND  B.ID_ESTADO_SERVICIO <  6
										  ORDER BY B.FECHA_REGISTRO_ORDEN DESC") 
					   or die("Error en la consulta: " . $mysqli->error);
	$countOrder = mysqli_num_rows($resultSetServices);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta de estado de orden | LatinoPMG</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	<!-- Hojas de estilo -->
	<link rel="stylesheet" href="views/template/css/main.css">
</head>
<body>
	<header>
		<a href="/">
			<div class="logo"></div>
		</a>
		<nav>
			<ul>
				<li>
					<a href="http://panel.<?= $servidor ?>login">Iniciar sesión</a>
				</li>
			</ul>
		</nav>
	</header>
	<section class="main-container">
		<h1>Bienvenido</h1>
		<section class="searcher">
			<form method="get">
				<div class="input-group">
					<label for="n_orden">Ingrese Nro. Teléfono</label>
					<input id="n_orden" type="number" name="number" placeholder="">
				</div>
				<input class="button-search" type="submit" value="">
			</form>
		</section>
		<section class="results">			
			<?php 
				if(!empty($getNumero))
				{
					if($countOrder > 0)
					{
						while ($arrayServices=mysqli_fetch_array($resultSetServices)) {
							//Datos del cliente
							$clientName = $arrayServices['NOMBRE_CLIENTE'];
							//Datos del servicio
							$id_orden = $arrayServices['ID_ORDEN_SERVICIO'];
							$detalle = $arrayServices['DETALLE'];
							$status = $arrayServices['DESCRIPTION'];
							$total = $arrayServices['TOTAL'];
							$on_account = $arrayServices['A_CUENTA'];
							$debit = $total - $on_account;
							$date = date_create($arrayServices['FECHA_REGISTRO_ORDEN']); 			

			?>
				<section class="item">
					<section class="header-group">
						<h3>Nro. Orden:  <span><?= $id_orden ?></span></h3>
						<span class="date"><?= date_format($date, 'd M Y') ?></span>
					</section>
					<section class="details-group">
						<div class="detail">
							<label for="" class="title">Detalle: </label>
							<p><?= $detalle ?></p>
						</div>
						<div class="detail">
							<label for="" class="title">Cliente: </label>
							<p><?= $clientName ?></p>
						</div>
						<div class="detail">
							<label for="" class="title">Total: </label>
							<p><?= $total ?> USD</p>
						</div>
						<div class="detail">
							<label for="" class="title">A cuenta: </label>
							<p><?= $on_account ?> USD </p>
						</div>
						<div class="detail">
							<label for="" class="title">Debe: </label>
							<p><?= $debit ?> USD</p>
						</div>
					</section>
					<section class="footer-group">
						<h3 class="estado"><?= $status ?></h3>
					</section>
				</section>
			<?php 
						}
					}else{
						echo "No tiene Ordenes pendientes, ingrese otro numero para consultar.";
					} 
				}else
				{
					echo "";
				}
			?>
		</section>
		
	</section>
	<footer>
		<?php  
			if(!empty($getNumero))
			{
		?>
			<p>Total de resultados: <span class="countResult"><?= $countOrder ?></span></p>
		<?php 
			}
		?>
		<section class="contact">
			<p>LatinoPMG Contáctacnos a teléfono: 3023390742</p>
		</section>
	</footer>
</body>
</html>