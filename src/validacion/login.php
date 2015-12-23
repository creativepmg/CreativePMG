 <?php
 	@session_start();
 	require '../../config/conexion.php';

 	if 	(
	 		isset($_POST['user']) 		&& !empty($_POST['user']) 		&& 
	 		isset($_POST['password']) 	&& !empty($_POST['password'])
 		)
 		{
	 		$con=mysql_connect($host,$user,$pw) or die("problemas con server");
	 		mysql_select_db($db,$con)or die("problemas con BD");

	 		$sel=mysql_query("SELECT * FROM usuarios WHERE USER='$_POST[user]'",$con);
	 		$sesion=mysql_fetch_array($sel);

	 		if($_POST['password'] == $sesion['PASS'])
	 		{
	 			$_SESSION['control'] = 'hola';
	 			$_SESSION['username'] = $_POST['user'];
	 			
	 		
	 			echo "Bienvenido ".$_SESSION['username']."<script type='text/javascript'>logueado();</script>";
	 					
	 		}
	 		else
	 		{
	 			echo "Combinacion erronea";
	 		}
 	}
 	else
	 	{
	 		echo 'Oye tu <strong>"'.$_POST['user']. '"</strong> Deberias llenar ambos campos';
	 	}
 ?>