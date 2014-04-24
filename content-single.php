<?php
/**
 * @package Norion
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
        <div class="entry-block">
            <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                            wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'norion' ),
                                    'after'  => '</div>',
                            ) );
                    ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                    <?php norion_posted_on(); ?>
                    <?php
                            /* translators: used between list items, there is a space after the comma */
                            $category_list = get_the_category_list( __( ', ', 'norion' ) );

                            /* translators: used between list items, there is a space after the comma */
                            $tag_list = get_the_tag_list( '', __( ', ', 'norion' ) );
                            
                            $meta_text = '<div><i class="fa fa-folder-o fa-fw"></i> %1$s</div>';
                            if ( '' != $tag_list ) {
                                    $meta_text .= '<div><i class="fa fa-tag fa-fw"></i> %2$s</div>';
                            }

                            printf(
                                    $meta_text,
                                    '<span class="cat-links">'.$category_list.'</span>',
                                    '<span class="cat-links">'.$tag_list.'</span>'
                            );
                    ?>
            </footer><!-- .entry-footer -->
        </div>
</article><!-- #post-## -->
