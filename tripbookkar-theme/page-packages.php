<?php
/**
 * Template Name: Holiday Packages
 * 
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main packages-page">
    
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #27ae60, #229954); padding: 80px 0; margin-top: 80px;">
        <div class="container">
            <div class="page-header-content text-center">
                <h1 style="color: white; font-size: 3rem; margin-bottom: 20px;">🧳 <?php _e('Holiday Packages', 'tripbookkar'); ?></h1>
                <p style="color: white; font-size: 1.2rem; opacity: 0.9;"><?php _e('Discover amazing holiday packages with flights, hotels, and activities included', 'tripbookkar'); ?></p>
            </div>
        </div>
    </section>

    <!-- Package Search Section -->
    <section class="package-search-section" style="background: white; padding: 60px 0; margin-top: -40px; position: relative; z-index: 2;">
        <div class="container">
            <div class="search-form-container" style="box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                <h2 style="text-align: center; margin-bottom: 30px; color: #333;"><?php _e('Find Your Perfect Holiday', 'tripbookkar'); ?></h2>
                
                <form id="package-search-advanced" class="search-form active">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="package-destination"><?php _e('Destination', 'tripbookkar'); ?></label>
                                <input type="text" id="package-destination" name="destination" placeholder="<?php _e('Where do you want to go?', 'tripbookkar'); ?>" required>
                                <div class="autocomplete-suggestions" id="destination-suggestions"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="package-departure"><?php _e('Departure Date', 'tripbookkar'); ?></label>
                                <input type="date" id="package-departure" name="departure" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="package-duration"><?php _e('Duration', 'tripbookkar'); ?></label>
                                <select id="package-duration" name="duration">
                                    <option value=""><?php _e('Any Duration', 'tripbookkar'); ?></option>
                                    <option value="3">3 Days</option>
                                    <option value="5">5 Days</option>
                                    <option value="7">7 Days</option>
                                    <option value="10">10 Days</option>
                                    <option value="14">14 Days</option>
                                    <option value="21">21+ Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="package-travelers"><?php _e('Travelers', 'tripbookkar'); ?></label>
                                <select id="package-travelers" name="travelers">
                                    <option value="1">1 Traveler</option>
                                    <option value="2">2 Travelers</option>
                                    <option value="3">3 Travelers</option>
                                    <option value="4">4 Travelers</option>
                                    <option value="5+">5+ Travelers</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="package-budget"><?php _e('Budget Range', 'tripbookkar'); ?></label>
                                <select id="package-budget" name="budget">
                                    <option value=""><?php _e('Any Budget', 'tripbookkar'); ?></option>
                                    <option value="budget"><?php _e('Budget (Under $500)', 'tripbookkar'); ?></option>
                                    <option value="mid"><?php _e('Mid-range ($500-1500)', 'tripbookkar'); ?></option>
                                    <option value="luxury"><?php _e('Luxury ($1500+)', 'tripbookkar'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-12">
                            <div class="package-filters">
                                <h3><?php _e('Package Type', 'tripbookkar'); ?></h3>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="package-type"><?php _e('Travel Style', 'tripbookkar'); ?></label>
                                            <select id="package-type" name="package_type">
                                                <option value=""><?php _e('Any Style', 'tripbookkar'); ?></option>
                                                <option value="adventure"><?php _e('Adventure', 'tripbookkar'); ?></option>
                                                <option value="luxury"><?php _e('Luxury', 'tripbookkar'); ?></option>
                                                <option value="family"><?php _e('Family', 'tripbookkar'); ?></option>
                                                <option value="romantic"><?php _e('Romantic', 'tripbookkar'); ?></option>
                                                <option value="cultural"><?php _e('Cultural', 'tripbookkar'); ?></option>
                                                <option value="beach"><?php _e('Beach', 'tripbookkar'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="package-includes"><?php _e('Includes', 'tripbookkar'); ?></label>
                                            <select id="package-includes" name="includes">
                                                <option value=""><?php _e('Standard', 'tripbookkar'); ?></option>
                                                <option value="flights"><?php _e('Flights Included', 'tripbookkar'); ?></option>
                                                <option value="meals"><?php _e('Meals Included', 'tripbookkar'); ?></option>
                                                <option value="activities"><?php _e('Activities Included', 'tripbookkar'); ?></option>
                                                <option value="all-inclusive"><?php _e('All Inclusive', 'tripbookkar'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="package-season"><?php _e('Best Season', 'tripbookkar'); ?></label>
                                            <select id="package-season" name="season">
                                                <option value=""><?php _e('Any Season', 'tripbookkar'); ?></option>
                                                <option value="spring"><?php _e('Spring', 'tripbookkar'); ?></option>
                                                <option value="summer"><?php _e('Summer', 'tripbookkar'); ?></option>
                                                <option value="autumn"><?php _e('Autumn', 'tripbookkar'); ?></option>
                                                <option value="winter"><?php _e('Winter', 'tripbookkar'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="package-group"><?php _e('Group Size', 'tripbookkar'); ?></label>
                                            <select id="package-group" name="group_size">
                                                <option value=""><?php _e('Any Size', 'tripbookkar'); ?></option>
                                                <option value="small"><?php _e('Small Group (2-8)', 'tripbookkar'); ?></option>
                                                <option value="medium"><?php _e('Medium Group (9-20)', 'tripbookkar'); ?></option>
                                                <option value="large"><?php _e('Large Group (20+)', 'tripbookkar'); ?></option>
                                                <option value="private"><?php _e('Private Tour', 'tripbookkar'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-12 text-center">
                            <button type="submit" class="search-btn" style="background: #27ae60; color: white; padding: 15px 50px; border: none; border-radius: 5px; font-size: 1.1rem; cursor: pointer;">
                                🔍 <?php _e('Search Packages', 'tripbookkar'); ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Packages Section -->
    <section class="featured-packages" style="padding: 60px 0;">
        <div class="container">
            <div class="section-header" style="text-align: center; margin-bottom: 50px;">
                <h2><?php _e('Featured Holiday Packages', 'tripbookkar'); ?></h2>
                <p style="color: #666; font-size: 1.1rem;"><?php _e('Handpicked packages for an unforgettable experience', 'tripbookkar'); ?></p>
            </div>
            
            <div class="package-filters-tabs" style="text-align: center; margin-bottom: 40px;">
                <button class="filter-tab active" data-filter="all" style="background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 25px; margin: 0 5px; cursor: pointer;"><?php _e('All Packages', 'tripbookkar'); ?></button>
                <button class="filter-tab" data-filter="adventure" style="background: #ecf0f1; color: #333; padding: 10px 20px; border: none; border-radius: 25px; margin: 0 5px; cursor: pointer;"><?php _e('Adventure', 'tripbookkar'); ?></button>
                <button class="filter-tab" data-filter="luxury" style="background: #ecf0f1; color: #333; padding: 10px 20px; border: none; border-radius: 25px; margin: 0 5px; cursor: pointer;"><?php _e('Luxury', 'tripbookkar'); ?></button>
                <button class="filter-tab" data-filter="family" style="background: #ecf0f1; color: #333; padding: 10px 20px; border: none; border-radius: 25px; margin: 0 5px; cursor: pointer;"><?php _e('Family', 'tripbookkar'); ?></button>
                <button class="filter-tab" data-filter="romantic" style="background: #ecf0f1; color: #333; padding: 10px 20px; border: none; border-radius: 25px; margin: 0 5px; cursor: pointer;"><?php _e('Romantic', 'tripbookkar'); ?></button>
            </div>
            
            <div id="package-loading" class="loading-section" style="display: none; text-align: center; padding: 40px;">
                <div class="loading-spinner"></div>
                <p><?php _e('Loading amazing packages...', 'tripbookkar'); ?></p>
            </div>
            
            <div id="package-results" class="package-grid">
                <?php
                // Demo package data - In real implementation, this would come from a travel API
                $demo_packages = array(
                    array(
                        'title' => 'Magical Paris & Rome',
                        'duration' => '8 Days / 7 Nights',
                        'price' => 1299,
                        'original_price' => 1599,
                        'rating' => 4.8,
                        'reviews' => 342,
                        'image' => 'https://images.unsplash.com/photo-1502602898536-47ad22581b52?w=500',
                        'type' => 'luxury',
                        'includes' => array('Flights', 'Hotels', 'Guided Tours', 'Breakfast'),
                        'highlights' => array('Eiffel Tower', 'Colosseum', 'Louvre Museum', 'Vatican City'),
                        'destinations' => 'Paris, Rome'
                    ),
                    array(
                        'title' => 'Bali Adventure Paradise',
                        'duration' => '6 Days / 5 Nights',
                        'price' => 899,
                        'original_price' => 1199,
                        'rating' => 4.6,
                        'reviews' => 567,
                        'image' => 'https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?w=500',
                        'type' => 'adventure',
                        'includes' => array('Hotels', 'Activities', 'Transfers', 'Some Meals'),
                        'highlights' => array('Temple Tours', 'Rice Terraces', 'Volcano Hiking', 'Cultural Shows'),
                        'destinations' => 'Ubud, Kuta, Sanur'
                    ),
                    array(
                        'title' => 'Swiss Alps Family Fun',
                        'duration' => '10 Days / 9 Nights',
                        'price' => 2299,
                        'original_price' => 2799,
                        'rating' => 4.9,
                        'reviews' => 189,
                        'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500',
                        'type' => 'family',
                        'includes' => array('Flights', 'Hotels', 'Train Passes', 'Activities'),
                        'highlights' => array('Jungfraujoch', 'Matterhorn', 'Lake Geneva', 'Chocolate Factory'),
                        'destinations' => 'Zurich, Interlaken, Zermatt'
                    ),
                    array(
                        'title' => 'Santorini Romance',
                        'duration' => '5 Days / 4 Nights',
                        'price' => 1199,
                        'original_price' => 1499,
                        'rating' => 4.7,
                        'reviews' => 423,
                        'image' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?w=500',
                        'type' => 'romantic',
                        'includes' => array('Flights', 'Resort', 'Wine Tours', 'Sunset Dinner'),
                        'highlights' => array('Blue Domes', 'Wine Tasting', 'Sunset Views', 'Luxury Resort'),
                        'destinations' => 'Oia, Fira, Imerovigli'
                    ),
                    array(
                        'title' => 'Thailand Island Hopping',
                        'duration' => '12 Days / 11 Nights',
                        'price' => 1599,
                        'original_price' => 1999,
                        'rating' => 4.5,
                        'reviews' => 678,
                        'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500',
                        'type' => 'adventure',
                        'includes' => array('Flights', 'Hotels', 'Boat Transfers', 'Activities'),
                        'highlights' => array('Phi Phi Islands', 'Phuket Beaches', 'Bangkok Temples', 'Floating Markets'),
                        'destinations' => 'Bangkok, Phuket, Krabi'
                    ),
                    array(
                        'title' => 'Dubai Luxury Experience',
                        'duration' => '6 Days / 5 Nights',
                        'price' => 1899,
                        'original_price' => 2399,
                        'rating' => 4.8,
                        'reviews' => 234,
                        'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500',
                        'type' => 'luxury',
                        'includes' => array('Flights', '5-Star Hotels', 'Desert Safari', 'City Tours'),
                        'highlights' => array('Burj Khalifa', 'Dubai Mall', 'Desert Safari', 'Luxury Shopping'),
                        'destinations' => 'Dubai, Abu Dhabi'
                    )
                );
                
                foreach ($demo_packages as $package) :
                    $discount = round((($package['original_price'] - $package['price']) / $package['original_price']) * 100);
                ?>
                <div class="package-card" data-type="<?php echo $package['type']; ?>" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.1); margin-bottom: 30px; transition: transform 0.3s ease;">
                    <div class="package-image" style="position: relative;">
                        <img src="<?php echo $package['image']; ?>" alt="<?php echo $package['title']; ?>" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="package-badge" style="position: absolute; top: 15px; left: 15px; background: #e74c3c; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold;"><?php echo $discount; ?>% OFF</div>
                        <div class="package-type-badge" style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.9); color: #333; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; text-transform: capitalize;"><?php echo $package['type']; ?></div>
                    </div>
                    
                    <div class="package-content" style="padding: 25px;">
                        <div class="package-header" style="margin-bottom: 15px;">
                            <h3 style="margin: 0 0 5px 0; color: #333; font-size: 1.3rem;"><?php echo $package['title']; ?></h3>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: #666; font-size: 0.9rem;"><?php echo $package['duration']; ?></span>
                                <div class="rating" style="display: flex; align-items: center;">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <span style="color: <?php echo $i <= $package['rating'] ? '#f39c12' : '#ddd'; ?>; font-size: 0.8rem;">★</span>
                                    <?php endfor; ?>
                                    <span style="margin-left: 5px; color: #666; font-size: 0.8rem;"><?php echo $package['rating']; ?> (<?php echo $package['reviews']; ?>)</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="package-destinations" style="margin-bottom: 15px;">
                            <span style="color: #27ae60; font-weight: 500; font-size: 0.9rem;">📍 <?php echo $package['destinations']; ?></span>
                        </div>
                        
                        <div class="package-includes" style="margin-bottom: 15px;">
                            <div style="font-weight: 500; margin-bottom: 5px; font-size: 0.9rem;"><?php _e('Includes:', 'tripbookkar'); ?></div>
                            <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                                <?php foreach ($package['includes'] as $include) : ?>
                                    <span style="background: #ecf0f1; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem; color: #34495e;">✓ <?php echo $include; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="package-highlights" style="margin-bottom: 20px;">
                            <div style="font-weight: 500; margin-bottom: 5px; font-size: 0.9rem;"><?php _e('Highlights:', 'tripbookkar'); ?></div>
                            <div style="color: #666; font-size: 0.8rem; line-height: 1.4;">
                                <?php echo implode(' • ', $package['highlights']); ?>
                            </div>
                        </div>
                        
                        <div class="package-footer" style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #eee; padding-top: 15px;">
                            <div class="price-info">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <span style="text-decoration: line-through; color: #999; font-size: 0.9rem;">$<?php echo number_format($package['original_price']); ?></span>
                                    <span style="font-size: 1.4rem; font-weight: bold; color: #27ae60;">$<?php echo number_format($package['price']); ?></span>
                                </div>
                                <div style="color: #666; font-size: 0.8rem;"><?php _e('per person', 'tripbookkar'); ?></div>
                            </div>
                            <div class="package-actions" style="display: flex; gap: 10px;">
                                <button class="btn-view-details" style="background: #34495e; color: white; padding: 10px 15px; border: none; border-radius: 6px; cursor: pointer; font-size: 0.9rem;"><?php _e('Details', 'tripbookkar'); ?></button>
                                <button class="btn-book-package" style="background: #27ae60; color: white; padding: 10px 15px; border: none; border-radius: 6px; cursor: pointer; font-size: 0.9rem;"><?php _e('Book Now', 'tripbookkar'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Load More Button -->
            <div class="text-center" style="margin-top: 40px;">
                <button id="load-more-packages" style="background: #27ae60; color: white; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem;"><?php _e('Load More Packages', 'tripbookkar'); ?></button>
            </div>
        </div>
    </section>

    <!-- Why Choose Our Packages Section -->
    <section class="why-choose-packages" style="background: #f8f9fa; padding: 60px 0;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 50px;"><?php _e('Why Choose Our Holiday Packages?', 'tripbookkar'); ?></h2>
            <div class="row">
                <div class="col-3" style="text-align: center;">
                    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">🎯</div>
                        <h4><?php _e('Expertly Curated', 'tripbookkar'); ?></h4>
                        <p style="color: #666;"><?php _e('Every package is carefully designed by travel experts for maximum enjoyment', 'tripbookkar'); ?></p>
                    </div>
                </div>
                <div class="col-3" style="text-align: center;">
                    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">💰</div>
                        <h4><?php _e('Best Value', 'tripbookkar'); ?></h4>
                        <p style="color: #666;"><?php _e('Get more for your money with our bundled packages and exclusive deals', 'tripbookkar'); ?></p>
                    </div>
                </div>
                <div class="col-3" style="text-align: center;">
                    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">🛡️</div>
                        <h4><?php _e('Peace of Mind', 'tripbookkar'); ?></h4>
                        <p style="color: #666;"><?php _e('24/7 support, travel insurance, and flexible booking policies', 'tripbookkar'); ?></p>
                    </div>
                </div>
                <div class="col-3" style="text-align: center;">
                    <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                        <div style="font-size: 3rem; margin-bottom: 20px;">⭐</div>
                        <h4><?php _e('Trusted Reviews', 'tripbookkar'); ?></h4>
                        <p style="color: #666;"><?php _e('Thousands of happy travelers and excellent ratings on all platforms', 'tripbookkar'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- API Integration Notice -->
    <section class="api-notice" style="background: #2c3e50; color: white; padding: 40px 0; text-align: center;">
        <div class="container">
            <h3><?php _e('Travel API Integration Ready', 'tripbookkar'); ?></h3>
            <p><?php _e('This page supports integration with major travel APIs like TravelPayouts, Amadeus, and custom package providers. Configure your settings in the admin panel.', 'tripbookkar'); ?></p>
            <a href="<?php echo admin_url('admin.php?page=tripbookkar-settings'); ?>" class="btn" style="background: #27ae60; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px;"><?php _e('Configure API Settings', 'tripbookkar'); ?></a>
        </div>
    </section>

</main>

<script>
// Holiday packages functionality
jQuery(document).ready(function($) {
    // Package search form submission
    $('#package-search-advanced').on('submit', function(e) {
        e.preventDefault();
        
        // Show loading
        $('#package-loading').show();
        $('#package-results').hide();
        
        // Simulate API call
        setTimeout(function() {
            $('#package-loading').hide();
            $('#package-results').show();
            
            // Scroll to results
            $('html, body').animate({
                scrollTop: $('#package-results').offset().top - 100
            }, 500);
        }, 2000);
    });
    
    // Destination autocomplete
    $('#package-destination').on('input', function() {
        var query = $(this).val();
        if (query.length > 2) {
            var suggestions = ['Paris, France', 'Bali, Indonesia', 'Rome, Italy', 'Dubai, UAE', 'Bangkok, Thailand', 'London, UK', 'New York, USA', 'Tokyo, Japan'];
            var filtered = suggestions.filter(dest => dest.toLowerCase().includes(query.toLowerCase()));
            
            var suggestionsHtml = '';
            filtered.forEach(function(dest) {
                suggestionsHtml += '<div class="suggestion-item" style="padding: 10px; cursor: pointer; border-bottom: 1px solid #eee;">' + dest + '</div>';
            });
            
            $('#destination-suggestions').html(suggestionsHtml).show();
        } else {
            $('#destination-suggestions').hide();
        }
    });
    
    // Handle destination selection
    $(document).on('click', '.suggestion-item', function() {
        $('#package-destination').val($(this).text());
        $('#destination-suggestions').hide();
    });
    
    // Package filter tabs
    $('.filter-tab').on('click', function() {
        var filter = $(this).data('filter');
        
        // Update active tab
        $('.filter-tab').removeClass('active').css({
            'background': '#ecf0f1',
            'color': '#333'
        });
        $(this).addClass('active').css({
            'background': '#27ae60',
            'color': 'white'
        });
        
        // Filter packages
        if (filter === 'all') {
            $('.package-card').show();
        } else {
            $('.package-card').hide();
            $('.package-card[data-type="' + filter + '"]').show();
        }
    });
    
    // Package card hover effects
    $('.package-card').hover(
        function() {
            $(this).css('transform', 'translateY(-5px)');
        },
        function() {
            $(this).css('transform', 'translateY(0)');
        }
    );
    
    // Load more packages
    $('#load-more-packages').on('click', function() {
        $(this).text('Loading...').prop('disabled', true);
        
        // Simulate loading more packages
        setTimeout(function() {
            $('#load-more-packages').text('Load More Packages').prop('disabled', false);
            // In real implementation, this would load more packages via AJAX
        }, 1500);
    });
    
    // Book package buttons
    $('.btn-book-package').on('click', function() {
        var packageTitle = $(this).closest('.package-card').find('h3').text();
        alert('Booking: ' + packageTitle + '\n\nThis would open the booking form in a real implementation.');
    });
    
    // View details buttons
    $('.btn-view-details').on('click', function() {
        var packageTitle = $(this).closest('.package-card').find('h3').text();
        alert('Viewing details for: ' + packageTitle + '\n\nThis would show detailed package information in a real implementation.');
    });
});
</script>

<?php get_footer(); ?>