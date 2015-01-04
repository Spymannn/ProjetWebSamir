<?php

    $serie = new SerieManager($db);
    $listeSerie = $serie->getListeSerie();
    
    $rand1 = rand(0,count($listeSerie)-1);
    $rand2 = rand(0,count($listeSerie)-1);
    $rand3 = rand(0,count($listeSerie)-1);
?>
<div class="jumbotron">
  <h3 style="text-align: center;">Bienvenue sur Movie Show!</h3>
  <p>Movie Show est un site qui regroupe des séries télé (animations, TV show, ...)
  et des films afin que vous puissez découvrir de nouveaux films, de nouvelles séries, 
  de nouveaux genre. Movie Show vous permet également de suivre vos séries préférées.
  Bonne visite sur Movie Show!</p>
</div>
<h6 style="text-align: center;">Découvrez vite ces séries !</h6>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom: 20px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active" ></li>
    <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="background-color: black;">
    <div class="item active" >
        <a href="index.php?page=saisons&amp;numSaison=<?php print $listeSerie[$rand1]->idserie;?>">
      <img src="images/serie/<?php print $listeSerie[$rand1]->idserie;?>.jpg" alt="<?php print $listeSerie[$rand1]->nomserie;?>"style="margin:0 auto">
        </a>
      <div class="carousel-caption">
        <?php print $listeSerie[$rand1]->nomserie;?>
      </div>
    </div>
    <div class="item">
        <a href="index.php?page=saisons&amp;numSaison=<?php print $listeSerie[$rand2]->idserie;?>">
      <img src="images/serie/<?php print $listeSerie[$rand2]->idserie;?>.jpg" alt="<?php print $listeSerie[$rand2]->nomserie;?>" style="margin:0 auto">
        </a>
      <div class="carousel-caption">
        <?php print $listeSerie[$rand2]->nomserie;?>
      </div>
    </div>
      
      <div class="item">
        <a href="index.php?page=saisons&amp;numSaison=<?php print $listeSerie[$rand3]->idserie;?>">
      <img src="images/serie/<?php print $listeSerie[$rand3]->idserie;?>.jpg" alt="<?php print $listeSerie[$rand3]->nomserie;?>" style="margin:0 auto">
        </a>
      <div class="carousel-caption">
        <?php print $listeSerie[$rand3]->nomserie;?>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>