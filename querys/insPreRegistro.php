
<?php
	require '../conexion.php';

	if(isset($_POST['email']) && !empty($_POST['email']))
	{
		$email = mysql_query("SELECT EMAIL FROM pre_registro WHERE EMAIL = '$_POST[email]'",$con);

		$arrEmails = mysql_fetch_array($email);

		if ($_POST['email'] == $arrEmails['EMAIL'])
		{
			echo "Este email ya tiene un pre Registro";
		}
		else
		{
			mysql_query("INSERT INTO pre_registro (EMAIL,CONFIRMADO) VALUES ('$_POST[email]','0')",$con);
		

			$destino2 	=	$_POST['email'].",burngeek8@gmail.com";
			$desde2 	= 	"From: no-reply@esandex.com\r\nContent-type: text/html\r\n";
			$asunto2	= 	"Pre Registro a Esandex";
			$mensaje2 	= 	"<!DOCTYPE html>
						<html>
						<head>
							<title></title>
							<meta charset='UTF-8' />
							<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
							<meta name='HandheldFriendly' content='true'>		
						</head>
						<body style='margin: 0; background: #efefef; overflow: hidden; padding: 0 20px; font-size: 18px;'>
							<div style='background: #2980b9; max-height: 45px;'>
								<img src='http://creativepmg.com/img/logo.png'>
							</div>
							<div>
								<h1 style='color: #2980b9; font-size: 25px; font-weight: normal; '>¡Tu cuenta de <strong style='color: #375d00;'> CreativePMG </strong> ya está casi lista! </h1>
								<p>Tu correo es <strong style='color: #2980b9;'>".$_POST['email']."</strong></p>
								<p>Ahora lo que necesitas es un <strong style='color: #2980b9;'>Usuario </strong>y una <strong style='color: #375d00;'>Contraseña</strong>, da clic al enlace para crear tu usuario.</p>
								<a href='http://esandex.com/confirmar-cuenta?email=".$_POST["email"]."'' style='cursor: pointer; background: #4B7F00; text-decoration: none; border-radius: 5px; color: #e9e9e9; font-weight: bolder; padding: 10px 50px;'>Crear usuario</a>
								<p>Disfruta <br /> -Team Esandex</p>
							</div>
							<div style='background: #2980b9; color: #e9e9e9; height: 45px;'>
								<p style='line-height: 45px; text-align: center;'>CreativePMG - 2015</p>
							</div>
						</body>
						</html>";
			mail($destino2,$asunto2,$mensaje2,$desde2);

			echo $_POST['email']." Revise su bandeja de entrada para confirmar su registro a CreativePMG";
		}

	}
	else
	{
		echo "Problemas al enviar";
	}

?>