<?php
if (isset($_GET['idFilm'])) {
    $s = $_GET['idFilm'];
}
if (isset($_POST['idFilm'])) {
    $s = $_POST['idFilm'];
}


$film = new FilmManager($db);
$filmDesc = $film->getFilm($s);

$type = new TypeManager($db);
$nomTypeFilm = $type->getNomType($filmDesc[0]->idtype);
/*
  for($i = 0;$i<count($saisons);$i++){
  if($saisons[$i]->idsaison == $s){
  $iS = $saison[$i]->idserie;
  break;
  }
  }
 */
?>
<h1 style="text-align: center;"><?php print $filmDesc[0]->titrefilm; ?></h1>

<img src="images/film/<?php print $filmDesc[0]->idfilm; ?>.jpg" alt="<?php print $filmDesc[0]->nomfilm; ?>" id="imageSerieSaison" style="border: 1px #000 solid;"/>
<div id="typeGroupe">


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Type</h3>
        </div>
        <div class="panel-body">
            <?php print $nomTypeFilm; ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Durée</h3>
        </div>
        <div class="panel-body">
            <?php print $filmDesc[0]->dureefilm; ?>  </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Date de sortie en salle</h3>
        </div>
        <div class="panel-body">
            <?php print $filmDesc[0]->datesortiefilm; ?>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Synopsis et détails </h3>
        </div>
        <div class="panel-body">
            <?php print $filmDesc[0]->descfilm; ?>
        </div>
    </div>

    

</div>
<nav>
        <ul class="pager">
            <li><a href="index.php?page=films" style="color: rgb(118,131,167);"
                   data-toggle="tooltip" data-placement="bottom" title="Retour à la page de série">Précedent</a></li>
        </ul>
    </nav>