<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembretes_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('lembretes');
	}
	
	public function getLembretes(){
		$user = $this->session->userdata('user')->id;
		 
		$this->db->select('*');
		$this->db->from($this->getTabela());
		$this->db->where('id_user', $user);
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
