<?php 

/**
* Template Name: Votre kit
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

      <h2>Demande de devis</h2>
    </div>
  </div>

  <div class="devis">
      <div class="wrapper">
        <form method="post" action="<?php echo get_permalink(107); ?>" id="msform">
        <!-- progressbar -->
           <ol class="progtrckr" data-progtrckr-steps="5">
            <li class="progtrckr-done">Vous</li><li class="progtrckr-done">Votre soirée</li><li class="progtrckr-active">Votre kit</li><li class="progtrckr-todo">Récapitulatif</li>
          </ol>

          <!-- fieldsets -->
          <fieldset class="votrekit">
            <p class="fs-subtitle">Cliquez sur les icônes des jeux que vous désirez louer</p>

            <div id="selected"></div>

            <div id="nonSelected">
            
              <label for="blackjack"><img onclick="moveButton(this)" src="<?php echo get_template_directory_uri(); ?>/img/blackjack-icon2.png" alt="" data-checked='<?php echo get_template_directory_uri(); ?>/img/blackjack-icon-checked2.png' data-unchecked='<?php echo get_template_directory_uri(); ?>/img/blackjack-icon2.png'></label>
              <INPUT id="blackjack" type="checkbox" value="blackjack" name="game[]">    
            
              <label for="chuckaluck"><img onclick="moveButton(this)" src="<?php echo get_template_directory_uri(); ?>/img/chuckaluck-icon2.png" alt="" data-checked='<?php echo get_template_directory_uri(); ?>/img/chuckaluck-icon-checked2.png' data-unchecked='<?php echo get_template_directory_uri(); ?>/img/chuckaluck-icon2.png'></label>
              <INPUT id="chuckaluck" type="checkbox" value="chuckaluck" name="game[]">
             
              <label for="holdem"><img onclick="moveButton(this)" src="<?php echo get_template_directory_uri(); ?>/img/boule-icon2.png" alt="" data-checked='<?php echo get_template_directory_uri(); ?>/img/boule-icon-checked2.png' data-unchecked='<?php echo get_template_directory_uri(); ?>/img/boule-icon2.png'></label>
              <INPUT id="holdem" type="checkbox" value="holdempoker" name="game[]">

              <label for="boule"><img onclick="moveButton(this)" src="<?php echo get_template_directory_uri(); ?>/img/holdempoker-icon2.png" alt="" data-checked='<?php echo get_template_directory_uri(); ?>/img/holdempoker-icon-checked2.png' data-unchecked='<?php echo get_template_directory_uri(); ?>/img/holdempoker-icon2.png'></label>
              <INPUT id="boule" type="checkbox" value="boule" name="game[]">

              <label for="roulette"><img onclick="moveButton(this)" src="<?php echo get_template_directory_uri(); ?>/img/roulette-icon2.png" alt="" data-checked='<?php echo get_template_directory_uri(); ?>/img/roulette-icon-checked2.png' data-unchecked='<?php echo get_template_directory_uri(); ?>/img/roulette-icon2.png'></label>
              <INPUT id="roulette" type="checkbox" value="roulette" name="game[]">

              <label for="stud"><img onclick="moveButton(this)" src="<?php echo get_template_directory_uri(); ?>/img/studpoker-icon2.png" alt="" data-checked='<?php echo get_template_directory_uri(); ?>/img/studpoker-icon-checked2.png' data-unchecked='<?php echo get_template_directory_uri(); ?>/img/studpoker-icon2.png'></label>
              <INPUT id="stud" type="checkbox" value="studpoker" name="game[]">


              

          </div>
          <div id="calculdist">
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
                    echo "Vous êtes à ".$distance."km du dépôt principal du matériel de Kit-Casino.fr. Cela vous permet donc de bénéficier d'un tarif de livraison préférentiel de 50 €.";
                  }
                  else{
                    echo "Vous êtes à ".$distance." du dépôt principal du matériel de Kit-Caisno.fr. A cette distance, le prix de la livraison est de 50 € + 0,60 € par kilomètre excédent 75km. Vous aurez donc à payer ".$cout_loin." €.";
                  }
                ?>
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
      </div>
    </div>
</main>





<script>
function moveButton(elem){
    if( $(elem).closest("div").attr("id") == "nonSelected" ){
        $(elem).prependTo('#selected');
    }
    else{
        $(elem).prependTo('#nonSelected'); 
    }
}

$("img").click(function() { 
       var _this = $(this);
       var current = _this.attr("src");
       var swap = _this.attr("data-checked");     
     _this.attr('src', swap).attr("data-checked",current);   
});

//$("form input[type=checkbox]").change(function(e) {
//  var state = $(this).is(':checked');
//  $('form [for=' + this.id + '] img').attr('src', function() {
//    return state ? $(this).data('checked') : $(this).data('unchecked');
// });
//});
</script>

<!--<?php get_footer(); ?>-->