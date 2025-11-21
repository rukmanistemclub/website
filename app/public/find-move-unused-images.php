<?php
/**
 * Find and Move Unused Images
 *
 * This script identifies images in wp-content/uploads that are not referenced
 * in the database and moves them to wp-content/uploads-unused
 */

require_once('wp-load.php');

// Prevent timeout
set_time_limit(300);

// Output header
header('Content-Type: text/html; charset=utf-8');
echo "<h1>Unused Image Finder</h1>";
echo "<p>Scanning uploads directory...</p>";
flush();

global $wpdb;

// Get all images from uploads directory
$upload_dir = wp_upload_dir();
$base_dir = $upload_dir['basedir'];
$base_url = $upload_dir['baseurl'];

// Create unused directory if it doesn't exist
$unused_dir = WP_CONTENT_DIR . '/uploads-unused';
if (!file_exists($unused_dir)) {
    mkdir($unused_dir, 0755, true);
}

// Function to recursively get all image files
function get_all_images($dir) {
    $images = array();
    $extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg');

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $ext = strtolower($file->getExtension());
            if (in_array($ext, $extensions)) {
                $images[] = $file->getPathname();
            }
        }
    }

    return $images;
}

// Get all images
$all_images = get_all_images($base_dir);
echo "<p>Found " . count($all_images) . " images in uploads directory.</p>";
flush();

// Get all attachment IDs and their files
$attachments = $wpdb->get_results("
    SELECT ID, post_title, guid
    FROM {$wpdb->posts}
    WHERE post_type = 'attachment'
");

// Build list of used image filenames (including thumbnails)
$used_files = array();

foreach ($attachments as $attachment) {
    // Get the main file
    $file = get_attached_file($attachment->ID);
    if ($file) {
        $used_files[] = wp_normalize_path($file);

        // Get all thumbnail sizes
        $metadata = wp_get_attachment_metadata($attachment->ID);
        if ($metadata && isset($metadata['sizes'])) {
            $dir = dirname($file);
            foreach ($metadata['sizes'] as $size => $size_data) {
                $used_files[] = wp_normalize_path($dir . '/' . $size_data['file']);
            }
        }
    }
}

// Also check for images referenced in post content
$content_images = $wpdb->get_col("
    SELECT DISTINCT meta_value
    FROM {$wpdb->postmeta}
    WHERE meta_key = '_wp_attached_file'
");

// Check post content and meta for image references
$post_content_check = $wpdb->get_var("SELECT GROUP_CONCAT(post_content SEPARATOR ' ') FROM {$wpdb->posts}");
$meta_check = $wpdb->get_var("SELECT GROUP_CONCAT(meta_value SEPARATOR ' ') FROM {$wpdb->postmeta}");
$options_check = $wpdb->get_var("SELECT GROUP_CONCAT(option_value SEPARATOR ' ') FROM {$wpdb->options}");

$all_content = $post_content_check . ' ' . $meta_check . ' ' . $options_check;

echo "<p>Analyzing image usage...</p>";
flush();

// Find unused images
$unused_images = array();
$used_count = 0;

foreach ($all_images as $image_path) {
    $normalized_path = wp_normalize_path($image_path);
    $filename = basename($image_path);
    $relative_path = str_replace(wp_normalize_path($base_dir) . '/', '', $normalized_path);

    // Check if it's in the used files list
    $is_used = in_array($normalized_path, $used_files);

    // Also check if filename appears in content
    if (!$is_used && strpos($all_content, $filename) !== false) {
        $is_used = true;
    }

    // Also check if relative path appears in content
    if (!$is_used && strpos($all_content, $relative_path) !== false) {
        $is_used = true;
    }

    if ($is_used) {
        $used_count++;
    } else {
        $unused_images[] = array(
            'path' => $image_path,
            'relative' => $relative_path,
            'size' => filesize($image_path)
        );
    }
}

echo "<h2>Results</h2>";
echo "<p><strong>Used images:</strong> " . $used_count . "</p>";
echo "<p><strong>Unused images:</strong> " . count($unused_images) . "</p>";

if (empty($unused_images)) {
    echo "<p style='color: green;'>No unused images found!</p>";
    exit;
}

// Calculate total size
$total_size = array_sum(array_column($unused_images, 'size'));
echo "<p><strong>Space to reclaim:</strong> " . round($total_size / 1024 / 1024, 2) . " MB</p>";

// Check if we should move files
$do_move = isset($_GET['move']) && $_GET['move'] === 'yes';

if (!$do_move) {
    echo "<h3>Unused Images (Preview)</h3>";
    echo "<p><a href='?move=yes' style='background: #d63638; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;'>Move All Unused Images</a></p>";
    echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
    echo "<tr><th>File</th><th>Size</th></tr>";

    foreach (array_slice($unused_images, 0, 100) as $image) {
        echo "<tr>";
        echo "<td>" . esc_html($image['relative']) . "</td>";
        echo "<td>" . round($image['size'] / 1024, 1) . " KB</td>";
        echo "</tr>";
    }

    if (count($unused_images) > 100) {
        echo "<tr><td colspan='2'>... and " . (count($unused_images) - 100) . " more</td></tr>";
    }

    echo "</table>";
} else {
    // Move the files
    echo "<h3>Moving Unused Images...</h3>";
    $moved = 0;
    $errors = 0;

    foreach ($unused_images as $image) {
        $source = $image['path'];
        $dest_relative = $image['relative'];
        $dest = $unused_dir . '/' . $dest_relative;

        // Create destination directory if needed
        $dest_dir = dirname($dest);
        if (!file_exists($dest_dir)) {
            mkdir($dest_dir, 0755, true);
        }

        // Move the file
        if (rename($source, $dest)) {
            $moved++;
        } else {
            $errors++;
            echo "<p style='color: red;'>Failed to move: " . esc_html($dest_relative) . "</p>";
        }
    }

    echo "<p style='color: green;'><strong>Successfully moved:</strong> $moved images</p>";
    if ($errors > 0) {
        echo "<p style='color: red;'><strong>Errors:</strong> $errors</p>";
    }
    echo "<p>Files moved to: <code>wp-content/uploads-unused/</code></p>";
}
?>
