<?php
/*
 Template Name: Recipes Post Type
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article class="recipe">
				<!--Ingredients - Repeater field group-->
				<section class="ingredients">
					<header>
						<h1>Ingredients</h1>
					</header>

					<ul><?php

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

				<header>
					<!--Recipe Name - Title field-->
					<?php the_title( '<h1>', '</h1>' ); ?>

					<!--Recipe Description - Textarea-->
					<?php the_field('recipe_description'); ?>
				</header>

				<section class="share-menu">
					<a href="#0">Print</a>

					<p> or Share This Recipe: </p>

					<ul class="share-icons">
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
				    <div id="slider" class="flexslider">
				        <ul class="slides">
				            <?php foreach( $images as $image ): ?>
				                <li>
				                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				                    <p><?php echo $image['caption']; ?></p>
				                </li>
				            <?php endforeach; ?>
				        </ul>
				    </div>
				    <?php

				    /*
				    *  The following code creates the thumbnail navigation
				    */

				    ?>
				    <div id="carousel" class="flexslider">
				        <ul class="slides">
				            <?php foreach( $images as $image ): ?>
				                <li>
				                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
				                </li>
				            <?php endforeach; ?>
				        </ul>
				    </div>
				<?php endif;

				?>

				<section class="recipe-info">
					<!--Yield Amount - Text field-->
					<h1>Yield:</h1>
					<p><?php the_field('yield_amount'); ?></p>

					<!--Prep Time - Text field-->
					<h1>Prep Time:</h1>
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
					<h1>Cook Time:</h1>
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

			<!--Related Recipes - Post type field-->
			<section class="related-recipes">
				<header>
					<h1>Related Recipes</h1>
				</header>

				<?php related_posts(); ?>
			</section><!--end .related-recipes-->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template('', true);
				endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>