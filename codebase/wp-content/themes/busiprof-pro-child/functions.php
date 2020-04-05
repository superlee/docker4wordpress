<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'style','style','bootstrap-css','custom-css','flexslider-css','default-css','font-awesome-css','lightbox-css' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );
function busiprof_pro_child_get_parent_options() {
	$busiprof_pro_mods = get_option( 'theme_mods_busiprof-pro' );
	if ( ! empty( $busiprof_pro_mods ) ) {
		foreach ( $busiprof_pro_mods as $busiprof_pro_mod_k => $busiprof_pro_mod_v ) {
			set_theme_mod( $busiprof_pro_mod_k, $busiprof_pro_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'busiprof_pro_child_get_parent_options' );

// END ENQUEUE PARENT ACTION
