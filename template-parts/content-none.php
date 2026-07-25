<?php
/**
 * Template part for no content found.
 *
 * @package Rimal_Luxury_Theme
 */
?>
<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'rimal-luxury-theme' ); ?></h1>
    </header>
    <div class="page-content">
        <p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'rimal-luxury-theme' ); ?></p>
        <?php get_search_form(); ?>
    </div>
</section>
