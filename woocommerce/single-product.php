<?php
/**
 * The template for displaying product content in the single-product.php template.
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
    the_post();
    do_action( 'woocommerce_before_main_content' );
    wc_get_template_part( 'content', 'single-product' );
    do_action( 'woocommerce_after_main_content' );
endwhile;

get_footer();
