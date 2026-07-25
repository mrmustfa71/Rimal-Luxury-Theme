<?php
/**
 * Theme bootstrap file.
 *
 * @package Rimal_Luxury_Theme
 */

if ( ! defined( 'RIMAL_LUXURY_THEME_VERSION' ) ) {
    define( 'RIMAL_LUXURY_THEME_VERSION', '1.0.0' );
}

if ( ! defined( 'RIMAL_LUXURY_THEME_DIR' ) ) {
    define( 'RIMAL_LUXURY_THEME_DIR', get_template_directory() );
}

if ( ! defined( 'RIMAL_LUXURY_THEME_URI' ) ) {
    define( 'RIMAL_LUXURY_THEME_URI', get_template_directory_uri() );
}

require_once RIMAL_LUXURY_THEME_DIR . '/inc/setup.php';
require_once RIMAL_LUXURY_THEME_DIR . '/inc/enqueue.php';
require_once RIMAL_LUXURY_THEME_DIR . '/inc/helpers.php';
require_once RIMAL_LUXURY_THEME_DIR . '/inc/woocommerce.php';
require_once RIMAL_LUXURY_THEME_DIR . '/inc/performance.php';
require_once RIMAL_LUXURY_THEME_DIR . '/inc/customizer.php';
