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

	public function novoLembrete(){
		$this->load->model('lembretes_model');
		$this->lembretes_model->gravaLembrete(
			$this->fillLembrete($this->input->post())
		);
		if($this->input->post('origin') == 'home'){
			redirect('../inicio?lembrete=created');
		}
		redirect('../lembretes?lembrete=created');
	}
	
	private function fillLembrete($dados){
		return array(
			'titulo' => isset($dados['titulo']) ? $dados['titulo'] : '',
			'conteudo' => isset($dados['conteudo']) ? $dados['conteudo'] : '',
			'cor' => isset($dados['color']) ? $dados['color'] : '',
			'alerta' => isset($dados['alerta']) ? $dados['alerta'] : '',
		);
	}

}
