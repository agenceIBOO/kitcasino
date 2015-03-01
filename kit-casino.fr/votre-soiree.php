<?php 

/**
* Template Name: Votre soirée
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

        <h2  id="focusform">Demande de devis</h2>
      </div>
    </div>

    <div class="devis">
      <div class="wrapper">
        <form method="post" action="<?php echo get_permalink(109) ?>#focusform" id="msform">
        <!-- progressbar -->
          <ol class="progtrckr" data-progtrckr-steps="5">
            <li class="progtrckr-done">Vous</li><li class="progtrckr-active">Votre soirée</li><li class="progtrckr-todo">Votre kit</li><li class="progtrckr-todo">Récapitulatif</li>
          </ol>
          <!-- fieldsets -->
          <fieldset>
            <p class="fs-subtitle">Dites-nous en plus sur la soirée que vous voulez organiser</p>
            <span id="locationField">
              <input id="autocomplete" name="adresse2" onFocus="geolocate()" type="text" size="50" placeholder="Adresse (ex: 22 rue de la Paix, Paris, France)" required pattern=".*France"></input>
            </span><br>
            <input type="text" name="date" placeholder="Date de la soirée" id="date-picker-input-1" required><br>
            <input type="date" name="date" placeholder="Date de la soirée" id="xs-datepicker" required>
            <input type="number" name="nb_invite" placeholder="Nombre d'invités" required pattern="^[+]?\d+([.]\d+)?$"><br>
            <div class="txtleft">
              <select name="evenement" id="evenement" required>
                <option value="" disabled selected>Type d'évènement :</option>
                <option value="anniversaire">Anniversaire</option>
                <option value="rallyes">Rallyes</option>
                <option value="seminaire">Séminaire</option>
                <option value="fete">Fête</option>
                <option value="mariage">Mariage</option>
                <option value="autre">Autre</option>
              </select>
            </div>
            <input type="hidden" name="nom" value="<?php echo $_POST['nom']; ?>" required>
            <input type="hidden" name="prenom" value="<?php echo $_POST['prenom']; ?>" required>
            <input type="hidden" name="adresse" value="<?php echo $_POST['adresse']; ?>" required>
            <input type="hidden" name="tel" value="<?php echo $_POST['tel']; ?>" required>
            <input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>" required>

            <input type="button" value="Retour en arrière" class="red" onClick="self.history.back();">
            <input type="submit" name="submit" class="action-button" value="Poursuivre">
          </fieldset>
        </form>
      </div>
    </div>

    </div>

  </main>

<?php get_footer(); ?>



