<?php
/**
 * My Account Dashboard
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;
?>
<main id="primary" class="site-main container woocommerce-account">
    <?php wc_print_notices(); ?>
    <?php do_action( 'woocommerce_account_navigation' ); ?>

    <section class="account-dashboard">
        <?php do_action( 'woocommerce_account_dashboard' ); ?>
    </section>
</main>
