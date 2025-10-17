<?php
/**
 * Simple ACF Fields Test - Basic fields only
 */

if (!defined('ABSPATH')) {
    exit;
}

// Register on acf/init hook
add_action('acf/init', 'nyc_stem_register_simple_fields');

function nyc_stem_register_simple_fields() {
    // Check if ACF function exists
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_simple_course_details',
        'title' => 'Simple Course Details',
        'fields' => array(
            // Course Price
            array(
                'key' => 'field_simple_course_price',
                'label' => 'Course Price',
                'name' => 'course_price',
                'type' => 'text',
                'instructions' => 'Display price (e.g., "$1,200" or "Contact for pricing")',
                'required' => 0,
                'default_value' => '',
                'placeholder' => '$1,200',
            ),
            // Course Duration
            array(
                'key' => 'field_simple_course_duration',
                'label' => 'Course Duration',
                'name' => 'course_duration',
                'type' => 'text',
                'instructions' => 'e.g., "Semester Program", "10 sessions", "Summer 2025"',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'Semester Program',
            ),
            // Class Format
            array(
                'key' => 'field_simple_class_format',
                'label' => 'Class Format',
                'name' => 'class_format',
                'type' => 'checkbox',
                'instructions' => 'Select all formats that apply',
                'required' => 0,
                'choices' => array(
                    'private' => 'Private (1-on-1)',
                    'group' => 'Group Classes',
                ),
                'default_value' => array(),
                'layout' => 'vertical',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}
