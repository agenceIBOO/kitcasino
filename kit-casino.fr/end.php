<?php 

/**
* Template Name: Devis validé
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
        <?php /*

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

        $sql = "INSERT INTO donnees (nom, prenom, adresse, tel, email, adresse2, date, nb_invite, evenement, jeux)
        VALUES ('$nom', '$prenom', '$adresse', '$tel', '$mail', '$adresse2', '$date', '$nb_invite', '$evenement', '$game')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);*/
        ?> 


        <?php 

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
        $game = explode(",", $game);
        


       
        $prixkit = get_field( "tarif", 56 );
        $prixjeusup = get_field( "tarif", 57 );
        $cautionkit = get_field( "tarif", 136 );
        $cautionjeusup = get_field("tarif", 137);
        $livraison = get_field("tarif", 59);
        $kilometrage = get_field("tarif", 58);


        //calcul cout livraison etc
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

       

        // Create post object
        $my_post = array(
         'post_title' => $nom.' '.$prenom,
         'post_status' => 'publish',
         'post_author' => 1,
         'post_type' => 'devis'
        );

        // Insert the post into the database
        $post_id = wp_insert_post( $my_post );

        // Add field value
        update_field( "field_54eb43512a9b1", $nom , $post_id );
        update_field( "field_54eb43602a9b2", $prenom , $post_id );
        update_field( "field_54eb43652a9b3", $adresse , $post_id );
        update_field( "field_54eb43792a9b4", $tel , $post_id );
        update_field( "field_54eb438c2a9b5", $mail , $post_id );
        update_field( "field_54eb439c2a9b6", $adresse2 , $post_id );
        update_field( "field_54eb43a62a9b7", $date , $post_id );
        update_field( "field_54eb43b72a9b8", $nb_invite , $post_id );
        update_field( "field_54eb43ea2a9b9", $evenement , $post_id );
        update_field( "field_54eb44e12a9ba", $game , $post_id );

        //envoi infos tarif livraison
        if ($distance < 75) {
          update_field( "field_54ee20a7db8f2", $livraison, $post_id); 
        }
        elseif ($distance > 75) {
          update_field( "field_54ee20a7db8f2", $cout_loin, $post_id);
        }

        

        
        
              
        ?>

        <form method="post" action="" id="msform">
          <!-- progressbar -->
          <ol class="progtrckr" data-progtrckr-steps="5">
            <li class="progtrckr-done">Vous</li><li class="progtrckr-done">Votre soirée</li><li class="progtrckr-done">Votre kit</li><li class="progtrckr-done">Récapitulatif</li>
          </ol>
          <!-- fieldsets -->
          <fieldset>
            <p class="fs-subtitle">Votre devis est arrivé à bon port, à nous de jouer maintenant! Nous vous contacterons dans les plus brefs délais. Toutefois si cela est urgent, n'hésitez pas à faire le premier pas! : 06xxxxxxxx</p>
          </fieldset>



          </form>
        </div>
      </div>

<?php get_footer(); ?>
