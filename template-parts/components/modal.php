<?php
/**
 * Modal component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $id Modal ID. */
/** @var string $title Modal title. */
/** @var string $content Modal content HTML. */
?>
<div id="<?php echo esc_attr( $id ); ?>" class="component-modal" role="dialog" aria-modal="true" aria-labelledby="<?php echo esc_attr( $id . '-title' ); ?>" aria-hidden="true">
    <div class="component-modal__panel">
        <button class="component-modal__close" type="button" aria-label="<?php esc_attr_e( 'Close modal', 'rimal-luxury-theme' ); ?>">&times;</button>
        <h2 id="<?php echo esc_attr( $id . '-title' ); ?>"><?php echo esc_html( $title ); ?></h2>
        <div class="component-modal__content"><?php echo wp_kses_post( $content ); ?></div>
    </div>
</div>
