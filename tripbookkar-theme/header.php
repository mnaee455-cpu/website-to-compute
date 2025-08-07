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
    <a class="skip-link screen-reader-text" href="#primary"><?php _e('Skip to content', 'tripbookkar'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                        <?php
                    }
                    ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="menu-text"><?php _e('Menu', 'tripbookkar'); ?></span>
                    </button>
                    
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => 'tripbookkar_default_menu',
                    ));
                    ?>
                </nav><!-- #site-navigation -->

                <div class="header-actions">
                    <a href="#" class="btn btn-secondary" id="book-now-btn">
                        <?php _e('Book Now', 'tripbookkar'); ?>
                    </a>
                </div>
            </div><!-- .header-content -->
        </div><!-- .container -->
    </header><!-- #masthead -->

    <?php
    /**
     * Default menu fallback
     */
    function tripbookkar_default_menu() {
        echo '<ul id="primary-menu" class="menu">';
        echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'tripbookkar') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/flights/')) . '">' . __('Flights', 'tripbookkar') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/hotels/')) . '">' . __('Hotels', 'tripbookkar') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/packages/')) . '">' . __('Packages', 'tripbookkar') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/destinations/')) . '">' . __('Destinations', 'tripbookkar') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . __('Contact', 'tripbookkar') . '</a></li>';
        echo '</ul>';
    }
    ?>