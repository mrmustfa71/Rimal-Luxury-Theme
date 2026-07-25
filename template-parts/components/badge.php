<?php
/**
 * Badge component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $label Badge text. */
/** @var string $type Badge modifier class. */

$type_class = isset( $type ) ? ' component-badge component-badge--' . esc_attr( $type ) : ' component-badge';
?>
<span class="<?php echo esc_attr( trim( $type_class ) ); ?>">
    <?php echo esc_html( $label ); ?>
</span>
