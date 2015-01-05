<?php
class UserManager extends User {
    private $_db;
    private $_userArray=array();
    
    public function __construct($db) {
        $this->_db = $db;      
    }
    
    public function getUser($pseudo){
        $query="select * from utilisateur where pseudouser = :pseudouser";
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(1,$pseudo,PDO::PARAM_INT);
        $resultset->execute();
        $nbr=$resultset->rowCount();
        while($data = $resultset->fetch()) {
            $_userArray[] = new User($data);
        }
        return $_userArray;
    }
    public function isUser($login,$password) {
        $retour=array();
        try {
            //as retour c'est ce qui etait retourné par la fonction
            //verifier_admin
            $query="select verif_user(:pseudouser,:mdpuser) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':pseudouser',$_POST['login']);
            $sql->bindValue(':mdpuser',md5($_POST['password']));  
            $sql->execute();
            $retour = $sql->fetchColumn(0);                     
        } catch(PDOException $e) {
            print "Echec de la requ&ecirc;te.".$e;
        }
        return $retour;
    }
}


