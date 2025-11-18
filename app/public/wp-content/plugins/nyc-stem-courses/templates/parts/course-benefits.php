<?php
/**
 * Course Benefits Section - Why Choose NYC STEM Club
 * Uses appropriate shortcode based on course category
 * Can be hidden via ACF field
 */

// Check if user wants to hide this section
if (get_field('hide_why_choose_section')) {
    return;
}

// Get course categories
$terms = get_the_terms(get_the_ID(), 'course_category');
$is_shsat = false;
$is_isee = false;

if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        if ($term->slug === 'shsat') {
            $is_shsat = true;
            break;
        } elseif ($term->slug === 'isee-prep' || $term->slug === 'isee') {
            $is_isee = true;
            break;
        }
    }
}

// Use appropriate shortcode
if ($is_shsat) {
    echo do_shortcode('[why_choose_shsat]');
} elseif ($is_isee) {
    echo do_shortcode('[why_choose_isee]');
} else {
    echo do_shortcode('[why_choose_sat_act]');
}
?>
