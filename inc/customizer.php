<?php
/**
 * Theme Customizer integration.
 *
 * @package Rimal_Luxury_Theme
 */

function rimal_luxury_theme_customize_register( WP_Customize_Manager $wp_customize ) {
    $wp_customize->add_section(
        'rimal_luxury_theme_colors',
        array(
            'title'      => esc_html__( 'Colors', 'rimal-luxury-theme' ),
            'priority'   => 160,
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_setting(
        'rimal_luxury_theme_accent_color',
        array(
            'default'           => '#b08b4f',
            'sanitize_callback' => 'rimal_luxury_theme_sanitize_color',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'rimal_luxury_theme_accent_color',
            array(
                'label'    => esc_html__( 'Accent Color', 'rimal-luxury-theme' ),
                'section'  => 'rimal_luxury_theme_colors',
                'settings' => 'rimal_luxury_theme_accent_color',
            )
        )
    );
}
add_action( 'customize_register', 'rimal_luxury_theme_customize_register' );
