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
										  FROM clientes 						AS A
										  LEFT JOIN orden_servicio 				AS B
										  	ON B.ID_CLIENTE 	= A.ID_CLIENTE
										  LEFT JOIN orden_servicio_estado 		AS C
										  	ON C.STATUS_ID = B.ID_ESTADO_SERVICIO
										  WHERE A.NUMERO_CELULAR  = $parametro
										   	AND  B.ID_ESTADO_SERVICIO <  6
										  ORDER BY B.FECHA_REGISTRO_ORDEN DESC");
			$result = $query->row();
			if($query -> num_rows() > 0) return $result;
			else return false;
		}
	}
}