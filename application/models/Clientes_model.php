<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function create($data){
		$this->db->insert('clients', array(	'NOMBRE_CLIENTE'	=> $data['name'],
											'NUMERO_CELULAR' 	=> $data['phone'],
											'EMAIL_CLIENTE' 	=> $data['email'],
											'username_register'	=> $data['username']
										  )
						 );
	}
	function read_all(){
		$this->db->order_by("FECHA_REGISTRO", "desc");
		$query = $this->db->get('clients');
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
}