<?php
get_header();
?>
<main id="site-content" class="site-content">
    <?php if ( have_posts() ) : ?>
        <section class="post-listing">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
            the_posts_pagination();
            ?>
        </section>
    <?php else : ?>
        <section class="no-results">
            <h1><?php esc_html_e( 'Nothing Found', 'rimal-luxury-theme' ); ?></h1>
            <?php get_search_form(); ?>
        </section>
    <?php endif; ?>
</main>
<?php
get_footer();
