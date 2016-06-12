<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function buscar($tipo, $parametro)
	{
		if($tipo == 'number')
		{			
			$query = $this->db->query("SELECT * 
										  FROM clients 						AS A
										  LEFT JOIN orden_servicio 				AS B
										  	ON B.ID_CLIENTE 	= A.ID_CLIENTE
										  LEFT JOIN orden_servicio_estado 		AS C
										  	ON C.STATUS_ID = B.ID_ESTADO_SERVICIO
										  WHERE A.NUMERO_CELULAR  = $parametro
										   	AND  B.ID_ESTADO_SERVICIO <  6
										  ORDER BY B.date_register DESC");
			$result = $query->row();
			if($query -> num_rows() > 0) return $result;
			else return false;
		}
	}
	function read_all(){
		$query = $this->db->query("SELECT * 
								  FROM orden_servicio 						AS A
								  LEFT JOIN clients 				AS B
								  	ON B.ID_CLIENTE 	= A.ID_CLIENTE
								  LEFT JOIN orden_servicio_estado 		AS C
								  	ON C.STATUS_ID = A.ID_ESTADO_SERVICIO
								  ORDER BY A.date_register DESC");									  
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
}