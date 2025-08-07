<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TripBookKar
 * @version 1.0.0
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        
        <!-- Default Sidebar Content -->
        
        <!-- Search Widget -->
        <section class="widget widget_search">
            <h3 class="widget-title"><?php esc_html_e('Search', 'tripbookkar'); ?></h3>
            <?php get_search_form(); ?>
        </section>
        
        <!-- Quick Booking Widget -->
        <section class="widget widget_quick_booking">
            <h3 class="widget-title"><?php esc_html_e('Quick Booking', 'tripbookkar'); ?></h3>
            <div class="quick-booking-content">
                <p><?php esc_html_e('Need help planning your trip? Contact our travel experts.', 'tripbookkar'); ?></p>
                
                <div class="quick-booking-options">
                    <a href="<?php echo esc_url(home_url('/flights/')); ?>" class="quick-booking-link">
                        <i class="fas fa-plane" aria-hidden="true"></i>
                        <span><?php esc_html_e('Book Flights', 'tripbookkar'); ?></span>
                    </a>
                    
                    <a href="<?php echo esc_url(home_url('/hotels/')); ?>" class="quick-booking-link">
                        <i class="fas fa-bed" aria-hidden="true"></i>
                        <span><?php esc_html_e('Book Hotels', 'tripbookkar'); ?></span>
                    </a>
                    
                    <a href="<?php echo esc_url(home_url('/packages/')); ?>" class="quick-booking-link">
                        <i class="fas fa-suitcase" aria-hidden="true"></i>
                        <span><?php esc_html_e('Tour Packages', 'tripbookkar'); ?></span>
                    </a>
                    
                    <a href="<?php echo esc_url(home_url('/car-rental/')); ?>" class="quick-booking-link">
                        <i class="fas fa-car" aria-hidden="true"></i>
                        <span><?php esc_html_e('Car Rental', 'tripbookkar'); ?></span>
                    </a>
                </div>
                
                <?php if (get_option('tripbookkar_phone')) : ?>
                <div class="quick-contact">
                    <p><strong><?php esc_html_e('Call Now:', 'tripbookkar'); ?></strong></p>
                    <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_option('tripbookkar_phone'))); ?>" class="phone-number">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <?php echo esc_html(get_option('tripbookkar_phone')); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </section>
        
        <!-- Popular Destinations Widget -->
        <section class="widget widget_popular_destinations">
            <h3 class="widget-title"><?php esc_html_e('Popular Destinations', 'tripbookkar'); ?></h3>
            <div class="popular-destinations-list">
                <?php
                $destinations = get_posts(array(
                    'post_type' => 'destination',
                    'posts_per_page' => 5,
                    'meta_key' => 'destination_starting_price',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
                ));
                
                if ($destinations) {
                    foreach ($destinations as $destination) {
                        setup_postdata($destination);
                        $price = get_post_meta($destination->ID, 'destination_starting_price', true);
                        ?>
                        <div class="destination-item">
                            <div class="destination-thumbnail">
                                <?php if (has_post_thumbnail($destination->ID)) : ?>
                                    <a href="<?php echo get_permalink($destination->ID); ?>">
                                        <?php echo get_the_post_thumbnail($destination->ID, 'tripbookkar-thumbnail'); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php echo get_permalink($destination->ID); ?>">
                                        <img src="https://via.placeholder.com/150x150/3498db/ffffff?text=<?php echo urlencode(substr(get_the_title($destination->ID), 0, 1)); ?>" 
                                             alt="<?php echo esc_attr(get_the_title($destination->ID)); ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="destination-info">
                                <h4><a href="<?php echo get_permalink($destination->ID); ?>"><?php echo get_the_title($destination->ID); ?></a></h4>
                                <?php if ($price) : ?>
                                    <span class="destination-price">From $<?php echo esc_html($price); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    // Placeholder destinations
                    $placeholder_destinations = array(
                        array('name' => 'Paris, France', 'price' => 899),
                        array('name' => 'Tokyo, Japan', 'price' => 1299),
                        array('name' => 'New York, USA', 'price' => 799),
                        array('name' => 'London, UK', 'price' => 749),
                        array('name' => 'Dubai, UAE', 'price' => 699),
                    );
                    
                    foreach ($placeholder_destinations as $dest) {
                        ?>
                        <div class="destination-item">
                            <div class="destination-thumbnail">
                                <img src="https://via.placeholder.com/150x150/3498db/ffffff?text=<?php echo urlencode(substr($dest['name'], 0, 1)); ?>" 
                                     alt="<?php echo esc_attr($dest['name']); ?>">
                            </div>
                            <div class="destination-info">
                                <h4><?php echo esc_html($dest['name']); ?></h4>
                                <span class="destination-price">From $<?php echo esc_html($dest['price']); ?></span>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </section>
        
        <!-- Recent Posts Widget -->
        <section class="widget widget_recent_entries">
            <h3 class="widget-title"><?php esc_html_e('Travel Tips & News', 'tripbookkar'); ?></h3>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                
                if ($recent_posts) {
                    foreach ($recent_posts as $post) {
                        ?>
                        <li>
                            <a href="<?php echo get_permalink($post['ID']); ?>">
                                <?php echo esc_html($post['post_title']); ?>
                            </a>
                            <span class="post-date"><?php echo get_the_date('M j, Y', $post['ID']); ?></span>
                        </li>
                        <?php
                    }
                } else {
                    // Placeholder posts
                    $placeholder_posts = array(
                        'Best Time to Visit Europe',
                        'Travel Insurance: What You Need to Know',
                        'Top 10 Budget Travel Destinations',
                        'How to Pack Light for Long Trips',
                        'Travel Safety Tips for Solo Travelers'
                    );
                    
                    foreach ($placeholder_posts as $post_title) {
                        ?>
                        <li>
                            <a href="#"><?php echo esc_html($post_title); ?></a>
                            <span class="post-date"><?php echo date('M j, Y'); ?></span>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </section>
        
        <!-- Special Offers Widget -->
        <section class="widget widget_special_offers">
            <h3 class="widget-title"><?php esc_html_e('Special Offers', 'tripbookkar'); ?></h3>
            <div class="special-offers-content">
                <div class="offer-item">
                    <div class="offer-badge"><?php esc_html_e('Save 30%', 'tripbookkar'); ?></div>
                    <h4><?php esc_html_e('Early Bird Special', 'tripbookkar'); ?></h4>
                    <p><?php esc_html_e('Book your summer vacation now and save up to 30% on selected packages.', 'tripbookkar'); ?></p>
                    <a href="<?php echo esc_url(home_url('/packages/')); ?>" class="btn btn-small btn-secondary">
                        <?php esc_html_e('View Offers', 'tripbookkar'); ?>
                    </a>
                </div>
                
                <div class="offer-item">
                    <div class="offer-badge"><?php esc_html_e('Free Upgrade', 'tripbookkar'); ?></div>
                    <h4><?php esc_html_e('Hotel Upgrade', 'tripbookkar'); ?></h4>
                    <p><?php esc_html_e('Book 3+ nights and get a free room upgrade at participating hotels.', 'tripbookkar'); ?></p>
                    <a href="<?php echo esc_url(home_url('/hotels/')); ?>" class="btn btn-small btn-secondary">
                        <?php esc_html_e('Book Hotels', 'tripbookkar'); ?>
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Newsletter Subscription Widget -->
        <section class="widget widget_newsletter">
            <h3 class="widget-title"><?php esc_html_e('Travel Deals Newsletter', 'tripbookkar'); ?></h3>
            <div class="newsletter-content">
                <p><?php esc_html_e('Subscribe to get exclusive travel deals and destination guides delivered to your inbox.', 'tripbookkar'); ?></p>
                
                <form class="newsletter-form sidebar-newsletter" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                    <div class="newsletter-input">
                        <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Your email address', 'tripbookkar'); ?>" required>
                        <button type="submit" class="btn btn-primary btn-small">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </div>
                    <input type="hidden" name="action" value="newsletter_subscribe">
                    <?php wp_nonce_field('newsletter_subscribe', 'newsletter_nonce'); ?>
                    <small class="newsletter-disclaimer">
                        <?php esc_html_e('We respect your privacy. Unsubscribe at any time.', 'tripbookkar'); ?>
                    </small>
                </form>
            </div>
        </section>
        
        <!-- Contact Info Widget -->
        <section class="widget widget_contact_info">
            <h3 class="widget-title"><?php esc_html_e('Need Help?', 'tripbookkar'); ?></h3>
            <div class="contact-info-content">
                <p><?php esc_html_e('Our travel experts are here to help you plan the perfect trip.', 'tripbookkar'); ?></p>
                
                <div class="contact-methods">
                    <?php if (get_option('tripbookkar_phone')) : ?>
                    <div class="contact-method">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <div class="contact-details">
                            <strong><?php esc_html_e('Call Us', 'tripbookkar'); ?></strong>
                            <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_option('tripbookkar_phone'))); ?>">
                                <?php echo esc_html(get_option('tripbookkar_phone')); ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (get_option('tripbookkar_contact_email')) : ?>
                    <div class="contact-method">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <div class="contact-details">
                            <strong><?php esc_html_e('Email Us', 'tripbookkar'); ?></strong>
                            <a href="mailto:<?php echo esc_attr(get_option('tripbookkar_contact_email')); ?>">
                                <?php echo esc_html(get_option('tripbookkar_contact_email')); ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="contact-method">
                        <i class="fas fa-comments" aria-hidden="true"></i>
                        <div class="contact-details">
                            <strong><?php esc_html_e('Live Chat', 'tripbookkar'); ?></strong>
                            <span><?php esc_html_e('Available 24/7', 'tripbookkar'); ?></span>
                        </div>
                    </div>
                </div>
                
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline btn-small">
                    <?php esc_html_e('Contact Us', 'tripbookkar'); ?>
                </a>
            </div>
        </section>
        
    <?php endif; ?>
</aside><!-- #secondary -->

<style>
/* Sidebar Styles */
.sidebar {
    max-width: 350px;
}

.widget {
    background: var(--white);
    border-radius: 10px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-light);
}

.widget-title {
    color: var(--dark-color);
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--primary-color);
    position: relative;
}

.widget-title::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 30px;
    height: 2px;
    background: var(--secondary-color);
}

/* Quick Booking Widget */
.quick-booking-options {
    display: grid;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.quick-booking-link {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    background: var(--light-color);
    border-radius: 6px;
    color: var(--dark-color);
    text-decoration: none;
    transition: all 0.3s ease;
}

.quick-booking-link:hover {
    background: var(--primary-color);
    color: var(--white);
    transform: translateX(5px);
}

.quick-booking-link i {
    margin-right: 0.75rem;
    font-size: 1.1rem;
}

.quick-contact {
    text-align: center;
    padding: 1rem;
    background: var(--gradient-primary);
    border-radius: 6px;
    color: var(--white);
}

.phone-number {
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.1rem;
    font-weight: 600;
    text-decoration: none;
}

.phone-number i {
    margin-right: 0.5rem;
}

/* Popular Destinations Widget */
.popular-destinations-list {
    display: grid;
    gap: 0.75rem;
}

.destination-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.destination-thumbnail {
    flex-shrink: 0;
}

.destination-thumbnail img {
    width: 60px;
    height: 60px;
    border-radius: 6px;
    object-fit: cover;
}

.destination-info h4 {
    margin: 0 0 0.25rem 0;
    font-size: 0.9rem;
}

.destination-info a {
    color: var(--dark-color);
    text-decoration: none;
}

.destination-info a:hover {
    color: var(--primary-color);
}

.destination-price {
    font-size: 0.8rem;
    color: var(--secondary-color);
    font-weight: 600;
}

/* Recent Posts Widget */
.widget_recent_entries ul {
    list-style: none;
}

.widget_recent_entries li {
    margin-bottom: 0.75rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--light-color);
}

.widget_recent_entries li:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.widget_recent_entries a {
    color: var(--dark-color);
    text-decoration: none;
    font-weight: 500;
    display: block;
    margin-bottom: 0.25rem;
}

.widget_recent_entries a:hover {
    color: var(--primary-color);
}

.post-date {
    font-size: 0.8rem;
    color: var(--gray-color);
}

/* Special Offers Widget */
.special-offers-content {
    display: grid;
    gap: 1rem;
}

.offer-item {
    position: relative;
    padding: 1rem;
    background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
    border-radius: 8px;
    color: var(--white);
}

.offer-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: var(--accent-color);
    color: var(--white);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 600;
}

.offer-item h4 {
    color: var(--white);
    margin-bottom: 0.5rem;
}

.offer-item p {
    font-size: 0.9rem;
    margin-bottom: 1rem;
    opacity: 0.9;
}

/* Newsletter Widget */
.newsletter-input {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

.newsletter-input input {
    flex: 1;
    padding: 0.5rem;
    border: 1px solid var(--light-color);
    border-radius: 4px;
    font-size: 0.9rem;
}

.newsletter-input button {
    padding: 0.5rem;
    width: 40px;
}

.newsletter-disclaimer {
    font-size: 0.75rem;
    color: var(--gray-color);
    line-height: 1.4;
}

/* Contact Info Widget */
.contact-methods {
    display: grid;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.contact-method {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.contact-method i {
    width: 30px;
    height: 30px;
    background: var(--primary-color);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.contact-details strong {
    display: block;
    font-size: 0.9rem;
    margin-bottom: 0.125rem;
}

.contact-details a,
.contact-details span {
    font-size: 0.8rem;
    color: var(--gray-color);
}

.contact-details a {
    text-decoration: none;
}

.contact-details a:hover {
    color: var(--primary-color);
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        max-width: 100%;
        margin-top: 2rem;
    }
    
    .widget {
        padding: 1rem;
    }
    
    .quick-booking-options {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .quick-booking-options {
        grid-template-columns: 1fr;
    }
    
    .newsletter-input {
        flex-direction: column;
    }
    
    .newsletter-input button {
        width: 100%;
    }
}
</style>