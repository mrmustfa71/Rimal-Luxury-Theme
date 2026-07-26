<?php
/**
 * Section title component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $eyebrow Section eyebrow text. */
/** @var string $title Section title. */
/** @var string $description Optional section description. */
/** @var string $heading_id Optional heading id for aria-labelledby. */
?>
<div class="component-section-title">
    <?php if ( ! empty( $eyebrow ) ) : ?>
        <span class="component-section-title__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
    <?php endif; ?>
    <h2 <?php if ( ! empty( $heading_id ) ) : ?>id="<?php echo esc_attr( $heading_id ); ?>"<?php endif; ?> class="component-section-title__heading"><?php echo esc_html( $title ); ?></h2>
    <?php if ( ! empty( $description ) ) : ?>
        <p class="component-section-title__description"><?php echo esc_html( $description ); ?></p>
    <?php endif; ?>
</div>
