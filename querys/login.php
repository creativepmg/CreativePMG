 <?php
 	@session_start();
 	require 'conexion.php';

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
	 			
	 		
	 			echo "Bienvenido ".$_SESSION['username']."<img src='../img/loader.gif'><script type='text/javascript'>logueado();</script>";
	 					
	 		}
	 		else
	 		{
	 			echo "<script type='text/javascript'>timeOcultar();</script>Combinacion erronea ".$_POST['user']."<img src='../img/loader.gif'>";
	 		}
 	}
 	else
	 	{
	 		echo '<script type="text/javascript">timeOcultar();</script>Oye tu <strong>"'.$_POST['user']. '"</strong> Deberias llenar ambos campos';
	 	}
 ?>