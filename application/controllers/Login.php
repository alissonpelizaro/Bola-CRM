<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		if(!$this->session->userdata('user')){
			$this->load->view('login');
		} else {
			redirect('../inicio');
		}
	}

	public function execLogin(){
		$this->load->model('login_model');
		$auth = $this->login_model->checaLogin(
			$this->input->post('usuario'),
			$this->input->post('senha')
		);
		if($auth){
			$this->session->set_userdata('user', $auth);
			redirect('../inicio');
		} else {
			redirect('../login?invalid=auth');
		}
	}

	public function unlogin(){
		$this->session->sess_destroy();
		redirect('../login');
	}


}
