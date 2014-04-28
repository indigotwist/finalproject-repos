<?php
/**
 * @package kookybooky_theme
 */
?>
<div class="col-xs-offset-4 col-xs-8">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
	<div class="entry-thumb col-xs-2">
		<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
	</div>

	<div class="col-xs-10">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php kookybooky_theme_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_field('recipe_description'); ?>
		</div><!-- .entry-summary -->
	</div>
	</div><!--end .row-->
</article><!-- #post-## -->
</div><!--end .row-->
