<li role="presentation"><a href="index.php?page=accueil">Accueil</a></li>
<li role="presentation"><a href="index.php?page=films">Films</a></li>
<li role="presentation"><a href="index.php?page=series">Séries</a></li>





<?php
    if(isset($_SESSION['user'])){
?>
<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Mon Compte <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
       <li role="presentation"><a href="#">Mes favoris</a></li>
       <li role="menu"><a href="lib/php/deconnexion.php">Deconnexion</a></li>


    </ul>
  </li>
    <?php }
    else {
        ?>
<li role="presentation"><a href="index.php?page=connexion">Connexion</a></li> 
 <?php  }?>