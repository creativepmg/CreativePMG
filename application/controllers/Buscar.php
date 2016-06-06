<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Servicios_model');
	}
	public function index()
	{
		if($this->input->post('phone')){
			$data = array();
			$data['servicio'] = $this->Servicios_model->buscar('number', $this->input->post('phone'));
			
			$this->load->view('template/inicio', $data);
			$this->load->view('buscar');
			$this->load->view('template/fin');
			
		}else{
			redirect(base_url());
		}
		

	}
}
