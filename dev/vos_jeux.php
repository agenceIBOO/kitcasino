<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Vos jeux</title>
<style>
input[type=checkbox]{
  display: none;
}
img{
  cursor: pointer;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<form method="post" action="recap.php">
  <p>
    Cliquez sur les icônes des jeux que vous souhaitez:<br>
      
      <label for="blackjack"><img src="img/blackjack.jpg" alt="" data-checked='img/blackjack.gif' data-unchecked='img/blackjack.jpg'></label>
      <INPUT id="blackjack" type="checkbox" value="Blackjack" name="game[]">    

      <label for="chuckaluck"><img src="img/chuckaluck.jpg" alt="" data-checked='img/chuckaluck.gif' data-unchecked='img/chuckaluck.jpg'></label>
      <INPUT id="chuckaluck" type="checkbox" value="Chuck a Luck" name="game[]">

      <label for="roulette"><img src="img/roulette.jpg" alt="" data-checked='img/roulette.gif' data-unchecked='img/roulette.jpg'></label>
      <INPUT id="roulette" type="checkbox" value="Roulette" name="game[]">

      <label for="stud"><img src="img/stud.jpg" alt="" data-checked='img/stud.gif' data-unchecked='img/stud.jpg'></label>
      <INPUT id="stud" type="checkbox" value="Stud Poker" name="game[]">

      <label for="holdem"><img src="img/holdem.jpg" alt="" data-checked='img/holdem.gif' data-unchecked='img/holdem.jpg'></label>
      <INPUT id="holdem" type="checkbox" value="Holdem Poker" name="game[]">

      <label for="boule"><img src="img/boule.jpg" alt="" data-checked='img/boule.gif' data-unchecked='img/boule.jpg'></label></p> 
      <INPUT id="boule" type="checkbox" value="La Boule" name="game[]">
 

<input type="hidden" name="nom" value="<?php echo $_POST['nom']; ?>">
<input type="hidden" name="prenom" value="<?php echo $_POST['prenom']; ?>">
<input type="hidden" name="adresse" value="<?php echo $_POST['adresse']; ?>">
<input type="hidden" name="tel" value="<?php echo $_POST['tel']; ?>">
<input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
<input type="hidden" name="adresse2" value="<?php echo $_POST['adresse2']; ?>">
<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
<input type="hidden" name="nb_invite" value="<?php echo $_POST['nb_invite']; ?>">
<input type="hidden" name="evenement" value="<?php echo $_POST['evenement']; ?>">
    <input type="button" value="Retour en arrière" onClick="self.history.back();">
    <input type="submit" name="submit" value="Poursuivre">
</p>
</form>

<script>
$("form input[type=checkbox]").change(function(e) {
  var state = $(this).is(':checked');
  $('form [for=' + this.id + '] img').attr('src', function() {
    return state ? $(this).data('checked') : $(this).data('unchecked');
  });
});
</script>

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
// ********************************************************************** //

// Message-mascotte en forme d'indication permettant à l'utilisateur de prédire ses frais de livraisons
?>


</body>
</html>
