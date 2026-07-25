<?php
/**
 * Feature box component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $icon Icon markup. */
/** @var string $title Feature title. */
/** @var string $description Feature description. */

$icon_markup = isset( $icon ) ? wp_kses_post( $icon ) : ''; ?>
<div class="component-feature-box">
    <?php if ( $icon_markup ) : ?>
        <div class="component-feature-box__icon"><?php echo $icon_markup; ?></div>
    <?php endif; ?>
    <h3 class="component-feature-box__title"><?php echo esc_html( $title ); ?></h3>
    <p class="component-feature-box__subtitle"><?php echo esc_html( $description ); ?></p>
</div>
