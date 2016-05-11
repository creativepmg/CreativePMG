<?php
	session_start();
	if(!isset($_SESSION['control']))
		{
			session_destroy();
			header('location: login');
		}

?>