<?php
/**
 * @package Norion
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
                    <div class="meta-date">
                        <div class="meta-day"><?php the_time('d') ?></div>
                        <div class="meta-month"><?php the_time('M') ?></div>
                    </div>
                    <div class="entry-author">
                        <?php printf( __('by <a href="%1s">%2s</a>', 'norion'),
                                get_author_posts_url( get_the_author_meta( 'ID' ) ),
                                get_the_author()
                                ); ?>
                    </div>
                    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                    <div class="comments-link"><?php comments_popup_link( __( '0 comment', 'norion' ), __( '1 Comment', 'norion' ), __( '% Comments', 'norion' ) ); ?></div>
                    <?php endif; ?>
                    <?php edit_post_link( __( 'Edit', 'norion' ), '<div class="edit-link">', '</div>' ); ?>
		</div><!-- .entry-meta -->
        <?php endif; ?>
                
        <div class="entry-block">
            <header class="entry-header">
                    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </header><!-- .entry-header -->

            <footer class="entry-footer">
                    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                            <?php
                                    $categories_list = get_the_category_list( __( ', ', 'norion' ) );
                                    if ( $categories_list) :
                            ?>
                            <i class="fa fa-folder-o fa-fw"></i>
                            <span class="cat-links">
                                <?php printf( __( '%1$s', 'norion' ), $categories_list ); ?>
                            </span>
                            <?php endif; // End if categories ?>
                    <?php endif; // End if 'post' == get_post_type() ?>
            </footer><!-- .entry-footer -->
            
            <?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                    <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
                <?php if(has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                <?php else : ?>
                    <div class="entry-content">
                            <?php the_content( __( '<div class="readmore">Read more <i class="fa fa-chevron-right fa-fw"></i></div>', 'norion' ) ); ?>
                            <?php
                                    wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'norion' ),
                                            'after'  => '</div>',
                                    ) );
                            ?>
                    </div><!-- .entry-content -->
                <?php endif; ?>
            <?php endif; ?>
        </div>
</article><!-- #post-## -->
