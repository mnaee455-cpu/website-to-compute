<?php
/**
 * Template part for displaying destination content
 *
 * @package TripBookKar
 * @version 1.0.0
 */

$destination_price = get_post_meta(get_the_ID(), 'destination_starting_price', true);
$destination_duration = get_post_meta(get_the_ID(), 'destination_duration', true);
$destination_best_time = get_post_meta(get_the_ID(), 'destination_best_time', true);
?>

<div class="destination-card" data-aos="fade-up">
    <div class="destination-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('tripbookkar-destination', array('class' => 'destination-img')); ?>
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=300&q=80" 
                     alt="<?php echo esc_attr(get_the_title()); ?>" class="destination-img">
            </a>
        <?php endif; ?>
        
        <div class="destination-overlay">
            <div class="destination-actions">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-small">
                    <?php esc_html_e('View Details', 'tripbookkar'); ?>
                </a>
                <button class="btn btn-primary btn-small" onclick="openBookingModal('<?php echo esc_js(get_the_title()); ?>')">
                    <?php esc_html_e('Book Now', 'tripbookkar'); ?>
                </button>
            </div>
        </div>
        
        <?php if ($destination_best_time) : ?>
        <div class="destination-badge">
            <i class="fas fa-calendar-alt" aria-hidden="true"></i>
            <?php echo esc_html($destination_best_time); ?>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="destination-card-content">
        <div class="destination-header">
            <h3 class="destination-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            
            <div class="destination-rating">
                <div class="stars">
                    <?php
                    $rating = get_post_meta(get_the_ID(), 'destination_rating', true);
                    $rating = $rating ? $rating : 4.5; // Default rating
                    $full_stars = floor($rating);
                    $half_star = ($rating - $full_stars) >= 0.5;
                    
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $full_stars) {
                            echo '<i class="fas fa-star"></i>';
                        } elseif ($i == $full_stars + 1 && $half_star) {
                            echo '<i class="fas fa-star-half-alt"></i>';
                        } else {
                            echo '<i class="far fa-star"></i>';
                        }
                    }
                    ?>
                </div>
                <span class="rating-text"><?php echo esc_html($rating); ?></span>
            </div>
        </div>
        
        <div class="destination-excerpt">
            <?php if (has_excerpt()) : ?>
                <?php the_excerpt(); ?>
            <?php else : ?>
                <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
            <?php endif; ?>
        </div>
        
        <div class="destination-meta">
            <?php if ($destination_duration) : ?>
            <div class="meta-item">
                <i class="fas fa-clock" aria-hidden="true"></i>
                <span><?php echo esc_html($destination_duration); ?></span>
            </div>
            <?php endif; ?>
            
            <div class="meta-item">
                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                <span>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'destination_category');
                    if ($terms && !is_wp_error($terms)) {
                        echo esc_html($terms[0]->name);
                    } else {
                        echo esc_html__('International', 'tripbookkar');
                    }
                    ?>
                </span>
            </div>
        </div>
        
        <div class="destination-footer">
            <div class="destination-price">
                <?php if ($destination_price) : ?>
                    <span class="price-label"><?php esc_html_e('Starting from', 'tripbookkar'); ?></span>
                    <span class="price-amount">$<?php echo esc_html(number_format($destination_price)); ?></span>
                    <span class="price-unit"><?php esc_html_e('per person', 'tripbookkar'); ?></span>
                <?php else : ?>
                    <span class="price-label"><?php esc_html_e('Contact for pricing', 'tripbookkar'); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="destination-cta">
                <a href="<?php the_permalink(); ?>" class="view-details-btn">
                    <?php esc_html_e('Learn More', 'tripbookkar'); ?>
                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>