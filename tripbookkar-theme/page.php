<?php
/**
 * The template for displaying all pages
 *
 * @package TripBookKar
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'tripbookkar'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div><!-- .entry-content -->

                <?php if (get_edit_post_link()) : ?>
                    <footer class="entry-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __('Edit <span class="screen-reader-text">%s</span>', 'tripbookkar'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer><!-- .entry-footer -->
                <?php endif; ?>
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>
    </div><!-- .container -->
</main><!-- #primary -->

<style>
.page-content {
    background: white;
    padding: 60px 40px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-top: 40px;
    margin-bottom: 60px;
}

.entry-header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 30px;
    border-bottom: 2px solid #f0f0f0;
}

.entry-title {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 0;
    font-weight: 700;
}

.entry-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #444;
}

.entry-content h2,
.entry-content h3,
.entry-content h4,
.entry-content h5,
.entry-content h6 {
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

.entry-content ul,
.entry-content ol {
    margin-bottom: 20px;
    padding-left: 30px;
}

.entry-content li {
    margin-bottom: 8px;
}

.entry-content img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.entry-content blockquote {
    background: #f8f9fa;
    border-left: 4px solid #e74c3c;
    padding: 20px 30px;
    margin: 30px 0;
    font-style: italic;
    border-radius: 5px;
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

.entry-footer {
    text-align: center;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #eee;
}

.edit-link a {
    color: #666;
    text-decoration: none;
    font-size: 14px;
}

.edit-link a:hover {
    color: #e74c3c;
}

@media (max-width: 768px) {
    .page-content {
        padding: 40px 20px;
        margin-top: 20px;
    }
    
    .entry-title {
        font-size: 2rem;
    }
    
    .entry-content {
        font-size: 1rem;
    }
}
</style>

<?php
get_footer();
?>