<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//Aqui vamos a realizar el CRUD (create, read, update, delete)
	function obtenerUsuario($data){
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$consulta = $this->db->get('users');
		$resultado = $consulta->row();
		return $resultado;
	}
	function user_menu($id)
	{
		$query = $this->db->query(
						"SELECT A.menu_id,
								A.description,
								A.url,
						        (SELECT B.checked
						         FROM user_menu AS B
						         WHERE 	B.menu_id = A.menu_id
						        	AND B.user_id = $id
						        ) AS checked
						FROM menus AS A"
						);
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
	function read_all(){
		$query = $this->db->get('users');
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
	function read($id){
		$this->db->where('user_id', $id);
		$query = $this->db->get('users');
		$result = $query->row();
		if($query -> num_rows() > 0) return $result;
		else return false;
	}
	function listar_menu_permitidos($user_id)
	{
		$query = $this->db->query(
								  "SELECT A.menu_id,
										  B.description,
										  B.url
								   FROM user_menu AS A
								   INNER JOIN menus AS B
								   ON A.menu_id = B.menu_id
								   WHERE A.user_id = $user_id
								  "
						);
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
	function insertar_permiso_menu($user_id, $menu_id){
		$data = array(
						'user_id' => $user_id,
						'menu_id' => $menu_id,
						'checked' => 1
					 );
		$this->db->insert('user_menu', $data);
	}
	function eliminar_permiso_menu($user_id, $menu_id){
		$this->db->query("DELETE FROM user_menu
						  WHERE user_id = $user_id
						  	AND menu_id = $menu_id");
	}
}