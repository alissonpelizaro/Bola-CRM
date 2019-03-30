<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cultos extends CI_Controller {

	public function index(){
		$this->load->library('core_lib');
		$dados = array(
			'page' => 'cultos'
		);
		$this->load->view('cultos', $dados);
	}


}
