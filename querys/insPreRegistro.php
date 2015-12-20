
<?php
	require '../config/conexion.php';
	$con=mysql_connect($host,$user,$pw) or die("problemas con server");
	mysql_select_db($db,$con)or die("problemas con BD");

	$postEmail = $_POST['email'];
	$postEmail = RTRIM($postEmail);

	if(isset($postEmail) && !empty($postEmail))
	{
		$email = mysql_query("SELECT EMAIL FROM pre_registro WHERE EMAIL = '{$postEmail}'",$con);

		$arrEmails = mysql_fetch_array($email);

		if ($postEmail == $arrEmails['EMAIL'])
		{
			echo "Este email ya tiene un pre Registro";
		}
		else
		{
			mysql_query("INSERT INTO pre_registro (EMAIL,CONFIRMADO) VALUES ('{$postEmail}','0')",$con);
		

			$destino2 	=	$_POST['email'].",burngeek8@gmail.com";
			$desde2 	= 	"From: no-reply@serviciolatinopmg.com\r\nContent-type: text/html\r\n";
			$asunto2	= 	"Pre Registro a Servicio Latino PMG";
			$mensaje2 	= 	"<!DOCTYPE html>
						<html>
						<head>
							<title></title>
							<meta charset='UTF-8' />
							<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
							<meta name='HandheldFriendly' content='true'>		
						</head>
						<body style='margin: 0; background: #efefef; overflow: hidden; padding: 0 20px; font-size: 18px;'>
							<div style='background: #2980b9; max-height: 45px;padding: 10px;'>
								<img src='http://static.serviciolatinopmg.com/images/logos/logo.png' style='width: 75px;'>
							</div>
							<div>
								<h1 style='color: #2980b9; font-size: 25px; font-weight: normal; '>¡Tu cuenta de <strong style='color: #2980b9;'> Latino PMG </strong> ya está casi lista! </h1>
								<p>Tu correo es <strong style='color: #2980b9;'>".$_POST['email']."</strong></p>
								<p>Ahora lo que necesitas es un <strong style='color: #2980b9;'>Usuario </strong>y una <strong style='color: #2980b9;'>Contraseña</strong>, da clic al enlace para crear tu usuario.</p>
								<a href='http://".$servidor."confirmar-cuenta?email=".$_POST["email"]."'' style='cursor: pointer; background: #2980b9; text-decoration: none; border-radius: 5px; color: #e9e9e9; font-weight: bolder; padding: 10px 50px;'>Crear usuario</a>
								<p>Disfruta <br /> -Team LatinoPMG</p>
							</div>
							<div style='background: #2980b9; color: #e9e9e9; height: 45px;'>
								<p style='line-height: 45px; text-align: center;'>LatinoPMG - 2015</p>
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