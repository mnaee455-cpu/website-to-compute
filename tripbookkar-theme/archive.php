<?php
/**
 * The template for displaying archive pages
 *
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        
        <?php if (have_posts()) : ?>
            
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    if (is_category()) {
                        printf(__('Category: %s', 'tripbookkar'), '<span>' . single_cat_title('', false) . '</span>');
                    } elseif (is_tag()) {
                        printf(__('Tag: %s', 'tripbookkar'), '<span>' . single_tag_title('', false) . '</span>');
                    } elseif (is_author()) {
                        printf(__('Author: %s', 'tripbookkar'), '<span class="vcard">' . get_the_author() . '</span>');
                    } elseif (is_date()) {
                        if (is_year()) {
                            printf(__('Year: %s', 'tripbookkar'), get_the_date('Y'));
                        } elseif (is_month()) {
                            printf(__('Month: %s', 'tripbookkar'), get_the_date('F Y'));
                        } elseif (is_day()) {
                            printf(__('Day: %s', 'tripbookkar'), get_the_date('F j, Y'));
                        }
                    } elseif (is_post_type_archive('destinations')) {
                        _e('All Destinations', 'tripbookkar');
                    } elseif (is_post_type_archive('packages')) {
                        _e('Holiday Packages', 'tripbookkar');
                    } else {
                        _e('Archives', 'tripbookkar');
                    }
                    ?>
                </h1>
                
                <?php
                $description = get_the_archive_description();
                if ($description) :
                ?>
                    <div class="archive-description"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?>
            </header><!-- .page-header -->
            
            <div class="row">
                <div class="col-8">
                    <div class="posts-container">
                        <?php while (have_posts()) : the_post(); ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class('archive-post'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('tripbookkar-featured', array('class' => 'card-image')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                📅 <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                    <?php echo get_the_date(); ?>
                                                </time>
                                            </span>
                                            <span class="byline">
                                                👤 <?php _e('by', 'tripbookkar'); ?> 
                                                <span class="author vcard">
                                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <?php echo get_the_author(); ?>
                                                    </a>
                                                </span>
                                            </span>
                                        </div><!-- .entry-meta -->
                                    </header><!-- .entry-header -->
                                    
                                    <div class="entry-summary">
                                        <?php
                                        if (has_excerpt()) {
                                            the_excerpt();
                                        } else {
                                            echo wp_trim_words(get_the_content(), 30, '...');
                                        }
                                        ?>
                                    </div><!-- .entry-summary -->
                                    
                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                                            <?php _e('Read More', 'tripbookkar'); ?>
                                        </a>
                                    </footer><!-- .entry-footer -->
                                </div><!-- .post-content -->
                            </article><!-- #post-<?php the_ID(); ?> -->
                            
                        <?php endwhile; ?>
                        
                        <?php
                        // Pagination
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('Previous', 'tripbookkar'),
                            'next_text' => __('Next', 'tripbookkar'),
                        ));
                        ?>
                        
                    </div><!-- .posts-container -->
                </div><!-- .col-8 -->
                
                <div class="col-4">
                    <?php get_sidebar(); ?>
                </div><!-- .col-4 -->
            </div><!-- .row -->
            
        <?php else : ?>
            
            <div class="no-results">
                <h1 class="page-title"><?php _e('Nothing Found', 'tripbookkar'); ?></h1>
                <div class="page-content">
                    <p><?php _e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'tripbookkar'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </div><!-- .no-results -->
            
        <?php endif; ?>
        
    </div><!-- .container -->
</main><!-- #primary -->

<style>
.page-header {
    text-align: center;
    padding: 60px 0;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 40px;
}

.page-title {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: 700;
}

.page-title span {
    color: #e74c3c;
}

.archive-description {
    font-size: 1.1rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.archive-post {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 40px;
    transition: all 0.3s ease;
    display: flex;
    gap: 0;
}

.archive-post:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.post-thumbnail {
    flex: 0 0 300px;
    position: relative;
    overflow: hidden;
}

.post-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.archive-post:hover .post-thumbnail img {
    transform: scale(1.05);
}

.post-content {
    flex: 1;
    padding: 30px;
    display: flex;
    flex-direction: column;
}

.entry-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.entry-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.entry-title a:hover {
    color: #e74c3c;
}

.entry-meta {
    display: flex;
    gap: 20px;
    color: #666;
    font-size: 14px;
    margin-bottom: 15px;
}

.entry-meta a {
    color: #666;
    text-decoration: none;
}

.entry-meta a:hover {
    color: #e74c3c;
}

.entry-summary {
    flex: 1;
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.entry-footer {
    margin-top: auto;
}

.no-results {
    text-align: center;
    padding: 80px 0;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.no-results .page-title {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
}

.no-results .page-content {
    max-width: 600px;
    margin: 0 auto;
}

/* Special styling for custom post types */
.post-type-archive-destinations .archive-post,
.post-type-archive-packages .archive-post {
    flex-direction: column;
    max-width: 350px;
    margin: 0 auto 30px;
}

.post-type-archive-destinations .post-thumbnail,
.post-type-archive-packages .post-thumbnail {
    flex: none;
    height: 250px;
}

.post-type-archive-destinations .posts-container,
.post-type-archive-packages .posts-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
}

/* Package specific styling */
.post-type-archive-packages .archive-post .post-content::after {
    content: attr(data-price);
    background: #e74c3c;
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: 600;
    align-self: flex-start;
    margin-top: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    .archive-post {
        flex-direction: column;
    }
    
    .post-thumbnail {
        flex: none;
        height: 200px;
    }
    
    .post-content {
        padding: 20px;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .entry-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .posts-container {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>