<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pastores extends CI_Controller {

	public function index(){
		$this->load->library('core_lib');
		$dados = array(
			'page' => 'pastores'
		);
		$this->load->view('pastores', $dados);
	}


}
