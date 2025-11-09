<?php
/**
 * Template Name: SAT ACT Prep - Full Width
 * Description: Custom template for SAT & ACT Test Preparation page
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

    html {
        scroll-behavior: smooth;
    }

    .cta-button.cta-primary:hover {
        opacity: 0.9;
    }

    body {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.7;
        color: #333;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Hero Section - Course Style */
    .course-hero {
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #134958 0%, #1a5f73 50%, #28AFCF 100%);
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    .course-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 80%;
        height: 200%;
        background: radial-gradient(circle, rgba(40, 175, 207, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        animation: pulse 8s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.1); opacity: 0.3; }
    }

    .hero-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 50px 10px;
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: 1.857fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .course-hero .hero-content h1 {
        font-size: 48px !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        margin-bottom: 8px;
        line-height: 1.1;
        letter-spacing: -1px;
    }

    .hero-content .highlight {
        background: linear-gradient(135deg, #FF7F07, #F0B268);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-excerpt {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        font-weight: 400;
        line-height: 1.7;
    }

    .hero-stats-mini {
        display: flex;
        gap: 16px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .stat-mini {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .stat-mini-icon {
        width: 44px;
        height: 44px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-mini-icon svg {
        width: 22px;
        height: 22px;
        color: #FF7F07;
    }

    .stat-mini-text {
        color: white;
    }

    .stat-mini-number {
        font-size: 24px;
        font-weight: 700;
        display: block;
        line-height: 1;
        margin-bottom: 3px;
    }

    .stat-mini-label {
        font-size: 12px;
        opacity: 0.8;
        font-weight: 400;
    }

    .cta-group {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .hero-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 20px 18px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.5);
        max-width: 340px;
    }

    .hero-card h3 {
        font-size: 16px;
        color: #134958;
        margin-bottom: 12px;
        text-align: center;
        font-weight: 700;
    }

    .hero-card-grid {
        display: grid;
        gap: 8px;
    }

    .card-stat-box {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        border-radius: 10px;
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }

    .card-stat-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(40, 175, 207, 0.15);
        border-color: #28AFCF;
    }

    .card-stat-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #28AFCF, #134958);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .card-stat-icon svg {
        width: 20px;
        height: 20px;
        color: white;
    }

    .card-stat-text {
        flex: 1;
        text-align: left;
    }

    .card-stat-number {
        font-size: 22px;
        font-weight: 800;
        color: #134958;
        display: block;
        line-height: 1;
        margin-bottom: 2px;
    }

    .card-stat-label {
        font-size: 12px;
        color: #666;
        font-weight: 500;
        line-height: 1.2;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .hero-container {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 40px 20px;
        }

        .course-hero .hero-content h1 {
            font-size: 36px !important;
        }

        .hero-excerpt {
            font-size: 18px;
        }

        .hero-card {
            max-width: 100%;
            margin: 0 auto;
        }

        .hero-stats-mini {
            flex-direction: column;
            gap: 12px;
        }
    }

    /* Button styling controlled by course-styles.css */

    /* Trust Bar */
    .trust-bar {
        display: none !important;
    }

    .trust-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
    }

    .trust-item {
        text-align: center;
    }

    .trust-item .icon {
        display: none;
    }

    /* Main Content */
    /* Section light - consistent 1200px width */
    .section-light {
        padding: 40px 10px;
        margin-top: 0 !important;
    }

    .section-light > *:not(.course-cards-section) {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Course cards section - no expansion needed, already full width */
    .section-light .course-cards-section {
        margin-left: auto;
        margin-right: auto;
        max-width: 1200px;
        width: 100%;
    }

    .section-light h2 {
        color: #134958;
        font-size: 26px;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 30px;
        text-align: center;
    }

    .section-light h3 {
        color: #134958;
        font-size: 20px;
        font-weight: 600;
        line-height: 1.3;
        margin: 40px 0 15px;
    }

    /* Override for course card titles - more specific selector */
    .course-cards-section h3.course-card-title,
    .section-light .course-card-title,
    .section-light h3.course-card-title {
        font-size: 18px !important;
        color: #134958 !important;
        margin: 0 0 14px 0 !important;
        font-weight: 700 !important;
    }

    .section-light p {
        margin-bottom: 20px;
        line-height: 1.7;
        font-size: 16px;
    }

    .section-light ul {
        margin-left: 20px;
        margin-bottom: 25px;
    }

    .section-light li {
        margin-bottom: 12px;
        line-height: 1.7;
    }

    /* Section wrappers for alternating backgrounds */
    .section-white {
        background: white;
    }

    .section-light {
        background: #e8f5f7;
    }

    .section-blue-light {
        background: #e8f7fa;
        padding: 40px 10px;
    }

    .section-blue-light > *:not(.course-cards-section) {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Content cards */
    .content-card {
        background: white;
        padding: 25px 18px;  /* Reduced padding for more compact look */
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        margin-bottom: 20px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .content-card h3 {
        margin-top: 0;
    }

    /* Step 2: Format Selection Styles */
    .step-container {
        display: flex;
        gap: 30px;
        margin-bottom: 50px;
        align-items: flex-start;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .step-number-large {
        display: none;
    }

    .step-content {
        flex: 1;
    }

    .step-content h3 {
        font-size: 20px;
        font-weight: 600;
        line-height: 1.3;
        color: #134958;
        margin: 0 0 15px;
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .step-number-inline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #28AFCF 0%, #134958 100%);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        font-size: 24px;
        font-weight: 700;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(40, 175, 207, 0.3);
    }

    .step-content p {
        margin-bottom: 15px;
        line-height: 1.7;
    }

    .format-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin: 0 auto;
        padding-top: 0;
        max-width: 1200px;
    }

    .format-card {
        background: white;
        border-radius: 8px;
        padding: 5px 12px 18px 15px;
        box-shadow: 0 6px 24px rgba(0,0,0,0.15);  /* Stronger, more defined shadow */
        border: 1px solid rgba(40, 175, 207, 0.2);  /* Subtle teal border */
        border-top: 4px solid #28AFCF;  /* Prominent top accent */
        transition: all 0.3s ease;
        position: relative;
    }

    .format-card:hover {
        box-shadow: 0 10px 35px rgba(0,0,0,0.22);  /* Even more pronounced on hover */
        border-color: rgba(40, 175, 207, 0.4);  /* Border becomes more visible */
        transform: translateY(-5px);  /* Lift higher */
    }

    .format-card h4 {
        margin-top: 0;
        margin-left: 0;  /* Flush to left edge */
        font-size: 18px;
        font-weight: 600;
        color: #134958;
        margin-bottom: 10px;  /* Reduced from 15px for compact look */
    }

    .format-card .badge {
        display: inline-block;
        background: #F0B268;
        color: white;
        padding: 4px 12px;
        border-radius: 4px;
        font-size: 14px;
        margin-left: 10px;
        font-weight: 500;
    }

    .format-card > p {
        margin-left: 0;  /* Paragraph flush to left */
    }

    .format-card ul {
        margin: 10px 0;  /* Reduced from 15px */
        padding-left: 18px;  /* Reduced indentation for bullets */
    }

    .format-card li {
        margin-bottom: 6px;  /* Reduced from 8px */
        line-height: 1.7;  /* Match default */
        padding-left: 2px;  /* Minimal extra spacing */
    }

    .best-for {
        background: #f0f8ff;
        border-left: 3px solid #28AFCF;
        padding: 8px 10px;  /* More compact padding */
        margin-top: 10px;  /* Reduced from 15px */
        margin-left: 0;  /* Flush to card edge */
        margin-right: 0;  /* Flush to card edge */
    }

    .best-for strong {
        color: #134958;
    }

    /* Why Choose Us */
    .why-choose {
        background: white;
        padding: 40px 10px;
    }

    .why-choose > * {
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .why-choose h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #134958;
        font-size: 26px;
    }

    .why-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .benefit-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-left: 3px solid #28AFCF;
        display: flex;
        gap: 12px;
        align-items: flex-start;
        transition: all 0.3s ease;
    }

    .benefit-card:hover {
        transform: translateX(3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .benefit-card:nth-child(2) { border-left-color: #F0B268; }
    .benefit-card:nth-child(3) { border-left-color: #FF7F07; }
    .benefit-card:nth-child(4) { border-left-color: #134958; }

    .benefit-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #28AFCF 0%, #1a8fa8 100%);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .benefit-card:nth-child(2) .benefit-icon {
        background: linear-gradient(135deg, #F0B268 0%, #d89a4f 100%);
    }

    .benefit-card:nth-child(3) .benefit-icon {
        background: linear-gradient(135deg, #FF7F07 0%, #e67000 100%);
    }

    .benefit-card:nth-child(4) .benefit-icon {
        background: linear-gradient(135deg, #134958 0%, #0a2832 100%);
    }

    .benefit-icon svg {
        width: 18px;
        height: 18px;
        fill: white;
    }

    .benefit-content h3 {
        color: #134958;
        margin-bottom: 10px;
        font-size: 20px;
    }

    .benefit-content p {
        font-size: 16px;
        line-height: 1.7;
        margin: 0;
    }

    /* FAQ Section - Modern with Dark Text */
    .faq-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 10px 50px 10px;
        background: transparent;
    }

    .faq-section h2 {
        text-align: center;
        margin-bottom: 40px;
        color: #134958;
        font-size: 26px;
        font-weight: 700;
        font-family: 'Roboto', sans-serif;
    }

    .faq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.25rem;
        margin: 0.5rem 0;
    }

    .faq-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        border: none;
        transition: all 0.3s ease;
    }

    .faq-card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        transform: translateY(-4px);
    }

    .faq-header {
        width: 100%;
        padding: 0 1.25rem;
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: left;
        transition: background 0.3s ease;
        font-family: inherit;
        min-height: 3rem;
    }

    .faq-header:hover {
        background: #f1f5f9;
    }

    .faq-question {
        font-size: 20px;
        font-weight: 600;
        color: #134958 !important;
        margin: 0;
        flex: 1;
        font-family: 'Roboto', sans-serif;
        line-height: 1.3;
    }

    /* Override any theme h3 styles in FAQ */
    .faq-card h3,
    .faq-header h3,
    h3.faq-question {
        color: #134958 !important;
        font-size: 20px !important;
        font-weight: 600 !important;
        line-height: 1.3 !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .faq-icon {
        flex-shrink: 0;
        margin-left: 1.25rem;
        color: #28AFCF;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        font-weight: 700;
        font-size: 1.3rem;
    }

    .faq-card.active .faq-icon {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
        background: #fafbfc;
    }

    .faq-answer p {
        padding: 0 1.25rem;
        color: #333;
        line-height: 1.7;
        margin: 0 0 0.75rem 0;
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
    }

    .faq-answer p:first-child {
        padding-top: 0.3rem;
    }

    .faq-answer p:last-child {
        padding-bottom: 0.4rem;
        margin-bottom: 0;
    }

    .faq-answer p + p {
        padding-top: 0;
    }

    .faq-answer ul {
        padding: 0.5rem 1.25rem 0.75rem 1.25rem;
        margin: 0 0 0.5rem 1.5rem;
        color: #334155;
        line-height: 1.5;
        list-style: none;
    }

    .faq-answer ul li {
        margin-bottom: 0.75rem;
        padding-left: 1.75rem;
        position: relative;
        font-size: 16px;
    }

    .faq-answer ul li::before {
        content: "▸";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-size: 18px;
        font-weight: 700;
        line-height: 1;
    }

    /* Final CTA */
    .final-cta {
        background: linear-gradient(135deg, #28AFCF 0%, #134958 100%);
        color: white;
        padding: 50px 10px;
        text-align: center;
    }

    .final-cta h2 {
        font-size: 26px;
        margin-bottom: 25px;
        color: white;
    }

    .final-cta p {
        font-size: 18px;
        margin-bottom: 35px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
        color: white;
        opacity: 0.95;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-container,
        .trust-container {
            grid-template-columns: 1fr;
        }

        .why-grid {
            grid-template-columns: 1fr;
        }

        .benefit-card {
            padding: 18px;
        }

        .hero-stats-mini {
            flex-direction: column;
        }

        .hero-content h1 {
            font-size: 2rem;
        }

        .step-container {
            flex-direction: column;
        }

        .format-cards {
            grid-template-columns: 1fr;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <!-- Hero Section -->
            <section class="course-hero">
                <div class="hero-container">
                    <!-- Left Column: Content -->
                    <div class="hero-content">
                        <h1>SAT & ACT Test Prep - Achieve Your Dream College Score</h1>
                        <p class="hero-excerpt">Join the program where 96% of students improve their scores - with an average 6-point ACT increase and 100-point SAT increase. Most of our students score high enough to get into Ivy League schools.</p>

                        <!-- Mini Stats -->
                        <div class="hero-stats-mini">
                            <div class="stat-mini">
                                <div class="stat-mini-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <div class="stat-mini-text">
                                    <span class="stat-mini-number">10+</span>
                                    <span class="stat-mini-label">Years Experience</span>
                                </div>
                            </div>
                            <div class="stat-mini">
                                <div class="stat-mini-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div class="stat-mini-text">
                                    <span class="stat-mini-number">80%+</span>
                                    <span class="stat-mini-label">Score 34+ ACT or 1500+ SAT</span>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="cta-group">
                            <a href="#SATACTPrograms" class="cta-button cta-primary" style="background-color: #FF9574; color: #FFFFFF; padding: 12px 24px; border-radius: 3px; font-family: 'Roboto', sans-serif !important; font-size: 18px !important; font-weight: 700 !important; line-height: 1.8 !important; min-width: 180px !important; width: auto !important; display: inline-block !important; text-align: center !important; text-decoration: none; transition: all .3s;">View Our Programs</a>
                            <?php echo do_shortcode('[inquiry_button]'); ?>
                        </div>
                    </div>

                    <!-- Right Column: Stats Card -->
                    <div class="hero-card">
                        <h3>Our Track Record</h3>
                        <div class="hero-card-grid">
                            <div class="card-stat-box">
                                <div class="card-stat-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <div class="card-stat-text">
                                    <span class="card-stat-number">96%</span>
                                    <span class="card-stat-label">Score Improvement Rate</span>
                                </div>
                            </div>
                            <div class="card-stat-box">
                                <div class="card-stat-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                    </svg>
                                </div>
                                <div class="card-stat-text">
                                    <span class="card-stat-number">6-9 Points</span>
                                    <span class="card-stat-label">Average ACT Increase</span>
                                </div>
                            </div>
                            <div class="card-stat-box">
                                <div class="card-stat-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                    </svg>
                                </div>
                                <div class="card-stat-text">
                                    <span class="card-stat-number">100+ Points</span>
                                    <span class="card-stat-label">Average SAT Increase</span>
                                </div>
                            </div>
                            <div class="card-stat-box">
                                <div class="card-stat-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                </div>
                                <div class="card-stat-text">
                                    <span class="card-stat-number">Up to 13 Points</span>
                                    <span class="card-stat-label">Top ACT Student Improvement</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Your Path to Success -->
            <section class="section-light" style="padding-top: 4px; margin-top: 0;">
                <div style="max-width: 1200px; margin: 0 auto;">
                    <h2>Your Path to Success: A Strategic 3-Step Process</h2>
                    <p style="text-align: center; margin: 0 auto 35px; line-height: 1.7;">Achieving your target score isn't just about studying harder—it's about choosing the right test, the right format, and the right timeline.</p>
                </div>

                    <div class="step-container">
                        <div class="step-content">
                            <h3><span class="step-number-inline">1</span>Diagnostic Testing & Choosing Your Test</h3>
                            <p>We start with comprehensive diagnostic assessments for both SAT and ACT. This identifies your strengths, determines which test suits you best, and sets realistic score goals.</p>

                        <h4 style="color: #134958; font-size: 18px; font-weight: 600; line-height: 1.3; margin: 30px 0 15px;">Understanding the Recent Changes (2025)</h4>
                        <p style="margin-bottom: 2px;">Both tests have undergone significant changes. The SAT is now fully digital and adaptive, while the ACT introduced an "Enhanced" format. Here's what you need to know:</p>

                        <div style="overflow-x: auto; margin: 0;">
                            <table style="width: 100%; border-collapse: collapse; margin-top: 4px; font-family: 'Roboto', sans-serif !important;">
                                <thead>
                                    <tr style="background: #134958; color: white;">
                                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important; color: white !important;">Feature</th>
                                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important; color: white !important;">Digital SAT</th>
                                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important; color: white !important;">Enhanced ACT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Format</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Fully digital, adaptive</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Paper or digital, non-adaptive</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Total Time</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">2hr 14min</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">2hr 5min (without science)</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Questions</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">98 total</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">131 total (without science)</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Reading Passages</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Short (1 question each)</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Long (multiple questions)</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Math Weight</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">50% of score</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">25% of score</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Science Section</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">No science section</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Optional (some colleges require)</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Difficulty</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Module 2 harder if you do well</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Consistent throughout</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 600 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">Score Stability</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">More stable</td>
                                        <td style="padding: 10px; border: 1px solid #ddd; font-size: 16px !important; font-weight: 400 !important; color: #333 !important; line-height: 1.7 !important; font-family: 'Roboto', sans-serif !important;">More volatile (fewer questions)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 style="color: #134958; font-size: 18px !important; font-weight: 600; line-height: 1.3; margin: 0 0 8px;">Which Test Should You Take?</h4>
                        <p style="margin-bottom: 8px; font-family: 'Roboto', sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 1.7; color: #333;">Both tests are widely accepted by colleges, but they have distinct differences:</p>
                        <ul style="margin-left: 20px; margin-bottom: 20px; font-family: 'Roboto', sans-serif !important; font-size: 16px !important; line-height: 1.7; color: #333;">
                            <li style="margin-bottom: 10px; font-weight: 400; font-size: 16px !important;"><strong style="font-weight: 600;">ACT:</strong> More straightforward with direct reading passages and consistent scoring</li>
                            <li style="margin-bottom: 10px; font-weight: 400; font-size: 16px !important;"><strong style="font-weight: 600;">SAT:</strong> Provides more time per question but can have more ambiguous passages and answer choices</li>
                        </ul>

                        <p style="margin-bottom: 15px; font-family: 'Roboto', sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 1.7; color: #333;"><span style="color: #FF7F07; font-weight: 600;">Our recommendation process:</span> After your child takes diagnostic tests for both exams, we analyze performance and recommend the test where they'll reach their target score most efficiently. If performance is similar on both, we generally recommend starting with ACT prep because:</p>
                        <ul style="margin-left: 30px; margin-bottom: 25px; list-style: none; padding-left: 0; font-family: 'Roboto', sans-serif !important; font-size: 16px !important; line-height: 1.7; color: #333;">
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative; font-weight: 400; font-size: 16px !important;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 18px; font-weight: 700; line-height: 1;">▸</span> ACT math covers more advanced topics (geometry, trigonometry), so mastering it makes switching to SAT easier</li>
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative; font-weight: 400; font-size: 16px !important;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 18px; font-weight: 700; line-height: 1;">▸</span> The ACT has historically had more consistent scoring curves</li>
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative; font-weight: 400; font-size: 16px !important;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 18px; font-weight: 700; line-height: 1;">▸</span> Reading passages are more straightforward</li>
                        </ul>

                        <div style="display: flex; gap: 15px; flex-wrap: wrap; justify-content: center;">
                            <a href="/sat-vs-act-2025-which-test-is-right-for-you/" style="display: inline-block; background: #28AFCF; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s;">
                                SAT vs ACT: Complete Guide
                            </a>
                            <a href="/changes-to-the-new-digital-sat/" style="display: inline-block; background: #134958; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s;">
                                What's New in Digital SAT
                            </a>
                            <a href="/whats-new-in-the-enhanced-act/" style="display: inline-block; background: #FF7F07; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s;">
                                What's New in Enhanced ACT
                            </a>
                        </div>
                        </div>
                    </div>
            </section>

            <!-- Step 2: Choose Your Format -->
            <section class="section-white">
                <div class="content-section">
                    <div class="step-container" style="margin-bottom: 0 !important; padding-bottom: 0 !important;">
                        <div class="step-content">
                            <h3><span class="step-number-inline">2</span>Choose Your Learning Format</h3>
                            <p style="margin-bottom: 3px !important;">Once we've identified your best test, we'll help you choose the learning format that matches your goals, timeline, and learning style:</p>
                        </div>
                    </div>

                    <div class="format-cards" style="margin-top: 0; padding-top: 0; padding-bottom: 30px;">
                        <div class="format-card">
                            <h4 style="text-align: center;">Group Classes <span class="badge">Most Popular</span></h4>
                            <p>Small groups (max 8 students) provide:</p>
                            <ul>
                                <li>Collaborative learning and peer motivation</li>
                                <li>Structured curriculum and pacing</li>
                                <li>Regular practice test schedule</li>
                                <li>Cost-effective comprehensive preparation</li>
                            </ul>
                            <div class="best-for">
                                <strong>Best for:</strong> Self-motivated students who thrive with peers and prefer structured timelines
                            </div>
                        </div>

                        <div class="format-card">
                            <h4 style="text-align: center;">Private 1-on-1 Tutoring</h4>
                            <p>Personalized sessions provide:</p>
                            <ul>
                                <li>Flexible scheduling around your commitments</li>
                                <li>Targeted support for weak areas</li>
                                <li>Accelerated pacing for advanced students</li>
                                <li>Intensive support for foundational gaps</li>
                            </ul>
                            <div class="best-for">
                                <strong>Best for:</strong> Students needing targeted help (either catching up or fine-tuning high scores)
                            </div>
                        </div>

                        <div class="format-card">
                            <h4 style="text-align: center;">Hybrid Approach</h4>
                            <p>Many students combine formats:</p>
                            <ul>
                                <li>Group classes for comprehensive curriculum</li>
                                <li>Private sessions for specific weak topics</li>
                                <li>Flexible scheduling as test date approaches</li>
                                <li>Cost-effective balance of both approaches</li>
                            </ul>
                            <div class="best-for">
                                <strong>Best for:</strong> Students who want structure plus personalized attention
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Step 3: Choose Your Path -->
            <section class="section-light" style="padding-top: 12px;">
                <div class="step-container">
                    <div class="step-content">
                        <h3><span class="step-number-inline">3</span>Choose Your Path</h3>
                        <p>Transform Your Test Scores with NYC's Most Effective College Entrance Exam Prep. At NYC STEM Club, we understand that achieving your target SAT or ACT score isn't just about knowing the content—it's about mastering test-taking strategies, building stamina, and learning to perform under pressure. Our comprehensive program has helped over 500 students achieve Ivy League-level scores, with <strong>96% seeing significant improvements</strong>.</p>
                    </div>
                </div>

                <!-- Comparison Cards -->
                <div style="max-width: 1200px; margin: 0 auto;">
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 32px;">

                        <!-- SOPHOMORE CARD -->
                        <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08); border: 3px solid #28AFCF; display: flex; flex-direction: column; transition: transform 0.3s;">
                            <div style="background: linear-gradient(135deg, #28AFCF 0%, #1d9bb8 100%); padding: 10px 14px; text-align: center;">
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 1.25rem; font-weight: 800; margin-bottom: 2px; color: #134958 !important;">Sophomore Year</h3>
                                <p style="font-size: 0.75rem; opacity: 0.95; font-weight: 500; margin: 0; color: white;">The Ideal Starting Point</p>
                            </div>

                            <div style="padding: 20px; flex: 1;">
                                <div style="background: #f8f9fa; border-radius: 6px; padding: 14px; margin-bottom: 18px; text-align: center;">
                                    <div style="font-family: 'Roboto', sans-serif; font-size: 1.05rem; font-weight: 700; color: #134958; margin-bottom: 4px;">Foundational Program</div>
                                    <div style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #333; font-weight: 400; line-height: 1.7;">January - June (5-6 months)</div>
                                </div>

                                <div style="font-family: 'Roboto', sans-serif; font-size: 0.75rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; margin: 18px 0 10px; padding-bottom: 6px; border-bottom: 2px solid #e2e8f0;">Suggested Timeline</div>

                                <ul style="list-style: none; padding: 0; margin: 0 0 10px 0; font-family: 'Roboto', sans-serif;">
                                    <li style="padding: 8px 0 8px 24px; position: relative; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-weight: 700; font-size: 1rem; color: #28AFCF;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">➊ June:</strong> First attempt
                                    </li>
                                    <li style="padding: 8px 0 8px 24px; position: relative; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-weight: 700; font-size: 1rem; color: #28AFCF;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">➋ July:</strong> Bootcamp + ACT*<br>
                                        <span style="margin-left: 16px; font-size: 16px;">OR</span> <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">August:</strong> SAT attempt
                                    </li>
                                    <li style="padding: 8px 0 8px 24px; position: relative; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-weight: 700; font-size: 1rem; color: #28AFCF;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">➌ Sept/Oct:</strong> Final attempt if needed
                                    </li>
                                </ul>
                                <p style="font-family: 'Roboto', sans-serif !important; font-size: 14px !important; color: #666 !important; font-style: italic; margin-top: 0; margin-bottom: 14px; line-height: 1.5 !important; font-weight: 400 !important;">*July ACT not offered in NY. Students can test in nearby states (NJ, CT).</p>

                                <div style="background: linear-gradient(135deg, rgba(40, 175, 207, 0.1), rgba(40, 175, 207, 0.05)); border-radius: 6px; padding: 12px 14px; margin-top: 0; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.7; border-left: 3px solid #28AFCF; color: #333; font-weight: 400;">
                                    <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #134958;">Added Benefit:</strong> Students also see improvement in their school math courses!
                                </div>
                            </div>
                        </div>

                        <!-- JUNIOR CARD -->
                        <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08); border: 3px solid #FF7F07; display: flex; flex-direction: column; transition: transform 0.3s;">
                            <div style="background: linear-gradient(135deg, #FF7F07 0%, #e66f00 100%); padding: 10px 14px; text-align: center;">
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 1.25rem; font-weight: 800; margin-bottom: 2px; color: #134958 !important;">Junior Year</h3>
                                <p style="font-size: 0.75rem; opacity: 0.95; font-weight: 500; margin: 0; color: white;">Critical Decision Point</p>
                            </div>

                            <div style="padding: 20px; flex: 1;">
                                <div style="background: #fff9f0; border: 2px solid #FF7F07; border-radius: 6px; padding: 12px; margin-bottom: 14px;">
                                    <div style="font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #FF7F07; margin-bottom: 8px; text-align: center; line-height: 1.3;">Do you have foundational gaps?</div>
                                    <p style="font-family: 'Roboto', sans-serif !important; font-size: 14px !important; color: #666 !important; text-align: center; margin-bottom: 12px; line-height: 1.5 !important; font-weight: 400 !important;">(200+ pts below SAT goal or 6-9 pts below ACT goal, OR taking Algebra 2 now)</p>

                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                                        <div style="background: white; border-radius: 5px; padding: 10px; text-align: center; border: 2px solid #28A745;">
                                            <div style="font-family: 'Roboto', sans-serif; font-size: 13px; font-weight: 700; padding: 4px 10px; border-radius: 3px; display: inline-block; margin-bottom: 6px; color: white; background: #28A745; line-height: 1;">YES</div>
                                            <div style="font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #333; margin-bottom: 4px; line-height: 1.3;">Foundational</div>
                                            <div style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #666; line-height: 1.3; font-weight: 400;">Jan-June<br>(5-6 mo)</div>
                                        </div>
                                        <div style="background: white; border-radius: 5px; padding: 10px; text-align: center; border: 2px solid #007BFF;">
                                            <div style="font-family: 'Roboto', sans-serif; font-size: 13px; font-weight: 700; padding: 4px 10px; border-radius: 3px; display: inline-block; margin-bottom: 6px; color: white; background: #007BFF; line-height: 1;">NO</div>
                                            <div style="font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #333; margin-bottom: 4px; line-height: 1.3;">Bootcamp</div>
                                            <div style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #666; line-height: 1.3; font-weight: 400;">Year-round<br>(6-8 wk)</div>
                                        </div>
                                    </div>
                                </div>

                                <div style="font-family: 'Roboto', sans-serif; font-size: 13px; font-weight: 600; color: #64748b; margin: 16px 0 10px; padding-bottom: 6px; line-height: 1.3; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Suggested Timeline</div>

                                <ul style="list-style: none; padding: 0; margin: 0 0 10px 0; font-family: 'Roboto', sans-serif;">
                                    <li style="padding: 2px 0 2px 24px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 16px; color: #FF7F07;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">➊ June:</strong> First attempt
                                    </li>
                                    <li style="padding: 2px 0 2px 24px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 16px; color: #FF7F07;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">➋ July/Aug:</strong> Second attempt
                                    </li>
                                    <li style="padding: 2px 0 2px 24px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 16px; color: #FF7F07;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">➌ Early Fall:</strong> Final before applications
                                    </li>
                                </ul>

                                <div style="background: #fff9f0; border-radius: 6px; padding: 12px 14px; margin-top: 14px; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.5; border-left: 3px solid #FF7F07; color: #333; font-weight: 400;">
                                    <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #134958;">Important:</strong> After fall, focus shifts to applications. Plan accordingly.
                                </div>
                            </div>
                        </div>

                        <!-- SENIOR CARD -->
                        <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08); border: 3px solid #F0B268; display: flex; flex-direction: column; transition: transform 0.3s;">
                            <div style="background: linear-gradient(135deg, #F0B268 0%, #d99d52 100%); padding: 10px 14px; text-align: center;">
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 1.25rem; font-weight: 800; margin-bottom: 2px; color: #134958 !important;">Senior Year</h3>
                                <p style="font-size: 0.75rem; opacity: 0.95; font-weight: 500; margin: 0; color: white;">Last Chance</p>
                            </div>

                            <div style="padding: 20px; flex: 1;">
                                <div style="background: #f8f9fa; border-radius: 6px; padding: 14px; margin-bottom: 18px; text-align: center;">
                                    <div style="font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 700; color: #333; margin-bottom: 4px; line-height: 1.7;">Summer or Fall Intensive</div>
                                    <div style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #333; font-weight: 400; line-height: 1.5;">Summer: 3-6 weeks | Fall: 4-6 weeks</div>
                                </div>

                                <ul style="list-style: none; padding: 0; margin: 0 0 10px 0; font-family: 'Roboto', sans-serif;">
                                    <li style="padding: 2px 0 2px 24px; position: relative; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-weight: 700; font-size: 1rem; color: #F0B268;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">Best Option - Summer:</strong> Prep during June-August, test in Aug/Sept/Oct
                                    </li>
                                    <li style="padding: 2px 0 2px 24px; position: relative; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-weight: 700; font-size: 1rem; color: #F0B268;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">Last Chance - Fall:</strong> Sept/Oct crash course, test Oct/Nov only
                                    </li>
                                    <li style="padding: 2px 0 2px 24px; position: relative; font-size: 16px; line-height: 1.5; color: #333; font-weight: 400;">
                                        <span style="position: absolute; left: 6px; font-weight: 700; font-size: 1rem; color: #F0B268;">→</span>
                                        <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #1e293b;">December:</strong> Too late for most applications
                                    </li>
                                </ul>

                                <div style="background: linear-gradient(135deg, rgba(40, 175, 207, 0.1), rgba(40, 175, 207, 0.05)); border-radius: 6px; padding: 12px 14px; margin-top: 14px; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.7; border-left: 3px solid #28AFCF; color: #333; font-weight: 400;">
                                    <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #134958;">Summer Advantage:</strong> More time to prep before application season starts. Ideal for first-time test takers.
                                </div>

                                <div style="background: #fff3e0; border-radius: 6px; padding: 12px 14px; margin-top: 10px; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.7; border-left: 3px solid #F0B268; color: #333; font-weight: 400;">
                                    <strong style="font-family: 'Roboto', sans-serif; font-weight: 600; color: #134958;">Fall Reality:</strong> Extremely difficult to balance test prep with applications, essays, and school. Only if absolutely necessary.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Browse All SAT/ACT Courses -->
                <div id="SATACTPrograms"></div>
                <?php echo do_shortcode('[course_category category="sat-act-prep" title="SAT & ACT Test Prep Programs" columns="4"]'); ?>
            </section>

            <!-- Why Choose NYC STEM Club - Reusable Shortcode -->
            <?php echo do_shortcode('[why_choose_sat_act]'); ?>

            <!-- FAQ Section -->
            <section class="section-light">
                <div class="faq-section">
                    <h2>Frequently Asked Questions</h2>

                <div class="faq-grid">
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What's the difference between the SAT and ACT? Which should my child take?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>Both tests are widely accepted by colleges, but they have distinct differences. The ACT tends to be more straightforward with direct reading passages and consistent scoring, while the SAT provides more time per question but can have more ambiguous passages and answer choices.</p>
                            <p><strong>We help you decide through diagnostic testing.</strong> After your child takes practice tests for both exams, we analyze their performance and recommend the test where they'll reach their target score most efficiently. If performance is similar on both, we generally recommend starting with ACT prep because:</p>
                            <ul>
                                <li>ACT math covers more advanced topics (geometry, trigonometry), so mastering it makes switching to SAT easier</li>
                                <li>The ACT has historically had more consistent scoring curves</li>
                                <li>Reading passages are more straightforward</li>
                            </ul>
                            <p>That said, every student is different, and our diagnostic process ensures you choose the right test for your child's strengths.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">How long does it take to see score improvements?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>It depends on your starting point and target score, but here's what our data shows:</strong></p>
                            <ul>
                                <li>Students in <strong>3-6 month programs</strong> see an average <strong>6-point ACT increase</strong> or <strong>100-point SAT increase</strong></li>
                                <li>Students in <strong>full-year programs</strong> (our recommended timeline) see an average <strong>9-point ACT increase</strong> and even larger SAT gains</li>
                                <li><strong>96% of our students improve their scores</strong> from diagnostic to final test</li>
                            </ul>
                            <p><strong>The honest answer:</strong> Some students need very minimal preparation if they're already strong test-takers. Others need foundational work before intensive test prep. We assess your child's needs upfront and create a realistic timeline for reaching their target score.</p>
                            <p><strong>Most students take the test 3 times</strong> to achieve their best score, which is why starting in sophomore spring gives you the time and flexibility to reach your goals without added stress.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">When should my child start SAT/ACT prep?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>Ideal timeline: Spring of sophomore year (10th grade)</strong></p>
                            <p>This gives your child time to:</p>
                            <ul>
                                <li>Build a strong foundation without pressure</li>
                                <li>Take the test multiple times to maximize superscoring opportunities</li>
                                <li>Identify which test (SAT or ACT) suits them best</li>
                                <li>Achieve their target score before college applications intensify in junior/senior year</li>
                                <li>Focus on academics, extracurriculars, and application essays when it matters most</li>
                            </ul>
                            <p><strong>Minimum requirements:</strong></p>
                            <ul>
                                <li><strong>For ACT prep:</strong> Must have completed or be currently enrolled in <strong>Algebra 2</strong></li>
                                <li><strong>For SAT prep:</strong> Algebra 1 and Geometry are sufficient</li>
                            </ul>
                            <p><strong>Late start?</strong> We also work with juniors and seniors who need accelerated timelines. Our intensive bootcamps can help students make significant gains in shorter periods.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Do you offer practice tests?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>Yes! Practice tests are the cornerstone of our program.</strong></p>
                            <ul>
                                <li><strong>Foundational Course:</strong> 3 full-length practice tests</li>
                                <li><strong>Intensive Programs:</strong> 6-8 full-length practice tests</li>
                                <li>All tests administered under <strong>real test conditions</strong> (timed, proctored, proper environment)</li>
                                <li><strong>Detailed score analysis</strong> after every test</li>
                                <li>Personalized feedback identifying specific weaknesses</li>
                                <li>Progress tracking across all practice tests</li>
                            </ul>
                            <p><strong>We also simulate test day conditions</strong> so students are fully prepared for the actual testing environment, timing pressure, and stamina requirements.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What if my child has already taken the SAT/ACT and wants to improve their score?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>This is exactly what our bootcamps and intensive modules are designed for!</strong></p>
                            <p>Most students <strong>need 2-3 attempts</strong> to reach their target score, and that's completely normal. If your child has already taken an official test, we:</p>
                            <ul>
                                <li>Analyze their score report to identify exactly where points were lost</li>
                                <li>Create a targeted improvement plan focusing on their weakest areas</li>
                                <li>Enroll them in our intensive bootcamp (typically 4-6 weeks before their next test date)</li>
                                <li>Focus on timing, pacing, and stamina—often the biggest barriers to score improvement</li>
                            </ul>
                            <p><strong>Students who enroll in bootcamps:</strong></p>
                            <ul>
                                <li>Typically have already taken the test at least once</li>
                                <li>Have strong foundational knowledge but need strategy refinement</li>
                                <li>Are looking to gain those final 2-4 points (ACT) or 50-100 points (SAT) to hit their target</li>
                                <li>Need focused work on specific sections rather than comprehensive review</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">How is the Digital SAT different from the paper SAT?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>The Digital SAT, introduced in 2024, has significant differences from the traditional paper test:</p>
                            <p><strong>Adaptive Testing:</strong><br>The Digital SAT adjusts difficulty based on your performance in the first module of each section. Perform well, and you'll see harder questions worth more points. We teach strategies to recognize and adapt to this format.</p>
                            <p><strong>Shorter Test, Less Time Per Section:</strong><br>While the overall test is shorter, sections move faster. Time management becomes even more critical.</p>
                            <p><strong>New Tools &amp; Interface:</strong></p>
                            <ul>
                                <li>Built-in graphing calculator for all math questions</li>
                                <li>Digital annotation and highlighting tools</li>
                                <li>On-screen reference sheets</li>
                                <li>Different navigation system</li>
                            </ul>
                            <p><strong>Our Digital SAT Prep Includes:</strong></p>
                            <ul>
                                <li>Technology training on the digital testing platform</li>
                                <li>Strategies for reading and annotating on screen</li>
                                <li>Time management specific to the digital format</li>
                                <li>Practice with the exact tools students will use on test day</li>
                            </ul>
                            <p><a href="/resources/changes-to-the-new-digital-sat/" style="color: #28AFCF; font-weight: 600;">Learn more about Digital SAT changes →</a></p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What's included in your Enhanced ACT Prep program?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>The Enhanced ACT refers to the updated 2025 ACT format with significant structural changes that make the test shorter and more flexible.</p>
                            <p><strong>What's New:</strong></p>
                            <ul>
                                <li><strong>Shorter test</strong> - 125 minutes (core) or 165 minutes (with optional Science) vs. 175 minutes previously</li>
                                <li><strong>Fewer questions</strong> - 131 questions without Science, 171 with Science (vs. 215 before)</li>
                                <li><strong>More time per question</strong> - 18% more time to think and reduce careless errors</li>
                                <li><strong>Optional Science section</strong> - Science is now optional, like the Writing section</li>
                                <li><strong>New Composite score</strong> - Based only on English, Math, and Reading (Science reported separately)</li>
                            </ul>
                            <p><strong>Our Enhanced ACT Prep:</strong></p>
                            <ul>
                                <li>Custom materials designed specifically for the Enhanced ACT format</li>
                                <li>Comprehensive coverage of all three core sections: English, Math, and Reading</li>
                                <li>Optional Science prep for STEM applicants or schools requiring Science scores</li>
                                <li>Strategic guidance on whether to take the Science section</li>
                                <li>Full-length practice tests in the Enhanced ACT format</li>
                                <li>Timing and pacing techniques optimized for the new structure</li>
                            </ul>
                            <p>Students who complete Algebra 2 and have strong foundational skills tend to excel on the Enhanced ACT, as math comprises only 25% of the composite score, and the reading/grammar sections align well with high school English curriculum.</p>
                            <p><a href="/whats-new-in-the-enhanced-act/" style="color: #28AFCF; font-weight: 600;">Learn more about the Enhanced ACT changes →</a></p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Do you help students choose between the SAT and ACT, or do you require them to pick one?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>We offer complete flexibility</strong> and help you make the best strategic decision.</p>
                            <p><strong>Our Process:</strong></p>
                            <ul>
                                <li><strong>Dual diagnostic testing</strong> - Students take practice tests for both SAT and ACT</li>
                                <li><strong>Performance analysis</strong> - We compare scores, section strengths, and time management across both tests</li>
                                <li><strong>Personalized recommendation</strong> - We advise which test offers the fastest path to your target score</li>
                                <li><strong>Combo prep available</strong> - Students can prepare for both simultaneously through our foundational courses</li>
                            </ul>
                            <p><strong>Our Philosophy:</strong><br>Different students have different strengths. Some excel with the ACT's fast pace and straightforward passages. Others prefer the SAT's extra time per question. <strong>Our goal is efficiency</strong>—we want your child to reach their target score in the shortest time possible so they can focus on school, extracurriculars, and enjoying their high school experience while building a strong college resume.</p>
                            <p><strong>Strategic Pivot Option:</strong><br>Many students start with ACT prep (which covers more advanced math and faster pacing) and can easily pivot to the SAT if needed. The reverse requires more effort, which is why we often recommend starting with the ACT when diagnostic scores are similar.</p>
                            <p><a href="/resources/sat-vs-act-2025-which-test-is-right-for-you/" style="color: #28AFCF; font-weight: 600;">SAT vs ACT 2025: Which test is right for you? →</a></p>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <!-- Final CTA -->
            <section class="final-cta">
                <h2 style="font-family: 'Roboto', sans-serif !important; font-size: 26px !important; font-weight: 700 !important; color: white !important; line-height: 1.3 !important; margin-bottom: 20px !important;">Ready to Achieve Your Target Score?</h2>
                <p style="font-family: 'Roboto', sans-serif !important; font-size: 18px !important; font-weight: 400 !important; color: white !important; line-height: 1.7 !important; max-width: 1200px !important; margin: 0 auto 30px auto !important;">Join the program where 96% of students improve their scores and over 80% achieve Ivy League-level results. Our expert instructors, proven strategies, and personalized approach have helped hundreds of students gain admission to their dream colleges. Start your journey with a free consultation and diagnostic assessment.</p>
                <?php echo do_shortcode('[inquiry_button]'); ?>
            </section>

            <!-- Testimonials Section -->
            <section class="section-light" style="padding: 40px 10px;">
                <div style="max-width: 1200px; margin: 0 auto;">
                    <h2 style="text-align: center; margin-bottom: 35px; color: #134958; font-size: 26px;">What Parents & Students Say</h2>
                    <div style="margin: 0 auto;">
                        <?php
                        $reviews_shortcode = get_option('nyc_stem_reviews_shortcode', '[trustindex data-widget-id=d7ccd5b21eb1294a9186eebe1e6]');
                        echo do_shortcode($reviews_shortcode);
                        ?>
                    </div>
                </div>
            </section>

            <script>
                function toggleFAQ(button) {
                    const faqCard = button.closest('.faq-card');
                    const isActive = faqCard.classList.contains('active');
                    const question = button.querySelector('.faq-question');
                    const answer = faqCard.querySelector('.faq-answer');

                    // Toggle active class
                    faqCard.classList.toggle('active');

                    // Set dynamic max-height based on content
                    if (!isActive) {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                    } else {
                        answer.style.maxHeight = '0';
                    }

                    // Update aria-expanded attribute
                    if (question) {
                        question.setAttribute('aria-expanded', isActive ? 'false' : 'true');
                    }
                }
            </script>
        </article>
    </main>
</div>

<?php
get_footer();

