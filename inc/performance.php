<?php
/**
 * Performance optimizations and cleanup.
 *
 * @package Rimal_Luxury_Theme
 */

function rimal_luxury_theme_remove_emoji_support() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'rimal_luxury_theme_remove_emoji_support' );

function rimal_luxury_theme_disable_wp_embed() {
    wp_deregister_script( 'wp-embed' );
    add_filter( 'tiny_mce_plugins', 'rimal_luxury_theme_filter_tinymce_plugins' );
}
add_action( 'wp_footer', 'rimal_luxury_theme_disable_wp_embed' );

/**
 * Filter TinyMCE plugins to remove wpembed.
 *
 * @param array|null $plugins List of TinyMCE plugins.
 * @return array|null Filtered list of TinyMCE plugins.
 */
function rimal_luxury_theme_filter_tinymce_plugins( $plugins ) {
    return is_array( $plugins ) ? array_diff( $plugins, array( 'wpembed' ) ) : $plugins;
}


