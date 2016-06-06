 <?php
 	@session_start();

 	require '../config/conexion.php';
	$con=mysql_connect($host,$user,$pw) or die("problemas con server");
	mysql_select_db($db,$con)or die("problemas con BD");
 	if 	(
	 		isset($_POST['user']) 		&& !empty($_POST['user']) && 
	 		isset($_POST['password']) 	&& !empty($_POST['password'])
 		)
 		{
 			$consultaPreRegistro=mysql_query("SELECT * FROM pre_registro WHERE EMAIL='$_POST[email]'",$con);
	 		$pre_registro=mysql_fetch_array($consultaPreRegistro);
	 		$emaildb = $pre_registro['EMAIL'];
 			if($_POST['email'] == $emaildb)
 			{
 				if($pre_registro['CONFIRMADO'] == '0')
 				{
	 				$sel=mysql_query("SELECT * FROM usuarios WHERE EMAIL='$_POST[email]'",$con);
			 		$sesion=mysql_fetch_array($sel);
			 		if($_POST['email'] == $sesion['EMAIL'])
			 		{
			 			echo "Ya existe un usuario registrado con este email";
			 		}
			 		else
			 		{
			 			$selUsuarios=mysql_query("SELECT * FROM usuarios WHERE USER='$_POST[user]'",$con);
			 			$arrUsuario=mysql_fetch_array($selUsuarios);

				 		if($_POST['user'] == $arrUsuario['USER'])
				 		{
				 			echo "El nombre de usuario ya existe, favor de ingresar otro";		
				 		}
				 		else
				 		{
				 			$imagen = "../img/user.png";		
							$im = file_get_contents($imagen);
							$imdata = base64_encode($im);
	
				 			mysql_query("INSERT INTO usuarios (USER,PASS,EMAIL,AVATAR_USUARIO,CATEGORIA) 
				 							VALUES ('$_POST[user]',
				 									'$_POST[password]',
				 									'$_POST[email]',
				 									'{$imdata}',
				 									'2')",$con);

							mysql_query("UPDATE pre_registro 
											SET CONFIRMADO = '1' 
				 							WHERE EMAIL = '$_POST[email]'",$con);

							$dataUser=mysql_query("SELECT * FROM usuarios WHERE EMAIL='$_POST[email]'",$con);
			 				$Usuario=mysql_fetch_array($dataUser);
			 				$idUser = $Usuario['ID_USUARIO'];
			 				$nameUser = $Usuario['USER'];
			 				$descripcion = 'El usuario '.$nameUser.' se ha unido a nuestra familia';
			 				
			 				mysql_query("INSERT INTO notificaciones (DESCRIPCION,ID_RECEPTOR) 
				 							VALUES ('$descripcion',
				 									'1'
				 									)",$con);

			 				mysql_query("UPDATE clientes 
											SET ID_USUARIO = '$idUser'
				 							WHERE EMAIL_CLIENTE = '$_POST[email]'",$con);

				 			$_SESSION['control'] = 'hola';
				 			$_SESSION['username'] = $_POST['user']; 		
				 			echo "Bienvenido ".$_SESSION['username']."<script type='text/javascript'>logueado();</script>";			 			
				 		}			 			
			 		}
 				}
 				else
 				{
 					echo "Esta invitacion ya ha sido usada";
 				}
 			}
 			else
 			{
 				echo "Este email no tiene una invitacion pendiente";
 			}

	 		
 	}
 	else
	 	{
	 		echo "Oye tu <strong>".$_POST['user']."</strong> Deberias llenar ambos campos";
	 	}
 ?>