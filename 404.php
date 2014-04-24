<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Norion
 */

get_header(); ?>

	<div id="primary" class="small-12 medium-8 columns content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Sorry, the page can&rsquo;t be found :(', 'norion' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'Nothing was found at this location. Wanna search something?', 'norion' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>