<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filmManager
 *
 * @author Spymannn
 */
class FilmManager {
     private $_db;
    private $_filmArray=array();
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function getListeFilm(){
        $query="select * from film ";
        $resultset = $this->_db->prepare($query);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_filmArray[] = new Film($data);
        }
        return $_filmArray;
    }
    
     public function getFilm($id){
        $query="select * from film where idfilm = :idfilm";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$id,PDO::PARAM_INT);
        $resultset->execute();
       
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_filmArray[] = new Film($data);
        }
        return $_filmArray;
    }
     public function getListeFilmRecherche($nom){
        $query="select * from film where upper(titrefilm) LIKE upper(:titrefilm)";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$nom,PDO::PARAM_INT);
        $resultset->execute();
       
        $_filmArray = array();
        $nbr=$resultset->rowCount();
        
        while($data = $resultset->fetch()) {
            $_filmArray[] = new Film($data);
        }
        return $_filmArray;
    }
    
    
}
