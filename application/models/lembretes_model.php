<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembretes_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('lembretes');
	}

	public function getLembrete($idLembrete){
		$user = $this->session->userdata('user')->id;

		$this->db->select('*');
		$this->db->from($this->getTabela());
		$this->db->where('id', $idLembrete);
		$this->db->where('id_user', $user);
		$this->db->where('status', 1);

		return $this->db->get()->row();
	}
	
	public function getLembretes(){
		$user = $this->session->userdata('user')->id;
		 
		$this->db->select('*');
		$this->db->from($this->getTabela());
		$this->db->where('id_user', $user);
		$this->db->where('status', 1);

		return $this->db->get()->result();
	} 	

	public function atualizaLembrete($id, $dados){
		$this->db->set($dados);
		$this->db->where('id', $id);
		$this->db->where('id_user',$this->session->userdata('user')->id);

		return $this->db->update($this->getTabela());
	}

	public function getAlertaLembretes(){
		$user = $this->session->userdata('user')->id;

		$this->db->select('*');
		$this->db->from($this->getTabela());
		$this->db->where('id_user', $user);
		$this->db->where('alerta != ', '0000-00-00 00:00:00');
		$this->db->where('alerta <=', date("Y-m-d H:i:s"));
		$this->db->where('status', 1);

		return $this->db->get()->result();
	}
	
	public function gravaLembrete($dados){
		$dados['id_user'] = $this->session->userdata('user')->id;
		$dados['status'] = true;
		$dados['data_cadastro'] = date('Y-m-d H:i:s'); 
		
		return $this->db->insert($this->getTabela(), $dados);
	}

}
