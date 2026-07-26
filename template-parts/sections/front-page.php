<?php
/**
 * Homepage sections for Rimal Luxury Theme.
 *
 * @package Rimal_Luxury_Theme
 */

defined( 'ABSPATH' ) || exit;

$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
$cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' );

if ( class_exists( 'WooCommerce' ) ) {
    $featured_categories = get_transient( 'rimal_luxury_homepage_featured_categories' );
    if ( false === $featured_categories ) {
        $featured_categories = get_terms(
            'product_cat',
            array(
                'orderby'    => 'count',
                'order'      => 'DESC',
                'number'     => 4,
                'hide_empty' => true,
            )
        );
        set_transient( 'rimal_luxury_homepage_featured_categories', $featured_categories, 12 * HOUR_IN_SECONDS );
    }

    $new_arrivals = get_transient( 'rimal_luxury_homepage_new_arrivals' );
    if ( false === $new_arrivals ) {
        $new_arrivals = wc_get_products(
            array(
                'status' => 'publish',
                'limit'  => 8,
                'orderby' => 'date',
                'order'   => 'DESC',
            )
        );
        set_transient( 'rimal_luxury_homepage_new_arrivals', $new_arrivals, 12 * HOUR_IN_SECONDS );
    }

    $best_sellers = get_transient( 'rimal_luxury_homepage_best_sellers' );
    if ( false === $best_sellers ) {
        $best_sellers = wc_get_products(
            array(
                'status'    => 'publish',
                'limit'     => 8,
                'orderby'   => 'meta_value_num',
                'meta_key'  => 'total_sales',
                'order'     => 'DESC',
            )
        );
        set_transient( 'rimal_luxury_homepage_best_sellers', $best_sellers, 12 * HOUR_IN_SECONDS );
    }

    $featured_collection = get_transient( 'rimal_luxury_homepage_featured_collection' );
    if ( false === $featured_collection ) {
        $featured_collection = wc_get_products(
            array(
                'status'   => 'publish',
                'limit'    => 6,
                'featured' => true,
            )
        );
        set_transient( 'rimal_luxury_homepage_featured_collection', $featured_collection, 12 * HOUR_IN_SECONDS );
    }

    $testimonial_comments = get_transient( 'rimal_luxury_homepage_testimonial_comments' );
    if ( false === $testimonial_comments ) {
        $testimonial_comments = get_comments(
            array(
                'post_type'      => 'product',
                'status'         => 'approve',
                'number'         => 3,
                'orderby'        => 'comment_date_gmt',
                'order'          => 'DESC',
                'fields'         => 'all',
                'date_query'     => array(
                    array(
                        'after' => '1 year ago',
                    ),
                ),
            )
        );
        set_transient( 'rimal_luxury_homepage_testimonial_comments', $testimonial_comments, 12 * HOUR_IN_SECONDS );
    }

    $instagram_products = get_transient( 'rimal_luxury_homepage_instagram_products' );
    if ( false === $instagram_products ) {
        $instagram_products = wc_get_products(
            array(
                'status' => 'publish',
                'limit'  => 6,
                'orderby' => 'date',
                'order'   => 'DESC',
            )
        );
        set_transient( 'rimal_luxury_homepage_instagram_products', $instagram_products, 12 * HOUR_IN_SECONDS );
    }
} else {
    $featured_categories   = array();
    $new_arrivals          = array();
    $best_sellers         = array();
    $featured_collection  = array();
    $testimonial_comments = array();
    $instagram_products   = array();
}

$hero_product = ! empty( $new_arrivals ) ? $new_arrivals[0] : null;
?>
<section class="announcement-hero" aria-label="Store announcement">
    <div class="container announcement-hero__wrapper">
        <p class="announcement-hero__text">
            <?php esc_html_e( 'Free worldwide shipping on orders over $250. Luxury essentials delivered with care.', 'rimal-luxury-theme' ); ?>
        </p>
        <a class="announcement-hero__link" href="<?php echo esc_url( $cart_url ); ?>">
            <?php esc_html_e( 'Shop now', 'rimal-luxury-theme' ); ?>
        </a>
    </div>
</section>

<section class="hero-banner" aria-label="Main hero banner">
    <div class="container hero-banner__grid">
        <div class="hero-banner__content">
            <span class="eyebrow-text"><?php esc_html_e( 'New Season Edit', 'rimal-luxury-theme' ); ?></span>
            <h1 class="hero-banner__title"><?php esc_html_e( 'Crafted for elegant silhouettes and timeless luxury.', 'rimal-luxury-theme' ); ?></h1>
            <p class="hero-banner__copy"><?php esc_html_e( 'Discover premium womenswear with sculptural details, refined fabrics, and effortless glamour.', 'rimal-luxury-theme' ); ?></p>
            <?php get_template_part( 'template-parts/components/button', null, array( 'label' => __( 'Explore the collection', 'rimal-luxury-theme' ), 'url' => $shop_url, 'style' => 'primary' ) ); ?>
        </div>
        <?php if ( $hero_product ) : ?>
            <figure class="hero-banner__visual" aria-hidden="true">
                <?php echo wp_kses_post( wc_get_gallery_image_html( $hero_product->get_image_id(), true ) ); ?>
            </figure>
        <?php endif; ?>
    </div>
</section>

<section class="featured-categories" aria-labelledby="featured-categories-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'Shop By Category', 'rimal-luxury-theme' ),
        'title'       => __( 'Curated styles for every moment', 'rimal-luxury-theme' ),
        'description' => __( 'Explore our season’s most desired categories and discover signature pieces designed to elevate your wardrobe.', 'rimal-luxury-theme' ),
        'heading_id'  => 'featured-categories-heading',
    ) ); ?>

    <div class="featured-categories__grid">
        <?php foreach ( $featured_categories as $category ) : ?>
            <?php get_template_part( 'template-parts/components/category-card', null, array( 'category' => $category ) ); ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="product-grid-section" aria-labelledby="new-arrivals-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'New Arrivals', 'rimal-luxury-theme' ),
        'title'       => __( 'Fresh arrivals for your luxury edit', 'rimal-luxury-theme' ),
        'description' => __( 'Discover the latest additions to our collection, selected for refined style and modern femininity.', 'rimal-luxury-theme' ),
        'heading_id'  => 'new-arrivals-heading',
    ) ); ?>

    <div class="product-grid">
        <?php foreach ( $new_arrivals as $product ) : ?>
            <?php get_template_part( 'template-parts/components/product-card', null, array( 'product' => $product ) ); ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="product-grid-section" aria-labelledby="best-sellers-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'Best Sellers', 'rimal-luxury-theme' ),
        'title'       => __( 'Loved by our customers', 'rimal-luxury-theme' ),
        'description' => __( 'Shop the top-rated pieces that have become wardrobe essentials for our luxury clientele.', 'rimal-luxury-theme' ),
        'heading_id'  => 'best-sellers-heading',
    ) ); ?>

    <div class="product-grid">
        <?php foreach ( $best_sellers as $product ) : ?>
            <?php get_template_part( 'template-parts/components/product-card', null, array( 'product' => $product ) ); ?>
        <?php endforeach; ?>
    </div>
</section>

<?php if ( $hero_product ) : ?>
    <section class="promo-banner" aria-labelledby="promo-banner-heading">
        <div class="container promo-banner__content">
            <div class="promo-banner__text">
                <span class="eyebrow-text"><?php esc_html_e( 'Exclusive Edit', 'rimal-luxury-theme' ); ?></span>
                <h2 class="promo-banner__title"><?php esc_html_e( 'Discover the signature piece of the season.', 'rimal-luxury-theme' ); ?></h2>
                <p class="promo-banner__copy"><?php esc_html_e( 'A limited edit of elevated essentials crafted to stand out at every occasion.', 'rimal-luxury-theme' ); ?></p>
                <?php get_template_part( 'template-parts/components/button', null, array( 'label' => __( 'View the featured piece', 'rimal-luxury-theme' ), 'url' => esc_url( $hero_product->get_permalink() ), 'style' => 'secondary' ) ); ?>
            </div>
            <div class="promo-banner__visual" aria-hidden="true">
                <?php echo wp_kses_post( wc_get_gallery_image_html( $hero_product->get_image_id(), true ) ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="featured-collection" aria-labelledby="featured-collection-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'Featured Collection', 'rimal-luxury-theme' ),
        'title'       => __( 'Handpicked luxury essentials', 'rimal-luxury-theme' ),
        'description' => __( 'A refined edit of curated pieces from our signature collection, perfect for creating versatile, elevated looks.', 'rimal-luxury-theme' ),
        'heading_id'  => 'featured-collection-heading',
    ) ); ?>

    <div class="product-grid product-grid--featured">
        <?php foreach ( $featured_collection as $product ) : ?>
            <?php get_template_part( 'template-parts/components/product-card', null, array( 'product' => $product ) ); ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="why-shop-with-us" aria-labelledby="why-shop-with-us-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'Why Shop With Us', 'rimal-luxury-theme' ),
        'title'       => __( 'Luxury service designed for you', 'rimal-luxury-theme' ),
        'description' => __( 'Enjoy thoughtful service, premium craftsmanship, and seamless luxury shopping from discovery to delivery.', 'rimal-luxury-theme' ),
        'heading_id'  => 'why-shop-with-us-heading',
    ) ); ?>

    <div class="feature-grid">
        <?php get_template_part( 'template-parts/components/feature-box', null, array(
            'icon'        => '<span aria-hidden="true">✧</span>',
            'title'       => __( 'Concierge Styling', 'rimal-luxury-theme' ),
            'description' => __( 'Personalized recommendations for a polished wardrobe with premium finishing touches.', 'rimal-luxury-theme' ),
        ) ); ?>
        <?php get_template_part( 'template-parts/components/feature-box', null, array(
            'icon'        => '<span aria-hidden="true">♢</span>',
            'title'       => __( 'Luxury Materials', 'rimal-luxury-theme' ),
            'description' => __( 'Exclusive fabrics sourced for their comfort, drape, and timeless elegance.', 'rimal-luxury-theme' ),
        ) ); ?>
        <?php get_template_part( 'template-parts/components/feature-box', null, array(
            'icon'        => '<span aria-hidden="true">∞</span>',
            'title'       => __( 'Effortless Returns', 'rimal-luxury-theme' ),
            'description' => __( 'Flexible shipping and returns so you can shop with confidence.', 'rimal-luxury-theme' ),
        ) ); ?>
        <?php get_template_part( 'template-parts/components/feature-box', null, array(
            'icon'        => '<span aria-hidden="true">♥</span>',
            'title'       => __( 'Ethical Craftsmanship', 'rimal-luxury-theme' ),
            'description' => __( 'Attention to detail and responsible production in every collection.', 'rimal-luxury-theme' ),
        ) ); ?>
    </div>
</section>

<section class="customer-testimonials" aria-labelledby="customer-testimonials-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'Testimonials', 'rimal-luxury-theme' ),
        'title'       => __( 'Loved by those who live in luxury', 'rimal-luxury-theme' ),
        'description' => __( 'Hear from customers who trust us for wardrobe staples and unforgettable occasion dressing.', 'rimal-luxury-theme' ),
        'heading_id'  => 'customer-testimonials-heading',
    ) ); ?>

    <div class="testimonial-grid">
        <?php foreach ( $testimonial_comments as $comment ) : ?>
            <?php $product = wc_get_product( $comment->comment_post_ID ); ?>
            <article class="testimonial-card">
                <p class="testimonial-card__quote">“<?php echo esc_html( wp_trim_words( $comment->comment_content, 32, '...' ) ); ?>”</p>
                <div class="testimonial-card__meta">
                    <span class="testimonial-card__author"><?php echo esc_html( $comment->comment_author ); ?></span>
                    <?php if ( $product ) : ?>
                        <a class="testimonial-card__product" href="<?php echo esc_url( $product->get_permalink() ); ?>">
                            <?php echo esc_html( $product->get_name() ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="instagram-gallery" aria-labelledby="instagram-gallery-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'Instagram', 'rimal-luxury-theme' ),
        'title'       => __( 'Shop the looks from our latest launches', 'rimal-luxury-theme' ),
        'description' => __( 'A curated gallery of product imagery designed to inspire your next luxury look.', 'rimal-luxury-theme' ),
        'heading_id'  => 'instagram-gallery-heading',
    ) ); ?>

    <div class="instagram-gallery__grid">
        <?php foreach ( $instagram_products as $product ) : ?>
            <?php $image_id = $product->get_image_id(); ?>
            <?php if ( $image_id ) : ?>
                <a class="instagram-card" href="<?php echo esc_url( $product->get_permalink() ); ?>" aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
                    <?php echo wp_get_attachment_image( $image_id, 'medium', false, array( 'loading' => 'lazy', 'alt' => esc_attr( $product->get_name() ) ) ); ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<?php get_template_part( 'template-parts/components/newsletter-box', null, array(
    'title'        => __( 'Join the Rimal Luxe List', 'rimal-luxury-theme' ),
    'description'  => __( 'Receive early access to new collections, private offers, and style edits delivered to your inbox.', 'rimal-luxury-theme' ),
    'button_label' => __( 'Subscribe', 'rimal-luxury-theme' ),
) ); ?>

<section class="brand-values" aria-labelledby="brand-values-heading">
    <?php get_template_part( 'template-parts/components/section-title', null, array(
        'eyebrow'     => __( 'Our Values', 'rimal-luxury-theme' ),
        'title'       => __( 'A luxury experience rooted in quality', 'rimal-luxury-theme' ),
        'description' => __( 'Values that guide every design choice, product story, and customer interaction.', 'rimal-luxury-theme' ),
        'heading_id'  => 'brand-values-heading',
    ) ); ?>

    <div class="brand-values__grid">
        <article class="brand-value-card">
            <h3><?php esc_html_e( 'Timeless Design', 'rimal-luxury-theme' ); ?></h3>
            <p><?php esc_html_e( 'Minimal silhouettes with elevated details for lasting wardrobe appeal.', 'rimal-luxury-theme' ); ?></p>
        </article>
        <article class="brand-value-card">
            <h3><?php esc_html_e( 'Premium Craftsmanship', 'rimal-luxury-theme' ); ?></h3>
            <p><?php esc_html_e( 'Thoughtful construction and fine finishes across every style.', 'rimal-luxury-theme' ); ?></p>
        </article>
        <article class="brand-value-card">
            <h3><?php esc_html_e( 'Curated Selection', 'rimal-luxury-theme' ); ?></h3>
            <p><?php esc_html_e( 'An expert edit of collections made to complement a luxury lifestyle.', 'rimal-luxury-theme' ); ?></p>
        </article>
        <article class="brand-value-card">
            <h3><?php esc_html_e( 'Sustainable Practices', 'rimal-luxury-theme' ); ?></h3>
            <p><?php esc_html_e( 'Responsible sourcing and quality pieces built to be cherished.', 'rimal-luxury-theme' ); ?></p>
        </article>
    </div>
</section>

<section class="footer-cta" aria-labelledby="footer-cta-heading">
    <div class="container footer-cta__wrapper">
        <div class="footer-cta__content">
            <span class="eyebrow-text"><?php esc_html_e( 'Style without compromise', 'rimal-luxury-theme' ); ?></span>
            <h2 id="footer-cta-heading"><?php esc_html_e( 'Elevate your wardrobe with luxurious essentials', 'rimal-luxury-theme' ); ?></h2>
            <p><?php esc_html_e( 'Discover curated collections designed to make every day feel exceptional.', 'rimal-luxury-theme' ); ?></p>
        </div>
        <?php get_template_part( 'template-parts/components/button', null, array( 'label' => __( 'View the collection', 'rimal-luxury-theme' ), 'url' => $shop_url, 'style' => 'primary' ) ); ?>
    </div>
</section>
