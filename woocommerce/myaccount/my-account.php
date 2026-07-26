<?php
/**
 * My Account Page
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;

wc_print_notices();
?>
<main id="site-content" class="site-main container woocommerce-account">
    <?php do_action( 'woocommerce_before_my_account' ); ?>

    <?php do_action( 'woocommerce_account_navigation' ); ?>

    <section class="woocommerce-MyAccount-content">
        <?php do_action( 'woocommerce_account_content' ); ?>
    </section>

    <?php do_action( 'woocommerce_after_my_account' ); ?>
</main>
