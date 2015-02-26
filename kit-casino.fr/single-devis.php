<?php 


require locate_template('fpdf17/fpdf.php');


class PDF extends FPDF
{
	// En-tête
	function Header()
	{
	    // Logo
	    $this->Image(get_template_directory_uri().'/img/logo.png', null,null,50);
	    $this->Ln();
	    // Police Arial gras 15
	    $this->SetFont('Arial', '',13);
	    // Décalage à droite
	    
	    // Titre
	    $this->Cell(50,10,'2 rue du bonheur', 0, 0, 'C');
	    $this->SetFont('Arial','B',16);
		$this->Cell(135,10,'Devis #1',0,0,'R');
	    $this->Ln();
	    $this->SetFont('Arial', '',13);
	    $this->Cell(50,5,'77185 LOGNES', 0, 0, 'C');
	    
		
	    // Saut de ligne
	    $this->Ln(20);
	}

	// Pied de page
	function Footer()
	{
	    // Positionnement à 1,5 cm du bas
	    $this->SetY(-15);
	    // Police Arial italique 8
	    $this->SetFont('Arial','I',8);
	    // Numéro de page
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}



}

$addition = get_field("champ1") + get_field("champ2");



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$tarifkit=get_field('tarif',56);
$tariflivraison=get_field('tarif',59);
$tarifjeusup=get_field('tarif',57);
$tarifdistancesup=get_field('tarif',58);
$nbjeusup=sizeof(get_field('jeux'))-2;
$nbjeutotal=sizeof(get_field('jeux'));
$recuperation=get_field('recuperation_du_kit');
$cautionkit=get_field('tarif',136);
$cautionjeusup=get_field('tarif',137);
$distancesup=get_field('distance>150km');

$pdf->SetFont('Arial','B',13);
$pdf->Cell(135,5,'');
$pdf->Cell(50,5,'CLIENT',0,0,'R');
$pdf->Ln(10);
$pdf->SetFont('Arial', '',13);
$pdf->Cell(135,5,'');
$pdf->Cell(50,5,get_the_title(),0,0,'R');
$pdf->Ln();
$pdf->Cell(135,5,'');
$pdf->Cell(50,5,get_field('adresse'),0,0,'R');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(135,5,'');
$pdf->Cell(50,5,get_field('telephone'),0,0,'R');
$pdf->Ln();
$pdf->Cell(135,5,'');
$pdf->Cell(50,5,get_field('email'),0,0,'R');

$pdf->Ln(15);
$pdf->SetFont('Arial', '',13);
$pdf->Cell(40,10,'Devis pour location de materiel de casino');
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,5,'Date de la location : ', 0,0,'R');
$pdf->SetFont('Arial', '',13);
$pdf->Cell(50,5,get_field('date_de_levenement'));
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,5,'Lieu de l evenement : ', 0,0,'R');
$pdf->SetFont('Arial', '',13);
$pdf->Cell(50,5,get_field('adresse_de_levenement'));
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,5,'Type d evenement : ', 0,0,'R');
$pdf->SetFont('Arial', '',13);
$pdf->Cell(50,5,get_field('type_devenement'));
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,5,'Retrait du materiel : ', 0,0,'R');
$pdf->SetFont('Arial', '',13);
$pdf->Cell(50,5,$recuperation);
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,5,'Nombre d invites : ', 0,0,'R');
$pdf->SetFont('Arial', '',13);
$pdf->Cell(50,5,get_field('nombre_dinvites'));
$pdf->Ln();



$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,0,'FACTURE',0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(80,10, 'Designation', 1,0);
$pdf->Cell(35,10,'Quantite',1,0);
$pdf->Cell(35,10,'Prix U. (euros)',1,0);
$pdf->Cell(35,10,'TOTAL (euros)',1,0);
$pdf->Ln();

$pdf->SetFont('Arial','',11);
$pdf->Cell(80,10, 'Kit (2 jeux au choix)', 1,0);
$pdf->Cell(35,10,'1',1,0);
$pdf->Cell(35,10,$tarifkit,1,0);
$pdf->Cell(35,10,$tarifkit,1,0,'R');
$pdf->Ln();

$pdf->Cell(80,10, 'Forfait livraison (jusqu a 150km allez-retour)', 1,0);
if ($recuperation=='livraison'){
	$pdf->Cell(35,10,'1',1,0);
}
else {
	$pdf->Cell(35,10,'0',1,0);
}
$pdf->Cell(35,10,$tariflivraison,1,0);
if ($recuperation=='livraison'){
	$pdf->Cell(35,10,$tariflivraison,1,0,'R');
}
else {
	$pdf->Cell(35,10,'0',1,0,'R');
}
$pdf->Ln();

$pdf->Cell(80,10, 'Jeu supplementaire', 1,0);
if ($nbjeutotal>2) {
	$pdf->Cell(35,10,$nbjeusup,1,0);
}
else {
	$pdf->Cell(35,10,'0',1,0);
}
$pdf->Cell(35,10,$tarifjeusup,1,0);
$pdf->Cell(35,10,$tarifjeusup*($nbjeusup),1,0,'R');
$pdf->Ln();

$pdf->Cell(80,10, 'Excedent forfait livraison (unite=km)', 1,0);
if ($recuperation=='livraison'){
	$pdf->Cell(35,10,$distancesup,1,0);
}
else {
	$pdf->Cell(35,10,'0',1,0);
}
$pdf->Cell(35,10,$tarifdistancesup,1,0);
if ($recuperation=='livraison'){
	$pdf->Cell(35,10,($distancesup*$tarifdistancesup),1,0,'R');
}
else {
	$pdf->Cell(35,10,'0',1,0, 'R');
}

$pdf->Ln();

$pdf->SetFont('Arial','B',11);
$pdf->Cell(150,10, '', 0,0);
if ($recuperation=='livraison') {
	$pdf->Cell(35,10,$tarifkit+$tariflivraison+($tarifjeusup*$nbjeusup)+($tarifdistancesup*$distancesup),1,0,'R');
}
else {
	$pdf->Cell(35,10,$tarifkit+($tarifjeusup*$nbjeusup),1,0,'R');
}


$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,0,'CAUTIONS',0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(80,10, 'Designation', 1,0);
$pdf->Cell(35,10,'Quantite',1,0);
$pdf->Cell(35,10,'Prix U. (euros)',1,0);
$pdf->Cell(35,10,'TOTAL (euros)',1,0);
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(80,10, 'Caution Kit', 1,0);
$pdf->Cell(35,10,'1',1,0);
$pdf->Cell(35,10,$cautionkit,1,0);
$pdf->Cell(35,10,$cautionkit,1,0,'R');
$pdf->Ln();
$pdf->Cell(80,10, 'Caution Jeu supplementaire', 1,0);
$pdf->Cell(35,10,$nbjeusup,1,0);
$pdf->Cell(35,10,$cautionjeusup,1,0);
$pdf->Cell(35,10,$cautionjeusup*($nbjeusup),1,0,'R');
$pdf->Ln();
$pdf->SetFillColor(5,5,5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(150,10, '', 0,0);
$pdf->Cell(35,10,($cautionjeusup*($nbjeusup))+($cautionkit),1,0,'R'); 
$pdf->Ln();



$pdf->Output();



/*class PDF extends FPDF
{

	function Header()
	{

		$this->Image(get_template_directory_uri().'/img/logo.png',10,6,40);
		$this->Ln(20);
	}

	function Footer()
	{

		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->SetTextColor(26,13,98);
		$this->Cell(0,5,"ASSOCIATION FRANCAISE DES TECHNICIENS DE L'ALIMENTATION ET DES PRODUCTIONS ANIMALES",0,2,'C');
		$this->Cell(0,5,"Association sans but lucratif Loi 1901",0,0,'C');
	}
}

if (isset($_GET['membre']) && isset($_GET['annee'])){

	$membre = get_post(htmlspecialchars($_GET['membre']));
	$annee = htmlspecialchars($_GET['annee']);
	
	if ($membre != null){
		$adhesions = get_field("adhesion", $membre->ID);
		$adhesion = null;
		foreach ($adhesions as $adhesion_test){
			if ($adhesion_test["annee"] == $annee){
				$adhesion = $adhesion_test;
			}
		}
		
		if ($adhesion == null){
			wp_redirect(get_permalink(8));
		}
		
		// RECU FORMATION
		$pdf = new PDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);


		$nom = get_field("nom_societe", $membre->ID);
		if ($nom == ""){
			$nom = get_field("nom", $membre->ID).' '.get_field("prenom", $membre->ID);
		}
		$adresse = get_field("adresse_societe", $membre->ID);
		$cp = get_field("code_postal_societe", $membre->ID);
		$ville = get_field("ville_societe", $membre->ID);
		$pays = get_field("pays_societe", $membre->ID);
		

		$pdf->setX(-100);
		$pdf->Cell(0,5,utf8_decode($nom),0,2);
		$pdf->Cell(0,5,utf8_decode($adresse),0,2);
		$pdf->Cell(0,5,utf8_decode($cp." ".$ville),0,2);
		$pdf->Cell(0,5,utf8_decode($pays),0,1);
		$pdf->Ln(20);

		$pdf->SetFont('Arial','B',15);
		$pdf->setFillColor(123, 182, 213);
		$pdf->Cell(0,10,utf8_decode('RECU'),1,1, 'C', true);

		$pdf->Ln(10);

		$pdf->SetFont('Arial','BI',15);
		$pdf->SetTextColor(26,13,98);
		$pdf->Cell(0,10,utf8_decode("COTISATION A L'AFTAA POUR L'ANNEE ".$annee),0,1, 'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',15);
		$pdf->SetTextColor(0,0,0);
		$pdf->setX(30);
		
		if (get_field("sexe", $membre->ID) == "homme"){
			$sexe = "M.";
		}
		else {
			$sexe = "Mme.";
		}

		$pdf->Cell(0,10,utf8_decode($sexe." ".get_field("nom", $membre->ID)." ".get_field("prenom", $membre->ID)),0,1);
		$pdf->Ln(10);

		$pdf->SetFont('Arial','I',12);
		$pdf->SetTextColor(26,13,98);
		$pdf->setX(30);
		$pdf->Cell(60,10,utf8_decode("N° d'adhésion"),0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(0,10,utf8_decode($adhesion["numero_adhesion"]),0,2);
		$pdf->SetFont('Arial','',10);
		$pdf->SetTextColor(26,13,98);
		$pdf->Cell(0,0,utf8_decode("(à rappeler dans toute correspondance)"),0,2);
		$pdf->Ln(5);

		$pdf->SetFont('Arial','I',12);
		$pdf->SetTextColor(26,13,98);
		$pdf->setX(30);
		$pdf->Cell(60,10,utf8_decode("Montant payé"),0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(0,10,utf8_decode(number_format($adhesion["montant"], 2, ",", ".")).chr(128),0,2);
		$pdf->Ln(5);

		$pdf->SetFont('Arial','I',12);
		$pdf->SetTextColor(26,13,98);
		$pdf->setX(30);
		$pdf->Cell(60,10,utf8_decode("Formule d'adhésion"),0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->SetTextColor(0, 0, 0);
		if ($adhesion["type"] == "IS"){
			$type = "Société Individuelle";
		}
		elseif ($adhesion["type"] == "S"){
			$type = "Société";
		}
		elseif ($adhesion["type"] == "I"){
			$type = "Individuelle";
		}
		elseif ($adhesion["type"] == "AD"){
			$type = "Administrateur";
		}
		else {
			$type = "Inconnu";
		}
		$pdf->Cell(0,10,utf8_decode($type),0,2);
		$pdf->Ln(5);

		$pdf->SetFont('Arial','I',12);
		$pdf->SetTextColor(26,13,98);
		$pdf->setX(30);
		$pdf->Cell(60,10,utf8_decode("Date du paiement"),0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->SetTextColor(0, 0, 0);
		if ($adhesion["date_paiement"] != ""){
			$date_paiement = new Datetime($adhesion["date_paiement"]);
			$pdf->Cell(0,10,utf8_decode($date_paiement->format("d/m/Y")),0,2);
			$pdf->Ln(5);
		}
		else {
			$pdf->Ln(15);
		}
		

		$pdf->SetFont('Arial','I',12);
		$pdf->SetTextColor(26,13,98);
		$pdf->setX(30);
		$pdf->Cell(60,10,utf8_decode("Mode de paiement"),0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->SetTextColor(0, 0, 0);
		if ($adhesion["mode_paiement"] != ""){
			$pdf->Cell(0,10,utf8_decode($adhesion["mode_paiement"]),0,2);
			$pdf->Ln(15);
		}
		else {
			$pdf->Ln(25);
		}

		$pdf->setX(20);
		$pdf->SetFont('Arial','I',12);
		$pdf->SetTextColor(26,13,98);
		$pdf->Cell(60,10,utf8_decode("Edition le"),0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->SetTextColor(0, 0, 0);
		$date_now = new Datetime();
		$pdf->Cell(0,10,utf8_decode($date_now->format("d/m/Y")),0,2);
		$pdf->Ln(5);

		$pdf->setX(-60);
		$pdf->SetFont('Arial','I',12);
		$pdf->SetTextColor(26,13,98);
		$pdf->Cell(0,10,utf8_decode("Roland SACHOT"),0,2);
		$pdf->Cell(0,10,utf8_decode("Président"),0,0);

		$pdf->Output();
	}
	else {
		wp_redirect(get_permalink(8));
	}
}
else {
	wp_redirect(get_permalink(8));
}*/



