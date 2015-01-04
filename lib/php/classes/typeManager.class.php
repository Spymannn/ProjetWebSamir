<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeManager
 *
 * @author Spymannn
 */
class TypeManager {
    private $_db;
    private $_typeArray=array();
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function getListeType(){
        $query="select * from type";
        $resultset = $this->_db->prepare($query);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_typeArray[] = new Type($data);
        }
        return $_typeArray;
    }
    
    public function getNomType($id){
        $query="select nomtype from type where idtype = :idtype";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
        
        $nomType = $resultset->fetchColumn();
        
        //$nomSerie = $resultset->
       
        return $nomType;
    }
    
}
