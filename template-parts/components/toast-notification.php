<?php
/**
 * Toast notification component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $id Toast ID. */
/** @var string $message Toast message. */
/** @var string $type Toast type modifier. */
?>
<div id="<?php echo esc_attr( $id ); ?>" class="component-toast component-toast--<?php echo esc_attr( $type ); ?>" role="status" aria-live="polite" aria-atomic="true">
    <p><?php echo esc_html( $message ); ?></p>
</div>
