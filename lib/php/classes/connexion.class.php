<?php
//singleton : à tout moment , un seul ovbjet ne peut exister
class Connexion {

    private static $_instance = null;

    public static function getInstance($dsn, $user, $pass) {
        // :: = appel à une var ou fct statique  

        if (!self::$_instance) {
            try {
                self::$_instance = new PDO($dsn, $user, $pass);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //print "Connect&eacute;";
                
            } catch (PDOException $e) {
                print "Erreur de connexion : ".$e->getMessage();
            }
        }
        return self::$_instance;
    }
}
?>