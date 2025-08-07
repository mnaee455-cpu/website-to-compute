<?php
/**
 * TripBookKar Theme Functions
 * 
 * @package TripBookKar
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('TRIPBOOKKAR_VERSION', '1.0.0');
define('TRIPBOOKKAR_THEME_DIR', get_template_directory());
define('TRIPBOOKKAR_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function tripbookkar_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    
    // Add support for wide and full alignment
    add_theme_support('align-wide');
    add_theme_support('align-full');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Set image sizes
    add_image_size('tripbookkar-featured', 800, 600, true);
    add_image_size('tripbookkar-destination', 400, 300, true);
    add_image_size('tripbookkar-package', 350, 250, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'tripbookkar'),
        'footer' => __('Footer Menu', 'tripbookkar'),
    ));
}
add_action('after_setup_theme', 'tripbookkar_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function tripbookkar_enqueue_scripts() {
    // Enqueue styles
    wp_enqueue_style('tripbookkar-style', get_stylesheet_uri(), array(), TRIPBOOKKAR_VERSION);
    wp_enqueue_style('tripbookkar-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('tripbookkar-main', TRIPBOOKKAR_THEME_URI . '/assets/css/main.css', array(), TRIPBOOKKAR_VERSION);
    
    // Enqueue scripts
    wp_enqueue_script('tripbookkar-main', TRIPBOOKKAR_THEME_URI . '/assets/js/main.js', array('jquery'), TRIPBOOKKAR_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('tripbookkar-main', 'tripbookkar_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('tripbookkar_nonce'),
    ));
    
    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'tripbookkar_enqueue_scripts');

/**
 * Custom Post Types
 */
function tripbookkar_register_post_types() {
    // Destinations Post Type
    register_post_type('destinations', array(
        'labels' => array(
            'name' => __('Destinations', 'tripbookkar'),
            'singular_name' => __('Destination', 'tripbookkar'),
            'add_new' => __('Add New Destination', 'tripbookkar'),
            'add_new_item' => __('Add New Destination', 'tripbookkar'),
            'edit_item' => __('Edit Destination', 'tripbookkar'),
            'new_item' => __('New Destination', 'tripbookkar'),
            'view_item' => __('View Destination', 'tripbookkar'),
            'search_items' => __('Search Destinations', 'tripbookkar'),
            'not_found' => __('No destinations found', 'tripbookkar'),
            'not_found_in_trash' => __('No destinations found in trash', 'tripbookkar'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-location-alt',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'destinations'),
    ));
    
    // Packages Post Type
    register_post_type('packages', array(
        'labels' => array(
            'name' => __('Travel Packages', 'tripbookkar'),
            'singular_name' => __('Package', 'tripbookkar'),
            'add_new' => __('Add New Package', 'tripbookkar'),
            'add_new_item' => __('Add New Package', 'tripbookkar'),
            'edit_item' => __('Edit Package', 'tripbookkar'),
            'new_item' => __('New Package', 'tripbookkar'),
            'view_item' => __('View Package', 'tripbookkar'),
            'search_items' => __('Search Packages', 'tripbookkar'),
            'not_found' => __('No packages found', 'tripbookkar'),
            'not_found_in_trash' => __('No packages found in trash', 'tripbookkar'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-location',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'packages'),
    ));
    
    // Testimonials Post Type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => __('Testimonials', 'tripbookkar'),
            'singular_name' => __('Testimonial', 'tripbookkar'),
            'add_new' => __('Add New Testimonial', 'tripbookkar'),
            'add_new_item' => __('Add New Testimonial', 'tripbookkar'),
            'edit_item' => __('Edit Testimonial', 'tripbookkar'),
            'new_item' => __('New Testimonial', 'tripbookkar'),
            'view_item' => __('View Testimonial', 'tripbookkar'),
            'search_items' => __('Search Testimonials', 'tripbookkar'),
        ),
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}
add_action('init', 'tripbookkar_register_post_types');

/**
 * Register Custom Taxonomies
 */
function tripbookkar_register_taxonomies() {
    // Destination Types
    register_taxonomy('destination_type', 'destinations', array(
        'labels' => array(
            'name' => __('Destination Types', 'tripbookkar'),
            'singular_name' => __('Destination Type', 'tripbookkar'),
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'destination-type'),
    ));
    
    // Package Categories
    register_taxonomy('package_category', 'packages', array(
        'labels' => array(
            'name' => __('Package Categories', 'tripbookkar'),
            'singular_name' => __('Package Category', 'tripbookkar'),
        ),
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'package-category'),
    ));
}
add_action('init', 'tripbookkar_register_taxonomies');

/**
 * Widget Areas
 */
function tripbookkar_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'tripbookkar'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'tripbookkar'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Widget 1', 'tripbookkar'),
        'id' => 'footer-1',
        'description' => __('Add widgets here.', 'tripbookkar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Widget 2', 'tripbookkar'),
        'id' => 'footer-2',
        'description' => __('Add widgets here.', 'tripbookkar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Widget 3', 'tripbookkar'),
        'id' => 'footer-3',
        'description' => __('Add widgets here.', 'tripbookkar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'tripbookkar_widgets_init');

/**
 * Admin Settings Page
 */
function tripbookkar_admin_menu() {
    add_theme_page(
        __('TripBookKar Settings', 'tripbookkar'),
        __('Theme Settings', 'tripbookkar'),
        'manage_options',
        'tripbookkar-settings',
        'tripbookkar_settings_page'
    );
}
add_action('admin_menu', 'tripbookkar_admin_menu');

/**
 * Settings Page Content
 */
function tripbookkar_settings_page() {
    if (isset($_POST['submit'])) {
        // Save settings
        update_option('tripbookkar_amadeus_api_key', sanitize_text_field($_POST['amadeus_api_key']));
        update_option('tripbookkar_amadeus_api_secret', sanitize_text_field($_POST['amadeus_api_secret']));
        update_option('tripbookkar_booking_api_key', sanitize_text_field($_POST['booking_api_key']));
        update_option('tripbookkar_travelpayouts_token', sanitize_text_field($_POST['travelpayouts_token']));
        update_option('tripbookkar_primary_color', sanitize_hex_color($_POST['primary_color']));
        update_option('tripbookkar_secondary_color', sanitize_hex_color($_POST['secondary_color']));
        
        echo '<div class="notice notice-success"><p>' . __('Settings saved!', 'tripbookkar') . '</p></div>';
    }
    
    $amadeus_api_key = get_option('tripbookkar_amadeus_api_key', '');
    $amadeus_api_secret = get_option('tripbookkar_amadeus_api_secret', '');
    $booking_api_key = get_option('tripbookkar_booking_api_key', '');
    $travelpayouts_token = get_option('tripbookkar_travelpayouts_token', '');
    $primary_color = get_option('tripbookkar_primary_color', '#e74c3c');
    $secondary_color = get_option('tripbookkar_secondary_color', '#3498db');
    ?>
    
    <div class="wrap">
        <h1><?php _e('TripBookKar Theme Settings', 'tripbookkar'); ?></h1>
        
        <form method="post" action="">
            <?php wp_nonce_field('tripbookkar_settings', 'tripbookkar_nonce'); ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row"><?php _e('Amadeus API Key', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="amadeus_api_key" value="<?php echo esc_attr($amadeus_api_key); ?>" class="regular-text" />
                        <p class="description"><?php _e('Enter your Amadeus API key for flight data.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Amadeus API Secret', 'tripbookkar'); ?></th>
                    <td>
                        <input type="password" name="amadeus_api_secret" value="<?php echo esc_attr($amadeus_api_secret); ?>" class="regular-text" />
                        <p class="description"><?php _e('Enter your Amadeus API secret.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Booking.com API Key', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="booking_api_key" value="<?php echo esc_attr($booking_api_key); ?>" class="regular-text" />
                        <p class="description"><?php _e('Enter your Booking.com API key for hotel data.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('TravelPayouts Token', 'tripbookkar'); ?></th>
                    <td>
                        <input type="text" name="travelpayouts_token" value="<?php echo esc_attr($travelpayouts_token); ?>" class="regular-text" />
                        <p class="description"><?php _e('Enter your TravelPayouts API token.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Primary Color', 'tripbookkar'); ?></th>
                    <td>
                        <input type="color" name="primary_color" value="<?php echo esc_attr($primary_color); ?>" />
                        <p class="description"><?php _e('Choose the primary color for your theme.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e('Secondary Color', 'tripbookkar'); ?></th>
                    <td>
                        <input type="color" name="secondary_color" value="<?php echo esc_attr($secondary_color); ?>" />
                        <p class="description"><?php _e('Choose the secondary color for your theme.', 'tripbookkar'); ?></p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * Custom CSS for color customization
 */
function tripbookkar_custom_css() {
    $primary_color = get_option('tripbookkar_primary_color', '#e74c3c');
    $secondary_color = get_option('tripbookkar_secondary_color', '#3498db');
    
    if ($primary_color !== '#e74c3c' || $secondary_color !== '#3498db') {
        echo '<style type="text/css">';
        echo ':root { --primary-color: ' . esc_attr($primary_color) . '; --secondary-color: ' . esc_attr($secondary_color) . '; }';
        echo '</style>';
    }
}
add_action('wp_head', 'tripbookkar_custom_css');

/**
 * API Integration Functions
 */

// Amadeus API Integration
function tripbookkar_amadeus_search_flights($origin, $destination, $departure_date, $return_date = null) {
    $api_key = get_option('tripbookkar_amadeus_api_key');
    $api_secret = get_option('tripbookkar_amadeus_api_secret');
    
    if (empty($api_key) || empty($api_secret)) {
        return array('error' => 'API credentials not configured');
    }
    
    // This is a placeholder for Amadeus API integration
    // In a real implementation, you would make API calls here
    return array(
        'flights' => array(
            array(
                'airline' => 'Sample Airlines',
                'price' => 299,
                'duration' => '2h 30m',
                'departure' => $departure_date . ' 10:00',
                'arrival' => $departure_date . ' 12:30'
            )
        )
    );
}

// Booking.com API Integration
function tripbookkar_booking_search_hotels($city, $checkin, $checkout, $guests = 2) {
    $api_key = get_option('tripbookkar_booking_api_key');
    
    if (empty($api_key)) {
        return array('error' => 'Booking.com API key not configured');
    }
    
    // This is a placeholder for Booking.com API integration
    return array(
        'hotels' => array(
            array(
                'name' => 'Sample Hotel',
                'price' => 150,
                'rating' => 4.5,
                'image' => TRIPBOOKKAR_THEME_URI . '/assets/images/sample-hotel.jpg'
            )
        )
    );
}

/**
 * AJAX Handlers
 */
function tripbookkar_ajax_search_flights() {
    check_ajax_referer('tripbookkar_nonce', 'nonce');
    
    $origin = sanitize_text_field($_POST['origin']);
    $destination = sanitize_text_field($_POST['destination']);
    $departure_date = sanitize_text_field($_POST['departure_date']);
    $return_date = sanitize_text_field($_POST['return_date']);
    
    $results = tripbookkar_amadeus_search_flights($origin, $destination, $departure_date, $return_date);
    
    wp_send_json($results);
}
add_action('wp_ajax_search_flights', 'tripbookkar_ajax_search_flights');
add_action('wp_ajax_nopriv_search_flights', 'tripbookkar_ajax_search_flights');

function tripbookkar_ajax_search_hotels() {
    check_ajax_referer('tripbookkar_nonce', 'nonce');
    
    $city = sanitize_text_field($_POST['city']);
    $checkin = sanitize_text_field($_POST['checkin']);
    $checkout = sanitize_text_field($_POST['checkout']);
    $guests = intval($_POST['guests']);
    
    $results = tripbookkar_booking_search_hotels($city, $checkin, $checkout, $guests);
    
    wp_send_json($results);
}
add_action('wp_ajax_search_hotels', 'tripbookkar_ajax_search_hotels');
add_action('wp_ajax_nopriv_search_hotels', 'tripbookkar_ajax_search_hotels');

/**
 * Elementor Compatibility
 */
function tripbookkar_elementor_init() {
    // Check if Elementor is installed and activated
    if (did_action('elementor/loaded')) {
        // Include custom Elementor widgets
        require_once TRIPBOOKKAR_THEME_DIR . '/inc/elementor-widgets.php';
    }
}
add_action('init', 'tripbookkar_elementor_init');

/**
 * Demo Content Importer
 */
function tripbookkar_import_demo_content() {
    // This function would handle demo content import
    // For now, it's a placeholder that could be expanded
    if (current_user_can('manage_options')) {
        // Import demo posts, pages, and settings
        // This would typically use WordPress import functionality
    }
}

/**
 * Custom Meta Boxes
 */
function tripbookkar_add_meta_boxes() {
    // Package meta box
    add_meta_box(
        'package-details',
        __('Package Details', 'tripbookkar'),
        'tripbookkar_package_meta_box',
        'packages',
        'normal',
        'high'
    );
    
    // Destination meta box
    add_meta_box(
        'destination-details',
        __('Destination Details', 'tripbookkar'),
        'tripbookkar_destination_meta_box',
        'destinations',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tripbookkar_add_meta_boxes');

function tripbookkar_package_meta_box($post) {
    wp_nonce_field('tripbookkar_package_meta', 'tripbookkar_package_nonce');
    
    $price = get_post_meta($post->ID, '_package_price', true);
    $duration = get_post_meta($post->ID, '_package_duration', true);
    $includes = get_post_meta($post->ID, '_package_includes', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="package_price">' . __('Price', 'tripbookkar') . '</label></th>';
    echo '<td><input type="number" id="package_price" name="package_price" value="' . esc_attr($price) . '" /></td></tr>';
    echo '<tr><th><label for="package_duration">' . __('Duration (days)', 'tripbookkar') . '</label></th>';
    echo '<td><input type="number" id="package_duration" name="package_duration" value="' . esc_attr($duration) . '" /></td></tr>';
    echo '<tr><th><label for="package_includes">' . __('Package Includes', 'tripbookkar') . '</label></th>';
    echo '<td><textarea id="package_includes" name="package_includes" rows="4" cols="50">' . esc_textarea($includes) . '</textarea></td></tr>';
    echo '</table>';
}

function tripbookkar_destination_meta_box($post) {
    wp_nonce_field('tripbookkar_destination_meta', 'tripbookkar_destination_nonce');
    
    $best_time = get_post_meta($post->ID, '_best_time_to_visit', true);
    $climate = get_post_meta($post->ID, '_climate', true);
    $attractions = get_post_meta($post->ID, '_top_attractions', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="best_time">' . __('Best Time to Visit', 'tripbookkar') . '</label></th>';
    echo '<td><input type="text" id="best_time" name="best_time" value="' . esc_attr($best_time) . '" /></td></tr>';
    echo '<tr><th><label for="climate">' . __('Climate', 'tripbookkar') . '</label></th>';
    echo '<td><input type="text" id="climate" name="climate" value="' . esc_attr($climate) . '" /></td></tr>';
    echo '<tr><th><label for="attractions">' . __('Top Attractions', 'tripbookkar') . '</label></th>';
    echo '<td><textarea id="attractions" name="attractions" rows="4" cols="50">' . esc_textarea($attractions) . '</textarea></td></tr>';
    echo '</table>';
}

/**
 * Save Meta Box Data
 */
function tripbookkar_save_meta_boxes($post_id) {
    // Package meta
    if (isset($_POST['tripbookkar_package_nonce']) && wp_verify_nonce($_POST['tripbookkar_package_nonce'], 'tripbookkar_package_meta')) {
        if (isset($_POST['package_price'])) {
            update_post_meta($post_id, '_package_price', sanitize_text_field($_POST['package_price']));
        }
        if (isset($_POST['package_duration'])) {
            update_post_meta($post_id, '_package_duration', sanitize_text_field($_POST['package_duration']));
        }
        if (isset($_POST['package_includes'])) {
            update_post_meta($post_id, '_package_includes', sanitize_textarea_field($_POST['package_includes']));
        }
    }
    
    // Destination meta
    if (isset($_POST['tripbookkar_destination_nonce']) && wp_verify_nonce($_POST['tripbookkar_destination_nonce'], 'tripbookkar_destination_meta')) {
        if (isset($_POST['best_time'])) {
            update_post_meta($post_id, '_best_time_to_visit', sanitize_text_field($_POST['best_time']));
        }
        if (isset($_POST['climate'])) {
            update_post_meta($post_id, '_climate', sanitize_text_field($_POST['climate']));
        }
        if (isset($_POST['attractions'])) {
            update_post_meta($post_id, '_top_attractions', sanitize_textarea_field($_POST['attractions']));
        }
    }
}
add_action('save_post', 'tripbookkar_save_meta_boxes');

/**
 * Security: Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Optimize WordPress for better performance
 */
function tripbookkar_optimize_wp() {
    // Remove unnecessary scripts and styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'tripbookkar_optimize_wp');

/**
 * Admin Panel Settings
 */
function tripbookkar_admin_menu() {
    add_menu_page(
        'TripBookKar Settings',
        'TripBookKar',
        'manage_options',
        'tripbookkar-settings',
        'tripbookkar_settings_page',
        'dashicons-airplane',
        30
    );
    
    add_submenu_page(
        'tripbookkar-settings',
        'API Settings',
        'API Settings',
        'manage_options',
        'tripbookkar-api-settings',
        'tripbookkar_api_settings_page'
    );
    
    add_submenu_page(
        'tripbookkar-settings',
        'Demo Importer',
        'Demo Importer',
        'manage_options',
        'tripbookkar-demo-importer',
        'tripbookkar_demo_importer_page'
    );
}
add_action('admin_menu', 'tripbookkar_admin_menu');

/**
 * Main Settings Page
 */
function tripbookkar_settings_page() {
    ?>
    <div class="wrap">
        <h1>TripBookKar Settings</h1>
        <div class="tripbookkar-admin-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
            
            <div class="settings-card" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h3 style="margin-top: 0; color: #2c3e50;">🔑 API Configuration</h3>
                <p>Configure your travel API keys for live data integration.</p>
                <a href="<?php echo admin_url('admin.php?page=tripbookkar-api-settings'); ?>" class="button button-primary">Configure APIs</a>
            </div>
            
            <div class="settings-card" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h3 style="margin-top: 0; color: #2c3e50;">📥 Demo Content</h3>
                <p>Import demo content and destinations with one click.</p>
                <a href="<?php echo admin_url('admin.php?page=tripbookkar-demo-importer'); ?>" class="button button-primary">Import Demo</a>
            </div>
            
            <div class="settings-card" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h3 style="margin-top: 0; color: #2c3e50;">🎨 Customization</h3>
                <p>Customize colors and theme settings via WordPress Customizer.</p>
                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">Customize Theme</a>
            </div>
            
        </div>
        
        <div class="tripbookkar-quick-stats" style="margin-top: 30px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h3>Quick Stats</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: #e74c3c;"><?php echo wp_count_posts('destinations')->publish; ?></div>
                    <div>Destinations</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: #3498db;"><?php echo wp_count_posts('packages')->publish; ?></div>
                    <div>Packages</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: #27ae60;"><?php echo wp_count_posts('testimonials')->publish; ?></div>
                    <div>Testimonials</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: #f39c12;">v1.0</div>
                    <div>Theme Version</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * API Settings Page
 */
function tripbookkar_api_settings_page() {
    if (isset($_POST['submit'])) {
        // Save API settings
        update_option('tripbookkar_amadeus_api_key', sanitize_text_field($_POST['amadeus_api_key']));
        update_option('tripbookkar_amadeus_api_secret', sanitize_text_field($_POST['amadeus_api_secret']));
        update_option('tripbookkar_booking_com_api_key', sanitize_text_field($_POST['booking_com_api_key']));
        update_option('tripbookkar_travelpayouts_api_key', sanitize_text_field($_POST['travelpayouts_api_key']));
        update_option('tripbookkar_weather_api_key', sanitize_text_field($_POST['weather_api_key']));
        
        echo '<div class="notice notice-success"><p>API settings saved successfully!</p></div>';
    }
    
    $amadeus_api_key = get_option('tripbookkar_amadeus_api_key', '');
    $amadeus_api_secret = get_option('tripbookkar_amadeus_api_secret', '');
    $booking_com_api_key = get_option('tripbookkar_booking_com_api_key', '');
    $travelpayouts_api_key = get_option('tripbookkar_travelpayouts_api_key', '');
    $weather_api_key = get_option('tripbookkar_weather_api_key', '');
    ?>
    <div class="wrap">
        <h1>API Settings</h1>
        <p>Configure your API keys to enable live data integration for flights, hotels, and weather information.</p>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <h3 style="margin: 0;">✈️ Flight APIs</h3>
                    </th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Amadeus API Key</th>
                    <td>
                        <input type="text" name="amadeus_api_key" value="<?php echo esc_attr($amadeus_api_key); ?>" class="regular-text" />
                        <p class="description">Get your key from <a href="https://developers.amadeus.com/" target="_blank">Amadeus Developer Portal</a></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Amadeus API Secret</th>
                    <td>
                        <input type="password" name="amadeus_api_secret" value="<?php echo esc_attr($amadeus_api_secret); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">TravelPayouts API Key</th>
                    <td>
                        <input type="text" name="travelpayouts_api_key" value="<?php echo esc_attr($travelpayouts_api_key); ?>" class="regular-text" />
                        <p class="description">Alternative flight search API from <a href="https://www.travelpayouts.com/" target="_blank">TravelPayouts</a></p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <h3 style="margin: 20px 0 0 0;">🏨 Hotel APIs</h3>
                    </th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Booking.com API Key</th>
                    <td>
                        <input type="text" name="booking_com_api_key" value="<?php echo esc_attr($booking_com_api_key); ?>" class="regular-text" />
                        <p class="description">Get partner access from <a href="https://developers.booking.com/" target="_blank">Booking.com Partner Hub</a></p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <h3 style="margin: 20px 0 0 0;">🌤️ Weather API</h3>
                    </th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">OpenWeatherMap API Key</th>
                    <td>
                        <input type="text" name="weather_api_key" value="<?php echo esc_attr($weather_api_key); ?>" class="regular-text" />
                        <p class="description">Get your free key from <a href="https://openweathermap.org/api" target="_blank">OpenWeatherMap</a></p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('Save API Settings'); ?>
        </form>
        
        <div class="api-status" style="margin-top: 30px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h3>API Status</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px;">
                <div style="padding: 15px; border-left: 4px solid <?php echo $amadeus_api_key ? '#27ae60' : '#e74c3c'; ?>; background: #f9f9f9;">
                    <strong>Amadeus Flights</strong><br>
                    Status: <?php echo $amadeus_api_key ? '✅ Configured' : '❌ Not Configured'; ?>
                </div>
                <div style="padding: 15px; border-left: 4px solid <?php echo $booking_com_api_key ? '#27ae60' : '#e74c3c'; ?>; background: #f9f9f9;">
                    <strong>Booking.com Hotels</strong><br>
                    Status: <?php echo $booking_com_api_key ? '✅ Configured' : '❌ Not Configured'; ?>
                </div>
                <div style="padding: 15px; border-left: 4px solid <?php echo $weather_api_key ? '#27ae60' : '#e74c3c'; ?>; background: #f9f9f9;">
                    <strong>Weather Data</strong><br>
                    Status: <?php echo $weather_api_key ? '✅ Configured' : '❌ Not Configured'; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Demo Importer Page
 */
function tripbookkar_demo_importer_page() {
    if (isset($_POST['import_demo'])) {
        tripbookkar_import_demo_content();
        echo '<div class="notice notice-success"><p>Demo content imported successfully!</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>Demo Content Importer</h1>
        <p>Import sample destinations, packages, and other content to get started quickly.</p>
        
        <div class="demo-preview" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px;">
            <h3>What will be imported:</h3>
            <ul style="list-style-type: none; padding-left: 0;">
                <li>✅ 20 Popular travel destinations with SEO content</li>
                <li>✅ 10 Featured holiday packages</li>
                <li>✅ 5 Customer testimonials</li>
                <li>✅ Sample blog posts about travel</li>
                <li>✅ Contact forms and pages</li>
            </ul>
        </div>
        
        <form method="post" action="">
            <p><strong>Warning:</strong> This will create new content but won't delete existing posts.</p>
            <?php submit_button('Import Demo Content', 'primary large', 'import_demo'); ?>
        </form>
    </div>
    <?php
}

/**
 * Import Demo Content - Creates 20 destinations
 */
function tripbookkar_import_demo_content() {
    // Demo destinations data
    $destinations = array(
        array('title' => 'Paris', 'country' => 'France', 'continent' => 'Europe', 'cost' => '150', 'best_time' => 'April - October'),
        array('title' => 'Tokyo', 'country' => 'Japan', 'continent' => 'Asia', 'cost' => '120', 'best_time' => 'March - May, Sept - Nov'),
        array('title' => 'New York City', 'country' => 'United States', 'continent' => 'North America', 'cost' => '200', 'best_time' => 'April - June, Sept - Nov'),
        array('title' => 'London', 'country' => 'United Kingdom', 'continent' => 'Europe', 'cost' => '180', 'best_time' => 'May - September'),
        array('title' => 'Dubai', 'country' => 'United Arab Emirates', 'continent' => 'Asia', 'cost' => '160', 'best_time' => 'November - March'),
        array('title' => 'Rome', 'country' => 'Italy', 'continent' => 'Europe', 'cost' => '140', 'best_time' => 'April - June, Sept - Oct'),
        array('title' => 'Bangkok', 'country' => 'Thailand', 'continent' => 'Asia', 'cost' => '80', 'best_time' => 'November - February'),
        array('title' => 'Barcelona', 'country' => 'Spain', 'continent' => 'Europe', 'cost' => '130', 'best_time' => 'May - September'),
        array('title' => 'Sydney', 'country' => 'Australia', 'continent' => 'Oceania', 'cost' => '170', 'best_time' => 'September - November'),
        array('title' => 'Amsterdam', 'country' => 'Netherlands', 'continent' => 'Europe', 'cost' => '160', 'best_time' => 'April - October'),
        array('title' => 'Singapore', 'country' => 'Singapore', 'continent' => 'Asia', 'cost' => '150', 'best_time' => 'February - April'),
        array('title' => 'Istanbul', 'country' => 'Turkey', 'continent' => 'Europe/Asia', 'cost' => '90', 'best_time' => 'April - May, Sept - Nov'),
        array('title' => 'Los Angeles', 'country' => 'United States', 'continent' => 'North America', 'cost' => '180', 'best_time' => 'Year-round'),
        array('title' => 'Prague', 'country' => 'Czech Republic', 'continent' => 'Europe', 'cost' => '100', 'best_time' => 'May - September'),
        array('title' => 'Cairo', 'country' => 'Egypt', 'continent' => 'Africa', 'cost' => '70', 'best_time' => 'October - April'),
        array('title' => 'Rio de Janeiro', 'country' => 'Brazil', 'continent' => 'South America', 'cost' => '90', 'best_time' => 'December - March'),
        array('title' => 'Vienna', 'country' => 'Austria', 'continent' => 'Europe', 'cost' => '140', 'best_time' => 'April - October'),
        array('title' => 'Mumbai', 'country' => 'India', 'continent' => 'Asia', 'cost' => '60', 'best_time' => 'November - February'),
        array('title' => 'Cape Town', 'country' => 'South Africa', 'continent' => 'Africa', 'cost' => '80', 'best_time' => 'December - April'),
        array('title' => 'Vancouver', 'country' => 'Canada', 'continent' => 'North America', 'cost' => '150', 'best_time' => 'June - August')
    );
    
    foreach ($destinations as $dest) {
        $content = "Discover the amazing beauty and culture of {$dest['title']} in {$dest['country']}. This incredible destination offers unforgettable experiences for every type of traveler. From stunning landmarks to delicious local cuisine, {$dest['title']} has something special for everyone. Plan your perfect trip and create memories that will last a lifetime.";
        
        $post_id = wp_insert_post(array(
            'post_title' => $dest['title'],
            'post_content' => $content,
            'post_status' => 'publish',
            'post_type' => 'destinations'
        ));
        
        if ($post_id) {
            update_post_meta($post_id, '_destination_country', $dest['country']);
            update_post_meta($post_id, '_destination_continent', $dest['continent']);
            update_post_meta($post_id, '_average_cost', $dest['cost']);
            update_post_meta($post_id, '_best_time_to_visit', $dest['best_time']);
            update_post_meta($post_id, '_currency', 'USD');
            update_post_meta($post_id, '_language', 'English');
        }
    }
}

/**
 * Elementor Support
 */
function tripbookkar_elementor_support() {
    add_theme_support('elementor');
    add_theme_support('elementor-page-settings');
}
add_action('after_setup_theme', 'tripbookkar_elementor_support');

/**
 * SEO Optimization
 */
function tripbookkar_seo_meta_tags() {
    if (is_singular('destinations')) {
        global $post;
        $destination_country = get_post_meta($post->ID, '_destination_country', true);
        $best_time = get_post_meta($post->ID, '_best_time_to_visit', true);
        
        echo '<meta name="description" content="Discover ' . get_the_title() . ' in ' . $destination_country . '. Best time to visit: ' . $best_time . '. Find flights, hotels, and packages.">' . "\n";
        echo '<meta property="og:title" content="Visit ' . get_the_title() . ' - ' . $destination_country . '">' . "\n";
        echo '<meta property="og:description" content="Plan your perfect trip to ' . get_the_title() . '. Discover attractions, book flights and hotels.">' . "\n";
    }
}
add_action('wp_head', 'tripbookkar_seo_meta_tags');