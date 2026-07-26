<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<?php
$wc_shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
$wc_cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' );
$wc_account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' );
?>
<div class="site-announcement-bar" role="region" aria-label="Site announcement">
    <p class="announcement-bar__text"><?php esc_html_e( 'Free shipping on fashion orders over $200. Premium delivery worldwide.', 'rimal-luxury-theme' ); ?></p>
    <a class="announcement-bar__action" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
        <?php esc_html_e( 'Shop New Arrivals', 'rimal-luxury-theme' ); ?>
    </a>
</div>
<header class="site-header site-header--dark" role="banner">
    <div class="header-inner container">
        <div class="header-branding">
            <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                } else {
                    ?><span class="site-title-text"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span><?php
                }
                ?>
            </a>
            <p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
        </div>

        <button class="header-toggle-menu" type="button" aria-controls="mobile-drawer" aria-expanded="false">
            <span class="screen-reader-text"><?php esc_html_e( 'Open menu', 'rimal-luxury-theme' ); ?></span>
            <span aria-hidden="true">&#9776;</span>
        </button>

        <div class="header-actions">
            <button class="header-action header-action--search" type="button" aria-controls="search-overlay" aria-expanded="false">
                <span class="header-action__icon" aria-hidden="true">&#128270;</span>
                <span class="screen-reader-text"><?php esc_html_e( 'Open search', 'rimal-luxury-theme' ); ?></span>
            </button>
            <a class="header-action" href="<?php echo esc_url( $wc_account_url ); ?>" aria-label="<?php esc_attr_e( 'My account', 'rimal-luxury-theme' ); ?>">
                <span class="header-action__icon" aria-hidden="true">&#128100;</span>
            </a>
            <a class="header-action" href="<?php echo esc_url( home_url( '/wishlist/' ) ); ?>" aria-label="<?php esc_attr_e( 'Wishlist', 'rimal-luxury-theme' ); ?>">
                <span class="header-action__icon" aria-hidden="true">&#10084;</span>
            </a>
            <a class="header-action header-action--cart" href="<?php echo esc_url( $wc_cart_url ); ?>" aria-label="<?php esc_attr_e( 'View cart', 'rimal-luxury-theme' ); ?>">
                <span class="header-action__icon" aria-hidden="true">&#128722;</span>
                <?php if ( function_exists( 'WC' ) ) : ?>
                    <span class="header-action__badge"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                <?php endif; ?>
            </a>
            <a class="header-action header-action--cta" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
                <?php esc_html_e( 'Explore Luxury', 'rimal-luxury-theme' ); ?>
            </a>
        </div>
    </div>

    <nav id="site-navigation" class="site-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'rimal-luxury-theme' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'menu menu--desktop',
                'fallback_cb'    => 'wp_page_menu',
            )
        );
        ?>
    </nav>

    <div id="mobile-drawer" class="mobile-drawer" aria-hidden="true">
        <div class="mobile-drawer__panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile navigation', 'rimal-luxury-theme' ); ?>">
            <div class="mobile-drawer__header">
                <span class="mobile-drawer__title"><?php esc_html_e( 'Menu', 'rimal-luxury-theme' ); ?></span>
                <button class="mobile-drawer__close" type="button" aria-label="<?php esc_attr_e( 'Close menu', 'rimal-luxury-theme' ); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="mobile-drawer__content">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'menu menu--mobile',
                        'fallback_cb'    => 'wp_page_menu',
                    )
                );
                ?>
                <div class="mobile-drawer__actions">
                    <a class="header-action header-action--cart" href="<?php echo esc_url( function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' ) ); ?>">
                        <?php esc_html_e( 'Cart', 'rimal-luxury-theme' ); ?>
                    </a>
                    <a class="header-action" href="<?php echo esc_url( $wc_account_url ); ?>">
                        <?php esc_html_e( 'Account', 'rimal-luxury-theme' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="search-overlay" class="search-overlay" aria-hidden="true" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Search products', 'rimal-luxury-theme' ); ?>">
    <div class="search-overlay__panel">
        <button class="search-overlay__close" type="button" aria-label="<?php esc_attr_e( 'Close search', 'rimal-luxury-theme' ); ?>">
            <span aria-hidden="true">&times;</span>
        </button>
        <form class="search-overlay__form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label class="screen-reader-text" for="header-search-field"><?php esc_html_e( 'Search for:', 'rimal-luxury-theme' ); ?></label>
            <input id="header-search-field" class="search-overlay__input" type="search" name="s" placeholder="<?php esc_attr_e( 'Search fashion, accessories, designers', 'rimal-luxury-theme' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" />
            <button class="button button--primary" type="submit">
                <?php esc_html_e( 'Search', 'rimal-luxury-theme' ); ?>
            </button>
        </form>
    </div>
</div>
