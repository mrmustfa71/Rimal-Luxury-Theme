<?php
/**
 * Quantity selector component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $label Quantity label. */
/** @var int $value Initial quantity value. */
/** @var int $min Minimum quantity. */
/** @var int $max Maximum quantity. */

$value = isset( $value ) ? intval( $value ) : 1;
$min   = isset( $min ) ? intval( $min ) : 1;
$max   = isset( $max ) ? intval( $max ) : 99;
$input_id = uniqid( 'quantity-' );
?>
<div class="component-quantity-selector" role="group" aria-label="<?php echo esc_attr( $label ); ?>">
    <button class="component-quantity-selector__button quantity-decrement" type="button" aria-label="<?php esc_attr_e( 'Decrease quantity', 'rimal-luxury-theme' ); ?>">-</button>
    <label class="visually-hidden" for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'Quantity', 'rimal-luxury-theme' ); ?></label>
    <input id="<?php echo esc_attr( $input_id ); ?>" type="number" value="<?php echo esc_attr( $value ); ?>" min="<?php echo esc_attr( $min ); ?>" max="<?php echo esc_attr( $max ); ?>" aria-label="<?php esc_attr_e( 'Quantity', 'rimal-luxury-theme' ); ?>" />
    <button class="component-quantity-selector__button quantity-increment" type="button" aria-label="<?php esc_attr_e( 'Increase quantity', 'rimal-luxury-theme' ); ?>">+</button>
</div>
