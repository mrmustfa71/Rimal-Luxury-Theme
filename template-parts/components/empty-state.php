<?php
/**
 * Empty state component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $title Empty state title. */
/** @var string $message Empty state message. */
/** @var string $action_label Optional action button label. */
/** @var string $action_url Optional action button URL. */
?>
<div class="component-empty-state" role="status" aria-live="polite">
    <h2 class="component-empty-state__title"><?php echo esc_html( $title ); ?></h2>
    <p class="component-empty-state__text"><?php echo esc_html( $message ); ?></p>
    <?php if ( ! empty( $action_label ) && ! empty( $action_url ) ) : ?>
        <a class="component-button" href="<?php echo esc_url( $action_url ); ?>"><?php echo esc_html( $action_label ); ?></a>
    <?php endif; ?>
</div>
