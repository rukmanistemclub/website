<?php
/**
 * Cache Clearing Utility
 * Visit this file in browser to clear all WordPress caches
 * URL: https://nycstemclub.local/clear-all-caches.php
 *
 * After visiting, delete this file for security
 */

// Load WordPress
require_once(__DIR__ . '/wp-load.php');

// Check if user is admin
if (!current_user_can('manage_options')) {
    die('Access denied. Must be logged in as administrator.');
}

echo '<h1>NYC STEM Club - Cache Clearing</h1>';
echo '<p>Clearing all caches...</p>';

// Clear WordPress object cache
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
    echo '✓ WordPress object cache cleared<br>';
}

// Clear transients
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_%'");
echo '✓ WordPress transients cleared<br>';

// Clear theme/plugin CSS file cache by touching files
$main_css = __DIR__ . '/wp-content/themes/skola-child/style.css';
$theme_css = __DIR__ . '/wp-content/themes/skola-child/css/course-pages.css';
$plugin_css = __DIR__ . '/wp-content/plugins/nyc-stem-courses/assets/css/course-styles.css';

if (file_exists($main_css)) {
    touch($main_css);
    echo '✓ Main theme CSS cache busted (style.css updated)<br>';
}

if (file_exists($theme_css)) {
    touch($theme_css);
    echo '✓ Theme CSS cache busted (filemtime updated)<br>';
}

if (file_exists($plugin_css)) {
    touch($plugin_css);
    echo '✓ Plugin CSS cache busted<br>';
}

echo '<hr>';
echo '<h2>✅ All caches cleared successfully!</h2>';
echo '<p><strong>Next steps:</strong></p>';
echo '<ol>';
echo '<li>Close this browser tab</li>';
echo '<li>Do a hard refresh on your course page: <kbd>Ctrl + Shift + R</kbd> (Windows) or <kbd>Cmd + Shift + R</kbd> (Mac)</li>';
echo '<li>Delete this file for security: <code>app/public/clear-all-caches.php</code></li>';
echo '</ol>';

echo '<hr>';
echo '<p><a href="/">← Return to Homepage</a></p>';
echo '<p><a href="/courses/shsat-fall-bootcamp-mockup/">→ View Mockup Course Page</a></p>';
