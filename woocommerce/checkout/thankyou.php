<?php
/**
 * Thankyou page
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;

if ( $order ) : ?>
    <div class="woocommerce-order container">
        <?php if ( $order->has_status( 'failed' ) ) : ?>
            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">
                <?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'rimal-luxury-theme' ); ?>
            </p>

            <p class="woocommerce-notice woocommerce-notice--info woocommerce-thankyou-order-received">
                <?php esc_html_e( 'Please attempt your purchase again.', 'rimal-luxury-theme' ); ?>
            </p>

            <p class="woocommerce-notice woocommerce-notice--info woocommerce-thankyou-order-details">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button alt">
                    <?php esc_html_e( 'Pay', 'rimal-luxury-theme' ); ?>
                </a>
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button">
                        <?php esc_html_e( 'My account', 'rimal-luxury-theme' ); ?>
                    </a>
                <?php endif; ?>
            </p>
        <?php else : ?>
            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                <?php esc_html_e( 'Thank you. Your order has been received.', 'rimal-luxury-theme' ); ?>
            </p>
        <?php endif; ?>

        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
            <li class="order">
                <?php esc_html_e( 'Order number:', 'rimal-luxury-theme' ); ?>
                <strong><?php echo esc_html( $order->get_order_number() ); ?></strong>
            </li>
            <li class="date">
                <?php esc_html_e( 'Date:', 'rimal-luxury-theme' ); ?>
                <strong><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></strong>
            </li>
            <li class="total">
                <?php esc_html_e( 'Total:', 'rimal-luxury-theme' ); ?>
                <strong><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></strong>
            </li>
            <?php if ( $order->get_payment_method_title() ) : ?>
                <li class="method">
                    <?php esc_html_e( 'Payment method:', 'rimal-luxury-theme' ); ?>
                    <strong><?php echo esc_html( $order->get_payment_method_title() ); ?></strong>
                </li>
            <?php endif; ?>
        </ul>

        <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
        <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
    </div>
<?php else : ?>
    <div class="woocommerce-order container">
        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
            <?php esc_html_e( 'Thank you. Your order has been received.', 'rimal-luxury-theme' ); ?>
        </p>
    </div>
<?php endif; ?>
