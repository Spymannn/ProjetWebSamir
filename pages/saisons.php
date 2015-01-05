<?php
if(isset($_GET['numSaison']))
{
   /*echo "<br/>".$_GET['descr'];*/
   $s=$_GET['numSaison'];
}
if(isset($_POST['numSaison'])){
   $s=$_POST['numSaison'];
}

$ser = new SerieManager($db);
$serie = $ser->getSerie($s);

$sais = new SaisonManager($db);
$listeSaison = $sais->getSaisonsSerie($s);

$type = new TypeManager($db);
$nomType = $type->getNomType($serie[0]->idtype);





//test type
//print $nomType;
//test nom
//print $serie[0]->nomserie;
//test chaine
//print $serie[0]->chaineserie;


//print $serie[0]->idserie;
?>
<h1 style="text-align: center;"><?php print $serie[0]->nomserie; ?></h1>


<img src="images/serie/<?php print $serie[0]->idserie; ?>.jpg" alt="<?php print $serie[0]->nomserie; ?>" id="imageSerieSaison" style="border: 1px #000 solid;"/>
<div id="typeGroupe">


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Type</h3>
        </div>
        <div class="panel-body">
            <?php print $nomType; ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Chaîne</h3>
        </div>
        <div class="panel-body">
            <?php print $serie[0]->chaineserie; ?>  </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Synopsis</h3>
        </div>
        <div class="panel-body">
            <?php print $serie[0]->synopsis; ?>
        </div>
    </div>

    <div class="list-group">
        <a href="#" class="list-group-item disabled">
            Saisons
        </a>
        <?php 
            for($i = 0;$i<count($listeSaison);$i++){?>

            <a href="index.php?page=episode&amp;idSaisonEpisode=<?php print $listeSaison[$i]->idsaison;?>&amp;idSerieSaison=<?php print $s;?>" class="list-group-item">
                        <?php print "Saison ".$listeSaison[$i]->numerosaison;?>
            </a>
        <?php
            }
        ?>
        
        
    </div>

</div>

<nav>
        <ul class="pager">
            <li><a href="index.php?page=series" style="color: rgb(118,131,167);"
                   data-toggle="tooltip" data-placement="bottom" title="Retour à la page de série">Menu séries</a></li>
        </ul>
    </nav>
    
