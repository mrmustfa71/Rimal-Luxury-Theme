<?php
/**
 * My Account Dashboard
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;
?>
<?php wc_print_notices(); ?>

<section class="account-dashboard">
    <?php do_action( 'woocommerce_account_dashboard' ); ?>
</section>
