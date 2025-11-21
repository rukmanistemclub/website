<?php
/**
 * Update ISEE Course Descriptions - All 4 Courses
 * Run once then delete this file
 */

require_once(__DIR__ . '/wp-load.php');

echo '<h1>Updating ISEE Course Descriptions</h1>';
echo '<style>body { font-family: Arial, sans-serif; padding: 20px; } h2 { color: #134958; } .success { color: green; } .error { color: red; } .info { color: #666; font-size: 14px; }</style>';

// Helper function to update all possible fields
function update_course_description($post_id, $new_text, $course_name) {
    echo "<h2>{$course_name} (Post ID: {$post_id})</h2>";

    // Update post excerpt
    $result = wp_update_post(array(
        'ID' => $post_id,
        'post_excerpt' => $new_text
    ));

    if ($result) {
        echo '<p class="success">✓ Updated post_excerpt</p>';
    } else {
        echo '<p class="error">✗ Failed to update post_excerpt</p>';
    }

    // Update ACF course_description field if it exists
    if (function_exists('get_field')) {
        $current_desc = get_field('course_description', $post_id);
        echo '<p class="info">Current ACF course_description: ' . substr($current_desc, 0, 100) . '...</p>';

        update_field('course_description', $new_text, $post_id);
        echo '<p class="success">✓ Updated ACF course_description</p>';
    }

    // Also try updating post_content as backup
    $post = get_post($post_id);
    if ($post && !empty($post->post_content)) {
        echo '<p class="info">Post has content in post_content field</p>';
    }

    echo '<hr>';
}

// 1. ISEE Private Tutoring
$private_post = get_page_by_path('isee-private-tutoring', OBJECT, 'course');
if ($private_post) {
    $new_text = "Personalized one-on-one ISEE preparation designed to maximize your child's score and confidence. Our expert tutors provide customized instruction tailored to each student's learning style, goals, and target schools, and our students consistently receive multiple offers—most from schools within their top three choices. Over the years, they have been accepted to Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Ann's, and numerous prestigious boarding schools.";
    update_course_description($private_post->ID, $new_text, 'ISEE Private Tutoring');
} else {
    echo '<p class="error">✗ ISEE Private Tutoring post not found</p>';
}

// 2. Lower ISEE
$lower_post = get_page_by_path('lower-isee-preparation', OBJECT, 'course');
if ($lower_post) {
    $new_text = "Comprehensive ISEE preparation for students in grades 4–5 applying to competitive middle schools. Our program develops foundational reading, math, and reasoning skills through personalized instruction and proven strategies, and our students consistently receive multiple offers—most from schools within their top three choices. Over the years, they have been accepted to Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Ann's, and numerous prestigious private schools.";
    update_course_description($lower_post->ID, $new_text, 'Lower ISEE');
} else {
    echo '<p class="error">✗ Lower ISEE post not found</p>';
}

// 3. Middle ISEE
$middle_post = get_page_by_path('middle-isee-preparation', OBJECT, 'course');
if ($middle_post) {
    $new_text = "Comprehensive test preparation for students in grades 6 and 7 applying to competitive independent schools for grades 7–8. Our program strengthens verbal reasoning, quantitative skills, reading comprehension, and advanced mathematics through targeted instruction and proven strategies, and our students consistently receive multiple offers—most from schools within their top three choices.";
    update_course_description($middle_post->ID, $new_text, 'Middle ISEE');
} else {
    echo '<p class="error">✗ Middle ISEE post not found</p>';
}

// 4. Upper ISEE
$upper_post = get_page_by_path('upper-isee-preparation', OBJECT, 'course');
if ($upper_post) {
    $new_text = "Comprehensive test preparation for students applying to competitive independent high schools for grades 9–12. Our program builds mastery in advanced verbal reasoning, quantitative skills, reading comprehension, and mathematics through targeted instruction and proven strategies, and our students consistently receive multiple offers—most from schools within their top three choices. Over the years, they have been accepted to Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Ann's, and numerous prestigious boarding schools.";
    update_course_description($upper_post->ID, $new_text, 'Upper ISEE');
} else {
    echo '<p class="error">✗ Upper ISEE post not found</p>';
}

echo '<h2 class="success">✅ All Done!</h2>';
echo '<p><strong>Important:</strong> Clear your browser cache and do a hard refresh (Ctrl+Shift+R) to see the changes.</p>';
echo '<p><strong>Next step:</strong> Delete this file: <code>app/public/update-isee-descriptions.php</code></p>';
echo '<p><a href="/">← Return to Homepage</a></p>';
