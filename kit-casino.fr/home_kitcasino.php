<?php 

/**
* Template Name: Home
*/

get_header(); ?>
	

	

	<main role="main">
	
		<div id="video">
			<div id="videoWrapper">
				<video autoplay loop class="bgvid">
					<source src="<?php echo get_template_directory_uri(); ?>/video/video_background.mp4" type="video/mp4" />
					<source src="<?php echo get_template_directory_uri(); ?>/video/video_background.webm" type="video/webm" />
					<source src="<?php echo get_template_directory_uri(); ?>/video/video_background.ogv" type="video/ogg" />
				</video>
			</div>
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
					?>
				</h2>

				<?php
					$args = array(
					'posts_per_page'   => -1,
					'post_type'        => 'partenaire',
					'post_status'      => 'publish'
					);

					$partenaires = get_posts( $args );

					foreach ($partenaires as $partenaire){

						echo "<img src=".get_field("photo_du_partenaire", $partenaire->ID)." width='308' alt='".get_the_title($partenaire->ID)."' />";
					
					}
				?>
				
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
