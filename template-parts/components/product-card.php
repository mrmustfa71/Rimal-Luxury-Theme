<?php
/**
 * Product card component.
 *
 * @package Rimal_Luxury_Theme
 */

/** @var WC_Product $product Product object. */
if ( ! isset( $product ) || ! is_a( $product, 'WC_Product' ) ) {
    return;
}

$product_id = $product->get_id();
$permalink  = $product->get_permalink();
$title      = $product->get_name();
$price      = $product->get_price_html();
$rating     = wc_get_rating_html( $product->get_average_rating() );
$label      = $product->get_catalog_visibility();
$image_id   = $product->get_image_id();
?>
<article class="component-card component-product-card">
    <div class="component-card__media">
        <a href="<?php echo esc_url( $permalink ); ?>">
            <?php if ( $image_id ) : ?>
                <?php echo wp_get_attachment_image( $image_id, 'medium', false, array( 'loading' => 'lazy', 'alt' => $product->get_name() ) ); ?>
            <?php else : ?>
                <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php esc_attr_e( 'Placeholder', 'rimal-luxury-theme' ); ?>" loading="lazy" />
            <?php endif; ?>
        </a>
        <?php if ( $product->is_on_sale() ) : ?>
            <span class="component-product-label"><?php esc_html_e( 'Sale', 'rimal-luxury-theme' ); ?></span>
        <?php endif; ?>
    </div>
    <div class="component-card__body">
        <a class="component-card__title" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
        <div class="component-card__meta">
            <?php echo wp_kses_post( $price ); ?>
        </div>
        <?php if ( $rating ) : ?>
            <div class="component-rating-stars" aria-label="<?php printf( esc_attr__( 'Rated %s out of 5', 'rimal-luxury-theme' ), esc_html( $product->get_average_rating() ) ); ?>">
                <?php echo wp_kses_post( $rating ); ?>
            </div>
        <?php endif; ?>
    </div>
</article>
