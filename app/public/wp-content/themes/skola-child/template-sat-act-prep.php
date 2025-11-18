<?php
/**
 * Template Name: SAT ACT Prep - Full Width
 * Description: Custom template for SAT & ACT Test Preparation page
 */

get_header();
?>

<style>
    /* NYC STEM Club SAT/ACT Prep Styles - Version 2.2.1 - Updated Nov 9 2025 10:15 AM */
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
        font-family: 'Roboto', sans-serif !important;
        color: #134958 !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        margin-bottom: 30px;
        text-align: center;
    }

    .section-light h3 {
        color: #134958;
        font-size: 24px;
        font-weight: 600;
        line-height: 1.3;
        margin: 40px 0 15px;
    }

    /* Override for course card titles - more specific selector */
    .course-cards-section h3.course-card-title,
    .section-light .course-card-title,
    .section-light h3.course-card-title {
        font-size: 17.6px !important;
        color: #134958 !important;
        margin: 0 0 14px 0 !important;
        font-weight: 600 !important;
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
        font-size: 24px;
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

    .why-choose h2,
    .why-choose-sat-act h2 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        text-align: center !important;
        margin-bottom: 30px !important;
        color: #134958 !important;
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
        font-size: 17px;
        font-weight: 600;
        line-height: 1.3;
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
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: #134958 !important;
        text-align: center !important;
        margin-bottom: 40px !important;
    }

    /* Why Choose Section - Ensure seamless flow */
    .why-choose-sat-act {
        margin: 0 !important;
        padding-bottom: 20px !important;
    }

    /* Testimonials Section */
    .nyc-testimonials-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 40px 10px;
        margin: 0;
    }

    .nyc-testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .nyc-testimonials-title {
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: #134958 !important;
        text-align: center !important;
        margin-bottom: 40px !important;
    }

    .nyc-testimonials-content {
        margin: 0 auto;
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
        font-size: 18px;
        font-weight: 700;
        color: #134958 !important;
        margin: 0;
        flex: 1;
        font-family: 'Roboto', sans-serif;
        line-height: 1.6;
    }

    /* Override any theme h3 styles in FAQ */
    .faq-card h3,
    .faq-header h3,
    h3.faq-question {
        color: #134958 !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        line-height: 1.6 !important;
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

    /* Comparison Cards Grid */
    .comparison-cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    /* Final CTA */
    .final-cta {
        background: linear-gradient(135deg, #28AFCF 0%, #134958 100%);
        color: white;
        padding: 50px 10px;
        text-align: center;
    }

    .final-cta h2 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        margin-bottom: 25px !important;
        color: white !important;
        text-align: center !important;
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
    @media (max-width: 992px) {
        .comparison-cards-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }

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

        .comparison-cards-grid {
            grid-template-columns: 1fr;
            gap: 15px;
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
                            <a href="#SATACTPrograms" class="cta-button cta-primary" style="background-color: #FF9574; color: #FFFFFF; padding: 12px 24px; border-radius: 3px; font-family: 'Roboto', sans-serif !important; font-size: 18px !important; font-weight: 700 !important; line-height: 1.8 !important; min-width: 180px !important; width: auto !important; display: inline-block !important; text-align: center !important; text-decoration: none; transition: all .3s;">Jump to Courses</a>
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
                    <h2 style="font-family: 'Roboto', sans-serif !important; font-size: 32px !important; font-weight: 700 !important; line-height: 1.3 !important; text-align: center !important; color: #134958 !important; margin-bottom: 20px !important;">Your Path to Success: A Strategic 3-Step Process</h2>
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
                        <p style="margin-bottom: 8px; font-family: 'Roboto', sans-serif !important; font-size: 18px !important; font-weight: 400; line-height: 1.7; color: #333;">Both tests are widely accepted by colleges, but they have distinct differences:</p>
                        <ul style="margin-left: 20px; margin-bottom: 20px; font-family: 'Roboto', sans-serif !important; font-size: 18px !important; line-height: 1.7; color: #333;">
                            <li style="margin-bottom: 10px; font-weight: 400; font-size: 18px !important;"><strong style="font-weight: 600;">ACT:</strong> More straightforward with direct reading passages and consistent scoring</li>
                            <li style="margin-bottom: 10px; font-weight: 400; font-size: 18px !important;"><strong style="font-weight: 600;">SAT:</strong> Provides more time per question but can have more ambiguous passages and answer choices</li>
                        </ul>

                        <p style="margin-bottom: 15px; font-family: 'Roboto', sans-serif !important; font-size: 18px !important; font-weight: 400; line-height: 1.7; color: #333;"><span style="color: #FF7F07; font-weight: 600;">Our recommendation process:</span> After your child takes diagnostic tests for both exams, we analyze performance and recommend the test where they'll reach their target score most efficiently. If performance is similar on both, we generally recommend starting with ACT prep because:</p>
                        <ul style="margin-left: 30px; margin-bottom: 25px; list-style: none; padding-left: 0; font-family: 'Roboto', sans-serif !important; font-size: 18px !important; line-height: 1.7; color: #333;">
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative; font-weight: 400; font-size: 18px !important;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 18px; font-weight: 700; line-height: 1;">▸</span> ACT math covers more advanced topics (geometry, trigonometry), so mastering it makes switching to SAT easier</li>
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative; font-weight: 400; font-size: 18px !important;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 18px; font-weight: 700; line-height: 1;">▸</span> The ACT has historically had more consistent scoring curves</li>
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative; font-weight: 400; font-size: 18px !important;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 18px; font-weight: 700; line-height: 1;">▸</span> Reading passages are more straightforward</li>
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
                    <div class="comparison-cards-grid" style="margin-bottom: 32px;">

                        <!-- SOPHOMORE CARD -->
                        <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08); border: 3px solid #28AFCF; display: flex; flex-direction: column; transition: transform 0.3s;">
                            <div style="background: linear-gradient(135deg, #28AFCF 0%, #1d9bb8 100%); padding: 10px 14px; text-align: center;">
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 600; margin-bottom: 2px; color: #134958 !important; line-height: 1.3;">Sophomore Year</h3>
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
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 600; margin-bottom: 2px; color: #134958 !important; line-height: 1.3;">Junior Year</h3>
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
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 600; margin-bottom: 2px; color: #134958 !important; line-height: 1.3;">Senior Year</h3>
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

            <!-- Final CTA -->
            <section class="final-cta">
                <h2 style="font-family: 'Roboto', sans-serif !important; font-size: 32px !important; font-weight: 700 !important; color: white !important; line-height: 1.3 !important; margin-bottom: 20px !important;">Ready to Achieve Your Target Score?</h2>
                <p style="font-family: 'Roboto', sans-serif !important; font-size: 18px !important; font-weight: 400 !important; color: white !important; line-height: 1.7 !important; max-width: 1200px !important; margin: 0 auto 30px auto !important;">Join the program where 96% of students improve their scores and over 80% achieve Ivy League-level results. Our expert instructors, proven strategies, and personalized approach have helped hundreds of students gain admission to their dream colleges. Start your journey with a free consultation and diagnostic assessment.</p>
                <?php echo do_shortcode('[inquiry_button]'); ?>
                <h3 style="font-family: 'Roboto', sans-serif !important; font-size: 20px !important; font-weight: 600 !important; color: white !important; line-height: 1.3 !important; margin-top: 30px !important; margin-bottom: 0 !important;">Still have questions? <a href="/resources/sat-act-frequently-asked-questions/" style="color: #FF9574; text-decoration: none; font-weight: 600;">View All SAT & ACT FAQs</a></h3>
            </section>

            <!-- Why Choose NYC STEM Club - Reusable Shortcode -->
            <?php echo do_shortcode('[why_choose_sat_act]'); ?><?php echo do_shortcode('[testimonials]'); ?>

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

