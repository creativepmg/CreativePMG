<?php 

	if($_POST['user'] == 'administrador')
	{
		if($_POST['password'] == '123456')
		{
			echo "Bienvenido".$_POST['user']."<meta  http-equiv = 'refresh'  contenido = '5; url = restringida.php' >";
		}
		else
		{
			echo "tu password es erronea";
		}
	}
	else
	{
		echo "el usuario esta equivocado";
	}
	//Con este tipo de variable recibo datos mediante la URL si te fijas arriba se concatena los datos y se lo pasa a esta pagina.
	echo "<br/>Usuario: ".$_POST['user']."</br> PassWord: ".$_POST['password'];
 ?>