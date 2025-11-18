<?php
/**
 * Template Name: ELA Enrichment Grades 3-8
 * Description: ELA enrichment program page for elementary and middle school
 */

get_header();
?>

<style>
/* Reset theme styles */
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

.entry-header,
.entry-footer,
.post-navigation,
.page-header {
    display: none !important;
}

/* Typography - Style Guide Compliant */
body {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
}

.ela-enrichment-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 60px 20px;
    text-align: center;
    margin-bottom: 0;
}

.hero-section h1 {
    font-family: 'Roboto', sans-serif;
    font-size: 48px;
    font-weight: 800;
    line-height: 1.2;
    color: white !important;
    margin: 0;
    letter-spacing: -1px;
}

/* Intro Section */
.intro-section {
    text-align: center;
    margin: 40px 0 60px;
    padding: 0 40px;
}

.intro-section p {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.6;
    color: #666;
    margin: 0;
}

/* Program Details Section */
.program-details-section {
    margin-bottom: 50px;
}

.program-details-section .inner {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

.program-details-content {
    background: white;
    border-left: 4px solid #28AFCF;
    padding: 30px 35px;
}

.detail-row {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 25px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    line-height: 1.6;
    color: #134958;
    margin: 0;
}

.detail-content ul {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
    margin: 0;
    padding-left: 0;
    list-style: none;
}

.detail-content li {
    margin-bottom: 8px;
    padding-left: 20px;
    position: relative;
}

.detail-content li:last-child {
    margin-bottom: 0;
}

.detail-content li span.bullet {
    position: absolute;
    left: 0;
    color: #28AFCF;
}

.detail-content li strong {
    color: #134958;
}

.detail-content li em {
    font-style: italic;
}

/* CTA Section */
.cta-section {
    margin-bottom: 70px;
    background: linear-gradient(135deg, #28AFCF 0%, #1a9dbf 100%);
    padding: 50px 40px;
    text-align: center;
}

.cta-section .inner {
    max-width: 800px;
    margin: 0 auto;
}

.cta-section h2 {
    font-family: 'Roboto', sans-serif;
    font-size: 32px;
    font-weight: 700;
    line-height: 1.3;
    color: white;
    margin: 0 0 20px;
}

.cta-section p {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.6;
    color: white;
    margin: 0 0 30px;
}

/* Responsive */
@media (max-width: 968px) {
    .detail-row {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php while (have_posts()) : the_post(); ?>

<!-- SECTION 1: HERO -->
<div class="hero-section">
    <h1>ELA Enrichment: Grades 3-8</h1>
</div>

<article class="ela-enrichment-container">

    <!-- SECTION 2: INTRO -->
    <div class="intro-section">
        <p>
            Our English Language Arts enrichment program builds a strong foundation in reading comprehension, writing, vocabulary, and grammar through engaging content drawn from literature, science, technology, history, and social studies. Students develop essential skills not always covered in standard curriculum but crucial for competitive testing and academic success.
        </p>
    </div>

    <!-- SECTION 3: PROGRAM DETAILS -->
    <div class="program-details-section">
        <div class="inner">

            <div class="program-details-content">

                <!-- Row 1: What Students Learn -->
                <div class="detail-row">
                    <div>
                        <p class="detail-label">What Students Learn</p>
                    </div>
                    <div class="detail-content">
                        <ul>
                            <li><span class="bullet">▸</span>Advanced reading comprehension strategies across multiple subject areas</li>
                            <li><span class="bullet">▸</span>Writing skills development including essay structure, argumentation, and analysis</li>
                            <li><span class="bullet">▸</span>Vocabulary building through context from science, technology, and social studies</li>
                            <li><span class="bullet">▸</span>Grammar fundamentals and advanced language conventions</li>
                            <li><span class="bullet">▸</span>State test preparation and test-taking strategies</li>
                        </ul>
                    </div>
                </div>

                <!-- Row 2: Program Structure -->
                <div class="detail-row">
                    <div>
                        <p class="detail-label">Program Structure</p>
                    </div>
                    <div class="detail-content">
                        <ul>
                            <li><span class="bullet">▸</span><strong>Grade Levels:</strong> Grades 3-8</li>
                            <li><span class="bullet">▸</span><strong>Schedule:</strong> Semester model (Fall and Spring), September through June</li>
                            <li><span class="bullet">▸</span><strong>Format:</strong> 1.5 hour sessions, once per week, small group in-person classes</li>
                            <li><em><span class="bullet">▸</span>Courses offered subject to minimum enrollment</em></li>
                        </ul>
                    </div>
                </div>

                <!-- Row 3: Program Benefits -->
                <div class="detail-row">
                    <div>
                        <p class="detail-label">Program Benefits</p>
                    </div>
                    <div class="detail-content">
                        <ul>
                            <li><span class="bullet">▸</span>Placement testing ensures students are grouped by skill level, so instruction proceeds at an appropriate pace—neither too fast nor too slow</li>
                            <li><span class="bullet">▸</span>Students seeking to strengthen their reading and writing foundation</li>
                            <li><span class="bullet">▸</span>Students preparing for competitive exams requiring strong ELA skills</li>
                            <li><span class="bullet">▸</span>Students aiming to excel on state assessments</li>
                            <li><span class="bullet">▸</span>Students who want to develop critical reading and analytical writing skills beyond the standard curriculum</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- SECTION 4: CTA SECTION -->
    <div class="cta-section">
        <div class="inner">
            <h2>Ready to Strengthen Your Child's ELA Skills?</h2>
            <p>
                Contact us to learn more about available schedules and enrollment for the current academic year.
            </p>
            <?php echo do_shortcode('[inquiry_button]'); ?>
        </div>
    </div>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>
