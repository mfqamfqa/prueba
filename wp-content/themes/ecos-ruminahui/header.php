<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/favicon2.png' ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/apple-touch-icon.png' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-lg-between">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo me-auto me-lg-0">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="img-fluid">
        </a>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '<ul>%3$s</ul>',
                        'walker'         => new Ecos_Ruminahui_Walker(),
                        'depth'          => 3,
                    )
                );
            } else {
                ecos_ruminahui_menu_fallback();
            }
            ?>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
