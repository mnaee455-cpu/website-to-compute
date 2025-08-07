<?php
/**
 * Single Destinations Template
 * 
 * @package TripBookKar
 */

get_header();

while (have_posts()) :
    the_post();
    
    // Get destination meta data
    $destination_country = get_post_meta(get_the_ID(), '_destination_country', true);
    $destination_continent = get_post_meta(get_the_ID(), '_destination_continent', true);
    $best_time_to_visit = get_post_meta(get_the_ID(), '_best_time_to_visit', true);
    $average_cost = get_post_meta(get_the_ID(), '_average_cost', true);
    $currency = get_post_meta(get_the_ID(), '_currency', true);
    $language = get_post_meta(get_the_ID(), '_language', true);
    $time_zone = get_post_meta(get_the_ID(), '_time_zone', true);
    $highlights = get_post_meta(get_the_ID(), '_highlights', true);
    $hero_image = get_post_meta(get_the_ID(), '_hero_image', true);
    $gallery_images = get_post_meta(get_the_ID(), '_gallery_images', true);
    $weather_info = get_post_meta(get_the_ID(), '_weather_info', true);
    
    // Default values if not set
    if (!$hero_image) {
        $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    }
    if (!$highlights) {
        $highlights = array();
    }
?>

<main id="primary" class="site-main destination-page">
    
    <!-- Destination Hero Section -->
    <section class="destination-hero" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo $hero_image ?: 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=1200'; ?>') center/cover; padding: 120px 0; margin-top: 80px; color: white; text-align: center;">
        <div class="container">
            <div class="hero-content">
                <h1 style="font-size: 3.5rem; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.7);"><?php the_title(); ?></h1>
                <?php if ($destination_country) : ?>
                    <h2 style="font-size: 1.5rem; margin-bottom: 30px; opacity: 0.9; font-weight: normal;"><?php echo $destination_country; ?></h2>
                <?php endif; ?>
                <div class="hero-stats" style="display: flex; justify-content: center; gap: 40px; margin-bottom: 30px; flex-wrap: wrap;">
                    <?php if ($best_time_to_visit) : ?>
                        <div class="stat-item" style="text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 5px;">🌤️</div>
                            <div style="font-size: 0.9rem; opacity: 0.8;">Best Time</div>
                            <div style="font-weight: bold;"><?php echo $best_time_to_visit; ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if ($average_cost) : ?>
                        <div class="stat-item" style="text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 5px;">💰</div>
                            <div style="font-size: 0.9rem; opacity: 0.8;">Average Cost</div>
                            <div style="font-weight: bold;">$<?php echo $average_cost; ?>/day</div>
                        </div>
                    <?php endif; ?>
                    <?php if ($language) : ?>
                        <div class="stat-item" style="text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 5px;">🗣️</div>
                            <div style="font-size: 0.9rem; opacity: 0.8;">Language</div>
                            <div style="font-weight: bold;"><?php echo $language; ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if ($currency) : ?>
                        <div class="stat-item" style="text-align: center;">
                            <div style="font-size: 2rem; margin-bottom: 5px;">💳</div>
                            <div style="font-size: 0.9rem; opacity: 0.8;">Currency</div>
                            <div style="font-weight: bold;"><?php echo $currency; ?></div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="hero-actions" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                    <a href="#book-trip" class="btn-primary" style="background: #e74c3c; color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block;">🧳 Book a Trip</a>
                    <a href="#flights" class="btn-secondary" style="background: rgba(255,255,255,0.2); color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block; border: 2px solid white;">✈️ Find Flights</a>
                    <a href="#hotels" class="btn-secondary" style="background: rgba(255,255,255,0.2); color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block; border: 2px solid white;">🏨 Find Hotels</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Info Bar -->
    <section class="quick-info-bar" style="background: #34495e; color: white; padding: 20px 0;">
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col-8">
                    <div style="display: flex; gap: 30px; flex-wrap: wrap;">
                        <?php if ($time_zone) : ?>
                            <div><strong>Time Zone:</strong> <?php echo $time_zone; ?></div>
                        <?php endif; ?>
                        <?php if ($destination_continent) : ?>
                            <div><strong>Continent:</strong> <?php echo $destination_continent; ?></div>
                        <?php endif; ?>
                        <div><strong>Updated:</strong> <?php echo get_the_modified_date(); ?></div>
                    </div>
                </div>
                <div class="col-4" style="text-align: right;">
                    <div class="social-share">
                        <strong>Share:</strong>
                        <a href="#" style="color: white; margin-left: 10px;">📘</a>
                        <a href="#" style="color: white; margin-left: 10px;">🐦</a>
                        <a href="#" style="color: white; margin-left: 10px;">📧</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="destination-content" style="padding: 60px 0;">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <!-- Overview -->
                    <div class="content-section" style="margin-bottom: 50px;">
                        <h2 style="color: #2c3e50; margin-bottom: 25px; font-size: 2rem;">Overview</h2>
                        <div style="font-size: 1.1rem; line-height: 1.8; color: #555;">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <!-- Top Attractions -->
                    <?php if (!empty($highlights)) : ?>
                    <div class="content-section" style="margin-bottom: 50px;">
                        <h2 style="color: #2c3e50; margin-bottom: 25px; font-size: 2rem;">Top Attractions</h2>
                        <div class="attractions-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                            <?php foreach ($highlights as $highlight) : ?>
                            <div class="attraction-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                <div style="padding: 20px;">
                                    <h4 style="color: #2c3e50; margin-bottom: 10px;"><?php echo $highlight['name']; ?></h4>
                                    <p style="color: #666; margin-bottom: 15px;"><?php echo $highlight['description']; ?></p>
                                    <?php if (isset($highlight['rating'])) : ?>
                                        <div class="rating" style="display: flex; align-items: center;">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <span style="color: <?php echo $i <= $highlight['rating'] ? '#f39c12' : '#ddd'; ?>;">★</span>
                                            <?php endfor; ?>
                                            <span style="margin-left: 5px; color: #666;"><?php echo $highlight['rating']; ?>/5</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Weather Information -->
                    <?php if ($weather_info) : ?>
                    <div class="content-section" style="margin-bottom: 50px;">
                        <h2 style="color: #2c3e50; margin-bottom: 25px; font-size: 2rem;">Climate & Weather</h2>
                        <div style="background: #f8f9fa; padding: 30px; border-radius: 10px;">
                            <?php echo $weather_info; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Photo Gallery -->
                    <?php if ($gallery_images && is_array($gallery_images)) : ?>
                    <div class="content-section" style="margin-bottom: 50px;">
                        <h2 style="color: #2c3e50; margin-bottom: 25px; font-size: 2rem;">Photo Gallery</h2>
                        <div class="photo-gallery" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px;">
                            <?php foreach ($gallery_images as $image) : ?>
                                <div class="gallery-item" style="border-radius: 10px; overflow: hidden; aspect-ratio: 4/3;">
                                    <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Travel Tips -->
                    <div class="content-section" style="margin-bottom: 50px;">
                        <h2 style="color: #2c3e50; margin-bottom: 25px; font-size: 2rem;">Travel Tips</h2>
                        <div class="tips-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                            <div class="tip-card" style="background: #e8f5e8; padding: 20px; border-radius: 10px; border-left: 4px solid #27ae60;">
                                <h4 style="color: #27ae60; margin-bottom: 10px;">💡 Best Time to Visit</h4>
                                <p><?php echo $best_time_to_visit ?: 'Year-round destination with something for every season.'; ?></p>
                            </div>
                            <div class="tip-card" style="background: #fff3cd; padding: 20px; border-radius: 10px; border-left: 4px solid #ffc107;">
                                <h4 style="color: #856404; margin-bottom: 10px;">💰 Budget Planning</h4>
                                <p>Average daily budget: $<?php echo $average_cost ?: '100-200'; ?> including accommodation, meals, and activities.</p>
                            </div>
                            <div class="tip-card" style="background: #d4edda; padding: 20px; border-radius: 10px; border-left: 4px solid #28a745;">
                                <h4 style="color: #155724; margin-bottom: 10px;">🗣️ Language</h4>
                                <p>Local language: <?php echo $language ?: 'English widely spoken'; ?>. Learning basic phrases enhances your experience.</p>
                            </div>
                            <div class="tip-card" style="background: #cce5ff; padding: 20px; border-radius: 10px; border-left: 4px solid #007bff;">
                                <h4 style="color: #004085; margin-bottom: 10px;">📱 Connectivity</h4>
                                <p>Good internet connectivity available. Consider local SIM cards for better rates.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-4">
                    <!-- Quick Booking Widget -->
                    <div class="sidebar-widget" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <h3 style="color: #2c3e50; margin-bottom: 20px; text-align: center;">Book Your Trip</h3>
                        
                        <!-- Tab Navigation -->
                        <div class="booking-tabs" style="display: flex; margin-bottom: 20px; border-radius: 10px; overflow: hidden;">
                            <button class="booking-tab active" data-tab="packages" style="flex: 1; padding: 10px; border: none; background: #e74c3c; color: white; cursor: pointer;">Packages</button>
                            <button class="booking-tab" data-tab="flights" style="flex: 1; padding: 10px; border: none; background: #ecf0f1; color: #333; cursor: pointer;">Flights</button>
                            <button class="booking-tab" data-tab="hotels" style="flex: 1; padding: 10px; border: none; background: #ecf0f1; color: #333; cursor: pointer;">Hotels</button>
                        </div>

                        <!-- Package Search -->
                        <div id="packages-tab" class="booking-tab-content active">
                            <form class="quick-booking-form">
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Duration</label>
                                    <select style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        <option>3-5 Days</option>
                                        <option>6-10 Days</option>
                                        <option>11-15 Days</option>
                                        <option>15+ Days</option>
                                    </select>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Travelers</label>
                                    <select style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        <option>1 Traveler</option>
                                        <option>2 Travelers</option>
                                        <option>3-4 Travelers</option>
                                        <option>5+ Travelers</option>
                                    </select>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Departure Date</label>
                                    <input type="date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <button type="submit" style="width: 100%; background: #e74c3c; color: white; padding: 12px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Find Packages</button>
                            </form>
                        </div>

                        <!-- Flight Search -->
                        <div id="flights-tab" class="booking-tab-content" style="display: none;">
                            <form class="quick-booking-form">
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">From</label>
                                    <input type="text" placeholder="Your city" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Departure</label>
                                    <input type="date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Return</label>
                                    <input type="date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <button type="submit" style="width: 100%; background: #3498db; color: white; padding: 12px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Search Flights</button>
                            </form>
                        </div>

                        <!-- Hotel Search -->
                        <div id="hotels-tab" class="booking-tab-content" style="display: none;">
                            <form class="quick-booking-form">
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Check In</label>
                                    <input type="date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Check Out</label>
                                    <input type="date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 5px; font-weight: bold;">Guests</label>
                                    <select style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        <option>1 Guest</option>
                                        <option>2 Guests</option>
                                        <option>3 Guests</option>
                                        <option>4+ Guests</option>
                                    </select>
                                </div>
                                <button type="submit" style="width: 100%; background: #27ae60; color: white; padding: 12px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Find Hotels</button>
                            </form>
                        </div>
                    </div>

                    <!-- Popular Packages Widget -->
                    <div class="sidebar-widget" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <h3 style="color: #2c3e50; margin-bottom: 20px;">Popular Packages</h3>
                        
                        <?php
                        // Demo popular packages for this destination
                        $popular_packages = array(
                            array('name' => '5-Day Explorer', 'price' => 599, 'rating' => 4.8),
                            array('name' => '7-Day Adventure', 'price' => 899, 'rating' => 4.9),
                            array('name' => '10-Day Luxury', 'price' => 1499, 'rating' => 4.7)
                        );
                        
                        foreach ($popular_packages as $package) :
                        ?>
                        <div class="package-item" style="border-bottom: 1px solid #eee; padding: 15px 0;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <h4 style="margin: 0 0 5px 0; color: #333;"><?php echo $package['name']; ?></h4>
                                    <div class="rating" style="display: flex; align-items: center;">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <span style="color: <?php echo $i <= $package['rating'] ? '#f39c12' : '#ddd'; ?>; font-size: 0.8rem;">★</span>
                                        <?php endfor; ?>
                                        <span style="margin-left: 5px; color: #666; font-size: 0.8rem;"><?php echo $package['rating']; ?></span>
                                    </div>
                                </div>
                                <div style="text-align: right;">
                                    <div style="font-weight: bold; color: #e74c3c;">$<?php echo $package['price']; ?></div>
                                    <button style="background: #e74c3c; color: white; border: none; padding: 5px 10px; border-radius: 3px; font-size: 0.8rem; cursor: pointer;">Book</button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Weather Widget -->
                    <div class="sidebar-widget" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <h3 style="color: #2c3e50; margin-bottom: 20px;">Current Weather</h3>
                        <div style="text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 10px;">☀️</div>
                            <div style="font-size: 2rem; font-weight: bold; color: #e74c3c;">24°C</div>
                            <div style="color: #666; margin-bottom: 15px;">Sunny</div>
                            <div style="font-size: 0.9rem; color: #666;">
                                High: 28°C • Low: 18°C<br>
                                Humidity: 65% • Wind: 10 km/h
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Destinations -->
    <section class="related-destinations" style="background: #f8f9fa; padding: 60px 0;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 40px; color: #2c3e50;">Explore Similar Destinations</h2>
            <div class="row">
                <?php
                // Get related destinations (you would customize this query)
                $related_destinations = get_posts(array(
                    'post_type' => 'destinations',
                    'posts_per_page' => 4,
                    'exclude' => array(get_the_ID()),
                    'meta_query' => array(
                        array(
                            'key' => '_destination_continent',
                            'value' => $destination_continent,
                            'compare' => '='
                        )
                    )
                ));

                if (empty($related_destinations)) {
                    // Fallback to recent destinations
                    $related_destinations = get_posts(array(
                        'post_type' => 'destinations',
                        'posts_per_page' => 4,
                        'exclude' => array(get_the_ID())
                    ));
                }

                foreach ($related_destinations as $destination) :
                    $dest_image = get_the_post_thumbnail_url($destination->ID, 'medium') ?: 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400';
                    $dest_country = get_post_meta($destination->ID, '_destination_country', true);
                ?>
                <div class="col-3">
                    <div class="destination-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="<?php echo $dest_image; ?>" alt="<?php echo $destination->post_title; ?>" style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 20px;">
                            <h3 style="margin: 0 0 5px 0; color: #333;"><?php echo $destination->post_title; ?></h3>
                            <?php if ($dest_country) : ?>
                                <p style="color: #666; margin: 0 0 15px 0;"><?php echo $dest_country; ?></p>
                            <?php endif; ?>
                            <a href="<?php echo get_permalink($destination->ID); ?>" style="color: #e74c3c; text-decoration: none; font-weight: bold;">Explore →</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<script>
jQuery(document).ready(function($) {
    // Booking tabs functionality
    $('.booking-tab').click(function() {
        var tabId = $(this).data('tab');
        
        // Update tab styles
        $('.booking-tab').removeClass('active').css({
            'background': '#ecf0f1',
            'color': '#333'
        });
        $(this).addClass('active').css({
            'background': '#e74c3c',
            'color': 'white'
        });
        
        // Show/hide tab content
        $('.booking-tab-content').hide();
        $('#' + tabId + '-tab').show();
    });
    
    // Quick booking form submissions
    $('.quick-booking-form').on('submit', function(e) {
        e.preventDefault();
        var formType = $(this).closest('.booking-tab-content').attr('id').replace('-tab', '');
        alert('Redirecting to ' + formType + ' search page with your criteria...');
        // In real implementation, this would redirect to the appropriate search page with parameters
    });
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $($(this).attr('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 500);
        }
    });
});
</script>

<?php
endwhile;
get_footer();
?>