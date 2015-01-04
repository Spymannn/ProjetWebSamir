<?php
if (isset($_GET['idSaisonEpisode'])) {
    $s = $_GET['idSaisonEpisode'];
}
if (isset($_POST['idSaisonEpisode'])) {
    $s = $_POST['idSaisonEpisode'];
}

if (isset($_GET['idSerieSaison'])) {
    $is = $_GET['idSerieSaison'];
}
if (isset($_POST['idSerieSaison'])) {
    $is = $_POST['idSerieSaison'];
}




$episode = new EpisodeManager($db);
$episodes = $episode->getListeEpisodeSaison($s);

$saison = new SaisonManager($db);
$saisons = $saison->getListeSaison();

/*
  for($i = 0;$i<count($saisons);$i++){
  if($saisons[$i]->idsaison == $s){
  $iS = $saison[$i]->idserie;
  break;
  }
  }
 */


if (count($episodes) > 0) {
    ?>


    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Saison <?php print $s; ?></div>

        <!-- Table -->
        <table class="table">
            <th>
            <td> Nom épisode </td>
            <td> Durée épisode</td>
            <td> Date sortie</td>
            </th>
    <?php
    for ($i = 0; $i < count($episodes); $i++) {
        ?>
                <tr>
                    <td><?php print $episodes[$i]->numeroepisode; ?></td>
                    <td><?php print $episodes[$i]->nomepisode; ?></td>
                    <td><?php print $episodes[$i]->dureeepisode; ?> minutes</td>
                    <td><?php print $episodes[$i]->datesortieepisode; ?></td>
                </tr>
        <?php
    }
    ?>
        </table>
    </div>

    <nav>
        <ul class="pager">
            <li><a href="index.php?page=saisons&amp;numSaison=<?php print $is; ?>" style="color: rgb(118,131,167);"
                   data-toggle="tooltip" data-placement="bottom" title="Retour à la page de série">Précedent</a></li>
        </ul>
    </nav>
    <?php
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        <a href="index.php?page=saisons&amp;numSaison=<?php print $is; ?>" class="alert-link">Pas d'épisodes trouvés pour cette saison</a>
    </div>


    <?php
}
?>