<?php
/**
 * Cart Page
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;
?>
<main id="primary" class="site-main container woocommerce-cart">
    <?php wc_print_notices(); ?>
    <?php do_action( 'woocommerce_before_cart' ); ?>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <table class="shop_table shop_table_responsive cart" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-thumbnail"><?php esc_html_e( 'Product', 'rimal-luxury-theme' ); ?></th>
                    <th class="product-name"><?php esc_html_e( 'Description', 'rimal-luxury-theme' ); ?></th>
                    <th class="product-price"><?php esc_html_e( 'Price', 'rimal-luxury-theme' ); ?></th>
                    <th class="product-quantity"><?php esc_html_e( 'Quantity', 'rimal-luxury-theme' ); ?></th>
                    <th class="product-subtotal"><?php esc_html_e( 'Total', 'rimal-luxury-theme' ); ?></th>
                    <th class="product-remove">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>
                <?php do_action( 'woocommerce_cart_contents' ); ?>
                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </tbody>
        </table>

        <?php do_action( 'woocommerce_cart_actions' ); ?>
        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

        <?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>

    <?php do_action( 'woocommerce_cart_collaterals' ); ?>
    <?php do_action( 'woocommerce_after_cart' ); ?>
</main>
<?php
get_footer();
