    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-section footer-about">
                        <div class="footer-logo">
                            <?php
                            if (has_custom_logo()) {
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                            } else {
                                ?>
                                <div class="site-logo-footer">
                                    <i class="fas fa-plane" aria-hidden="true"></i>
                                    <span class="site-title"><?php bloginfo('name'); ?></span>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <p class="footer-description">
                            <?php 
                            $footer_description = get_theme_mod('footer_description', 
                                esc_html__('Your trusted travel partner for amazing destinations, affordable flights, luxury hotels, and unforgettable holiday packages.', 'tripbookkar')
                            );
                            echo esc_html($footer_description);
                            ?>
                        </p>
                        
                        <?php if (get_option('tripbookkar_contact_email') || get_option('tripbookkar_phone')) : ?>
                        <div class="footer-contact">
                            <?php if (get_option('tripbookkar_contact_email')) : ?>
                            <div class="contact-item">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:<?php echo esc_attr(get_option('tripbookkar_contact_email')); ?>">
                                    <?php echo esc_html(get_option('tripbookkar_contact_email')); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (get_option('tripbookkar_phone')) : ?>
                            <div class="contact-item">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_option('tripbookkar_phone'))); ?>">
                                    <?php echo esc_html(get_option('tripbookkar_phone')); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <!-- Social Media Links -->
                        <div class="social-links">
                            <?php
                            $social_links = array(
                                'facebook' => get_theme_mod('facebook_url', ''),
                                'twitter' => get_theme_mod('twitter_url', ''),
                                'instagram' => get_theme_mod('instagram_url', ''),
                                'youtube' => get_theme_mod('youtube_url', ''),
                                'linkedin' => get_theme_mod('linkedin_url', ''),
                            );
                            
                            foreach ($social_links as $platform => $url) {
                                if (!empty($url)) {
                                    echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" aria-label="' . 
                                         esc_attr(ucfirst($platform)) . '">';
                                    echo '<i class="fab fa-' . esc_attr($platform) . '" aria-hidden="true"></i>';
                                    echo '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="footer-section footer-links">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <?php dynamic_sidebar('footer-1'); ?>
                        <?php else : ?>
                            <h4><?php esc_html_e('Quick Links', 'tripbookkar'); ?></h4>
                            <ul>
                                <li><a href="<?php echo esc_url(home_url('/destinations/')); ?>"><?php esc_html_e('Destinations', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/packages/')); ?>"><?php esc_html_e('Holiday Packages', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/flights/')); ?>"><?php esc_html_e('Flights', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/hotels/')); ?>"><?php esc_html_e('Hotels', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About Us', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact', 'tripbookkar'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="footer-section footer-services">
                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <?php dynamic_sidebar('footer-2'); ?>
                        <?php else : ?>
                            <h4><?php esc_html_e('Our Services', 'tripbookkar'); ?></h4>
                            <ul>
                                <li><a href="<?php echo esc_url(home_url('/flights/')); ?>"><?php esc_html_e('Flight Booking', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/hotels/')); ?>"><?php esc_html_e('Hotel Reservation', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/packages/')); ?>"><?php esc_html_e('Tour Packages', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/car-rental/')); ?>"><?php esc_html_e('Car Rental', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/travel-insurance/')); ?>"><?php esc_html_e('Travel Insurance', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/visa-assistance/')); ?>"><?php esc_html_e('Visa Assistance', 'tripbookkar'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="footer-section footer-destinations">
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <?php dynamic_sidebar('footer-3'); ?>
                        <?php else : ?>
                            <h4><?php esc_html_e('Popular Destinations', 'tripbookkar'); ?></h4>
                            <ul>
                                <li><a href="<?php echo esc_url(home_url('/destination/paris/')); ?>"><?php esc_html_e('Paris, France', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/destination/tokyo/')); ?>"><?php esc_html_e('Tokyo, Japan', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/destination/new-york/')); ?>"><?php esc_html_e('New York, USA', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/destination/london/')); ?>"><?php esc_html_e('London, UK', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/destination/dubai/')); ?>"><?php esc_html_e('Dubai, UAE', 'tripbookkar'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/destination/sydney/')); ?>"><?php esc_html_e('Sydney, Australia', 'tripbookkar'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="footer-section footer-newsletter">
                        <?php if (is_active_sidebar('footer-4')) : ?>
                            <?php dynamic_sidebar('footer-4'); ?>
                        <?php else : ?>
                            <h4><?php esc_html_e('Stay Updated', 'tripbookkar'); ?></h4>
                            <p><?php esc_html_e('Subscribe to our newsletter for the latest travel deals and destinations.', 'tripbookkar'); ?></p>
                            <form class="newsletter-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                                <div class="newsletter-input">
                                    <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Your email address', 'tripbookkar'); ?>" required>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                        <?php esc_html_e('Subscribe', 'tripbookkar'); ?>
                                    </button>
                                </div>
                                <input type="hidden" name="action" value="newsletter_subscribe">
                                <?php wp_nonce_field('newsletter_subscribe', 'newsletter_nonce'); ?>
                            </form>
                            
                            <!-- Trust Badges -->
                            <div class="trust-badges">
                                <div class="trust-badge">
                                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                                    <span><?php esc_html_e('Secure Booking', 'tripbookkar'); ?></span>
                                </div>
                                <div class="trust-badge">
                                    <i class="fas fa-headset" aria-hidden="true"></i>
                                    <span><?php esc_html_e('24/7 Support', 'tripbookkar'); ?></span>
                                </div>
                                <div class="trust-badge">
                                    <i class="fas fa-award" aria-hidden="true"></i>
                                    <span><?php esc_html_e('Best Prices', 'tripbookkar'); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div><!-- .footer-content -->
            </div><!-- .container -->
        </div><!-- .footer-top -->

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        <p>
                            &copy; <?php echo date('Y'); ?> 
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. 
                            <?php esc_html_e('All rights reserved.', 'tripbookkar'); ?>
                        </p>
                    </div>
                    
                    <div class="footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                            'menu_class'     => 'footer-menu-list',
                            'depth'          => 1,
                            'fallback_cb'    => 'tripbookkar_footer_menu_fallback',
                        ));
                        ?>
                    </div>

                    <div class="payment-methods">
                        <span class="payment-text"><?php esc_html_e('We Accept:', 'tripbookkar'); ?></span>
                        <div class="payment-icons">
                            <i class="fab fa-cc-visa" aria-hidden="true" title="Visa"></i>
                            <i class="fab fa-cc-mastercard" aria-hidden="true" title="Mastercard"></i>
                            <i class="fab fa-cc-paypal" aria-hidden="true" title="PayPal"></i>
                            <i class="fab fa-cc-amex" aria-hidden="true" title="American Express"></i>
                            <i class="fas fa-credit-card" aria-hidden="true" title="Credit Cards"></i>
                        </div>
                    </div>
                </div><!-- .footer-bottom-content -->
            </div><!-- .container -->
        </div><!-- .footer-bottom -->
    </footer><!-- #colophon -->

    <!-- Back to Top Button -->
    <button class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'tripbookkar'); ?>">
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-content">
            <div class="preloader-logo">
                <i class="fas fa-plane" aria-hidden="true"></i>
                <span><?php bloginfo('name'); ?></span>
            </div>
            <div class="preloader-spinner">
                <div class="spinner"></div>
            </div>
        </div>
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>

<script>
// Additional footer scripts
jQuery(document).ready(function($) {
    // Newsletter form submission
    $('.newsletter-form').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $button = $form.find('button[type="submit"]');
        const $input = $form.find('input[type="email"]');
        const email = $input.val();
        
        if (!email) {
            alert('<?php esc_html_e("Please enter your email address.", "tripbookkar"); ?>');
            return;
        }
        
        // Show loading state
        $button.html('<i class="fas fa-spinner fa-spin"></i> <?php esc_html_e("Subscribing...", "tripbookkar"); ?>');
        
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            success: function(response) {
                if (response.success) {
                    alert('<?php esc_html_e("Thank you for subscribing!", "tripbookkar"); ?>');
                    $input.val('');
                } else {
                    alert(response.data || '<?php esc_html_e("Subscription failed. Please try again.", "tripbookkar"); ?>');
                }
            },
            error: function() {
                alert('<?php esc_html_e("Subscription failed. Please try again.", "tripbookkar"); ?>');
            },
            complete: function() {
                $button.html('<i class="fas fa-paper-plane"></i> <?php esc_html_e("Subscribe", "tripbookkar"); ?>');
            }
        });
    });
    
    // Search toggle functionality
    $('.search-toggle').on('click', function() {
        $('.mobile-search-overlay').addClass('active');
        $('.mobile-search-form input').focus();
    });
    
    $('.search-close').on('click', function() {
        $('.mobile-search-overlay').removeClass('active');
    });
    
    // Close search overlay when clicking outside
    $('.mobile-search-overlay').on('click', function(e) {
        if ($(e.target).is('.mobile-search-overlay')) {
            $(this).removeClass('active');
        }
    });
});
</script>

</body>
</html>

<?php
/**
 * Footer menu fallback
 */
function tripbookkar_footer_menu_fallback() {
    echo '<ul id="footer-menu" class="footer-menu-list">';
    echo '<li><a href="' . esc_url(home_url('/privacy-policy/')) . '">' . esc_html__('Privacy Policy', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/terms-conditions/')) . '">' . esc_html__('Terms & Conditions', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/refund-policy/')) . '">' . esc_html__('Refund Policy', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/sitemap/')) . '">' . esc_html__('Sitemap', 'tripbookkar') . '</a></li>';
    echo '</ul>';
}
?>