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
        '@type' => 'EducationalOrganization',
        'name' => 'NYC STEM Club',
        'url' => home_url(),
        'logo' => array(
            '@type' => 'ImageObject',
            'url' => home_url('/wp-content/uploads/2023/10/nycstemclub-logo.png'), // Update with your actual logo path
        ),
        'description' => 'Top Rated test prep and college counseling in Manhattan. SAT, ACT, SHSAT, and academic tutoring.',
        'address' => array(
            '@type' => 'PostalAddress',
            'addressLocality' => 'New York',
            'addressRegion' => 'NY',
            'addressCountry' => 'US'
        ),
        'contactPoint' => array(
            '@type' => 'ContactPoint',
            'contactType' => 'Customer Service',
            'areaServed' => 'US',
            'availableLanguage' => array('English')
        )
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
 * ==============================================================================
 * END NYC STEM Club SEO Enhancements
 * ==============================================================================
 */

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
 * Redirect Product Categories to Course Categories
 * ==============================================================================
 */
add_action('template_redirect', 'nycstemclub_redirect_product_to_course_category');
function nycstemclub_redirect_product_to_course_category() {
    // Check if we're on a product category page
    if (is_product_category('test-prep')) {
        wp_redirect(home_url('/course-category/test-prep/'), 301);
        exit;
    }
}
