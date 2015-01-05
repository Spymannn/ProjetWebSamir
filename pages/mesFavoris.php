<?php

$favoris = new FavorisFilmManager($db);
$listeFavoris = $favoris->getListeFavorisFilms($_SESSION['user']);

$film = new FilmManager($db);
if(count($listeFavoris)>0){

?>
<div class="list-group">
  <a href="#" class="list-group-item disabled">
    Mes films favoris
  </a>
<?php 
for($i=0;$i<count($listeFavoris);$i++){
    $filmRech = $film->getFilm($listeFavoris[$i]->idfilm);
?>
  <a href="index.php?page=descFilm&amp;idFilm=<?php print $filmRech[0]->idfilm;?>" class="list-group-item">
      <?php print $filmRech[0]->titrefilm;?>
  </a>

<?php 
}

?>
</div>
<?php
}
else{
    ?>
<div class="alert alert-danger" role="alert">Vous n'avez pas de favoris !</div>
<?php
}
?>