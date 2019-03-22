<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends My_model {

	function __construct(){
		parent::__construct();
		$this->setTabela('user');
	}

	public function checkLogin($user, $pass){
	 	$ret = $this->db->get_where('user', [
			'login' => $user,
			'senha' => $pass
		]);

		if($ret->num_rows() == 0){
			return false;
		}
		$ret = $ret->result();
		return $ret[0];
	}

	public function setUserToken($token){
		$this->db->set('token', $token);
		$this->db->where('idUser', $this->session->userdata('id'));

		if($this->db->update('user')){
			return true;
		}
		return false;
	}

	public function getTimeoutConfig(){
		$ret = $this->db->get_where('licenca', [
			'chave' => 1
		]);
		$ret = $ret->result();

		return $ret[0]->timeoutSessao;

	}

	public function deslogar($id){
		$this->db->set('logged', 0);
		$this->db->where('idUser', $id);

		if($this->db->update('user')){
			return true;
		}

		return false;
	}

}
