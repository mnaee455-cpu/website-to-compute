<?php
/**
 * Home Page Template
 *
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main home-page">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="fade-in"><?php _e('Discover Your Next Adventure', 'tripbookkar'); ?></h1>
                <p class="fade-in"><?php _e('Book flights, hotels, and holiday packages at the best prices. Start your journey with TripBookKar today!', 'tripbookkar'); ?></p>
                
                <!-- Search Form Container -->
                <div class="search-form-container fade-in">
                    <div class="search-tabs">
                        <button class="search-tab active" data-tab="flights">
                            ✈️ <?php _e('Flights', 'tripbookkar'); ?>
                        </button>
                        <button class="search-tab" data-tab="hotels">
                            🏨 <?php _e('Hotels', 'tripbookkar'); ?>
                        </button>
                        <button class="search-tab" data-tab="packages">
                            🧳 <?php _e('Packages', 'tripbookkar'); ?>
                        </button>
                    </div>
                    
                    <!-- Flight Search Form -->
                    <form id="flight-search" class="search-form active">
                        <div class="form-group">
                            <label for="flight-from"><?php _e('From', 'tripbookkar'); ?></label>
                            <input type="text" id="flight-from" name="from" placeholder="<?php _e('Departure city', 'tripbookkar'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="flight-to"><?php _e('To', 'tripbookkar'); ?></label>
                            <input type="text" id="flight-to" name="to" placeholder="<?php _e('Destination city', 'tripbookkar'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="flight-departure"><?php _e('Departure', 'tripbookkar'); ?></label>
                            <input type="date" id="flight-departure" name="departure" required>
                        </div>
                        <div class="form-group">
                            <label for="flight-return"><?php _e('Return', 'tripbookkar'); ?></label>
                            <input type="date" id="flight-return" name="return">
                        </div>
                        <div class="form-group">
                            <label for="flight-passengers"><?php _e('Passengers', 'tripbookkar'); ?></label>
                            <select id="flight-passengers" name="passengers">
                                <option value="1">1 Passenger</option>
                                <option value="2">2 Passengers</option>
                                <option value="3">3 Passengers</option>
                                <option value="4">4 Passengers</option>
                                <option value="5+">5+ Passengers</option>
                            </select>
                        </div>
                        <button type="submit" class="search-btn">
                            🔍 <?php _e('Search Flights', 'tripbookkar'); ?>
                        </button>
                    </form>
                    
                    <!-- Hotel Search Form -->
                    <form id="hotel-search" class="search-form">
                        <div class="form-group">
                            <label for="hotel-city"><?php _e('City', 'tripbookkar'); ?></label>
                            <input type="text" id="hotel-city" name="city" placeholder="<?php _e('Enter city name', 'tripbookkar'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hotel-checkin"><?php _e('Check In', 'tripbookkar'); ?></label>
                            <input type="date" id="hotel-checkin" name="checkin" required>
                        </div>
                        <div class="form-group">
                            <label for="hotel-checkout"><?php _e('Check Out', 'tripbookkar'); ?></label>
                            <input type="date" id="hotel-checkout" name="checkout" required>
                        </div>
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
                        <button type="submit" class="search-btn">
                            🔍 <?php _e('Search Hotels', 'tripbookkar'); ?>
                        </button>
                    </form>
                    
                    <!-- Package Search Form -->
                    <form id="package-search" class="search-form">
                        <div class="form-group">
                            <label for="package-destination"><?php _e('Destination', 'tripbookkar'); ?></label>
                            <input type="text" id="package-destination" name="destination" placeholder="<?php _e('Where do you want to go?', 'tripbookkar'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="package-departure"><?php _e('Departure Date', 'tripbookkar'); ?></label>
                            <input type="date" id="package-departure" name="departure" required>
                        </div>
                        <div class="form-group">
                            <label for="package-duration"><?php _e('Duration', 'tripbookkar'); ?></label>
                            <select id="package-duration" name="duration">
                                <option value="3-5"><?php _e('3-5 Days', 'tripbookkar'); ?></option>
                                <option value="6-10"><?php _e('6-10 Days', 'tripbookkar'); ?></option>
                                <option value="11-15"><?php _e('11-15 Days', 'tripbookkar'); ?></option>
                                <option value="15+"><?php _e('15+ Days', 'tripbookkar'); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="package-travelers"><?php _e('Travelers', 'tripbookkar'); ?></label>
                            <select id="package-travelers" name="travelers">
                                <option value="1">1 Person</option>
                                <option value="2">2 People</option>
                                <option value="3-5">3-5 People</option>
                                <option value="6+">6+ People</option>
                            </select>
                        </div>
                        <button type="submit" class="search-btn">
                            🔍 <?php _e('Search Packages', 'tripbookkar'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Destinations Section -->
    <section class="section destinations-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Top Destinations', 'tripbookkar'); ?></h2>
                <p class="section-subtitle"><?php _e('Explore the world\'s most amazing places with our curated destination guides', 'tripbookkar'); ?></p>
            </div>
            
            <div class="destinations-grid">
                <?php
                // Demo destinations
                $demo_destinations = array(
                    array('title' => 'Paris, France', 'description' => 'The City of Light awaits with its iconic landmarks and romantic atmosphere.'),
                    array('title' => 'Tokyo, Japan', 'description' => 'Experience the perfect blend of tradition and modernity in Japan\'s capital.'),
                    array('title' => 'New York, USA', 'description' => 'The city that never sleeps offers endless entertainment and cultural experiences.'),
                    array('title' => 'Bali, Indonesia', 'description' => 'Tropical paradise with stunning beaches, temples, and vibrant culture.'),
                    array('title' => 'London, UK', 'description' => 'Rich history, royal heritage, and world-class museums await you.'),
                    array('title' => 'Dubai, UAE', 'description' => 'Modern luxury meets traditional Arabian hospitality in this desert oasis.')
                );
                
                foreach ($demo_destinations as $destination) :
                ?>
                    <div class="card destination-card">
                        <img src="https://via.placeholder.com/400x300/e74c3c/ffffff?text=<?php echo urlencode($destination['title']); ?>" alt="<?php echo esc_attr($destination['title']); ?>" class="card-image">
                        <div class="card-content">
                            <h3 class="card-title"><?php echo $destination['title']; ?></h3>
                            <p class="card-text"><?php echo $destination['description']; ?></p>
                            <a href="#" class="btn">
                                <?php _e('Explore Now', 'tripbookkar'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-30">
                <a href="<?php echo esc_url(home_url('/destinations/')); ?>" class="btn btn-secondary">
                    <?php _e('View All Destinations', 'tripbookkar'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Packages Section -->
    <section class="section packages-section" style="background: #f8f9fa;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Featured Holiday Packages', 'tripbookkar'); ?></h2>
                <p class="section-subtitle"><?php _e('Handpicked vacation packages designed to give you the perfect getaway experience', 'tripbookkar'); ?></p>
            </div>
            
            <div class="packages-grid">
                <?php
                // Demo packages
                $demo_packages = array(
                    array('title' => 'Romantic Paris Getaway', 'price' => '$1,299', 'duration' => '5 Days / 4 Nights'),
                    array('title' => 'Tokyo Adventure Tour', 'price' => '$1,599', 'duration' => '7 Days / 6 Nights'),
                    array('title' => 'Tropical Bali Escape', 'price' => '$899', 'duration' => '6 Days / 5 Nights'),
                    array('title' => 'Dubai Luxury Experience', 'price' => '$1,799', 'duration' => '4 Days / 3 Nights'),
                    array('title' => 'London Heritage Tour', 'price' => '$1,399', 'duration' => '6 Days / 5 Nights'),
                    array('title' => 'New York City Break', 'price' => '$1,199', 'duration' => '4 Days / 3 Nights')
                );
                
                foreach ($demo_packages as $package) :
                ?>
                    <div class="card package-card">
                        <img src="https://via.placeholder.com/350x250/3498db/ffffff?text=<?php echo urlencode($package['title']); ?>" alt="<?php echo esc_attr($package['title']); ?>" class="card-image">
                        <div class="card-content">
                            <h3 class="card-title"><?php echo $package['title']; ?></h3>
                            <p class="card-text"><?php echo $package['duration']; ?></p>
                            <div class="card-price"><?php echo $package['price']; ?></div>
                            <a href="#" class="btn">
                                <?php _e('Book Now', 'tripbookkar'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-30">
                <a href="<?php echo esc_url(home_url('/packages/')); ?>" class="btn btn-secondary">
                    <?php _e('View All Packages', 'tripbookkar'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section why-choose-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Why Choose TripBookKar?', 'tripbookkar'); ?></h2>
                <p class="section-subtitle"><?php _e('We make travel planning easy, affordable, and enjoyable with our comprehensive services', 'tripbookkar'); ?></p>
            </div>
            
            <div class="row">
                <div class="col-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">💰</div>
                        <h3><?php _e('Best Prices', 'tripbookkar'); ?></h3>
                        <p><?php _e('We guarantee the best prices on flights, hotels, and vacation packages. Find amazing deals every day.', 'tripbookkar'); ?></p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">🎧</div>
                        <h3><?php _e('24/7 Support', 'tripbookkar'); ?></h3>
                        <p><?php _e('Our expert travel consultants are available round the clock to help you plan your perfect trip.', 'tripbookkar'); ?></p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="feature-card text-center">
                        <div class="feature-icon">🛡️</div>
                        <h3><?php _e('Secure Booking', 'tripbookkar'); ?></h3>
                        <p><?php _e('Your personal and payment information is protected with enterprise-grade security measures.', 'tripbookkar'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('What Our Customers Say', 'tripbookkar'); ?></h2>
                <p class="section-subtitle"><?php _e('Read reviews from thousands of satisfied travelers who chose TripBookKar for their journeys', 'tripbookkar'); ?></p>
            </div>
            
            <div class="row">
                <?php
                // Demo testimonials
                $demo_testimonials = array(
                    array('name' => 'Sarah Johnson', 'location' => 'New York, USA', 'text' => 'TripBookKar made my honeymoon to Bali absolutely perfect! The package was well-planned and the support team was incredibly helpful throughout our journey.'),
                    array('name' => 'Mike Chen', 'location' => 'Toronto, Canada', 'text' => 'Found the best flight deals to Tokyo through TripBookKar. The booking process was smooth and I saved over $300 compared to other booking sites!'),
                    array('name' => 'Emma Rodriguez', 'location' => 'London, UK', 'text' => 'The hotel recommendations were spot-on! Our stay in Paris exceeded all expectations. Will definitely use TripBookKar for all future travels.')
                );
                
                foreach ($demo_testimonials as $testimonial) :
                ?>
                    <div class="col-4">
                        <div class="testimonial-card">
                            <div class="testimonial-text">
                                "<?php echo $testimonial['text']; ?>"
                            </div>
                            <div class="testimonial-author">
                                <strong><?php echo $testimonial['name']; ?></strong><br>
                                <small><?php echo $testimonial['location']; ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main><!-- #primary -->

<style>
/* Search Form Styles */
.search-form {
    display: none;
}

.search-form.active {
    display: grid;
}

/* Feature Cards */
.feature-card {
    padding: 40px 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.feature-icon {
    font-size: 60px;
    margin-bottom: 20px;
}

.feature-card h3 {
    margin-bottom: 15px;
    color: #333;
    font-size: 1.3rem;
}

.feature-card p {
    color: #666;
    line-height: 1.6;
}
</style>

<?php
get_footer();
?>