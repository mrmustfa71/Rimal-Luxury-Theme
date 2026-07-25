<?php
get_header();
?>
<main id="site-content" class="site-content">
    <section class="front-page-hero">
        <div class="front-page-hero__content">
            <h1><?php esc_html_e( 'Welcome to Rimal Luxury', 'rimal-luxury-theme' ); ?></h1>
            <p><?php esc_html_e( 'Experience a refined and modern storefront built for WooCommerce and Elementor.', 'rimal-luxury-theme' ); ?></p>
        </div>
    </section>
    <section class="front-page-content">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'page' );
            endwhile;
        endif;
        ?>
    </section>
</main>
<?php
get_footer();
