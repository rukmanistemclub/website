<?php
/**
 * Skola Child
 *
 * @package skola-child
 */

/**
 * Include all your custom code here
 */


/**
 * ==============================================================================
 * NYC STEM Club SEO Enhancements
 * Note: Organization, BreadcrumbList, and Article schema handled by Yoast SEO
 * Custom schema below for Course, FAQPage, and Service (Yoast doesn't generate these)
 * ==============================================================================
 */

/**
 * Add Open Graph Meta Tags for Social Sharing
 */
add_action('wp_head', 'nycstemclub_add_og_meta_tags');
function nycstemclub_add_og_meta_tags() {
    // Skip if Yoast SEO is handling this
    if (defined('WPSEO_VERSION')) {
        return;
    }

    $og_title = get_the_title();
    $og_description = get_the_excerpt();
    $og_url = get_permalink();
    $og_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : '';
    $og_type = is_single() ? 'article' : 'website';

    echo '<meta property="og:title" content="' . esc_attr($og_title) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags($og_description)) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url($og_url) . '" />' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($og_type) . '" />' . "\n";
    echo '<meta property="og:site_name" content="NYC STEM Club" />' . "\n";

    if ($og_image) {
        echo '<meta property="og:image" content="' . esc_url($og_image) . '" />' . "\n";
    }

    // Twitter Card Tags
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($og_title) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr(wp_strip_all_tags($og_description)) . '" />' . "\n";

    if ($og_image) {
        echo '<meta name="twitter:image" content="' . esc_url($og_image) . '" />' . "\n";
    }
}


/**
 * Defer JavaScript Loading for Better Performance
 * Excludes jQuery and critical scripts
 */
add_filter('script_loader_tag', 'nycstemclub_defer_scripts', 10, 2);
function nycstemclub_defer_scripts($tag, $handle) {
    // Scripts to exclude from defer
    $exclude = array(
        'jquery',
        'jquery-core',
        'jquery-migrate',
        'backbone',
        'underscore',
        'wp-util',
        'wp-backbone',
        'moment',
        'tinymce',
        'marionette'
    );

    // Don't defer scripts in admin
    if (is_admin()) {
        return $tag;
    }

    if (in_array($handle, $exclude)) {
        return $tag;
    }

    // Add defer attribute
    return str_replace(' src', ' defer src', $tag);
}

/**
 * Preload Critical Resources
 */
add_action('wp_head', 'nycstemclub_preload_resources', 1);
function nycstemclub_preload_resources() {
    // Preload main stylesheet
    echo '<link rel="preload" href="' . get_stylesheet_uri() . '" as="style">' . "\n";

    // Preload web fonts if you're using any
    // echo '<link rel="preload" href="/path/to/font.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}


/**
 * Add Course Schema for Custom Course Post Type
 * Enhanced schema with curriculum, duration, and educational details
 */
add_action('wp_head', 'nycstemclub_add_custom_course_schema');
function nycstemclub_add_custom_course_schema() {
    if (!is_singular('course')) {
        return;
    }

    $course_id = get_the_ID();

    // Get ACF fields
    $hero_stats = get_field('hero_stats', $course_id);
    $program_modules = get_field('program_modules', $course_id);

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Course',
        'name' => get_the_title(),
        'description' => wp_strip_all_tags(get_the_excerpt() ?: get_the_content()),
        'url' => get_permalink(),
        'provider' => array(
            '@type' => 'EducationalOrganization',
            'name' => 'NYC STEM Club',
            'url' => home_url(),
            'sameAs' => home_url()
        )
    );

    // Add image if available
    if (has_post_thumbnail()) {
        $schema['image'] = get_the_post_thumbnail_url($course_id, 'full');
    }

    // Extract duration from hero stats if available
    if ($hero_stats && is_array($hero_stats)) {
        foreach ($hero_stats as $stat) {
            if (isset($stat['label']) && isset($stat['value']) && stripos($stat['label'], 'duration') !== false) {
                $schema['timeRequired'] = $stat['value'];
            }
            if (isset($stat['label']) && isset($stat['value']) && stripos($stat['label'], 'session') !== false) {
                $schema['numberOfLessons'] = $stat['value'];
            }
        }
    }

    // Add syllabus/curriculum from program modules
    if ($program_modules && is_array($program_modules)) {
        $syllabus_items = array();
        foreach ($program_modules as $module) {
            if (isset($module['title'])) {
                $syllabus_items[] = $module['title'];
            }
        }
        if (!empty($syllabus_items)) {
            $schema['syllabusSections'] = $syllabus_items;
            $schema['hasCourseInstance'] = array(
                '@type' => 'CourseInstance',
                'courseMode' => 'onsite',
                'courseWorkload' => 'PT' . count($syllabus_items) . 'H'
            );
        }
    }

    // Add course category as educationalLevel
    $terms = get_the_terms($course_id, 'course_category');
    if ($terms && !is_wp_error($terms)) {
        $schema['educationalLevel'] = $terms[0]->name;
        $schema['about'] = array(
            '@type' => 'Thing',
            'name' => $terms[0]->name
        );
    }

    // Add audience
    $schema['audience'] = array(
        '@type' => 'EducationalAudience',
        'educationalRole' => 'student'
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * Add Canonical URL Fallback
 * Provides canonical URLs when Yoast SEO is not handling them
 */
add_action('wp_head', 'nycstemclub_add_canonical_url', 5);
function nycstemclub_add_canonical_url() {
    // Skip if Yoast SEO is handling canonicals
    if (defined('WPSEO_VERSION')) {
        return;
    }

    $canonical = '';

    if (is_singular()) {
        $canonical = get_permalink();
    } elseif (is_home() && !is_front_page()) {
        $canonical = get_permalink(get_option('page_for_posts'));
    } elseif (is_front_page()) {
        $canonical = home_url('/');
    } elseif (is_tax() || is_category() || is_tag()) {
        $canonical = get_term_link(get_queried_object());
    } elseif (is_post_type_archive()) {
        $canonical = get_post_type_archive_link(get_post_type());
    }

    if ($canonical && !is_wp_error($canonical)) {
        echo '<link rel="canonical" href="' . esc_url($canonical) . '" />' . "\n";
    }
}

/**
 * ==============================================================================
 * END NYC STEM Club SEO Enhancements
 * ==============================================================================
 */

/**
 * ==============================================================================
 * NYC STEM Club Modern Design System
 * Mobile-first, clean, professional styles
 * ==============================================================================
 */
add_action('wp_enqueue_scripts', 'nycstemclub_enqueue_design_system', 998);
function nycstemclub_enqueue_design_system() {
    wp_enqueue_style(
        'nyc-design-system',
        get_stylesheet_directory_uri() . '/css/design-system.css',
        array(),
        filemtime(get_stylesheet_directory() . '/css/design-system.css') // Cache busting
    );
}

/**
 * ==============================================================================
 * NYC STEM Club Custom Blog Styles
 * Enqueue custom blog post stylesheet - FORCE LOAD WITH HIGH PRIORITY
 * ==============================================================================
 */
add_action('wp_enqueue_scripts', 'nycstemclub_enqueue_blog_styles', 999);
function nycstemclub_enqueue_blog_styles() {
    // Only load on single blog posts
    if (is_single() && !is_singular('product') && !is_singular('course')) {
        wp_enqueue_style(
            'nyc-blog-styles',
            get_stylesheet_directory_uri() . '/blog-styles.css',
            array(),
            filemtime(get_stylesheet_directory() . '/blog-styles.css') // Cache busting
        );
    }
}

/**
 * ==============================================================================
 * NYC STEM Club Counter Badge Styles
 * Make counter widgets smaller and more compact (trust badge style)
 * ==============================================================================
 */
add_action('wp_enqueue_scripts', 'nycstemclub_enqueue_counter_badge_styles', 999);
function nycstemclub_enqueue_counter_badge_styles() {
    wp_enqueue_style(
        'nyc-counter-badge-styles',
        get_stylesheet_directory_uri() . '/counter-badge-styles.css',
        array(),
        filemtime(get_stylesheet_directory() . '/counter-badge-styles.css') // Cache busting
    );
}

/**
 * ==============================================================================
 * NYC STEM Club Global Course Card Styles
 * Centralized course card styling used across all pages
 * ==============================================================================
 */
add_action('wp_enqueue_scripts', 'nycstemclub_enqueue_course_card_styles', 999);
function nycstemclub_enqueue_course_card_styles() {
    wp_enqueue_style(
        'nyc-course-cards',
        get_stylesheet_directory_uri() . '/course-cards.css',
        array(),
        filemtime(get_stylesheet_directory() . '/course-cards.css') // Cache busting
    );
}

/**
 * ==============================================================================
 * NYC STEM Club Course Pages Design System
 * Mobile-first styles for course hero, track record, and SHSAT pages
 * ==============================================================================
 */
add_action('wp_enqueue_scripts', 'nycstemclub_enqueue_course_pages_styles', 1000);
function nycstemclub_enqueue_course_pages_styles() {
    // Load on course pages, SHSAT page, and related pages
    if (is_singular('course') || is_post_type_archive('course') || is_tax('course_category') || is_page(array('nyc-top-shsat-prep-program', 'sat-act-test-prep', 'isee-test-preparation'))) {
        wp_enqueue_style(
            'nyc-course-pages',
            get_stylesheet_directory_uri() . '/css/course-pages.css',
            array('nyc-design-system'), // Load after design system
            filemtime(get_stylesheet_directory() . '/css/course-pages.css')
        );
    }
}

/**
 * ==============================================================================
 * NYC STEM Club Reusable Components
 * FAQ, Why Choose, CTA, Testimonials component styles
 * Created: 2025-11-23 (Phase 1 Refactoring)
 * ==============================================================================
 */
add_action('wp_enqueue_scripts', 'nycstemclub_enqueue_components_styles', 1001);
function nycstemclub_enqueue_components_styles() {
    wp_enqueue_style(
        'nyc-components',
        get_stylesheet_directory_uri() . '/css/components.css',
        array('nyc-design-system'),
        filemtime(get_stylesheet_directory() . '/css/components.css')
    );
}


