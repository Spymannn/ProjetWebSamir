<h2 style="text-align: center;"> Séries</h2>

<p style="text-align: center;">
    Imprimer la liste complète dès maintenant en cliquant ici :
    <a href="./pages/print_series.php" style="color: black;">
        <img src="images/pub/pdf.png" alt="pdf"/>

    </a>
</p>


<?php



if(isset($_GET['idLastSerie']))
{
   /*echo "<br/>".$_GET['descr'];*/
   $s=$_GET['idLastSerie'];
}
else if(isset($_POST['idLastSerie'])){
   $s=$_POST['idLastSerie'];
}
else{
    $s = 1;
}

$mg = new SerieManager($db);
$data = $mg->getListeSerie();

$sais = new SaisonManager($db);
$saisons = $sais->getListeSaison();
$nbreSaisonTot = count($saisons);


//recupération de la limite
if(isset($_GET['numPage']))
{
   /*echo "<br/>".$_GET['descr'];*/
  $pageCourante=$_GET['numPage'];
}
else if(isset($_POST['numPage'])){
   $pageCourante=$_POST['numPage'];
}
else{
    $pageCourante = 1;
}
//Il faut à nouveau aller rechercher les informations ici

$nbreParPage = 6;
$nbreSerieTot = count($data);
$nbrePage = ceil($nbreSerieTot / $nbreParPage);
 
$tabAffiche = $mg->getListeSerieLimite($nbreParPage,($pageCourante-1)*$nbreParPage);
//print count($tabAffiche);

$nbreSaisonParSerie = array();
for ($j = 0; $j < count($tabAffiche); $j++) {

    $saisonsSerie1 = $sais->getNbreSaisonSerie($tabAffiche[$j]->idserie);
    $nbreSaisonParSerie[$j] = $saisonsSerie1;
}

//var_dump($tabAffiche);
for($i=0;$i<count($tabAffiche);$i++){
?>

<ul class="list-group">
    <li class="list-group-item">
        <span class="badge"><attr title="nombre de saisons"> <?php print $nbreSaisonParSerie[$i]; ?></attr></span>
        <a href="index.php?page=saisons&amp;numSaison=<?php print $tabAffiche[$i]->idserie; ?>"><span id="serieTitre"><?php print $tabAffiche[$i]->nomserie; ?></span></a>

    </li>
</ul>
<?php }
?>


<nav style="text-align: center;">
    <ul class="pagination">
        <?php
        if($pageCourante>1){ ?>
        <li>
            <a href="index.php?page=series&amp;numPage=<?php print $pageCourante-1;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        }
        for ($i = 1; $i <= $nbrePage; $i++) {
            ?>
            <li><a href="index.php?page=series&amp;numPage=<?php print $i;?>"><?php print $i; ?></a></li>
            <?php
        }
        if($pageCourante!=$nbrePage){
        ?>
        <li>
            <a href="index.php?page=series&amp;numPage=<?php print $pageCourante+1;?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <?php } ?>
    </ul>
</nav>














