<?php
/**
 * Enrollment Form Handler
 * Processes form submissions and sends to multiple destinations
 */

if (!defined('ABSPATH')) {
    exit;
}

class NYC_STEM_Enrollment_Handler {

    /**
     * Initialize the handler
     */
    public static function init() {
        add_action('wp_ajax_process_enrollment_form', array(__CLASS__, 'process_form'));
        add_action('wp_ajax_nopriv_process_enrollment_form', array(__CLASS__, 'process_form'));
    }

    /**
     * Process the enrollment form submission
     */
    public static function process_form() {
        // Verify nonce
        if (!wp_verify_nonce($_POST['enrollment_nonce'] ?? '', 'enrollment_form_submit')) {
            wp_send_json_error(array('message' => 'Security check failed. Please refresh and try again.'));
            return;
        }

        // Sanitize and collect form data
        $form_data = self::sanitize_form_data($_POST);

        // Validate required fields
        $validation = self::validate_form_data($form_data);
        if (!$validation['valid']) {
            wp_send_json_error(array('message' => $validation['message']));
            return;
        }

        // Track which destinations succeeded
        $results = array(
            'freshsales' => false,
            'email' => false,
            'database' => false,
        );

        // 1. Send to Freshsales
        $results['freshsales'] = self::send_to_freshsales($form_data);

        // 2. Send email notification (backup)
        $results['email'] = self::send_email_notification($form_data);

        // 3. Save to database (backup)
        $results['database'] = self::save_to_database($form_data);

        // At least one destination must succeed
        if ($results['freshsales'] || $results['email'] || $results['database']) {
            // Log the submission
            self::log_submission($form_data, $results);

            wp_send_json_success(array(
                'message' => 'Thank you! Your inquiry has been submitted successfully. We will contact you soon.',
                'results' => $results
            ));
        } else {
            wp_send_json_error(array(
                'message' => 'We encountered an issue submitting your inquiry. Please call us at +1 347-788-8332 or email info@nycstemclub.com'
            ));
        }
    }

    /**
     * Sanitize form data
     */
    private static function sanitize_form_data($post_data) {
        return array(
            'parent_first_name' => sanitize_text_field($post_data['parent_first_name'] ?? ''),
            'parent_last_name' => sanitize_text_field($post_data['parent_last_name'] ?? ''),
            'parent_email' => sanitize_email($post_data['parent_email'] ?? ''),
            'phone_country' => sanitize_text_field($post_data['phone_country'] ?? '+1'),
            'parent_phone' => sanitize_text_field($post_data['parent_phone'] ?? ''),
            'referral_source' => sanitize_text_field($post_data['referral_source'] ?? ''),
            'city' => sanitize_text_field($post_data['city'] ?? ''),
            'state' => sanitize_text_field($post_data['state'] ?? ''),
            'child_first_name' => sanitize_text_field($post_data['child_first_name'] ?? ''),
            'child_last_name' => sanitize_text_field($post_data['child_last_name'] ?? ''),
            'child_school' => sanitize_text_field($post_data['child_school'] ?? ''),
            'child_grade' => sanitize_text_field($post_data['child_grade'] ?? ''),
            'programs_interested' => sanitize_text_field($post_data['programs_interested'] ?? ''),
            'other_details' => sanitize_textarea_field($post_data['other_details'] ?? ''),
            'unavailable_times' => sanitize_textarea_field($post_data['unavailable_times'] ?? ''),
            'remote_instruction' => sanitize_text_field($post_data['remote_instruction'] ?? ''),
            'submitted_at' => current_time('mysql'),
            'ip_address' => self::get_client_ip(),
            'user_agent' => sanitize_text_field($_SERVER['HTTP_USER_AGENT'] ?? ''),
        );
    }

    /**
     * Validate required fields
     */
    private static function validate_form_data($data) {
        $required_fields = array(
            'parent_first_name' => "Parent's First Name",
            'parent_last_name' => "Parent's Last Name",
            'parent_email' => "Parent's Email",
            'parent_phone' => "Parent's Phone",
            'city' => 'City',
            'state' => 'State',
            'child_first_name' => "Child's First Name",
            'child_last_name' => "Child's Last Name",
            'child_school' => "Child's School",
            'child_grade' => "Child's Grade",
            'programs_interested' => 'Program Interest',
            'remote_instruction' => 'Remote Instruction Preference',
        );

        foreach ($required_fields as $field => $label) {
            if (empty($data[$field])) {
                return array(
                    'valid' => false,
                    'message' => "$label is required."
                );
            }
        }

        // Validate email format
        if (!is_email($data['parent_email'])) {
            return array(
                'valid' => false,
                'message' => 'Please enter a valid email address.'
            );
        }

        return array('valid' => true);
    }

    /**
     * Send data to Freshsales CRM
     */
    private static function send_to_freshsales($data) {
        // Get Freshsales API settings from options
        $api_key = get_option('nyc_stem_freshsales_api_key', '');
        $domain = get_option('nyc_stem_freshsales_domain', '');

        // If no API key configured, skip Freshsales
        if (empty($api_key) || empty($domain)) {
            error_log('NYC STEM Enrollment: Freshsales API not configured');
            return false;
        }

        // Format phone number
        $full_phone = $data['phone_country'] . ' ' . $data['parent_phone'];

        // Build contact data for Freshsales
        $contact_data = array(
            'contact' => array(
                'first_name' => $data['parent_first_name'],
                'last_name' => $data['parent_last_name'],
                'email' => $data['parent_email'],
                'mobile_number' => $full_phone,
                'city' => $data['city'],
                'state' => $data['state'],
                'custom_field' => array(
                    'cf_child_first_name' => $data['child_first_name'],
                    'cf_child_last_name' => $data['child_last_name'],
                    'cf_child_school' => $data['child_school'],
                    'cf_child_grade' => $data['child_grade'],
                    'cf_programs_interested' => $data['programs_interested'],
                    'cf_other_details' => $data['other_details'],
                    'cf_unavailable_times' => $data['unavailable_times'],
                    'cf_remote_instruction' => $data['remote_instruction'],
                    'cf_referral_source' => $data['referral_source'],
                ),
                'lead_source_id' => null, // Set if you have lead source configured
            )
        );

        $response = wp_remote_post(
            "https://{$domain}.freshsales.io/api/contacts",
            array(
                'headers' => array(
                    'Authorization' => 'Token token=' . $api_key,
                    'Content-Type' => 'application/json',
                ),
                'body' => json_encode($contact_data),
                'timeout' => 30,
            )
        );

        if (is_wp_error($response)) {
            error_log('NYC STEM Enrollment: Freshsales API error - ' . $response->get_error_message());
            return false;
        }

        $response_code = wp_remote_retrieve_response_code($response);
        if ($response_code >= 200 && $response_code < 300) {
            return true;
        }

        error_log('NYC STEM Enrollment: Freshsales API returned code ' . $response_code);
        return false;
    }

    /**
     * Send email notification
     */
    private static function send_email_notification($data) {
        $to = get_option('nyc_stem_enrollment_email', get_option('admin_email'));
        $subject = 'New Student Enrollment Inquiry - ' . $data['child_first_name'] . ' ' . $data['child_last_name'];

        $full_phone = $data['phone_country'] . ' ' . $data['parent_phone'];

        $message = "New enrollment inquiry received:\n\n";
        $message .= "=== PARENT INFORMATION ===\n";
        $message .= "Name: {$data['parent_first_name']} {$data['parent_last_name']}\n";
        $message .= "Email: {$data['parent_email']}\n";
        $message .= "Phone: {$full_phone}\n";
        $message .= "City: {$data['city']}\n";
        $message .= "State: {$data['state']}\n";
        $message .= "Referral Source: {$data['referral_source']}\n\n";

        $message .= "=== CHILD INFORMATION ===\n";
        $message .= "Name: {$data['child_first_name']} {$data['child_last_name']}\n";
        $message .= "School: {$data['child_school']}\n";
        $message .= "Grade: {$data['child_grade']}\n\n";

        $message .= "=== PROGRAM INTEREST ===\n";
        $message .= "Program: {$data['programs_interested']}\n";
        if (!empty($data['other_details'])) {
            $message .= "Other Details: {$data['other_details']}\n";
        }
        $message .= "Remote Instruction: {$data['remote_instruction']}\n";
        if (!empty($data['unavailable_times'])) {
            $message .= "Unavailable Times: {$data['unavailable_times']}\n";
        }

        $message .= "\n=== SUBMISSION INFO ===\n";
        $message .= "Submitted: {$data['submitted_at']}\n";
        $message .= "IP Address: {$data['ip_address']}\n";

        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: NYC STEM Club <noreply@nycstemclub.com>',
            'Reply-To: ' . $data['parent_email'],
        );

        return wp_mail($to, $subject, $message, $headers);
    }

    /**
     * Save submission to database
     */
    private static function save_to_database($data) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'enrollment_submissions';

        // Create table if it doesn't exist
        self::maybe_create_table();

        $result = $wpdb->insert(
            $table_name,
            array(
                'parent_first_name' => $data['parent_first_name'],
                'parent_last_name' => $data['parent_last_name'],
                'parent_email' => $data['parent_email'],
                'parent_phone' => $data['phone_country'] . ' ' . $data['parent_phone'],
                'referral_source' => $data['referral_source'],
                'city' => $data['city'],
                'state' => $data['state'],
                'child_first_name' => $data['child_first_name'],
                'child_last_name' => $data['child_last_name'],
                'child_school' => $data['child_school'],
                'child_grade' => $data['child_grade'],
                'programs_interested' => $data['programs_interested'],
                'other_details' => $data['other_details'],
                'unavailable_times' => $data['unavailable_times'],
                'remote_instruction' => $data['remote_instruction'],
                'submitted_at' => $data['submitted_at'],
                'ip_address' => $data['ip_address'],
            ),
            array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
        );

        return $result !== false;
    }

    /**
     * Create submissions table if needed
     */
    private static function maybe_create_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'enrollment_submissions';

        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") !== $table_name) {
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
                id bigint(20) NOT NULL AUTO_INCREMENT,
                parent_first_name varchar(100) NOT NULL,
                parent_last_name varchar(100) NOT NULL,
                parent_email varchar(100) NOT NULL,
                parent_phone varchar(50) NOT NULL,
                referral_source text,
                city varchar(100),
                state varchar(100),
                child_first_name varchar(100) NOT NULL,
                child_last_name varchar(100) NOT NULL,
                child_school varchar(200),
                child_grade varchar(50),
                programs_interested text,
                other_details text,
                unavailable_times text,
                remote_instruction varchar(100),
                submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
                ip_address varchar(45),
                synced_to_crm tinyint(1) DEFAULT 0,
                PRIMARY KEY (id),
                KEY parent_email (parent_email),
                KEY submitted_at (submitted_at)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }

    /**
     * Log submission for debugging
     */
    private static function log_submission($data, $results) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log(sprintf(
                'NYC STEM Enrollment: %s %s (%s) - Freshsales: %s, Email: %s, DB: %s',
                $data['parent_first_name'],
                $data['parent_last_name'],
                $data['parent_email'],
                $results['freshsales'] ? 'OK' : 'FAIL',
                $results['email'] ? 'OK' : 'FAIL',
                $results['database'] ? 'OK' : 'FAIL'
            ));
        }
    }

    /**
     * Get client IP address
     */
    private static function get_client_ip() {
        $ip_keys = array('HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP', 'REMOTE_ADDR');
        foreach ($ip_keys as $key) {
            if (!empty($_SERVER[$key])) {
                $ip = $_SERVER[$key];
                // Handle comma-separated IPs (from proxies)
                if (strpos($ip, ',') !== false) {
                    $ip = trim(explode(',', $ip)[0]);
                }
                if (filter_var($ip, FILTER_VALIDATE_IP)) {
                    return $ip;
                }
            }
        }
        return 'unknown';
    }
}

// Initialize the handler
NYC_STEM_Enrollment_Handler::init();
