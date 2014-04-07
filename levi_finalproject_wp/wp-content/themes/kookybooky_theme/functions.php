<?php
/**
 * kookybooky_theme functions and definitions
 *
 * @package kookybooky_theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'kookybooky_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kookybooky_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kookybooky_theme, use a find and replace
	 * to change 'kookybooky_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kookybooky_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kookybooky_theme' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kookybooky_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

	// Enable support for Post Thumbnails (or Featured Image).
	add_theme_support( 'post-thumbnails' );
}
endif; // kookybooky_theme_setup
add_action( 'after_setup_theme', 'kookybooky_theme_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function kookybooky_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kookybooky_theme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kookybooky_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kookybooky_theme_scripts() {
	wp_enqueue_style( 'kookybooky_theme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'flexslider_style', get_template_directory_uri() . 'flexslider.css');

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . 'js/jquery.flexslider-min.js', array( 'jquery' ), true );

	wp_enqueue_script( 'kookybooky_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'kookybooky_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kookybooky_theme_scripts' );

/**
 * Web font styles.
 */
function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Josefin+Slab:400,700|Lobster+Two|Open+Sans:400italic,700italic,400');
            wp_enqueue_style( 'googleFonts');
        }

    add_action('wp_print_styles', 'load_fonts');

/**
 * Custom Post Types for this theme.
 */
add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
 register_post_type( 'recipe',
 array(
      'labels' => array(
      	'name' => __( 'Recipes' ),
      	'singular_name' => __( 'Recipe' ),
      	'add_new' => __( 'Add New' ),
      	'add_new_item' => __( 'Add New Recipe' ),
      	'edit' => __( 'Edit' ),
      	'edit_item' => __( 'Edit Recipe' ),
      	'new_item' => __( 'New Recipe' ),
      	'view' => __( 'View Recipe' ),
      	'view_item' => __( 'View Recipe' ),
      	'search_items' => __( 'Search Recipes' ),
      	'not_found' => __( 'No Recipes found' ),
      	'not_found_in_trash' => __( 'No Recipes found in Trash' ),
      	'parent' => __( 'Parent Recipe' ),
      ),
 'public' => true,
      'menu_position' => 4,
      'rewrite' => array('slug' => 'recipes'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
     )
  );
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
