<?php
/**
 * Diagnostic Script - Show All Fields for ISEE Private Tutoring
 * This will help identify where the redundant text is coming from
 */

require_once(__DIR__ . '/wp-load.php');

echo '<h1>ISEE Private Tutoring - All Fields Diagnostic</h1>';
echo '<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    h2 { color: #134958; margin-top: 30px; }
    .field { background: #f5f5f5; padding: 15px; margin: 10px 0; border-left: 4px solid #134958; }
    .label { font-weight: bold; color: #134958; }
    .content { margin-top: 10px; white-space: pre-wrap; }
    .length { color: #666; font-size: 12px; }
</style>';

// Get the ISEE Private Tutoring post
$post = get_page_by_path('isee-private-tutoring', OBJECT, 'course');

if (!$post) {
    die('Post not found!');
}

echo '<h2>Post ID: ' . $post->ID . '</h2>';

// 1. Post Excerpt
echo '<div class="field">';
echo '<div class="label">post_excerpt <span class="length">(' . strlen($post->post_excerpt) . ' chars)</span></div>';
echo '<div class="content">' . htmlspecialchars($post->post_excerpt) . '</div>';
echo '</div>';

// 2. Post Content
echo '<div class="field">';
echo '<div class="label">post_content <span class="length">(' . strlen($post->post_content) . ' chars)</span></div>';
echo '<div class="content">' . htmlspecialchars($post->post_content) . '</div>';
echo '</div>';

// 3. ACF Fields - Get all field names
if (function_exists('get_field_objects')) {
    echo '<h2>ACF Fields:</h2>';
    $fields = get_field_objects($post->ID);

    if ($fields) {
        foreach ($fields as $field_name => $field) {
            $value = get_field($field_name, $post->ID);
            if (is_string($value)) {
                echo '<div class="field">';
                echo '<div class="label">ACF: ' . $field_name . ' <span class="length">(' . strlen($value) . ' chars)</span></div>';
                echo '<div class="content">' . htmlspecialchars($value) . '</div>';
                echo '</div>';
            }
        }
    } else {
        echo '<p>No ACF fields found or fields are empty</p>';
    }
}

// 4. All Post Meta
echo '<h2>All Post Meta:</h2>';
$all_meta = get_post_meta($post->ID);
foreach ($all_meta as $key => $values) {
    if (is_string($values[0]) && strlen($values[0]) > 50) {
        echo '<div class="field">';
        echo '<div class="label">Meta: ' . $key . ' <span class="length">(' . strlen($values[0]) . ' chars)</span></div>';
        echo '<div class="content">' . htmlspecialchars($values[0]) . '</div>';
        echo '</div>';
    }
}

echo '<hr>';
echo '<p><strong>Instructions:</strong> Look for any field containing the redundant text:</p>';
echo '<ul>';
echo '<li>"Our students have received offers in one of their top 3 schools."</li>';
echo '<li>"Our students have been accepted in Trinity, Dalton, Horace Mann..."</li>';
echo '</ul>';
echo '<p><a href="/">← Return to Homepage</a></p>';
