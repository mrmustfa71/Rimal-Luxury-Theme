<?php
get_header();
?>
<main id="site-content" class="site-content">
    <header class="archive-header">
        <h1 class="archive-title">
            <?php
            if ( is_post_type_archive() ) {
                post_type_archive_title();
            } elseif ( is_category() ) {
                single_cat_title();
            } elseif ( is_tag() ) {
                single_tag_title();
            } else {
                esc_html_e( 'Archives', 'rimal-luxury-theme' );
            }
            ?>
        </h1>
        <?php if ( term_description() ) : ?>
            <div class="archive-description"><?php echo term_description(); ?></div>
        <?php endif; ?>
    </header>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', get_post_type() );
        endwhile;
        the_posts_pagination();
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</main>
<?php
get_footer();
