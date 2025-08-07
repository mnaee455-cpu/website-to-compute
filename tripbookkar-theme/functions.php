<?php
/**
 * TripBookKar Theme Functions
 * 
 * @package TripBookKar
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define theme constants
define('TRIPBOOKKAR_VERSION', '1.0.0');
define('TRIPBOOKKAR_THEME_DIR', get_template_directory());
define('TRIPBOOKKAR_THEME_URL', get_template_directory_uri());

/**
 * Theme Setup
 */
function tripbookkar_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('custom-background');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('automatic-feed-links');

    // Add image sizes
    add_image_size('tripbookkar-hero', 1920, 1080, true);
    add_image_size('tripbookkar-destination', 400, 300, true);
    add_image_size('tripbookkar-package', 350, 200, true);
    add_image_size('tripbookkar-thumbnail', 150, 150, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'tripbookkar'),
        'footer'  => esc_html__('Footer Menu', 'tripbookkar'),
    ));
}
add_action('after_setup_theme', 'tripbookkar_setup');

/**
 * Set the content width in pixels
 */
function tripbookkar_content_width() {
    $GLOBALS['content_width'] = apply_filters('tripbookkar_content_width', 1200);
}
add_action('after_setup_theme', 'tripbookkar_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function tripbookkar_scripts() {
    // Enqueue CSS
    wp_enqueue_style('tripbookkar-style', get_stylesheet_uri(), array(), TRIPBOOKKAR_VERSION);
    wp_enqueue_style('tripbookkar-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Enqueue JavaScript
    wp_enqueue_script('tripbookkar-main', TRIPBOOKKAR_THEME_URL . '/assets/js/main.js', array('jquery'), TRIPBOOKKAR_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('tripbookkar-main', 'tripbookkar_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('tripbookkar_nonce'),
        'strings' => array(
            'searching' => esc_html__('Searching...', 'tripbookkar'),
            'error' => esc_html__('An error occurred. Please try again.', 'tripbookkar'),
        )
    ));

    // Add inline styles for dynamic colors
    $primary_color = get_theme_mod('tripbookkar_primary_color', '#3498db');
    $secondary_color = get_theme_mod('tripbookkar_secondary_color', '#e74c3c');
    
    $custom_css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
            --gradient-primary: linear-gradient(135deg, {$primary_color} 0%, " . tripbookkar_darken_color($primary_color, 10) . " 100%);
            --gradient-secondary: linear-gradient(135deg, {$secondary_color} 0%, " . tripbookkar_darken_color($secondary_color, 10) . " 100%);
        }
    ";
    wp_add_inline_style('tripbookkar-style', $custom_css);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'tripbookkar_scripts');

/**
 * Enqueue admin scripts and styles
 */
function tripbookkar_admin_scripts($hook) {
    if ('toplevel_page_tripbookkar-settings' === $hook) {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('tripbookkar-admin', TRIPBOOKKAR_THEME_URL . '/assets/js/admin.js', array('jquery', 'wp-color-picker'), TRIPBOOKKAR_VERSION, true);
    }
}
add_action('admin_enqueue_scripts', 'tripbookkar_admin_scripts');

/**
 * Register widget areas
 */
function tripbookkar_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Primary Sidebar', 'tripbookkar'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'tripbookkar'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 1', 'tripbookkar'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets to footer column 1.', 'tripbookkar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 2', 'tripbookkar'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets to footer column 2.', 'tripbookkar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 3', 'tripbookkar'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets to footer column 3.', 'tripbookkar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 4', 'tripbookkar'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets to footer column 4.', 'tripbookkar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'tripbookkar_widgets_init');

/**
 * Custom Post Types
 */
function tripbookkar_custom_post_types() {
    // Destinations Post Type
    register_post_type('destination', array(
        'labels' => array(
            'name' => esc_html__('Destinations', 'tripbookkar'),
            'singular_name' => esc_html__('Destination', 'tripbookkar'),
            'add_new' => esc_html__('Add New Destination', 'tripbookkar'),
            'add_new_item' => esc_html__('Add New Destination', 'tripbookkar'),
            'edit_item' => esc_html__('Edit Destination', 'tripbookkar'),
            'new_item' => esc_html__('New Destination', 'tripbookkar'),
            'view_item' => esc_html__('View Destination', 'tripbookkar'),
            'search_items' => esc_html__('Search Destinations', 'tripbookkar'),
            'not_found' => esc_html__('No destinations found', 'tripbookkar'),
            'not_found_in_trash' => esc_html__('No destinations found in trash', 'tripbookkar'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-location-alt',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'destinations'),
        'show_in_rest' => true,
    ));

    // Packages Post Type
    register_post_type('package', array(
        'labels' => array(
            'name' => esc_html__('Packages', 'tripbookkar'),
            'singular_name' => esc_html__('Package', 'tripbookkar'),
            'add_new' => esc_html__('Add New Package', 'tripbookkar'),
            'add_new_item' => esc_html__('Add New Package', 'tripbookkar'),
            'edit_item' => esc_html__('Edit Package', 'tripbookkar'),
            'new_item' => esc_html__('New Package', 'tripbookkar'),
            'view_item' => esc_html__('View Package', 'tripbookkar'),
            'search_items' => esc_html__('Search Packages', 'tripbookkar'),
            'not_found' => esc_html__('No packages found', 'tripbookkar'),
            'not_found_in_trash' => esc_html__('No packages found in trash', 'tripbookkar'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'packages'),
        'show_in_rest' => true,
    ));

    // Testimonials Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => esc_html__('Testimonials', 'tripbookkar'),
            'singular_name' => esc_html__('Testimonial', 'tripbookkar'),
            'add_new' => esc_html__('Add New Testimonial', 'tripbookkar'),
            'add_new_item' => esc_html__('Add New Testimonial', 'tripbookkar'),
            'edit_item' => esc_html__('Edit Testimonial', 'tripbookkar'),
            'new_item' => esc_html__('New Testimonial', 'tripbookkar'),
            'view_item' => esc_html__('View Testimonial', 'tripbookkar'),
            'search_items' => esc_html__('Search Testimonials', 'tripbookkar'),
            'not_found' => esc_html__('No testimonials found', 'tripbookkar'),
            'not_found_in_trash' => esc_html__('No testimonials found in trash', 'tripbookkar'),
        ),
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'tripbookkar_custom_post_types');

/**
 * Add custom taxonomies
 */
function tripbookkar_custom_taxonomies() {
    // Destination Categories
    register_taxonomy('destination_category', 'destination', array(
        'labels' => array(
            'name' => esc_html__('Destination Categories', 'tripbookkar'),
            'singular_name' => esc_html__('Destination Category', 'tripbookkar'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
    ));

    // Package Categories
    register_taxonomy('package_category', 'package', array(
        'labels' => array(
            'name' => esc_html__('Package Categories', 'tripbookkar'),
            'singular_name' => esc_html__('Package Category', 'tripbookkar'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'tripbookkar_custom_taxonomies');

/**
 * Add theme customizer options
 */
function tripbookkar_customizer($wp_customize) {
    // Theme Options Section
    $wp_customize->add_section('tripbookkar_theme_options', array(
        'title' => esc_html__('TripBookKar Options', 'tripbookkar'),
        'priority' => 30,
    ));

    // Primary Color
    $wp_customize->add_setting('tripbookkar_primary_color', array(
        'default' => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tripbookkar_primary_color', array(
        'label' => esc_html__('Primary Color', 'tripbookkar'),
        'section' => 'tripbookkar_theme_options',
    )));

    // Secondary Color
    $wp_customize->add_setting('tripbookkar_secondary_color', array(
        'default' => '#e74c3c',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tripbookkar_secondary_color', array(
        'label' => esc_html__('Secondary Color', 'tripbookkar'),
        'section' => 'tripbookkar_theme_options',
    )));

    // Hero Section
    $wp_customize->add_section('tripbookkar_hero', array(
        'title' => esc_html__('Hero Section', 'tripbookkar'),
        'priority' => 35,
    ));

    // Hero Title
    $wp_customize->add_setting('tripbookkar_hero_title', array(
        'default' => esc_html__('Discover Amazing Places', 'tripbookkar'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('tripbookkar_hero_title', array(
        'label' => esc_html__('Hero Title', 'tripbookkar'),
        'section' => 'tripbookkar_hero',
        'type' => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('tripbookkar_hero_subtitle', array(
        'default' => esc_html__('Book flights, hotels, and holiday packages at the best prices', 'tripbookkar'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('tripbookkar_hero_subtitle', array(
        'label' => esc_html__('Hero Subtitle', 'tripbookkar'),
        'section' => 'tripbookkar_hero',
        'type' => 'textarea',
    ));

    // Hero Background Image
    $wp_customize->add_setting('tripbookkar_hero_bg', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tripbookkar_hero_bg', array(
        'label' => esc_html__('Hero Background Image', 'tripbookkar'),
        'section' => 'tripbookkar_hero',
    )));
}
add_action('customize_register', 'tripbookkar_customizer');

/**
 * Admin Menu for Theme Settings
 */
function tripbookkar_admin_menu() {
    add_menu_page(
        esc_html__('TripBookKar Settings', 'tripbookkar'),
        esc_html__('TripBookKar', 'tripbookkar'),
        'manage_options',
        'tripbookkar-settings',
        'tripbookkar_settings_page',
        'dashicons-airplane',
        30
    );

    add_submenu_page(
        'tripbookkar-settings',
        esc_html__('API Settings', 'tripbookkar'),
        esc_html__('API Settings', 'tripbookkar'),
        'manage_options',
        'tripbookkar-api-settings',
        'tripbookkar_api_settings_page'
    );
}
add_action('admin_menu', 'tripbookkar_admin_menu');

/**
 * Settings page callback
 */
function tripbookkar_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('TripBookKar Settings', 'tripbookkar'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('tripbookkar_settings');
            do_settings_sections('tripbookkar_settings');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php echo esc_html__('Enable Search Functionality', 'tripbookkar'); ?></th>
                    <td>
                        <input type="checkbox" name="tripbookkar_enable_search" value="1" <?php checked(1, get_option('tripbookkar_enable_search'), true); ?> />
                        <p class="description"><?php echo esc_html__('Enable advanced search functionality for flights, hotels, and packages.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo esc_html__('Google Maps API Key', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="tripbookkar_google_maps_key" value="<?php echo esc_attr(get_option('tripbookkar_google_maps_key')); ?>" class="regular-text" />
                        <p class="description"><?php echo esc_html__('Enter your Google Maps API key for location features.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo esc_html__('Contact Email', 'tripbookkar'); ?></th>
                    <td>
                        <input type="email" name="tripbookkar_contact_email" value="<?php echo esc_attr(get_option('tripbookkar_contact_email')); ?>" class="regular-text" />
                        <p class="description"><?php echo esc_html__('Email address for booking inquiries.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo esc_html__('Phone Number', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="tripbookkar_phone" value="<?php echo esc_attr(get_option('tripbookkar_phone')); ?>" class="regular-text" />
                        <p class="description"><?php echo esc_html__('Phone number for customer support.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * API Settings page callback
 */
function tripbookkar_api_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('API Settings', 'tripbookkar'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('tripbookkar_api_settings');
            do_settings_sections('tripbookkar_api_settings');
            ?>
            <h2><?php echo esc_html__('Amadeus API (Flights)', 'tripbookkar'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php echo esc_html__('API Key', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="tripbookkar_amadeus_api_key" value="<?php echo esc_attr(get_option('tripbookkar_amadeus_api_key')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php echo esc_html__('API Secret', 'tripbookkar'); ?></th>
                    <td>
                        <input type="password" name="tripbookkar_amadeus_api_secret" value="<?php echo esc_attr(get_option('tripbookkar_amadeus_api_secret')); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>

            <h2><?php echo esc_html__('Booking.com API (Hotels)', 'tripbookkar'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php echo esc_html__('API Key', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="tripbookkar_booking_api_key" value="<?php echo esc_attr(get_option('tripbookkar_booking_api_key')); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>

            <h2><?php echo esc_html__('TravelPayouts API', 'tripbookkar'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><?php echo esc_html__('API Key', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="tripbookkar_travelpayouts_api_key" value="<?php echo esc_attr(get_option('tripbookkar_travelpayouts_api_key')); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * Register settings
 */
function tripbookkar_register_settings() {
    // General settings
    register_setting('tripbookkar_settings', 'tripbookkar_enable_search');
    register_setting('tripbookkar_settings', 'tripbookkar_google_maps_key');
    register_setting('tripbookkar_settings', 'tripbookkar_contact_email');
    register_setting('tripbookkar_settings', 'tripbookkar_phone');

    // API settings
    register_setting('tripbookkar_api_settings', 'tripbookkar_amadeus_api_key');
    register_setting('tripbookkar_api_settings', 'tripbookkar_amadeus_api_secret');
    register_setting('tripbookkar_api_settings', 'tripbookkar_booking_api_key');
    register_setting('tripbookkar_api_settings', 'tripbookkar_travelpayouts_api_key');
}
add_action('admin_init', 'tripbookkar_register_settings');

/**
 * Add Elementor Support
 */
function tripbookkar_elementor_support() {
    add_theme_support('elementor');
    add_theme_support('elementor-location-header');
    add_theme_support('elementor-location-footer');
    add_theme_support('elementor-location-single');
    add_theme_support('elementor-location-archive');
}
add_action('after_setup_theme', 'tripbookkar_elementor_support');

/**
 * AJAX Search Handler
 */
function tripbookkar_ajax_search() {
    check_ajax_referer('tripbookkar_nonce', 'nonce');

    $search_type = sanitize_text_field($_POST['search_type']);
    $search_data = array();

    foreach ($_POST as $key => $value) {
        if ($key !== 'action' && $key !== 'nonce' && $key !== 'search_type') {
            $search_data[$key] = sanitize_text_field($value);
        }
    }

    // Process search based on type
    $results = array();
    switch ($search_type) {
        case 'flights':
            $results = tripbookkar_search_flights($search_data);
            break;
        case 'hotels':
            $results = tripbookkar_search_hotels($search_data);
            break;
        case 'packages':
            $results = tripbookkar_search_packages($search_data);
            break;
    }

    wp_send_json_success($results);
}
add_action('wp_ajax_tripbookkar_search', 'tripbookkar_ajax_search');
add_action('wp_ajax_nopriv_tripbookkar_search', 'tripbookkar_ajax_search');

/**
 * Search functions (placeholder implementations)
 */
function tripbookkar_search_flights($data) {
    // Placeholder for Amadeus API integration
    return array(
        'message' => 'Flight search functionality will be connected to Amadeus API',
        'data' => $data
    );
}

function tripbookkar_search_hotels($data) {
    // Placeholder for Booking.com API integration
    return array(
        'message' => 'Hotel search functionality will be connected to Booking.com API',
        'data' => $data
    );
}

function tripbookkar_search_packages($data) {
    // Search in packages post type
    $args = array(
        'post_type' => 'package',
        'posts_per_page' => 10,
        's' => isset($data['destination']) ? $data['destination'] : '',
        'meta_query' => array()
    );

    if (isset($data['budget_min']) && $data['budget_min']) {
        $args['meta_query'][] = array(
            'key' => 'package_price',
            'value' => intval($data['budget_min']),
            'compare' => '>='
        );
    }

    if (isset($data['budget_max']) && $data['budget_max']) {
        $args['meta_query'][] = array(
            'key' => 'package_price',
            'value' => intval($data['budget_max']),
            'compare' => '<='
        );
    }

    $packages = get_posts($args);
    $results = array();

    foreach ($packages as $package) {
        $results[] = array(
            'id' => $package->ID,
            'title' => $package->post_title,
            'excerpt' => get_the_excerpt($package->ID),
            'price' => get_post_meta($package->ID, 'package_price', true),
            'image' => get_the_post_thumbnail_url($package->ID, 'tripbookkar-package'),
            'url' => get_permalink($package->ID)
        );
    }

    return $results;
}

/**
 * Add meta boxes for custom post types
 */
function tripbookkar_add_meta_boxes() {
    // Destination meta box
    add_meta_box(
        'destination_details',
        esc_html__('Destination Details', 'tripbookkar'),
        'tripbookkar_destination_meta_box',
        'destination',
        'normal',
        'high'
    );

    // Package meta box
    add_meta_box(
        'package_details',
        esc_html__('Package Details', 'tripbookkar'),
        'tripbookkar_package_meta_box',
        'package',
        'normal',
        'high'
    );

    // Testimonial meta box
    add_meta_box(
        'testimonial_details',
        esc_html__('Testimonial Details', 'tripbookkar'),
        'tripbookkar_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tripbookkar_add_meta_boxes');

/**
 * Destination meta box callback
 */
function tripbookkar_destination_meta_box($post) {
    wp_nonce_field('tripbookkar_destination_meta', 'tripbookkar_destination_nonce');
    
    $starting_price = get_post_meta($post->ID, 'destination_starting_price', true);
    $best_time = get_post_meta($post->ID, 'destination_best_time', true);
    $duration = get_post_meta($post->ID, 'destination_duration', true);
    $location = get_post_meta($post->ID, 'destination_location', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="destination_starting_price"><?php echo esc_html__('Starting Price', 'tripbookkar'); ?></label></th>
            <td><input type="number" id="destination_starting_price" name="destination_starting_price" value="<?php echo esc_attr($starting_price); ?>" /></td>
        </tr>
        <tr>
            <th><label for="destination_best_time"><?php echo esc_html__('Best Time to Visit', 'tripbookkar'); ?></label></th>
            <td><input type="text" id="destination_best_time" name="destination_best_time" value="<?php echo esc_attr($best_time); ?>" /></td>
        </tr>
        <tr>
            <th><label for="destination_duration"><?php echo esc_html__('Recommended Duration', 'tripbookkar'); ?></label></th>
            <td><input type="text" id="destination_duration" name="destination_duration" value="<?php echo esc_attr($duration); ?>" /></td>
        </tr>
        <tr>
            <th><label for="destination_location"><?php echo esc_html__('Location Coordinates', 'tripbookkar'); ?></label></th>
            <td><input type="text" id="destination_location" name="destination_location" value="<?php echo esc_attr($location); ?>" placeholder="lat,lng" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Package meta box callback
 */
function tripbookkar_package_meta_box($post) {
    wp_nonce_field('tripbookkar_package_meta', 'tripbookkar_package_nonce');
    
    $price = get_post_meta($post->ID, 'package_price', true);
    $duration = get_post_meta($post->ID, 'package_duration', true);
    $includes = get_post_meta($post->ID, 'package_includes', true);
    $excludes = get_post_meta($post->ID, 'package_excludes', true);
    $highlights = get_post_meta($post->ID, 'package_highlights', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="package_price"><?php echo esc_html__('Price', 'tripbookkar'); ?></label></th>
            <td><input type="number" id="package_price" name="package_price" value="<?php echo esc_attr($price); ?>" /></td>
        </tr>
        <tr>
            <th><label for="package_duration"><?php echo esc_html__('Duration', 'tripbookkar'); ?></label></th>
            <td><input type="text" id="package_duration" name="package_duration" value="<?php echo esc_attr($duration); ?>" placeholder="e.g., 5 Days 4 Nights" /></td>
        </tr>
        <tr>
            <th><label for="package_includes"><?php echo esc_html__('Includes', 'tripbookkar'); ?></label></th>
            <td><textarea id="package_includes" name="package_includes" rows="4" cols="50"><?php echo esc_textarea($includes); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="package_excludes"><?php echo esc_html__('Excludes', 'tripbookkar'); ?></label></th>
            <td><textarea id="package_excludes" name="package_excludes" rows="4" cols="50"><?php echo esc_textarea($excludes); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="package_highlights"><?php echo esc_html__('Highlights', 'tripbookkar'); ?></label></th>
            <td><textarea id="package_highlights" name="package_highlights" rows="4" cols="50"><?php echo esc_textarea($highlights); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Testimonial meta box callback
 */
function tripbookkar_testimonial_meta_box($post) {
    wp_nonce_field('tripbookkar_testimonial_meta', 'tripbookkar_testimonial_nonce');
    
    $author = get_post_meta($post->ID, 'testimonial_author', true);
    $position = get_post_meta($post->ID, 'testimonial_position', true);
    $rating = get_post_meta($post->ID, 'testimonial_rating', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="testimonial_author"><?php echo esc_html__('Author Name', 'tripbookkar'); ?></label></th>
            <td><input type="text" id="testimonial_author" name="testimonial_author" value="<?php echo esc_attr($author); ?>" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_position"><?php echo esc_html__('Position/Company', 'tripbookkar'); ?></label></th>
            <td><input type="text" id="testimonial_position" name="testimonial_position" value="<?php echo esc_attr($position); ?>" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_rating"><?php echo esc_html__('Rating', 'tripbookkar'); ?></label></th>
            <td>
                <select id="testimonial_rating" name="testimonial_rating">
                    <option value="5" <?php selected($rating, '5'); ?>>5 Stars</option>
                    <option value="4" <?php selected($rating, '4'); ?>>4 Stars</option>
                    <option value="3" <?php selected($rating, '3'); ?>>3 Stars</option>
                    <option value="2" <?php selected($rating, '2'); ?>>2 Stars</option>
                    <option value="1" <?php selected($rating, '1'); ?>>1 Star</option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save meta box data
 */
function tripbookkar_save_meta_boxes($post_id) {
    // Check if user has permissions to save data
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if not an autosave
    if (wp_is_post_autosave($post_id)) {
        return;
    }

    // Check if not a revision
    if (wp_is_post_revision($post_id)) {
        return;
    }

    // Save destination meta
    if (isset($_POST['tripbookkar_destination_nonce']) && wp_verify_nonce($_POST['tripbookkar_destination_nonce'], 'tripbookkar_destination_meta')) {
        $fields = array('destination_starting_price', 'destination_best_time', 'destination_duration', 'destination_location');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // Save package meta
    if (isset($_POST['tripbookkar_package_nonce']) && wp_verify_nonce($_POST['tripbookkar_package_nonce'], 'tripbookkar_package_meta')) {
        $fields = array('package_price', 'package_duration', 'package_includes', 'package_excludes', 'package_highlights');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                if (in_array($field, array('package_includes', 'package_excludes', 'package_highlights'))) {
                    update_post_meta($post_id, $field, sanitize_textarea_field($_POST[$field]));
                } else {
                    update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
                }
            }
        }
    }

    // Save testimonial meta
    if (isset($_POST['tripbookkar_testimonial_nonce']) && wp_verify_nonce($_POST['tripbookkar_testimonial_nonce'], 'tripbookkar_testimonial_meta')) {
        $fields = array('testimonial_author', 'testimonial_position', 'testimonial_rating');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'tripbookkar_save_meta_boxes');

/**
 * Helper function to darken a color
 */
function tripbookkar_darken_color($color, $percent) {
    $color = str_replace('#', '', $color);
    $rgb = array_map('hexdec', str_split($color, 2));
    
    foreach ($rgb as &$value) {
        $value = max(0, min(255, $value - ($value * $percent / 100)));
    }
    
    return '#' . implode('', array_map(function($val) {
        return str_pad(dechex($val), 2, '0', STR_PAD_LEFT);
    }, $rgb));
}

/**
 * Add body classes
 */
function tripbookkar_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    
    if (is_page_template('page-flights.php')) {
        $classes[] = 'flights-page';
    }
    
    if (is_page_template('page-hotels.php')) {
        $classes[] = 'hotels-page';
    }
    
    if (is_page_template('page-packages.php')) {
        $classes[] = 'packages-page';
    }
    
    return $classes;
}
add_filter('body_class', 'tripbookkar_body_classes');

/**
 * Demo importer activation
 */
function tripbookkar_demo_importer() {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Add demo content creation logic here
    tripbookkar_create_demo_content();
    
    wp_redirect(admin_url('admin.php?page=tripbookkar-settings&demo=imported'));
    exit;
}

/**
 * Create demo content
 */
function tripbookkar_create_demo_content() {
    // Create demo destinations
    $destinations = array(
        array('title' => 'Paris, France', 'price' => 899, 'duration' => '5-7 days'),
        array('title' => 'Tokyo, Japan', 'price' => 1299, 'duration' => '7-10 days'),
        array('title' => 'New York, USA', 'price' => 799, 'duration' => '4-6 days'),
        array('title' => 'Dubai, UAE', 'price' => 699, 'duration' => '3-5 days'),
        array('title' => 'London, UK', 'price' => 749, 'duration' => '4-6 days'),
    );

    foreach ($destinations as $dest) {
        $post_id = wp_insert_post(array(
            'post_title' => $dest['title'],
            'post_content' => 'Experience the beauty and culture of ' . $dest['title'] . '. This amazing destination offers unforgettable memories.',
            'post_status' => 'publish',
            'post_type' => 'destination'
        ));
        
        if ($post_id) {
            update_post_meta($post_id, 'destination_starting_price', $dest['price']);
            update_post_meta($post_id, 'destination_duration', $dest['duration']);
        }
    }

    // Create demo packages
    $packages = array(
        array('title' => 'European Explorer', 'price' => 2499, 'duration' => '12 Days 11 Nights'),
        array('title' => 'Asian Adventure', 'price' => 1899, 'duration' => '10 Days 9 Nights'),
        array('title' => 'Tropical Paradise', 'price' => 1599, 'duration' => '7 Days 6 Nights'),
    );

    foreach ($packages as $package) {
        $post_id = wp_insert_post(array(
            'post_title' => $package['title'],
            'post_content' => 'Join us for an incredible ' . $package['title'] . ' package with amazing destinations and experiences.',
            'post_status' => 'publish',
            'post_type' => 'package'
        ));
        
        if ($post_id) {
            update_post_meta($post_id, 'package_price', $package['price']);
            update_post_meta($post_id, 'package_duration', $package['duration']);
            update_post_meta($post_id, 'package_includes', "• Accommodation\n• Meals\n• Transportation\n• Guide");
        }
    }

    // Create demo testimonials
    $testimonials = array(
        array('title' => 'Amazing Experience', 'author' => 'John Smith', 'position' => 'Travel Blogger', 'rating' => '5'),
        array('title' => 'Best Trip Ever', 'author' => 'Sarah Johnson', 'position' => 'Marketing Manager', 'rating' => '5'),
        array('title' => 'Highly Recommended', 'author' => 'Mike Wilson', 'position' => 'Software Developer', 'rating' => '4'),
    );

    foreach ($testimonials as $testimonial) {
        $post_id = wp_insert_post(array(
            'post_title' => $testimonial['title'],
            'post_content' => 'TripBookKar provided an excellent service and amazing travel experience. I would definitely book with them again!',
            'post_status' => 'publish',
            'post_type' => 'testimonial'
        ));
        
        if ($post_id) {
            update_post_meta($post_id, 'testimonial_author', $testimonial['author']);
            update_post_meta($post_id, 'testimonial_position', $testimonial['position']);
            update_post_meta($post_id, 'testimonial_rating', $testimonial['rating']);
        }
    }
}

// Handle demo import AJAX
add_action('wp_ajax_tripbookkar_import_demo', 'tripbookkar_demo_importer');

/**
 * Load theme textdomain
 */
function tripbookkar_load_textdomain() {
    load_theme_textdomain('tripbookkar', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'tripbookkar_load_textdomain');

?>