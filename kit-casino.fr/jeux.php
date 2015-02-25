<?php 

/**
* Template Name: Jeux
*/

get_header(); ?>



	<main role="main">
		<div class="wrapper">
			<nav id="nav-jeux">
				<ul>
					<?php
						$args = array(
							'posts_per_page'   => -1,
							'post_type'        => 'jeu',
							'post_status'      => 'publish'
						);
						$jeux = get_posts( $args );


						foreach ($jeux as $jeu){

							echo "<li><a href=#".get_field("id", $jeu->ID)."><img src='".get_field("icone", $jeu->ID)."' /><p>".get_the_title($jeu->ID)."</p></a></li>";

							/*echo get_the_title($jeu->ID);

							echo get_field("description", $jeu->ID);

							echo "<img src='".get_field("image", $jeu->ID)."' />";*/

						}

						wp_reset_postdata();
					?>
					
				</ul>

			</nav>
		</div><!-- fermeture wrapper -->
			<div id="jeux-content">
				<?php
							$args = array(
								'posts_per_page'   => -1,
								'post_type'        => 'jeu',
								'post_status'      => 'publish'
							);
							$jeux = get_posts( $args );


							foreach ($jeux as $jeu){

								echo "<div id='".get_field("id", $jeu->ID)."'>
								<div class='wrapper'>";

								echo "<ul class='images-jeux'><li><img src='".get_field("image", $jeu->ID)."' width='33%' /></li>
								<li><img src='".get_field("image_2", $jeu->ID)."' width='33%' /></li>
								<li><img src='".get_field("image_3", $jeu->ID)."' width='33%' /></li>";
								
								echo "<h2 id='materiel'>Matériel fourni</h2>";
								
								echo get_field("description", $jeu->ID);
								
								echo "<h2 id='regles'>Règles du jeu</h2>";
								
								echo get_field("regles", $jeu->ID);
								
								echo "</div> <!-- fermeture wrapper -->


								<div id='animation'>
									<div class='wrapper'>";
								
								echo "<h3>Animez vous même votre soirée !</h3>";
								echo get_field("animation", $jeu->ID);

								echo "</div> <!-- fermeture div wrapper -->
								</div> <!-- fermeture div animation -->
								</div> <!-- fermeture div id -->";


							}

							wp_reset_postdata();
						?>
			
		
			</div><!-- fermeture jeux content -->
	</main>




<!--<?php get_footer(); ?>-->
