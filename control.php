<?php
	@session_start();
	if($_SESSION['control'] != "ok")
		{
			session_destroy();
			header('location: /');
		}

?>