<?php
/**
 * Template Name: Flights Page
 * 
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main flights-page">
    
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #3498db, #2980b9); padding: 80px 0; margin-top: 80px;">
        <div class="container">
            <div class="page-header-content text-center">
                <h1 style="color: white; font-size: 3rem; margin-bottom: 20px;">✈️ <?php _e('Find Your Perfect Flight', 'tripbookkar'); ?></h1>
                <p style="color: white; font-size: 1.2rem; opacity: 0.9;"><?php _e('Search and compare flights from top airlines worldwide', 'tripbookkar'); ?></p>
            </div>
        </div>
    </section>

    <!-- Flight Search Section -->
    <section class="flight-search-section" style="background: white; padding: 60px 0; margin-top: -40px; position: relative; z-index: 2;">
        <div class="container">
            <div class="search-form-container" style="box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                <h2 style="text-align: center; margin-bottom: 30px; color: #333;"><?php _e('Search Flights', 'tripbookkar'); ?></h2>
                
                <form id="flight-search-advanced" class="search-form active">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="from"><?php _e('From', 'tripbookkar'); ?></label>
                                <input type="text" id="from" name="from" placeholder="<?php _e('Departure city', 'tripbookkar'); ?>" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="to"><?php _e('To', 'tripbookkar'); ?></label>
                                <input type="text" id="to" name="to" placeholder="<?php _e('Destination city', 'tripbookkar'); ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="departure"><?php _e('Departure', 'tripbookkar'); ?></label>
                                <input type="date" id="departure" name="departure" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="return"><?php _e('Return', 'tripbookkar'); ?></label>
                                <input type="date" id="return" name="return">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="passengers"><?php _e('Passengers', 'tripbookkar'); ?></label>
                                <select id="passengers" name="passengers">
                                    <option value="1">1 Passenger</option>
                                    <option value="2">2 Passengers</option>
                                    <option value="3">3 Passengers</option>
                                    <option value="4">4 Passengers</option>
                                    <option value="5+">5+ Passengers</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="class"><?php _e('Class', 'tripbookkar'); ?></label>
                                <select id="class" name="class">
                                    <option value="economy"><?php _e('Economy', 'tripbookkar'); ?></option>
                                    <option value="premium"><?php _e('Premium Economy', 'tripbookkar'); ?></option>
                                    <option value="business"><?php _e('Business', 'tripbookkar'); ?></option>
                                    <option value="first"><?php _e('First Class', 'tripbookkar'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="trip-type"><?php _e('Trip Type', 'tripbookkar'); ?></label>
                                <select id="trip-type" name="trip_type">
                                    <option value="round-trip"><?php _e('Round Trip', 'tripbookkar'); ?></option>
                                    <option value="one-way"><?php _e('One Way', 'tripbookkar'); ?></option>
                                    <option value="multi-city"><?php _e('Multi City', 'tripbookkar'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" class="search-btn" style="width: 100%; height: 50px;">
                                    🔍 <?php _e('Search Flights', 'tripbookkar'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Search Results Section -->
    <section class="search-results-section" id="search-results" style="padding: 60px 0; background: #f8f9fa; display: none;">
        <div class="container">
            <div class="search-results-header">
                <h2><?php _e('Flight Search Results', 'tripbookkar'); ?></h2>
                <div class="results-count">
                    <span id="results-count"><?php _e('Loading flights...', 'tripbookkar'); ?></span>
                </div>
            </div>
            
            <!-- Filters -->
            <div class="search-filters" style="background: white; padding: 20px; border-radius: 10px; margin-bottom: 30px;">
                <div class="row">
                    <div class="col-3">
                        <div class="filter-group">
                            <label><?php _e('Price Range', 'tripbookkar'); ?></label>
                            <input type="range" id="price-range" min="100" max="2000" value="1000">
                            <span id="price-value">$1000</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="filter-group">
                            <label><?php _e('Airlines', 'tripbookkar'); ?></label>
                            <select id="airline-filter">
                                <option value=""><?php _e('All Airlines', 'tripbookkar'); ?></option>
                                <option value="emirates">Emirates</option>
                                <option value="lufthansa">Lufthansa</option>
                                <option value="british-airways">British Airways</option>
                                <option value="air-france">Air France</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="filter-group">
                            <label><?php _e('Stops', 'tripbookkar'); ?></label>
                            <select id="stops-filter">
                                <option value=""><?php _e('Any Stops', 'tripbookkar'); ?></option>
                                <option value="0"><?php _e('Non-stop', 'tripbookkar'); ?></option>
                                <option value="1"><?php _e('1 Stop', 'tripbookkar'); ?></option>
                                <option value="2+"><?php _e('2+ Stops', 'tripbookkar'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="filter-group">
                            <label><?php _e('Sort By', 'tripbookkar'); ?></label>
                            <select id="sort-filter">
                                <option value="price"><?php _e('Price (Low to High)', 'tripbookkar'); ?></option>
                                <option value="duration"><?php _e('Duration', 'tripbookkar'); ?></option>
                                <option value="departure"><?php _e('Departure Time', 'tripbookkar'); ?></option>
                                <option value="rating"><?php _e('Airline Rating', 'tripbookkar'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Flight Results -->
            <div id="flight-results" class="flight-results">
                <!-- Results will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Popular Routes Section -->
    <section class="popular-routes-section" style="padding: 80px 0;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Popular Flight Routes', 'tripbookkar'); ?></h2>
                <p class="section-subtitle"><?php _e('Discover the most traveled destinations and find great deals on popular routes', 'tripbookkar'); ?></p>
            </div>
            
            <div class="routes-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
                <?php
                $popular_routes = array(
                    array('from' => 'New York', 'to' => 'London', 'price' => '$399', 'duration' => '7h 30m'),
                    array('from' => 'Los Angeles', 'to' => 'Tokyo', 'price' => '$599', 'duration' => '11h 45m'),
                    array('from' => 'London', 'to' => 'Dubai', 'price' => '$449', 'duration' => '6h 50m'),
                    array('from' => 'Paris', 'to' => 'New York', 'price' => '$429', 'duration' => '8h 15m'),
                    array('from' => 'Singapore', 'to' => 'Sydney', 'price' => '$349', 'duration' => '8h 20m'),
                    array('from' => 'Mumbai', 'to' => 'Dubai', 'price' => '$299', 'duration' => '3h 30m')
                );
                
                foreach ($popular_routes as $route) :
                ?>
                    <div class="route-card" style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                        <div class="route-cities">
                            <h3><?php echo $route['from']; ?> → <?php echo $route['to']; ?></h3>
                        </div>
                        <div class="route-details" style="margin: 15px 0;">
                            <div class="route-price" style="font-size: 1.5rem; font-weight: 700; color: #e74c3c;"><?php echo $route['price']; ?></div>
                            <div class="route-duration" style="color: #666;"><?php echo $route['duration']; ?> flight</div>
                        </div>
                        <a href="#" class="btn" onclick="populateSearchForm('<?php echo $route['from']; ?>', '<?php echo $route['to']; ?>')">
                            <?php _e('Search This Route', 'tripbookkar'); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Airlines Section -->
    <section class="airlines-section" style="background: #f8f9fa; padding: 80px 0;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Our Airline Partners', 'tripbookkar'); ?></h2>
                <p class="section-subtitle"><?php _e('We work with the world\'s leading airlines to bring you the best flight options', 'tripbookkar'); ?></p>
            </div>
            
            <div class="airlines-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 40px;">
                <?php
                $airlines = array('Emirates', 'Lufthansa', 'British Airways', 'Air France', 'Singapore Airlines', 'Qatar Airways', 'Turkish Airlines', 'Etihad Airways');
                
                foreach ($airlines as $airline) :
                ?>
                    <div class="airline-card" style="background: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 3px 15px rgba(0,0,0,0.1);">
                        <img src="https://via.placeholder.com/120x60/3498db/ffffff?text=<?php echo urlencode($airline); ?>" alt="<?php echo esc_attr($airline); ?>" style="max-width: 100%; margin-bottom: 10px;">
                        <h4><?php echo $airline; ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main><!-- #primary -->

<script>
// Populate search form with route data
function populateSearchForm(from, to) {
    document.getElementById('from').value = from;
    document.getElementById('to').value = to;
    
    // Scroll to search form
    document.querySelector('.flight-search-section').scrollIntoView({
        behavior: 'smooth'
    });
}

// Demo flight search functionality
document.getElementById('flight-search-advanced').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show loading
    document.getElementById('search-results').style.display = 'block';
    document.getElementById('results-count').textContent = 'Searching flights...';
    
    // Simulate API call
    setTimeout(function() {
        displayDemoResults();
    }, 2000);
});

function displayDemoResults() {
    const demoFlights = [
        {
            airline: 'Emirates',
            logo: 'https://via.placeholder.com/60x30/e74c3c/ffffff?text=EK',
            price: '$599',
            departure: '08:30',
            arrival: '22:45',
            duration: '14h 15m',
            stops: 'Non-stop',
            rating: 4.8
        },
        {
            airline: 'British Airways',
            logo: 'https://via.placeholder.com/60x30/3498db/ffffff?text=BA',
            price: '$649',
            departure: '14:20',
            arrival: '06:35+1',
            duration: '16h 15m',
            stops: '1 Stop',
            rating: 4.6
        },
        {
            airline: 'Lufthansa',
            logo: 'https://via.placeholder.com/60x30/f39c12/ffffff?text=LH',
            price: '$579',
            departure: '11:45',
            arrival: '05:30+1',
            duration: '17h 45m',
            stops: '1 Stop',
            rating: 4.7
        }
    ];
    
    document.getElementById('results-count').textContent = `${demoFlights.length} flights found`;
    
    let resultsHTML = '';
    demoFlights.forEach(flight => {
        resultsHTML += `
            <div class="flight-card" style="background: white; padding: 25px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <div class="flight-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <div class="airline-info" style="display: flex; align-items: center; gap: 15px;">
                        <img src="${flight.logo}" alt="${flight.airline}" style="width: 60px; height: 30px;">
                        <div>
                            <h3 style="margin: 0; font-size: 1.2rem;">${flight.airline}</h3>
                            <div style="color: #666; font-size: 14px;">Rating: ${'★'.repeat(Math.floor(flight.rating))} ${flight.rating}</div>
                        </div>
                    </div>
                    <div class="flight-price" style="text-align: right;">
                        <div style="font-size: 2rem; font-weight: 700; color: #e74c3c;">${flight.price}</div>
                        <div style="color: #666; font-size: 14px;">per person</div>
                    </div>
                </div>
                
                <div class="flight-details" style="display: grid; grid-template-columns: 1fr auto 1fr; gap: 20px; align-items: center; margin-bottom: 20px;">
                    <div class="departure" style="text-align: left;">
                        <div style="font-size: 1.5rem; font-weight: 600;">${flight.departure}</div>
                        <div style="color: #666;">Departure</div>
                    </div>
                    
                    <div class="flight-path" style="text-align: center;">
                        <div style="color: #666; margin-bottom: 5px;">${flight.duration}</div>
                        <div style="border-top: 2px solid #e74c3c; position: relative; width: 120px;">
                            <div style="position: absolute; top: -8px; right: -5px; color: #e74c3c;">✈</div>
                        </div>
                        <div style="color: #666; margin-top: 5px; font-size: 14px;">${flight.stops}</div>
                    </div>
                    
                    <div class="arrival" style="text-align: right;">
                        <div style="font-size: 1.5rem; font-weight: 600;">${flight.arrival}</div>
                        <div style="color: #666;">Arrival</div>
                    </div>
                </div>
                
                <div class="flight-actions" style="display: flex; justify-content: space-between; align-items: center;">
                    <button class="btn-link" style="background: none; border: none; color: #3498db; cursor: pointer; text-decoration: underline;">View Details</button>
                    <button class="btn" style="padding: 12px 30px;">Select Flight</button>
                </div>
            </div>
        `;
    });
    
    document.getElementById('flight-results').innerHTML = resultsHTML;
}
</script>

<style>
.route-card:hover {
    transform: translateY(-5px);
}

.filter-group {
    margin-bottom: 15px;
}

.filter-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #333;
}

.filter-group input,
.filter-group select {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.btn-link:hover {
    text-decoration: none !important;
    color: #2980b9 !important;
}

@media (max-width: 768px) {
    .flight-details {
        grid-template-columns: 1fr !important;
        text-align: center !important;
    }
    
    .flight-path {
        order: -1;
    }
}
</style>

<?php get_footer(); ?>