<?php
/**
 * Drawer component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $id Drawer ID. */
/** @var string $title Drawer title. */
/** @var string $content Drawer content HTML. */
?>
<div id="<?php echo esc_attr( $id ); ?>" class="component-drawer" role="dialog" aria-modal="true" aria-labelledby="<?php echo esc_attr( $id . '-title' ); ?>" aria-hidden="true">
    <div class="component-drawer__panel">
        <div class="component-drawer__header">
            <h2 id="<?php echo esc_attr( $id . '-title' ); ?>"><?php echo esc_html( $title ); ?></h2>
            <button class="component-drawer__close" type="button" aria-label="<?php esc_attr_e( 'Close drawer', 'rimal-luxury-theme' ); ?>">&times;</button>
        </div>
        <div class="component-drawer__content"><?php echo wp_kses_post( $content ); ?></div>
    </div>
</div>
