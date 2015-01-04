<?php
//Inclusion de la librairie fpdf
require '../lib/php/fpdf/fpdf.php';
require '../lib/php/db_pg.php';
//classes qu'on va se servir
require '../lib/php/classes/connexion.class.php';
require '../lib/php/classes/film.class.php';
require '../lib/php/classes/filmManager.class.php';
require '../lib/php/classes/type.class.php';
require '../lib/php/classes/typeManager.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

//Il faut à nouveau aller rechercher les informations ici
$film = new FilmManager($db);
$listeFilm = $film->getListeFilm();


/**
 * Voir le site fpdf.org et dans manuel on a toutes
 * les fonctions qui pourraient être utilisées
 */
//Instanciation d'un objet fpdf, paramètre optionnel
// P = portrait (format portrait, L pour landscape)
//cm pour travailler en cm
//et pour avoir au format A4
$pdf=new FPDF('P','cm','A4');
//ensuite on travaille direct sur notre objet pdf
//ici on prends notre bic, aria, b = bold, taille 14
$pdf->SetFont('Times','B',14);
//on prends la 1ére page et on commence au début
$pdf->AddPage();
//coordonnées où on commence à écrire dans la page (3cm du début de la page
//en coordonnées de x)
$pdf->SetX(2.5);
// on a une cellule, 3.5 = largeur de la cellule, 1 hauteur
//texte qu'on veut voir apparaitre, 0 = bordure ou pas, 0 aussi, L = 
//aligner ça à gauche : L pour left
$pdf->cell(3.5,1,'Liste films',0,0,'L');	
//header premier pas requis mais ici c'est le remplissage  
//ici on a un remplissage en rouge de la colonne inventaire
//paramètre RVB dans le SetFillColor 
$pdf->SetFillColor(118,131,167);
//défini la couleur d'encadré normalement mais on a mis 0 dans $pdf->cell
$pdf->SetDrawColor(0,0,255);
//Couleur du texte
$pdf->SetTextColor(255,255,255); 
//positionnement de la cellule en x et y ici
$pdf->SetXY(2.5,2); // coordonnées bord supérieur gauche
//là on dessine la cellule .7 = 7 mm
$pdf->cell(16.5,.7,utf8_decode('Liste complètes des films du site'),0,0,'L',1);

//on rechange la couleur de fond ==> couleur  blanche ici
$pdf->SetFillColor(255,255,255);
//si encadré il y a, c'est noir
$pdf->SetDrawColor(0,0,0);
$pdf->SetTextColor(0,0,0); 

//on positionne les titres de colonnes en x et y
$x=2.5; $y=3;
$pdf->SetXY($x, $y);
//redéfinition de l'écriture
$pdf->SetFont('Times','B',12);
$den = utf8_decode('Nom du film');
$pdf->cell(5.5,.7,$den,0,'C',1,1);
//ici on se décale pour l'autre titre
$pdf->SetXY($x+5,$y);
$pdf->cell(5,.7,'Type',0,'C',1,1);
$pdf->cell(4.5,.7,'Date sortie',0,'C',1,1);
$pdf->cell(5,.7,'Affiche',0,'C',1,1);
$pdf->SetFont('Arial','',12);


$y++;
//ici on fait une boucle, avec x et y déjà défini
//la variable, il suffit de pas mettre de côte, on va récupérer dans le 
//$data, il vient de la  base de données quand on a fait appel
// à la classe ChenilManager avec la méthode getListeConfort()
//$data = contenu de la vue
$x = 2.5;
for($i=0;$i<count($listeFilm);$i++) {
    $pdf->SetXY($x, $y);
    $pdf->SetFont('Times','',10);
    $pdf->cell(5,3.7,utf8_decode($listeFilm[$i]->titrefilm),1,'C',1,1);
    $pdf->SetFont('Times','',12);
    $pdf->SetXY($x+5,$y);
    //ici si c'est vide on fait un affichage special si pas on mets ce qui a
    //dans le resultSet ($data)
    $type = new TypeManager($db);
    $typeNom = $type->getNomType($listeFilm[$i]->idfilm);
    $pdf->Cell(5,3.7,utf8_decode($typeNom),1,'C',1,1);
    $pdf->SetXY($x+9.5,$y);
    $pdf->Cell(3,3.7,$listeFilm[$i]->datesortiefilm,1,'C',1,1);
    $pdf->SetXY($x+3,$y);
    
    $ajout=$pdf->Image('../images/petitFilms/'.$listeFilm[$i]->idfilm.'.jpg',16.5,$y);
    //$pdf->cell(3,5,"",1,'C',1,1);
    //$pdf->MultiCell(15.5,5,'',1,1,'L',1,1);			//idem
    //entre chaque ligne du resultSet, on veut un espace de 0.7
    $y+=3.7;
    if($i>2 AND ($i%5)==0){
        $pdf->AddPage("P","A4"); 
        $x = 2.5;
        $y = 2;
    }
}
//et on envoi tout ça en output();
$pdf->output();
