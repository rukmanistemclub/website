<?php
/**
 * Template Name: Academic Enrichment Landing
 * Description: Landing page for academic enrichment programs with Math and ELA course cards
 */

get_header();
?>

<style>
/* Reset WordPress theme styles */
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

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
}

/* Hero Section */
.hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%) !important;
    padding: 60px 20px !important;
    text-align: center !important;
    max-width: 100% !important;
}

.hero h1 {
    font-family: 'Roboto', sans-serif !important;
    font-size: 3rem !important;
    font-weight: 800 !important;
    margin-bottom: 20px !important;
    line-height: 1.2 !important;
    color: #FFFFFF !important;
}

.hero .subtitle {
    font-family: 'Roboto', sans-serif !important;
    font-size: 1.3rem !important;
    font-weight: 400 !important;
    margin-bottom: 30px !important;
    opacity: 0.95;
    color: #FFFFFF !important;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

.btn {
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    padding: 12px 24px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    cursor: pointer;
    margin: 5px;
}

.btn-orange {
    background-color: #FF9574;
    color: #FFFFFF;
}

.btn-orange:hover {
    background-color: #e87d5a;
    color: #FFFFFF;
}

.btn-teal {
    background-color: #28AFCF;
    color: #FFFFFF;
}

.btn-teal:hover {
    background-color: #1e8fa8;
    color: #FFFFFF;
}

/* Content Section */
.content-section {
    max-width: 900px;
    margin: 40px auto 0 auto;
    padding: 0 20px 40px;
}

.content-section p {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
    margin-bottom: 24px;
}

.content-section p:last-child {
    margin-bottom: 0;
}

/* Courses Section */
.courses-section {
    background: white;
    padding: 50px 20px;
    margin-top: 0;
}

/* CTA Section */
.cta-section {
    text-align: center !important;
    padding: 60px 20px !important;
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%) !important;
    width: 100vw !important;
    margin-left: calc(-50vw + 50%) !important;
    margin-right: calc(-50vw + 50%) !important;
}

.cta-section h2 {
    font-family: 'Roboto', sans-serif !important;
    font-size: 2rem !important;
    font-weight: 700 !important;
    color: #FFFFFF !important;
    margin-bottom: 15px !important;
}

.cta-section p {
    font-family: 'Roboto', sans-serif !important;
    font-size: 1.1rem !important;
    color: #FFFFFF !important;
    opacity: 0.95;
    margin-bottom: 25px !important;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
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

    .content-section {
        margin: 30px auto 0 auto;
        padding: 0 20px 30px;
    }

    .courses-section {
        padding: 40px 15px;
    }
}

@media (max-width: 480px) {
    .hero-content h1 {
        font-size: 1.75rem;
    }

    .hero-content .subtitle {
        font-size: 1rem;
    }
}
</style>

<div class="academic-enrichment-page">

    <!-- Hero Section -->
    <section class="hero">
        <h1>Academic Enrichment</h1>
        <p class="subtitle">Building strong foundations and a lifelong love for learning</p>
        <a href="/student-enrollment/" class="btn btn-orange">Inquire Now</a>
        <a href="#programs" class="btn btn-teal">View Our Programs</a>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <p>Our academic enrichment programs are designed to cultivate intellectual curiosity and a lifelong love for learning. Additionally, our rigorous coursework, small group instruction, and continuous teacher feedback all enable our students to not only gain a deeper understanding of their core content, but also develop confidence in their academic pursuits. Our programs empower students to excel academically, perform well on standardized exams, and secure placements in some of the most competitive middle and high schools.</p>

        <p>We understand that each student is unique and has different strengths, interests, and learning styles. We have multiple groups per grade, differentiated from one another based on skill level, learning styles, and ability to tackle above-grade level work. This ensures that even within a small group setting, our programs are tailored to meet the specific needs of each individual. By doing so, we optimize and accelerate their academic growth, enabling them to reach their full potential.</p>

        <p>Our team of dedicated educators serve as mentors, going beyond teaching to encourage critical thinking, creativity, and independent learning. They empower students to explore new ideas, ask questions, and become confident advocates for themselves. These skills are crucial as students progress into higher education, enabling them to navigate complex challenges and excel in their academic pursuits. We believe in nurturing well-rounded individuals who are equipped with the tools needed to succeed academically as well as in all other aspects of life.</p>
    </section>

    <!-- Why Choose Section -->
    <?php echo do_shortcode('[why_choose_enrichment]'); ?>

    <!-- Courses Section -->
    <section id="programs" class="courses-section">
        <?php echo do_shortcode('[course_category category="enrichment" title="Our Programs" columns="3" limit="3"]'); ?>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Get Started?</h2>
        <p>Contact us to learn more about our enrichment programs and find the right fit for your child.</p>
        <?php echo do_shortcode('[inquiry_button]'); ?>
    </section>

</div>

<?php get_footer(); ?>
