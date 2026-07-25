<?php
/**
 * Checkout Page
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;

$checkout = WC()->checkout();
?>
<main id="primary" class="site-main container woocommerce-checkout">
    <?php wc_print_notices(); ?>
    <?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        <?php if ( $checkout->get_checkout_fields() ) : ?>
            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

            <div class="customer-details-grid">
                <div class="billing-details">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>

                <div class="shipping-details">
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                </div>
            </div>

            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
        <?php endif; ?>

        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
        <aside class="checkout-order-summary">
            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
            <h2><?php esc_html_e( 'Your order', 'rimal-luxury-theme' ); ?></h2>
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
        </aside>
        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
    </form>

    <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</main>
<?php
get_footer();
