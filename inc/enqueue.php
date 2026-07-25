<?php
/**
 * Theme assets registration and enqueue.
 *
 * @package Rimal_Luxury_Theme
 */

function rimal_luxury_theme_enqueue_assets() {
    wp_enqueue_style(
        'rimal-luxury-theme-style',
        RIMAL_LUXURY_THEME_URI . '/style.css',
        array(),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-main',
        RIMAL_LUXURY_THEME_URI . '/assets/css/theme.css',
        array( 'rimal-luxury-theme-style' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_script(
        'rimal-luxury-theme-script',
        RIMAL_LUXURY_THEME_URI . '/assets/js/theme.js',
        array(),
        RIMAL_LUXURY_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'rimal_luxury_theme_enqueue_assets' );
