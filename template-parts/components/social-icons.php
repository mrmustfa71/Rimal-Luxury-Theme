<?php
/**
 * Social icons component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var array $items Array of social items with 'url' and 'icon'. */
if ( ! isset( $items ) || ! is_array( $items ) ) {
    return;
}
?>
<div class="component-social-icons" role="navigation" aria-label="<?php esc_attr_e( 'Social links', 'rimal-luxury-theme' ); ?>">
    <?php foreach ( $items as $item ) : ?>
        <a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $item['label'] ); ?>">
            <?php echo wp_kses_post( $item['icon'] ); ?>
        </a>
    <?php endforeach; ?>
</div>
