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
        <?php echo get_field( "tarif", 56 ); ?>€ le kit
      </p>
      <p>
        <?php echo get_field( "tarif", 57 ); ?>€ par jeu supplémentaire
      </p>
      <p>
        Caution = <?php echo get_field( "tarif", 136 ); ?>€ + <?php echo get_field( "tarif", 137 ); ?>€ par jeux supplémentaire.<br>
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
              <h3>Vous</h3>
              <li><span>Nom :</span> <?php echo $_POST['nom']; ?></li>
              <li><span>Prénom :</span> <?php echo $_POST['prenom']; ?></li>
              <li><span>Adresse :</span> <?php echo $_POST['adresse']; ?></li>
              <li><span>Téléphone :</span> <?php echo $_POST['tel']; ?></li>
              <li><span>E-mail :</span> <?php echo $_POST['mail']; ?></li>
              <br><hr><br>

              <h3>Votre soirée</h3>
              <li><span>Adresse de l'évènement :</span> <?php echo $_POST['adresse2']; ?></li>
              <li><span>Date de la soirée :</span> <?php echo $_POST['date']; ?></li>
              <li><span>Nombre d'invités :</span> <?php echo $_POST['nb_invite']; ?></li>
              <li><span>Type d'évènement :</span> <?php echo $_POST['evenement']; ?></li>

              <br><hr><br>

              <h3>Votre kit</h3>
              <li><span>Jeu(x) sélectionné(s) :</span> <?php /*if(empty($_POST['game'])){
              echo "Aucun jeux n'a été séléctionné :("; } else {*/ 
                $N = count($_POST['game']); 
                echo($N." jeux choisis : "); 
                for($i=0; $i < $N; $i++){ 
                  echo($_POST['game'][$i] . ", "); /*}*/
                }?></li>

               
              <br><hr><br>
            </ul>

            <p class="prix">

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
                $cout_loin = (get_field("tarif", 58)*($distance-75)) + 50;
                // ********************************************************************** //

                //définition des variables prixkit, prixjeusup, cautionkit, cautionjeusup, livraison, kilometrage
                $prixkit = get_field( "tarif", 56 );
                $prixjeusup = get_field( "tarif", 57 );
                $cautionkit = get_field( "tarif", 136 );
                $cautionjeusup = get_field("tarif", 137);
                $livraison = get_field("tarif", 59);
                $kilometrage = get_field("tarif", 58);


                // Message-mascotte en forme d'indication permettant à l'utilisateur de prédire ses frais de livraisons
                if ($distance < 75) {
                  echo "Vous êtes à ".$distance."km du dépôt principal du matériel de Kit-Casino.fr. Cela vous permet donc de bénéficier d'un tarif de livraison préférentiel de ".$livraison."€.<br><br>";
                }
                else{
                  echo "Vous êtes à ".$distance."km du dépôt principal du matériel de Kit-Caisno.fr. A cette distance, le prix de la livraison est de ".$livraison."€ + ".$kilometrage."0 € par kilomètre excédent 75km. Vous aurez donc à payer ".$cout_loin." €.<br><br>";
                }


              
                if ($N == 2 && $distance < 75) {
                  echo "Vous avez opté pour un kit standard de 2 jeux à ".$prixkit."€. <br><br> TOTAL: ".$prixkit." € + ".$cautionkit."€ de caution + ".$livraison."€ de livraison soit un total de ".($prixkit+$cautionkit+$livraison)." €.<br> La caution vous sera remise après rendu du matériel.<br>";
                }
                elseif ($N > 2 && $distance < 75) {
                  echo "Vous avez opté pour un kit avec jeu(x) supplémentaire(s) contenant ".$N." jeux.<br><br> TOTAL: ".($prixkit+($prixjeusup*($N-2)))." € + ".($cautionkit+($cautionjeusup*($N-2)))."€ de caution + ".$livraison."€ de livraison soit un total de ".($prixkit+($prixjeusup*$N)+$cautionkit+($cautionjeusup*$N)+$livraison)." €.<br> La caution vous sera remise après rendu du matériel.<br>";
                }
                elseif ($N == 2 && $distance > 75) {
                  echo "Vous avez opté pour un kit standard de 2 jeux à ".$prixkit."€. <br><br> TOTAL: ".$prixkit." € + ".$cautionkit."€ de caution + ".$cout_loin."€ de livraison soit un total de ".($prixkit+$cautionkit+$cout_loin)." €.<br> La caution vous sera remise après rendu du matériel.<br>";
                }
                elseif ($N > 2 && $distance > 75) {
                  echo "Vous avez opté pour un kit avec jeu(x) supplémentaire(s) contenant ".$N." jeux.<br><br> TOTAL: ".($prixkit+($prixjeusup*($N-2)))." € + ".($cautionkit+($cautionjeusup*($N-2)))."€ de caution + ".$cout_loin."€ de livraison soit un total de ".($prixkit+($prixjeusup*$N)+$cautionkit+($cautionjeusup*$N)+$cout_loin)." €.<br> La caution vous sera remise après rendu du matériel.<br>";
                }

              //echo "TOTAL: ".$prix." € + ".$cautiontotale." € de caution, soit ".$total." € au total."." La caution vous sera remise après rendu du matériel.";
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
