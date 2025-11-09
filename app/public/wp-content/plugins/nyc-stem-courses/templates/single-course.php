<?php
/**
 * Single Course Template
 *
 * Template for displaying individual course pages
 */

get_header();

while (have_posts()) : the_post();
?>

<article id="course-<?php the_ID(); ?>" <?php post_class('course-single'); ?>>

    <?php
    // Hero Section - Premium split design
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-hero.php';

    // Trust Bar - Optional (displays if trust_bar_items are populated)
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-trust-bar.php';

    // Course Description - Flexible content blocks (Program Timeline, Specialized Schools, etc.)
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-description.php';

    // Why Choose Us - Global section with optional override
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-benefits.php';

    // FAQs - Premium accordion design (displays if course_faqs are populated)
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-faqs.php';

    // CTA Section - Compact call to action
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-cta.php';

    // Related Courses - Shows courses from same category
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-related.php';

    // Testimonials (optional - can be filtered by category)
    include NYC_STEM_COURSES_PATH . 'templates/parts/course-testimonials.php';
    ?>

</article>

<?php
endwhile;

get_footer();
