<?php

function getRelativeFile(){
    $pathExp = explode('/', $_SERVER['PATH_INFO']);
    if (count($pathExp) > 1){
        return $pathExp[1];
    }
    return '';
}