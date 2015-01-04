<h2 style="text-align: center;"> liste des séries </h2>

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



//Il faut à nouveau aller rechercher les informations ici
$mg = new SerieManager($db);
$data = $mg->getListeSerie();
$nbreSerie = count($data);

$sais = new SaisonManager($db);
$saisons = $sais->getListeSaison();
$nbreSaisonTot = count($saisons);




if(isset($_GET['tabSerie'])){
    $tab = $_GET['tabSerie'];
}
else if(isset($_POST['tabSerie'])){
   $tab=$_POST['tabSerie'];
}
else{
    $tab = $data;
}


$nbrePage = 0;
$nbreSaisonParSerie = array();
for ($j = 0; $j < $nbreSerie; $j++) {

    $saisonsSerie1 = $sais->getNbreSaisonSerie($data[$j]->idserie);
    //print $saisonsSerie1;
    $nbreSaisonParSerie[$j] = $saisonsSerie1;
}

if(isset($_GET['saisonsParSerie'])){
    $saisonPSerie = $_GET['saisonsParSerie'];
}
else if(isset($_POST['saisonsParSerie'])){
   $saisonPSerie=$_POST['saisonsParSerie'];
}
else{
    $saisonPSerie = $nbreSaisonParSerie;
}



   
    
if($nbreSerie<=10){
        for ($i = $s; $i < $nbreSerie; $i++) {
            ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><attr title="nombre de saisons"> <?php print $nbreSaisonParSerie[$i]; ?></attr></span>
                    <a href="index.php?page=saisons&amp;numSaison=<?php print $tab[$i]->idserie; ?>"><span id="serieTitre"><?php print $tab[$i]->nomserie; ?></span></a>


                </li>
            </ul>


            <?php
        }
    
}
else{
    if (isset($nbreSerie)) {
        for ($i = $s; $i < $s+9; $i++) {
            ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><attr title="nombre de saisons"> <?php print $saisonPSerie[$i]; ?></attr></span>

                    <a href="index.php?page=saisons&amp;numSaison=<?php print $data[$i]->idserie; ?>"><span id="serieTitre"><?php print $data[$i]->nomserie; ?></span></a>


                </li>
            </ul>


            <?php
        }
    }
    
    
    
    
    
    $nbrePage = ($nbreSerie / 10) + 1;

    ?>
    <nav style="text-align: center;">
        <ul class="pagination">
            <li>
                <a href="index.php?page=series&amp;idLastSerie=<?php print $s;?>&tabSerie=<?php $tab;?>&saisonsParSerie=<?php $saisonPSerie;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
    <?php
    for ($i = 1; $i < $nbrePage; $i++) {
        ?>
                <li><a href="#"><?php print $i; ?></a></li>
                <?php
            }
            ?>
            <li>
                <a href=index.php?page=series&amp;idLastSerie=<?php print $s+10;?>&tabSerie=<?php $tab;?>&saisonsParSerie=<?php $saisonPSerie;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <?php
}
?>

