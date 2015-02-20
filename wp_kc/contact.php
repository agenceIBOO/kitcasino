<?php 

/**
* Template Name: Contact
*/

get_header(); 

?>

	<main role="main">

		<div id="contact" class="wrapper">
			<p>Coucou, tu veux nous contacter ? Fais toi plaisir ! Sinon y a le téléphone ;) </p>
			<!--<form>
				<label>Nom :</label>
				<input name="nom" type="text"></input><br>

				<label>Prénom :</label>
				<input name="prenom" type="text"></input><br>

				<label>Mail :</label>
				<input name="mail" type="email"></input><br>

				<label>Téléphone :</label>
				<input name="telephone" type="phone"></input><br>

				<label>Votre message :</label>
				<textarea name="message"></textarea>

				<input type="submit" value="Envoyer"></input>
			</form>-->
			<?php echo do_shortcode( '[contact-form-7 id="79" title="Formulaire de contact 1"]' ); ?>
		</div>


	</main>



<!--<?php get_footer(); ?>-->
