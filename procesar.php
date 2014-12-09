<?php 

	if($_POST['user'] = 'administrador')
	{
		if($_POST['password'] = '123456')
		{
			echo "Bienvenido".$_POST['user'];
		}
		else
		{
			echo "tu contraseña es erronea"
		}
	}
	else
	{
		echo "el usuario esta equivocado";
	}
	//Con este tipo de variable recibo datos mediante la URL si te fijas arriba se concatena los datos y se lo pasa a esta pagina.
	echo "Usuario: ".$_POST['user']."</br> PassWord: ".$_POST['password'];
 ?>