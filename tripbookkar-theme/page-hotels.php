<?php
/**
 * Template Name: Hotels Page
 * 
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main hotels-page">
    
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #e74c3c, #c0392b); padding: 80px 0; margin-top: 80px;">
        <div class="container">
            <div class="page-header-content text-center">
                <h1 style="color: white; font-size: 3rem; margin-bottom: 20px;">🏨 <?php _e('Find Perfect Hotels', 'tripbookkar'); ?></h1>
                <p style="color: white; font-size: 1.2rem; opacity: 0.9;"><?php _e('Discover amazing hotels worldwide with the best prices', 'tripbookkar'); ?></p>
            </div>
        </div>
    </section>

    <!-- Hotel Search Section -->
    <section class="hotel-search-section" style="background: white; padding: 60px 0; margin-top: -40px; position: relative; z-index: 2;">
        <div class="container">
            <div class="search-form-container" style="box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                <h2 style="text-align: center; margin-bottom: 30px; color: #333;"><?php _e('Search Hotels', 'tripbookkar'); ?></h2>
                
                <form id="hotel-search-advanced" class="search-form active">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="hotel-city"><?php _e('City/Destination', 'tripbookkar'); ?></label>
                                <input type="text" id="hotel-city" name="city" placeholder="<?php _e('Where are you going?', 'tripbookkar'); ?>" required>
                                <div class="autocomplete-suggestions" id="city-suggestions"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="hotel-checkin"><?php _e('Check In', 'tripbookkar'); ?></label>
                                <input type="date" id="hotel-checkin" name="checkin" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="hotel-checkout"><?php _e('Check Out', 'tripbookkar'); ?></label>
                                <input type="date" id="hotel-checkout" name="checkout" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="hotel-rooms"><?php _e('Rooms', 'tripbookkar'); ?></label>
                                <select id="hotel-rooms" name="rooms">
                                    <option value="1">1 Room</option>
                                    <option value="2">2 Rooms</option>
                                    <option value="3">3 Rooms</option>
                                    <option value="4">4+ Rooms</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="hotel-guests"><?php _e('Guests', 'tripbookkar'); ?></label>
                                <select id="hotel-guests" name="guests">
                                    <option value="1">1 Guest</option>
                                    <option value="2">2 Guests</option>
                                    <option value="3">3 Guests</option>
                                    <option value="4">4 Guests</option>
                                    <option value="5+">5+ Guests</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-12">
                            <div class="advanced-filters">
                                <h3><?php _e('Filters', 'tripbookkar'); ?></h3>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="price-range"><?php _e('Price Range', 'tripbookkar'); ?></label>
                                            <select id="price-range" name="price_range">
                                                <option value=""><?php _e('Any Price', 'tripbookkar'); ?></option>
                                                <option value="budget"><?php _e('Budget (Under $50)', 'tripbookkar'); ?></option>
                                                <option value="mid"><?php _e('Mid-range ($50-150)', 'tripbookkar'); ?></option>
                                                <option value="luxury"><?php _e('Luxury ($150+)', 'tripbookkar'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="star-rating"><?php _e('Star Rating', 'tripbookkar'); ?></label>
                                            <select id="star-rating" name="star_rating">
                                                <option value=""><?php _e('Any Rating', 'tripbookkar'); ?></option>
                                                <option value="3">3+ Stars</option>
                                                <option value="4">4+ Stars</option>
                                                <option value="5">5 Stars</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="hotel-amenities"><?php _e('Amenities', 'tripbookkar'); ?></label>
                                            <select id="hotel-amenities" name="amenities">
                                                <option value=""><?php _e('Any Amenities', 'tripbookkar'); ?></option>
                                                <option value="wifi"><?php _e('Free WiFi', 'tripbookkar'); ?></option>
                                                <option value="pool"><?php _e('Swimming Pool', 'tripbookkar'); ?></option>
                                                <option value="spa"><?php _e('Spa', 'tripbookkar'); ?></option>
                                                <option value="gym"><?php _e('Fitness Center', 'tripbookkar'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="property-type"><?php _e('Property Type', 'tripbookkar'); ?></label>
                                            <select id="property-type" name="property_type">
                                                <option value=""><?php _e('Any Type', 'tripbookkar'); ?></option>
                                                <option value="hotel"><?php _e('Hotel', 'tripbookkar'); ?></option>
                                                <option value="resort"><?php _e('Resort', 'tripbookkar'); ?></option>
                                                <option value="apartment"><?php _e('Apartment', 'tripbookkar'); ?></option>
                                                <option value="villa"><?php _e('Villa', 'tripbookkar'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-12 text-center">
                            <button type="submit" class="search-btn" style="background: #e74c3c; color: white; padding: 15px 50px; border: none; border-radius: 5px; font-size: 1.1rem; cursor: pointer;">
                                🔍 <?php _e('Search Hotels', 'tripbookkar'); ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Search Results Section -->
    <section class="hotel-results-section" style="padding: 60px 0;">
        <div class="container">
            <div id="hotel-loading" class="loading-section" style="display: none; text-align: center; padding: 40px;">
                <div class="loading-spinner"></div>
                <p><?php _e('Searching for the best hotels...', 'tripbookkar'); ?></p>
            </div>
            
            <div id="hotel-results" class="hotel-results">
                <!-- Demo Hotels will be populated here -->
                <div class="results-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                    <h2><?php _e('Available Hotels', 'tripbookkar'); ?></h2>
                    <div class="sort-options">
                        <label for="sort-hotels"><?php _e('Sort by:', 'tripbookkar'); ?></label>
                        <select id="sort-hotels" name="sort">
                            <option value="price_low"><?php _e('Price: Low to High', 'tripbookkar'); ?></option>
                            <option value="price_high"><?php _e('Price: High to Low', 'tripbookkar'); ?></option>
                            <option value="rating"><?php _e('Guest Rating', 'tripbookkar'); ?></option>
                            <option value="distance"><?php _e('Distance', 'tripbookkar'); ?></option>
                        </select>
                    </div>
                </div>
                
                <!-- Demo Hotel Results -->
                <div class="hotel-grid">
                    <?php
                    // Demo hotel data - In real implementation, this would come from Booking.com API
                    $demo_hotels = array(
                        array(
                            'name' => 'Grand Palace Hotel',
                            'rating' => 4.5,
                            'price' => 120,
                            'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400',
                            'amenities' => array('WiFi', 'Pool', 'Spa', 'Gym'),
                            'location' => 'City Center',
                            'reviews' => 2341
                        ),
                        array(
                            'name' => 'Ocean View Resort',
                            'rating' => 4.8,
                            'price' => 220,
                            'image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=400',
                            'amenities' => array('WiFi', 'Pool', 'Beach', 'Restaurant'),
                            'location' => 'Beachfront',
                            'reviews' => 1876
                        ),
                        array(
                            'name' => 'Mountain Lodge',
                            'rating' => 4.3,
                            'price' => 85,
                            'image' => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=400',
                            'amenities' => array('WiFi', 'Hiking', 'Fireplace'),
                            'location' => 'Mountain View',
                            'reviews' => 987
                        ),
                        array(
                            'name' => 'Business Center Hotel',
                            'rating' => 4.2,
                            'price' => 95,
                            'image' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=400',
                            'amenities' => array('WiFi', 'Business Center', 'Gym'),
                            'location' => 'Downtown',
                            'reviews' => 1543
                        )
                    );
                    
                    foreach ($demo_hotels as $hotel) :
                    ?>
                    <div class="hotel-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <div class="hotel-card-content" style="display: flex;">
                            <div class="hotel-image" style="flex: 0 0 300px;">
                                <img src="<?php echo $hotel['image']; ?>" alt="<?php echo $hotel['name']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
                            </div>
                            <div class="hotel-details" style="flex: 1; padding: 20px;">
                                <div class="hotel-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                                    <div>
                                        <h3 style="margin: 0 0 5px 0; color: #333;"><?php echo $hotel['name']; ?></h3>
                                        <div class="rating" style="display: flex; align-items: center; margin-bottom: 5px;">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <span style="color: <?php echo $i <= $hotel['rating'] ? '#f39c12' : '#ddd'; ?>;">★</span>
                                            <?php endfor; ?>
                                            <span style="margin-left: 5px; color: #666;"><?php echo $hotel['rating']; ?> (<?php echo number_format($hotel['reviews']); ?> reviews)</span>
                                        </div>
                                        <p style="color: #666; margin: 0;"><?php echo $hotel['location']; ?></p>
                                    </div>
                                    <div class="price-info" style="text-align: right;">
                                        <div class="price" style="font-size: 1.5rem; font-weight: bold; color: #e74c3c;">$<?php echo $hotel['price']; ?></div>
                                        <div style="color: #666; font-size: 0.9rem;"><?php _e('per night', 'tripbookkar'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="amenities" style="margin-bottom: 15px;">
                                    <?php foreach ($hotel['amenities'] as $amenity) : ?>
                                        <span class="amenity-tag" style="background: #ecf0f1; padding: 3px 8px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px; color: #34495e;"><?php echo $amenity; ?></span>
                                    <?php endforeach; ?>
                                </div>
                                
                                <div class="hotel-actions" style="display: flex; gap: 10px;">
                                    <button class="btn-view-details" style="background: #34495e; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"><?php _e('View Details', 'tripbookkar'); ?></button>
                                    <button class="btn-book-now" style="background: #e74c3c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"><?php _e('Book Now', 'tripbookkar'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Pagination -->
                <div class="pagination" style="text-align: center; margin-top: 40px;">
                    <button class="pagination-btn" style="background: #34495e; color: white; padding: 10px 15px; border: none; border-radius: 5px; margin: 0 5px; cursor: pointer;">« <?php _e('Previous', 'tripbookkar'); ?></button>
                    <button class="pagination-btn active" style="background: #e74c3c; color: white; padding: 10px 15px; border: none; border-radius: 5px; margin: 0 5px;">1</button>
                    <button class="pagination-btn" style="background: #34495e; color: white; padding: 10px 15px; border: none; border-radius: 5px; margin: 0 5px; cursor: pointer;">2</button>
                    <button class="pagination-btn" style="background: #34495e; color: white; padding: 10px 15px; border: none; border-radius: 5px; margin: 0 5px; cursor: pointer;">3</button>
                    <button class="pagination-btn" style="background: #34495e; color: white; padding: 10px 15px; border: none; border-radius: 5px; margin: 0 5px; cursor: pointer;"><?php _e('Next', 'tripbookkar'); ?> »</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Destinations Section -->
    <section class="popular-destinations" style="background: #f8f9fa; padding: 60px 0;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 40px;"><?php _e('Popular Hotel Destinations', 'tripbookkar'); ?></h2>
            <div class="row">
                <?php
                $popular_destinations = array(
                    array('name' => 'Paris', 'hotels' => 2456, 'image' => 'https://images.unsplash.com/photo-1502602898536-47ad22581b52?w=300'),
                    array('name' => 'London', 'hotels' => 1876, 'image' => 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=300'),
                    array('name' => 'New York', 'hotels' => 3241, 'image' => 'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=300'),
                    array('name' => 'Tokyo', 'hotels' => 1654, 'image' => 'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=300'),
                );
                
                foreach ($popular_destinations as $dest) :
                ?>
                <div class="col-3">
                    <div class="destination-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); text-align: center; cursor: pointer;">
                        <img src="<?php echo $dest['image']; ?>" alt="<?php echo $dest['name']; ?>" style="width: 100%; height: 200px; object-fit: cover;">
                        <div style="padding: 20px;">
                            <h3 style="margin: 0 0 5px 0;"><?php echo $dest['name']; ?></h3>
                            <p style="color: #666; margin: 0;"><?php echo number_format($dest['hotels']); ?> <?php _e('hotels', 'tripbookkar'); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- API Integration Notice -->
    <section class="api-notice" style="background: #2c3e50; color: white; padding: 40px 0; text-align: center;">
        <div class="container">
            <h3><?php _e('Live API Integration Ready', 'tripbookkar'); ?></h3>
            <p><?php _e('This page is ready for integration with Booking.com API, Expedia API, or Hotels.com API. Configure your API keys in the admin panel.', 'tripbookkar'); ?></p>
            <a href="<?php echo admin_url('admin.php?page=tripbookkar-settings'); ?>" class="btn" style="background: #e74c3c; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px;"><?php _e('Configure API Settings', 'tripbookkar'); ?></a>
        </div>
    </section>

</main>

<script>
// Hotel search functionality
jQuery(document).ready(function($) {
    // Auto-populate check-out date (1 day after check-in)
    $('#hotel-checkin').on('change', function() {
        var checkinDate = new Date($(this).val());
        checkinDate.setDate(checkinDate.getDate() + 1);
        var checkoutDate = checkinDate.toISOString().split('T')[0];
        $('#hotel-checkout').val(checkoutDate);
    });
    
    // Hotel search form submission
    $('#hotel-search-advanced').on('submit', function(e) {
        e.preventDefault();
        
        // Show loading
        $('#hotel-loading').show();
        $('#hotel-results .hotel-grid').hide();
        
        // Simulate API call
        setTimeout(function() {
            $('#hotel-loading').hide();
            $('#hotel-results .hotel-grid').show();
            
            // Scroll to results
            $('html, body').animate({
                scrollTop: $('#hotel-results').offset().top - 100
            }, 500);
        }, 2000);
    });
    
    // City autocomplete (placeholder for real API)
    $('#hotel-city').on('input', function() {
        var query = $(this).val();
        if (query.length > 2) {
            // Simulate city suggestions
            var suggestions = ['Paris, France', 'London, UK', 'New York, USA', 'Tokyo, Japan', 'Dubai, UAE'];
            var filtered = suggestions.filter(city => city.toLowerCase().includes(query.toLowerCase()));
            
            var suggestionsHtml = '';
            filtered.forEach(function(city) {
                suggestionsHtml += '<div class="suggestion-item" style="padding: 10px; cursor: pointer; border-bottom: 1px solid #eee;">' + city + '</div>';
            });
            
            $('#city-suggestions').html(suggestionsHtml).show();
        } else {
            $('#city-suggestions').hide();
        }
    });
    
    // Handle city selection
    $(document).on('click', '.suggestion-item', function() {
        $('#hotel-city').val($(this).text());
        $('#city-suggestions').hide();
    });
    
    // Sort functionality
    $('#sort-hotels').on('change', function() {
        var sortBy = $(this).val();
        // In real implementation, this would re-sort the results
        console.log('Sorting by:', sortBy);
    });
});
</script>

<?php get_footer(); ?>