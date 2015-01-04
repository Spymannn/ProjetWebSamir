<h2 style="text-align: center;">Films </h2>

<p style="text-align: center;">
    Imprimer la liste complète dès maintenant en cliquant ici :
    <a href="./pages/print_films.php" style="color: black;">
        <img src="images/pub/pdf.png" alt="pdf"/>
    
    </a>
</p>
<?php
//Il faut à nouveau aller rechercher les informations ici
$mg = new FilmManager($db);
$data = $mg->getListeFilm();
$nbreFilm = count($data);

for ($i = 0; $i < $nbreFilm; $i++) {
    ?>
    <div class="media" >
        <!-- "media-left media-middle" -->
        <a class="media-left media-middle" href="index.php?page=videoFilms&amp;idMovie=<?php print $data[$i]->idfilm;?>">
            <img src="images/petitFilms/<?php print $data[$i]->idfilm; ?>.jpg" alt="<?php print $data[$i]->titrefilm; ?>">
        </a>

        <div class="media-body" >
            <h4 class="media-heading"><?php print $data[$i]->titrefilm; ?></h4>
            <?php
            $type = $data[$i]->idtype;
            $typeFilm = new TypeManager($db);
            $nomType = $typeFilm->getNomType($type);

            if ($type == 3 OR $type == 5 OR $type == 10 OR $type == 15) {
                ?>
                <span class="label label-default"><?php print $nomType; ?></span>
                <?php
            } else if ($type == 4 OR $type == 14 OR $type == 16) {
                ?>
                <span class="label label-primary"><?php print $nomType; ?></span>
                <?php
            } else if ($type == 2 OR $type == 9 OR $type == 11) {
                ?>
                <span class="label label-success"><?php print $nomType; ?></span>
                <?php
            } else if ($type == 7 OR $type == 13) {
                ?>
                <span class="label label-info"><?php print $nomType; ?></span>
                <?php
            } else if ($type == 8 OR $type == 12) {
                ?>
                <span class="label label-warning"><?php print $nomType; ?></span>
                <?php
            } else if ($type == 1 OR $type == 6) {
                ?>
                <span class="label label-danger"><?php print $nomType; ?></span>
                <?php
            } else {
                ?>
                <span class="label label-default"><?php print $nomType; ?></span>
                <?php
            }
            ?>
            <p>Date de sortie : <?php print $data[$i]->datesortiefilm; ?>.
                Durée <?php print $data[$i]->dureefilm; ?> minutes</p>
            <!-- Split button -->
                <div class="btn-group">
                        <?php
                        if ($type == 3 OR $type == 5 OR $type == 10 OR $type == 15) {
                            ?>
                            <button type="button" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php
                            } else if ($type == 4 OR $type == 14 OR $type == 16) {
                                ?>
                                <button type="button" class="btn btn-primary">Action</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php
                                } else if ($type == 2 OR $type == 9 OR $type == 11) {
                                    ?>
                                    <button type="button" class="btn btn-success">Action</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <?php
                                    } else if ($type == 7 OR $type == 13) {
                                        ?>
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <?php
                                        } else if ($type == 8 OR $type == 12) {
                                            ?>
                                            <button type="button" class="btn btn-warning">Action</button>
                                            <button type="button" class="btn btn-waring dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <?php
                                            } else if ($type == 1 OR $type == 6) {
                                                ?>
                                                <button type="button" class="btn btn-danger">Action</button>
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button type="button" class="btn btn-default">Action</button>
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <?php
                                                    }
                                                    ?>


                                                        <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="index.php?page=descFilm&amp;idFilm=<?php print $data[$i]->idfilm;?>">Description du film</a></li>
                                                            <li class="divider"></li>
                                                            <!-- if pas déjà dans ses favoris et user là -->
                                                            <li><a href="#">Ajouter à ses favoris</a></li>
                                                            
                                                        </ul>
                                                        </div> 
                                                        <!-- ****** -->
        </div>
    </div>
    <?php
}
?>


