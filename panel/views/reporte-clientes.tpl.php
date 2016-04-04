<?php 
	require '../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);
	$sql = "SELECT * 
            FROM clientes 
            ORDER BY NOMBRE_CLIENTE"
            or die("Error en la consulta.." . $mysqli->error);
    $lis_clientes = $mysqli->query($sql); 
    header("Content-type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: filename=Reporte_Clientes.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
 ?>
<table id="maquinaVillas">
	<tr>
		<th>NOMBRE</th>
		<th>CELULAR</th>
		<th>EMAIL</th>
	</tr>
	<?php while ($reg=mysqli_fetch_array($lis_clientes)) {?>
		<tr>
			<td><?= $reg['NOMBRE_CLIENTE'] ?></td>
			<td><?= $reg['NUMERO_CELULAR'] ?></td>
			<td><?= $reg['EMAIL_CLIENTE'] ?></td>
		</tr>
	<?php } ?>	
</table>
	