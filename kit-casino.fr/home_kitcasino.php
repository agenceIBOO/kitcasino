<?php 

/**
* Template Name: Home
*/

get_header(); ?>
	

	

	<main role="main">
	
		<div id="video">
			<video autoplay loop class="bgvid">
				<source src="<?php echo get_template_directory_uri(); ?>/video/video_background.mp4" type="video/mp4" />
				<source src="<?php echo get_template_directory_uri(); ?>/video/video_background.webm" type="video/webm" />
				<source src="<?php echo get_template_directory_uri(); ?>/video/video_background.ogv" type="video/ogg" />
			</video>
			<p class="wrapper">Location de matériel de <span>Casino</span></p>
		</div>
		
		<div class="wrapper">
			<div>
				
					<?php
					echo get_field("texte_avant");
					?>
				<br>
				
			</div>

			<div id="avantages">
				<h2><?php
					echo get_field("titre_1");
					?></h2>
				<?php
					echo get_field("texte_1");
					?>
			</div>

			<div id="partenaires">
				<h2><?php
					echo get_field("titre_2");
					?></h2>
				<img src="<?php echo get_template_directory_uri(); ?>/img/partenaire_1.jpg" alt="partenaire1">
				<img src="<?php echo get_template_directory_uri(); ?>/img/partenaire_1.jpg" alt="partenaire2">
			</div>


		</div>
		<!-- /wrapper -->


			<div id="occasions">
				<div class="wrapper">
							<h3>Un casino pour quelles occasions ?</h3>
							<ul>
								<li><img src="<?php echo get_template_directory_uri(); ?>/img/soirees.jpg" alt=""><br>Soirées</li>
								<li><img src="<?php echo get_template_directory_uri(); ?>/img/anniversaires.jpg" alt="" ><br>Anniversaires</li>
								<li><img src="<?php echo get_template_directory_uri(); ?>/img/marriages.jpg" alt="" ><br>Anniversaires de marriage</li>
								<li><img src="<?php echo get_template_directory_uri(); ?>/img/nouvelan.jpg" alt="" ><br>Nouvel An</li>
								<li><img src="<?php echo get_template_directory_uri(); ?>/img/seminaires.jpg" alt="" ><br>Séminaires</li>
							</ul>
				</div>
			</div>


	</main>


<?php get_footer(); ?>
