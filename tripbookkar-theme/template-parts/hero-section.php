<?php
/**
 * Template part for displaying the hero section
 *
 * @package TripBookKar
 * @version 1.0.0
 */

$hero_title = get_theme_mod('tripbookkar_hero_title', esc_html__('Discover Amazing Places', 'tripbookkar'));
$hero_subtitle = get_theme_mod('tripbookkar_hero_subtitle', esc_html__('Book flights, hotels, and holiday packages at the best prices', 'tripbookkar'));
$hero_bg = get_theme_mod('tripbookkar_hero_bg', '');

$hero_bg_style = '';
if ($hero_bg) {
    $hero_bg_style = 'style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(' . esc_url($hero_bg) . ');"';
} else {
    $hero_bg_style = 'style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80);"';
}
?>

<section class="hero-section" <?php echo $hero_bg_style; ?>>
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            
            <div class="hero-search-form">
                <div class="search-tabs">
                    <button class="search-tab active" data-tab="flights">
                        <i class="fas fa-plane" aria-hidden="true"></i>
                        <?php esc_html_e('Flights', 'tripbookkar'); ?>
                    </button>
                    <button class="search-tab" data-tab="hotels">
                        <i class="fas fa-bed" aria-hidden="true"></i>
                        <?php esc_html_e('Hotels', 'tripbookkar'); ?>
                    </button>
                    <button class="search-tab" data-tab="packages">
                        <i class="fas fa-suitcase" aria-hidden="true"></i>
                        <?php esc_html_e('Packages', 'tripbookkar'); ?>
                    </button>
                </div>
                
                <form id="hero-search-form" class="hero-search-form-element" method="post">
                    <div class="search-form-content">
                        <!-- Flight Search Form (Default) -->
                        <div class="form-group">
                            <label for="flight-from"><?php esc_html_e('From', 'tripbookkar'); ?></label>
                            <input type="text" id="flight-from" name="from" placeholder="<?php esc_attr_e('Departure city', 'tripbookkar'); ?>" required>
                            <i class="fas fa-plane-departure form-icon" aria-hidden="true"></i>
                        </div>
                        
                        <div class="form-group">
                            <label for="flight-to"><?php esc_html_e('To', 'tripbookkar'); ?></label>
                            <input type="text" id="flight-to" name="to" placeholder="<?php esc_attr_e('Destination city', 'tripbookkar'); ?>" required>
                            <i class="fas fa-plane-arrival form-icon" aria-hidden="true"></i>
                        </div>
                        
                        <div class="form-group">
                            <label for="flight-departure"><?php esc_html_e('Departure', 'tripbookkar'); ?></label>
                            <input type="date" id="flight-departure" name="departure" required>
                            <i class="fas fa-calendar form-icon" aria-hidden="true"></i>
                        </div>
                        
                        <div class="form-group">
                            <label for="flight-return"><?php esc_html_e('Return', 'tripbookkar'); ?></label>
                            <input type="date" id="flight-return" name="return">
                            <i class="fas fa-calendar form-icon" aria-hidden="true"></i>
                        </div>
                        
                        <div class="form-group">
                            <label for="flight-passengers"><?php esc_html_e('Passengers', 'tripbookkar'); ?></label>
                            <select id="flight-passengers" name="passengers">
                                <option value="1"><?php esc_html_e('1 Adult', 'tripbookkar'); ?></option>
                                <option value="2"><?php esc_html_e('2 Adults', 'tripbookkar'); ?></option>
                                <option value="3"><?php esc_html_e('3 Adults', 'tripbookkar'); ?></option>
                                <option value="4"><?php esc_html_e('4 Adults', 'tripbookkar'); ?></option>
                                <option value="5"><?php esc_html_e('5+ Adults', 'tripbookkar'); ?></option>
                            </select>
                            <i class="fas fa-users form-icon" aria-hidden="true"></i>
                        </div>
                        
                        <div class="form-group form-group-submit">
                            <button type="submit" class="btn btn-primary btn-large search-submit-btn">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <?php esc_html_e('Search Flights', 'tripbookkar'); ?>
                            </button>
                        </div>
                    </div>
                    
                    <input type="hidden" name="search_type" value="flights">
                    <?php wp_nonce_field('hero_search', 'hero_search_nonce'); ?>
                </form>
            </div>
            
            <!-- Hero Stats -->
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="stat-number" data-count="500">0</div>
                    <div class="stat-label"><?php esc_html_e('Destinations', 'tripbookkar'); ?></div>
                </div>
                <div class="hero-stat">
                    <div class="stat-number" data-count="50000">0</div>
                    <div class="stat-label"><?php esc_html_e('Happy Travelers', 'tripbookkar'); ?></div>
                </div>
                <div class="hero-stat">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-label"><?php esc_html_e('Tour Packages', 'tripbookkar'); ?></div>
                </div>
                <div class="hero-stat">
                    <div class="stat-number" data-count="24">0</div>
                    <div class="stat-label"><?php esc_html_e('24/7 Support', 'tripbookkar'); ?></div>
                </div>
            </div>
            
            <!-- Scroll Down Indicator -->
            <div class="scroll-indicator">
                <a href="#main-content" class="scroll-down-btn">
                    <span><?php esc_html_e('Explore More', 'tripbookkar'); ?></span>
                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Hero Video Background (Optional) -->
    <?php if (get_theme_mod('tripbookkar_hero_video')) : ?>
        <div class="hero-video-background">
            <video autoplay muted loop>
                <source src="<?php echo esc_url(get_theme_mod('tripbookkar_hero_video')); ?>" type="video/mp4">
            </video>
        </div>
    <?php endif; ?>
    
    <!-- Floating Elements for Visual Appeal -->
    <div class="hero-floating-elements">
        <div class="floating-icon floating-icon-1">
            <i class="fas fa-plane" aria-hidden="true"></i>
        </div>
        <div class="floating-icon floating-icon-2">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
        </div>
        <div class="floating-icon floating-icon-3">
            <i class="fas fa-compass" aria-hidden="true"></i>
        </div>
        <div class="floating-icon floating-icon-4">
            <i class="fas fa-globe" aria-hidden="true"></i>
        </div>
    </div>
</section>

<style>
/* Hero Section Styles */
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: var(--white);
    overflow: hidden;
}

.hero-content {
    text-align: center;
    max-width: 1000px;
    margin: 0 auto;
    padding: 2rem;
    position: relative;
    z-index: 2;
}

.hero-title {
    font-size: 4rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    animation: fadeInUp 1s ease;
}

.hero-subtitle {
    font-size: 1.3rem;
    margin-bottom: 3rem;
    opacity: 0.95;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    animation: fadeInUp 1s ease 0.2s both;
}

.hero-search-form {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 2.5rem;
    margin: 3rem auto;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    animation: fadeInUp 1s ease 0.4s both;
    max-width: 900px;
}

.search-tabs {
    display: flex;
    margin-bottom: 2rem;
    background: var(--light-color);
    border-radius: 10px;
    padding: 0.5rem;
}

.search-tab {
    flex: 1;
    padding: 1rem 1.5rem;
    background: transparent;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    color: var(--gray-color);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.search-tab.active {
    background: var(--white);
    color: var(--primary-color);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.search-tab:hover {
    color: var(--primary-color);
}

.search-form-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    align-items: end;
}

.form-group {
    position: relative;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: var(--dark-color);
    font-size: 0.9rem;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid var(--light-color);
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: var(--white);
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.form-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-color);
    margin-top: 0.75rem; /* Account for label */
}

.form-group-submit {
    display: flex;
    align-items: end;
}

.search-submit-btn {
    width: 100%;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.search-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(52, 152, 219, 0.3);
}

/* Hero Stats */
.hero-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 2rem;
    margin: 4rem auto 2rem;
    max-width: 800px;
    animation: fadeInUp 1s ease 0.6s both;
}

.hero-stat {
    text-align: center;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--accent-color);
    margin-bottom: 0.5rem;
    display: block;
}

.stat-label {
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.9;
}

/* Scroll Indicator */
.scroll-indicator {
    margin-top: 3rem;
    animation: fadeInUp 1s ease 0.8s both;
}

.scroll-down-btn {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    color: var(--white);
    text-decoration: none;
    opacity: 0.8;
    transition: all 0.3s ease;
}

.scroll-down-btn:hover {
    opacity: 1;
    transform: translateY(-5px);
}

.scroll-down-btn i {
    animation: bounce 2s infinite;
    font-size: 1.2rem;
}

/* Hero Video Background */
.hero-video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.hero-video-background video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Floating Elements */
.hero-floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.floating-icon {
    position: absolute;
    color: rgba(255, 255, 255, 0.1);
    font-size: 2rem;
    animation: float 6s ease-in-out infinite;
}

.floating-icon-1 {
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.floating-icon-2 {
    top: 30%;
    right: 15%;
    animation-delay: 1.5s;
}

.floating-icon-3 {
    bottom: 30%;
    left: 15%;
    animation-delay: 3s;
}

.floating-icon-4 {
    bottom: 20%;
    right: 10%;
    animation-delay: 4.5s;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    33% {
        transform: translateY(-20px) rotate(120deg);
    }
    66% {
        transform: translateY(10px) rotate(240deg);
    }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .hero-search-form {
        padding: 2rem;
        margin: 2rem auto;
    }
    
    .search-form-content {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }
    
    .hero-search-form {
        padding: 1.5rem;
        margin: 1.5rem auto;
    }
    
    .search-tabs {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .search-tab {
        padding: 0.75rem;
    }
    
    .search-form-content {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .hero-stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin: 2rem auto;
    }
    
    .hero-stat {
        padding: 1rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .floating-icon {
        display: none;
    }
}

@media (max-width: 480px) {
    .hero-section {
        min-height: 100vh;
        background-attachment: scroll;
    }
    
    .hero-content {
        padding: 1rem;
    }
    
    .hero-title {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .hero-search-form {
        padding: 1rem;
    }
    
    .form-group input,
    .form-group select {
        padding: 0.875rem 0.875rem 0.875rem 2.5rem;
        font-size: 0.9rem;
    }
    
    .form-icon {
        left: 0.75rem;
        font-size: 0.9rem;
    }
    
    .search-submit-btn {
        padding: 0.875rem 1.5rem;
        font-size: 1rem;
    }
    
    .hero-stats {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    
    .stat-number {
        font-size: 1.75rem;
    }
    
    .stat-label {
        font-size: 0.8rem;
    }
}

/* High DPI Displays */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .hero-section {
        background-attachment: scroll;
    }
}
</style>