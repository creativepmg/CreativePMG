<?php
	$con=mysql_connect('localhost','creative_admin','creativepmg')or die("problemas al conectar");
		mysql_select_db('creative_desarrollo',$con)or die("problemas al conectar la bd".mysql_error());

		mysql_query("INSERT INTO users (USER,PASS,EMAIL) VALUES ('$_POST[username]','$_POST[password]','$_POST[email]')",$con);

		echo "Los datos fueron registrados correctamente <br />Username: ".$_POST['username']."<br>Password: ".$_POST['password']."</br>Email: ".$_POST['email'];
?>