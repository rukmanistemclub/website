<?php
/**
 * Course Related Courses Section
 */

// Get manually selected related courses
$related_courses = get_field('related_courses');

// If no manual selection, show ALL other courses (except current one)
if (empty($related_courses)) {
    $related_courses = get_posts(array(
        'post_type' => 'course',
        'posts_per_page' => -1, // Get all courses
        'post__not_in' => array(get_the_ID()), // Exclude current course
        'orderby' => 'menu_order title',
        'order' => 'ASC',
    ));
}

// Exit if no related courses found
if (empty($related_courses)) {
    return;
}
?>

<section class="course-related">
    <div class="related-container">

        <h2 class="related-title">Related Courses</h2>

        <div class="related-grid">
            <?php foreach ($related_courses as $course) :
                setup_postdata($course);
                $course_id = is_object($course) ? $course->ID : $course;
            ?>
                <a href="<?php echo get_permalink($course_id); ?>" class="related-course-card">

                    <?php if (has_post_thumbnail($course_id)) : ?>
                        <div class="related-course-image">
                            <?php echo get_the_post_thumbnail($course_id, 'medium'); ?>
                        </div>
                    <?php else : ?>
                        <div class="related-course-image"></div>
                    <?php endif; ?>

                    <div class="related-course-content">
                        <h3 class="related-course-title">
                            <?php echo get_the_title($course_id); ?>
                        </h3>

                        <?php
                        $excerpt = get_the_excerpt($course_id);
                        if ($excerpt) :
                        ?>
                            <p class="related-course-excerpt">
                                <?php echo wp_trim_words($excerpt, 15); ?>
                            </p>
                        <?php endif; ?>

                        <span class="related-course-link">Learn More →</span>
                    </div>

                </a>
            <?php endforeach;
            wp_reset_postdata();
            ?>
        </div>

    </div>
</section>
