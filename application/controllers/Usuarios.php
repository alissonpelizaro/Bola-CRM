<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index(){
		$this->load->library('core_lib');
		$dados = array(
			'page' => 'usuarios'
		);
		$this->load->view('usuarios', $dados);
	}


	public function obtemLista($lista = ""){
		$this->load->library('core_lib');
		$this->load->model('user_model');

		$lista = $this->user_model->obtemLista(explode(',', $lista));
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($lista));
	}


}
