<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('user');
	}

	public function checaLogin($user, $pass){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('login', $user);
		$this->db->where('senha', $pass);

		$ret = $this->db->get()->result();

		if($ret){
			return $ret[0];
		}

		return false;
	}

}
