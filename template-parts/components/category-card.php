<?php
/**
 * Category card component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var WP_Term $category Category object. */
if ( ! isset( $category ) || ! is_a( $category, 'WP_Term' ) ) {
    return;
}

$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
$term_link    = get_term_link( $category );
?>
<article class="component-card component-category-card">
    <div class="component-category-card__media">
        <a href="<?php echo esc_url( $term_link ); ?>">
            <?php if ( $thumbnail_id ) : ?>
                <?php echo wp_get_attachment_image( $thumbnail_id, 'medium', false, array( 'loading' => 'lazy', 'alt' => $category->name ) ); ?>
            <?php else : ?>
                <div class="component-category-card__fallback"><?php echo esc_html( $category->name ); ?></div>
            <?php endif; ?>
        </a>
    </div>
    <div class="component-category-card__content">
        <a class="component-category-card__title" href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $category->name ); ?></a>
    </div>
</article>
