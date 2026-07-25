<?php
/**
 * Button component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $label Button label. */
/** @var string $url Button URL. */
/** @var string $style Button style class suffix. */

$style_class = isset( $style ) ? ' component-button component-button--' . esc_attr( $style ) : ' component-button';
?>
<a href="<?php echo esc_url( $url ); ?>" class="<?php echo esc_attr( trim( $style_class ) ); ?>">
    <?php echo esc_html( $label ); ?>
</a>
