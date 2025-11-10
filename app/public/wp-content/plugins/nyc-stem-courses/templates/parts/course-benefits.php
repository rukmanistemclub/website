<?php
/**
 * Course Benefits Section - Why Choose NYC STEM Club
 * Uses appropriate shortcode based on course category
 */

// Get course categories
$terms = get_the_terms(get_the_ID(), 'course_category');
$is_shsat = false;

if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        if ($term->slug === 'shsat') {
            $is_shsat = true;
            break;
        }
    }
}

// Use appropriate shortcode
if ($is_shsat) {
    echo do_shortcode('[why_choose_shsat]');
} else {
    echo do_shortcode('[why_choose_sat_act]');
}
?>
