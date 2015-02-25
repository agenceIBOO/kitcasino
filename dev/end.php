<?php 

/**
* Template Name: Devis validé
*/

get_header(); 

?>

 <!-- Progress-bar pour le Desktop -->
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
  <div class="progress-bar progress-bar-success progress-bar-striped active" style="min-width: 25%">
    <span>Vos jeux (3/4)</span>
  </div>
  <div class="progress-bar progress-bar-warning progress-bar-striped active" style="min-width: 25%">
    <span>Récapitulatif (4/4)</span>
  </div>
</div>


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
        <?php

        include "connect.php";

        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
        $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
        $adresse = htmlspecialchars($_POST['adresse'], ENT_QUOTES);
        $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES);
        $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
        $adresse2 = htmlspecialchars($_POST['adresse2'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
        $nb_invite = htmlspecialchars($_POST['nb_invite'], ENT_QUOTES);
        $evenement = htmlspecialchars($_POST['evenement'], ENT_QUOTES);
        $game = htmlspecialchars($_POST['game'], ENT_QUOTES);
        $acheminement = htmlspecialchars($_POST['acheminement'], ENT_QUOTES);

        $sql = "INSERT INTO donnees (nom, prenom, adresse, tel, email, adresse2, date, nb_invite, evenement, jeux, acheminement)
        VALUES ('$nom', '$prenom', '$adresse', '$tel', '$mail', '$adresse2', '$date', '$nb_invite', '$evenement', '$game', '$acheminement')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
        
        <form method="post" action="" id="msform">
          <!-- progressbar -->
          <ol class="progtrckr" data-progtrckr-steps="5">
            <li class="progtrckr-done">Vous</li><li class="progtrckr-done">Votre soirée</li><li class="progtrckr-done">Vos jeux</li><li class="progtrckr-done">Récapitulatif</li><li class="progtrckr-done">Confirmation</li>
          </ol>
          <!-- fieldsets -->
          <fieldset>
            <h2 class="fs-title">Confirmation</h2>
            <h3 class="fs-subtitle">Votre devis est arrivé à bon port, à nous de jouer maintenant! Nous vous contacterons dans les plus brefs délais. Toutefois si cela est urgent, n'hésitez pas à faire le premier pas! : 06xxxxxxxx</h3>
          </fieldset>
          </form>
        </div>
      </div>

<!--<?php get_footer(); ?>-->
