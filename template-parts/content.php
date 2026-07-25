<?php
/**
 * Template part for displaying generic content.
 *
 * @package Rimal_Luxury_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <header class="entry-header">
        <?php
        if ( is_singular() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } else {
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
        }
        ?>
    </header>
    <div class="entry-summary">
        <?php
        if ( is_singular() ) {
            the_content();
        } else {
            the_excerpt();
            echo '<a class="read-more" href="' . esc_url( get_permalink() ) . '">';
            esc_html_e( 'Read more', 'rimal-luxury-theme' );
            echo '</a>';
        }
        ?>
    </div>
</article>
