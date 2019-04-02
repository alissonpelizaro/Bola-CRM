<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mural extends CI_Controller {

	public function index(){
		$this->load->library('core_lib');
		$dados = array(
			'page' => 'mural'
		);
		$this->load->view('mural', $dados);
	}


}
