<?php
/**
 * Plugin Name: NYC STEM Club Courses
 * Plugin URI: https://nycstemclub.com
 * Description: Custom course management system for NYC STEM Club - replaces WooCommerce for course display with modern design and inquiry functionality.
 * Version: 1.0.0
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
define('NYC_STEM_COURSES_VERSION', '1.7.2');
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

        // Register widget areas
        add_action('widgets_init', array($this, 'register_widget_areas'));
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
        // Load old fields first (for backward compatibility)
        require_once NYC_STEM_COURSES_PATH . 'includes/acf-fields.php';
        // Then load new organized fields (will merge with old)
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
        register_setting('nyc_stem_settings', 'nyc_stem_reviews_shortcode');
    }

    /**
     * Settings page
     */
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Course Settings</h1>
            <form method="post" action="options.php">
                <?php settings_fields('nyc_stem_settings'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="nyc_stem_reviews_shortcode">Google Reviews Shortcode</label>
                        </th>
                        <td>
                            <input type="text"
                                   id="nyc_stem_reviews_shortcode"
                                   name="nyc_stem_reviews_shortcode"
                                   value="<?php echo esc_attr(get_option('nyc_stem_reviews_shortcode', '')); ?>"
                                   class="regular-text"
                                   placeholder="[google-reviews]">
                            <p class="description">
                                Enter your Google Reviews shortcode here. It will display on the courses archive page.
                                <br>Example: <code>[google-reviews]</code> or <code>[trustindex no-registration=google]</code>
                            </p>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}

// Initialize the plugin
new NYC_STEM_Courses();
