<?php
/**
 * The template for displaying all single posts
 *
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image">
                                <?php the_post_thumbnail('tripbookkar-featured'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        📅 <?php echo get_the_date(); ?>
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
                                <span class="comments-link">
                                    💬 <a href="#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a>
                                </span>
                            </div><!-- .entry-meta -->
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php
                            the_content(sprintf(
                                wp_kses(
                                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'tripbookkar'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ));

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . __('Pages:', 'tripbookkar'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer">
                            <div class="entry-categories">
                                <?php
                                $categories_list = get_the_category_list(', ');
                                if ($categories_list) :
                                    printf('<span class="cat-links">🏷️ ' . __('Posted in %1$s', 'tripbookkar') . '</span>', $categories_list);
                                endif;
                                ?>
                            </div>
                            
                            <div class="entry-tags">
                                <?php
                                $tags_list = get_the_tag_list('', ', ');
                                if ($tags_list) :
                                    printf('<span class="tags-links">🔖 ' . __('Tagged %1$s', 'tripbookkar') . '</span>', $tags_list);
                                endif;
                                ?>
                            </div>
                        </footer><!-- .entry-footer -->
                        
                        <!-- Author Bio -->
                        <?php if (get_the_author_meta('description')) : ?>
                            <div class="author-bio">
                                <div class="author-avatar">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                                </div>
                                <div class="author-info">
                                    <h3><?php _e('About', 'tripbookkar'); ?> <?php echo get_the_author(); ?></h3>
                                    <p><?php echo get_the_author_meta('description'); ?></p>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="btn btn-secondary">
                                        <?php _e('View All Posts', 'tripbookkar'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Post Navigation -->
                        <nav class="post-navigation">
                            <div class="nav-links">
                                <?php
                                $prev_post = get_previous_post();
                                $next_post = get_next_post();
                                
                                if ($prev_post) :
                                ?>
                                    <div class="nav-previous">
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>" rel="prev">
                                            <span class="nav-subtitle">← <?php _e('Previous Post', 'tripbookkar'); ?></span>
                                            <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($next_post) : ?>
                                    <div class="nav-next">
                                        <a href="<?php echo get_permalink($next_post->ID); ?>" rel="next">
                                            <span class="nav-subtitle"><?php _e('Next Post', 'tripbookkar'); ?> →</span>
                                            <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </nav>

                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; ?>
            </div><!-- .col-8 -->
            
            <div class="col-4">
                <?php get_sidebar(); ?>
            </div><!-- .col-4 -->
        </div><!-- .row -->
    </div><!-- .container -->
</main><!-- #primary -->

<style>
.single-post {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-top: 40px;
    margin-bottom: 60px;
}

.post-featured-image {
    margin: -40px -40px 40px -40px;
    border-radius: 15px 15px 0 0;
    overflow: hidden;
}

.post-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

.entry-header {
    margin-bottom: 40px;
}

.entry-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
    line-height: 1.2;
}

.entry-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 25px;
    color: #666;
    font-size: 14px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.entry-meta a {
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
}

.entry-meta a:hover {
    color: #e74c3c;
}

.entry-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #444;
    margin-bottom: 40px;
}

.entry-content h2,
.entry-content h3,
.entry-content h4 {
    color: #333;
    margin-top: 40px;
    margin-bottom: 20px;
}

.entry-content h2 {
    font-size: 2rem;
    border-bottom: 2px solid #e74c3c;
    padding-bottom: 10px;
}

.entry-content h3 {
    font-size: 1.5rem;
    color: #e74c3c;
}

.entry-content p {
    margin-bottom: 20px;
}

.entry-content img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin: 20px 0;
}

.entry-content blockquote {
    background: #f8f9fa;
    border-left: 4px solid #e74c3c;
    padding: 20px 30px;
    margin: 30px 0;
    font-style: italic;
    border-radius: 5px;
}

.entry-footer {
    padding: 30px 0;
    border-top: 1px solid #f0f0f0;
    border-bottom: 1px solid #f0f0f0;
    margin-bottom: 40px;
}

.entry-categories,
.entry-tags {
    margin-bottom: 15px;
}

.entry-categories a,
.entry-tags a {
    background: #f8f9fa;
    color: #666;
    padding: 5px 12px;
    border-radius: 15px;
    text-decoration: none;
    font-size: 13px;
    margin-right: 8px;
    transition: all 0.3s ease;
}

.entry-categories a:hover,
.entry-tags a:hover {
    background: #e74c3c;
    color: white;
}

.author-bio {
    display: flex;
    gap: 20px;
    background: #f8f9fa;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 40px;
}

.author-avatar img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.author-info h3 {
    margin-bottom: 15px;
    color: #333;
}

.author-info p {
    margin-bottom: 20px;
    line-height: 1.6;
    color: #666;
}

.post-navigation {
    margin-bottom: 40px;
}

.nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.nav-previous,
.nav-next {
    background: #f8f9fa;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.nav-previous:hover,
.nav-next:hover {
    background: #e74c3c;
    color: white;
}

.nav-previous a,
.nav-next a {
    display: block;
    padding: 20px;
    text-decoration: none;
    color: inherit;
}

.nav-previous:hover a,
.nav-next:hover a {
    color: white;
}

.nav-subtitle {
    display: block;
    font-size: 14px;
    color: #666;
    margin-bottom: 8px;
}

.nav-previous:hover .nav-subtitle,
.nav-next:hover .nav-subtitle {
    color: rgba(255,255,255,0.8);
}

.nav-title {
    display: block;
    font-weight: 600;
    color: #333;
    line-height: 1.3;
}

.nav-previous:hover .nav-title,
.nav-next:hover .nav-title {
    color: white;
}

.nav-next {
    text-align: right;
}

.page-links {
    text-align: center;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #eee;
}

.page-links a {
    display: inline-block;
    padding: 8px 15px;
    margin: 0 5px;
    background: #e74c3c;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.page-links a:hover {
    background: #c0392b;
}

/* Comments Section */
#comments {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 40px;
}

.comments-title {
    font-size: 1.5rem;
    margin-bottom: 30px;
    color: #333;
    border-bottom: 2px solid #e74c3c;
    padding-bottom: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    .single-post {
        padding: 20px;
        margin-top: 20px;
    }
    
    .post-featured-image {
        margin: -20px -20px 30px -20px;
    }
    
    .entry-title {
        font-size: 2rem;
    }
    
    .entry-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .author-bio {
        flex-direction: column;
        text-align: center;
    }
    
    .nav-links {
        grid-template-columns: 1fr;
    }
    
    .nav-next {
        text-align: left;
    }
}
</style>

<?php get_footer(); ?>