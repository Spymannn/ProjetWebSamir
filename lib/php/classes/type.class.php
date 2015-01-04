<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of type
 *
 * @author Spymannn
 */
class Type {
     private $_attributs = array();
        
    public function __construct($data) {
        $this->hydrate($data);
    }
    
    public function hydrate(array $data){
        foreach($data as $key => $value){
            $this->$key = $value;
        }
    }
   
    public function __get($nom) {
        if(isset($this->_attributs[$nom])) {
            return $this->_attributs[$nom];
        }
    }
    
    public function __set($nom,$valeur) {
        $this->_attributs[$nom] = $valeur;
    }
}
