<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Norion
 */

get_header(); ?>

	<div id="primary" class="small-12 medium-8 columns content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php norion_post_nav(); ?>

                        <div id="post-author" class="author-container">
                            <div class="author-header">
                                <h3>Author : <?php the_author_link(); ?></h3>
                            </div>
                            <div class="author-image">
                                <?php echo get_avatar( get_the_author_meta('email'), 90); ?>
                            </div>
                            <div class="author-bio">
                                <div class="author-description">
                                    <?php echo get_the_author_meta('description'); ?>
                                </div>
                                <div class="author-socialmedia">
                                
                                </div>
                            </div>
                        </div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>