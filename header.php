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
<header class="site-header">
    <div class="site-branding">
        <?php
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
        ?>
        <div class="site-title-wrap">
            <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
        </div>
    </div>
    <nav class="primary-navigation" aria-label="Primary Navigation">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'menu menu--primary',
                'fallback_cb'    => 'wp_page_menu',
            )
        );
        ?>
    </nav>
</header>
