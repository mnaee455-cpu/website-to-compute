<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <?php if (have_posts()) : ?>
        
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="posts-container">
                        <?php
                        // Start the Loop.
                        while (have_posts()) :
                            the_post();
                            ?>
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('tripbookkar-featured', array('class' => 'card-image')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="card-content">
                                    <header class="entry-header">
                                        <h2 class="card-title">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                    <?php echo get_the_date(); ?>
                                                </time>
                                            </span>
                                            <span class="byline">
                                                <?php _e('by', 'tripbookkar'); ?> 
                                                <span class="author vcard">
                                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <?php echo get_the_author(); ?>
                                                    </a>
                                                </span>
                                            </span>
                                        </div><!-- .entry-meta -->
                                    </header><!-- .entry-header -->
                                    
                                    <div class="entry-content">
                                        <?php
                                        if (has_excerpt()) {
                                            the_excerpt();
                                        } else {
                                            echo wp_trim_words(get_the_content(), 30, '...');
                                        }
                                        ?>
                                    </div><!-- .entry-content -->
                                    
                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                                            <?php _e('Read More', 'tripbookkar'); ?>
                                        </a>
                                    </footer><!-- .entry-footer -->
                                </div><!-- .card-content -->
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
        </div><!-- .container -->
        
    <?php else : ?>
        
        <div class="container">
            <div class="no-results">
                <h1 class="page-title"><?php _e('Nothing here', 'tripbookkar'); ?></h1>
                <div class="page-content">
                    <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'tripbookkar'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </div><!-- .no-results -->
        </div><!-- .container -->
        
    <?php endif; ?>
    
</main><!-- #primary -->

<style>
.posts-container {
    margin-bottom: 60px;
}

.post-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 40px;
    transition: all 0.3s ease;
}

.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.post-thumbnail {
    position: relative;
    overflow: hidden;
}

.post-thumbnail img {
    transition: transform 0.3s ease;
}

.post-card:hover .post-thumbnail img {
    transform: scale(1.05);
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

.no-results {
    text-align: center;
    padding: 80px 0;
}

.page-title {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
}

.page-content {
    max-width: 600px;
    margin: 0 auto;
}

/* Pagination Styles */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 40px;
}

.page-numbers {
    display: inline-block;
    padding: 10px 15px;
    background: white;
    color: #333;
    text-decoration: none;
    border-radius: 5px;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.page-numbers:hover,
.page-numbers.current {
    background: #e74c3c;
    color: white;
    border-color: #e74c3c;
}

.page-numbers.prev,
.page-numbers.next {
    background: #3498db;
    color: white;
    border-color: #3498db;
}

.page-numbers.prev:hover,
.page-numbers.next:hover {
    background: #2980b9;
    border-color: #2980b9;
}
</style>

<?php
get_footer();
?>