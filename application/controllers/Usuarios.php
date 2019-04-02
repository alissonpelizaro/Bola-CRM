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


}
