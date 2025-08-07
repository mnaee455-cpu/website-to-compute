    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php _e('Quick Links', 'tripbookkar'); ?></h3>
                    <?php
                    if (is_active_sidebar('footer-1')) {
                        dynamic_sidebar('footer-1');
                    } else {
                        echo '<ul>';
                        echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . __('About Us', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/flights/')) . '">' . __('Flights', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/hotels/')) . '">' . __('Hotels', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/packages/')) . '">' . __('Holiday Packages', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/destinations/')) . '">' . __('Destinations', 'tripbookkar') . '</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>

                <div class="footer-section">
                    <h3><?php _e('Support', 'tripbookkar'); ?></h3>
                    <?php
                    if (is_active_sidebar('footer-2')) {
                        dynamic_sidebar('footer-2');
                    } else {
                        echo '<ul>';
                        echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . __('Contact Us', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/faq/')) . '">' . __('FAQ', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/cancellation-policy/')) . '">' . __('Cancellation Policy', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/terms/')) . '">' . __('Terms & Conditions', 'tripbookkar') . '</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/privacy/')) . '">' . __('Privacy Policy', 'tripbookkar') . '</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>

                <div class="footer-section">
                    <h3><?php _e('Contact Info', 'tripbookkar'); ?></h3>
                    <?php
                    if (is_active_sidebar('footer-3')) {
                        dynamic_sidebar('footer-3');
                    } else {
                        echo '<div class="contact-info">';
                        echo '<p><strong>' . __('Phone:', 'tripbookkar') . '</strong> +1-800-TRIP-KAR</p>';
                        echo '<p><strong>' . __('Email:', 'tripbookkar') . '</strong> info@tripbookkar.com</p>';
                        echo '<p><strong>' . __('Address:', 'tripbookkar') . '</strong> 123 Travel Street, Adventure City, AC 12345</p>';
                        echo '</div>';
                    }
                    ?>
                </div>

                <div class="footer-section">
                    <h3><?php _e('Follow Us', 'tripbookkar'); ?></h3>
                    <div class="social-links">
                        <a href="#" class="social-link facebook" aria-label="<?php _e('Facebook', 'tripbookkar'); ?>">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link twitter" aria-label="<?php _e('Twitter', 'tripbookkar'); ?>">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link instagram" aria-label="<?php _e('Instagram', 'tripbookkar'); ?>">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link youtube" aria-label="<?php _e('YouTube', 'tripbookkar'); ?>">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    
                    <div class="newsletter-signup">
                        <h4><?php _e('Newsletter', 'tripbookkar'); ?></h4>
                        <form class="newsletter-form" action="#" method="post">
                            <input type="email" placeholder="<?php _e('Your email address', 'tripbookkar'); ?>" required>
                            <button type="submit" class="btn btn-secondary">
                                <?php _e('Subscribe', 'tripbookkar'); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div><!-- .footer-content -->

            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'tripbookkar'); ?></p>
                    </div>
                    
                    <div class="payment-methods">
                        <span><?php _e('We Accept:', 'tripbookkar'); ?></span>
                        <div class="payment-icons">
                            <i class="fab fa-cc-visa"></i>
                            <i class="fab fa-cc-mastercard"></i>
                            <i class="fab fa-cc-amex"></i>
                            <i class="fab fa-cc-paypal"></i>
                        </div>
                    </div>
                </div>
            </div><!-- .footer-bottom -->
        </div><!-- .container -->
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<style>
/* Additional Footer Styles */
.social-links {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #3498db;
    color: white;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
}

.social-link.facebook { background: #3b5998; }
.social-link.twitter { background: #1da1f2; }
.social-link.instagram { background: #e4405f; }
.social-link.youtube { background: #ff0000; }

.newsletter-form {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.newsletter-form input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.newsletter-form button {
    padding: 10px 20px;
    font-size: 14px;
    white-space: nowrap;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.payment-methods {
    display: flex;
    align-items: center;
    gap: 10px;
}

.payment-icons {
    display: flex;
    gap: 8px;
}

.payment-icons i {
    font-size: 24px;
    color: #bdc3c7;
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }
    
    .newsletter-form {
        flex-direction: column;
    }
}

@media (max-width: 480px) {
    .footer-content {
        grid-template-columns: 1fr;
    }
}
</style>

</body>
</html>