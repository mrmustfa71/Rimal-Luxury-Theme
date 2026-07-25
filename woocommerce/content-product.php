<?php
/**
 * The template for displaying product content within loops.
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

$product_id = $product->get_id();
?>
<li <?php wc_product_class( 'component-card component-product-card', $product ); ?>>
    <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

    <div class="component-card__media">
        <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
    </div>

    <div class="component-card__body">
        <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
    </div>

    <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
</li>
