<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Norion
 */

if ( ! function_exists( 'norion_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function norion_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'norion' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<i class="fa fa-chevron-left fa-fw"></i> Older', 'norion' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer <i class="fa fa-chevron-right fa-fw"></i>', 'norion' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'norion_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function norion_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'norion' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<i class="fa fa-chevron-left fa-fw"></i> %title', 'Previous post link', 'norion' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <i class="fa fa-chevron-right fa-fw"></i>', 'Next post link',     'norion' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'norion_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function norion_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'F j, Y \a\t g:i a' ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<div class="posted-on"><i class="fa fa-clock-o fa-fw"></i> %1$s</div>', 'norion' ),
                $time_string
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function norion_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'norion_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'norion_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so norion_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so norion_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in norion_categorized_blog.
 */
function norion_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'norion_categories' );
}
add_action( 'edit_category', 'norion_category_transient_flusher' );
add_action( 'save_post',     'norion_category_transient_flusher' );
