<?php 

/**
* Template Name: Recapitulatif
*/

get_header(); 

?>
<main role="main">
  <div class="wrapper">
    <div class="tarifs">
      <h2>Tarifs</h2>
      <p>
        <img src="<?php echo get_template_directory_uri(); ?>/img/1kit2jeux.png"><br>
        1 kit = 2 jeux
      </p>
      <p>
        200€ le kit
      </p>
      <p>
        75€ par jeu supplémentaire
      </p>
      <p>
        Caution = 1375 € + 300€ par jeux supplémentaire.<br>
        La caution vous est rendue à la fin de votre location sous condition que le matériel soit en bon état.
      </p>

      <h2 id="focusform">Demande de devis</h2>
    </div>
  </div>

   <div class="devis">
      <div class="wrapper">
        <form method="post" action="<?php echo get_permalink(111); ?>#focusform" id="msform">
          <!-- progressbar -->
          <ol class="progtrckr" data-progtrckr-steps="5">
            <li class="progtrckr-done">Vous</li><li class="progtrckr-done">Votre soirée</li><li class="progtrckr-done">Votre kit</li><li class="progtrckr-active">Récapitulatif</li>
          </ol>
          <!-- fieldsets -->
          <fieldset>
            <p class="fs-subtitle">Voici les infos qui nous seront transmises. Est-ce que tout est correct?</p>
            <ul class="recap">
                <li>Nom: <?php echo $_POST['nom']; ?></li>
                <li>Prénom: <?php echo $_POST['prenom']; ?></li>
                <li>Adresse: <?php echo $_POST['adresse']; ?></li>
                <li>Téléphone: <?php echo $_POST['tel']; ?></li>
                <li>E-mail: <?php echo $_POST['mail']; ?></li>
                <hr>
                Adresse de l'évènement: <?php echo $_POST['adresse2']; ?><br>
                Date de la soirée: <?php echo $_POST['date']; ?><br>
                Nombre d'invités: <?php echo $_POST['nb_invite']; ?><br>
                Type d'évènement: <?php echo $_POST['evenement']; ?><br>
                Jeu(x) sélectionné(s): <?php if(empty($_POST['game'])){
                echo "Aucun jeux n'a été séléctionné :("; } else { $N = count($_POST['game']); echo($N." jeux choisis : "); for($i=0; $i < $N; $i++){ echo($_POST['game'][$i] . ", "); }}?>
                <hr>
            </ul>

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

              echo "Vous avez opté pour un kit avec jeu(x) supplémentaire(s) contenant ".$N." jeux.<br> TOTAL: ".$prix." € + ".$caution." € de caution, soit ".$total." € au total."." La caution vous sera remise après rendu du matériel.";
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
              <input type="button" value="Retour en arrière" class="red" onClick="location.href='<?php echo get_permalink(109) ?>'">
              <input type="submit" name="submit" class="next action-button" value="Poursuivre">
          </fieldset>
          </form>
        </div>
      </div>

<!--<?php get_footer(); ?>-->
