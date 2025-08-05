<?php
/**
 * The sidebar containing the main widget area
 *
 * @package TripBookKar
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
        <div class="widget search-widget">
            <h3 class="widget-title"><?php _e('Search Destinations', 'tripbookkar'); ?></h3>
            <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" name="s" placeholder="<?php _e('Search destinations...', 'tripbookkar'); ?>" value="<?php echo get_search_query(); ?>" required>
                <button type="submit" class="search-submit">
                    🔍
                </button>
            </form>
        </div>
        
        <div class="widget quick-booking-widget">
            <h3 class="widget-title"><?php _e('Quick Booking', 'tripbookkar'); ?></h3>
            <div class="quick-booking-links">
                <a href="<?php echo esc_url(home_url('/flights/')); ?>" class="quick-link">
                    ✈️ <?php _e('Book Flights', 'tripbookkar'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/hotels/')); ?>" class="quick-link">
                    🏨 <?php _e('Book Hotels', 'tripbookkar'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/packages/')); ?>" class="quick-link">
                    🧳 <?php _e('Holiday Packages', 'tripbookkar'); ?>
                </a>
            </div>
        </div>
        
        <div class="widget popular-destinations-widget">
            <h3 class="widget-title"><?php _e('Popular Destinations', 'tripbookkar'); ?></h3>
            <ul class="popular-destinations">
                <li><a href="#">🗼 Paris, France</a></li>
                <li><a href="#">🏯 Tokyo, Japan</a></li>
                <li><a href="#">🗽 New York, USA</a></li>
                <li><a href="#">🏝️ Bali, Indonesia</a></li>
                <li><a href="#">🏰 London, UK</a></li>
                <li><a href="#">🕌 Dubai, UAE</a></li>
            </ul>
        </div>
        
        <div class="widget newsletter-widget">
            <h3 class="widget-title"><?php _e('Travel Newsletter', 'tripbookkar'); ?></h3>
            <p><?php _e('Get the latest travel deals and destination guides delivered to your inbox.', 'tripbookkar'); ?></p>
            <form class="newsletter-form" method="post" action="#">
                <input type="email" name="email" placeholder="<?php _e('Your email address', 'tripbookkar'); ?>" required>
                <button type="submit" class="btn btn-secondary">
                    <?php _e('Subscribe', 'tripbookkar'); ?>
                </button>
            </form>
        </div>
        
        <div class="widget contact-widget">
            <h3 class="widget-title"><?php _e('Need Help?', 'tripbookkar'); ?></h3>
            <div class="contact-info">
                <p><strong>📞 <?php _e('Call Us:', 'tripbookkar'); ?></strong><br>
                +1-800-TRIP-KAR</p>
                <p><strong>✉️ <?php _e('Email:', 'tripbookkar'); ?></strong><br>
                info@tripbookkar.com</p>
                <p><strong>🕐 <?php _e('Support Hours:', 'tripbookkar'); ?></strong><br>
                24/7 Customer Support</p>
            </div>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary">
                <?php _e('Contact Us', 'tripbookkar'); ?>
            </a>
        </div>
        
        <div class="widget recent-reviews-widget">
            <h3 class="widget-title"><?php _e('Recent Reviews', 'tripbookkar'); ?></h3>
            <div class="recent-reviews">
                <div class="review-item">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <p>"Amazing service! Best travel experience ever."</p>
                    <small>- Sarah J.</small>
                </div>
                <div class="review-item">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <p>"Great deals on flights and hotels. Highly recommended!"</p>
                    <small>- Mike C.</small>
                </div>
                <div class="review-item">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <p>"Professional team, seamless booking process."</p>
                    <small>- Emma R.</small>
                </div>
            </div>
        </div>
        
    <?php endif; ?>
</aside><!-- #secondary -->

<style>
.sidebar {
    padding-left: 40px;
}

.widget {
    background: white;
    padding: 30px;
    margin-bottom: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.widget:hover {
    transform: translateY(-2px);
}

.widget-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #e74c3c;
}

/* Search Widget */
.search-form {
    display: flex;
    gap: 10px;
}

.search-form input {
    flex: 1;
    padding: 12px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 14px;
}

.search-form input:focus {
    outline: none;
    border-color: #e74c3c;
}

.search-submit {
    background: #e74c3c;
    color: white;
    border: none;
    padding: 12px 15px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
}

.search-submit:hover {
    background: #c0392b;
}

/* Quick Booking Widget */
.quick-booking-links {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.quick-link {
    display: block;
    padding: 15px;
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    text-align: center;
    font-weight: 600;
    transition: all 0.3s ease;
}

.quick-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
    color: white;
}

/* Popular Destinations */
.popular-destinations {
    list-style: none;
    padding: 0;
}

.popular-destinations li {
    margin-bottom: 12px;
}

.popular-destinations a {
    color: #666;
    text-decoration: none;
    padding: 8px 0;
    display: block;
    border-bottom: 1px solid #f0f0f0;
    transition: color 0.3s ease;
}

.popular-destinations a:hover {
    color: #e74c3c;
    padding-left: 10px;
}

/* Newsletter Widget */
.newsletter-form {
    margin-top: 15px;
}

.newsletter-form input {
    width: 100%;
    padding: 12px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 14px;
}

.newsletter-form input:focus {
    outline: none;
    border-color: #e74c3c;
}

.newsletter-form button {
    width: 100%;
    padding: 12px;
    font-size: 14px;
}

/* Contact Widget */
.contact-info {
    margin-bottom: 20px;
}

.contact-info p {
    margin-bottom: 15px;
    line-height: 1.6;
}

/* Recent Reviews */
.review-item {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f0f0f0;
}

.review-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.stars {
    margin-bottom: 8px;
    font-size: 14px;
}

.review-item p {
    font-style: italic;
    margin-bottom: 5px;
    color: #555;
    font-size: 14px;
}

.review-item small {
    color: #666;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        padding-left: 0;
        margin-top: 40px;
    }
    
    .widget {
        padding: 20px;
    }
    
    .search-form {
        flex-direction: column;
    }
    
    .search-submit {
        width: 100%;
    }
}
</style>