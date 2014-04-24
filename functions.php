<?php
/**
 * Norion functions and definitions
 *
 * @package Norion
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'norion_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function norion_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Norion, use a find and replace
	 * to change 'norion' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'norion', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'norion' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'norion_custom_background_args', array(
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
}
endif; // norion_setup
add_action( 'after_setup_theme', 'norion_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function norion_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'norion' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'norion_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function norion_scripts() {
	//-reset using normalize.css
	wp_enqueue_style('normalize', get_stylesheet_directory_uri().'/css/normalize.css');
	//-foundation
	wp_enqueue_style('foundation', get_stylesheet_directory_uri().'/css/foundation.min.css');
	//-font-awesome
	wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
	//-google-fonts
        wp_enqueue_style( 'raleway', 'http://fonts.googleapis.com/css?family=Raleway:300,400italic,400,700');
//        wp_enqueue_style( 'roboto', 'http://fonts.googleapis.com/css?family=Roboto:100,400italic,400,700');
        wp_enqueue_style( 'montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700');
//        wp_enqueue_style( 'oswald', 'http://fonts.googleapis.com/css?family=Oswald:700');
        //-main style
	wp_enqueue_style( 'norion-style', get_stylesheet_uri() );

	//-modernizr (on head)
	wp_enqueue_script('modernizr', get_stylesheet_directory_uri().'/js/foundation/vendor/modernizr.js', array(), false, false);
	//-jquery (on footer)
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', true);
	wp_enqueue_script('jquery');
	//-foundation js
	wp_enqueue_script('foundation', get_stylesheet_directory_uri().'/js/foundation/foundation.min.js', array('jquery'), '5.2.2', true);
	
        //Our main scripts
        wp_enqueue_script( 'norion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), false, true);
	wp_enqueue_script( 'norion-script', get_template_directory_uri() . '/js/main.js', array(), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'norion_scripts' );

/*
 * Add social media contact into user profile
 */
require get_template_directory() . '/inc/social-media-profile.php';

/**
 * Custom readmore link
 */
require get_template_directory() . '/inc/readmore.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
