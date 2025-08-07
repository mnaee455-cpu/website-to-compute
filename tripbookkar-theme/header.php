<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'tripbookkar'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <div class="site-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <i class="fas fa-plane" aria-hidden="true"></i>
                                <span class="site-title"><?php bloginfo('name'); ?></span>
                            </a>
                        </div>
                        <?php
                    }
                    
                    $tripbookkar_description = get_bloginfo('description', 'display');
                    if ($tripbookkar_description || is_customize_preview()) {
                        ?>
                        <p class="site-description screen-reader-text"><?php echo $tripbookkar_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php
                    }
                    ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="screen-reader-text"><?php esc_html_e('Primary Menu', 'tripbookkar'); ?></span>
                    </button>
                    
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'primary-menu',
                            'fallback_cb'    => 'tripbookkar_default_menu',
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->

                <div class="header-actions">
                    <div class="header-search">
                        <button class="search-toggle" aria-label="<?php esc_attr_e('Search', 'tripbookkar'); ?>">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                        <div class="search-form-container">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                <label>
                                    <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'tripbookkar'); ?></span>
                                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'tripbookkar'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                                </label>
                                <button type="submit" class="search-submit">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                    <span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'tripbookkar'); ?></span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php if (get_option('tripbookkar_phone')) : ?>
                    <div class="header-contact">
                        <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', get_option('tripbookkar_phone'))); ?>" class="phone-link">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <span class="phone-text">
                                <small><?php esc_html_e('Call Us', 'tripbookkar'); ?></small>
                                <?php echo esc_html(get_option('tripbookkar_phone')); ?>
                            </span>
                        </a>
                    </div>
                    <?php endif; ?>

                    <div class="header-cta">
                        <a href="#booking-form" class="btn btn-primary btn-small">
                            <?php esc_html_e('Book Now', 'tripbookkar'); ?>
                        </a>
                    </div>
                </div><!-- .header-actions -->
            </div><!-- .header-content -->
        </div><!-- .container -->

        <!-- Mobile Search Overlay -->
        <div class="mobile-search-overlay">
            <div class="container">
                <form role="search" method="get" class="mobile-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <label>
                        <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'tripbookkar'); ?></span>
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search destinations, packages...', 'placeholder', 'tripbookkar'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    </label>
                    <button type="submit" class="search-submit">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="search-close">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </header><!-- #masthead -->

    <?php
    // Show hero section only on front page
    if (is_front_page() && !is_paged()) {
        get_template_part('template-parts/hero-section');
    }
    ?>

    <div id="content" class="site-content">

<?php
/**
 * Default menu fallback
 */
function tripbookkar_default_menu() {
    echo '<ul id="primary-menu" class="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/destinations/')) . '">' . esc_html__('Destinations', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/packages/')) . '">' . esc_html__('Packages', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/flights/')) . '">' . esc_html__('Flights', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/hotels/')) . '">' . esc_html__('Hotels', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('About', 'tripbookkar') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('Contact', 'tripbookkar') . '</a></li>';
    echo '</ul>';
}
?>