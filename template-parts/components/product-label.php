<?php
/**
 * Product label component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $label Label text. */
/** @var string $type Label modifier class. */

$type_class = isset( $type ) ? ' component-product-label component-product-label--' . esc_attr( $type ) : ' component-product-label';
?>
<span class="<?php echo esc_attr( trim( $type_class ) ); ?>">
    <?php echo esc_html( $label ); ?>
</span>
