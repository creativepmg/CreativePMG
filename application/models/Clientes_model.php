<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function read_all(){
		$query = $this->db->get('clients');
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
}