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
        'rimal-luxury-theme-variables',
        RIMAL_LUXURY_THEME_URI . '/assets/css/variables.css',
        array( 'rimal-luxury-theme-style' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-base',
        RIMAL_LUXURY_THEME_URI . '/assets/css/base.css',
        array( 'rimal-luxury-theme-variables' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-typography',
        RIMAL_LUXURY_THEME_URI . '/assets/css/typography.css',
        array( 'rimal-luxury-theme-base' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-layout',
        RIMAL_LUXURY_THEME_URI . '/assets/css/layout.css',
        array( 'rimal-luxury-theme-typography' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-header',
        RIMAL_LUXURY_THEME_URI . '/assets/css/header.css',
        array( 'rimal-luxury-theme-layout' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-components',
        RIMAL_LUXURY_THEME_URI . '/assets/css/components.css',
        array( 'rimal-luxury-theme-header' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-footer',
        RIMAL_LUXURY_THEME_URI . '/assets/css/footer.css',
        array( 'rimal-luxury-theme-components' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-buttons',
        RIMAL_LUXURY_THEME_URI . '/assets/css/buttons.css',
        array( 'rimal-luxury-theme-footer' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-forms',
        RIMAL_LUXURY_THEME_URI . '/assets/css/forms.css',
        array( 'rimal-luxury-theme-buttons' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-cards',
        RIMAL_LUXURY_THEME_URI . '/assets/css/cards.css',
        array( 'rimal-luxury-theme-forms' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-utilities',
        RIMAL_LUXURY_THEME_URI . '/assets/css/utilities.css',
        array( 'rimal-luxury-theme-cards' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-animations',
        RIMAL_LUXURY_THEME_URI . '/assets/css/animations.css',
        array( 'rimal-luxury-theme-utilities' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    wp_enqueue_style(
        'rimal-luxury-theme-responsive',
        RIMAL_LUXURY_THEME_URI . '/assets/css/responsive.css',
        array( 'rimal-luxury-theme-animations' ),
        RIMAL_LUXURY_THEME_VERSION,
        'all'
    );

    if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
        wp_enqueue_style(
            'rimal-luxury-theme-shop',
            RIMAL_LUXURY_THEME_URI . '/assets/css/shop.css',
            array( 'rimal-luxury-theme-components' ),
            RIMAL_LUXURY_THEME_VERSION,
            'all'
        );

        if ( is_product() ) {
            wp_enqueue_style(
                'rimal-luxury-theme-product',
                RIMAL_LUXURY_THEME_URI . '/assets/css/product.css',
                array( 'rimal-luxury-theme-shop' ),
                RIMAL_LUXURY_THEME_VERSION,
                'all'
            );
        }

        if ( is_cart() ) {
            wp_enqueue_style(
                'rimal-luxury-theme-cart',
                RIMAL_LUXURY_THEME_URI . '/assets/css/cart.css',
                array( 'rimal-luxury-theme-shop' ),
                RIMAL_LUXURY_THEME_VERSION,
                'all'
            );
        }

        if ( is_checkout() ) {
            wp_enqueue_style(
                'rimal-luxury-theme-checkout',
                RIMAL_LUXURY_THEME_URI . '/assets/css/checkout.css',
                array( 'rimal-luxury-theme-shop' ),
                RIMAL_LUXURY_THEME_VERSION,
                'all'
            );
        }

        if ( is_account_page() ) {
            wp_enqueue_style(
                'rimal-luxury-theme-account',
                RIMAL_LUXURY_THEME_URI . '/assets/css/account.css',
                array( 'rimal-luxury-theme-shop' ),
                RIMAL_LUXURY_THEME_VERSION,
                'all'
            );
        }

        wp_enqueue_script(
            'rimal-luxury-theme-shop',
            RIMAL_LUXURY_THEME_URI . '/assets/js/shop.js',
            array( 'rimal-luxury-theme-components', 'wc-add-to-cart' ),
            RIMAL_LUXURY_THEME_VERSION,
            true
        );
    }

    wp_enqueue_script(
        'rimal-luxury-theme-script',
        RIMAL_LUXURY_THEME_URI . '/assets/js/theme.js',
        array(),
        RIMAL_LUXURY_THEME_VERSION,
        true
    );

    wp_enqueue_script(
        'rimal-luxury-theme-header',
        RIMAL_LUXURY_THEME_URI . '/assets/js/header.js',
        array(),
        RIMAL_LUXURY_THEME_VERSION,
        true
    );

    wp_enqueue_script(
        'rimal-luxury-theme-components',
        RIMAL_LUXURY_THEME_URI . '/assets/js/components.js',
        array(),
        RIMAL_LUXURY_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'rimal_luxury_theme_enqueue_assets' );
