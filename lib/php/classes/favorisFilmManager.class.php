<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of favorisFilmManager
 *
 * @author Spymannn
 */
class FavorisFilmManager extends FavorisFilm {

    private $_db;
    private $_favorisFilmsArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeFavorisFilms($id) {
        try {
            $query = "select * from favorisfilm where iduser = :iduser";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id, PDO::PARAM_INT);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_favorisFilmsArray[] = new FavorisFilm($data);
        }
        return $_favorisFilmsArray;
    }

    public function addFavoris($idUser, $idFilm) {
        //var_dump($data);
        $query = "select addFavoris (:iduser,:idfilm) as retour";
        try {
            //$id=null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $idFilm, PDO::PARAM_INT);
            $statement->bindValue(2, $idUser, PDO::PARAM_INT);
            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion : " . $e;
            $retour = 0;
            return $retour;
        }
    }

}
