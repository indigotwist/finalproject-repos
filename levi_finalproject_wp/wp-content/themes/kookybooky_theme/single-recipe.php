<?php
/*
 Template Name: Recipes Post Type
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row">
			<!--Ingredients - Repeater field group-->
			<section class="ingredients col-xs-4">
				<header>
					<h1>Ingredients</h1>
				</header>

				<ul class="list-unstyled"><?php

				// check if the repeater field has rows of data
				if( have_rows('ingredients') ):

				 	// loop through the rows of data
				    while ( have_rows('ingredients') ) : the_row(); ?>

							<li><?php
								the_sub_field('quantity'); ?>&nbsp;<?php

								the_sub_field('qty_fraction'); ?>&nbsp;<?php

								the_sub_field('measurement'); ?>&nbsp;<?php

								the_sub_field('item'); ?>
						    </li>

				    <?php endwhile;

				else :

				    // no rows found

				endif; ?>
				</ul>
			</section><!--end .ingredients-->

			<article class="recipe col-xs-8">
				<section class="recipe-header">
					<!--Recipe Name - Title field-->
					<?php the_title( '<h1>', '</h1>' ); ?>

					<!--Recipe Description - Textarea-->
					<?php the_field('recipe_description'); ?>
				</section>

				<section class="share-menu">
					<p class="pull-left"><a href="#0">Print</a> or Share This Recipe: </p>

					<ul class="share-icons list-inline">
						<li><a href="#0"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/04/email-variation.png" alt="email"></a></li>
						<li><a href="#0"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/04/pinterest.png" alt="pinterest"></a></li>
						<li><a href="#0"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/04/facebook-variation.png" alt="facebook"></a></li>
						<li><a href="#0"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/04/twitter-variation.png" alt="twitter"></a></li>
						<li><a href="#0"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/04/gplus-variation2.png" alt="google plus"></a></li>
						<li><a href="#0"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/04/rss-variation.png" alt="rss"></a></li>
					</ul>
				</section><!--end .share-menu-->

				<!--Gallery Field with Repeated images-->
				<?php $images = get_field('recipe_gallery');

				if( $images ): ?>
				    <div id="carousel" class="flexslider">
				        <ul class="slides">
				            <?php foreach( $images as $image ): ?>
				                <li data-thumb="<?php echo $image['sizes']['thumbnail']; ?>">
				                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				                </li>
				            <?php endforeach; ?>
				        </ul>
				    </div>
				<?php endif;

				?>

				<section class="recipe-info">
					<!--Yield Amount - Text field-->
					<h1>Yield</h1>
					<p><?php the_field('yield_amount'); ?></p>

					<!--Prep Time - Text field-->
					<h1>Prep Time</h1>
					<p><?php

					// check if the repeater field has rows of data
					if( have_rows('prep_time') ):

					 	// loop through the rows of data
					    while ( have_rows('prep_time') ) : the_row();

					        // display the sub field values
					        the_sub_field('amount'); ?>&nbsp;<?php

					        the_sub_field('time_increment');

					    endwhile;

					else :

					    // no rows found

					endif;

					?></p>

					<!--Cook Time - Text field-->
					<h1>Cook Time</h1>
					<p><?php

					// check if the repeater field has rows of data
					if( have_rows('cook_time') ):

					 	// loop through the rows of data
					    while ( have_rows('cook_time') ) : the_row();

					        // display the sub field values
					        the_sub_field('amount'); ?>&nbsp;<?php

					        the_sub_field('time_increment');

					    endwhile;

					else :

					    // no rows found

					endif;

					?></p>
				</section>

				<!--Instructions - Repeater Textarea field-->
				<section class="instructions">
					<header>
						<h1>Instructions</h1>
					</header>

					<?php

					// check if the repeater field has rows of data
					if( have_rows('instructions') ):

					 	// loop through the rows of data
					    while ( have_rows('instructions') ) : the_row();

					        // display a sub field value
					        the_sub_field('step');

					    endwhile;

					else :

					    // no rows found

					endif;

					the_field('alternatives');

					the_field('tips'); ?>
				</section><!--end .instructions-->
			</article><!--end .recipe-->
			</div><!--end .row-->

			<div class="row">
			<!--Related Recipes-->
			<section class="related-recipes-tab col-xs-12">
				<div class="row">
				<div class="related-tab-title col-xs-4"><h1>Related Recipes</h1></div>
				</div>

				<?php $orig_post = $post;
				global $post;
				$categories = get_the_category($post->ID);

				if ($categories) {
					$category_ids = array();

					foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

					$args=array(
						'post_type' => 'recipe',
						'category__in' => $category_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=> 4, // Number of related posts that will be shown.
						'caller_get_posts'=>1
					);

					$related_query = new wp_query( $args );

					if( $related_query->have_posts() ) {
						echo '<div class="row"><div class="related-content col-xs-12"><ul>';

						while( $related_query->have_posts() ) {
							$related_query->the_post();?>

							<li class="col-xs-3">
								<div class="related-thumb">
									<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
								</div>

								<div class="related-title">
									<h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</li>
						<?php
						}

						echo '</ul></div></div>';
					}
				}

				$post = $orig_post;
				wp_reset_query(); ?>
			</section><!--end .related-recipes-tabs-->
			</div><!--end .row-->

			<div class="row">
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template('', true);
				endif;
			?>
			</div><!--end .row-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>