<?php
/**
 * Create Digital SAT Page with Custom Template
 * Run this file once to create the page
 */

// Load WordPress
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php');

// Security check
if (!current_user_can('manage_options')) {
    wp_die('ERROR: You must be logged in as an administrator to run this script.');
}

// Check if page already exists
$existing_page = get_page_by_path('changes-to-the-new-digital-sat', OBJECT, 'page');

if ($existing_page) {
    // Update existing page
    $page_data = array(
        'ID'           => $existing_page->ID,
        'post_title'   => 'Changes to the New Digital SAT',
        'post_name'    => 'changes-to-the-new-digital-sat',
        'post_content' => '', // Template handles all content
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_author'  => 1,
    );

    $page_id = wp_update_post($page_data);
    $action = 'updated';
} else {
    // Create new page
    $page_data = array(
        'post_title'   => 'Changes to the New Digital SAT',
        'post_name'    => 'changes-to-the-new-digital-sat',
        'post_content' => '', // Template handles all content
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_author'  => 1,
    );

    $page_id = wp_insert_post($page_data);
    $action = 'created';
}

if (is_wp_error($page_id)) {
    echo '<div style="font-family: sans-serif; max-width: 800px; margin: 50px auto; padding: 30px; background: #fff7ed; border-left: 5px solid #FF7F07; border-radius: 8px;">';
    echo '<h1 style="color: #D4492A; margin-top: 0;">❌ Error</h1>';
    echo '<p style="font-size: 18px;">' . $page_id->get_error_message() . '</p>';
    echo '</div>';
    exit;
}

// Assign the custom template
update_post_meta($page_id, '_wp_page_template', 'template-digital-sat.php');

// Set SEO if Yoast is available
if (function_exists('wpseo_init')) {
    update_post_meta($page_id, '_yoast_wpseo_title', 'Changes to the New Digital SAT | NYC STEM Club');
    update_post_meta($page_id, '_yoast_wpseo_metadesc', 'Everything you need to know about the Digital SAT changes. Learn about the new format, benefits, downsides, and how it impacts test takers.');
    update_post_meta($page_id, '_yoast_wpseo_focuskw', 'Digital SAT');
}

// Success message
$page_url = get_permalink($page_id);
$edit_url = admin_url('post.php?post=' . $page_id . '&action=edit');

echo '<div style="font-family: sans-serif; max-width: 800px; margin: 50px auto; padding: 30px; background: #f0f9ff; border-left: 5px solid #28AFCF; border-radius: 8px;">';
echo '<h1 style="color: #134958; margin-top: 0;">✅ Success!</h1>';
echo '<p style="font-size: 18px; line-height: 1.6;">Digital SAT page <strong>' . $action . '</strong> successfully with custom template!</p>';
echo '<p><strong>Page ID:</strong> ' . $page_id . '</p>';
echo '<p><strong>Template:</strong> template-digital-sat.php (Custom Full Width)</p>';
echo '<div style="margin: 30px 0; padding: 20px; background: white; border-radius: 8px;">';
echo '<p style="margin: 0 0 15px 0;"><strong>View Your Page:</strong></p>';
echo '<a href="' . $page_url . '" style="display: inline-block; background: #28AFCF; color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: 600;">' . $page_url . '</a>';
echo '</div>';
echo '<p style="margin-top: 20px;"><strong>Edit Page:</strong> <a href="' . $edit_url . '" style="color: #FF7F07;">' . $edit_url . '</a></p>';
echo '<p style="margin-top: 30px; padding: 15px; background: #fff7ed; border-radius: 6px; font-size: 14px;">💡 <strong>Note:</strong> The page uses a custom template that bypasses your theme styling to display the exact HTML formatting from your DigitalSAThtml.txt file.</p>';
echo '</div>';
