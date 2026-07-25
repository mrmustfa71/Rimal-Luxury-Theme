<?php
/**
 * Pagination component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var array $pages Array of pagination items with 'url', 'label', 'current', and 'disabled' keys. */
if ( ! isset( $pages ) || ! is_array( $pages ) ) {
    return;
}
?>
<nav class="component-pagination" role="navigation" aria-label="<?php esc_attr_e( 'Pagination', 'rimal-luxury-theme' ); ?>">
    <?php foreach ( $pages as $page ) : ?>
        <?php if ( ! empty( $page['disabled'] ) ) : ?>
            <span class="component-pagination__button" aria-disabled="true"><?php echo esc_html( $page['label'] ); ?></span>
        <?php elseif ( ! empty( $page['current'] ) ) : ?>
            <span class="component-pagination__button component-pagination__button--current" aria-current="page"><?php echo esc_html( $page['label'] ); ?></span>
        <?php else : ?>
            <a class="component-pagination__link" href="<?php echo esc_url( $page['url'] ); ?>"><?php echo esc_html( $page['label'] ); ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>
