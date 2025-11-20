<?php
/**
 * Custom Single Post Template - NYC STEM Club
 * Clean, modern blog post layout with perfect typography
 */

get_header();

// Add structured data (Schema.org) for SEO
if (have_posts()) {
    the_post();
    $schema_data = array(
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => get_the_title(),
        'author' => array(
            '@type' => 'Organization',
            'name' => 'NYC STEM Club',
            'url' => home_url()
        ),
        'publisher' => array(
            '@type' => 'Organization',
            'name' => 'NYC STEM Club',
            'logo' => array(
                '@type' => 'ImageObject',
                'url' => get_site_icon_url()
            )
        ),
        'datePublished' => get_the_date('c'),
        'dateModified' => get_the_modified_date('c'),
        'mainEntityOfPage' => get_permalink(),
        'description' => get_the_excerpt(),
    );

    // Add image if available
    if (has_post_thumbnail()) {
        $schema_data['image'] = array(
            '@type' => 'ImageObject',
            'url' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
            'width' => 1200,
            'height' => 630
        );
    }

    // Add categories and tags
    $categories = get_the_category();
    if (!empty($categories)) {
        $schema_data['articleSection'] = $categories[0]->name;
    }

    $tags = get_the_tags();
    if ($tags) {
        $schema_data['keywords'] = implode(', ', wp_list_pluck($tags, 'name'));
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema_data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    rewind_posts();
}
?>

<div id="primary" class="content-area nyc-custom-blog">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('nyc-blog-article'); ?>>

            <!-- Blog Header -->
            <header class="nyc-blog-header">
                <div class="nyc-blog-header-container">

                    <?php
                    // Categories
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<div class="nyc-blog-categories">';
                        foreach ( $categories as $category ) {
                            echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="nyc-blog-category">' . esc_html( $category->name ) . '</a>';
                        }
                        echo '</div>';
                    }
                    ?>

                    <h1 class="nyc-blog-title"><?php the_title(); ?></h1>

                    <div class="nyc-blog-meta">
                        <span class="nyc-blog-date">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            <?php echo get_the_date('F j, Y'); ?>
                        </span>
                        <span class="nyc-blog-reading-time">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                            <?php
                            $content = get_post_field( 'post_content', get_the_ID() );
                            $word_count = str_word_count( strip_tags( $content ) );
                            $reading_time = ceil( $word_count / 200 );
                            echo $reading_time . ' min read';
                            ?>
                        </span>
                    </div>

                    <?php if ( has_excerpt() ) : ?>
                        <div class="nyc-blog-excerpt">
                            <?php echo wp_kses_post( get_the_excerpt() ); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </header>

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="nyc-blog-featured-image">
                    <div class="nyc-blog-featured-image-container">
                        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Blog Content -->
            <div class="nyc-blog-content">
                <div class="nyc-blog-content-container">
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- Blog Footer -->
            <footer class="nyc-blog-footer">
                <div class="nyc-blog-footer-container">

                    <?php
                    // Tags
                    $tags = get_the_tags();
                    if ( $tags ) {
                        echo '<div class="nyc-blog-tags">';
                        echo '<span class="nyc-blog-tags-label">Tags:</span>';
                        foreach ( $tags as $tag ) {
                            echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="nyc-blog-tag">' . esc_html( $tag->name ) . '</a>';
                        }
                        echo '</div>';
                    }
                    ?>

                    <!-- Share Buttons -->
                    <div class="nyc-blog-share">
                        <span class="nyc-blog-share-label">Share:</span>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="nyc-blog-share-btn nyc-share-twitter" aria-label="Share on Twitter">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="nyc-blog-share-btn nyc-share-facebook" aria-label="Share on Facebook">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="nyc-blog-share-btn nyc-share-linkedin" aria-label="Share on LinkedIn">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                        </a>
                        <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="nyc-blog-share-btn nyc-share-email" aria-label="Share via Email">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </a>
                    </div>

                </div>
            </footer>

        </article>

        <?php
        // Related Posts
        $related_args = array(
            'category__in'   => wp_get_post_categories( get_the_ID() ),
            'post__not_in'   => array( get_the_ID() ),
            'posts_per_page' => 3,
        );
        $related_posts = new WP_Query( $related_args );

        if ( $related_posts->have_posts() ) :
        ?>
            <section class="nyc-related-posts">
                <div class="nyc-related-posts-container">
                    <h2 class="nyc-related-posts-title">Related Articles</h2>
                    <div class="nyc-related-posts-grid">
                        <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                            <article class="nyc-related-post-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="nyc-related-post-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="nyc-related-post-content">
                                    <h3 class="nyc-related-post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="nyc-related-post-excerpt">
                                        <?php echo wp_trim_words( get_the_excerpt(), 15 ); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="nyc-related-post-link">
                                        Read More →
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php
            wp_reset_postdata();
        endif;
        ?>

        <!-- Testimonials Section -->
        <?php echo do_shortcode('[testimonials]'); ?>

    <?php
    endwhile; // End of the loop.
    ?>

    </main>
</div>

<?php
get_footer();
