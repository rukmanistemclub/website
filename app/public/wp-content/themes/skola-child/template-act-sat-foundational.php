<?php
/**
 * Template Name: ACT-SAT Foundational Course - Full Width
 * Description: Custom template for ACT-SAT Foundational Course page
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
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Hero Section - Course Style */
    .course-hero {
        min-height: 40vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #134958 0%, #1a5f73 50%, #28AFCF 100%);
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
        padding: 50px 40px;
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
        font-size: 19px;
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
        font-size: 11px;
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
            font-size: 17px;
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
        background: #e8f5f7;
        padding: 30px 20px;
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
    .content-section {
        max-width: 1200px;  /* Matches hero section width */
        margin: 0 auto;
        padding: 40px 0;  /* Removed horizontal padding - cards handle their own */
    }

    .content-section h2 {
        color: #134958;
        font-size: 2rem;
        margin-bottom: 30px;
        text-align: center;
    }

    .content-section h3 {
        color: #28AFCF;
        font-size: 1.3rem;
        margin: 40px 0 15px;
    }

    .content-section p {
        margin-bottom: 20px;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    .content-section ul {
        margin-left: 20px;
        margin-bottom: 25px;
    }

    .content-section li {
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
    }

    /* Content cards */
    .content-card {
        background: white;
        padding: 30px 20px;  /* Match hero's horizontal padding */
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        margin-bottom: 20px;
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
    }

    .step-number-large {
        background: linear-gradient(135deg, #28AFCF, #134958);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .step-content {
        flex: 1;
    }

    .step-content h3 {
        font-size: 1.4em;
        font-weight: 600;
        color: #134958;
        margin: 0 0 15px;
    }

    .step-content p {
        margin-bottom: 15px;
        line-height: 1.7;
    }

    .format-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 35px;
        margin: 30px 0 0;
        max-width: 100%;
    }

    .format-card {
        background: white;
        border-radius: 8px;
        padding: 25px 15px 25px 20px;  /* Less left padding, content more flush */
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
        font-size: 1.3em;
        font-weight: 600;
        color: #28AFCF;
        margin-bottom: 15px;
    }

    .format-card .badge {
        display: inline-block;
        background: #F0B268;
        color: white;
        padding: 4px 12px;
        border-radius: 4px;
        font-size: 0.85em;
        margin-left: 10px;
        font-weight: 500;
    }

    .format-card > p {
        margin-left: 0;  /* Paragraph flush to left */
    }

    .format-card ul {
        margin: 15px 0;
        padding-left: 18px;  /* Reduced indentation for bullets */
    }

    .format-card li {
        margin-bottom: 8px;
        line-height: 1.6;
        padding-left: 2px;  /* Minimal extra spacing */
    }

    .best-for {
        background: #f0f8ff;
        border-left: 3px solid #28AFCF;
        padding: 12px 12px;  /* Reduced left padding */
        margin-top: 15px;
        margin-left: 0;  /* Flush to card edge */
        margin-right: 0;  /* Flush to card edge */
        font-size: 0.95em;
    }

    .best-for strong {
        color: #134958;
    }

    /* Why Choose Us */
    .why-choose {
        background: white;
        padding: 40px 20px;
    }

    .why-choose h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #134958;
        font-size: 2rem;
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
        font-size: 1.1rem;
    }

    .benefit-content p {
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }

    /* FAQ Section */
    .faq-section {
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .faq-section h2 {
        text-align: center;
        margin-bottom: 35px;
        color: #134958;
        font-size: 2rem;
    }

    .faq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin: 1.5rem 0;
    }

    .faq-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .faq-card:hover {
        border-color: #28AFCF;
    }

    .faq-header {
        width: 100%;
        padding: 1.5rem;
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: left;
        transition: background 0.3s ease;
        font-family: inherit;
    }

    .faq-header:hover {
        background: #f8fafc;
    }

    .faq-question {
        font-size: 1.1rem;
        font-weight: 600;
        color: #134958;
        margin: 0;
        flex: 1;
    }

    .faq-icon {
        flex-shrink: 0;
        margin-left: 1rem;
        color: #64748b;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
    }

    .faq-card.active .faq-icon {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-answer p {
        padding: 0 1.5rem;
        color: #64748b;
        line-height: 1.7;
        margin: 0 0 0.75rem 0;
    }

    .faq-answer p + p {
        padding-top: 0;
    }

    .faq-answer ul {
        padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        margin: 0 0 0.75rem 2rem;
        color: #64748b;
        line-height: 1.7;
        list-style: none;
    }

    .faq-answer ul li {
        margin-bottom: 0.5rem;
        padding-left: 1.5rem;
        position: relative;
    }

    .faq-answer ul li::before {
        content: "›";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-size: 1.4em;
        font-weight: 700;
        line-height: 1;
    }

    .faq-card.active .faq-answer {
        max-height: 1000px;
    }

    /* Final CTA */
    .final-cta {
        background: linear-gradient(135deg, #28AFCF 0%, #134958 100%);
        color: white;
        padding: 50px 20px;
        text-align: center;
    }

    .final-cta h2 {
        font-size: 2.3rem;
        margin-bottom: 25px;
        color: white;
    }

    .final-cta p {
        font-size: 1.15rem;
        margin-bottom: 35px;
        max-width: 800px;
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
            <section class="section-light">
                <div class="content-section">
                    <h2>Your Path to Success: A Strategic 3-Step Process</h2>
                    <p style="text-align: center; max-width: 900px; margin: 0 auto 35px; line-height: 1.8; font-size: 1.05rem;">Achieving your target score isn't just about studying harder—it's about choosing the right test, the right format, and the right timeline. Here's how we guide you through each decision:</p>

                    <div class="content-card">
                        <h3 style="color: #28AFCF; margin-bottom: 15px; display: flex; align-items: center; gap: 15px;">
                            <span style="background: #28AFCF; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0;">1</span>
                            Diagnostic Testing & Choosing Your Test
                        </h3>
                        <p style="margin-bottom: 20px;">We start with comprehensive diagnostic assessments for both SAT and ACT. This identifies your strengths, determines which test suits you best, and sets realistic score goals.</p>

                        <h4 style="color: #134958; font-size: 1.15rem; margin: 30px 0 15px;">Understanding the Recent Changes (2025)</h4>
                        <p style="margin-bottom: 20px;">Both tests have undergone significant changes. The SAT is now fully digital and adaptive, while the ACT introduced an "Enhanced" format. Here's what you need to know:</p>

                        <div style="overflow-x: auto; margin: 25px 0;">
                            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                                <thead>
                                    <tr style="background: #134958; color: white;">
                                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Feature</th>
                                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Digital SAT</th>
                                        <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Enhanced ACT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Format</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Fully digital, adaptive</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Paper or digital, non-adaptive</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Total Time</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">2hr 14min</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">2hr 5min (without science)</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Questions</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">98 total</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">131 total (without science)</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Reading Passages</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Short (1 question each)</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Long (multiple questions)</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Math Weight</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">50% of score</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">25% of score</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Science Section</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">No science section</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Optional (some colleges require)</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Difficulty</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Module 2 harder if you do well</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">Consistent throughout</td>
                                    </tr>
                                    <tr style="background: #f8f9fa;">
                                        <td style="padding: 10px; border: 1px solid #ddd;"><strong>Score Stability</strong></td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">More stable</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">More volatile (fewer questions)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 style="color: #134958; font-size: 1.15rem; margin: 30px 0 15px; font-weight: 700;"><strong>Which Test Should You Take?</strong></h4>
                        <p style="margin-bottom: 15px;">Both tests are widely accepted by colleges, but they have distinct differences:</p>
                        <ul style="margin-left: 20px; margin-bottom: 20px;">
                            <li style="margin-bottom: 10px;"><strong>ACT:</strong> More straightforward with direct reading passages and consistent scoring</li>
                            <li style="margin-bottom: 10px;"><strong>SAT:</strong> Provides more time per question but can have more ambiguous passages and answer choices</li>
                        </ul>

                        <p style="margin-bottom: 15px;"><span style="color: #FF7F07; font-weight: 700; font-size: 1.05rem;">Our recommendation process:</span> After your child takes diagnostic tests for both exams, we analyze performance and recommend the test where they'll reach their target score most efficiently. If performance is similar on both, we generally recommend starting with ACT prep because:</p>
                        <ul style="margin-left: 30px; margin-bottom: 25px; list-style: none; padding-left: 0;">
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 1.2em; font-weight: 700;">›</span> ACT math covers more advanced topics (geometry, trigonometry), so mastering it makes switching to SAT easier</li>
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 1.2em; font-weight: 700;">›</span> The ACT has historically had more consistent scoring curves</li>
                            <li style="margin-bottom: 10px; padding-left: 25px; position: relative;"><span style="position: absolute; left: 0; color: #28AFCF; font-size: 1.2em; font-weight: 700;">›</span> Reading passages are more straightforward</li>
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
                    <div class="step-container">
                        <div class="step-number-large">2</div>
                        <div class="step-content">
                            <h3>Choose Your Learning Format</h3>
                            <p>Once we've identified your best test, we'll help you choose the learning format that matches your goals, timeline, and learning style:</p>

                            <div class="format-cards">
                                <div class="format-card">
                                    <h4>Group Classes <span class="badge">Most Popular</span></h4>
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
                                    <h4>Private 1-on-1 Tutoring</h4>
                                    <p>Personalized sessions provide:</p>
                                    <ul>
                                        <li>Flexible scheduling around your commitments</li>
                                        <li>Customized focus on your specific weak areas</li>
                                        <li>Accelerated pacing for advanced students</li>
                                        <li>Intensive support for foundational gaps</li>
                                    </ul>
                                    <div class="best-for">
                                        <strong>Best for:</strong> Students needing targeted help (either catching up or fine-tuning high scores)
                                    </div>
                                </div>

                                <div class="format-card">
                                    <h4>Hybrid Approach</h4>
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
                    </div>
                </div>
            </section>

            <!-- Step 3: Choose Your Path -->
            <section class="section-light">
                <div class="content-section">
                    <h2 style="display: flex; align-items: center; justify-content: center; gap: 15px;">
                        <span style="background: #28AFCF; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0;">3</span>
                        Choose Your Path
                    </h2>

                    <p class="lead" style="text-align: center; font-size: 1.15rem; line-height: 1.8; color: #555; margin: 0 auto 20px; max-width: 900px;">Transform Your Test Scores with NYC's Most Effective College Entrance Exam Prep</p>

                    <p style="text-align: center; max-width: 900px; margin: 0 auto 30px; line-height: 1.8;">At NYC STEM Club, we understand that achieving your target SAT or ACT score isn't just about knowing the content—it's about mastering test-taking strategies, building stamina, and learning to perform under pressure. Our comprehensive program has helped over 500 students achieve Ivy League-level scores, with <strong>96% seeing significant improvements</strong> and over <strong>80% reaching 1500+ on the SAT or 34+ on the ACT.</strong></p>

                <!-- Decision Tree Infographic -->
                <div style="max-width: 1000px; margin: 0 auto 60px;">

                    <!-- Start Node -->
                    <div style="text-align: center; margin-bottom: 20px;">
                        <div style="background: linear-gradient(135deg, #28AFCF, #134958); color: white; padding: 15px 35px; border-radius: 50px; display: inline-block; font-size: 1.1rem; font-weight: 700; box-shadow: 0 4px 15px rgba(40, 175, 207, 0.3);">
                            What Grade Are You In?
                        </div>
                    </div>

                    <!-- Branching Arrows -->
                    <div style="display: flex; justify-content: center; gap: 100px; margin-bottom: 30px;">
                        <div style="text-align: center; width: 2px; height: 40px; background: #28AFCF;"></div>
                        <div style="text-align: center; width: 2px; height: 40px; background: #FF7F07;"></div>
                    </div>

                    <!-- Two Main Branches -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 50px; align-items: stretch;">

                        <!-- SOPHOMORE PATH -->
                        <div style="text-align: center; display: flex; flex-direction: column;">
                            <div style="background: #28AFCF; color: white; padding: 20px; border-radius: 15px 15px 0 0; font-size: 1.4rem; font-weight: 700;">
                                SOPHOMORE
                            </div>
                            <div style="background: #f0f9fc; border: 3px solid #28AFCF; border-top: none; border-radius: 0 0 15px 15px; padding: 25px; flex: 1; display: flex; flex-direction: column;">
                                <div style="background: white; padding: 15px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                    <strong style="color: #134958; display: block; margin-bottom: 5px; font-size: 1.1rem;">Foundational Program</strong>
                                    <p style="margin: 5px 0;">January - June (5-6 months)</p>
                                </div>

                                <div style="text-align: left; line-height: 1.8;">
                                    <strong style="color: #28AFCF;">Suggested Timeline:</strong><br>
                                    1. <strong>June</strong> - First attempt<br>
                                    2. <strong>July</strong> - Bootcamp + ACT*<br>
                                    &nbsp;&nbsp;&nbsp;OR <strong>August</strong> - SAT attempt<br>
                                    3. <strong>Sept/Oct</strong> - Final attempt if needed<br><br>

                                    <div style="color: #666; margin-bottom: 15px; font-size: 0.9rem;">
                                        *July ACT not offered in NY. Students can test in nearby states (NJ, CT).
                                    </div>

                                    <div style="background: #F0B268; color: #134958; padding: 15px; border-radius: 8px; font-weight: 600;">
                                        Added Benefit: Students also see improvement in their school math courses!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JUNIOR PATH -->
                        <div style="text-align: center; display: flex; flex-direction: column;">
                            <div style="background: #FF7F07; color: white; padding: 20px; border-radius: 15px 15px 0 0; font-size: 1.4rem; font-weight: 700;">
                                JUNIOR
                            </div>
                            <div style="background: #fff8f0; border: 3px solid #FF7F07; border-top: none; border-radius: 0 0 15px 15px; padding: 25px; flex: 1; display: flex; flex-direction: column;">

                                <!-- Junior Decision Point -->
                                <div style="background: white; padding: 15px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                    <strong style="color: #134958;">Do you have foundational gaps?</strong><br>
                                    <span style="font-size: 0.9rem; color: #666;">(200+ pts below SAT goal or 6-9 pts below ACT goal, OR taking Algebra 2 now)</span>
                                </div>

                                <!-- Two options -->
                                <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                    <div style="flex: 1; text-align: center;">
                                        <div style="background: #4CAF50; color: white; padding: 8px; border-radius: 8px 8px 0 0; font-weight: 700;">YES</div>
                                        <div style="background: white; border: 2px solid #4CAF50; border-top: none; padding: 15px; border-radius: 0 0 8px 8px;">
                                            <strong>Foundational</strong><br>
                                            Jan-June<br>
                                            (5-6 months)
                                        </div>
                                    </div>
                                    <div style="flex: 1; text-align: center;">
                                        <div style="background: #2196F3; color: white; padding: 8px; border-radius: 8px 8px 0 0; font-weight: 700;">NO</div>
                                        <div style="background: white; border: 2px solid #2196F3; border-top: none; padding: 15px; border-radius: 0 0 8px 8px;">
                                            <strong>Bootcamp</strong><br>
                                            Year-round<br>
                                            (6-8 weeks)
                                        </div>
                                    </div>
                                </div>

                                <div style="text-align: left; line-height: 1.8;">
                                    <strong style="color: #FF7F07;">Suggested Timeline:</strong><br>
                                    1. <strong>June</strong> - First attempt<br>
                                    2. <strong>July/Aug</strong> - Second attempt<br>
                                    3. <strong>Early Fall</strong> - Final before apps<br><br>

                                    <div style="background: #fff3e6; padding: 15px; border-radius: 8px; border-left: 3px solid #FF7F07;">
                                        After fall, focus on applications.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Browse All SAT/ACT Courses -->
                    <div class="course-cards-section">
                        <h3>SAT & ACT Test Prep Programs</h3>

                        <div class="course-card-grid">
                            <?php
                            // Get all SAT/ACT courses (excluding SHSAT)
                            $sat_act_courses = get_posts([
                                'post_type' => 'course',
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                                'orderby' => 'title',
                                'order' => 'ASC'
                            ]);

                            foreach ($sat_act_courses as $course) {
                                $title_lower = strtolower($course->post_title);

                                // Only include courses that have SAT or ACT but NOT SHSAT or ISEE
                                if ((strpos($title_lower, 'sat') !== false || strpos($title_lower, 'act') !== false) &&
                                    strpos($title_lower, 'shsat') === false &&
                                    strpos($title_lower, 'isee') === false) {

                                    $course_url = get_permalink($course->ID);
                                    $excerpt = get_field('short_description', $course->ID);
                                    if (!$excerpt) {
                                        $excerpt = wp_trim_words(get_the_excerpt($course->ID), 20, '...');
                                    }

                                    // Get duration and format from ACF fields, with fallbacks
                                    $duration = get_field('duration', $course->ID);
                                    $format = get_field('format', $course->ID);

                                    // Fallback durations based on course title if not set
                                    if (!$duration) {
                                        if (strpos($title_lower, 'summer') !== false) {
                                            $duration = '3 Weeks';
                                        } elseif (strpos($title_lower, 'year-round') !== false) {
                                            $duration = '4-8 Weeks';
                                        } elseif (strpos($title_lower, 'foundational') !== false) {
                                            $duration = 'Full Year';
                                        }
                                    }

                                    // Fallback format if not set
                                    if (!$format) {
                                        $format = 'Group';
                                    }

                                    // Determine course type for styling
                                    $is_bootcamp = strpos($title_lower, 'boot camp') !== false || strpos($title_lower, 'bootcamp') !== false;
                                    $is_foundational = strpos($title_lower, 'foundational') !== false;

                                    // Set card color class and button class
                                    if ($is_bootcamp) {
                                        $card_class = strpos($title_lower, 'year-round') !== false ? 'card-orange' : 'card-blue';
                                        $btn_class = strpos($title_lower, 'year-round') !== false ? 'btn-orange' : 'btn-blue';
                                    } elseif ($is_foundational) {
                                        $card_class = 'card-tan';
                                        $btn_class = 'btn-tan';
                                    } else {
                                        $card_class = 'card-blue';
                                        $btn_class = 'btn-blue';
                                    }
                                    ?>
                                    <div class="course-card <?php echo $card_class; ?>">
                                        <h3 class="course-card-title"><?php echo esc_html($course->post_title); ?></h3>

                                        <div class="course-card-meta">
                                            <?php if ($duration): ?>
                                                <span class="meta-badge">
                                                    <span class="meta-icon">⏱️</span>
                                                    <?php echo esc_html($duration); ?>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ($format): ?>
                                                <span class="meta-badge">
                                                    <span class="meta-icon">👥</span>
                                                    <?php echo esc_html($format); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($excerpt): ?>
                                            <p class="course-card-description">
                                                <?php echo esc_html($excerpt); ?>
                                            </p>
                                        <?php endif; ?>

                                        <a href="<?php echo esc_url($course_url); ?>" class="course-card-button <?php echo $btn_class; ?>">
                                            Learn More →
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <!-- Why Choose Us -->
            <section class="why-choose">
                <h2>Why Choose NYC STEM Club for SAT/ACT Prep?</h2>
                <div class="why-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                            </svg>
                        </div>
                        <div class="benefit-content">
                            <h3>Proven Results</h3>
                            <p>96% of our students improve their scores. Average improvements: 6-9 points ACT, 100+ points SAT.</p>
                        </div>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12M12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/>
                            </svg>
                        </div>
                        <div class="benefit-content">
                            <h3>Expert Instructors</h3>
                            <p>15+ years of experience teaching test strategy and building confidence.</p>
                        </div>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9 11H7V9H9M13 11H11V9H13M17 11H15V9H17M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M19 19H5V8H19V19Z"/>
                            </svg>
                        </div>
                        <div class="benefit-content">
                            <h3>Personalized Approach</h3>
                            <p>We assess both SAT and ACT to determine your best fit, then customize your study plan.</p>
                        </div>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2M12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20M7 13H9V15H11V13H13V11H11V9H9V11H7V13Z"/>
                            </svg>
                        </div>
                        <div class="benefit-content">
                            <h3>Flexible Formats</h3>
                            <p>Private 1-on-1, small groups, online, or in-person at our Manhattan location.</p>
                        </div>
                    </div>
                </div>
            </section>

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
                <h2>Ready to Achieve Your Target Score?</h2>
                <p>Join the program where 96% of students improve their scores and over 80% achieve Ivy League-level results. Our expert instructors, proven strategies, and personalized approach have helped hundreds of students gain admission to their dream colleges. Start your journey with a free consultation and diagnostic assessment.</p>
                <?php echo do_shortcode('[inquiry_button]'); ?>
            </section>

            <!-- Testimonials Section -->
            <section class="section-light" style="padding: 40px 20px;">
                <div style="max-width: 1200px; margin: 0 auto;">
                    <h2 style="text-align: center; margin-bottom: 35px; color: #134958; font-size: 2rem;">What Parents & Students Say</h2>
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

                    // Toggle active class
                    faqCard.classList.toggle('active');

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

