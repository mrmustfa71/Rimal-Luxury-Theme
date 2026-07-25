<?php
get_header();
?>
<main id="site-content" class="site-content">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'page' );
        endwhile;
    else :
        ?>
        <section class="no-results">
            <h1><?php esc_html_e( 'Page not found', 'rimal-luxury-theme' ); ?></h1>
        </section>
    <?php endif; ?>
</main>
<?php
get_footer();
