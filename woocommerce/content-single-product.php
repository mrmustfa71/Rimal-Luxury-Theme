<?php
/**
 * The template for displaying single product content.
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product || ! $product->is_visible() ) {
    return;
}
?>
<?php do_action( 'woocommerce_before_single_product' ); ?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'single-product container', $product ); ?> data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">
    <div class="single-product__gallery">
        <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
    </div>

    <div class="single-product__summary">
        <?php do_action( 'woocommerce_single_product_summary' ); ?>
    </div>

    <div class="single-product__details">
        <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
