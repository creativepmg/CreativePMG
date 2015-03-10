<?php 
	@session_start();
	include('conexion.php');
	$con=mysql_connect($host,$user,$pw)or die("problemas al conectar");
		mysql_select_db($db,$con)or die("problemas al conectar la bd".mysql_error());

	$usuarios=mysql_query("SELECT * FROM users
							WHERE USER = '$_POST[username]'",$con);
	$arrUsuarios=mysql_fetch_array($usuarios);
	$userName = $arrUsuarios[''];

	if($_POST['username'] == $arrUsuarios['USER'])
	{
		if($_POST['password'] == $arrUsuarios['PASS'])
		{
			echo 'Bienvenido'.$_POST['user'].'<meta http-equiv="refresh" content="5; url=restringida.php">';
			$_SESSION['control'] = 'ok';
	 		$_SESSION['username'] = $_POST['username'];
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
	echo "<br/>Usuario: ".$_POST['username']."</br> PassWord: ".$_POST['password'];
 ?>