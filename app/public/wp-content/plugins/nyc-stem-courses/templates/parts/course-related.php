<?php
/**
 * Course Related Courses Section
 *
 * TWO SEPARATE SECTIONS:
 * 1. "You May Also Like" - Cross-Sell Courses (strategic promotions, max 4)
 * 2. "Related Courses" - Category-matched or manual courses (up to 8)
 *
 * Cross-sell courses are shown separately and don't take slots from related courses.
 * Results cached for 12 hours for performance.
 */

$current_id = get_the_ID();

// Check if current course is SHSAT
$current_terms = get_the_terms($current_id, 'course_category');
$is_shsat_course = false;
if ($current_terms && !is_wp_error($current_terms)) {
    foreach ($current_terms as $term) {
        if ($term->slug === 'shsat') {
            $is_shsat_course = true;
            break;
        }
    }
}

// ============================================
// SECTION 1: CROSS-SELL COURSES
// ============================================
$crosssell_list = array();
$crosssell_courses = get_field('crosssell_courses');

if (!empty($crosssell_courses)) {
    foreach ($crosssell_courses as $course) {
        $course_id = is_object($course) ? $course->ID : $course;
        // Only include published courses
        if ($course_id != $current_id && get_post_status($course_id) === 'publish') {
            $crosssell_list[] = $course_id;
        }
    }
    // Limit to 4 cross-sell courses (increased from 3)
    $crosssell_list = array_slice($crosssell_list, 0, 4);
}

// ============================================
// SECTION 2: RELATED COURSES
// ============================================
$related_list = array();
$related_courses = get_field('related_courses');

if (!empty($related_courses)) {
    // Manual override - use selected courses
    foreach ($related_courses as $course) {
        $course_id = is_object($course) ? $course->ID : $course;
        // Only include published courses, exclude current and cross-sell
        if ($course_id != $current_id &&
            !in_array($course_id, $crosssell_list) &&
            get_post_status($course_id) === 'publish') {
            $related_list[] = $course_id;
        }
    }
} else {
    // Auto by category - Try to get from cache
    $cache_key = 'related_courses_cat_' . $current_id;
    $category_courses = get_transient($cache_key);

    if (false === $category_courses) {
        // For SHSAT courses, show Upper ISEE courses only
        // Filtered by tag "Upper" (set in WordPress admin)
        if ($is_shsat_course) {
            $category_courses = get_posts(array(
                'post_type' => 'course',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                'post__not_in' => array_merge(array($current_id), $crosssell_list),
                'tag' => 'upper', // Filter by "Upper" tag
                'tax_query' => array(
                    array(
                        'taxonomy' => 'course_category',
                        'field' => 'slug',
                        'terms' => 'isee',
                    ),
                ),
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'fields' => 'ids',
            ));
        } else {
            // Check if user specified categories in admin
            $custom_categories = get_field('related_course_categories', $current_id);

            if (!empty($custom_categories)) {
                // Use custom categories specified by user
                $category_courses = get_posts(array(
                    'post_type' => 'course',
                    'post_status' => 'publish',
                    'posts_per_page' => 8,
                    'post__not_in' => array_merge(array($current_id), $crosssell_list),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'course_category',
                            'field' => 'term_id',
                            'terms' => $custom_categories,
                        ),
                    ),
                    'orderby' => 'menu_order title',
                    'order' => 'ASC',
                    'fields' => 'ids',
                ));
            } else {
                // Auto-detect based on current course categories
                $terms = get_the_terms($current_id, 'course_category');

                if ($terms && !is_wp_error($terms)) {
                    // Check if current course is SAT/ACT
                    $is_sat_act = false;
                    $category_slugs = wp_list_pluck($terms, 'slug');

                    foreach ($category_slugs as $slug) {
                        if (strpos($slug, 'sat') !== false || strpos($slug, 'act') !== false) {
                            $is_sat_act = true;
                            break;
                        }
                    }

                    // If SAT/ACT course, show all SAT and ACT courses
                    if ($is_sat_act) {
                        $category_courses = get_posts(array(
                            'post_type' => 'course',
                            'post_status' => 'publish',
                            'posts_per_page' => 8,
                            'post__not_in' => array_merge(array($current_id), $crosssell_list),
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'course_category',
                                    'field' => 'slug',
                                    'terms' => array('sat', 'act', 'sat-act-prep'),
                                    'operator' => 'IN',
                                ),
                                array(
                                    'taxonomy' => 'course_category',
                                    'field' => 'slug',
                                    'terms' => $category_slugs,
                                ),
                            ),
                            'orderby' => 'menu_order title',
                            'order' => 'ASC',
                            'fields' => 'ids',
                        ));
                    } else {
                        // For other courses, show same category
                        $category_ids = wp_list_pluck($terms, 'term_id');

                        $category_courses = get_posts(array(
                            'post_type' => 'course',
                            'post_status' => 'publish',
                            'posts_per_page' => 8,
                            'post__not_in' => array_merge(array($current_id), $crosssell_list),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'course_category',
                                    'field' => 'term_id',
                                    'terms' => $category_ids,
                                ),
                            ),
                            'orderby' => 'menu_order title',
                            'order' => 'ASC',
                            'fields' => 'ids',
                        ));
                    }
                } else {
                    $category_courses = array();
                }
            }
        }

        // Cache for 12 hours
        set_transient($cache_key, $category_courses, 12 * HOUR_IN_SECONDS);
    }

    // Add category courses to related list (excluding cross-sell)
    if (!empty($category_courses)) {
        foreach ($category_courses as $course_id) {
            if (!in_array($course_id, $crosssell_list) && !in_array($course_id, $related_list)) {
                $related_list[] = $course_id;
            }
        }
    }
}

// NO FILLER LOGIC - All related courses are controlled by:
// 1. Manual related_courses ACF field, OR
// 2. Manual related_course_categories ACF field, OR
// 3. Auto-detected category matching
// This ensures complete control over what courses are shown

// Limit to 8 related courses
$related_list = array_slice($related_list, 0, 8);

// Exit if no courses to show at all
if (empty($crosssell_list) && empty($related_list)) {
    return;
}

// PERFORMANCE OPTIMIZATION: Bulk load all course data at once
$all_course_ids = array_merge($crosssell_list, $related_list);
$course_data_cache = array();

if (!empty($all_course_ids)) {
    // Prime post cache
    _prime_post_caches($all_course_ids, false, true);

    // Bulk load ACF fields for all courses at once
    foreach ($all_course_ids as $course_id) {
        $course_data_cache[$course_id] = array(
            'title' => get_the_title($course_id),
            'permalink' => get_permalink($course_id),
            'excerpt' => get_the_excerpt($course_id),
            'duration' => get_field('course_duration', $course_id),
            'formats' => get_field('class_format', $course_id),
        );
    }
}
?>

<?php if (!empty($crosssell_list)) : ?>
<!-- Cross-Sell Section -->
<section class="course-related course-crosssell" id="programs">
    <div class="related-container">
        <h2 class="related-title">You May Also Like</h2>

        <div class="related-grid">
            <?php
            $card_colors = array('card-blue', 'card-orange', 'card-tan');
            $btn_colors = array('btn-blue', 'btn-orange', 'btn-tan');
            $color_index = 0;

            foreach ($crosssell_list as $course_id) :
                $card_class = $card_colors[$color_index % 3];
                $btn_class = $btn_colors[$color_index % 3];
                $color_index++;

                // Use cached data
                $course_data = $course_data_cache[$course_id];
            ?>
                <div class="course-card <?php echo $card_class; ?>">
                    <h3 class="course-card-title">
                        <a href="<?php echo $course_data['permalink']; ?>">
                            <?php echo $course_data['title']; ?>
                        </a>
                    </h3>

                    <!-- Meta Information -->
                    <div class="course-card-meta">
                        <?php
                        $duration = $course_data['duration'];
                        $formats = $course_data['formats'];

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

                    <?php if ($course_data['excerpt']) : ?>
                        <p class="course-card-description">
                            <?php echo wp_trim_words($course_data['excerpt'], 20); ?>
                        </p>
                    <?php endif; ?>

                    <a href="<?php echo $course_data['permalink']; ?>" class="course-card-button <?php echo $btn_class; ?>">
                        Learn More →
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>

<?php
$section_id = empty($crosssell_list) ? ' id="programs"' : '';

// Use "Related Programs" for all courses
$section_title = 'Related Programs';
?>
<?php if (!empty($related_list)) : ?>
<!-- Related Courses Section -->
<section class="course-related"<?php echo $section_id; ?>>
    <div class="related-container">
        <h2 class="related-title"><?php echo $section_title; ?></h2>

        <div class="related-grid">
            <?php
            $card_colors = array('card-blue', 'card-orange', 'card-tan');
            $btn_colors = array('btn-blue', 'btn-orange', 'btn-tan');
            $color_index = 0;

            foreach ($related_list as $course_id) :
                $card_class = $card_colors[$color_index % 3];
                $btn_class = $btn_colors[$color_index % 3];
                $color_index++;

                // Use cached data
                $course_data = $course_data_cache[$course_id];
            ?>
                <div class="course-card <?php echo $card_class; ?>">
                    <h3 class="course-card-title">
                        <a href="<?php echo $course_data['permalink']; ?>">
                            <?php echo $course_data['title']; ?>
                        </a>
                    </h3>

                    <!-- Meta Information -->
                    <div class="course-card-meta">
                        <?php
                        $duration = $course_data['duration'];
                        $formats = $course_data['formats'];

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

                    <?php if ($course_data['excerpt']) : ?>
                        <p class="course-card-description">
                            <?php echo wp_trim_words($course_data['excerpt'], 20); ?>
                        </p>
                    <?php endif; ?>

                    <a href="<?php echo $course_data['permalink']; ?>" class="course-card-button <?php echo $btn_class; ?>">
                        Learn More →
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>
