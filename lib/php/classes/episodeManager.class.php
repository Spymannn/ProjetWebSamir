<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EpisodeManager
 *
 * @author Spymannn
 */
class EpisodeManager {
    //put your code  
    private $_db;
    //private $_episodeArray=array();
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function getListeEpisode(){
        $query="select * from episode ";
        $resultset = $this->_db->prepare($query);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_episodeArray[] = new Episode($data);
        }
        return $_episodeArray;
    }
    
    public function getNbreEpisodeSaison($id){
        $query = "select idepisode from episode where idsaison= :idsaison ";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
        
        $nbr=$resultset->rowCount();
        if($nbr == 0)
            return 0;
        else
            return $nbr;
    }
    
    public function getListeEpisodeSaison($id){
        $query = "select * from episode where idsaison = :idsaison order by numeroepisode";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
        $_episodeArray = array();
        $nbr = $resultset->rowCount();
        if($nbr>0){
         while($data = $resultset->fetch()) {
            $_episodeArray[] = new Episode($data);
        }
        }
        return $_episodeArray;
    }
}
