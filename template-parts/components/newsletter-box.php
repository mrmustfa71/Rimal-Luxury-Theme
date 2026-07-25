<?php
/**
 * Newsletter box component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var string $title Newsletter title. */
/** @var string $description Newsletter description. */
/** @var string $button_label Button label. */

$newsletter_id = uniqid( 'newsletter-' );
?>
<section class="component-newsletter-box" aria-labelledby="<?php echo esc_attr( $newsletter_id ); ?>">
    <div>
        <h2 id="<?php echo esc_attr( $newsletter_id ); ?>" class="component-feature-box__title"><?php echo esc_html( $title ); ?></h2>
        <p class="component-newsletter-box__description"><?php echo esc_html( $description ); ?></p>
    </div>
    <form class="component-newsletter-box__form" method="post" action="#">
        <label class="screen-reader-text" for="<?php echo esc_attr( $newsletter_id . '-email' ); ?>"><?php esc_html_e( 'Email address', 'rimal-luxury-theme' ); ?></label>
        <input id="<?php echo esc_attr( $newsletter_id . '-email' ); ?>" class="component-newsletter-box__input" type="email" name="email" required placeholder="<?php esc_attr_e( 'Enter your email', 'rimal-luxury-theme' ); ?>" />
        <button class="component-button" type="submit"><?php echo esc_html( $button_label ); ?></button>
    </form>
</section>
