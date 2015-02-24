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
				<form method="post" action="<?php echo get_permalink(105); ?>" id="msform">
					<!-- progressbar -->
					<ol class="progtrckr" data-progtrckr-steps="5">
						<li class="progtrckr-active">Vous</li><li class="progtrckr-todo">Votre soirée</li><li class="progtrckr-todo">Votre kit</li><li class="progtrckr-todo">Récapitulatif</li>
					</ol>

					<!-- fieldsets -->
					<fieldset>
						<p class="fs-subtitle">Pour garder le contact plus aisément, merci de remplir les champs suivants</p>
						<input type="text" name="nom" id="nom" autofocus placeholder="Nom"><br>
						<input type="text" name="prenom" id="prenom" placeholder="Prénom"><br>
						<span id="locationField">
							<input id="autocomplete" name="adresse" onFocus="geolocate()" type="text" autocomplete="off" size="50" placeholder="Adresse"></input>
						</span><br>
						<input type="tel" name="tel" id="tel" placeholder="Téléphone"><br>
						<input type="email" name="mail" id="mail" placeholder="E-mail"><br>
						<input type="submit" name="submit" class="next action-button" value="Poursuivre">
					</fieldset>
				</form>
			</div>
		</div>

		</div>

	</main>

<!--<?php get_footer(); ?>-->
