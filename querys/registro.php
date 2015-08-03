<?php 
	require '../conexion.php';
	$con=mysql_connect($host,$user,$pw)or die("problemas al conectar");
		mysql_select_db($db,$con)or die("problemas al conectar la bd".mysql_error());

	$usuarios=mysql_query("SELECT * FROM users
							WHERE USER = '$_POST[username]'",$con);
	$arrUsuarios=mysql_fetch_array($usuarios);


	if ($_POST['username'] == $arrUsuarios['USER']) {
		echo 'El usuario '.$_POST['username'].' ya existe <meta http-equiv="refresh" content="5; url=registrar.html">';# code...
	}
	else
	{
			mysql_query("INSERT INTO users (USER,
											PASS,
											EMAIL) 
						 VALUES (	'$_POST[username]',
						 			'$_POST[password]',
						 			'$_POST[email]'
						 		)",$con);

			echo "Los datos fueron registrados correctamente <br />Username: ".$_POST['username']."<br>Password: ".$_POST['password']."</br>Email: ".$_POST['email'];
		
	}
?>