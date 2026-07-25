<?php
/**
 * Breadcrumb component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var array $items Breadcrumb items in array( 'url' => '', 'label' => '' ). */
if ( ! isset( $items ) || ! is_array( $items ) ) {
    return;
}
?>
<nav class="component-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rimal-luxury-theme' ); ?>">
    <?php foreach ( $items as $index => $item ) : ?>
        <?php if ( ! empty( $item['url'] ) ) : ?>
            <a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
        <?php else : ?>
            <span><?php echo esc_html( $item['label'] ); ?></span>
        <?php endif; ?>
        <?php if ( $index < count( $items ) - 1 ) : ?>
            <span class="component-breadcrumb__separator" aria-hidden="true">/</span>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>
