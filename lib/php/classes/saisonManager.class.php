<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of saisonManager
 *
 * @author Spymannn
 */
class SaisonManager extends Saison{
    //put your code  
    private $_db;
    private $_saisonArray=array();
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function getListeSaison(){
        $query="select * from saison ";
        $resultset = $this->_db->prepare($query);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_saisonArray[] = new Saison($data);
        }
        return $_saisonArray;
    }
    
    public function getNbreSaisonSerie($id){
        $query = "select idsaison from saison where idserie = :idserie ";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
        
        $nbr=$resultset->rowCount();
        if($nbr == 0)
            return 0;
        else
            return $nbr;
    }
    
    public function getSaisonsSerie($id){
        $query = "select numerosaison,idsaison from saison where idserie = :idserie order by numerosaison";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
        
         while($data = $resultset->fetch()) {
            $_saisonArray[] = new Saison($data);
        }
        return $_saisonArray;
    }
}
