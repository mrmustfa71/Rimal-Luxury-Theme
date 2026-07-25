<?php
/**
 * Global helper utilities.
 *
 * @package Rimal_Luxury_Theme
 */

if ( ! function_exists( 'rimal_luxury_theme_sanitize_color' ) ) {
    /**
     * Sanitize a hex color value.
     *
     * @param string $color Color value.
     * @return string
     */
    function rimal_luxury_theme_sanitize_color( $color ) {
        if ( preg_match( '/^#([A-Fa-f0-9]{3}){1,2}$/', $color ) ) {
            return $color;
        }
        return '#000000';
    }
}

if ( ! function_exists( 'rimal_luxury_theme_get_excerpt' ) ) {
    /**
     * Get the trimmed excerpt for a post.
     *
     * @param int $length Number of words.
     * @return string
     */
    function rimal_luxury_theme_get_excerpt( $length = 24 ) {
        $excerpt = wp_trim_words( get_the_excerpt(), $length, '...' );
        return esc_html( $excerpt );
    }
}
