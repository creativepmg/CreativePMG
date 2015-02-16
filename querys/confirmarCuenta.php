 <?php
 	@session_start();
 	require 'conexion.php';
	$con=mysql_connect($host,$user,$pw) or die("problemas con server");
	mysql_select_db($db,$con)or die("problemas con BD");
 	if 	(
	 		isset($_POST['user']) 		&& !empty($_POST['user']) && 
	 		isset($_POST['password']) 	&& !empty($_POST['password'])
 		)
 		{
 			$consultaPreRegistro=mysql_query("SELECT * FROM pre_registro WHERE EMAIL='$_POST[email]'",$con);
	 		$pre_registro=mysql_fetch_array($consultaPreRegistro);
 			if($_POST['email'] == $pre_registro['EMAIL'])
 			{
 				if($pre_registro['CONFIRMADO'] == '0')
 				{
	 				$sel=mysql_query("SELECT * FROM usuarios WHERE EMAIL='$_POST[email]'",$con);
			 		$sesion=mysql_fetch_array($sel);
			 		if($_POST['email'] == $sesion['EMAIL'])
			 		{
			 			echo "<script type='text/javascript'>timeOcultar();</script>Ya existe un usuario registrado con este email<img src='../img/loader.gif'>";
			 		}
			 		else
			 		{
			 			$selUsuarios=mysql_query("SELECT * FROM usuarios WHERE USER='$_POST[user]'",$con);
			 			$arrUsuario=mysql_fetch_array($selUsuarios);

				 		if($_POST['user'] == $arrUsuario['USER'])
				 		{
				 			echo "<script type='text/javascript'>timeOcultar();</script>El nombre de usuario ya existe, favor de ingresar otro<img src='../img/loader.gif'>";		
				 		}
				 		else
				 		{
				 			mysql_query("INSERT INTO usuarios (USER,PASS,EMAIL,AVATAR_USUARIO,CATEGORIA) 
				 							VALUES ('$_POST[user]',
				 									'$_POST[password]',
				 									'$_POST[email]',
				 									'user.png',
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
				 			echo "Bienvenido ".$_SESSION['username']."<img src='../img/loader.gif'><script type='text/javascript'>logueado();</script>";			 			
				 		}			 			
			 		}
 				}
 				else
 				{
 					echo "<script type='text/javascript'>timeOcultar();</script>Esta invitacion ya ha sido usada<img src='/img/loader.gif'>";
 				}
 			}
 			else
 			{
 				echo "<script type='text/javascript'>timeOcultar();</script>Este email no tiene una invitacion pendiente<img src='/img/loader.gif'>";
 			}

	 		
 	}
 	else
	 	{
	 		echo "<script type='text/javascript'>timeOcultar();</script>Oye tu <strong>".$_POST['user']."</strong> Deberias llenar ambos campos<img src='/img/loader.gif'>";
	 	}
 ?>