<?php
/**
 * Template part for displaying testimonial content
 *
 * @package TripBookKar
 * @version 1.0.0
 */

$testimonial_author = get_post_meta(get_the_ID(), 'testimonial_author', true);
$testimonial_position = get_post_meta(get_the_ID(), 'testimonial_position', true);
$testimonial_rating = get_post_meta(get_the_ID(), 'testimonial_rating', true);
?>

<div class="testimonial-card" data-aos="fade-up">
    <div class="testimonial-content">
        <div class="quote-icon">
            <i class="fas fa-quote-left" aria-hidden="true"></i>
        </div>
        
        <div class="testimonial-text">
            <?php if (has_excerpt()) : ?>
                <p>"<?php echo get_the_excerpt(); ?>"</p>
            <?php else : ?>
                <p>"<?php echo wp_trim_words(get_the_content(), 30, '...'); ?>"</p>
            <?php endif; ?>
        </div>
        
        <?php if ($testimonial_rating) : ?>
        <div class="testimonial-rating">
            <div class="stars">
                <?php
                $rating = intval($testimonial_rating);
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<i class="fas fa-star"></i>';
                    } else {
                        echo '<i class="far fa-star"></i>';
                    }
                }
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="testimonial-author">
        <div class="author-avatar">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('tripbookkar-thumbnail', array('class' => 'testimonial-avatar')); ?>
            <?php else : ?>
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($testimonial_author ? $testimonial_author : 'User'); ?>&background=3498db&color=fff&size=60" 
                     alt="<?php echo esc_attr($testimonial_author ? $testimonial_author : 'Customer'); ?>" 
                     class="testimonial-avatar">
            <?php endif; ?>
        </div>
        
        <div class="author-info">
            <h5 class="author-name">
                <?php echo $testimonial_author ? esc_html($testimonial_author) : esc_html__('Happy Customer', 'tripbookkar'); ?>
            </h5>
            <?php if ($testimonial_position) : ?>
                <span class="author-position"><?php echo esc_html($testimonial_position); ?></span>
            <?php endif; ?>
            
            <div class="testimonial-meta">
                <span class="testimonial-date">
                    <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                    <?php echo get_the_date('M Y'); ?>
                </span>
                
                <?php if (get_post_meta(get_the_ID(), 'testimonial_verified', true)) : ?>
                <span class="verified-badge">
                    <i class="fas fa-check-circle" aria-hidden="true"></i>
                    <?php esc_html_e('Verified', 'tripbookkar'); ?>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php
    $trip_destination = get_post_meta(get_the_ID(), 'testimonial_trip_destination', true);
    if ($trip_destination) :
    ?>
    <div class="testimonial-trip">
        <div class="trip-info">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
            <span><?php esc_html_e('Trip to', 'tripbookkar'); ?> <?php echo esc_html($trip_destination); ?></span>
        </div>
    </div>
    <?php endif; ?>
</div>