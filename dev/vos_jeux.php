<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Vos jeux</title>
    <link rel="stylesheet" href="style.css">
<style>
input[type=checkbox]{
  display: none;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-todo">Vous</li><li class="progtrckr-todo">Votre soirée</li><li class="progtrckr-todo">Vos jeux</li><li class="progtrckr-todo">Récapitulatif</li><li class="progtrckr-todo">Confirmation</li>
  </ol>

<!-- Progress-bar pour les petits périphériques -->
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" style="min-width: 25%">
    <span>Vous (1/4)</span>
  </div>
  <div class="progress-bar progress-bar-success progress-bar-striped active" style="min-width: 25%">
    <span>Votre soirée (2/4)</span>
  </div>
  <div class="progress-bar progress-bar-warning progress-bar-striped active" style="min-width: 25%">
    <span>Vos jeux (3/4)</span>
  </div>
  <div class="progress-bar progress-bar-danger progress-bar-striped active" style="min-width: 25%">
    <span>Récapitulatif (4/4)</span>
  </div>
</div>

<form method="post" action="recap.php" id="msform">
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Vos jeux</h2>
    <h3 class="fs-subtitle">Cliquez sur les icônes des jeux que vous désirez louer</h3>

    <div id="selected">Imaginez que cette boîte est une malette. Oui. Imaginez très fort.</div>

    <div id="nonSelected">
    
      <label for="blackjack"><img onclick="moveButton(this)" src="img/blackjack.jpg" alt="icône Blackjack" data-checked='img/blackjack.gif' data-unchecked='img/blackjack.jpg'></label>
      <INPUT id="blackjack" type="checkbox" value="Blackjack" name="game[]">
    
      <label for="chuckaluck"><img onclick="moveButton(this)" src="img/chuckaluck.jpg" alt="icône Chuck-à-luck" data-checked='img/chuckaluck.gif' data-unchecked='img/chuckaluck.jpg'></label>
      <INPUT id="chuckaluck" type="checkbox" value="Chuck a Luck" name="game[]">
     
      <label for="roulette"><img onclick="moveButton(this)" src="img/roulette.jpg" alt="icône Roulette" data-checked='img/roulette.gif' data-unchecked='img/roulette.jpg'></label>
      <INPUT id="roulette" type="checkbox" value="Roulette" name="game[]">

      <label for="stud"><img onclick="moveButton(this)" src="img/stud.jpg" alt="icône Stud Poker" data-checked='img/stud.gif' data-unchecked='img/stud.jpg'></label>
      <INPUT id="stud" type="checkbox" value="Stud Poker" name="game[]">

      <label for="holdem"><img onclick="moveButton(this)" src="img/holdem.jpg" alt="icône Holdem Poker" data-checked='img/holdem.gif' data-unchecked='img/holdem.jpg'></label>
      <INPUT id="holdem" type="checkbox" value="Holdem Poker" name="game[]">

      <label for="boule"><img onclick="moveButton(this)" src="img/boule.jpg" alt="icône Boule" data-checked='img/boule.gif' data-unchecked='img/boule.jpg'></label>
      <INPUT id="boule" type="checkbox" value="La Boule" name="game[]">
<div>
      <?php
//Calcul de la distance entre l'adresse du client et le dépôt du matos

$adresse2 = $_POST['adresse2'];
$adresse2 = str_replace(" ", "+", $adresse2);
$adresse2 = str_replace(",", "", $adresse2);
$adresse2 = str_replace("-", "+", $adresse2);
$adresse2 = htmlspecialchars($adresse2, ENT_QUOTES);
$q = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".$adresse2.";&destinations=18+Hameau+des+Marronniers+77185+Lognes&mode=driving&sensor=false";
$json = file_get_contents($q);

$details = json_decode($json, TRUE);
$dist_brut = $details['rows'][0]['elements'][0]['distance']['text'];
$distance = str_replace(",", "", $dist_brut);
$distance = str_replace("km", "", $distance);
$distance = round($distance);
$cout_loin = (0.60*$distance) + 50;
// ********************************************************************** //
// Message-mascotte en forme d'indication permettant à l'utilisateur de prédire ses frais de livraisons
if ($distance < 75) {
  echo "Vous êtes à ".$distance."km du dépôt principal du matériel de Kit-Casino. Cela vous permet donc de bénéficier d'un tarif de livraison préférentiel de 50 €.";
}
else{
  echo "Vous êtes à ".$distance." du dépôt principal du matériel de Kit-Casino. A cette distance, le prix de la livraison est de 50 € + 0,60 € par kilomètre excédent 75km. Vous aurez donc à payer ".$cout_loin." €.";
}
?>
</div>

<p style="margin-top: 15px;">
<label for="acheminement">Désirez-vous que les jeux vous soit livré à domicile ou préférez-vous les retirer vous-même (gratuit)?</label>
<INPUT id="acheminement" type="radio" value="Livraison à domicile" name="acheminement">Livraison
<INPUT id="acheminement" type="radio" value="Retrait par le client" name="acheminement">Retrait
</p>

  </div>

<input type="hidden" name="nom" value="<?php echo $_POST['nom']; ?>">
<input type="hidden" name="prenom" value="<?php echo $_POST['prenom']; ?>">
<input type="hidden" name="adresse" value="<?php echo $_POST['adresse']; ?>">
<input type="hidden" name="tel" value="<?php echo $_POST['tel']; ?>">
<input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
<input type="hidden" name="adresse2" value="<?php echo $_POST['adresse2']; ?>">
<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
<input type="hidden" name="nb_invite" value="<?php echo $_POST['nb_invite']; ?>">
<input type="hidden" name="evenement" value="<?php echo $_POST['evenement']; ?>">

<input type="button" value="Retour en arrière" class="red" onClick="self.history.back();">
<input type="submit" name="submit" class="action-button" value="Poursuivre">
  </fieldset>
</form>

<script>
function moveButton(elem){
    var $elem = $(elem).parent();
    if( $elem.closest("div").attr("id") == "nonSelected" ){
        $elem.prependTo('#selected');
    }
    else{
        $elem.insertBefore('#'+$elem.attr('for'));
    }
}

$("img").click(function() { 
       var _this = $(this);
       var current = _this.attr("src");
       var swap = _this.attr("data-checked");     
     _this.attr('src', swap).attr("data-checked",current);   
});

// $("form input[type=checkbox]").change(function(e) {
//  var state = $(this).is(':checked');
//  $('form [for=' + this.id + '] img').attr('src', function() {
//    return state ? $(this).data('checked') : $(this).data('unchecked');
// });
// });
</script>

<!-- Mascotte: Vous avez indiqué avoir $nb_invite. Nous vous conseillons donc de louer $tant de kits. -->
<?php
// « Pour x joueurs nous vous conseillons x jeux ». En général 1 jeu par tranche de 15 invités.
// - Black jack : 15 personnes ( jouant et regardant, ceux étant en exterieur pouvant jouer en misant
// sur un joueur);
// - Boules : 20 personnes;
// - Roulette : 20 personnes;
// - Chuck a luck : 20 personnes;
// - Hold’em poker : 10 personnes;
// - Stud poker : 15 personnes.

$moyenne = 17;
$nb_invite = $_POST['nb_invite'];
$calcul = $nb_invite / $moyenne;
$calcul = ceil($calcul);
echo "Pour ".$nb_invite.", nous vous conseillons de louer ".$calcul." jeux."

?>

</body>
</html>