<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_lib {
  private $CI;

  function __construct(){
    $this->CI =& get_instance();
    $this->checaAutenticacao();
  }

  private function checaAutenticacao(){
    if(!$this->CI->session->userdata('user')) {
      redirect('../login?unlogged=timeout');
      die;
    }
  }

}
