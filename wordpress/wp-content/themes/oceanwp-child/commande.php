<?php 
/*
Template Name: Page commande 
*/

get_header(); ?>

<div class="fond_vert">
	<div class="center page_commande">
		<h3 class="titrep3"><?php the_title(); ?></h3>
		<div class="container">
			<?php 
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); 
						
						the_content();

					} 
				} 
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>