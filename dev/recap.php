<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Récapitulatif</title>
  <link rel="stylesheet" href="style.css">
<style>
.prix{
  border: 2px red dotted;
}
p{
  margin: 10px 0;
}
</style>
</head>
<body>

<form method="post" action="end.php" id="msform">
  <!-- progressbar -->
  <ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-done">Vous</li><li class="progtrckr-done">Votre soirée</li><li class="progtrckr-done">Vos jeux</li><li class="progtrckr-done">Récapitulatif</li><li class="progtrckr-todo">Confirmation</li>
  </ol>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Récapitulatif</h2>
    <h3 class="fs-subtitle">Voici les infos qui nous seront transmises. Est-ce que tout est correct?</h3>
<p>
    Nom: <?php echo $_POST['nom']; ?><br>
    Prénom: <?php echo $_POST['prenom']; ?><br>
    Adresse: <?php echo $_POST['adresse']; ?><br>
    Téléphone: <?php echo $_POST['tel']; ?><br>
    E-mail: <?php echo $_POST['mail']; ?><br>
    <hr>
    Adresse de l'évènement: <?php echo $_POST['adresse2']; ?><br>
    Date de la soirée: <?php echo $_POST['date']; ?><br>
    Nombre d'invités: <?php echo $_POST['nb_invite']; ?><br>
    Type d'évènement: <?php echo $_POST['evenement']; ?><br>
    Jeux séléctionnés: <?php if(empty($_POST['game'])){
    echo "Aucun jeux n'a été séléctionné :("; } else { $N = count($_POST['game']); echo($N." jeux choisis : "); for($i=0; $i < $N; $i++){ echo($_POST['game'][$i] . " "); }
}
?>
<hr>
  </p>

  <p class="prix">
  <?php
    if ($N < 1) {
      echo "Vous n'avez choisi aucun jeu. Que se passe-t-il? Vous n'aimez pas jouer...?";
    }
    elseif ($N < 2) {
      echo "Vous n'avez choisi qu'un seul jeu! Le kit est normalement prévu pour 2 jeux.<br>TOTAL: 200 € + 1375 € de caution soit 1575 €. La caution vous sera remise après rendu du matériel.";
    }
    elseif ($N == 2) {
      echo "Vous avez opté pour un kit standard de 2 jeux. <br> TOTAL: 200 € + 1375 € de caution soit 1575 €. La caution vous sera remise après rendu du matériel.";
    }
    else{
      $prix = 200 + ($N-2)*75;
      $caution = 1375 + ($N-2)*300;
      $total = $prix + $caution;

      echo "Vous avez opté pour plusieurs kits contenant ".$N." jeux.<br> TOTAL: ".$prix." € + ".$caution." € de caution, soit ".$total." € au total."." La caution vous sera remise après rendu du matériel.";
    }
  ?>
  </p>
  <input type="hidden" name="nom" value="<?php echo $_POST['nom']; ?>">
<input type="hidden" name="prenom" value="<?php echo $_POST['prenom']; ?>">
<input type="hidden" name="adresse" value="<?php echo $_POST['adresse']; ?>">
<input type="hidden" name="tel" value="<?php echo $_POST['tel']; ?>">
<input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
<input type="hidden" name="adresse2" value="<?php echo $_POST['adresse2']; ?>">
<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
<input type="hidden" name="nb_invite" value="<?php echo $_POST['nb_invite']; ?>">
<input type="hidden" name="evenement" value="<?php echo $_POST['evenement']; ?>">
<input type="hidden" name="game" value="<?php $game = implode(', ', $_POST['game']); echo $game; ?>">
      <input type="button" value="Retour en arrière" class="red" onClick="location.href='vos_jeux.php'">
      <input type="submit" name="submit" class="next action-button" value="Poursuivre">
  </fieldset>
  </form>

</body>
</html>
