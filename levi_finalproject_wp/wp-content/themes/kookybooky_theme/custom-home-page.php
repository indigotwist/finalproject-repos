<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main home-content" role="main">

			<h1><?php the_field('headline'); ?></h1>

			<div class="body-copy">
				<?php
				if( have_rows('body_copy') ):

				 	// loop through the rows of data
				    while ( have_rows('body_copy') ) : the_row(); ?>

						<p><?php the_sub_field('paragraph'); ?></p>

				    <?php endwhile;

				else :

				    // no rows found

				endif; ?>
			</div>

			<?php while ( have_posts() ) : the_post(); ?>


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>