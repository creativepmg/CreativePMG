<?php 
	include('conexion.php')
	$con=mysql_connect($host,$user,$pw)or die("problemas al conectar");
		mysql_select_db($db,$con)or die("problemas al conectar la bd".mysql_error());

		mysql_query("INSERT INTO users (USER,PASSWORD,EMAIL) VALUES ('$_POST[username]','$_POST[password]','$_POST[email]')",$con);

		echo "Los datos fueron registrados correctamente <br />Username: ".$_POST['username']."<br>Password: ".$_POST['password']."</br>Email: ".$_POST['email'];
?>