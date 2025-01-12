<?php
/**
 * diligent functions and definitions
 *
 * @package diligent
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

require_once get_template_directory() . '/inc/walker.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function diligent_setup() {
    // Add theme support for title tag and post thumbnails
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    // Register main navigation menu
    register_nav_menus(
        array(
            'main_menu' => esc_html__( 'Main Menu', 'diligent' ),
        )
    );

    // Add theme support for HTML5 elements
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'diligent_setup' );

/**
 * Register widget area.
 */
function diligent_widgets_init() {
    // Footer Column 1: Logo
    register_sidebar([
        'name'          => __('Footer Column 1 Logo', 'diligent'),
        'id'            => 'footer-column-1',
        'description'   => __('Widgets in this area will be shown in the footer logo section.', 'diligent'),
        'before_widget' => '<div class="footer-logo-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ]);

    // Footer Column 2: Company Info
    register_sidebar([
        'name'          => __('Footer Column 2 (Company)', 'diligent'),
        'id'            => 'footer-column-2',
        'description'   => __('Widgets in this area will be shown in the first footer column.', 'diligent'),
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-menu-name">',
        'after_title'   => '</h2>',
    ]);

    // Footer Column 3: Resources
    register_sidebar([
        'name'          => __('Footer Column 3 (Resources)', 'diligent'),
        'id'            => 'footer-column-3',
        'description'   => __('Widgets in this area will be shown in the second footer column.', 'diligent'),
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-menu-name">',
        'after_title'   => '</h2>',
    ]);

    // Footer Column 4: Newsletter
    register_sidebar([
        'name'          => __('Footer Column 4 (Newsletter)', 'diligent'),
        'id'            => 'footer-column-4',
        'description'   => __('Widgets in this area will be shown in the third footer column.', 'diligent'),
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-call-to-action-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action( 'widgets_init', 'diligent_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function diligent_scripts() {
    wp_enqueue_style( 'diligent-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'diligent-secondary-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION );
    wp_enqueue_style( 'slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css', array(), _S_VERSION );
    wp_enqueue_script( 'diligent-slider', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'diligent-navigation', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'diligent_scripts' );

/**
 * Register custom post type for services and its taxonomy
 */
function diligent_post_type_services() {
    // Register 'services' post type
    register_post_type('services', array(
        'label' => 'Services',
        'description' => 'Services',
        'public' => true,
        'show_ui' => true,    
        'show_in_menu' => true,
        'show_in_rest' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'services',
            'with_front' => true,
        ),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-site',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
        ),
    ));

    // Register custom taxonomy for 'services'
    register_taxonomy(
        'service_category', // Taxonomy name
        'services',         // Post type this taxonomy is associated with
        array(
            'label' => 'Service Categories',
            'rewrite' => array('slug' => 'service-category'),
            'hierarchical' => true, // Set to false for tag-like behavior
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'diligent_post_type_services');

/**
 * Shortcode to display services posts
 */
function diligent_services_post_shortcode($atts) {
    // Set default values for the shortcode attributes
    $atts = shortcode_atts(
        array(
            'number' => '-1', // Default number of posts to display
            'category' => '', // Option to filter by category
        ),
        $atts,
        'services_posts' // Shortcode name
    );

    // WP Query to fetch services posts
    $args = array(
        'post_type' => 'services', // Custom post type
        'posts_per_page' => $atts['number'], // Number of posts to display
    );

    // Add category filter if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category', // Adjust taxonomy if necessary
                'field' => 'slug',
                'terms' => $atts['category'],
                'operator' => 'IN',
            ),
        );
    }

    // The WP_Query
    $query = new WP_Query($args);

    // Start output
    $output = '<div class="services">';
    $output .= '<h2>Our <span>Services</span></h2>';
    $output .= '<div class="column-block">';

    // Check if posts are available
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="column">';
            $output .= '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
            $output .= '<h4>' . get_the_title() . '</h4>';
            $output .= '<p>' . get_the_excerpt() . '</p>';
            $output .= '</div>';
        }
    } else {
        $output .= '<p>No services found.</p>';
    }

    $output .= '</div>'; // Close column-block div
    $output .= '</div>'; // Close services div

    // Reset post data
    wp_reset_postdata();

    return $output;
}
add_shortcode('services_posts', 'diligent_services_post_shortcode');
