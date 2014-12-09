<?php
	include('conexion.php');
	$con=mysql_connect($host,$user,$pw)or die("problemas al conectar");
		mysql_select_db($db,$con)or die("problemas al conectar la bd");

		mysql_query("INSERT INTO nombre de la tabla (COLUMNAS A LAS Q SE VA A INSERTAR) VALUES (valores a insertar ejemplo '$_POST[email]','0')",$con);

		echo "Los datos fueron registrados correctamente <br />Username: ".$_POST['username']."<br>Password: ".$_POST['password']."</br>Email: ".$_POST['email'];
?>