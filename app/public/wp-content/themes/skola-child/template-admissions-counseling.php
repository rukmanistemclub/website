<?php
/**
 * Template Name: Admissions Counseling - Full Width
 * Description: Custom template for Admissions Counseling page with course listings
 */

get_header();
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
        padding: 60px 0;
        text-align: center;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
    }

    .hero-content {
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }

    .hero-content h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        line-height: 1.2;
        text-align: center;
    }

    .hero-content .subtitle {
        font-size: 1.3rem;
        margin-bottom: 30px;
        opacity: 0.95;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-description {
        font-size: 1.1rem;
        max-width: 1200px;
        margin: 0 auto 40px;
        line-height: 1.8;
        opacity: 0.9;
    }

    /* Content Section */
    .content-section {
        max-width: 1200px;
        margin: 40px auto 0 auto;
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
        margin-bottom: 30px;
        text-align: center;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Courses Section */
    .courses-section {
        background: #f8f9fa;
        padding: 10px 20px 50px 20px;
        margin-top: 0;
    }

    /* Override global course-cards.css for this page specifically */
    .courses-section .related-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 !important;
    }

    .courses-section .related-grid {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 30px !important;
        width: 100% !important;
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
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Override global course card container width to match page width */
    .courses-section .related-container {
        max-width: 1200px !important;
        margin: 0 auto;
        padding: 0 !important; /* Remove padding - parent already has it */
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
        color: white !important;
    }

    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        color: white !important;
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
        .hero {
            padding: 40px 0;
        }

        .hero-content h1 {
            font-size: 2rem;
        }

        .hero-content .subtitle {
            font-size: 1.1rem;
        }

        .hero-description {
            font-size: 1rem;
        }

        .content-section {
            margin: 30px auto 0 auto;
        }

        .content-section h2 {
            font-size: 1.8rem;
        }

        .intro-text {
            font-size: 1rem;
        }

        .courses-section {
            padding: 10px 15px 40px 15px;
        }

        .courses-section h2 {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        /* Force 1 column on mobile */
        .courses-section .related-grid {
            grid-template-columns: 1fr !important;
        }

        .course-card-title {
            font-size: 1.2rem !important;
        }

        .cta-section {
            padding: 60px 20px;
        }

        .cta-section h2 {
            font-size: 2rem;
        }

        .cta-section p {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .hero-content h1 {
            font-size: 1.75rem;
        }

        .hero-content .subtitle {
            font-size: 1rem;
        }

        .content-section h2 {
            font-size: 1.5rem;
        }

        .courses-section h2 {
            font-size: 1.75rem;
        }

        .cta-section h2 {
            font-size: 1.75rem;
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

        <div class="related-container">
            <div class="related-grid">

                <?php
                // Query for counseling courses - matching shortcode structure
                $counseling_courses = get_posts(array(
                    'post_type' => 'course',
                    'posts_per_page' => 2,
                    'post_name__in' => array('private-school-admissions-counseling', 'college-counseling'),
                    'orderby' => 'menu_order title',
                    'order' => 'ASC',
                    'fields' => 'ids',
                ));

                if ($counseling_courses) :
                    $card_colors = array('card-blue', 'card-orange', 'card-tan');
                    $btn_colors = array('btn-blue', 'btn-orange', 'btn-tan');
                    $color_index = 0;

                    foreach ($counseling_courses as $course_id) :
                        $card_class = $card_colors[$color_index % 3];
                        $btn_class = $btn_colors[$color_index % 3];
                        $color_index++;
                ?>

                        <div class="course-card <?php echo $card_class; ?>">
                            <h3 class="course-card-title"><?php echo get_the_title($course_id); ?></h3>

                            <?php
                            $duration = get_field('course_duration', $course_id);
                            $formats = get_field('class_format', $course_id);

                            if ($duration || $formats) : ?>
                                <div class="course-card-meta">
                                    <?php
                                    if ($duration) {
                                        echo '<span class="meta-badge"><span class="meta-icon">⏱️</span> ' . esc_html($duration) . '</span>';
                                    }

                                    if ($formats && is_array($formats)) {
                                        $format_labels = array(
                                            'private' => '1-on-1',
                                            'group' => 'Group',
                                        );
                                        $format_text = array();
                                        foreach ($formats as $format) {
                                            if (isset($format_labels[$format])) {
                                                $format_text[] = $format_labels[$format];
                                            }
                                        }
                                        if (!empty($format_text)) {
                                            echo '<span class="meta-badge"><span class="meta-icon">👥</span> ' . esc_html(implode(' • ', $format_text)) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <?php
                            $excerpt = get_the_excerpt($course_id);
                            if ($excerpt) :
                            ?>
                                <p class="course-card-description">
                                    <?php echo wp_trim_words($excerpt, 20); ?>
                                </p>
                            <?php endif; ?>

                            <a href="<?php echo get_permalink($course_id); ?>" class="course-card-button <?php echo $btn_class; ?>">
                                Learn More →
                            </a>
                        </div>

                <?php endforeach; ?>
                <?php else : ?>
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
        <?php echo do_shortcode('[inquiry_button]'); ?>
    </section>

</div>

<?php get_footer(); ?>
