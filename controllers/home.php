<?php 

	$confidencial = "esto no deberia verse por q es privado";
	$lenguage = "PHP"; 
	$titulo = 'Esandex';

	//Llamando una funcion
	view('home', compact('titulo'));