<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main home-content" role="main">

			<div class="row">
			<h1 class="col-xs-offset-4 col-xs-8"><?php the_field('headline'); ?></h1>
			</div><!--end .row-->

			<div class="row">
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
			</div><!--end .row-->

			<div class="row">
			<!--Related Recipes-->
			<section class="featured-recipes-tab col-xs-12">
				<div class="row">
				<div class="featured-tab-title col-xs-4"><h1>Featured Recipes</h1></div>
				</div>

				<?php $orig_post = $post;
				global $post;


					$args=array(
						'post_type' => 'recipe',
						'posts_per_page'=> 4, // Number of featured posts that will be shown.
					);

					$featured_query = new wp_query( $args );

					if( $featured_query->have_posts() ) {
						echo '<div class="row"><div class="featured-content col-xs-12"><ul>';

						while( $featured_query->have_posts() ) {
							$featured_query->the_post();?>

							<li class="col-xs-3">
								<div class="featured-thumb">
									<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
								</div>

								<div class="featured-title">
									<h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</li>
						<?php
						}

						echo '</ul></div></div>';
					}


				$post = $orig_post;
				wp_reset_query(); ?>
			</section><!--end .featured-recipes-tabs-->
			</div><!--end .row-->


<!--
			<?php if ( kookybooky_get_featured_posts(1) ) : ?>
			    <div id="featured">

			        <h2><?php _e( 'Featured Content', 'kookybooky' ); ?></h2>

			        <?php foreach ( $featured as $post ) : setup_postdata( $post ); ?>

			            <?php get_template_part( 'featured', get_post_format() ); ?>

			        <?php endforeach; ?>
			    </div>
			<?php endif; ?>
 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
