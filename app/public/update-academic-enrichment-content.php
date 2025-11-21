<?php
/**
 * Update Academic Enrichment Page Content
 * Run once then delete this file
 */

require_once(__DIR__ . '/wp-load.php');

echo '<h1>Updating Academic Enrichment Page Content</h1>';
echo '<style>body { font-family: Arial, sans-serif; padding: 20px; } h2 { color: #134958; } .success { color: green; } .error { color: red; }</style>';

// Find the Academic Enrichment page
$page = get_page_by_path('academic-enrichment', OBJECT, 'page');

if (!$page) {
    echo '<p class="error">✗ Academic Enrichment page not found</p>';
    echo '<p>Searching by title instead...</p>';

    $pages = get_posts(array(
        'post_type' => 'page',
        'title' => 'Academic Enrichment',
        'posts_per_page' => 1
    ));

    if ($pages) {
        $page = $pages[0];
    }
}

if ($page) {
    echo '<h2>Academic Enrichment Page (ID: ' . $page->ID . ')</h2>';

    // Content with shortcodes
    $content = 'Our academic enrichment programs are designed to cultivate intellectual curiosity and a lifelong love for learning. Additionally, our rigorous coursework, small group instruction, and continuous teacher feedback all enable our students to not only gain a deeper understanding of their core content, but also develop confidence in their academic pursuits. Our programs empower students to excel academically, perform well on standardized exams, and secure placements in some of the most competitive middle and high schools.

We understand that each student is unique and has different strengths, interests, and learning styles. We have multiple groups per grade, differentiated from one another based on skill level, learning styles, and ability to tackle above-grade level work. This ensures that even within a small group setting, our programs are tailored to meet the specific needs of each individual. By doing so, we optimize and accelerate their academic growth, enabling them to reach their full potential.

Our team of dedicated educators serve as mentors, going beyond teaching to encourage critical thinking, creativity, and independent learning. They empower students to explore new ideas, ask questions, and become confident advocates for themselves. These skills are crucial as students progress into higher education, enabling them to navigate complex challenges and excel in their academic pursuits. We believe in nurturing well-rounded individuals who are equipped with the tools needed to succeed academically as well as in all other aspects of life.

[why_choose_enrichment]

[course_category category="enrichment" title="Our Programs" columns="3" limit="3"]

<!-- CTA Section -->
<section class="cta-section" style="text-align: center; padding: 40px 20px; background: linear-gradient(135deg, #134958 0%, #28AFCF 100%); color: white; border-radius: 12px; margin-top: 30px;">
    <h2 style="font-size: 32px; font-weight: 700; color: white; margin-bottom: 12px;">Ready to Get Started?</h2>
    <p style="font-size: 18px; color: white; margin-bottom: 25px; max-width: 600px; margin-left: auto; margin-right: auto;">Contact us to learn more about our enrichment programs and find the right fit for your child.</p>
    [inquiry_button]
</section>';

    // Update the page
    $result = wp_update_post(array(
        'ID' => $page->ID,
        'post_content' => $content
    ));

    if ($result && !is_wp_error($result)) {
        echo '<p class="success">✓ Page content updated successfully</p>';

        // Also update excerpt for hero subtitle
        $excerpt = 'Building strong foundations and a lifelong love for learning';
        wp_update_post(array(
            'ID' => $page->ID,
            'post_excerpt' => $excerpt
        ));
        echo '<p class="success">✓ Page excerpt (hero subtitle) updated</p>';

        // Update template
        update_post_meta($page->ID, '_wp_page_template', 'template-academic-enrichment.php');
        echo '<p class="success">✓ Page template set to "Landing Page - Full Width"</p>';

        // Set ACF fields for second hero button
        if (function_exists('update_field')) {
            update_field('hero_button_2_text', 'View Our Programs', $page->ID);
            update_field('hero_button_2_link', '#programs', $page->ID);
            echo '<p class="success">✓ Hero button 2 configured: "View Our Programs"</p>';
        } else {
            echo '<p class="error">✗ ACF not available - button 2 not configured</p>';
        }

    } else {
        echo '<p class="error">✗ Failed to update page content</p>';
        if (is_wp_error($result)) {
            echo '<p class="error">Error: ' . $result->get_error_message() . '</p>';
        }
    }
} else {
    echo '<p class="error">✗ Could not find Academic Enrichment page</p>';
}

echo '<hr>';
echo '<h2 class="success">✅ Done!</h2>';
echo '<p><strong>Next steps:</strong></p>';
echo '<ol>';
echo '<li>Visit the Academic Enrichment page to verify it looks correct</li>';
echo '<li>Clear browser cache and do a hard refresh (Ctrl+Shift+R)</li>';
echo '<li>Delete this file: <code>app/public/update-academic-enrichment-content.php</code></li>';
echo '</ol>';
echo '<p><a href="/academic-enrichment/">→ View Academic Enrichment Page</a></p>';
