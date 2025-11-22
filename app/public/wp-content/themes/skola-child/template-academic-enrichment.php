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

/* Hero Section - Left Aligned */
.hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%) !important;
    padding: 40px 0 !important;
    text-align: left !important;
    max-width: 100% !important;
}

.hero h1,
.hero .subtitle,
.hero .cta-group {
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
}

.hero h1 {
    font-family: 'Roboto', sans-serif !important;
    font-size: 48px !important;
    font-weight: 800 !important;
    margin-bottom: 16px !important;
    line-height: 1.2 !important;
    letter-spacing: -1px;
    color: #FFFFFF !important;
}

.hero .subtitle {
    font-family: 'Roboto', sans-serif !important;
    font-size: 18px !important;
    font-weight: 400 !important;
    line-height: 1.6 !important;
    margin-bottom: 25px !important;
    opacity: 0.95;
    color: #FFFFFF !important;
}

.hero .cta-group {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 0;
}

/* Content Section */
.content-section {
    max-width: 1200px;
    margin: 30px auto 0 auto;
    padding: 0 20px 30px;
}

.content-section p {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
    margin-bottom: 20px;
}

.content-section p:last-child {
    margin-bottom: 0;
}

/* Courses Section */
.courses-section {
    background: white;
    padding: 40px 20px;
    margin-top: 0;
}

/* Override course cards to match content width */
.courses-section .related-container {
    max-width: 1200px !important;
    margin: 0 auto !important;
    padding: 0 !important;
}

/* CTA Section */
.cta-section {
    text-align: center !important;
    padding: 40px 20px !important;
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%) !important;
    width: 100vw !important;
    margin-left: calc(-50vw + 50%) !important;
    margin-right: calc(-50vw + 50%) !important;
}

.cta-section h2 {
    font-family: 'Roboto', sans-serif !important;
    font-size: 32px !important;
    font-weight: 700 !important;
    line-height: 1.3 !important;
    color: #FFFFFF !important;
    margin-bottom: 12px !important;
}

.cta-section p {
    font-family: 'Roboto', sans-serif !important;
    font-size: 18px !important;
    font-weight: 400 !important;
    line-height: 1.6 !important;
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
        padding: 30px 0;
    }

    .hero h1 {
        font-size: 32px !important;
        margin-bottom: 12px !important;
    }

    .hero .subtitle {
        font-size: 16px !important;
        margin-bottom: 20px !important;
    }

    .hero .cta-group {
        gap: 15px;
    }

    .content-section {
        margin: 20px auto 0 auto;
        padding: 0 20px 25px;
    }

    .content-section p {
        margin-bottom: 16px;
    }

    .courses-section {
        padding: 30px 15px;
    }

    .cta-section {
        padding: 30px 20px !important;
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
    .hero {
        padding: 25px 0;
    }

    .hero h1 {
        font-size: 28px !important;
    }

    .hero .subtitle {
        font-size: 14px !important;
    }

    .hero .cta-group {
        flex-direction: column;
        gap: 12px;
    }

    .cta-section h2 {
        font-size: 22px !important;
    }
}
</style>

<div class="academic-enrichment-page">

    <!-- Hero Section -->
    <section class="hero">
        <h1>Academic Enrichment</h1>
        <p class="subtitle">Building strong foundations and a lifelong love for learning</p>
        <div class="cta-group">
            <?php echo do_shortcode('[inquiry_button]'); ?>
            <?php echo do_shortcode('[inquiry_button color="teal" text="View Our Programs" url="#programs"]'); ?>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <p>Our academic enrichment programs are designed to cultivate intellectual curiosity and a lifelong love for learning. Additionally, our rigorous coursework, small group instruction, and continuous teacher feedback all enable our students to not only gain a deeper understanding of their core content, but also develop confidence in their academic pursuits. Our programs empower students to excel academically, perform well on standardized exams, and secure placements in some of the most competitive middle and high schools.</p>

        <p>We understand that each student is unique and has different strengths, interests, and learning styles. We have multiple groups per grade, differentiated from one another based on skill level, learning styles, and ability to tackle above-grade level work. This ensures that even within a small group setting, our programs are tailored to meet the specific needs of each individual. By doing so, we optimize and accelerate their academic growth, enabling them to reach their full potential.</p>

        <p>Our team of dedicated educators serve as mentors, going beyond teaching to encourage critical thinking, creativity, and independent learning. They empower students to explore new ideas, ask questions, and become confident advocates for themselves. These skills are crucial as students progress into higher education, enabling them to navigate complex challenges and excel in their academic pursuits. We believe in nurturing well-rounded individuals who are equipped with the tools needed to succeed academically as well as in all other aspects of life.</p>
    </section>

    <!-- Courses Section - MOVED ABOVE Why Choose -->
    <section id="programs" class="courses-section">
        <?php echo do_shortcode('[course_category category="enrichment" title="Our Programs" columns="3" limit="3"]'); ?>
    </section>

    <!-- Why Choose Section -->
    <?php echo do_shortcode('[why_choose_enrichment]'); ?>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Get Started?</h2>
        <p>Contact us to learn more about our enrichment programs and find the right fit for your child.</p>
        <?php echo do_shortcode('[inquiry_button]'); ?>
    </section>

</div>

<?php get_footer(); ?>
