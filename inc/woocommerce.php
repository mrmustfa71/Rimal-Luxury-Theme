<?php
/**
 * WooCommerce compatibility handlers.
 *
 * @package Rimal_Luxury_Theme
 */

function rimal_luxury_theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'rimal_luxury_theme_add_woocommerce_support' );

function rimal_luxury_theme_woocommerce_body_class( $classes ) {
    if ( class_exists( 'WooCommerce' ) ) {
        $classes[] = 'woocommerce-active';
    }
    return $classes;
}
add_filter( 'body_class', 'rimal_luxury_theme_woocommerce_body_class' );

function rimal_luxury_theme_woocommerce_scripts() {
    if ( class_exists( 'WooCommerce' ) ) {
        wp_dequeue_style( 'woocommerce-general' );
    }
}
add_action( 'wp_enqueue_scripts', 'rimal_luxury_theme_woocommerce_scripts', 20 );
