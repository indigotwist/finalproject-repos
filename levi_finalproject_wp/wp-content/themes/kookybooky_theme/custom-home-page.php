<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main home-content" role="main">

			<h1 class="col-xs-offset-4 col-xs-8"><?php the_field('headline'); ?></h1>

			<div class="body-copy col-xs-offset-4 col-xs-8">
				<?php
				if( have_rows('body_copy') ):

				 	// loop through the rows of data
				    while ( have_rows('body_copy') ) : the_row(); ?>

						<?php the_sub_field('paragraph'); ?>

				    <?php endwhile;

				else :

				    // no rows found

				endif; ?>
			</div>

			<?php if ( kookybooky_get_featured_posts(1) ) : ?>
			    <div id="featured">

			        <h2><?php _e( 'Featured Content', 'kookybooky' ); ?></h2>

			        <?php foreach ( $featured as $post ) : setup_postdata( $post ); ?>

			            <?php get_template_part( 'featured', get_post_format() ); ?>

			        <?php endforeach; ?>
			    </div>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
