<?php
if(isset($_GET['idMovie']))
{
   /*echo "<br/>".$_GET['descr'];*/
   $s=$_GET['idMovie'];
}
if(isset($_POST['idMovie'])){
   $s=$_POST['idMovie'];
}
$movie = new FilmManager($db);
$filmRech = $movie->getFilm($s);

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title" style="text-align: center;"><?php print $filmRech[0]->titrefilm;?></h3>
  </div>
  <div class="panel-body" style="text-align: center;">
      Bande annonce
      <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="videos/<?php print $s;?>.avi">test</iframe>
</div>
  </div>
</div>

<nav>
        <ul class="pager">
            <li><a href="index.php?page=films" style="color: rgb(118,131,167);"
                   data-toggle="tooltip" data-placement="bottom" title="Retour à la page de série">Précedent</a></li>
        </ul>
    </nav>