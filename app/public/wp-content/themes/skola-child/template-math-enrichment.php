<?php
/**
 * Template Name: Math Enrichment Grades 3-8
 * Description: Math enrichment program page for elementary and middle school
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

.math-enrichment-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Hero Section - Left Aligned */
.hero-section {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 40px 0;
    text-align: left;
    margin-bottom: 0;
}

.hero-section h1 {
    font-family: 'Roboto', sans-serif;
    font-size: 48px;
    font-weight: 800;
    line-height: 1.2;
    color: white !important;
    margin: 0 auto 16px auto;
    letter-spacing: -1px;
    max-width: 1200px;
    padding-left: 20px;
    padding-right: 20px;
}

/* Intro Section */
.intro-section {
    text-align: center;
    max-width: 1200px;
    margin: 40px auto 60px auto;
    padding: 0 20px;
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
    max-width: 1200px;
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

@media (max-width: 768px) {
    .hero-section {
        padding: 30px 0;
    }

    .hero-section h1 {
        font-size: 32px !important;
        margin-bottom: 12px !important;
    }

    .intro-section {
        margin: 30px 0 40px;
        padding: 0 20px;
    }

    .intro-section p {
        font-size: 16px !important;
    }

    .cta-section {
        padding: 40px 20px;
    }

    .cta-section h2 {
        font-size: 24px !important;
        margin-bottom: 10px !important;
    }

    .cta-section p {
        font-size: 16px !important;
        margin-bottom: 20px !important;
    }
}

@media (max-width: 480px) {
    .hero-section {
        padding: 25px 0;
    }

    .hero-section h1 {
        font-size: 28px !important;
    }

    .cta-section h2 {
        font-size: 22px !important;
    }
}
</style>

<?php while (have_posts()) : the_post(); ?>

<!-- SECTION 1: HERO -->
<div class="hero-section">
    <h1>Math Enrichment: Grades 3-8</h1>
</div>

<article class="math-enrichment-container">

    <!-- SECTION 2: INTRO -->
    <div class="intro-section">
        <p>
            Our mathematics enrichment program builds strong, flexible mathematical thinkers through a research-based progression of multi-step problem solving, visual modeling, and advanced reasoning. Students work on grade-level and above-grade concepts using non-routine challenges and competition-style problems from Math Olympiad and Math Kangaroo. The program deepens conceptual understanding and strengthens foundational skills, helping students confidently progress toward advanced math pathways in a supportive, developmentally appropriate environment.
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
                            <li><span class="bullet">▸</span>Core math concepts aligned to Common Core, taught through deeper, concept-focused instruction</li>
                            <li><span class="bullet">▸</span>Multi-step problem-solving strategies using visual representations and structured reasoning frameworks</li>
                            <li><span class="bullet">▸</span>Advanced non-routine problems inspired by Math Olympiad, Math Kangaroo, and AMC 8</li>
                            <li><span class="bullet">▸</span>Critical thinking, mathematical communication, and logical reasoning skills</li>
                            <li><span class="bullet">▸</span>State test preparation and foundational skills supporting readiness for advanced coursework</li>
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
                            <li><span class="bullet">▸</span>Continuous spiral review reinforces key concepts throughout the year, building lasting mathematical understanding</li>
                            <li><span class="bullet">▸</span>Students become independent learners who tackle problems confidently without constant parental support at home</li>
                            <li><span class="bullet">▸</span>Flexible, responsive instruction—we adjust pacing and depth based on student readiness and mastery, without rushing the curriculum</li>
                            <li><span class="bullet">▸</span>Strong performance on state assessments through deep conceptual understanding, not just test-taking tricks</li>
                            <li><span class="bullet">▸</span>Development of mathematical confidence and positive mindset toward challenging problems</li>
                            <li><span class="bullet">▸</span>Skills that transfer beyond math class—logical reasoning, perseverance, and structured thinking</li>
                            <li><span class="bullet">▸</span>Preparation for competitive math opportunities and NYC specialized school pathways (Hunter, SHSAT, and beyond)</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- SECTION 4: CTA SECTION -->
    <div class="cta-section">
        <div class="inner">
            <h2>Ready to Enrich Your Child's Math Skills?</h2>
            <p>
                Contact us to learn more about available schedules and enrollment for the current academic year.
            </p>
            <?php echo do_shortcode('[inquiry_button]'); ?>
        </div>
    </div>

</article>

<?php endwhile; ?>

<?php
/**
 * Service Schema Markup for SEO
 */
$service_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Math Enrichment Program (Grades 3-8)',
    'description' => 'Advanced math enrichment for grades 3-8 in NYC and online. Problem-solving, critical thinking, Math Olympiad and Math Kangaroo preparation.',
    'provider' => array(
        '@type' => 'EducationalOrganization',
        'name' => 'NYC STEM Club',
        'url' => 'https://nycstemclub.com'
    ),
    'serviceType' => 'Academic Enrichment',
    'areaServed' => array(
        array(
            '@type' => 'City',
            'name' => 'New York City'
        ),
        array(
            '@type' => 'Country',
            'name' => 'United States (Online)'
        )
    ),
    'audience' => array(
        '@type' => 'EducationalAudience',
        'educationalRole' => 'student',
        'audienceType' => 'Grades 3-8'
    )
);
echo '<script type="application/ld+json">' . wp_json_encode($service_schema, JSON_UNESCAPED_SLASHES) . '</script>';

get_footer(); ?>
