
<?php
	include 'conexion.php';

	if(
		isset($_POST['email']) 	&& !empty($_POST['email']) 	&&
		isset($_POST['pedido']) && !empty($_POST['pedido'])
	  )
	{
		$con=mysql_connect($host,$user,$pw)or die("problemas al conectar");
		mysql_select_db($db,$con)or die("problemas al conectar la bd");

		mysql_query("INSERT INTO contacto (EMAIL,PEDIDO) VALUES ('$_POST[email]','$_POST[pedido]')",$con);
		
		$destino1 	=	"burngeek8@gmail.com";
		$destino2 	=	$_POST['email'];
		$desde 		= 	"From: no-reply@esandex.com\r\nContent-type: text/html\r\n";
		$asunto2	= 	"Pre Registro a Esandex";
		$mensaje 	= 	"<!DOCTYPE html>
					<html>
					<head>
						<title></title>
						<meta charset='UTF-8' />
						<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
						<meta name='HandheldFriendly' content='true'>		
					</head>
					<body style='margin: 0; background: #efefef; overflow: hidden; padding: 0 20px; font-size: 18px;'>
						<div style='background: #4B7F00; max-height: 45px;'>
							<img src='http://esandex.com/img/logoEmail.png'>
						</div>
						<div>
							<h1 style='color: #4B7F00; font-size: 25px; font-weight: normal; '>¡Gracias por elegirnos! </h1>
							<p>Tu correo es <strong style='color: #375d00;'>".$_POST['email']."</strong></p>
							<p>Estamos procesando su solicitud para tu proximo dominio, nos estaremos comunicando lo mas pronto posible.
								<br />
								Si su solicitud es conforme, le estaremos entregando un pase a nuestro sistema.

							<p>Disfruta <br /> -Team Esandex</p>
						</div>
						<div style='background: #4B7F00; color: #e9e9e9; height: 45px;'>
							<p style='line-height: 45px; text-align: center;'>Esandex | Perú | 2015</p>
						</div>
					</body>
					</html>";
		mail($destino2,$asunto,$mensaje,$desde);
		mail($destino1,$asunto,$mensaje,$desde);

		echo "En un plazo no mayor a 24 horas nos estaremos comunicando a su email con la confirmacion de su pedido, muchas gracias por confiar en nosotros. <br /> Team Esandex";
	}else{
		echo "Problemas al enviar";
	}

?>