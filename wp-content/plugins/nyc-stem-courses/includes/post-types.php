<?php
/**
 * Register Custom Post Types and Taxonomies
 */

if (!defined('ABSPATH')) {
    exit;
}

class NYC_STEM_Post_Types {

    /**
     * Register post types and taxonomies
     */
    public static function register() {
        self::register_course_post_type();
        self::register_course_taxonomies();
    }

    /**
     * Register Course Post Type
     */
    private static function register_course_post_type() {
        $labels = array(
            'name'               => __('Courses', 'nyc-stem-courses'),
            'singular_name'      => __('Course', 'nyc-stem-courses'),
            'menu_name'          => __('Courses', 'nyc-stem-courses'),
            'add_new'            => __('Add New Course', 'nyc-stem-courses'),
            'add_new_item'       => __('Add New Course', 'nyc-stem-courses'),
            'edit_item'          => __('Edit Course', 'nyc-stem-courses'),
            'new_item'           => __('New Course', 'nyc-stem-courses'),
            'view_item'          => __('View Course', 'nyc-stem-courses'),
            'search_items'       => __('Search Courses', 'nyc-stem-courses'),
            'not_found'          => __('No courses found', 'nyc-stem-courses'),
            'not_found_in_trash' => __('No courses found in trash', 'nyc-stem-courses'),
            'all_items'          => __('All Courses', 'nyc-stem-courses'),
        );

        $args = array(
            'labels'              => $labels,
            'public'              => true,
            'has_archive'         => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_rest'        => true, // Enable Gutenberg
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-welcome-learn-more',
            'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
            'rewrite'             => array('slug' => 'courses'),
            'capability_type'     => 'post',
        );

        register_post_type('course', $args);
    }

    /**
     * Register Course Taxonomies
     */
    private static function register_course_taxonomies() {
        // Course Categories
        $category_labels = array(
            'name'          => __('Course Categories', 'nyc-stem-courses'),
            'singular_name' => __('Course Category', 'nyc-stem-courses'),
            'search_items'  => __('Search Categories', 'nyc-stem-courses'),
            'all_items'     => __('All Categories', 'nyc-stem-courses'),
            'parent_item'   => __('Parent Category', 'nyc-stem-courses'),
            'edit_item'     => __('Edit Category', 'nyc-stem-courses'),
            'update_item'   => __('Update Category', 'nyc-stem-courses'),
            'add_new_item'  => __('Add New Category', 'nyc-stem-courses'),
            'new_item_name' => __('New Category Name', 'nyc-stem-courses'),
            'menu_name'     => __('Categories', 'nyc-stem-courses'),
        );

        register_taxonomy('course_category', 'course', array(
            'labels'            => $category_labels,
            'hierarchical'      => true, // Like categories
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'course-category'),
        ));

        // Course Tags
        $tag_labels = array(
            'name'          => __('Course Tags', 'nyc-stem-courses'),
            'singular_name' => __('Course Tag', 'nyc-stem-courses'),
            'search_items'  => __('Search Tags', 'nyc-stem-courses'),
            'all_items'     => __('All Tags', 'nyc-stem-courses'),
            'edit_item'     => __('Edit Tag', 'nyc-stem-courses'),
            'update_item'   => __('Update Tag', 'nyc-stem-courses'),
            'add_new_item'  => __('Add New Tag', 'nyc-stem-courses'),
            'new_item_name' => __('New Tag Name', 'nyc-stem-courses'),
            'menu_name'     => __('Tags', 'nyc-stem-courses'),
        );

        register_taxonomy('course_tag', 'course', array(
            'labels'            => $tag_labels,
            'hierarchical'      => false, // Like tags
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'course-tag'),
        ));
    }
}
