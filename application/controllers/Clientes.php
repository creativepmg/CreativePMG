<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logueado')){			
			redirect('login');
		}else{
			$this->load->model('Usuarios_model');		
			$this->load->model('Clientes_model');
		}
	}
	public function index()
	{
		$data = array();
		$data['username'] = $this->session->userdata('username');
		$data['menus_permitidos'] = $this->Usuarios_model->listar_menu_permitidos($this->session->userdata('id'));
		$data['clientes'] = $this->Clientes_model->read_all();
		$this->load->view('template/inicio_panel', $data);
		$this->load->view('clientes/listar');
		$this->load->view('template/fin_panel');
	}
	public function nuevo(){
		$data = array();
		$data['username'] = $this->session->userdata('username');
		$data['menus_permitidos'] = $this->Usuarios_model->listar_menu_permitidos($this->session->userdata('id'));
		$this->load->view('template/inicio_panel', $data);
		$this->load->view('clientes/nuevo');
		$this->load->view('template/fin_panel');
	}
	public function insertar(){
		$data = array(	
						'name' 		=> $this->input->post('name'), 
						'phone' 	=> $this->input->post('phone'), 
						'email' 	=> $this->input->post('email'), 
						'username' 	=> $this->session->userdata('username')
					 );
		$this->Clientes_model->create($data);
		redirect('clientes');
	}
}
