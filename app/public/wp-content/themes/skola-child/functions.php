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
 * Disable Yoast SEO Schema Output
 * We have custom, more detailed schema markup for Organization, Service, Course, and FAQPage.
 * Yoast is used only for: titles, meta descriptions, canonical URLs, and sitemap.
 */
add_filter('wpseo_json_ld_output', '__return_false');

/**
 * @snippet       Remove Add Cart, Add View Product @ WooCommerce Loop
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.6.2
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

// Define functions first
if (!function_exists('bbloomer_view_product_button')) {
    function bbloomer_view_product_button() {
        global $product;
        $link = $product->get_permalink();
        echo '<a href="' . $link . '" class="button addtocartbutton">View Course</a>';
    }
}

if (!function_exists('rocket_woo_pagination')) {
    function rocket_woo_pagination( $args ) {
        $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
        $args['next_text'] = '<i class="fa fa-angle-right"></i>';
        return $args;
    }
}

if (!function_exists('remove_woo_zoom')) {
    function remove_woo_zoom() {
        remove_theme_support('wc-product-gallery-zoom');
    }
}

if (!function_exists('custom_product_gallery_image_size')) {
    function custom_product_gallery_image_size($size) {
        return 'product-single-custom';
    }
}

if (!function_exists('custom_gallery_thumbnail_size')) {
    function custom_gallery_thumbnail_size($size) {
        return array(
            'width'  => 400,
            'height' => 400,
            'crop'   => 0
        );
    }
}

// Only run WooCommerce customizations if WooCommerce is active
if (class_exists('WooCommerce')) {
    // First, remove Add to Cart Button
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

    // Second, add View Product Button
    add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_view_product_button', 10 );

    // Pagination arrows
    add_filter( 'woocommerce_pagination_args',  'rocket_woo_pagination' );

    // Disable WooCommerce product image zoom
    add_action('wp', 'remove_woo_zoom', 99);

    // Remove breadcrumbs from single product pages (WooCommerce best practice)
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

    /**
     * Force WooCommerce product images to 400x400px
     */
    add_theme_support('post-thumbnails');
    add_image_size('product-single-custom', 400, 400, false);

    // Force single product page to use 400x400 image
    add_filter('woocommerce_gallery_image_size', 'custom_product_gallery_image_size');

    // Also force thumbnail size
    add_filter('woocommerce_get_image_size_gallery_thumbnail', 'custom_gallery_thumbnail_size');

    /**
       * Remove product page header with title and breadcrumbs
       * This removes the header added by skola_single_product_page_header()
       * Using after_setup_theme to ensure it runs after parent theme hooks are added
       */
      add_action( 'after_setup_theme', function() {
          remove_action( 'woocommerce_before_single_product', 'skola_single_product_page_header', 5 );
      }, 20 );
}

/**
 * ==============================================================================
 * NYC STEM Club SEO Enhancements
 * Added: October 15, 2025
 * Enhanced Schema Markup for better search visibility
 * ==============================================================================
 */

/**
 * Add Course Schema Markup to WooCommerce Products
 * This helps Google understand these are educational courses
 */
add_action('wp_head', 'nycstemclub_add_course_schema');
function nycstemclub_add_course_schema() {
    if (function_exists('is_product') && is_product()) {
        global $product;

        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Course',
            'name' => get_the_title(),
            'description' => wp_strip_all_tags(get_the_excerpt()),
            'provider' => array(
                '@type' => 'Organization',
                'name' => 'NYC STEM Club',
                'url' => home_url(),
                'sameAs' => array(
                    // Add your social media URLs here
                    // 'https://www.facebook.com/nycstemclub',
                    // 'https://twitter.com/nycstemclub',
                )
            )
        );

        // Add price if product has one
        if ($product && $product->get_price()) {
            $schema['offers'] = array(
                '@type' => 'Offer',
                'price' => $product->get_price(),
                'priceCurrency' => function_exists('get_woocommerce_currency') ? get_woocommerce_currency() : 'USD',
                'url' => get_permalink(),
                'availability' => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock'
            );
        }

        // Add image if available
        if (has_post_thumbnail()) {
            $schema['image'] = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }

        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}

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
 * Add Educational Organization Schema to Footer
 * This appears on all pages and helps establish site identity
 */
add_action('wp_footer', 'nycstemclub_add_organization_schema');
function nycstemclub_add_organization_schema() {
    // Only add once per page
    if (did_action('wp_footer') > 1) {
        return;
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => array('EducationalOrganization', 'LocalBusiness'),
        'name' => 'NYC STEM Club',
        'url' => home_url(),
        'logo' => array(
            '@type' => 'ImageObject',
            'url' => home_url('/wp-content/uploads/2023/10/nycstemclub-logo.png'),
        ),
        'image' => home_url('/wp-content/uploads/2023/10/nycstemclub-logo.png'),
        'description' => 'Top rated test prep and college counseling in Manhattan. Expert SAT, ACT, SHSAT, and ISEE preparation with 90%+ success rates. Serving NYC students since 2010.',
        'address' => array(
            '@type' => 'PostalAddress',
            'streetAddress' => '65 Broadway Suite 1105',
            'addressLocality' => 'New York',
            'addressRegion' => 'NY',
            'postalCode' => '10006',
            'addressCountry' => 'US'
        ),
        'geo' => array(
            '@type' => 'GeoCoordinates',
            'latitude' => '40.7074',
            'longitude' => '-74.0113'
        ),
        'telephone' => '+1-347-788-8332',
        'email' => 'info@nycstemclub.com',
        'priceRange' => '$$',
        'areaServed' => array(
            array('@type' => 'City', 'name' => 'New York', 'sameAs' => 'https://en.wikipedia.org/wiki/New_York_City'),
            array('@type' => 'Borough', 'name' => 'Manhattan'),
            array('@type' => 'Borough', 'name' => 'Brooklyn'),
            array('@type' => 'Borough', 'name' => 'Queens'),
            array('@type' => 'Borough', 'name' => 'Bronx'),
            array('@type' => 'Borough', 'name' => 'Staten Island')
        ),
        'aggregateRating' => array(
            '@type' => 'AggregateRating',
            'ratingValue' => '5',
            'bestRating' => '5',
            'worstRating' => '1',
            'ratingCount' => '75'
        ),
        'hasOfferCatalog' => array(
            '@type' => 'OfferCatalog',
            'name' => 'Test Prep & Tutoring Services',
            'itemListElement' => array(
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'SHSAT Prep')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'SAT Prep')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'ACT Prep')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'ISEE Prep')),
                array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'College Counseling'))
            )
        ),
        'sameAs' => array(
            'https://www.facebook.com/nycstemclub',
            'https://www.instagram.com/nycstemclub',
            'https://www.linkedin.com/company/nyc-stem-club-inc/'
        ),
        'foundingDate' => '2010',
        'knowsAbout' => array('SHSAT', 'SAT', 'ACT', 'ISEE', 'Test Preparation', 'College Admissions', 'Academic Tutoring'),
        'slogan' => 'Empowering NYC Students to Achieve Academic Excellence'
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
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
        'elementor',
        'elementor-frontend',
        'elementor-common',
        'elementor-editor',
        'elementskit',
        'marionette'
    );

    // Don't defer scripts in admin or Elementor editor
    if (is_admin() || (isset($_GET['action']) && $_GET['action'] === 'elementor')) {
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
 * Add BreadcrumbList Schema Markup
 * Generates structured breadcrumb data for better navigation in search results
 */
add_action('wp_head', 'nycstemclub_add_breadcrumb_schema');
function nycstemclub_add_breadcrumb_schema() {
    // Skip on homepage
    if (is_front_page() || is_home()) {
        return;
    }

    $breadcrumbs = array();
    $position = 1;

    // Always start with Home
    $breadcrumbs[] = array(
        '@type' => 'ListItem',
        'position' => $position++,
        'name' => 'Home',
        'item' => home_url()
    );

    // Course archive
    if (is_post_type_archive('course')) {
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Courses',
            'item' => get_post_type_archive_link('course')
        );
    }
    // Single course
    elseif (is_singular('course')) {
        // Add Courses archive
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Courses',
            'item' => get_post_type_archive_link('course')
        );

        // Add course category if exists
        $terms = get_the_terms(get_the_ID(), 'course_category');
        if ($terms && !is_wp_error($terms)) {
            $term = $terms[0];
            $breadcrumbs[] = array(
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $term->name,
                'item' => get_term_link($term)
            );
        }

        // Add current course
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    }
    // Course category taxonomy
    elseif (is_tax('course_category')) {
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Courses',
            'item' => get_post_type_archive_link('course')
        );

        $term = get_queried_object();
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => $term->name,
            'item' => get_term_link($term)
        );
    }
    // Single blog post
    elseif (is_single()) {
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Blog',
            'item' => get_permalink(get_option('page_for_posts'))
        );

        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    }
    // Regular page
    elseif (is_page()) {
        // Get parent pages
        $ancestors = get_post_ancestors(get_the_ID());
        $ancestors = array_reverse($ancestors);

        foreach ($ancestors as $ancestor_id) {
            $breadcrumbs[] = array(
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => get_the_title($ancestor_id),
                'item' => get_permalink($ancestor_id)
            );
        }

        // Current page
        $breadcrumbs[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    }

    // Only output if we have more than just Home
    if (count($breadcrumbs) > 1) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbs
        );

        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
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
 * Redirect Product Categories to Course Categories
 * ==============================================================================
 */
add_action('template_redirect', 'nycstemclub_redirect_product_to_course_category');
function nycstemclub_redirect_product_to_course_category() {
    // Only run if WooCommerce is active
    if (!function_exists('is_product_category')) {
        return;
    }

    // Check if we're on a product category page
    if (is_product_category('test-prep')) {
        wp_redirect(home_url('/course-category/test-prep/'), 301);
        exit;
    }
}

