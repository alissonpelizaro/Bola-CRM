<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('user');
	}

	public function obtemLista($lista){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where_in('id', $lista);
		$this->db->where('ministerio', $this->session->userdata('user')->ministerio);

		return $this->db->get()->result();
	}

}
