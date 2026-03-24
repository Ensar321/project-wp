<?php
/**
 * Theme setup, assets enqueue, widgets, menu helpers, and contact form handler
 */

if ( ! function_exists( 'project_wp_setup' ) ) {
    function project_wp_setup() {

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );

        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'project-wp' ),
        ) );
    }
    add_action( 'after_setup_theme', 'project_wp_setup' );
}

if ( ! function_exists( 'project_wp_assets' ) ) {
    function project_wp_assets() {
        wp_enqueue_style(
            'project-wp-google-fonts',
            'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap',
            array(),
            null
        );

        wp_enqueue_style(
            'project-wp-bootstrap',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
            array(),
            '5.3.0'
        );

        wp_enqueue_style(
            'project-wp-style',
            get_stylesheet_uri(),
            array( 'project-wp-bootstrap' ),
            wp_get_theme()->get( 'Version' )
        );

        wp_enqueue_script(
            'project-wp-bootstrap-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
            array(),
            '5.3.0',
            true
        );
    }
    add_action( 'wp_enqueue_scripts', 'project_wp_assets' );
}

function project_wp_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'project-wp' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar', 'project-wp' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'project_wp_widgets_init' );

function project_wp_nav_menu_link_attributes( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        $atts['class'] = ( isset( $atts['class'] ) ? $atts['class'] . ' ' : '' ) . 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'project_wp_nav_menu_link_attributes', 10, 3 );

function project_wp_nav_menu_css_class( $classes, $item, $args ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        if ( ! in_array( 'nav-item', $classes, true ) ) {
            $classes[] = 'nav-item';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'project_wp_nav_menu_css_class', 10, 3 );

function project_wp_handle_contact_form() {
    if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), 'project_wp_contact' ) ) {
        wp_die( esc_html__( 'Security check failed', 'project-wp' ) );
    }

    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
    $to      = get_option( 'admin_email' );
    $subject = sprintf( '[%s] %s', get_bloginfo( 'name' ), esc_html__( 'Contact form submission', 'project-wp' ) );
    $body    = "Name: " . $name . "\n\nEmail: " . $email . "\n\nMessage:\n" . $message;
    $headers = array( 'Content-Type: text/plain; charset=UTF-8' );

    wp_mail( $to, $subject, $body, $headers );

    $redirect = wp_get_referer() ? wp_get_referer() : home_url();
    wp_safe_redirect( add_query_arg( 'contact', 'sent', $redirect ) );
    exit;
}
add_action( 'admin_post_nopriv_contact_submit', 'project_wp_handle_contact_form' );
add_action( 'admin_post_contact_submit', 'project_wp_handle_contact_form' );
