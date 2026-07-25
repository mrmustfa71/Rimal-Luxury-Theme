<?php
/**
 * Rating stars component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var float $rating Rating value out of 5. */
/** @var int $count Review count. */

$rating = isset( $rating ) ? floatval( $rating ) : 0;
$count  = isset( $count ) ? intval( $count ) : 0;
?>
<div class="component-rating-stars" aria-label="<?php printf( esc_attr__( 'Rating %s out of 5', 'rimal-luxury-theme' ), esc_html( number_format_i18n( $rating, 1 ) ) ); ?>">
    <?php for ( $index = 1; $index <= 5; $index++ ) : ?>
        <span class="component-rating-stars__icon" aria-hidden="true">
            <?php if ( $index <= floor( $rating ) ) : ?>
                <svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.9 5.9 6.6.9-4.8 4.7 1.1 6.5L10 15.6l-5.8 3.1 1.1-6.5-4.8-4.7 6.6-.9L10 1.5z"/></svg>
            <?php else : ?>
                <svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 1.5l2.9 5.9 6.6.9-4.8 4.7 1.1 6.5L10 15.6l-5.8 3.1 1.1-6.5-4.8-4.7 6.6-.9L10 1.5z" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
            <?php endif; ?>
        </span>
    <?php endfor; ?>
    <?php if ( $count ) : ?>
        <span class="component-rating-stars__count">(<?php echo esc_html( $count ); ?>)</span>
    <?php endif; ?>
</div>
