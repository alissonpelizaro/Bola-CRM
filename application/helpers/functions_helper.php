<?php

function getRelativeFile(){
    if(isset($_SERVER['PATH_INFO'])){
        $pathExp = explode('/', $_SERVER['PATH_INFO']);
        if (count($pathExp) > 1){
            return $pathExp[1];
        }
    }
    return '';
}




  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
