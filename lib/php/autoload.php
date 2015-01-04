<?php

function autoload($nom_classe) {
    if(file_exists('./lib/php/classes/'.$nom_classe.'.class.php')) {
        require './lib/php/classes/'.$nom_classe.'.class.php';
    }   
    
}
//fct qui appelle méthode d'autochargement des classes
spl_autoload_register('autoload');

?>

