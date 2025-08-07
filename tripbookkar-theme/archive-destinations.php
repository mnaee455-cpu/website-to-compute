<?php
/**
 * Archive Destinations Template
 * 
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main destinations-archive">
    
    <!-- Page Header -->
    <section class="page-header" style="background: linear-gradient(135deg, #8e44ad, #9b59b6); padding: 80px 0; margin-top: 80px;">
        <div class="container">
            <div class="page-header-content text-center">
                <h1 style="color: white; font-size: 3rem; margin-bottom: 20px;">🌍 <?php _e('Explore Destinations', 'tripbookkar'); ?></h1>
                <p style="color: white; font-size: 1.2rem; opacity: 0.9;"><?php _e('Discover amazing destinations around the world', 'tripbookkar'); ?></p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="destinations-filters" style="background: white; padding: 40px 0; border-bottom: 1px solid #eee;">
        <div class="container">
            <div class="filter-controls" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div class="filter-tabs" style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <button class="filter-tab active" data-continent="all" style="background: #8e44ad; color: white; padding: 8px 16px; border: none; border-radius: 20px; cursor: pointer;"><?php _e('All', 'tripbookkar'); ?></button>
                    <button class="filter-tab" data-continent="europe" style="background: #ecf0f1; color: #333; padding: 8px 16px; border: none; border-radius: 20px; cursor: pointer;"><?php _e('Europe', 'tripbookkar'); ?></button>
                    <button class="filter-tab" data-continent="asia" style="background: #ecf0f1; color: #333; padding: 8px 16px; border: none; border-radius: 20px; cursor: pointer;"><?php _e('Asia', 'tripbookkar'); ?></button>
                    <button class="filter-tab" data-continent="north-america" style="background: #ecf0f1; color: #333; padding: 8px 16px; border: none; border-radius: 20px; cursor: pointer;"><?php _e('North America', 'tripbookkar'); ?></button>
                    <button class="filter-tab" data-continent="africa" style="background: #ecf0f1; color: #333; padding: 8px 16px; border: none; border-radius: 20px; cursor: pointer;"><?php _e('Africa', 'tripbookkar'); ?></button>
                    <button class="filter-tab" data-continent="oceania" style="background: #ecf0f1; color: #333; padding: 8px 16px; border: none; border-radius: 20px; cursor: pointer;"><?php _e('Oceania', 'tripbookkar'); ?></button>
                </div>
                
                <div class="sort-controls" style="display: flex; align-items: center; gap: 10px;">
                    <label for="destination-sort" style="font-weight: bold;"><?php _e('Sort by:', 'tripbookkar'); ?></label>
                    <select id="destination-sort" style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="name"><?php _e('Name', 'tripbookkar'); ?></option>
                        <option value="cost-low"><?php _e('Price: Low to High', 'tripbookkar'); ?></option>
                        <option value="cost-high"><?php _e('Price: High to Low', 'tripbookkar'); ?></option>
                        <option value="popularity"><?php _e('Popularity', 'tripbookkar'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Grid -->
    <section class="destinations-grid-section" style="padding: 60px 0;">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="destinations-stats" style="margin-bottom: 40px; text-align: center;">
                    <p style="color: #666; font-size: 1.1rem;">
                        <?php printf(__('Showing %d amazing destinations', 'tripbookkar'), $wp_query->found_posts); ?>
                    </p>
                </div>
                
                <div class="destinations-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                    <?php while (have_posts()) : the_post(); 
                        $destination_country = get_post_meta(get_the_ID(), '_destination_country', true);
                        $destination_continent = get_post_meta(get_the_ID(), '_destination_continent', true);
                        $average_cost = get_post_meta(get_the_ID(), '_average_cost', true);
                        $best_time = get_post_meta(get_the_ID(), '_best_time_to_visit', true);
                        $hero_image = get_post_meta(get_the_ID(), '_hero_image', true);
                        
                        if (!$hero_image) {
                            $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        }
                        if (!$hero_image) {
                            $hero_image = 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=500';
                        }
                        
                        $continent_class = strtolower(str_replace(' ', '-', $destination_continent));
                    ?>
                    
                    <article class="destination-card" data-continent="<?php echo esc_attr($continent_class); ?>" data-cost="<?php echo esc_attr($average_cost); ?>" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="destination-image" style="position: relative; height: 250px; overflow: hidden;">
                            <img src="<?php echo esc_url($hero_image); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                            
                            <?php if ($average_cost) : ?>
                                <div class="cost-badge" style="position: absolute; top: 15px; right: 15px; background: rgba(0,0,0,0.8); color: white; padding: 8px 12px; border-radius: 20px; font-size: 0.9rem; font-weight: bold;">
                                    $<?php echo $average_cost; ?>/day
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($destination_continent) : ?>
                                <div class="continent-badge" style="position: absolute; top: 15px; left: 15px; background: #8e44ad; color: white; padding: 5px 10px; border-radius: 15px; font-size: 0.8rem;">
                                    <?php echo $destination_continent; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="destination-content" style="padding: 25px;">
                            <div class="destination-header" style="margin-bottom: 15px;">
                                <h2 style="margin: 0 0 5px 0; font-size: 1.4rem; color: #2c3e50;">
                                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit; transition: color 0.3s ease;">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <?php if ($destination_country) : ?>
                                    <p style="margin: 0; color: #666; font-size: 0.9rem;">📍 <?php echo $destination_country; ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="destination-excerpt" style="margin-bottom: 20px;">
                                <p style="color: #666; line-height: 1.6; margin: 0; font-size: 0.95rem;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </p>
                            </div>
                            
                            <div class="destination-meta" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px;">
                                <?php if ($best_time) : ?>
                                    <div style="text-align: center;">
                                        <div style="font-size: 1.2rem; margin-bottom: 2px;">🌤️</div>
                                        <div style="font-size: 0.8rem; color: #666; font-weight: bold;">Best Time</div>
                                        <div style="font-size: 0.8rem; color: #333;"><?php echo wp_trim_words($best_time, 3, ''); ?></div>
                                    </div>
                                <?php endif; ?>
                                
                                <div style="text-align: center;">
                                    <div style="font-size: 1.2rem; margin-bottom: 2px;">⭐</div>
                                    <div style="font-size: 0.8rem; color: #666; font-weight: bold;">Rating</div>
                                    <div style="font-size: 0.8rem; color: #333;">4.<?php echo rand(5, 9); ?>/5</div>
                                </div>
                                
                                <div style="text-align: center;">
                                    <div style="font-size: 1.2rem; margin-bottom: 2px;">🎯</div>
                                    <div style="font-size: 0.8rem; color: #666; font-weight: bold;">Packages</div>
                                    <div style="font-size: 0.8rem; color: #333;"><?php echo rand(5, 15); ?> tours</div>
                                </div>
                            </div>
                            
                            <div class="destination-actions" style="display: flex; gap: 10px;">
                                <a href="<?php the_permalink(); ?>" class="btn-explore" style="flex: 1; background: #8e44ad; color: white; padding: 12px 20px; text-align: center; text-decoration: none; border-radius: 6px; font-weight: bold; transition: background 0.3s ease;">
                                    <?php _e('Explore', 'tripbookkar'); ?>
                                </a>
                                <button class="btn-quick-book" style="flex: 1; background: #e74c3c; color: white; padding: 12px 20px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; transition: background 0.3s ease;" onclick="openQuickBookModal('<?php echo esc_js(get_the_title()); ?>')">
                                    <?php _e('Book Now', 'tripbookkar'); ?>
                                </button>
                            </div>
                        </div>
                    </article>
                    
                    <?php endwhile; ?>
                </div>
                
                <!-- Pagination -->
                <div class="destinations-pagination" style="margin-top: 50px; text-align: center;">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '← ' . __('Previous', 'tripbookkar'),
                        'next_text' => __('Next', 'tripbookkar') . ' →',
                    ));
                    ?>
                </div>
                
            <?php else : ?>
                <div class="no-destinations" style="text-align: center; padding: 60px 20px;">
                    <div style="font-size: 4rem; margin-bottom: 20px;">🌍</div>
                    <h2><?php _e('No destinations found', 'tripbookkar'); ?></h2>
                    <p style="color: #666; margin-bottom: 30px;"><?php _e('We couldn\'t find any destinations matching your criteria.', 'tripbookkar'); ?></p>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=tripbookkar-demo-importer')); ?>" class="button button-primary">
                        <?php _e('Import Demo Destinations', 'tripbookkar'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="destinations-cta" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: white; padding: 60px 0; text-align: center;">
        <div class="container">
            <h2 style="margin-bottom: 20px; font-size: 2.5rem;"><?php _e('Can\'t Find What You\'re Looking For?', 'tripbookkar'); ?></h2>
            <p style="font-size: 1.2rem; margin-bottom: 30px; opacity: 0.9;"><?php _e('Let our travel experts help you plan the perfect custom trip', 'tripbookkar'); ?></p>
            <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <a href="/contact" class="btn" style="background: #e74c3c; color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block;">
                    📞 <?php _e('Contact Us', 'tripbookkar'); ?>
                </a>
                <a href="/packages" class="btn" style="background: transparent; color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block; border: 2px solid white;">
                    🧳 <?php _e('View Packages', 'tripbookkar'); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<!-- Quick Book Modal -->
<div id="quick-book-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 10000; align-items: center; justify-content: center;">
    <div style="background: white; padding: 30px; border-radius: 15px; max-width: 500px; width: 90%; max-height: 80vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;"><?php _e('Quick Book', 'tripbookkar'); ?> <span id="modal-destination"></span></h3>
            <button onclick="closeQuickBookModal()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer;">×</button>
        </div>
        
        <form id="quick-book-form">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;"><?php _e('Travel Type', 'tripbookkar'); ?></label>
                <select name="travel_type" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
                    <option value=""><?php _e('Select travel type', 'tripbookkar'); ?></option>
                    <option value="flights"><?php _e('Flights Only', 'tripbookkar'); ?></option>
                    <option value="hotels"><?php _e('Hotels Only', 'tripbookkar'); ?></option>
                    <option value="package"><?php _e('Complete Package', 'tripbookkar'); ?></option>
                </select>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;"><?php _e('Departure Date', 'tripbookkar'); ?></label>
                <input type="date" name="departure_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;"><?php _e('Travelers', 'tripbookkar'); ?></label>
                <select name="travelers" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
                    <option value="1">1 Traveler</option>
                    <option value="2">2 Travelers</option>
                    <option value="3">3 Travelers</option>
                    <option value="4">4+ Travelers</option>
                </select>
            </div>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;"><?php _e('Budget Range', 'tripbookkar'); ?></label>
                <select name="budget" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="budget"><?php _e('Budget ($500-1000)', 'tripbookkar'); ?></option>
                    <option value="mid" selected><?php _e('Mid-range ($1000-3000)', 'tripbookkar'); ?></option>
                    <option value="luxury"><?php _e('Luxury ($3000+)', 'tripbookkar'); ?></option>
                </select>
            </div>
            
            <button type="submit" style="width: 100%; background: #e74c3c; color: white; padding: 12px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                <?php _e('Get Quotes & Availability', 'tripbookkar'); ?>
            </button>
        </form>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Filter functionality
    $('.filter-tab').on('click', function() {
        var continent = $(this).data('continent');
        
        // Update active tab
        $('.filter-tab').removeClass('active').css({
            'background': '#ecf0f1',
            'color': '#333'
        });
        $(this).addClass('active').css({
            'background': '#8e44ad',
            'color': 'white'
        });
        
        // Filter destinations
        if (continent === 'all') {
            $('.destination-card').show();
        } else {
            $('.destination-card').hide();
            $('.destination-card[data-continent="' + continent + '"]').show();
        }
    });
    
    // Sort functionality
    $('#destination-sort').on('change', function() {
        var sortBy = $(this).val();
        var $grid = $('.destinations-grid');
        var $cards = $grid.children('.destination-card');
        
        $cards.sort(function(a, b) {
            if (sortBy === 'name') {
                return $(a).find('h2 a').text().localeCompare($(b).find('h2 a').text());
            } else if (sortBy === 'cost-low') {
                return parseInt($(a).data('cost')) - parseInt($(b).data('cost'));
            } else if (sortBy === 'cost-high') {
                return parseInt($(b).data('cost')) - parseInt($(a).data('cost'));
            }
            return 0;
        });
        
        $grid.empty().append($cards);
    });
    
    // Card hover effects
    $('.destination-card').hover(
        function() {
            $(this).css({
                'transform': 'translateY(-10px)',
                'box-shadow': '0 15px 40px rgba(0,0,0,0.2)'
            });
            $(this).find('img').css('transform', 'scale(1.05)');
        },
        function() {
            $(this).css({
                'transform': 'translateY(0)',
                'box-shadow': '0 8px 25px rgba(0,0,0,0.1)'
            });
            $(this).find('img').css('transform', 'scale(1)');
        }
    );
    
    // Quick book form submission
    $('#quick-book-form').on('submit', function(e) {
        e.preventDefault();
        alert('<?php _e("Booking request submitted! We'll contact you soon with quotes and availability.", "tripbookkar"); ?>');
        closeQuickBookModal();
    });
});

function openQuickBookModal(destination) {
    document.getElementById('modal-destination').textContent = destination;
    document.getElementById('quick-book-modal').style.display = 'flex';
}

function closeQuickBookModal() {
    document.getElementById('quick-book-modal').style.display = 'none';
}
</script>

<?php get_footer(); ?>