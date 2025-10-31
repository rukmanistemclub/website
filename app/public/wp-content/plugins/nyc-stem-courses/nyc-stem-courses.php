<?php
/**
 * Plugin Name: NYC STEM Club Courses
 * Plugin URI: https://nycstemclub.com
 * Description: Custom course management system for NYC STEM Club - replaces WooCommerce for course display with modern design and inquiry functionality.
 * Version: 2.1.8
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
define('NYC_STEM_COURSES_VERSION', '2.1.8');
define('NYC_STEM_COURSES_PATH', plugin_dir_path(__FILE__));
define('NYC_STEM_COURSES_URL', plugin_dir_url(__FILE__));

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
        add_shortcode('shsat_schools', array($this, 'shsat_schools_shortcode'));

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
        // Get global defaults
        $default_color = get_option('nyc_stem_inquiry_button_color', 'orange');
        $default_rounded = get_option('nyc_stem_inquiry_button_rounded', 'yes');

        // Parse shortcode attributes
        $atts = shortcode_atts(array(
            'source' => '', // Optional: 'homepage', 'sidebar', 'footer', etc.
            'text' => '',   // Optional: Override button text
            'class' => '',  // Optional: Additional CSS classes
            'color' => $default_color, // Use global default, can be overridden
            'url' => '',    // Optional: Override button URL
            'rounded' => $default_rounded, // Use global default, can be overridden
        ), $atts);

        // Get button data
        $button_data = self::get_inquiry_button_data($atts['source']);

        // Use custom text/URL if provided, otherwise use global settings
        $button_text = !empty($atts['text']) ? esc_html($atts['text']) : esc_html($button_data['text']);
        $button_url = !empty($atts['url']) ? esc_url($atts['url']) : esc_url($button_data['url']);

        // Build CSS classes - using Elementor's native button classes
        $css_classes = 'elementor-button elementor-button-link elementor-size-sm nyc-stem-inquiry-btn';
        if (!empty($atts['class'])) {
            $css_classes .= ' ' . esc_attr($atts['class']);
        }

        // Get global styling settings
        $orange_color = get_option('nyc_stem_inquiry_button_orange_color', '#FF7F07');
        $teal_color = get_option('nyc_stem_inquiry_button_teal_color', '#28AFCF');
        $text_color = get_option('nyc_stem_inquiry_button_text_color', '#FFFFFF');
        $font_size = get_option('nyc_stem_inquiry_button_font_size', '24px');
        $font_weight = get_option('nyc_stem_inquiry_button_font_weight', '700');
        $padding = get_option('nyc_stem_inquiry_button_padding', '12px 24px');
        $width = get_option('nyc_stem_inquiry_button_width', '200px');
        $sharp_radius = get_option('nyc_stem_inquiry_button_sharp_radius', '8px');
        $rounded_radius = get_option('nyc_stem_inquiry_button_rounded_radius', '50px');

        // Determine button color
        $bg_color = (strtolower($atts['color']) === 'teal') ? $teal_color : $orange_color;

        // Determine border-radius based on rounded parameter
        $border_radius = (strtolower($atts['rounded']) === 'yes') ? $rounded_radius : $sharp_radius;

        // Inline styles - uses all global settings
        $button_style = sprintf(
            'background-color: %s; color: %s; font-family: Roboto, sans-serif; font-size: %s; font-weight: %s; padding: %s; border: none; text-decoration: none; display: inline-block; text-align: center; line-height: 1.8; transition: all 0.3s; cursor: pointer; -webkit-font-smoothing: antialiased; width: %s; min-width: %s; border-radius: %s; box-sizing: border-box;',
            $bg_color,
            $text_color,
            $font_size,
            $font_weight,
            $padding,
            $width,
            $width,
            $border_radius
        );

        // Return button HTML with EXACT Elementor structure and inline styles
        return sprintf(
            '<a class="%s" href="%s" style="%s">
                <span class="elementor-button-content-wrapper">
                    <span class="elementor-button-text">%s</span>
                </span>
            </a>',
            $css_classes,
            $button_url,
            $button_style,
            $button_text
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

        // Query courses by category
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
        ));

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
                    <?php foreach ($courses as $course_id) : ?>
                        <div class="course-card">
                            <div class="course-card-content">
                                <h2 class="course-card-title">
                                    <a href="<?php echo get_permalink($course_id); ?>">
                                        <?php echo get_the_title($course_id); ?>
                                    </a>
                                </h2>

                                <?php if ($atts['show_excerpt'] === 'yes') :
                                    $excerpt = get_the_excerpt($course_id);
                                    if ($excerpt) :
                                ?>
                                    <div class="course-card-excerpt">
                                        <?php echo wp_trim_words($excerpt, 20); ?>
                                    </div>
                                <?php endif; endif; ?>

                                <?php if ($atts['show_meta'] === 'yes') : ?>
                                    <div class="course-card-meta">
                                        <?php
                                        $duration = get_field('course_duration', $course_id);
                                        $formats = get_field('class_format', $course_id);

                                        if ($duration) {
                                            echo '<span class="course-card-meta-item">⏱️ ' . esc_html($duration) . '</span>';
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
                                                echo '<span class="course-card-meta-item">👥 ' . esc_html(implode(' • ', $format_text)) . '</span>';
                                            }
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <a href="<?php echo get_permalink($course_id); ?>" class="course-card-button">Learn More</a>
                            </div>
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
}

// Initialize the plugin
new NYC_STEM_Courses();
