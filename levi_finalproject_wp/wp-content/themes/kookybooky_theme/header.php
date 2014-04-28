<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kookybooky_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function($) {
    	$('.flexslider').flexslider({
	    animation: "slide",
	    controlNav: "thumbnails"
	  });
	});
</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<section id="header-bg">
		<header id="masthead" class="site-header container" role="banner">
			<div class="site-branding col-xs-3 col-xs-offset-1">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div>

			<div class="header-content col-xs-8 col-xs-offset-4">
				<div class="row">
					<h2 class="site-description col-xs-8"><?php bloginfo( 'description' ); ?></h2>

					<aside id="search" class="widget widget_search col-xs-4">
						<?php get_search_form(); ?>
					</aside>

					<button class="add-recipe-button col-xs-offset-8 col-xs-4">
						<a href="<?php echo wp_login_url( admin_url() ); ?>" title="Login">Add New Recipe</a>
					</button>

					<nav id="site-navigation" class="main-navigation col-xs-12" role="navigation">
						<h1 class="menu-toggle"><?php _e( 'Menu', 'kookybooky_theme' ); ?></h1>
						<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kookybooky_theme' ); ?></a>

						<?php

						$backup_query = $wp_query;
						$wp_query = new WP_Query(array('post_type' => 'post'));

						wp_nav_menu( array( 'theme_location' => 'primary' ) );

						$wp_query = $backup_query;

						?>
					</nav><!-- #site-navigation --></div>
				</div>
			</div>
		</header><!-- #masthead -->

		<div class="header-slideshow">
			<div class="photo-slides"></div>
		</div>
	</section><!-- #header-bg -->

	<section id="content" class="site-content container">
