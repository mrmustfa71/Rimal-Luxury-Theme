<?php
/**
 * Theme setup and support registrations.
 *
 * @package Rimal_Luxury_Theme
 */

function rimal_luxury_theme_setup() {
    load_theme_textdomain( 'rimal-luxury-theme', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'rimal-luxury-theme' ),
        )
    );

    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/theme.css' );
}
add_action( 'after_setup_theme', 'rimal_luxury_theme_setup' );
