<?php
/**
 * Template Name: NYC STEM Club Homepage
 * Description: Custom full-width homepage template matching production
 */

get_header(); ?>

<style>
/* Reset theme styles for this page */
.site-content {
    padding: 0 !important;
    margin: 0 auto !important;
    width: 100% !important;
    max-width: 100% !important;
}
.content-area {
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}
article {
    padding: 0 !important;
    margin: 0 auto !important;
    width: 100% !important;
}
.entry-content {
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}
.entry-header {
    display: none !important;
}
#primary {
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}
#content {
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}
.container, .site-main {
    max-width: 100% !important;
    width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}

/* Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Georgia, 'Times New Roman', serif !important;
    font-size: 18px;
    line-height: 1.8;
    color: #2d3748;
}

/* Hero Section */
.homepage-hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    min-height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 80px 20px;
    position: relative;
    overflow: hidden;
    background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
}

.homepage-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(19, 73, 88, 0.9) 0%, rgba(40, 175, 207, 0.85) 100%);
}

.hero-content {
    max-width: 1200px;
    width: 100%;
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

.hero-title {
    font-size: 56px;
    font-weight: 800;
    margin-bottom: 30px;
    line-height: 1.2;
    color: white;
}

.hero-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 40px;
}

.hero-btn-primary {
    background: #FF7F07;
    color: white;
    padding: 18px 45px;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.hero-btn-primary:hover {
    background: #e66f00;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(255, 127, 7, 0.4);
}

.hero-btn-secondary {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    padding: 18px 45px;
    border: 3px solid white;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    backdrop-filter: blur(10px);
}

.hero-btn-secondary:hover {
    background: white;
    color: #134958;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
}

/* Results Section */
.results-section {
    background: #EFF8FB;
    padding: 80px 20px;
}

.section-container {
    max-width: 1200px;
    margin: 0 auto;
}

.section-title {
    font-size: 32px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 20px;
    color: #134958;
    line-height: 1.3;
}

.section-subtitle {
    font-size: 18px;
    text-align: center;
    margin-bottom: 60px;
    color: #666;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.stat-card {
    background: white;
    padding: 40px 30px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 40px rgba(40, 175, 207, 0.2);
}

.stat-number {
    font-size: 48px;
    font-weight: 800;
    color: #28AFCF;
    margin-bottom: 15px;
}

.stat-description {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
}

/* Testimonials Section */
.testimonials-section {
    background: white;
    padding: 80px 20px;
}

.testimonials-content {
    text-align: center;
}

.testimonials-embed {
    margin: 50px 0;
    min-height: 400px;
}

.view-all-btn {
    display: inline-block;
    background: #134958;
    color: white;
    padding: 16px 40px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    text-decoration: none;
    text-transform: uppercase;
    transition: all 0.3s ease;
    margin-top: 30px;
}

.view-all-btn:hover {
    background: #28AFCF;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(19, 73, 88, 0.3);
}

/* Programs Section */
.programs-section {
    background: #EFF8FB;
    padding: 80px 20px;
}

.programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    margin-top: 50px;
}

.program-card {
    background: white;
    padding: 50px 40px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 40px rgba(40, 175, 207, 0.15);
}

.program-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 25px;
}

.program-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.program-title {
    font-size: 24px;
    font-weight: 700;
    color: #134958;
    margin-bottom: 15px;
}

.program-description {
    font-size: 16px;
    line-height: 1.7;
    color: #666;
    margin-bottom: 25px;
}

.program-link {
    display: inline-block;
    color: #28AFCF;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.program-link:hover {
    color: #134958;
}

/* Courses Section */
.courses-section {
    background: #CDE9F6;
    padding: 80px 20px;
}

.courses-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.course-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 40px rgba(40, 175, 207, 0.2);
}

.course-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.course-content {
    padding: 30px;
}

.course-title {
    font-size: 20px;
    font-weight: 700;
    color: #134958;
    margin-bottom: 15px;
}

.course-price {
    font-size: 24px;
    font-weight: 800;
    color: #28AFCF;
    margin-bottom: 20px;
}

.course-btn {
    display: block;
    text-align: center;
    background: #28AFCF;
    color: white;
    padding: 12px 24px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.course-btn:hover {
    background: #134958;
}

/* Team Section */
.team-section {
    background: #EFF8FB;
    padding: 80px 20px;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    margin-top: 50px;
}

.team-member {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    text-align: center;
}

.team-member:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 40px rgba(40, 175, 207, 0.15);
}

.team-photo {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.team-info {
    padding: 30px;
}

.team-name {
    font-size: 24px;
    font-weight: 700;
    color: #134958;
    margin-bottom: 10px;
}

.team-bio {
    font-size: 15px;
    line-height: 1.7;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 36px;
    }

    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }

    .hero-btn-primary,
    .hero-btn-secondary {
        width: 100%;
        max-width: 300px;
    }

    .section-title {
        font-size: 32px;
    }

    .stats-grid,
    .programs-grid,
    .courses-grid,
    .team-grid {
        grid-template-columns: 1fr;
    }

    .homepage-hero {
        min-height: 500px;
        padding: 60px 20px;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 28px;
    }

    .section-title {
        font-size: 32px;
    }
}
</style>

<div class="entry-content">
    <!-- Hero Section -->
    <section class="homepage-hero">
        <div class="hero-content">
            <h1 class="hero-title">Achieve Your Academic<br>Potential and Excel</h1>
            <div class="hero-buttons">
                <a href="/student-enrollment/" class="hero-btn-primary">Inquire Now</a>
                <a href="/courses/" class="hero-btn-secondary">View Courses</a>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="results-section">
        <div class="section-container">
            <h2 class="section-title">Our Results</h2>
            <p class="section-subtitle">Our success statistics go beyond mere numbers and embody the unwavering commitment, hard work and diligence of our students, their families, and our educators</p>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">100%</div>
                    <div class="stat-description">Received offers from top US private schools – Trinity, Collegiate, Brearley, Dalton, Riverdale, Horace Mann etc.</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Over 85%</div>
                    <div class="stat-description">Scored a Stanine of 7-9 on the ISEE</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Over 95%</div>
                    <div class="stat-description">Received offers to Specialized High schools (And over 55% achieved Stuy Score)</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Over 80%</div>
                    <div class="stat-description">Received a score of 34 and above on ACT, 1500+ on SAT</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="section-container">
            <h2 class="section-title">What our Students and Parents have to say</h2>
            <div class="testimonials-embed">
                <?php echo do_shortcode('[trustindex data-widget-id="d7ccd5b21eb1294a9186eebe1e6"]'); ?>
            </div>
            <a href="/testimonials/" class="view-all-btn">VIEW ALL Testimonials</a>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="programs-section" id="programs">
        <div class="section-container">
            <h2 class="section-title">Our Programs</h2>

            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-icon">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/07/success.png" alt="Academic Enrichment">
                    </div>
                    <h3 class="program-title">Academic Enrichment</h3>
                    <p class="program-description">Our academic enrichment programs are designed to go beyond the standard curriculum and ignite a love for academic learning.</p>
                    <a href="/academic-enrichment/" class="program-link">Learn more →</a>
                </div>

                <div class="program-card">
                    <div class="program-icon">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/07/exam.png" alt="Test Prep">
                    </div>
                    <h3 class="program-title">Competitive Test Prep</h3>
                    <p class="program-description">Our comprehensive test prep services are tailored to equip you with the skills and strategies needed to excel in any of the Test Prep.</p>
                    <a href="/test-prep/" class="program-link">Learn more →</a>
                </div>

                <div class="program-card">
                    <div class="program-icon">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/07/counseling.png" alt="Admissions Counseling">
                    </div>
                    <h3 class="program-title">Admissions Counseling</h3>
                    <p class="program-description">Our counseling services provide personalized support to help you navigate school and college application processes with confidence.</p>
                    <a href="/admissions-counseling/" class="program-link">Learn more →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Courses Section -->
    <section class="courses-section">
        <div class="section-container">
            <h2 class="section-title">Featured Courses</h2>

            <div class="courses-grid">
                <?php
                // Get featured courses (adjust category or tag as needed)
                $courses = get_posts([
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'tax_query' => [
                        [
                            'taxonomy' => 'product_visibility',
                            'field' => 'name',
                            'terms' => 'featured',
                        ]
                    ]
                ]);

                if ($courses) :
                    foreach ($courses as $course) :
                        $product = wc_get_product($course->ID);
                        $image = get_the_post_thumbnail_url($course->ID, 'medium');
                        ?>
                        <div class="course-card">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($course->post_title); ?>" class="course-image">
                            <?php endif; ?>
                            <div class="course-content">
                                <h3 class="course-title"><?php echo esc_html($course->post_title); ?></h3>
                                <div class="course-price"><?php echo $product->get_price_html(); ?></div>
                                <a href="<?php echo get_permalink($course->ID); ?>" class="course-btn">View Details</a>
                            </div>
                        </div>
                    <?php
                    endforeach;
                else :
                    // Fallback if no courses found
                    echo '<p style="text-align: center; grid-column: 1/-1;">No featured courses available at this time.</p>';
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="/courses/" class="view-all-btn">VIEW ALL COURSES</a>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="section-container">
            <h2 class="section-title">Meet the Team</h2>

            <div class="team-grid">
                <div class="team-member">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2024/02/Connor-284x300-2-150x150.webp" alt="Connor Renfroe" class="team-photo">
                    <div class="team-info">
                        <h3 class="team-name">Connor Renfroe</h3>
                        <p class="team-bio">Connor earned his B.A. in English Literature and Language from Winthrop University, followed by an M.S. in Publishing from New York University's School of Professional Studies.</p>
                    </div>
                </div>

                <div class="team-member">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/10/Evan-1.webp" alt="Evan Okin" class="team-photo">
                    <div class="team-info">
                        <h3 class="team-name">Evan Okin</h3>
                        <p class="team-bio">Evan was valedictorian at the High School of American Studies at Lehman College. He graduated from Johns Hopkins University with specialization in applied Mathematics and Statistics.</p>
                    </div>
                </div>

                <div class="team-member">
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2023/09/LaurenHadley-e1738871323463.png" alt="Lauren Hadley" class="team-photo">
                    <div class="team-info">
                        <h3 class="team-name">Lauren Hadley</h3>
                        <p class="team-bio">Lauren earned her B.A. in Environmental Science & Policy and Cultural Anthropology from Duke University. She was part of Duke's prestigious Alice M. Baldwin Scholars women's leadership program.</p>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="/our-tutors/" class="view-all-btn">VIEW ALL Tutors</a>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
