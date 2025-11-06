<?php
/**
 * Template Name: Admissions Counseling - Full Width
 * Description: Custom template for Admissions Counseling page with course listings
 */

get_header();

// Enqueue the global course styles
wp_enqueue_style('course-styles',
    get_site_url() . '/wp-content/plugins/nyc-stem-courses/assets/css/course-styles.css',
    array(),
    filemtime(WP_CONTENT_DIR . '/plugins/nyc-stem-courses/assets/css/course-styles.css')
);
?>

<style>
    /* Reset WordPress theme styles for this custom page */
    #primary.content-area,
    .site-main,
    .entry-content,
    article {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        background: white !important;
    }

    /* Hide default WordPress elements */
    .entry-header,
    .entry-footer,
    .post-navigation,
    .page-header {
        display: none !important;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 18px;
        font-weight: 400;
        line-height: 1.8;
        color: #2d3748;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 100px 20px;
        text-align: center;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .hero-content h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero-content .subtitle {
        font-size: 1.3rem;
        margin-bottom: 30px;
        opacity: 0.95;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-description {
        font-size: 1.1rem;
        max-width: 900px;
        margin: 0 auto 40px;
        line-height: 1.8;
        opacity: 0.9;
    }

    /* Content Section */
    .content-section {
        max-width: 1200px;
        margin: 80px auto;
        padding: 0 20px;
    }

    .content-section h2 {
        font-size: 2.2rem;
        color: #134958;
        margin-bottom: 30px;
        text-align: center;
    }

    .intro-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
        margin-bottom: 50px;
        text-align: center;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Courses Section */
    .courses-section {
        background: #f8f9fa;
        padding: 80px 20px;
    }

    .courses-section h2 {
        font-size: 2.5rem;
        color: #134958;
        margin-bottom: 20px;
        text-align: center;
    }

    .courses-section .section-subtitle {
        font-size: 1.2rem;
        color: #666;
        text-align: center;
        margin-bottom: 50px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Use global course card styles from course-styles.css */
    .courses-grid-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 80px 20px;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: white;
    }

    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-btn {
        background: #FF7F07;
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
    }

    .cta-btn:hover {
        background: #e66f00;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(255, 127, 7, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2rem;
        }

        .hero-content .subtitle {
            font-size: 1.1rem;
        }

        .courses-grid {
            grid-template-columns: 1fr;
        }

        .courses-section h2 {
            font-size: 2rem;
        }

        .course-card-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="admissions-counseling-page">

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Admissions Counseling</h1>
                <p class="subtitle">Personalized Guidance for Private School and College Success</p>
                <p class="hero-description">
                    Navigate the complex admissions landscape with confidence. Our experienced counselors provide
                    comprehensive support from school selection and application strategy to essay development and
                    submission, helping you present your strongest profile to admissions committees.
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <h2>Expert Guidance Every Step of the Way</h2>
        <p class="intro-text">
            Whether you're applying to competitive private schools or navigating the college admissions process,
            our experienced counselors are dedicated to helping you achieve your goals. We provide personalized
            strategies tailored to your unique strengths, interests, and aspirations, ensuring you stand out
            in a competitive admissions landscape.
        </p>
    </section>

    <!-- Courses Section -->
    <section class="courses-section">
        <h2>Our Admissions Counseling Services</h2>
        <p class="section-subtitle">
            Choose the counseling program that fits your admissions journey
        </p>

        <div class="courses-grid-container">
            <div class="courses-grid">

                <?php
                // Query for counseling courses
                $counseling_courses = new WP_Query(array(
                    'post_type' => 'course',
                    'posts_per_page' => 2,
                    'post_name__in' => array('private-school-admissions-counseling', 'college-counseling'),
                    'orderby' => 'post_name__in'
                ));

                if ($counseling_courses->have_posts()) :
                    while ($counseling_courses->have_posts()) : $counseling_courses->the_post();
                ?>

                        <div class="course-card">

                            <!-- Course Image (hidden by global CSS) -->
                            <div class="course-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php endif; ?>
                            </div>

                            <!-- Course Content -->
                            <div class="course-card-content">

                                <h2 class="course-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <?php
                                $excerpt = get_the_excerpt();
                                if (!$excerpt && function_exists('get_field')) {
                                    $excerpt = get_field('hero_description');
                                }
                                if ($excerpt) : ?>
                                    <div class="course-card-excerpt">
                                        <?php echo wp_trim_words($excerpt, 25); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Meta Information -->
                                <div class="course-card-meta">
                                    <?php
                                    $duration = get_field('course_duration');
                                    $format = get_field('course_format');

                                    if ($duration) {
                                        echo '<span class="course-card-meta-item">⏱️ ' . esc_html($duration) . '</span>';
                                    }

                                    if ($format) {
                                        echo '<span class="course-card-meta-item">👥 ' . esc_html($format) . '</span>';
                                    }
                                    ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="course-card-button">Learn More</a>

                            </div>

                        </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <div style="text-align: center; padding: 60px 20px; grid-column: 1/-1;">
                        <h3>Counseling Courses Coming Soon</h3>
                        <p>Our counseling programs are being updated. Please check back soon!</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Start Your Admissions Journey?</h2>
        <p>Schedule a consultation to discuss your goals and learn how our counseling services can help you succeed.</p>
        <a href="/student-enrollment/" class="cta-btn">Schedule a Consultation</a>
    </section>

</div>

<?php get_footer(); ?>
