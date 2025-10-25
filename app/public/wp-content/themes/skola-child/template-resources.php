<?php
/**
 * Template Name: Resources - Full Width
 * Description: Custom template for Resources hub page
 */

get_header();
?>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

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
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        line-height: 1.6;
        color: #333;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 80px 20px;
        text-align: center;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        line-height: 1.2;
        color: white;
        font-weight: 700;
    }

    .hero p {
        font-size: 1.3rem;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.95;
    }

    /* Main Content */
    .resources-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .section-intro {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-intro h2 {
        font-size: 2.5rem;
        color: #134958;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .section-intro p {
        font-size: 1.1rem;
        color: #134958;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Resource Grid */
    .resources-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 60px;
    }

    .resource-card {
        background: white;
        border-radius: 16px;
        padding: 0;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(40, 175, 207, 0.15);
        transition: all 0.3s ease;
        border: 2px solid #28AFCF;
        text-decoration: none;
        display: block;
    }

    .resource-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(40, 175, 207, 0.3);
        border-color: #FF7F07;
    }

    .resource-card-header {
        padding: 30px;
        background: linear-gradient(135deg, #ecfeff 0%, #cffafe 100%);
        border-bottom: 3px solid #28AFCF;
    }

    .resource-card-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }

    .resource-card h3 {
        font-size: 1.5rem;
        color: #134958;
        margin: 0;
        font-weight: 700;
    }

    .resource-card-body {
        padding: 30px;
    }

    .resource-card p {
        color: #334155;
        margin-bottom: 20px;
        line-height: 1.7;
    }

    .resource-card-footer {
        display: flex;
        align-items: center;
        color: #28AFCF;
        font-weight: 600;
    }

    .resource-card-footer span {
        margin-left: 8px;
        transition: margin-left 0.3s ease;
    }

    .resource-card:hover .resource-card-footer span {
        margin-left: 15px;
    }

    /* Category Sections */
    .category-section {
        margin-bottom: 70px;
        background: linear-gradient(135deg, rgba(236, 254, 255, 0.3) 0%, rgba(207, 250, 254, 0.3) 100%);
        padding: 40px;
        border-radius: 16px;
    }

    .category-header {
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 4px solid #28AFCF;
    }

    .category-header h2 {
        font-size: 2rem;
        color: #134958;
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .category-icon {
        font-size: 2rem;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #134958, #28AFCF);
        color: white;
        text-align: center;
        padding: 60px 40px;
        border-radius: 16px;
        margin: 60px 0;
    }

    .cta-section h2 {
        font-size: 2.5rem;
        color: white;
        margin: 0 0 20px 0;
        font-weight: 700;
    }

    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-btn {
        background: #FF7F07;
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .cta-btn:hover {
        background: #e66f00;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(255, 127, 7, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }

        .hero p {
            font-size: 1.1rem;
        }

        .resources-grid {
            grid-template-columns: 1fr;
        }

        .section-intro h2,
        .category-header h2 {
            font-size: 1.75rem;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
        <article>
            <!-- Hero Section -->
            <section class="hero">
                <h1>Test Prep Resources</h1>
                <p>Everything you need to make informed decisions about SAT and ACT preparation for your college journey</p>
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
                        <div class="category-header">
                            <h2><span class="category-icon">📚</span> Available Resources</h2>
                        </div>
                        <div class="resources-grid">
                            <?php while ($resources_query->have_posts()) : $resources_query->the_post();
                                // Get custom fields for icon and description
                                $icon = get_post_meta(get_the_ID(), 'resource_icon', true);
                                $icon = $icon ? $icon : '📄'; // Default icon

                                $description = get_post_meta(get_the_ID(), 'resource_description', true);
                                if (!$description) {
                                    // Fallback to excerpt or content
                                    $description = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30, '...');
                                }

                                $cta_text = get_post_meta(get_the_ID(), 'resource_cta_text', true);
                                $cta_text = $cta_text ? $cta_text : 'Learn More'; // Default CTA
                            ?>
                                <a href="<?php the_permalink(); ?>" class="resource-card">
                                    <div class="resource-card-header">
                                        <div class="resource-card-icon"><?php echo esc_html($icon); ?></div>
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <div class="resource-card-body">
                                        <p><?php echo esc_html($description); ?></p>
                                        <div class="resource-card-footer">
                                            <?php echo esc_html($cta_text); ?> <span>→</span>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </section>
                <?php
                    wp_reset_postdata();
                else :
                ?>
                    <div style="text-align: center; padding: 60px 20px;">
                        <p style="font-size: 1.2rem; color: #64748b;">No resources available yet. Add pages as children of this Resources page to display them here.</p>
                    </div>
                <?php endif; ?>

                <!-- CTA Section -->
                <section class="cta-section">
                    <h2>Need Help Choosing Your Path?</h2>
                    <p>Our expert instructors are here to guide you through test selection, prep strategies, and achieving your target scores. Get started with a free consultation.</p>
                    <a href="/student-enrollment/" class="cta-btn">Schedule Free Consultation</a>
                </section>
            </div>
        </article>
        <?php endwhile; ?>
    </main>
</div>

<?php
get_footer();
