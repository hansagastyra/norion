<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Norion
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php printf( __( 'Proudly powered by %s', '_s' ),
				'<a href="'.esc_url( __( 'http://wordpress.org/', '_s' ) ). '">' . 'WordPress' . '</a>' ); ?>
			<span class="sep"> x </span>
			<?php $themeinfo = wp_get_theme(); ?>
			<?php printf( __( '%1$s', 'norion' ), 
				'<a href="' . $themeinfo->get('ThemeURI') . '" rel="theme-name">' . $themeinfo->get('Name') . '</a>'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
