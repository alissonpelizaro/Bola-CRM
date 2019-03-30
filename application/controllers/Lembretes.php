<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembretes extends CI_Controller {

	public function index(){
		$this->load->library('core_lib');
		$dados = array(
			'page' => 'lembretes'
		);
		$this->load->view('lembretes', $dados);
	}


}
