<?php
/**
 * Template Name: Resources - Full Width
 * Description: Custom template for Resources hub page
 */

get_header();
?>

<style>
    /* Reset WordPress theme styles for this custom page */
    #primary.content-area,
    .site-main,
    .entry-content,
    article {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        background: white !important;
    }

    /* Hide default WordPress elements */
    .entry-header,
    .entry-footer,
    .post-navigation,
    .page-header {
        display: none !important;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.7;
        color: #334155;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 40px 0;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero H1 - Mobile first: 32px (Industry standard) */
    .hero h1 {
        font-size: 32px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 16px;
        color: white;
        letter-spacing: -1px;
        text-align: left;
    }

    /* Tablet: 40px (Industry standard) */
    @media (min-width: 768px) {
        .hero h1 {
            font-size: 40px;
        }
    }

    /* Desktop: 48px (Industry standard) */
    @media (min-width: 1024px) {
        .hero h1 {
            font-size: 48px;
        }
    }

    .hero p {
        font-size: 18px;
        line-height: 1.6;
        margin: 0;
        color: white;
        text-align: left;
    }

    /* Main Content */
    .resources-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 8px 20px;
    }

    .section-intro {
        text-align: center;
        margin-bottom: 20px;
    }

    .section-intro h2 {
        font-size: 32px;
        color: #134958;
        margin-bottom: 16px;
        font-weight: 700;
        line-height: 1.3;
    }

    .section-intro p {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Resource List */
    .resources-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .resource-item {
        border-bottom: 1px solid #e2e8f0;
        padding: 12px 0;
        transition: all 0.2s ease;
    }

    .resource-item:last-child {
        border-bottom: none;
    }

    .resource-item:hover {
        padding-left: 12px;
        background: #f8fafc;
    }

    .resource-link {
        text-decoration: none;
        display: block;
        color: inherit;
    }

    .resource-link h4 {
        font-size: 18px;
        color: #134958;
        margin: 0 0 4px 0;
        font-weight: 600;
        line-height: 1.4;
        transition: color 0.2s ease;
    }

    .resource-link:hover h4 {
        color: #28AFCF;
    }

    .resource-description {
        color: #64748b;
        line-height: 1.5;
        margin: 0;
        font-size: 14px;
    }

    /* Category Sections */
    .category-section {
        margin-bottom: 16px;
    }


    /* Responsive */
    @media (max-width: 768px) {
        /* Left-align all content on mobile */
        .section-intro,
        .section-intro h2,
        .section-intro p,
        .resource-link h4,
        .resource-description {
            text-align: left !important;
        }

        .hero {
            padding: 30px 0;
        }

        .hero-container {
            padding: 0 16px;
        }

        .hero p {
            font-size: 16px !important;
        }

        .resources-container {
            padding: 20px 16px;
        }

        .resource-item {
            padding: 10px 0;
        }

        .resource-link h4 {
            font-size: 16px !important;
        }

        .resource-description {
            font-size: 13px !important;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
        <article>
            <!-- Hero Section -->
            <section class="hero">
                <div class="hero-container">
                    <h1>Resources</h1>
                </div>
            </section>

            <!-- Main Content -->
            <div class="resources-container">
                <?php
                // Get the current page ID safely
                global $post;
                $current_page_id = isset($post->ID) ? $post->ID : 0;

                // Get all child pages of the current Resources page
                $resources_args = array(
                    'post_type'      => 'page',
                    'post_parent'    => $current_page_id,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'posts_per_page' => -1,
                );

                $resources_query = new WP_Query($resources_args);

                if ($resources_query->have_posts()) :
                ?>
                    <!-- All Resources -->
                    <section class="category-section">
                        <ul class="resources-list">
                            <?php while ($resources_query->have_posts()) : $resources_query->the_post();
                                $description = get_post_meta(get_the_ID(), 'resource_description', true);
                                if (!$description) {
                                    // Fallback to excerpt or content
                                    $description = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30, '...');
                                }
                            ?>
                                <li class="resource-item">
                                    <a href="<?php the_permalink(); ?>" class="resource-link">
                                        <h4><?php the_title(); ?></h4>
                                        <p class="resource-description"><?php echo esc_html($description); ?></p>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </section>
                <?php
                    wp_reset_postdata();
                else :
                ?>
                    <div style="text-align: center; padding: 60px 20px;">
                        <p style="font-size: 1.2rem; color: #64748b;">No resources available yet. Add pages as children of this Resources page to display them here.</p>
                    </div>
                <?php endif; ?>
            </div>
        </article>
        <?php endwhile; ?>
    </main>
</div>

<?php
get_footer();
