<?php 

/**
* Template Name: Association
*/

get_header(); 

?>

	<main role="main">
		<div id="association" class="wrapper">
			<h2><?php 
					echo get_field('titre_principal') ;
				?>
			</h2>
			<p>
				<?php 
				echo get_field('description_de_lassociation');
				?>
			</p>
		</div>
		<div id="membres">
			<div class="wrapper">

				<?php
				$args = array(
				'posts_per_page'   => -1,
				'post_type'        => 'membre',
				'post_status'      => 'publish'
				);
				$membres = get_posts( $args );

				foreach ($membres as $membre){

				echo "<div><p> <img src=".get_field("photo", $membre->ID)." width='212' height='212'/> </p>";

				echo "<p>".get_the_title($membre->ID)."</p>";

				echo "<p>".get_field("biographie", $membre->ID)."</p></div>";
				
				}
				?>
			</div>
		</div>
	</main>

<!--<?php get_footer(); ?>-->