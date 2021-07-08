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

	public function lista(){
		$this->load->library('core_lib');
		$this->load->model('lembretes_model');

		$dados = $this->lembretes_model->getLembretes();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($dados));
	}

	public function salva(){
		$this->output->set_content_type('application/json');
		$this->load->model('lembretes_model');

		$dados = $this->fillLembrete($this->input->post());
		if($this->input->post('idLembrete')){
			$this->lembretes_model->atualizaLembrete(
				$this->input->post('idLembrete'), 
				$dados
			);
		} else {
			$this->lembretes_model->gravaLembrete($dados);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode('created'));
	}


	public function obtem($idLembrete){
		$this->load->library('core_lib');
		$this->load->model('lembretes_model');

		$dados = $this->lembretes_model->getLembrete($idLembrete);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($dados));
	}

	public function delete($idLembrete){
		$this->load->library('core_lib');
		$this->load->model('lembretes_model');

		$this->lembretes_model->atualizaLembrete($idLembrete, array(
			'status' => false
		));

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode('deleted'));
	}

	public function alerta(){
		$this->load->model('lembretes_model');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(
				$this->lembretes_model->getAlertaLembretes()
			));
	}
	
	private function fillLembrete($dados){
		$alerta = "";
		if (isset($dados['alerta']) && $dados['alerta'] == 'true'){
			$alerta = Date::dateHtmlToSql($dados['dataAlerta']);
		}
		return array(
			'titulo' => isset($dados['titulo']) ? $dados['titulo'] : '',
			'conteudo' => isset($dados['conteudo']) ? $dados['conteudo'] : '',
			'cor' => isset($dados['cor']) ? $dados['cor'] : '',
			'alerta' => $alerta,
		);
	}

}
