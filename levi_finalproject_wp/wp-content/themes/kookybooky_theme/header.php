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
    	$(window).load(function() {
    	$('.flexslider').flexslider();
  		});
	});
</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<section class="header-bg">
		<div class="header-green-bar"></div>
		<div class="header-checkered-rule"></div>
		<div class="header-slideshow">
			<div class="photo-slides"></div>
		</div>
	</section>

	<section id="wrapper">

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<div class="add-recipe-button">
				<a href="<?php echo wp_login_url( admin_url() ); ?>" title="Login">Add New Recipe</a>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'kookybooky_theme' ); ?></h1>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kookybooky_theme' ); ?></a>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">
