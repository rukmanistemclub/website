<?php
/**
 * Plugin Name: NYC STEM Club Courses
 * Plugin URI: https://nycstemclub.com
 * Description: Custom course management system for NYC STEM Club - replaces WooCommerce for course display with modern design and inquiry functionality.
 * Version: 2.3.0
 * Author: NYC STEM Club
 * Author URI: https://nycstemclub.com
 * License: GPL v2 or later
 * Text Domain: nyc-stem-courses
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('NYC_STEM_COURSES_VERSION', '2.3.0');
define('NYC_STEM_COURSES_PATH', plugin_dir_path(__FILE__));
define('NYC_STEM_COURSES_URL', plugin_dir_url(__FILE__));

// Standardized track record stats by category
// Change these once and they update on all courses in that category
define('NYC_STEM_TRACK_RECORDS', serialize([
    'sat-act' => [
        'title' => 'Our Track Record',
        'stats' => [
            ['number' => '96%', 'label' => 'Score Improvement Rate'],
            ['number' => '6-9 Points', 'label' => 'Average ACT Increase'],
            ['number' => '100+ Points', 'label' => 'Average SAT Increase'],
            ['number' => 'Up to 13 Points', 'label' => 'Top ACT Student Improvement']
        ]
    ],
    'shsat' => [
        'title' => 'Our Track Record',
        'stats' => [
            ['number' => '85%', 'label' => 'Admission Rate'],
            ['number' => '40+ Points', 'label' => 'Average Improvement'],
            ['number' => '15+', 'label' => 'Years Experience'],
        ]
    ],
    'isee' => [
        'title' => 'Our Track Record',
        'stats' => [
            ['number' => 'Over 85%', 'label' => 'Scored a Stanine of 7-9 on the ISEE'],
            ['number' => 'Top 3 Schools', 'label' => 'Our students have received offers in one of their top 3 schools: Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Ann\'s, prestigious boarding schools and many more top schools'],
        ]
    ]
]));

/**
 * Main Plugin Class
 */
class NYC_STEM_Courses {

    /**
     * Constructor
     */
    public function __construct() {
        // Check for ACF plugin
        add_action('admin_notices', array($this, 'check_dependencies'));

        // Load dependencies
        $this->load_dependencies();

        // Initialize plugin
        add_action('init', array($this, 'init'));

        // Activation/Deactivation hooks
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        // Template loading
        add_filter('template_include', array($this, 'load_course_templates'));

        // Enqueue assets
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));

        // Add admin menu for migration
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // Register settings
        add_action('admin_init', array($this, 'register_settings'));

        // Handle course creation
        add_action('admin_post_create_sat_act_course', array($this, 'handle_create_course'));

        // Register widget areas
        add_action('widgets_init', array($this, 'register_widget_areas'));

        // Register shortcodes
        add_shortcode('inquiry_button', array($this, 'inquiry_button_shortcode'));
        add_shortcode('course_category', array($this, 'course_category_shortcode'));
        add_shortcode('featured_courses', array($this, 'featured_courses_shortcode'));
        add_shortcode('shsat_schools', array($this, 'shsat_schools_shortcode'));
        add_shortcode('why_choose_sat_act', array($this, 'why_choose_sat_act_shortcode'));
        add_shortcode('why_choose_shsat', array($this, 'why_choose_shsat_shortcode'));
        add_shortcode('why_choose_isee', array($this, 'why_choose_isee_shortcode'));
        add_shortcode('why_choose_enrichment', array($this, 'why_choose_enrichment_shortcode'));
        add_shortcode('testimonials', array($this, 'testimonials_shortcode'));

        // Register query vars (fixes 404 with ?course_name= parameter)
        add_filter('query_vars', array($this, 'register_query_vars'));
    }

    /**
     * Check plugin dependencies
     */
    public function check_dependencies() {
        if (!class_exists('ACF') && !function_exists('acf')) {
            echo '<div class="notice notice-warning is-dismissible">';
            echo '<p><strong>NYC STEM Courses:</strong> Advanced Custom Fields plugin is recommended for full functionality. <a href="' . admin_url('plugin-install.php?s=advanced+custom+fields&tab=search&type=term') . '">Install ACF</a></p>';
            echo '</div>';
        }
    }

    /**
     * Load plugin dependencies
     */
    private function load_dependencies() {
        require_once NYC_STEM_COURSES_PATH . 'includes/post-types.php';
        // Load organized ACF fields (complete field set)
        require_once NYC_STEM_COURSES_PATH . 'includes/acf-fields-organized.php';
        require_once NYC_STEM_COURSES_PATH . 'includes/migration.php';
    }

    /**
     * Initialize plugin
     */
    public function init() {
        // Register post types and taxonomies
        NYC_STEM_Post_Types::register();
    }

    /**
     * Register custom query variables
     * Fixes 404 error when using ?course_name= parameter on enrollment page
     * Note: Can't use ?course= as it conflicts with the 'course' post type
     *
     * @param array $vars Existing query vars
     * @return array Modified query vars
     */
    public function register_query_vars($vars) {
        $vars[] = 'course_name';
        return $vars;
    }

    /**
     * Get inquiry button data (URL and text)
     * GLOBAL: Build Once, Run Everywhere - Works on ANY page, post, or widget
     * Change once in settings = updates ALL inquiry buttons site-wide instantly
     *
     * @param string $source Optional source identifier (e.g., 'homepage', 'sidebar')
     * @return array Array with 'text' and 'url' keys
     */
    public static function get_inquiry_button_data($source = '') {
        // Get GLOBAL settings from WordPress Settings (Courses → Settings)
        $button_text = get_option('nyc_stem_inquiry_button_text', 'Inquire Now');
        $button_url = get_option('nyc_stem_inquiry_button_url', '');

        // Default to /student-enrollment/ if not set
        $inquiry_url = !empty($button_url) ? $button_url : home_url('/student-enrollment/');

        // Add context as query parameter
        if (!empty($source)) {
            // Custom source provided (e.g., 'homepage', 'sidebar')
            $inquiry_url = add_query_arg('source', urlencode($source), $inquiry_url);
        } elseif (is_singular('course')) {
            // On a course page - add course name (using 'course_name' to avoid conflict with 'course' post type)
            $inquiry_url = add_query_arg('course_name', urlencode(get_the_title()), $inquiry_url);
        } elseif (is_page() || is_single()) {
            // On regular page or post - add page/post name
            $inquiry_url = add_query_arg('source', urlencode(get_the_title()), $inquiry_url);
        } else {
            // Archive, home, or other - add page type
            if (is_home() || is_front_page()) {
                $inquiry_url = add_query_arg('source', 'homepage', $inquiry_url);
            } elseif (is_archive()) {
                $inquiry_url = add_query_arg('source', 'courses-listing', $inquiry_url);
            }
        }

        return array(
            'text' => $button_text,
            'url' => $inquiry_url
        );
    }

    /**
     * Sanitize SVG output for safe display
     *
     * @param string $svg Raw SVG code
     * @return string Sanitized SVG
     */
    public static function sanitize_svg($svg) {
        if (empty($svg)) {
            return '';
        }

        $allowed_svg_tags = array(
            'svg' => array(
                'xmlns' => true,
                'fill' => true,
                'viewbox' => true,
                'role' => true,
                'aria-hidden' => true,
                'focusable' => true,
                'width' => true,
                'height' => true,
                'class' => true,
            ),
            'path' => array(
                'd' => true,
                'fill' => true,
                'stroke' => true,
                'stroke-width' => true,
                'stroke-linecap' => true,
                'stroke-linejoin' => true,
            ),
            'circle' => array(
                'cx' => true,
                'cy' => true,
                'r' => true,
                'fill' => true,
                'stroke' => true,
            ),
            'rect' => array(
                'x' => true,
                'y' => true,
                'width' => true,
                'height' => true,
                'fill' => true,
                'stroke' => true,
                'rx' => true,
                'ry' => true,
            ),
            'g' => array(
                'fill' => true,
                'stroke' => true,
            ),
            'line' => array(
                'x1' => true,
                'y1' => true,
                'x2' => true,
                'y2' => true,
                'stroke' => true,
                'stroke-width' => true,
            ),
            'polyline' => array(
                'points' => true,
                'fill' => true,
                'stroke' => true,
            ),
            'polygon' => array(
                'points' => true,
                'fill' => true,
                'stroke' => true,
            ),
        );

        return wp_kses($svg, $allowed_svg_tags);
    }

    /**
     * Plugin activation
     */
    public function activate() {
        // Register post types
        NYC_STEM_Post_Types::register();

        // Flush rewrite rules
        flush_rewrite_rules();
    }

    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Clean up transients
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_related_courses_%'");
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_related_courses_%'");

        // Flush rewrite rules
        flush_rewrite_rules();
    }

    /**
     * Load custom templates for course post type
     */
    public function load_course_templates($template) {
        // Single course template
        if (is_singular('course')) {
            $plugin_template = NYC_STEM_COURSES_PATH . 'templates/single-course.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        // Course archive template
        if (is_post_type_archive('course')) {
            $plugin_template = NYC_STEM_COURSES_PATH . 'templates/archive-course.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        // Course category taxonomy template
        if (is_tax('course_category')) {
            $plugin_template = NYC_STEM_COURSES_PATH . 'templates/taxonomy-course_category.php';
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $template;
    }

    /**
     * Enqueue styles and scripts
     */
    public function enqueue_assets() {
        // Only load on course pages
        if (is_singular('course') || is_post_type_archive('course') || is_tax('course_category')) {

            // Enqueue Google Fonts - Roboto
            wp_enqueue_style(
                'nyc-stem-google-fonts',
                'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap',
                array(),
                null
            );

            // Enqueue course styles
            wp_enqueue_style(
                'nyc-stem-course-styles',
                NYC_STEM_COURSES_URL . 'assets/css/course-styles.css',
                array(),
                NYC_STEM_COURSES_VERSION
            );

            // Enqueue course scripts
            wp_enqueue_script(
                'nyc-stem-course-scripts',
                NYC_STEM_COURSES_URL . 'assets/js/course-scripts.js',
                array('jquery'),
                NYC_STEM_COURSES_VERSION,
                true
            );
        }
    }

    /**
     * Add admin menu for migration
     */
    public function add_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=course',
            'WooCommerce Migration',
            'Migration Tool',
            'manage_options',
            'nyc-stem-migration',
            array($this, 'migration_page')
        );

        add_submenu_page(
            'edit.php?post_type=course',
            'Course Settings',
            'Settings',
            'manage_options',
            'nyc-stem-settings',
            array($this, 'settings_page')
        );
    }

    /**
     * Migration admin page
     */
    public function migration_page() {
        require_once NYC_STEM_COURSES_PATH . 'includes/migration-page.php';
    }

    /**
     * Register widget areas
     */
    public function register_widget_areas() {
        register_sidebar(array(
            'name'          => __('Course Archive Testimonials', 'nyc-stem-courses'),
            'id'            => 'course-archive-testimonials',
            'description'   => __('Widget area for Google Reviews or testimonials on the course archive page', 'nyc-stem-courses'),
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }

    /**
     * Register settings
     */
    public function register_settings() {
        register_setting('nyc_stem_settings', 'nyc_stem_reviews_shortcode', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_text', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Inquire Now'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_url', array(
            'type' => 'string',
            'sanitize_callback' => 'esc_url_raw',
            'default' => ''
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_color', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'orange'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_rounded', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'yes'
        ));

        // Button styling settings
        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_font_size', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '24px'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_font_weight', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '700'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_padding', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '12px 24px'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_width', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '200px'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_orange_color', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '#FF7F07'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_teal_color', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '#28AFCF'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_text_color', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '#FFFFFF'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_sharp_radius', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '8px'
        ));

        register_setting('nyc_stem_settings', 'nyc_stem_inquiry_button_rounded_radius', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '50px'
        ));
    }

    /**
     * Settings page
     */
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>NYC STEM Courses - Global Settings</h1>
            <p class="description">Configure global settings that apply to all courses. Changes here will be reflected site-wide.</p>

            <?php if (isset($_GET['course_created'])): ?>
                <div class="notice notice-success is-dismissible">
                    <p><strong>✅ SAT/ACT Course Created Successfully!</strong> <a href="<?php echo home_url('/courses/'); ?>">View Courses</a></p>
                </div>
            <?php endif; ?>

            <form method="post" action="options.php">
                <?php settings_fields('nyc_stem_settings'); ?>

                <h2>🎯 Global Inquiry Button (Build Once, Run Everywhere)</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_text">Inquiry Button Text</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_text"
                                   name="nyc_stem_inquiry_button_text"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_text', 'Inquire Now')); ?>"
                                   class="regular-text"
                                   placeholder="Inquire Now">
                            <p class="description">
                                <strong>This text appears on ALL inquiry buttons across every course page.</strong>
                                <br>Examples: "Inquire Now" | "Register Now" | "Get Started" | "Apply Today"
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_url">Form URL (Global for ALL Courses)</label>
                        </th>
                        <td>
                            <input type="url"
                                   id="nyc_stem_inquiry_button_url"
                                   name="nyc_stem_inquiry_button_url"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_url', '')); ?>"
                                   class="regular-text"
                                   placeholder="/student-enrollment/">
                            <p class="description">
                                <strong>⚠️ This URL is used by EVERY inquiry button on EVERY course page.</strong>
                                <br>Currently set to: <code><?php echo esc_html(get_option('nyc_stem_inquiry_button_url', '/student-enrollment/')); ?></code>
                                <br><br>
                                <strong>Common use cases:</strong>
                                <ul style="margin: 10px 0 0 20px;">
                                    <li>Default form: <code>/student-enrollment/</code></li>
                                    <li>New form location: <code>/contact/</code></li>
                                    <li>External form: <code>https://forms.google.com/...</code></li>
                                    <li>CRM integration: <code>/crm-inquiry/</code></li>
                                </ul>
                                <br>
                                💡 Course name automatically added as: <code>?course=Course+Name</code>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_color">Button Color</label>
                        </th>
                        <td>
                            <select id="nyc_stem_inquiry_button_color" name="nyc_stem_inquiry_button_color">
                                <option value="orange" <?php selected(get_option('nyc_stem_inquiry_button_color', 'orange'), 'orange'); ?>>Orange (#FF7F07)</option>
                                <option value="teal" <?php selected(get_option('nyc_stem_inquiry_button_color', 'orange'), 'teal'); ?>>Teal (#28AFCF)</option>
                            </select>
                            <p class="description">
                                Default color for all inquiry buttons. Can be overridden per button using the shortcode.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_rounded">Button Style</label>
                        </th>
                        <td>
                            <select id="nyc_stem_inquiry_button_rounded" name="nyc_stem_inquiry_button_rounded">
                                <option value="yes" <?php selected(get_option('nyc_stem_inquiry_button_rounded', 'yes'), 'yes'); ?>>Rounded</option>
                                <option value="no" <?php selected(get_option('nyc_stem_inquiry_button_rounded', 'yes'), 'no'); ?>>Sharp</option>
                            </select>
                            <p class="description">
                                Default corner style for all inquiry buttons.
                            </p>
                        </td>
                    </tr>
                </table>

                <h3>🎨 Advanced Button Styling</h3>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_font_size">Font Size</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_font_size"
                                   name="nyc_stem_inquiry_button_font_size"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_font_size', '24px')); ?>"
                                   class="small-text"
                                   placeholder="24px">
                            <p class="description">Button text size (e.g., 24px, 1.5rem)</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_font_weight">Font Weight</label>
                        </th>
                        <td>
                            <select id="nyc_stem_inquiry_button_font_weight" name="nyc_stem_inquiry_button_font_weight">
                                <option value="400" <?php selected(get_option('nyc_stem_inquiry_button_font_weight', '700'), '400'); ?>>Normal (400)</option>
                                <option value="500" <?php selected(get_option('nyc_stem_inquiry_button_font_weight', '700'), '500'); ?>>Medium (500)</option>
                                <option value="600" <?php selected(get_option('nyc_stem_inquiry_button_font_weight', '700'), '600'); ?>>Semi-Bold (600)</option>
                                <option value="700" <?php selected(get_option('nyc_stem_inquiry_button_font_weight', '700'), '700'); ?>>Bold (700)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_padding">Padding</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_padding"
                                   name="nyc_stem_inquiry_button_padding"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_padding', '12px 24px')); ?>"
                                   class="regular-text"
                                   placeholder="12px 24px">
                            <p class="description">Button padding (e.g., 12px 24px)</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_width">Button Width</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_width"
                                   name="nyc_stem_inquiry_button_width"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_width', '200px')); ?>"
                                   class="small-text"
                                   placeholder="200px">
                            <p class="description">Button width (e.g., 200px, auto)</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_orange_color">Orange Color</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_orange_color"
                                   name="nyc_stem_inquiry_button_orange_color"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_orange_color', '#FF7F07')); ?>"
                                   class="small-text color-picker">
                            <p class="description">Hex color for orange buttons</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_teal_color">Teal Color</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_teal_color"
                                   name="nyc_stem_inquiry_button_teal_color"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_teal_color', '#28AFCF')); ?>"
                                   class="small-text color-picker">
                            <p class="description">Hex color for teal buttons</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_text_color">Text Color</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_text_color"
                                   name="nyc_stem_inquiry_button_text_color"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_text_color', '#FFFFFF')); ?>"
                                   class="small-text color-picker">
                            <p class="description">Text color on buttons</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_sharp_radius">Sharp Corner Radius</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_sharp_radius"
                                   name="nyc_stem_inquiry_button_sharp_radius"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_sharp_radius', '8px')); ?>"
                                   class="small-text"
                                   placeholder="8px">
                            <p class="description">Border radius for sharp style</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_inquiry_button_rounded_radius">Rounded Corner Radius</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_inquiry_button_rounded_radius"
                                   name="nyc_stem_inquiry_button_rounded_radius"
                                   value="<?php echo esc_attr(get_option('nyc_stem_inquiry_button_rounded_radius', '50px')); ?>"
                                   class="small-text"
                                   placeholder="50px">
                            <p class="description">Border radius for rounded style</p>
                        </td>
                    </tr>
                </table>

                <hr style="margin: 40px 0;">

                <h2>⭐ Google Reviews</h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_reviews_shortcode">Reviews Shortcode</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_reviews_shortcode"
                                   name="nyc_stem_reviews_shortcode"
                                   value="<?php echo esc_attr(get_option('nyc_stem_reviews_shortcode', '')); ?>"
                                   class="regular-text"
                                   placeholder="[google-reviews]">
                            <p class="description">
                                Enter your Google Reviews shortcode. It will display on the courses archive page.
                                <br>Example: <code>[google-reviews]</code> or <code>[trustindex no-registration=google]</code>
                            </p>
                        </td>
                    </tr>
                </table>

                <?php submit_button('Save Global Settings'); ?>
            </form>

            <div style="margin-top: 30px; padding: 20px; background: #f0f9ff; border-left: 4px solid #0ea5e9;">
                <h3 style="margin-top: 0;">💡 How the Global Inquiry Button Works</h3>
                <ul style="line-height: 1.8;">
                    <li><strong>Build Once:</strong> Set the button text and URL here in one place</li>
                    <li><strong>Run Everywhere:</strong> Works on course pages, regular pages, posts, widgets, anywhere!</li>
                    <li><strong>Change Once:</strong> Update here and it updates ALL inquiry buttons site-wide instantly</li>
                    <li><strong>Smart Tracking:</strong> Automatically adds course name or page source to URL</li>
                </ul>

                <h4>📍 Where It Appears Automatically:</h4>
                <ul style="line-height: 1.8;">
                    <li>✅ Course pages: Hero section (top) and CTA section (bottom)</li>
                    <li>✅ URL includes: <code>?course=SHSAT+Prep</code></li>
                </ul>

                <h4>🎨 Add Button Anywhere with Shortcode:</h4>
                <p>Use the <code>[inquiry_button]</code> shortcode to add the button to any page, post, or widget:</p>
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                    <tr style="background: #fff;">
                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Basic Usage:</strong></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><code>[inquiry_button]</code></td>
                    </tr>
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>With Source Tracking:</strong></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><code>[inquiry_button source="homepage"]</code></td>
                    </tr>
                    <tr style="background: #fff;">
                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Custom Text:</strong></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><code>[inquiry_button text="Get Started Today"]</code></td>
                    </tr>
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>All Options:</strong></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><code>[inquiry_button source="footer" text="Apply Now" class="custom-style"]</code></td>
                    </tr>
                </table>

                <h4 style="margin-top: 20px;">📊 Examples:</h4>
                <ul style="line-height: 1.8;">
                    <li><strong>Homepage:</strong> Add <code>[inquiry_button source="homepage"]</code> → URL: <code>/student-enrollment/?source=homepage</code></li>
                    <li><strong>Sidebar Widget:</strong> Add <code>[inquiry_button source="sidebar"]</code> → URL: <code>/student-enrollment/?source=sidebar</code></li>
                    <li><strong>About Page:</strong> Add <code>[inquiry_button]</code> → URL: <code>/student-enrollment/?source=About+Us</code></li>
                </ul>
            </div>
        </div>
        <?php
    }

    /**
     * Handle course creation from admin
     */
    public function handle_create_course() {
        if (!isset($_POST['create_sat_act_course']) || !check_admin_referer('create_sat_act_course')) {
            return;
        }

        if (!current_user_can('manage_options')) {
            wp_die('Permission denied');
        }

        // Include and run the course creator
        require_once NYC_STEM_COURSES_PATH . 'create-sat-act-course.php';

        wp_redirect(admin_url('admin.php?page=nyc-stem-settings&course_created=1'));
        exit;
    }

    /**
     * Inquiry Button Shortcode
     * Usage: [inquiry_button] or [inquiry_button source="homepage"]
     *
     * @param array $atts Shortcode attributes
     * @return string Button HTML
     */
    public function inquiry_button_shortcode($atts) {
        // Get global defaults from WordPress settings
        $default_color = get_option('nyc_stem_inquiry_button_color', 'orange');
        $default_rounded = get_option('nyc_stem_inquiry_button_rounded', 'yes');

        // Parse shortcode attributes
        $atts = shortcode_atts(array(
            'source' => '',
            'text' => '',
            'class' => '',
            'color' => $default_color,
            'url' => '',
            'rounded' => $default_rounded,
        ), $atts);

        // Get button text
        $button_text = !empty($atts['text'])
            ? $atts['text']
            : get_option('nyc_stem_inquiry_button_text', 'Inquire Now');

        // Get button URL
        $button_url = !empty($atts['url'])
            ? $atts['url']
            : get_option('nyc_stem_inquiry_button_url', '/student-enrollment/');

        // Add source tracking
        if ($atts['source']) {
            $separator = strpos($button_url, '?') !== false ? '&' : '?';
            $button_url .= $separator . 'source=' . urlencode($atts['source']);
        } elseif (is_singular('course')) {
            $separator = strpos($button_url, '?') !== false ? '&' : '?';
            $button_url .= $separator . 'course_name=' . urlencode(get_the_title());
        }

        // Get styling settings from WordPress
        $orange_color = get_option('nyc_stem_inquiry_button_orange_color', '#FF9574');
        $teal_color = get_option('nyc_stem_inquiry_button_teal_color', '#28AFCF');
        $dark_teal_color = get_option('nyc_stem_inquiry_button_dark_teal_color', '#134958');
        $text_color = get_option('nyc_stem_inquiry_button_text_color', '#FFFFFF');
        $font_size = get_option('nyc_stem_inquiry_button_font_size', '24px');
        $font_weight = get_option('nyc_stem_inquiry_button_font_weight', '700');
        $padding = get_option('nyc_stem_inquiry_button_padding', '12px 24px');
        $width = get_option('nyc_stem_inquiry_button_width', '200px');
        $sharp_radius = get_option('nyc_stem_inquiry_button_sharp_radius', '8px');
        $rounded_radius = get_option('nyc_stem_inquiry_button_rounded_radius', '50px');

        // Determine colors
        $color_lower = strtolower($atts['color']);
        if ($color_lower === 'teal') {
            $bg_color = $teal_color;
        } elseif ($color_lower === 'dark-teal' || $color_lower === 'darkteal') {
            $bg_color = $dark_teal_color;
        } else {
            $bg_color = $orange_color;
        }

        // Determine border-radius
        $border_radius = (strtolower($atts['rounded']) === 'yes') ? $rounded_radius : $sharp_radius;

        // Build CSS classes
        $css_classes = 'elementor-button elementor-button-link elementor-size-sm nyc-stem-inquiry-btn';
        if ($color_lower === 'teal') {
            $css_classes .= ' btn-teal';
        } elseif ($color_lower === 'dark-teal' || $color_lower === 'darkteal') {
            $css_classes .= ' btn-dark-teal';
        }
        if ($atts['class']) {
            $css_classes .= ' ' . esc_attr($atts['class']);
        }

        // Build inline styles from WordPress settings
        $button_style = sprintf(
            'background-color: %s; color: %s; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, "Helvetica Neue", sans-serif; font-size: %s; font-weight: %s; padding: %s; border: none; text-decoration: none; display: inline-block; text-align: center; line-height: 1.8; transition: all 0.3s; cursor: pointer; -webkit-font-smoothing: antialiased; width: %s; min-width: %s; border-radius: %s; box-sizing: border-box;',
            $bg_color, $text_color, $font_size, $font_weight, $padding, $width, $width, $border_radius
        );

        // Return button HTML with inline styles
        return sprintf(
            '<a class="%s" href="%s" style="%s">
                <span class="elementor-button-content-wrapper">
                    <span class="elementor-button-text">%s</span>
                </span>
            </a>',
            $css_classes,
            esc_url($button_url),
            $button_style,
            esc_html($button_text)
        );
    }

    /**
     * Display courses from a specific category
     * Shortcode: [course_category]
     *
     * Examples:
     * [course_category category="shsat" title="SHSAT Preparation Programs"]
     * [course_category category="sat-act" title="SAT/ACT Programs" limit="4"]
     * [course_category category="isee" columns="3"]
     *
     * @param array $atts Shortcode attributes
     * @return string Course grid HTML
     */
    public function course_category_shortcode($atts) {
        // Parse shortcode attributes
        $atts = shortcode_atts(array(
            'category' => '',           // Required: Category slug
            'title' => 'Related Courses', // Section title
            'limit' => -1,              // Number of courses to display (-1 = all)
            'columns' => 4,             // Grid columns (3 or 4)
            'show_excerpt' => 'yes',    // Show excerpt (yes/no)
            'show_meta' => 'yes',       // Show duration/format (yes/no)
        ), $atts);

        // Validate category
        if (empty($atts['category'])) {
            return '<p style="color: red;">Error: Category attribute is required for [course_category] shortcode.</p>';
        }

        // Query courses by category with caching
        $cache_key = 'course_cat_' . sanitize_text_field($atts['category']) . '_' . intval($atts['limit']);
        $courses = wp_cache_get($cache_key, 'nyc_stem_courses');

        if (false === $courses) {
            $courses = get_posts(array(
                'post_type' => 'course',
                'posts_per_page' => intval($atts['limit']),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'course_category',
                        'field' => 'slug',
                        'terms' => sanitize_text_field($atts['category']),
                    ),
                ),
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'fields' => 'ids',
                'no_found_rows' => true,
                'update_post_meta_cache' => false,
                'update_post_term_cache' => false,
            ));

            wp_cache_set($cache_key, $courses, 'nyc_stem_courses', 300); // Cache for 5 minutes
        }

        if (empty($courses)) {
            return ''; // Return nothing if no courses found
        }

        // Start output buffering
        ob_start();

        // Enqueue styles if not already loaded
        wp_enqueue_style(
            'nyc-stem-course-styles',
            NYC_STEM_COURSES_URL . 'assets/css/course-styles.css',
            array(),
            NYC_STEM_COURSES_VERSION
        );

        ?>
        <section class="course-related">
            <div class="related-container">
                <h2 class="related-title"><?php echo esc_html($atts['title']); ?></h2>
                <div class="related-grid" style="grid-template-columns: repeat(<?php echo intval($atts['columns']); ?>, 1fr);">
                    <?php
                    $card_colors = array('card-blue', 'card-orange', 'card-tan');
                    $btn_colors = array('btn-blue', 'btn-orange', 'btn-tan');
                    $color_index = 0;

                    foreach ($courses as $course_id) :
                        $card_class = $card_colors[$color_index % 3];
                        $btn_class = $btn_colors[$color_index % 3];
                        $color_index++;
                    ?>
                        <div class="course-card <?php echo $card_class; ?>">
                            <h3 class="course-card-title"><?php echo get_the_title($course_id); ?></h3>

                            <?php if ($atts['show_meta'] === 'yes' && function_exists('get_field')) : ?>
                                <div class="course-card-meta">
                                    <?php
                                    $duration = get_field('course_duration', $course_id);
                                    $formats = get_field('class_format', $course_id);

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
                            <?php endif; ?>

                            <?php if ($atts['show_excerpt'] === 'yes') :
                                $excerpt = get_the_excerpt($course_id);
                                if ($excerpt) :
                            ?>
                                <p class="course-card-description">
                                    <?php echo wp_trim_words($excerpt, 20); ?>
                                </p>
                            <?php endif; endif; ?>

                            <a href="<?php echo get_permalink($course_id); ?>" class="course-card-button <?php echo $btn_class; ?>">
                                Learn More →
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php

        return ob_get_clean();
    }

    /**
     * Featured Courses Shortcode
     * Displays featured courses from homepage ACF field
     * Usage: [featured_courses] or [featured_courses homepage_id="15290"]
     *
     * @param array $atts Shortcode attributes
     * @return string Featured courses grid HTML
     */
    public function featured_courses_shortcode($atts) {
        // Parse shortcode attributes
        $atts = shortcode_atts(array(
            'homepage_id' => 15290,     // Homepage post ID
            'title' => '',              // Section title (empty by default)
            'columns' => 4,             // Grid columns
        ), $atts);

        // Get featured courses from ACF field
        $featured_course_ids = get_field('featured_courses', intval($atts['homepage_id']));

        // Fallback to specific courses if ACF field is empty
        if (empty($featured_course_ids) || !is_array($featured_course_ids)) {
            $featured_course_ids = array(17223, 17138, 17345, 17145);
        }

        if (empty($featured_course_ids)) {
            return ''; // Return nothing if no courses found
        }

        // Start output buffering
        ob_start();

        // Enqueue styles if not already loaded
        wp_enqueue_style(
            'nyc-stem-course-styles',
            NYC_STEM_COURSES_URL . 'assets/css/course-styles.css',
            array(),
            NYC_STEM_COURSES_VERSION
        );

        ?>
        <section class="course-related featured-courses-section">
            <div class="related-container">
                <?php if (!empty($atts['title'])) : ?>
                    <h2 class="related-title"><?php echo esc_html($atts['title']); ?></h2>
                <?php endif; ?>
                <div class="related-grid" style="grid-template-columns: repeat(<?php echo intval($atts['columns']); ?>, 1fr);">
                    <?php
                    $card_colors = array('card-blue', 'card-orange', 'card-tan');
                    $btn_colors = array('btn-blue', 'btn-orange', 'btn-tan');
                    $color_index = 0;

                    foreach ($featured_course_ids as $course_id) :
                        // Skip if course doesn't exist
                        if (get_post_status($course_id) !== 'publish') {
                            continue;
                        }

                        $card_class = $card_colors[$color_index % 3];
                        $btn_class = $btn_colors[$color_index % 3];
                        $color_index++;
                    ?>
                        <div class="course-card <?php echo $card_class; ?>">
                            <h3 class="course-card-title"><?php echo get_the_title($course_id); ?></h3>

                            <?php if (function_exists('get_field')) : ?>
                                <div class="course-card-meta">
                                    <?php
                                    $duration = get_field('course_duration', $course_id);
                                    $formats = get_field('class_format', $course_id);

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
                            <?php endif; ?>

                            <?php
                            $excerpt = get_the_excerpt($course_id);
                            if ($excerpt) :
                            ?>
                                <p class="course-card-description">
                                    <?php echo wp_trim_words($excerpt, 20); ?>
                                </p>
                            <?php endif; ?>

                            <a href="<?php echo get_permalink($course_id); ?>" class="course-card-button <?php echo $btn_class; ?>">
                                Learn More →
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php

        return ob_get_clean();
    }

    /**
     * Display SHSAT Schools as colorful badges
     * Shortcode: [shsat_schools]
     *
     * Displays all 8 NYC Specialized High Schools as gradient badge buttons
     * that flow horizontally and wrap responsively
     *
     * @return string Schools badges HTML
     */
    public function shsat_schools_shortcode($atts) {
        // Define schools with their URLs (in order of competitiveness)
        $schools = array(
            array('name' => 'Stuyvesant', 'url' => 'https://stuy.enschool.org/'),
            array('name' => 'Bronx Science', 'url' => 'https://www.bxsci.edu/'),
            array('name' => 'Brooklyn Tech', 'url' => 'https://www.bths.edu/'),
            array('name' => 'Brooklyn Latin', 'url' => 'https://www.brooklynlatin.org/'),
            array('name' => 'HSMSE @ City College', 'url' => 'https://hsmse.org/'),
            array('name' => 'Queens Science @ York', 'url' => 'https://www.qhss.org/'),
            array('name' => 'Staten Island Tech', 'url' => 'https://www.siths.org/'),
            array('name' => 'HSAS @ Lehman', 'url' => 'https://www.lehman.edu/lehman-high-school-american-studies/'),
        );

        ob_start();
        ?>
        <div class="shsat-schools-container">
            <?php foreach ($schools as $school): ?>
                <a href="<?php echo esc_url($school['url']); ?>" target="_blank" class="school-badge" rel="noopener noreferrer">
                    <?php echo esc_html($school['name']); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Why Choose NYC STEM Club - SAT/ACT Section Shortcode
     *
     * Usage: [why_choose_sat_act]
     *
     * @return string Why Choose section HTML
     */
    public function why_choose_sat_act_shortcode($atts) {
        // Enqueue styles
        wp_enqueue_style(
            'nyc-stem-course-styles',
            NYC_STEM_COURSES_URL . 'assets/css/course-styles.css',
            array(),
            NYC_STEM_COURSES_VERSION
        );

        $output = '<section class="why-choose-sat-act">';
        $output .= '<div class="why-choose-container">';

        // Header
        $output .= '<div class="why-choose-header">';
        $output .= '<h2 style="font-family: \'Roboto\', sans-serif !important; font-size: 32px !important; font-weight: 700 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 15px !important;">Why Choose NYC STEM Club?</h2>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 18px !important; font-weight: 400 !important; color: #555 !important; line-height: 1.6 !important; max-width: 900px !important; margin: 0 auto !important;">Our comprehensive approach combines expert instruction, proven curriculum, and personalized attention to maximize every student\'s potential.</p>';
        $output .= '</div>';

        // Benefits Grid
        $output .= '<div class="why-choose-grid">';

        // Card 1
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #28AFCF !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #28AFCF, #134958) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Proven Score Improvements</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">96% of our students see significant score increases. Average gains: 6-9 points on ACT, 100+ points on SAT.</p>';
        $output .= '</div></div>';

        // Card 2
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #FF7F07 !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #FF7F07, #e66f00) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M9 11H7V9H9M13 11H11V9H13M17 11H15V9H17M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M19 19H5V8H19V19Z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Personalized, Diagnostic-Driven Strategy</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">Every student starts with diagnostic testing. We tailor our approach to your starting point, target score, and timeline.</p>';
        $output .= '</div></div>';

        // Card 3
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #F0B268 !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #F0B268, #d99d52) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12M12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Expert Test-Prep Instructors with 15+ Years Experience</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">Specialists in SAT/ACT strategies with deep expertise in both Enhanced ACT and Digital SAT formats.</p>';
        $output .= '</div></div>';

        // Card 4
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #28A745 !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #28A745, #1e7e34) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2M12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20M7 13H9V15H11V13H13V11H11V9H9V11H7V13Z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Flexible Learning Options That Fit Your Life</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">Private 1-on-1 sessions, small group classes, in-person at our Downtown Manhattan location, or live online.</p>';
        $output .= '</div></div>';

        $output .= '</div>'; // Close grid

        // Badge
        $output .= '<div style="background: linear-gradient(135deg, #134958, #1a5f73); border-radius: 12px; padding: 15px 20px; text-align: center; box-shadow: 0 6px 25px rgba(19, 73, 88, 0.3); margin-top: 20px;">';
        $output .= '<div style="display: flex; align-items: center; justify-content: center; gap: 15px; flex-wrap: wrap;">';
        $output .= '<div style="display: flex; align-items: center; gap: 10px;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#28AFCF" width="32" height="32"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>';
        $output .= '<span style="font-family: \'Roboto\', sans-serif; font-size: 18px; font-weight: 700; color: white;">Fully Updated for Digital SAT &amp; Enhanced ACT</span>';
        $output .= '</div>';
        $output .= '<span style="font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: 400; color: rgba(255, 255, 255, 0.9);">Our curriculum reflects all the latest test format changes to ensure you\'re fully prepared.</span>';
        $output .= '</div></div>';

        $output .= '</div>'; // Close container
        $output .= '</section>';

        return $output;
    }

    /**
     * Why Choose SHSAT Shortcode
     * Displays the "Why Choose NYC STEM Club?" section for SHSAT pages
     * Usage: [why_choose_shsat]
     */
    public function why_choose_shsat_shortcode($atts) {
        $output = '<style>';

        // Section H2 Title
        $output .= '.why-choose-shsat h2 { font-family: \'Roboto\', sans-serif !important; font-size: 32px !important; font-weight: 700 !important; color: #134958 !important; line-height: 1.3 !important; text-align: center !important; margin-bottom: 20px !important; }';

        // Why Choose Grid Styles
        $output .= '.why-choose-grid { display: grid !important; grid-template-columns: repeat(4, 1fr) !important; gap: 20px !important; margin: 40px 0 !important; }';
        $output .= '.section .why-choose-grid .benefit-card, .why-choose-grid .benefit-card { background: #EFF8FB !important; padding: 20px !important; border-radius: 12px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #28AFCF !important; border-left: 3px solid #28AFCF !important; text-align: left !important; transition: all 0.3s ease !important; min-height: 140px !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(1) { border-left-color: #28AFCF !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(2) { border-left-color: #FF7F07 !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(3) { border-left-color: #F0B268 !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(4) { border-left-color: #28A745 !important; }';
        $output .= '.why-choose-grid .benefit-card:hover { transform: translateY(-3px) !important; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12) !important; }';
        $output .= '.why-choose-grid .benefit-card .benefit-icon, .benefit-card .benefit-icon { width: 28px !important; height: 28px !important; border-radius: 6px !important; display: flex !important; align-items: center !important; justify-content: center !important; margin-right: 10px !important; float: left !important; flex-shrink: 0 !important; }';
        $output .= '.why-choose-grid .benefit-card .benefit-icon svg { width: 16px !important; height: 16px !important; flex-shrink: 0 !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(1) .benefit-icon { background: linear-gradient(135deg, #28AFCF, #1a9cb8) !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(2) .benefit-icon { background: linear-gradient(135deg, #FF7F07, #e66f00) !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(3) .benefit-icon { background: linear-gradient(135deg, #F0B268, #d99d52) !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(4) .benefit-icon { background: linear-gradient(135deg, #28A745, #1e7e34) !important; }';
        $output .= '.why-choose-grid .benefit-card h3, .benefit-card h3 { font-family: \'Roboto\', sans-serif !important; font-size: 18px !important; font-weight: 600 !important; line-height: 1.3 !important; color: #134958 !important; margin: 0 0 8px 0 !important; margin-left: 40px !important; margin-top: 0 !important; text-align: left !important; }';
        $output .= '.why-choose-grid .benefit-card p, .benefit-card p { font-family: \'Roboto\', sans-serif !important; font-size: 15px !important; line-height: 1.6 !important; color: #333 !important; margin: 0 !important; font-weight: 400 !important; clear: both !important; text-align: left !important; }';

        // Badge Styles
        $output .= '.why-choose-badge { background: linear-gradient(135deg, #134958, #1a5f73); border-radius: 12px; padding: 15px 20px; text-align: center; box-shadow: 0 6px 25px rgba(19, 73, 88, 0.3); margin-top: 20px; }';
        $output .= '.why-choose-badge .badge-content { display: flex; align-items: center; justify-content: center; gap: 15px; flex-wrap: wrap; }';
        $output .= '.why-choose-badge .badge-icon-text { display: flex; align-items: center; gap: 10px; }';
        $output .= '.why-choose-badge svg { flex-shrink: 0; }';
        $output .= '.why-choose-badge .badge-title { font-family: \'Roboto\', sans-serif; font-size: 18px; font-weight: 700; color: white; margin: 0; }';
        $output .= '.why-choose-badge .badge-subtitle { font-family: \'Roboto\', sans-serif; font-size: 16px; font-weight: 400; color: rgba(255, 255, 255, 0.9); margin: 0; }';

        // Responsive Styles
        $output .= '@media (max-width: 992px) { ';
        $output .= '.why-choose-grid { grid-template-columns: repeat(2, 1fr) !important; } ';
        $output .= '}';
        $output .= '@media (max-width: 768px) { ';
        $output .= '.why-choose-grid { grid-template-columns: 1fr !important; } ';
        $output .= '.why-choose-shsat h2 { font-size: 28px !important; } ';
        $output .= '.why-choose-shsat .benefit-card { padding: 15px !important; } ';
        $output .= '.why-choose-shsat .benefit-card h3 { font-size: 17px !important; } ';
        $output .= '.why-choose-shsat .benefit-card p { font-size: 14px !important; } ';
        $output .= '.why-choose-shsat > div { padding: 10px 15px 20px 15px !important; } '; // Container padding
        $output .= '}';
        $output .= '@media (max-width: 480px) { ';
        $output .= '.why-choose-shsat h2 { font-size: 24px !important; } ';
        $output .= '.why-choose-shsat .benefit-card { padding: 12px !important; } ';
        $output .= '.why-choose-shsat .benefit-card h3 { font-size: 16px !important; margin-left: 38px !important; } ';
        $output .= '.why-choose-shsat .benefit-card p { font-size: 14px !important; } ';
        $output .= '.why-choose-shsat > div { padding: 10px 12px 15px 12px !important; } ';
        $output .= '.why-choose-badge { padding: 12px 15px !important; } ';
        $output .= '.why-choose-badge .badge-title { font-size: 16px !important; } ';
        $output .= '.why-choose-badge .badge-subtitle { font-size: 14px !important; } ';
        $output .= '.why-choose-badge svg { width: 24px !important; height: 24px !important; } ';
        $output .= '}';

        $output .= '</style>';

        // HTML Content with Container
        $output .= '<section class="why-choose-shsat" style="padding: 0 !important; margin: 0 !important; background: #CDE9F6 !important;">';
        $output .= '<div style="max-width: 1200px !important; margin: 0 auto !important; padding: 10px 20px 24px 20px !important;">';
        $output .= '<h2>Why Choose NYC STEM Club?</h2>';
        $output .= '<div class="why-choose-grid">';

        // Card 1: Proven Track Record
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Proven Track Record</h3>';
        $output .= '<p>90%+ acceptance rate consistently for over a decade. Real results, real success stories.</p>';
        $output .= '</div>';
        $output .= '</div>';

        // Card 2: Comprehensive Curriculum
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Comprehensive Curriculum</h3>';
        $output .= '<p>Complete 3-module system covering all SHSAT topics with depth and mastery.</p>';
        $output .= '</div>';
        $output .= '</div>';

        // Card 3: Small Group Classes
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Small Group Classes</h3>';
        $output .= '<p>Personalized attention with small class sizes and private tutoring options.</p>';
        $output .= '</div>';
        $output .= '</div>';

        // Card 4: Digital SHSAT Ready
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M17 1.01L7 1C5.9 1 5 1.9 5 3V21C5 22.1 5.9 23 7 23H17C18.1 23 19 22.1 19 21V3C19 1.9 18.1 1.01 17 1.01M17 19H7V5H17V19M16 13H13V16H11V13H8V11H11V8H13V11H16V13Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Digital SHSAT Ready</h3>';
        $output .= '<p>Extensive practice on authentic digital platform to prepare for the real test experience.</p>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '</div>'; // Close why-choose-grid

        // Badge
        $output .= '<div class="why-choose-badge">';
        $output .= '<div class="badge-content">';
        $output .= '<div class="badge-icon-text">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#28AFCF" width="32" height="32">';
        $output .= '<path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>';
        $output .= '</svg>';
        $output .= '<span class="badge-title">Fully Updated for Digital SHSAT Format</span>';
        $output .= '</div>';
        $output .= '<span class="badge-subtitle">Our curriculum reflects all the latest test format changes to ensure you\'re fully prepared.</span>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '</div>'; // Close container
        $output .= '</section>'; // Close section

        return $output;
    }

    /**
     * Why Choose NYC STEM Club - ISEE Shortcode
     * Displays Why Choose section specifically for ISEE courses
     * Usage: [why_choose_isee]
     */
    public function why_choose_isee_shortcode($atts) {
        $output = '<style>';

        // Section H2 Title
        $output .= '.why-choose-isee h2 { font-family: \'Roboto\', sans-serif !important; font-size: 32px !important; font-weight: 700 !important; color: #134958 !important; line-height: 1.3 !important; text-align: center !important; margin-bottom: 20px !important; }';

        // Why Choose Grid Styles
        $output .= '.why-choose-grid { display: grid !important; grid-template-columns: repeat(4, 1fr) !important; gap: 20px !important; margin: 40px 0 !important; }';
        $output .= '.section .why-choose-grid .benefit-card, .why-choose-grid .benefit-card { background: #EFF8FB !important; padding: 20px !important; border-radius: 12px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #28AFCF !important; border-left: 3px solid #28AFCF !important; text-align: left !important; transition: all 0.3s ease !important; min-height: 140px !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(1) { border-left-color: #28AFCF !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(2) { border-left-color: #FF7F07 !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(3) { border-left-color: #F0B268 !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(4) { border-left-color: #28A745 !important; }';
        $output .= '.why-choose-grid .benefit-card:hover { transform: translateY(-3px) !important; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12) !important; }';
        $output .= '.why-choose-grid .benefit-card .benefit-icon, .benefit-card .benefit-icon { width: 28px !important; height: 28px !important; border-radius: 6px !important; display: flex !important; align-items: center !important; justify-content: center !important; margin-right: 10px !important; float: left !important; flex-shrink: 0 !important; }';
        $output .= '.why-choose-grid .benefit-card .benefit-icon svg { width: 16px !important; height: 16px !important; flex-shrink: 0 !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(1) .benefit-icon { background: linear-gradient(135deg, #28AFCF, #1a9cb8) !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(2) .benefit-icon { background: linear-gradient(135deg, #FF7F07, #e66f00) !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(3) .benefit-icon { background: linear-gradient(135deg, #F0B268, #d99d52) !important; }';
        $output .= '.why-choose-grid .benefit-card:nth-child(4) .benefit-icon { background: linear-gradient(135deg, #28A745, #1e7e34) !important; }';
        $output .= '.why-choose-grid .benefit-card h3, .benefit-card h3 { font-family: \'Roboto\', sans-serif !important; font-size: 18px !important; font-weight: 600 !important; line-height: 1.3 !important; color: #134958 !important; margin: 0 0 8px 0 !important; margin-left: 40px !important; margin-top: 0 !important; text-align: left !important; }';
        $output .= '.why-choose-grid .benefit-card p, .benefit-card p { font-family: \'Roboto\', sans-serif !important; font-size: 15px !important; line-height: 1.6 !important; color: #333 !important; margin: 0 !important; font-weight: 400 !important; clear: both !important; text-align: left !important; }';

        // Responsive Styles
        $output .= '@media (max-width: 992px) { ';
        $output .= '.why-choose-grid { grid-template-columns: repeat(2, 1fr) !important; } ';
        $output .= '}';
        $output .= '@media (max-width: 768px) { ';
        $output .= '.why-choose-grid { grid-template-columns: 1fr !important; } ';
        $output .= '.why-choose-isee h2 { font-size: 28px !important; } ';
        $output .= '.why-choose-isee .benefit-card { padding: 15px !important; } ';
        $output .= '.why-choose-isee .benefit-card h3 { font-size: 17px !important; } ';
        $output .= '.why-choose-isee .benefit-card p { font-size: 14px !important; } ';
        $output .= '.why-choose-isee > div { padding: 10px 15px 20px 15px !important; } ';
        $output .= '}';
        $output .= '@media (max-width: 480px) { ';
        $output .= '.why-choose-isee h2 { font-size: 24px !important; } ';
        $output .= '.why-choose-isee .benefit-card { padding: 12px !important; } ';
        $output .= '.why-choose-isee .benefit-card h3 { font-size: 16px !important; margin-left: 38px !important; } ';
        $output .= '.why-choose-isee .benefit-card p { font-size: 14px !important; } ';
        $output .= '.why-choose-isee > div { padding: 10px 12px 15px 12px !important; } ';
        $output .= '}';

        $output .= '</style>';

        // HTML Content with Container
        $output .= '<section class="why-choose-isee" style="padding: 0 !important; margin: 0 !important; background: #CDE9F6 !important;">';
        $output .= '<div style="max-width: 1200px !important; margin: 0 auto !important; padding: 10px 20px 24px 20px !important;">';
        $output .= '<h2>Why Choose NYC STEM Club for ISEE Prep?</h2>';
        $output .= '<div class="why-choose-grid">';

        // Card 1: Expert Instructors
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Expert Instructors</h3>';
        $output .= '<p>Experienced with all ISEE levels, providing personalized guidance tailored to your child\'s learning style.</p>';
        $output .= '</div>';
        $output .= '</div>';

        // Card 2: Proven Results
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Proven Results</h3>';
        $output .= '<p>Over 85% of our students score stanine 7-9, gaining admission to top independent schools.</p>';
        $output .= '</div>';
        $output .= '</div>';

        // Card 3: Comprehensive Materials
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Flexible Programs</h3>';
        $output .= '<p>Year-round classes, summer bootcamps, and 1-on-1 tutoring. Online and in-person options.</p>';
        $output .= '</div>';
        $output .= '</div>';

        // Card 4: Digital ISEE Ready
        $output .= '<div class="benefit-card">';
        $output .= '<div style="text-align: left;">';
        $output .= '<div class="benefit-icon">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">';
        $output .= '<path d="M17 1.01L7 1C5.9 1 5 1.9 5 3V21C5 22.1 5.9 23 7 23H17C18.1 23 19 22.1 19 21V3C19 1.9 18.1 1.01 17 1.01M17 19H7V5H17V19M16 13H13V16H11V13H8V11H11V8H13V11H16V13Z"/>';
        $output .= '</svg>';
        $output .= '</div>';
        $output .= '<h3>Digital ISEE Ready</h3>';
        $output .= '<p>We assist families with all formats: paper-based, Prometric centers, and online at-home tests.</p>';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '</div>'; // Close why-choose-grid
        $output .= '</div>'; // Close container
        $output .= '</section>'; // Close section

        return $output;
    }

    /**
     * Why Choose Enrichment Shortcode
     * Usage: [why_choose_enrichment]
     */
    public function why_choose_enrichment_shortcode($atts) {
        // Enqueue styles
        wp_enqueue_style(
            'nyc-stem-course-styles',
            NYC_STEM_COURSES_URL . 'assets/css/course-styles.css',
            array(),
            NYC_STEM_COURSES_VERSION
        );

        $output = '<section class="why-choose-sat-act">';
        $output .= '<div class="why-choose-container">';

        // Header
        $output .= '<div class="why-choose-header">';
        $output .= '<h2 style="font-family: \'Roboto\', sans-serif !important; font-size: 32px !important; font-weight: 700 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 15px !important;">Why Choose NYC STEM Club?</h2>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 18px !important; font-weight: 400 !important; color: #555 !important; line-height: 1.6 !important; max-width: 900px !important; margin: 0 auto !important;">Our enrichment programs combine rigorous curriculum, small group instruction, and experienced educators to help every student reach their full potential.</p>';
        $output .= '</div>';

        // Benefits Grid
        $output .= '<div class="why-choose-grid">';

        // Card 1: Small Group Instruction
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #28AFCF !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #28AFCF, #134958) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Small Group Instruction</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">Classes limited to 8 students ensure personalized attention and active participation for every child.</p>';
        $output .= '</div></div>';

        // Card 2: Skill-Based Placement
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #FF7F07 !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #FF7F07, #e66f00) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Skill-Based Placement</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">Diagnostic assessments place students in appropriate groups, ensuring instruction matches their level.</p>';
        $output .= '</div></div>';

        // Card 3: Experienced Educators
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #F0B268 !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #F0B268, #d99d52) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Experienced Educators</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">Our instructors are subject matter experts who understand how to engage and challenge young learners.</p>';
        $output .= '</div></div>';

        // Card 4: Proven Results
        $output .= '<div style="background: #EFF8FB !important; border-radius: 12px !important; padding: 15px !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important; border-top: 4px solid #28A745 !important;">';
        $output .= '<div style="text-align: left !important;">';
        $output .= '<div style="display: inline-block !important; width: 35px !important; height: 35px !important; background: linear-gradient(135deg, #28A745, #1e7e34) !important; border-radius: 8px !important; vertical-align: middle !important; text-align: center !important; line-height: 35px !important; margin-right: 10px !important; float: left !important;">';
        $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20" style="vertical-align: middle;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>';
        $output .= '</div>';
        $output .= '<h3 style="font-family: \'Roboto\', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: #134958 !important; line-height: 1.3 !important; margin-bottom: 8px !important; margin-top: 0 !important; margin-left: 50px !important; text-align: left !important;">Proven Results</h3>';
        $output .= '<p style="font-family: \'Roboto\', sans-serif !important; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; margin: 0 !important; clear: both !important;">Our students consistently excel on competitive exams and gain admission to top schools.</p>';
        $output .= '</div></div>';

        $output .= '</div>'; // Close grid
        $output .= '</div>'; // Close container
        $output .= '</section>';

        return $output;
    }

    /**
     * Testimonials Shortcode
     * Displays the "What our Students and Parents have to say" testimonials section
     * Usage: [testimonials]
     * Place manually in templates with: <?php echo do_shortcode('[testimonials]'); ?>
     */
    public function testimonials_shortcode($atts) {
        // Get the reviews shortcode from options (allows admin to customize)
        $reviews_shortcode = get_option('nyc_stem_reviews_shortcode', '[trustindex data-widget-id=d7ccd5b21eb1294a9186eebe1e6]');

        // Enqueue styles if not already loaded
        wp_enqueue_style(
            'nyc-stem-course-styles',
            NYC_STEM_COURSES_URL . 'assets/css/course-styles.css',
            array(),
            NYC_STEM_COURSES_VERSION
        );

        // All styling in course-styles.css under .course-testimonials
        $output = '<section class="course-testimonials">';
        $output .= '<div class="testimonials-container">';
        $output .= '<h2 class="testimonials-title">What Our Students and Parents Say</h2>';
        $output .= '<div class="testimonials-content">';
        $output .= do_shortcode($reviews_shortcode);
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</section>';

        return $output;
    }
}

// Initialize the plugin
new NYC_STEM_Courses();
