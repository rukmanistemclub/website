<?php
/**
 * WooCommerce to Courses Migration
 */

if (!defined('ABSPATH')) {
    exit;
}

class NYC_STEM_Migration {

    /**
     * Migrate WooCommerce products to courses
     */
    public static function migrate_products() {
        // Check if WooCommerce is active
        if (!class_exists('WooCommerce')) {
            return array(
                'success' => false,
                'message' => 'WooCommerce is not active. Please activate WooCommerce to run the migration.'
            );
        }

        $results = array(
            'success' => true,
            'migrated' => 0,
            'skipped' => 0,
            'errors' => array(),
        );

        // Get all WooCommerce products
        $products = get_posts(array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ));

        if (empty($products)) {
            return array(
                'success' => false,
                'message' => 'No WooCommerce products found to migrate.'
            );
        }

        foreach ($products as $product) {
            try {
                $course_id = self::migrate_single_product($product);
                if ($course_id) {
                    $results['migrated']++;
                } else {
                    $results['skipped']++;
                }
            } catch (Exception $e) {
                $results['errors'][] = 'Error migrating product ' . $product->ID . ': ' . $e->getMessage();
            }
        }

        return $results;
    }

    /**
     * Migrate a single product to course
     */
    private static function migrate_single_product($product) {
        // Add "-nyc" suffix to course title
        $course_title = $product->post_title . ' - NYC';

        // Check if already migrated (by checking if a course with this title exists)
        $existing = get_posts(array(
            'post_type' => 'course',
            'title' => $course_title,
            'posts_per_page' => 1,
        ));

        if (!empty($existing)) {
            // Already migrated, return existing course ID
            return $existing[0]->ID;
        }

        // Create new course post
        $course_data = array(
            'post_title' => $course_title,
            'post_content' => $product->post_content,
            'post_excerpt' => $product->post_excerpt ? $product->post_excerpt : wp_trim_words($product->post_content, 30),
            'post_status' => 'publish',
            'post_type' => 'course',
            'post_author' => $product->post_author,
        );

        $course_id = wp_insert_post($course_data);

        if (is_wp_error($course_id)) {
            throw new Exception($course_id->get_error_message());
        }

        // Copy featured image
        $thumbnail_id = get_post_thumbnail_id($product->ID);
        if ($thumbnail_id) {
            set_post_thumbnail($course_id, $thumbnail_id);
        }

        // Migrate product categories to course categories
        self::migrate_categories($product->ID, $course_id);

        // Migrate product tags to course tags (if any)
        self::migrate_tags($product->ID, $course_id);

        // Set default ACF fields with smart defaults
        self::set_default_fields($course_id, $product);

        return $course_id;
    }

    /**
     * Migrate product categories to course categories
     */
    private static function migrate_categories($product_id, $course_id) {
        $product_cats = wp_get_post_terms($product_id, 'product_cat');

        if (empty($product_cats) || is_wp_error($product_cats)) {
            return;
        }

        $course_cat_ids = array();

        foreach ($product_cats as $product_cat) {
            // Check if course category with same name exists
            $existing_term = get_term_by('name', $product_cat->name, 'course_category');

            if ($existing_term) {
                $course_cat_ids[] = $existing_term->term_id;
            } else {
                // Create new course category
                $new_term = wp_insert_term(
                    $product_cat->name,
                    'course_category',
                    array(
                        'description' => $product_cat->description,
                        'slug' => $product_cat->slug,
                    )
                );

                if (!is_wp_error($new_term)) {
                    $course_cat_ids[] = $new_term['term_id'];
                }
            }
        }

        if (!empty($course_cat_ids)) {
            wp_set_object_terms($course_id, $course_cat_ids, 'course_category');
        }
    }

    /**
     * Migrate product tags to course tags
     */
    private static function migrate_tags($product_id, $course_id) {
        $product_tags = wp_get_post_terms($product_id, 'product_tag');

        if (empty($product_tags) || is_wp_error($product_tags)) {
            return;
        }

        $tag_names = array();
        foreach ($product_tags as $tag) {
            $tag_names[] = $tag->name;
        }

        if (!empty($tag_names)) {
            wp_set_object_terms($course_id, $tag_names, 'course_tag');
        }
    }

    /**
     * Set default ACF fields
     */
    private static function set_default_fields($course_id, $product) {
        // Get WooCommerce product object (only if WooCommerce is available)
        $wc_product = null;
        if (function_exists('wc_get_product')) {
            $wc_product = wc_get_product($product->ID);
        }

        // Course Price
        if ($wc_product) {
            $price = $wc_product->get_price();
            if ($price) {
                update_field('course_price', '$' . number_format((float)$price, 0), $course_id);
            } else {
                update_field('course_price', 'Contact for pricing', $course_id);
            }
        } else {
            // No WooCommerce, set default
            update_field('course_price', 'Contact for pricing', $course_id);
        }

        // Default Duration
        update_field('course_duration', 'Semester Program', $course_id);

        // Default Class Formats
        update_field('class_format', array('group', 'private'), $course_id);

        // Default Why Choose Us (4 benefits)
        $default_benefits = array(
            array(
                'icon' => '🎯',
                'title' => 'Expert Instructors',
                'description' => 'Learn from experienced educators with 10+ years in test prep and STEM education.',
            ),
            array(
                'icon' => '⭐',
                'title' => 'Proven Results',
                'description' => 'Our students consistently achieve top scores and gain admission to their dream schools.',
            ),
            array(
                'icon' => '📚',
                'title' => 'Comprehensive Materials',
                'description' => 'Access to extensive practice tests, study guides, and learning resources.',
            ),
            array(
                'icon' => '🏆',
                'title' => 'Personalized Approach',
                'description' => 'Custom learning plans tailored to each student\'s strengths and goals.',
            ),
        );
        update_field('why_choose_us', $default_benefits, $course_id);

        // Default FAQs
        $default_faqs = array(
            array(
                'question' => 'What is included in the course?',
                'answer' => 'The course includes comprehensive study materials, practice tests, personalized instruction, and ongoing support throughout your learning journey.',
            ),
            array(
                'question' => 'How long is the program?',
                'answer' => 'The typical program runs 8-12 weeks, with flexible scheduling options to fit your needs.',
            ),
            array(
                'question' => 'Can I get a refund if I\'m not satisfied?',
                'answer' => 'Yes, we offer a satisfaction guarantee. Contact us within the first two weeks if you\'re not completely satisfied.',
            ),
        );
        update_field('course_faqs', $default_faqs, $course_id);

        // Inquiry Settings
        update_field('inquiry_settings', array(
            'inquiry_button_text' => 'Inquire Now',
            'custom_inquiry_url' => '',
        ), $course_id);
    }

    /**
     * Create default course categories
     */
    public static function create_default_categories() {
        $categories = array(
            array(
                'name' => 'SAT/ACT Prep',
                'slug' => 'sat-act-prep',
                'description' => 'Comprehensive SAT and ACT test preparation courses',
            ),
            array(
                'name' => 'SHSAT Prep',
                'slug' => 'shsat-prep',
                'description' => 'Specialized High School Admissions Test preparation',
            ),
            array(
                'name' => 'Regents Prep',
                'slug' => 'regents-prep',
                'description' => 'New York State Regents exam preparation',
            ),
            array(
                'name' => 'Summer Programs',
                'slug' => 'summer-programs',
                'description' => 'Intensive summer learning programs',
            ),
            array(
                'name' => 'Tutoring',
                'slug' => 'tutoring',
                'description' => 'One-on-one and group tutoring services',
            ),
            array(
                'name' => 'Test Prep',
                'slug' => 'test-prep',
                'description' => 'General test preparation courses',
            ),
        );

        foreach ($categories as $category) {
            // Check if category already exists
            $existing = term_exists($category['slug'], 'course_category');

            if (!$existing) {
                wp_insert_term(
                    $category['name'],
                    'course_category',
                    array(
                        'slug' => $category['slug'],
                        'description' => $category['description'],
                    )
                );
            }
        }
    }
}
