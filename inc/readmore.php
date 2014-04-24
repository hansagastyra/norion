<?php

/* 
 * To change readmore text
 */

function new_excerpt_more($more) {
   global $post;
   return '<p><div class="readmore"><a href="'. get_permalink($post->ID) . '">' . 'Read More <i class="fa fa-chevron-right fa-fw"></i>' . '</a></div></p>';
}

add_filter('excerpt_more', 'new_excerpt_more');