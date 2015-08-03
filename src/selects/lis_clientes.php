<?php 
if(empty($_GET['name']))
{
  $nombre = '%';
}
else
{
  $nombre = $_GET['name'].'%';
} 
$lis_clientes = $mysqli->query("SELECT * FROM clientes AS A
           LEFT JOIN usuarios AS B
              ON A.ID_USUARIO = B.ID_USUARIO
            WHERE A.NOMBRE_CLIENTE LIKE '$nombre'
           ORDER BY A.NOMBRE_CLIENTE") 
     or die("Error en la consulta.." . mysqli_error($con));
$countClientes = mysqli_num_rows($lis_clientes);