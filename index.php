<!DOCTYPE html>
<?php
include ('./lib/php/liste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();


$scripts = array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i = 0;
foreach (glob('lib/js/jquery/*.js') as $js) {
    $fichierJs[$i] = $js;
    $i++;
}
?>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Movie Show</title>
        <link rel="icon" type="image/png" href="./images/logo.ico" />


<?php
$jour = date("d");
$mois = date("m");
//$heure = date("H:i");
if (/* $mois == 12 OR */ $mois == 1 OR $mois == 2) {
    ?>
            <script type="text/javascript" src="lib/js/snowstorm-min.js"></script>
            <script>

                snowStorm.snowColor = '#eeeeff'; // blue-ish snow!?
                snowStorm.flakesMaxActive = 150;  // show more snow on screen at once
                snowStorm.flakesMax = 150;
                snowStorm.useMeltEffect = true; // let the snow flicker in and out of view
                snowStorm.autoStart = true;
                snowStorm.animationInterval = 30;
            </script>        


<?php }
?>





        <!-- Bootstrap -->
        <link href="lib/css/bootstrap.min.css" rel="stylesheet">

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="lib/css/style_pc.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/mediaqueries.css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="page">
            <header>
                <?php
                if (isset($_POST['go'])) {
                    header('Location: http://localhost/MovieShow/index.php?page=recherche&titreRech='.$_POST['titre']);
                }
                ?>
                <form method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">
                    <div id="recherche">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for..." name="titre">
                            <span class="input-group-btn" >
                                <button class="btn btn-default" type="submit" name="go">Go!</button>
                            </span>
                        </div>
                    </div>
                </form>
            </header>

            <!-- Menu -->
            <ul class="nav nav-pills nav-justified" id="menu">
<?php
if (file_exists('./lib/php/menu.php')) {
    include ('./lib/php/menu.php');
}
?>
            </ul>

            <!-- pub -->

            <aside id="pub">
<?php
if (file_exists('./pages/pub.php')) {
    include './pages/pub.php';
} else {
    echo "un problème technique est survenu";
}
?>
            </aside>
            <!-- Contenu -->
            <section id="contenu">
                <div id="main">
<?php
if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = "accueil";
}
if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
}
$chemin = './pages/' . $_SESSION['page'] . '.php';
if (file_exists($chemin)) {
    include ($chemin);
}
?>   
                   
                </div>	
            </section>
        </div>
 <div id="megaBas">
	
	<?php
	if(file_exists('./lib/php/menuBas.php'))
	{
		include './lib/php/menuBas.php';
	}
	else
	{
		echo "le fichier n'existe pas !";
	}
   
   ?>
 </div>

        <footer>Editeur programmeur samir.hanini@condorcet.be MovieShow</footer>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="lib/js/bootstrap.min.js"></script>


    </body>
</html>