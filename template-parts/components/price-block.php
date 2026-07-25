<?php
/**
 * Price block component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $price Current price. */
/** @var string $sale_price Sale price if applicable. */
/** @var string $regular_price Regular price if applicable. */

$price_label = isset( $sale_price ) ? $sale_price : $price;
?>
<div class="component-price-block">
    <div class="component-price-block__price"><?php echo wp_kses_post( $price_label ); ?></div>
    <?php if ( isset( $sale_price ) && isset( $regular_price ) ) : ?>
        <div class="component-price-block__secondary">
            <span class="component-price-block__sale"><?php echo wp_kses_post( $sale_price ); ?></span>
            <span class="component-price-block__regular"><?php echo wp_kses_post( $regular_price ); ?></span>
        </div>
    <?php endif; ?>
</div>
