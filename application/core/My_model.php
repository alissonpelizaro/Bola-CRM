<?php

/**
* Instruções default do MyOmni
*/
class My_model extends CI_model{

  private $tabela;

  public function setTabela($tabela){
    $this->tabela = $tabela;
  }

  public function getTabela(){
    return $this->tabela;
  }

  public function getQuery($filtro = false, $retorno = false, $intruct = false){

    if(!$this->tabela){
      return false;
    }

    $ret = "*";
    if($retorno){
      $ret = "";
      foreach ($retorno as $r) {
        if($ret != ""){
          $ret .= ", ";
        }
        if(strpos($r, "(") !== false){
          $ret .= $r;
        } else {
          $ret .= "`".$r."`";
        }
      }
    }

    $sql = "SELECT $ret FROM `".$this->tabela."`";
    if($intruct){
      $sql .= " WHERE ".$intruct;
    } else if($filtro){
      $instruc = $this->getInstrucao($filtro);
      if($instruc){
        $sql .= " WHERE ".$instruc;
      }
    }

    $ret = $this->db->query($sql);
    $ret = $ret->result();

    return $ret;
  }

  private function getInstrucao($array){

    if($array){
      $ret = "";
      $inds = array_keys($array);
      foreach ($inds as $k) {
        $val = $array[$k];
        if($ret != ""){
          $ret .= " AND ";
        }
        if(is_array($val)){
          $ret .= "`".$k."` ".$val[0]." '".$val[1]."'";
        } else {
          $ret .= "`".$k."` = '".$val."'";
        }
      }
      return $ret;
    }
    return false;
  }

}

?>
