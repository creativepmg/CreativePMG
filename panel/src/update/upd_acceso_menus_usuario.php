<?php 
	
	require '../../../config/conexion.php';
	$mysqli = new mysqli($host, $user, $pw, $db);

	$mysqli->query("DELETE FROM usuario_menu
				 WHERE ID_USUARIO = '$_POST[id_usuario]'",$con);	
	$checked_count = count($_POST['id_menu']);
	
	if(!empty($_POST['id_menu']))
	{
		// Loop to store and display values of individual checked checkbox.
		foreach($_POST['id_menu'] as $selected)
		{
			$ins_menu = "INSERT INTO usuario_menu(ID_USUARIO,ID_MENU)
						VALUES ('$_POST[id_usuario]','$selected')"
						or die("Error en la consulta.." . mysqli_error($con));
			$mysqli->query($ins_menu,$con);		
			
		}
		echo "Menus de usuario actualizados correctamente";
	}

	
 ?>