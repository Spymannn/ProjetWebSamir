<?php

if(isset($_GET['titreRech']))
{
   /*echo "<br/>".$_GET['descr'];*/
   $s=$_GET['titreRech'];
}
if(isset($_POST['titreRech'])){
   $s=$_POST['titreRech'];
}

//print $s;


$s = substr_replace($s,"%",0,0);
$s = substr_replace($s,"%",strlen($s),1);
//print $s;
$i = 0;
do{
    if($s[$i] == ' '){
        $s = substr_replace($s,"%",$i,1);
    }
    $i++;
}while($i<strlen($s));

//print $s;

$film = new FilmManager($db);
$rechFilm = $film->getListeFilmRecherche($s);

$serie = new SerieManager($db);
$rechSerie = $serie->getListeSerieRecherche($s);





if (count($rechFilm) > 0) {
    ?>
        <div class="list-group">
      <a href="#" class="list-group-item disabled">
        Liste des films trouvés
      </a>
     
    <?php
    for ($i = 0; $i < count($rechFilm); $i++) {
        ?>
            
        <a href="index.php?page=descFilm&amp;idFilm=<?php print $rechFilm[$i]->idfilm;?>" class="list-group-item"><?php print $rechFilm[$i]->titrefilm; ?> </a>
    <?php
}
?>
</div>
<?php
}
else{?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Aucun film trouvé
</div>
<?php
}
if(count($rechSerie)>0){
    ?>
    <div class="list-group">
  <a href="#" class="list-group-item disabled">
    Liste des séries
  </a>

    <?php
for($i=0;$i<count($rechSerie);$i++){
    ?>
     <a href="index.php?page=saisons&amp;numSaison=<?php print $rechSerie[$i]->idserie;?>" class="list-group-item"><?php print $rechSerie[$i]->nomserie;?></a>
    
  <?php  
}
?>
</div>
<?php
}
else{
    ?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Aucune série trouvée
</div>
    <?php
}
?>