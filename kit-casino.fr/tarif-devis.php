<?php 

/**
* Template Name: Tarifs et devis
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

				<h2>Demande de devis</h2>
			</div>
		</div>

		<div class="devis">
			<div class="wrapper">
				<form method="post" action="<?php echo get_permalink(105); ?>#focusform" id="msform">
					<!-- progressbar -->
					<ol class="progtrckr" data-progtrckr-steps="5">
						<li class="progtrckr-active">Vous</li><li class="progtrckr-todo">Votre soirée</li><li class="progtrckr-todo">Votre kit</li><li class="progtrckr-todo">Récapitulatif</li>
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
  <div class="progress-bar progress-bar-danger progress-bar-striped active" style="min-width: 25%">
    <span>Récapitulatif (4/4)</span>
  </div>
</div>

					<!-- fieldsets -->
					<fieldset>
						<p class="fs-subtitle">Pour garder le contact plus aisément, merci de remplir les champs suivants</p>
						<input type="text" name="nom" id="nom" placeholder="Nom" required><br>
						<input type="text" name="prenom" id="prenom" placeholder="Prénom" required><br>
						<span id="locationField">
							<input id="autocomplete" name="adresse" onFocus="geolocate()" type="text" autocomplete="off" size="50" placeholder="Adresse (ex: 22 rue de la Paix, Paris, France)" required pattern=".*France"></input>
						</span><br>
						<input type="tel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$
" name="tel" id="tel" placeholder="Téléphone" required><br>
						<input type="email" name="mail" id="mail" placeholder="E-mail" required><br>
						<input type="submit" name="submit" class="next action-button" value="Poursuivre">
					</fieldset>
				</form>
			</div>
		</div>

		</div>

	</main>

<?php get_footer(); ?>
