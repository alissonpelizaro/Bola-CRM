<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index(){
		$this->load->library('core_lib');
		$this->load->model('lembretes_model');
		
		$dados = array(
			'page' => 'inicio',
			'lembretes' => $this->lembretes_model->getLembretes()
		);
		$this->load->view('inicio', $dados);
	}


}
