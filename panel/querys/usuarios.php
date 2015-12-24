<?php 
		error_reporting(0);
	$con=mysql_connect('localhost','root','')or die("problemas al conectar");
		mysql_select_db('desarrollo',$con)or die("problemas al conectar la bd".mysql_error());

	$usuarios=mysql_query("SELECT * FROM users",$con);
		
		while ($arrUsuarios=mysql_fetch_array($usuarios))
		{
			echo "	ID: ".$arrUsuarios['ID']."<br />
					USER: ".$arrUsuarios['USER']."<br />
					PASS: ".$arrUsuarios['PASSWORD']."<br />
					EMAIL: ".$arrUsuarios['EMAIL']."<br /><br />
					";
		};	 	
 ?>