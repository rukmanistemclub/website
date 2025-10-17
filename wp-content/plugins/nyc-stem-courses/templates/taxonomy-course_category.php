<?php
/**
 * Course Category Taxonomy Template
 *
 * Template for displaying courses by category
 */

get_header();
?>

<div class="course-taxonomy">

    <!-- Taxonomy Header -->
    <div class="courses-archive-header">
        <h1 class="archive-title"><?php single_term_title(); ?></h1>
        <?php
        $term_description = term_description();
        if (!empty($term_description)) {
            echo '<div class="archive-description">' . $term_description . '</div>';
        } else {
            echo '<p class="archive-description">Browse our ' . single_term_title('', false) . ' courses.</p>';
        }
        ?>
    </div>

    <!-- Courses Grid -->
    <div class="courses-grid-section">
        <div class="courses-grid-container">

            <?php if (have_posts()) : ?>

                <div class="courses-grid">

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="course-card">

                            <!-- Course Image -->
                            <div class="course-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
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

                                <?php if (has_excerpt()) : ?>
                                    <div class="course-card-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Meta Information -->
                                <div class="course-card-meta">
                                    <?php
                                    $duration = get_field('course_duration');
                                    $formats = get_field('class_format');

                                    if ($duration) {
                                        echo '<span class="course-card-meta-item">⏱️ ' . esc_html($duration) . '</span>';
                                    }

                                    if ($formats && is_array($formats)) {
                                        $format_labels = array(
                                            'private' => 'Private',
                                            'group' => 'Group',
                                            'online' => 'Online',
                                            'in-person' => 'In-Person'
                                        );
                                        $format_text = array();
                                        foreach ($formats as $format) {
                                            if (isset($format_labels[$format])) {
                                                $format_text[] = $format_labels[$format];
                                            }
                                        }
                                        if (!empty($format_text)) {
                                            echo '<span class="course-card-meta-item">📍 ' . esc_html(implode(', ', $format_text)) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="course-card-button">Learn More</a>

                            </div>

                        </div>

                    <?php endwhile; ?>

                </div>

                <!-- Pagination -->
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('&laquo; Previous', 'nyc-stem-courses'),
                    'next_text' => __('Next &raquo;', 'nyc-stem-courses'),
                ));
                ?>

            <?php else : ?>

                <div style="text-align: center; padding: 60px 20px;">
                    <h2>No courses found in this category</h2>
                    <p>Check back soon for new courses!</p>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>

<?php
get_footer();
