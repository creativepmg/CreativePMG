<?php 
	require '../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);

	$sql = "SELECT * 
            FROM clientes 
            WHERE NUMERO_CELULAR 	= '$_POST[numero_celular]'";

	$cliente=$mysqli->query($sql);
	
	$dataCliente = mysqli_fetch_array($cliente);
	
	//Datos Cliente
	$nombreCliente = $dataCliente['NOMBRE_CLIENTE']; 
	$numeroCel = $dataCliente['NUMERO_CELULAR'];

	$postCliente   = $_POST['nombre_cliente'];
	$postCelular   = $_POST['numero_celular'];
	$postEmail	   = $_POST['email'];
    $postPagina    = $_POST['pagina'];
        

	if(isset($postCliente) && !empty($postCliente)){
        if(isset($postCelular) && !empty($postCelular)){
            //echo "Bien, ";
            if($postCelular == $numeroCel){
                echo "El numero de cel ya existe con el usuario: " . $nombreCliente;   
            }else{
                $sqlCliente	= "INSERT INTO clientes (NOMBRE_CLIENTE,
                                                     NUMERO_CELULAR,
                                                     EMAIL_CLIENTE,
                                                     FOTO_CLIENTE,
                                                     ID_USUARIO)
                               VALUES ('$postCliente',
                                       '$postCelular',
                                       '$postEmail',
                                       'user.png',
                                       '$idUsuario')"
                                or die("Error en la consulta.." . mysqli_error($mysqli));

                $resul_ins_cliente = $mysqli->query($sqlCliente);

                if($resul_ins_cliente)
                {
                    echo 'exito';
                }else{
                    echo 'Error en: ' . $resul_ins_cliente;
                }
            }
        }else{
            echo "El campo celular es obligatorio";
        }
    }else{
        echo "El campo cliente es obligatorio";
    }
           
	
?>