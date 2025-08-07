<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TripBookKar
 * @version 1.0.0
 */

get_header();
?>

<div class="container">
    <div class="row">
        <main id="primary" class="content-area col">
            
            <?php if (have_posts()) : ?>
                
                <?php if (is_home() && !is_front_page()) : ?>
                    <header class="page-header">
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>
                
                <?php if (is_front_page()) : ?>
                    <!-- Front Page Content -->
                    <section class="home-content">
                        
                        <!-- Top Destinations Section -->
                        <section class="section destinations-section">
                            <div class="section-header">
                                <h2><?php esc_html_e('Top Destinations', 'tripbookkar'); ?></h2>
                                <p><?php esc_html_e('Discover amazing places around the world', 'tripbookkar'); ?></p>
                            </div>
                            
                            <div class="destinations-grid">
                                <?php
                                $destinations = get_posts(array(
                                    'post_type' => 'destination',
                                    'posts_per_page' => 6,
                                    'meta_key' => 'destination_starting_price',
                                    'orderby' => 'meta_value_num',
                                    'order' => 'ASC'
                                ));
                                
                                if ($destinations) {
                                    foreach ($destinations as $destination) {
                                        setup_postdata($destination);
                                        get_template_part('template-parts/content', 'destination');
                                    }
                                    wp_reset_postdata();
                                } else {
                                    // Show placeholder destinations
                                    for ($i = 1; $i <= 6; $i++) {
                                        echo '<div class="destination-card">';
                                        echo '<img src="https://via.placeholder.com/400x300/3498db/ffffff?text=Destination+' . $i . '" alt="Destination ' . $i . '">';
                                        echo '<div class="destination-card-content">';
                                        echo '<h3>Amazing Destination ' . $i . '</h3>';
                                        echo '<div class="destination-price">From $' . (500 + ($i * 100)) . '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                            
                            <div class="text-center mt-4">
                                <a href="<?php echo esc_url(home_url('/destinations/')); ?>" class="btn btn-outline">
                                    <?php esc_html_e('View All Destinations', 'tripbookkar'); ?>
                                </a>
                            </div>
                        </section>
                        
                        <!-- Featured Packages Section -->
                        <section class="section packages-section bg-light">
                            <div class="section-header">
                                <h2><?php esc_html_e('Featured Packages', 'tripbookkar'); ?></h2>
                                <p><?php esc_html_e('Handpicked travel packages for unforgettable experiences', 'tripbookkar'); ?></p>
                            </div>
                            
                            <div class="packages-grid">
                                <?php
                                $packages = get_posts(array(
                                    'post_type' => 'package',
                                    'posts_per_page' => 3,
                                    'meta_key' => 'package_featured',
                                    'meta_value' => '1',
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC'
                                ));
                                
                                if ($packages) {
                                    foreach ($packages as $package) {
                                        setup_postdata($package);
                                        get_template_part('template-parts/content', 'package');
                                    }
                                    wp_reset_postdata();
                                } else {
                                    // Show placeholder packages
                                    $package_titles = array(
                                        'European Explorer',
                                        'Asian Adventure', 
                                        'Tropical Paradise'
                                    );
                                    $package_prices = array(2499, 1899, 1599);
                                    $package_durations = array('12 Days', '10 Days', '7 Days');
                                    
                                    for ($i = 0; $i < 3; $i++) {
                                        echo '<div class="package-card">';
                                        echo '<img src="https://via.placeholder.com/350x200/e74c3c/ffffff?text=' . urlencode($package_titles[$i]) . '" alt="' . $package_titles[$i] . '">';
                                        echo '<div class="package-card-content">';
                                        echo '<h4>' . $package_titles[$i] . '</h4>';
                                        echo '<div class="package-details">';
                                        echo '<span class="package-duration">' . $package_durations[$i] . '</span>';
                                        echo '<span class="package-price">$' . $package_prices[$i] . '</span>';
                                        echo '</div>';
                                        echo '<ul class="package-features">';
                                        echo '<li>Accommodation included</li>';
                                        echo '<li>Meals & transportation</li>';
                                        echo '<li>Professional guide</li>';
                                        echo '<li>All activities included</li>';
                                        echo '</ul>';
                                        echo '<a href="#" class="btn btn-primary">Book Now</a>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                            
                            <div class="text-center mt-4">
                                <a href="<?php echo esc_url(home_url('/packages/')); ?>" class="btn btn-secondary">
                                    <?php esc_html_e('View All Packages', 'tripbookkar'); ?>
                                </a>
                            </div>
                        </section>
                        
                        <!-- Why Choose Us Section -->
                        <section class="section why-choose-us-section">
                            <div class="section-header">
                                <h2><?php esc_html_e('Why Choose TripBookKar?', 'tripbookkar'); ?></h2>
                                <p><?php esc_html_e('Your trusted travel partner for memorable journeys', 'tripbookkar'); ?></p>
                            </div>
                            
                            <div class="features-grid">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                                    </div>
                                    <h4><?php esc_html_e('Best Prices', 'tripbookkar'); ?></h4>
                                    <p><?php esc_html_e('We guarantee the best prices for flights, hotels, and packages with our price match guarantee.', 'tripbookkar'); ?></p>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-headset" aria-hidden="true"></i>
                                    </div>
                                    <h4><?php esc_html_e('24/7 Support', 'tripbookkar'); ?></h4>
                                    <p><?php esc_html_e('Our dedicated customer support team is available 24/7 to assist you with any travel needs.', 'tripbookkar'); ?></p>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-shield-alt" aria-hidden="true"></i>
                                    </div>
                                    <h4><?php esc_html_e('Secure Booking', 'tripbookkar'); ?></h4>
                                    <p><?php esc_html_e('Your personal and payment information is protected with industry-leading security measures.', 'tripbookkar'); ?></p>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
                                    </div>
                                    <h4><?php esc_html_e('Expert Planning', 'tripbookkar'); ?></h4>
                                    <p><?php esc_html_e('Our travel experts create personalized itineraries to make your trip unforgettable.', 'tripbookkar'); ?></p>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-undo-alt" aria-hidden="true"></i>
                                    </div>
                                    <h4><?php esc_html_e('Easy Cancellation', 'tripbookkar'); ?></h4>
                                    <p><?php esc_html_e('Flexible cancellation policies to give you peace of mind when booking your travels.', 'tripbookkar'); ?></p>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-award" aria-hidden="true"></i>
                                    </div>
                                    <h4><?php esc_html_e('Award Winning', 'tripbookkar'); ?></h4>
                                    <p><?php esc_html_e('Recognized as one of the best travel booking platforms with numerous industry awards.', 'tripbookkar'); ?></p>
                                </div>
                            </div>
                        </section>
                        
                        <!-- Testimonials Section -->
                        <section class="section testimonials-section bg-light">
                            <div class="section-header">
                                <h2><?php esc_html_e('What Our Customers Say', 'tripbookkar'); ?></h2>
                                <p><?php esc_html_e('Read reviews from our satisfied travelers', 'tripbookkar'); ?></p>
                            </div>
                            
                            <div class="testimonials-slider">
                                <?php
                                $testimonials = get_posts(array(
                                    'post_type' => 'testimonial',
                                    'posts_per_page' => 3,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC'
                                ));
                                
                                if ($testimonials) {
                                    foreach ($testimonials as $testimonial) {
                                        setup_postdata($testimonial);
                                        get_template_part('template-parts/content', 'testimonial');
                                    }
                                    wp_reset_postdata();
                                } else {
                                    // Show placeholder testimonials
                                    $testimonial_data = array(
                                        array(
                                            'content' => 'Amazing service! TripBookKar made our dream vacation possible with excellent deals and support.',
                                            'author' => 'Sarah Johnson',
                                            'position' => 'Marketing Manager',
                                            'rating' => 5
                                        ),
                                        array(
                                            'content' => 'Best travel booking experience ever. Highly recommend for anyone planning their next adventure.',
                                            'author' => 'Mike Wilson',
                                            'position' => 'Software Developer',
                                            'rating' => 5
                                        ),
                                        array(
                                            'content' => 'Professional service and great prices. We will definitely book our next trip with TripBookKar.',
                                            'author' => 'Emily Davis',
                                            'position' => 'Teacher',
                                            'rating' => 4
                                        )
                                    );
                                    
                                    foreach ($testimonial_data as $testimonial) {
                                        echo '<div class="testimonial-card">';
                                        echo '<div class="testimonial-content">';
                                        echo '<p>"' . esc_html($testimonial['content']) . '"</p>';
                                        echo '</div>';
                                        echo '<div class="testimonial-author">';
                                        echo '<img src="https://via.placeholder.com/60x60/95a5a6/ffffff?text=' . substr($testimonial['author'], 0, 1) . '" alt="' . esc_attr($testimonial['author']) . '" class="testimonial-avatar">';
                                        echo '<div class="testimonial-info">';
                                        echo '<h5>' . esc_html($testimonial['author']) . '</h5>';
                                        echo '<span>' . esc_html($testimonial['position']) . '</span>';
                                        echo '<div class="testimonial-rating">';
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $testimonial['rating']) {
                                                echo '<i class="fas fa-star"></i>';
                                            } else {
                                                echo '<i class="far fa-star"></i>';
                                            }
                                        }
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </section>
                        
                    </section>
                    
                <?php else : ?>
                    <!-- Blog Posts -->
                    <div class="posts-container">
                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();
                            
                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_type());
                            
                        endwhile;
                        ?>
                    </div>
                    
                    <?php
                    the_posts_navigation(array(
                        'prev_text' => '<i class="fas fa-arrow-left"></i> ' . esc_html__('Older posts', 'tripbookkar'),
                        'next_text' => esc_html__('Newer posts', 'tripbookkar') . ' <i class="fas fa-arrow-right"></i>',
                    ));
                    ?>
                    
                <?php endif; ?>
                
            <?php else : ?>
                
                <!-- No Posts Found -->
                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Nothing here', 'tripbookkar'); ?></h1>
                    </header><!-- .page-header -->
                    
                    <div class="page-content">
                        <?php if (is_home() && current_user_can('publish_posts')) : ?>
                            
                            <p>
                                <?php
                                printf(
                                    wp_kses(
                                        /* translators: 1: link to WP admin new post page. */
                                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tripbookkar'),
                                        array(
                                            'a' => array(
                                                'href' => array(),
                                            ),
                                        )
                                    ),
                                    esc_url(admin_url('post-new.php'))
                                );
                                ?>
                            </p>
                            
                        <?php elseif (is_search()) : ?>
                            
                            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tripbookkar'); ?></p>
                            <?php get_search_form(); ?>
                            
                        <?php else : ?>
                            
                            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tripbookkar'); ?></p>
                            <?php get_search_form(); ?>
                            
                        <?php endif; ?>
                    </div><!-- .page-content -->
                </section><!-- .no-results -->
                
            <?php endif; ?>
            
        </main><!-- #primary -->
        
        <?php if (!is_front_page()) : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
        
    </div><!-- .row -->
</div><!-- .container -->

<!-- Additional Styles for Index Page -->
<style>
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.feature-item {
    text-align: center;
    padding: 2rem 1rem;
    background: var(--white);
    border-radius: 10px;
    box-shadow: var(--shadow-light);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: var(--white);
    font-size: 2rem;
}

.feature-item h4 {
    margin-bottom: 1rem;
    color: var(--dark-color);
}

.feature-item p {
    color: var(--gray-color);
    line-height: 1.6;
}

.posts-container {
    display: grid;
    gap: 2rem;
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
}

.no-results .page-header {
    margin-bottom: 2rem;
}

.no-results .page-content {
    max-width: 600px;
    margin: 0 auto;
}

.testimonial-rating {
    margin-top: 0.5rem;
}

.testimonial-rating i {
    color: var(--accent-color);
    margin-right: 2px;
}

@media (max-width: 768px) {
    .features-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .feature-item {
        padding: 1.5rem 1rem;
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
}
</style>

<?php
get_footer();
?>