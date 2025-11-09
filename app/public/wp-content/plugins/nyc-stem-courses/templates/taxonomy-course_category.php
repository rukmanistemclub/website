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
    <?php
    // Get current category
    $current_term = get_queried_object();
    $category_slug = $current_term->slug;
    $category_name = $current_term->name;

    // Check if this category has child categories
    $child_categories = get_terms(array(
        'taxonomy' => 'course_category',
        'parent' => $current_term->term_id,
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'DESC', // Reverse alphabetical order
    ));

    // If this category has children, display each child with its courses
    if (!empty($child_categories) && !is_wp_error($child_categories)) {
        foreach ($child_categories as $child_category) {
            echo do_shortcode('[course_category category="' . esc_attr($child_category->slug) . '" title="' . esc_attr($child_category->name) . ' Programs" columns="4"]');

            // Add spacing between sections
            echo '<div style="margin-bottom: 60px;"></div>';
        }
    } else {
        // No children - display courses for this category
        echo do_shortcode('[course_category category="' . esc_attr($category_slug) . '" title="' . esc_attr($category_name) . ' Programs" columns="4"]');
    }
    ?>

</div>

<?php
get_footer();
