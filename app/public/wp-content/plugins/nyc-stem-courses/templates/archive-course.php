<?php
/**
 * Course Archive Template
 *
 * Template for displaying all courses
 */

get_header();
?>

<div class="course-archive">

    <!-- Archive Header -->
    <div class="courses-archive-header">
        <h1 class="archive-title"><?php post_type_archive_title(); ?></h1>
        <?php
        $post_type_obj = get_post_type_object('course');
        if ($post_type_obj && !empty($post_type_obj->description)) {
            echo '<p class="archive-description" style="color: #ffffff !important; font-family: \'Roboto\', sans-serif; font-size: 18px; line-height: 1.6;">' . esc_html($post_type_obj->description) . '</p>';
        } else {
            echo '<p class="archive-description" style="color: #ffffff !important; font-family: \'Roboto\', sans-serif; font-size: 18px; line-height: 1.6;">Explore our comprehensive range of courses designed to help students excel.</p>';
        }
        ?>
    </div>

    <!-- Search & Filter Bar -->
    <div class="course-search-section">
        <div class="courses-grid-container">
            <div class="search-filter-bar">

                <!-- Search Input -->
                <div class="search-wrapper">
                    <input type="text" id="course-search" class="course-search-input" placeholder="Search courses...">
                </div>

                <!-- Category Dropdown -->
                <div class="category-wrapper">
                    <select id="category-filter" class="category-select">
                        <option value="all">Categories</option>
                        <?php
                        $categories = get_terms(array(
                            'taxonomy' => 'course_category',
                            'hide_empty' => true,
                        ));
                        if ($categories && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                                echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="courses-grid-section">
        <div class="courses-grid-container">

            <?php
            // Get all courses in a simple grid
            $courses_query = new WP_Query(array(
                'post_type' => 'course',
                'posts_per_page' => -1,
                'orderby' => 'menu_order title',
                'order' => 'ASC'
            ));

            if ($courses_query->have_posts()) : ?>

                <div class="courses-grid">

                    <?php while ($courses_query->have_posts()) : $courses_query->the_post();
                        // Get categories and tags for filtering
                        $course_categories = get_the_terms(get_the_ID(), 'course_category');
                        $course_tags = get_the_terms(get_the_ID(), 'course_tag');

                        $category_slugs = array();
                        $tag_slugs = array();

                        if ($course_categories && !is_wp_error($course_categories)) {
                            foreach ($course_categories as $cat) {
                                $category_slugs[] = $cat->slug;
                            }
                        }

                        if ($course_tags && !is_wp_error($course_tags)) {
                            foreach ($course_tags as $tag) {
                                $tag_slugs[] = $tag->slug;
                            }
                        }

                        $categories_attr = !empty($category_slugs) ? implode(' ', $category_slugs) : '';
                        $tags_attr = !empty($tag_slugs) ? implode(' ', $tag_slugs) : '';
                    ?>

                        <div class="course-card"
                             data-categories="<?php echo esc_attr($categories_attr); ?>"
                             data-tags="<?php echo esc_attr($tags_attr); ?>">

                            <!-- Course Image -->
                            <div class="course-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>

                                <!-- Category Badge -->
                                <?php
                                if ($course_categories && !is_wp_error($course_categories)) {
                                    $first_category = array_shift($course_categories);
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
                                        echo '<span class="meta-badge"><span class="meta-icon">⏱️</span> ' . esc_html($duration) . '</span>';
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

                <div style="text-align: center; padding: 60px 20px;">
                    <h2>No courses found</h2>
                    <p>Check back soon for new courses!</p>
                </div>

            <?php endif; ?>

        </div>
    </div>

    <!-- Google Reviews / Testimonials Section -->
    <section class="course-testimonials">
        <div class="testimonials-container">
            <h2 class="testimonials-title">What Our Students and Parents Say</h2>
            <div class="testimonials-content">
                <?php
                // Google Reviews via Trustindex
                $reviews_shortcode = get_option('nyc_stem_reviews_shortcode', '[trustindex data-widget-id=d7ccd5b21eb1294a9186eebe1e6]');
                echo do_shortcode($reviews_shortcode);
                ?>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();
