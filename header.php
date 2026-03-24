<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php bloginfo( 'name' ); ?>
            </a>

            <?php if ( get_bloginfo( 'description' ) ) : ?>
                <small class="text-light d-none d-md-inline ms-2">
                    <?php bloginfo( 'description' ); ?>
                </small>
            <?php endif; ?>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#primaryNavbar"
                aria-controls="primaryNavbar"
                aria-expanded="false"
                aria-label="<?php esc_attr_e( 'Toggle navigation', 'project-wp' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            wp_nav_menu( array(
                'theme_location'  => 'primary',
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'primaryNavbar',
                'menu_class'      => 'navbar-nav',
                'fallback_cb'     => false,
                'depth'           => 2,
            ) );
            ?>

        </div>
    </nav>
</header>