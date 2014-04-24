<?php
/**
 * Norion Theme Customizer
 *
 * @package Norion
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function norion_customize_register( $wp_customize ) {
        $wp_customize->add_setting( 'theme_banner_image', array(
            'default'   => '',
            'transport' => 'postMessage'
        ) );
        $wp_customize->add_setting( 'home_text_1', array(
            'default'   => 'Welcome',
            'transport' => 'postMessage'
        ) );
        $wp_customize->add_setting( 'home_text_2', array(
            'default'   => 'to my personal website and home.',
            'transport' => 'postMessage'
        ) );
        $wp_customize->add_section( 'theme_header_section', array(
            'title'     => 'Header',
            'priority'  => 29
        ) );
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_banner_image', array(
            'label'     => __('Banner Image', 'norion'),
            'section'   => 'theme_header_section',
            'settings'  => 'theme_banner_image'
        ) ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_text_1', array(
            'label'     => __('Home Text 1', 'flameon'),
            'section'   => 'theme_header_section',
            'settings'  => 'home_text_1'
        ) ) );
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_text_2', array(
            'label'     => __('Home text 2', 'flameon'),
            'section'   => 'theme_header_section',
            'settings'  => 'home_text_2'
        ) ) );
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'norion_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function norion_customize_preview_js() {
	wp_enqueue_script( 'norion_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'norion_customize_preview_js' );

function theme_customize(){
    ?>
        <style type="text/css">
            body{
                background: url("<?php echo get_theme_mod('theme_banner_image'); ?>") no-repeat center center;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            @media only screen{
                body{
                    background: url("<?php echo get_theme_mod('theme_banner_image'); ?>") no-repeat center center fixed;
                    -moz-background-size: cover;
                    -webkit-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                }
            }
        </style>
    <?php
}
add_action( 'wp_head', 'theme_customize');