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

	public function lista(){
		$this->load->library('core_lib');
		$this->load->model('mural_model');

		$dados = $this->mural_model->getLista();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($dados));
	}

	public function obtem($idMural)
	{
		$this->load->library('core_lib');
		$this->load->model('mural_model');

		$dados = $this->mural_model->getMural($idMural);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($dados));
	}

	public function salva()
	{
		$this->output->set_content_type('application/json');
		$this->load->model('mural_model');

		$dados = $this->fillModal($this->input->post());
		if ($this->input->post('idMural')) {
			$this->mural_model->atualizaMural(
				$this->input->post('idMural'),
				$dados
			);
		} else {
			$this->mural_model->gravaMural($dados);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode('created'));
	}


	private function fillModal($dados)
	{
		return array(
			'titulo' => $dados['titulo'],
			'conteudo' => $dados['conteudo'],
			'criticidade' => $dados['criticidade'],
			'data_inicio' => Date::dateHtmlToSql($dados['inicio']),
			'data_fim' => Date::dateHtmlToSql($dados['fim']),
			'ministerio' => $this->session->userdata('user')->ministerio,
			'status' => 1,
			'user_cadastro' => $this->session->userdata('user')->id

		);
	}


}
