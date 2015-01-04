<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serieManager
 *
 * @author Spymannn
 */
class SerieManager {
     private $_db;
    private $_serieArray=array();
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function getListeSerie(){
        $query="select * from serie ";
        $resultset = $this->_db->prepare($query);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_serieArray[] = new Serie($data);
        }
        return $_serieArray;
    }
    
    public function getSerie($id){
        $query="select * from serie where idserie = :idserie";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_serieArray[] = new Serie($data);
        }
        return $_serieArray;
        
    }
    
    public function getListeSerieRecherche($nom){
        $query="select * from serie where upper(nomserie) LIKE upper(:nomserie)";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$nom,PDO::PARAM_INT);
        $resultset->execute();
       
        $_serieArray = array();
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_serieArray[] = new Serie($data);
        }
        return $_serieArray;
    }
    /*public function getListeConfort() {
        $query="select * from vue_chenil order by id_confort";
        $resultset = $this->_db->prepare($query);
        $resultset->execute();
        
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()){
            $_chenilArray[] = new Chenil($data);
        }
        return $_chenilArray;
    }*/
}
