<?php
get_header();
?>
<main id="site-content" class="site-content">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Page not found', 'rimal-luxury-theme' ); ?></h1>
        </header>
        <div class="page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search or return to the homepage.', 'rimal-luxury-theme' ); ?></p>
            <?php get_search_form(); ?>
        </div>
    </section>
</main>
<?php
get_footer();
