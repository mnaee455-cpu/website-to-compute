<?php
/**
 * Template part for displaying package content
 *
 * @package TripBookKar
 * @version 1.0.0
 */

$package_price = get_post_meta(get_the_ID(), 'package_price', true);
$package_duration = get_post_meta(get_the_ID(), 'package_duration', true);
$package_includes = get_post_meta(get_the_ID(), 'package_includes', true);
$package_highlights = get_post_meta(get_the_ID(), 'package_highlights', true);
?>

<div class="package-card" data-aos="fade-up">
    <div class="package-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('tripbookkar-package', array('class' => 'package-img')); ?>
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>">
                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&auto=format&fit=crop&w=350&h=200&q=80" 
                     alt="<?php echo esc_attr(get_the_title()); ?>" class="package-img">
            </a>
        <?php endif; ?>
        
        <div class="package-overlay">
            <div class="package-actions">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-small">
                    <?php esc_html_e('View Details', 'tripbookkar'); ?>
                </a>
                <button class="btn btn-primary btn-small" onclick="openBookingModal('package', '<?php echo esc_js(get_the_title()); ?>')">
                    <?php esc_html_e('Book Now', 'tripbookkar'); ?>
                </button>
            </div>
        </div>
        
        <?php
        $discount = get_post_meta(get_the_ID(), 'package_discount', true);
        if ($discount) :
        ?>
        <div class="package-badge discount-badge">
            <?php echo esc_html($discount); ?>% <?php esc_html_e('OFF', 'tripbookkar'); ?>
        </div>
        <?php endif; ?>
        
        <?php if (get_post_meta(get_the_ID(), 'package_featured', true)) : ?>
        <div class="package-badge featured-badge">
            <i class="fas fa-star" aria-hidden="true"></i>
            <?php esc_html_e('Featured', 'tripbookkar'); ?>
        </div>
        <?php endif; ?>
    </div>
    
    <div class="package-card-content">
        <div class="package-header">
            <h4 class="package-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            
            <div class="package-rating">
                <div class="stars">
                    <?php
                    $rating = get_post_meta(get_the_ID(), 'package_rating', true);
                    $rating = $rating ? $rating : 4.7; // Default rating
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
                <span class="rating-count">(<?php echo esc_html(rand(50, 200)); ?> reviews)</span>
            </div>
        </div>
        
        <div class="package-excerpt">
            <?php if (has_excerpt()) : ?>
                <?php the_excerpt(); ?>
            <?php else : ?>
                <?php echo wp_trim_words(get_the_content(), 25, '...'); ?>
            <?php endif; ?>
        </div>
        
        <div class="package-details">
            <?php if ($package_duration) : ?>
            <div class="package-detail-item">
                <i class="fas fa-clock" aria-hidden="true"></i>
                <span><?php echo esc_html($package_duration); ?></span>
            </div>
            <?php endif; ?>
            
            <div class="package-detail-item">
                <i class="fas fa-users" aria-hidden="true"></i>
                <span><?php esc_html_e('2-8 People', 'tripbookkar'); ?></span>
            </div>
            
            <div class="package-detail-item">
                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                <span>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'package_category');
                    if ($terms && !is_wp_error($terms)) {
                        echo esc_html($terms[0]->name);
                    } else {
                        echo esc_html__('Multi-destination', 'tripbookkar');
                    }
                    ?>
                </span>
            </div>
        </div>
        
        <?php if ($package_includes) : ?>
        <div class="package-features">
            <h5><?php esc_html_e('Package Includes:', 'tripbookkar'); ?></h5>
            <ul class="features-list">
                <?php
                $includes = explode("\n", $package_includes);
                $displayed = 0;
                foreach ($includes as $include) {
                    $include = trim($include);
                    if ($include && $displayed < 4) {
                        // Remove bullet points if they exist
                        $include = preg_replace('/^[•\-\*]\s*/', '', $include);
                        echo '<li>' . esc_html($include) . '</li>';
                        $displayed++;
                    }
                }
                if (count($includes) > 4) {
                    echo '<li class="more-features">+' . (count($includes) - 4) . ' more</li>';
                }
                ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <div class="package-footer">
            <div class="package-price">
                <?php if ($package_price) : ?>
                    <?php if ($discount) : ?>
                        <span class="original-price">$<?php echo esc_html(number_format($package_price * (1 + $discount/100))); ?></span>
                    <?php endif; ?>
                    <span class="current-price">$<?php echo esc_html(number_format($package_price)); ?></span>
                    <span class="price-unit"><?php esc_html_e('per person', 'tripbookkar'); ?></span>
                <?php else : ?>
                    <span class="contact-price"><?php esc_html_e('Contact for pricing', 'tripbookkar'); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="package-actions-footer">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-small">
                    <?php esc_html_e('View Details', 'tripbookkar'); ?>
                </a>
                <button class="btn btn-primary btn-small" onclick="openBookingModal('package', '<?php echo esc_js(get_the_title()); ?>')">
                    <?php esc_html_e('Book Now', 'tripbookkar'); ?>
                </button>
            </div>
        </div>
    </div>
</div>