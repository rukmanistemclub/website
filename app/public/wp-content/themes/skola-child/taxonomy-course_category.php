<?php
/**
 * Course Category Taxonomy Template
 *
 * Template for displaying course category archives (e.g., Test Prep)
 * Replaces WooCommerce product category pages
 */

get_header();

// Get current category
$current_category = get_queried_object();
?>

<style>
    /* Reset WordPress theme styles for course category page */
    #primary.content-area,
    .site-main {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /* Category Header */
    .course-category-header {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 80px 20px;
        text-align: center;
    }

    .course-category-header h1 {
        font-size: 48px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
        color: white;
        letter-spacing: -1px;
    }

    .course-category-header .category-description {
        font-size: 18px;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto;
        color: white;
        opacity: 0.95;
    }

    /* Main Content */
    .course-category-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    /* Courses Grid */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    /* Course Card */
    .course-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .course-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .course-card-image {
        position: relative;
        padding-top: 60%;
        overflow: hidden;
        background: #f8fafc;
    }

    .course-card-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .course-category-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: #FF7F07;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .course-card-content {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .course-card-title {
        font-size: 24px;
        font-weight: 600;
        line-height: 1.3;
        margin: 0 0 16px 0;
    }

    .course-card-title a {
        color: #134958;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .course-card-title a:hover {
        color: #28AFCF;
    }

    .course-card-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 16px;
    }

    .meta-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f1f5f9;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
        color: #64748b;
        font-weight: 500;
    }

    .meta-icon {
        font-size: 16px;
    }

    .course-card-excerpt {
        font-size: 16px;
        line-height: 1.6;
        color: #64748b;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .course-card-button {
        display: inline-block;
        background: #28AFCF;
        color: white;
        padding: 12px 24px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        text-align: center;
        transition: background 0.2s ease;
        margin-top: auto;
    }

    .course-card-button:hover {
        background: #134958;
        color: white;
    }

    /* Empty State */
    .no-courses {
        text-align: center;
        padding: 60px 20px;
    }

    .no-courses h2 {
        font-size: 32px;
        color: #134958;
        margin-bottom: 16px;
        font-weight: 700;
        line-height: 1.3;
    }

    .no-courses p {
        font-size: 16px;
        color: #64748b;
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .course-category-header h1 {
            font-size: 32px;
        }

        .course-category-header .category-description {
            font-size: 16px;
        }

        .courses-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .course-card-title {
            font-size: 20px;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- Category Header -->
        <section class="course-category-header">
            <h1><?php echo esc_html($current_category->name); ?></h1>
            <?php if (!empty($current_category->description)) : ?>
                <div class="category-description">
                    <?php echo wp_kses_post($current_category->description); ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- Courses Content -->
        <div class="course-category-content">

            <?php
            // Query courses in this category
            $courses_query = new WP_Query(array(
                'post_type' => 'course',
                'posts_per_page' => -1,
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'course_category',
                        'field' => 'slug',
                        'terms' => $current_category->slug,
                    ),
                ),
            ));

            if ($courses_query->have_posts()) : ?>

                <div class="courses-grid">

                    <?php while ($courses_query->have_posts()) : $courses_query->the_post(); ?>

                        <div class="course-card">

                            <!-- Course Image -->
                            <div class="course-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>

                                <!-- Category Badge -->
                                <?php
                                $categories = get_the_terms(get_the_ID(), 'course_category');
                                if ($categories && !is_wp_error($categories)) {
                                    $first_category = array_shift($categories);
                                    echo '<span class="course-category-badge">' . esc_html($first_category->name) . '</span>';
                                }
                                ?>
                            </div>

                            <!-- Course Content -->
                            <div class="course-card-content">

                                <h2 class="course-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <!-- Meta Information -->
                                <div class="course-card-meta">
                                    <?php
                                    $duration = get_field('course_duration');
                                    $formats = get_field('class_format');

                                    if ($duration) {
                                        echo '<span class="meta-badge"><span class="meta-icon">⏱</span> ' . esc_html($duration) . '</span>';
                                    }

                                    if ($formats && is_array($formats)) {
                                        $format_labels = array(
                                            'private' => '1-on-1',
                                            'group' => 'Group',
                                        );
                                        $format_text = array();
                                        foreach ($formats as $format) {
                                            if (isset($format_labels[$format])) {
                                                $format_text[] = $format_labels[$format];
                                            }
                                        }
                                        if (!empty($format_text)) {
                                            echo '<span class="meta-badge"><span class="meta-icon">👥</span> ' . esc_html(implode(' • ', $format_text)) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>

                                <?php if (has_excerpt()) : ?>
                                    <div class="course-card-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                    </div>
                                <?php endif; ?>

                                <a href="<?php the_permalink(); ?>" class="course-card-button">Learn More</a>

                            </div>

                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>

                </div>

            <?php else : ?>

                <div class="no-courses">
                    <h2>No courses found in this category</h2>
                    <p>Check back soon for new courses!</p>
                </div>

            <?php endif; ?>

        </div>

    </main>
</div>

<?php
get_footer();
