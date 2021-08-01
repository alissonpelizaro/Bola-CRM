<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mural_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('murais');
	}

	public function getMural($idMural){
		$ministerio = $this->session->userdata('user')->ministerio;

		$this->db->select('*');
		$this->db->from($this->getTabela());
		$this->db->where('id', $idMural);
		$this->db->where('ministerio', $ministerio);
		$this->db->where('status', 1);

		return $this->db->get()->row();
	}
	
	public function getMurais(){
		$ministerio = $this->session->userdata('user')->ministerio;
		 
		$this->db->select('*');
		$this->db->from($this->getTabela());
		$this->db->where('ministerio', $ministerio);
		$this->db->where('data_inicio <=', date("Y-m-d"));
		$this->db->where('data_fim >=', date("Y-m-d"));
		$this->db->where('status', 1);

		return $this->db->get()->result();
	}

	public function getLista(){
		$ministerio = $this->session->userdata('user')->ministerio;

		$this->db->select($this->getTabela().'.* , user.nome, user.sobrenome');
		$this->db->from($this->getTabela());
		$this->db->where($this->getTabela().'.ministerio', $ministerio);
		$this->db->where($this->getTabela().'.status', 1);
		$this->db->join('user', $this->getTabela().'.user_cadastro = user.id');
		$this->db->order_by($this->getTabela() . '.data_cadastro', 'DESC');

		return $this->db->get()->result();
	}

	public function atualizaMural($id, $dados){
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->where('ministerio',$this->session->userdata('user')->ministerio);

		return $this->db->update($this->getTabela());
	}

	public function gravaMural($dados){	
		return $this->db->insert($this->getTabela(), $dados);
	}

}
