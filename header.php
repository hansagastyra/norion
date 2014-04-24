<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Norion
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
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
                <div class="header-top">
                    <div class="site-logo">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                    <div id="site-navigation" class="main-navigation" role="navigation">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'depth' => 1
                            ) ); ?>
                    </div><!-- #site-navigation -->
                </div>
                <div class="site-banner">
                        <?php if( is_home() ) : ?>
                        <?php   echo '<h2>' . get_theme_mod('home_text_1', 'Welcome') . '</h2><h3>' . get_theme_mod('home_text_2', 'to my personal website and home.') . '</h3>'; ?>
                        <?php elseif ( is_page() ) : ?>
                        <?php   the_title('<h1>','</h1>'); ?>
                        <?php elseif ( is_search() ) : ?>
                        <?php   echo '<h1>Search</h1>'; ?>
                        <?php elseif ( is_archive() ) : ?>
                        <?php   echo '<h1>Archive</h1>'; ?>
                        <?php elseif (is_404()) : ?>
                        <?php   echo '<h1>404</h1>'; ?>
                        <?php elseif ( is_single()) : ?>
                        <?php   the_title('<h1>','</h1>'); ?>
                        <?php endif; ?>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="row site-content">
