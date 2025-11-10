<?php
/**
 * Template Name: ISEE Test Preparation - Full Width
 * Description: Custom template for ISEE Test Preparation page with comprehensive content
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
        background: #f8f9fa !important;
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
        background: #f8f9fa;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    /* Hero Section with Gradient */
    .hero-section {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        padding: 80px 40px;
        margin: -40px -20px 60px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '🏫';
        position: absolute;
        font-size: 300px;
        opacity: 0.05;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .hero-section h1 {
        font-size: 56px;
        font-weight: 700;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
        color: white;
    }

    .hero-subtitle {
        font-size: 22px;
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto 30px;
        position: relative;
        z-index: 1;
    }

    .test-comparison-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 12px 24px;
        border-radius: 30px;
        font-size: 15px;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .test-comparison-badge a {
        color: white;
        text-decoration: none;
        font-weight: 700;
    }

    /* Quick Navigation Pills */
    .quick-nav {
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 60px;
    }

    .nav-pill {
        padding: 14px 28px;
        background: white;
        border: 2px solid #28AFCF;
        border-radius: 30px;
        color: #134958;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .nav-pill:hover {
        background: #28AFCF;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40, 175, 207, 0.3);
    }

    /* Overview Section - Bordered Style */
    .overview-section {
        background: white;
        border: 3px solid #28AFCF;
        border-radius: 16px;
        padding: 40px;
        margin-bottom: 60px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }

    .section-icon {
        font-size: 48px;
    }

    .section-title {
        font-size: 32px;
        font-weight: 700;
        color: #134958;
        line-height: 1.3;
    }

    .overview-content p {
        margin-bottom: 16px;
        font-size: 18px;
        line-height: 1.8;
    }

    .overview-content strong {
        color: #134958;
    }

    .highlight-box {
        background: linear-gradient(135deg, #ecfeff, #cffafe);
        border-left: 4px solid #28AFCF;
        padding: 20px 24px;
        margin: 24px 0;
        border-radius: 8px;
    }

    .highlight-box p {
        margin: 0;
        color: #0e7490;
        font-weight: 700;
    }

    /* Middle School Timing Alert */
    .timing-alert {
        background: linear-gradient(135deg, #fff7ed, #fed7aa);
        border: 2px solid #FF7F07;
        border-radius: 12px;
        padding: 24px 28px;
        margin: 30px 0;
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .timing-alert-icon {
        font-size: 32px;
        flex-shrink: 0;
    }

    .timing-alert-content h4 {
        font-size: 20px;
        color: #134958;
        margin-bottom: 8px;
    }

    .timing-alert-content p {
        margin: 0;
        color: #c2410c;
        font-weight: 600;
    }

    /* Three Levels Grid - Card Style */
    .levels-section {
        margin-bottom: 60px;
    }

    .levels-intro {
        text-align: center;
        margin-bottom: 50px;
    }

    .levels-intro h2 {
        font-size: 42px;
        color: #134958;
        margin-bottom: 16px;
    }

    .levels-intro p {
        font-size: 20px;
        color: #666;
        max-width: 800px;
        margin: 0 auto;
    }

    .levels-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .level-card {
        background: white;
        border-radius: 16px;
        padding: 0;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .level-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.15);
    }

    .level-header {
        background: linear-gradient(135deg, #28AFCF, #5DD3F0);
        padding: 32px 28px;
        text-align: center;
        color: white;
    }

    .level-card:nth-child(2) .level-header {
        background: linear-gradient(135deg, #FF7F07, #FFB84D);
    }

    .level-card:nth-child(3) .level-header {
        background: linear-gradient(135deg, #134958, #28AFCF);
    }

    .level-badge {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        margin-bottom: 8px;
        opacity: 0.9;
    }

    .level-name {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .level-grades {
        font-size: 16px;
        opacity: 0.95;
    }

    .level-body {
        padding: 32px 28px;
    }

    .level-description {
        color: #555;
        margin-bottom: 24px;
        line-height: 1.7;
    }

    .level-details h4 {
        font-size: 18px;
        color: #134958;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .level-details ul {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .level-details li {
        padding: 8px 0 8px 28px;
        position: relative;
        color: #555;
        border-bottom: 1px solid #f0f0f0;
    }

    .level-details li:last-child {
        border-bottom: none;
    }

    .level-details li::before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    .level-cta {
        text-align: center;
        padding-top: 20px;
        border-top: 2px solid #f0f0f0;
    }

    .level-cta-btn {
        display: inline-block;
        padding: 12px 28px;
        background: #28AFCF;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .level-cta-btn:hover {
        background: #1f8ba8;
        transform: translateY(-2px);
    }

    /* Test Sections Comparison - Alternating Layout */
    .test-sections {
        margin-bottom: 60px;
    }

    .comparison-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .comparison-header h2 {
        font-size: 38px;
        color: #134958;
        margin-bottom: 12px;
    }

    .section-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 40px;
        align-items: center;
    }

    .section-row:nth-child(even) {
        direction: rtl;
    }

    .section-row:nth-child(even) > * {
        direction: ltr;
    }

    .section-visual {
        background: white;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        text-align: center;
    }

    .section-visual-icon {
        font-size: 80px;
        margin-bottom: 16px;
    }

    .section-visual-label {
        font-size: 24px;
        font-weight: 700;
        color: #134958;
    }

    .section-content {
        background: white;
        padding: 32px;
        border-radius: 16px;
        border-left: 4px solid #28AFCF;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .section-content h3 {
        font-size: 26px;
        color: #134958;
        margin-bottom: 16px;
    }

    .section-content p {
        color: #555;
        margin-bottom: 12px;
        line-height: 1.7;
    }

    .section-meta {
        display: flex;
        gap: 20px;
        margin-top: 16px;
        flex-wrap: wrap;
    }

    .meta-item {
        background: #f8f9fa;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        color: #134958;
    }

    .meta-item strong {
        color: #28AFCF;
    }

    /* Preparation Timeline - Numbered Steps */
    .timeline-section {
        background: white;
        border-radius: 16px;
        padding: 50px 40px;
        margin-bottom: 60px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }

    .timeline-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .timeline-header h2 {
        font-size: 38px;
        color: #134958;
        margin-bottom: 16px;
    }

    .timeline-header p {
        font-size: 18px;
        color: #666;
    }

    .timeline-steps {
        position: relative;
        padding-left: 80px;
    }

    .timeline-steps::before {
        content: '';
        position: absolute;
        left: 40px;
        top: 30px;
        bottom: 30px;
        width: 4px;
        background: linear-gradient(180deg, #28AFCF 0%, #5DD3F0 100%);
    }

    .timeline-step {
        position: relative;
        margin-bottom: 40px;
        background: #f8f9fa;
        padding: 28px 32px;
        border-radius: 12px;
        border: 2px solid #e5e7eb;
    }

    .timeline-step:hover {
        border-color: #28AFCF;
        background: white;
    }

    .step-number {
        position: absolute;
        left: -68px;
        top: 20px;
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #28AFCF, #5DD3F0);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(40, 175, 207, 0.3);
        border: 4px solid white;
    }

    .step-timing {
        background: linear-gradient(135deg, #ecfeff, #cffafe);
        color: #0891b2;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 700;
        display: inline-block;
        margin-bottom: 12px;
    }

    .step-title {
        font-size: 22px;
        color: #134958;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .step-content {
        color: #555;
        line-height: 1.7;
    }

    /* Why NYC STEM Club - Magazine Style */
    .why-section {
        margin-bottom: 60px;
    }

    .why-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .why-header h2 {
        font-size: 38px;
        color: #134958;
        margin-bottom: 16px;
    }

    .why-features {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }

    .feature-item {
        background: white;
        padding: 32px;
        border-radius: 12px;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        border-color: #28AFCF;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        transform: translateY(-4px);
    }

    .feature-icon {
        font-size: 48px;
        margin-bottom: 16px;
    }

    .feature-title {
        font-size: 22px;
        color: #134958;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .feature-description {
        color: #555;
        line-height: 1.7;
    }

    /* Related Tests - Card Grid */
    .related-tests {
        background: linear-gradient(135deg, #f8f9fa, #e5e7eb);
        padding: 60px 40px;
        margin: 60px -20px 0;
        border-radius: 16px 16px 0 0;
    }

    .related-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .related-header h2 {
        font-size: 36px;
        color: #134958;
        margin-bottom: 12px;
    }

    .related-header p {
        font-size: 18px;
        color: #666;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .related-card {
        background: white;
        border-radius: 12px;
        padding: 28px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
    }

    .related-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }

    .related-icon {
        font-size: 56px;
        margin-bottom: 16px;
    }

    .related-name {
        font-size: 24px;
        font-weight: 700;
        color: #134958;
        margin-bottom: 8px;
    }

    .related-description {
        font-size: 15px;
        color: #666;
        margin-bottom: 16px;
    }

    .related-arrow {
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #134958, #28AFCF);
        color: white;
        text-align: center;
        padding: 60px 40px;
        border-radius: 16px;
        margin-bottom: 60px;
    }

    .cta-section h2 {
        font-size: 40px;
        margin-bottom: 16px;
    }

    .cta-section p {
        font-size: 20px;
        margin-bottom: 32px;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-button {
        display: inline-block;
        padding: 18px 48px;
        background: #FF7F07;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 20px;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(255, 127, 7, 0.3);
    }

    .cta-button:hover {
        background: #e67006;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 127, 7, 0.4);
    }

    /* Testimonials Section */
    .nyc-testimonials-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 80px 20px;
        margin: 0 -20px -40px;
        border-radius: 16px 16px 0 0;
    }

    .nyc-testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .nyc-testimonials-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #134958;
        text-align: center;
        margin-bottom: 40px;
    }

    .nyc-testimonials-content {
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .section-row {
            grid-template-columns: 1fr;
        }

        .section-row:nth-child(even) {
            direction: ltr;
        }

        .why-features {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 60px 20px;
        }

        .hero-section h1 {
            font-size: 38px;
        }

        .hero-subtitle {
            font-size: 18px;
        }

        .levels-grid {
            grid-template-columns: 1fr;
        }

        .timeline-steps {
            padding-left: 0;
        }

        .timeline-steps::before {
            display: none;
        }

        .step-number {
            position: static;
            margin-bottom: 16px;
        }

        .related-grid {
            grid-template-columns: 1fr;
        }

        .quick-nav {
            flex-direction: column;
        }

        .nav-pill {
            width: 100%;
            text-align: center;
        }

        .nyc-testimonials-section {
            padding: 60px 20px;
        }

        .nyc-testimonials-title {
            font-size: 2rem;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <div class="container">
                <!-- Hero Section -->
                <div class="hero-section">
                    <h1>ISEE Test Preparation</h1>
                    <p class="hero-subtitle">Comprehensive preparation for the Independent School Entrance Examination across all three testing levels</p>
                    <div class="test-comparison-badge">
                        Comparing tests? See our <a href="/ssat-prep/">SSAT Guide</a>
                    </div>
                </div>

                <!-- Quick Navigation -->
                <div class="quick-nav">
                    <a href="#overview" class="nav-pill">📚 Overview</a>
                    <a href="#levels" class="nav-pill">🎯 Three Levels</a>
                    <a href="#sections" class="nav-pill">📝 Test Sections</a>
                    <a href="#timeline" class="nav-pill">⏰ When to Start</a>
                    <a href="#why-us" class="nav-pill">⭐ Why Us</a>
                </div>

                <!-- Overview Section -->
                <div id="overview" class="overview-section">
                    <div class="section-header">
                        <span class="section-icon">🏫</span>
                        <h2 class="section-title">What is the ISEE?</h2>
                    </div>
                    <div class="overview-content">
                        <p>The <strong>Independent School Entrance Examination (ISEE)</strong> is a standardized test used by private and independent schools across the United States and internationally as part of their admissions process.</p>

                        <p>Developed and administered by the Educational Records Bureau (ERB), the ISEE evaluates students' capabilities in <strong>verbal reasoning, quantitative reasoning, reading comprehension, mathematics achievement, and essay writing</strong>.</p>

                        <div class="highlight-box">
                            <p>💡 The ISEE is specifically designed to assess a student's readiness for independent school education and is accepted by over 1,200 schools worldwide.</p>
                        </div>

                        <p><strong>Target Score Range:</strong> Competitive independent schools typically look for scores in the 8-9 stanine range (89th-99th percentile). Elite schools often expect scores consistently in the 9th stanine across all sections.</p>

                        <p><strong>Testing Frequency & Strategic Timing:</strong> Students may take the ISEE only once per testing season (Fall: August-November, Winter: December-March, Spring/Summer: April-July). However, <strong>realistically only the Fall season and early Winter testing (December) are viable options</strong> for most students, as independent school application deadlines typically fall in early January. Testing after December would miss these critical deadlines, making thorough preparation and strategic test date selection absolutely essential.</p>
                    </div>
                </div>

                <!-- Middle School Timing Alert -->
                <div class="timing-alert">
                    <div class="timing-alert-icon">⚠️</div>
                    <div class="timing-alert-content">
                        <h4>Important: Middle School Starting Grades Vary</h4>
                        <p>Some school districts begin middle school in 5th grade, while others start in 6th grade. The ISEE Middle Level test is designed for students in grades 5-6, making it appropriate for students applying to schools with either middle school structure. Verify your target school's grade configuration when planning your ISEE preparation.</p>
                    </div>
                </div>

                <!-- Three Levels Section -->
                <div id="levels" class="levels-section">
                    <div class="levels-intro">
                        <h2>Three ISEE Testing Levels</h2>
                        <p>The ISEE is offered at three different levels based on the student's current grade. Each level is carefully calibrated to assess age-appropriate academic skills.</p>
                    </div>

                    <div class="levels-grid">
                        <!-- Primary Level -->
                        <div class="level-card">
                            <div class="level-header">
                                <div class="level-badge">Primary Level</div>
                                <div class="level-name">Lower ISEE</div>
                                <div class="level-grades">For Students in Grades 2-4</div>
                            </div>
                            <div class="level-body">
                                <p class="level-description">Designed for younger students applying to private elementary schools. Focuses on foundational reading, mathematics, and analytical thinking skills appropriate for early learners.</p>

                                <div class="level-details">
                                    <h4>📝 Test Format:</h4>
                                    <ul>
                                        <li>Reading Comprehension (25 questions, 25 min)</li>
                                        <li>Mathematics Achievement (30 questions, 30 min)</li>
                                        <li>Quantitative Reasoning (30 questions, 30 min)</li>
                                        <li>Essay (1 prompt, unscored, 30 min)</li>
                                    </ul>
                                </div>

                                <div class="level-details">
                                    <h4>🎯 Key Focus Areas:</h4>
                                    <ul>
                                        <li>Basic reading comprehension</li>
                                        <li>Elementary arithmetic operations</li>
                                        <li>Pattern recognition and problem-solving</li>
                                        <li>Written expression development</li>
                                    </ul>
                                </div>

                                <div class="level-cta">
                                    <a href="/isee-primary-level/" class="level-cta-btn">Learn More About Primary Level →</a>
                                </div>
                            </div>
                        </div>

                        <!-- Middle Level -->
                        <div class="level-card">
                            <div class="level-header">
                                <div class="level-badge">Middle Level</div>
                                <div class="level-name">Middle ISEE</div>
                                <div class="level-grades">For Students in Grades 5-6</div>
                            </div>
                            <div class="level-body">
                                <p class="level-description">For students applying to middle school programs at private institutions. Tests more sophisticated reasoning, comprehension, and mathematical skills beyond elementary curriculum.</p>

                                <div class="level-details">
                                    <h4>📝 Test Format:</h4>
                                    <ul>
                                        <li>Verbal Reasoning (40 questions, 20 min)</li>
                                        <li>Quantitative Reasoning (37 questions, 35 min)</li>
                                        <li>Reading Comprehension (36 questions, 35 min)</li>
                                        <li>Mathematics Achievement (47 questions, 40 min)</li>
                                        <li>Essay (1 prompt, unscored, 30 min)</li>
                                    </ul>
                                </div>

                                <div class="level-details">
                                    <h4>🎯 Key Focus Areas:</h4>
                                    <ul>
                                        <li>Synonyms and sentence completions</li>
                                        <li>Advanced problem-solving strategies</li>
                                        <li>Complex reading passages</li>
                                        <li>Pre-algebra and geometry concepts</li>
                                    </ul>
                                </div>

                                <div class="level-cta">
                                    <a href="/isee-middle-level/" class="level-cta-btn">Learn More About Middle Level →</a>
                                </div>
                            </div>
                        </div>

                        <!-- Upper Level -->
                        <div class="level-card">
                            <div class="level-header">
                                <div class="level-badge">Upper Level</div>
                                <div class="level-name">Upper ISEE</div>
                                <div class="level-grades">For Students in Grades 7-11</div>
                            </div>
                            <div class="level-body">
                                <p class="level-description">The most challenging level, designed for students applying to competitive high schools. Requires advanced critical thinking, sophisticated vocabulary, and strong mathematical foundations.</p>

                                <div class="level-details">
                                    <h4>📝 Test Format:</h4>
                                    <ul>
                                        <li>Verbal Reasoning (40 questions, 20 min)</li>
                                        <li>Quantitative Reasoning (37 questions, 35 min)</li>
                                        <li>Reading Comprehension (36 questions, 35 min)</li>
                                        <li>Mathematics Achievement (47 questions, 40 min)</li>
                                        <li>Essay (1 prompt, unscored, 30 min)</li>
                                    </ul>
                                </div>

                                <div class="level-details">
                                    <h4>🎯 Key Focus Areas:</h4>
                                    <ul>
                                        <li>College-level vocabulary</li>
                                        <li>Complex quantitative comparisons</li>
                                        <li>Advanced reading analysis</li>
                                        <li>Algebra, geometry, and data analysis</li>
                                    </ul>
                                </div>

                                <div class="level-cta">
                                    <a href="/isee-upper-level/" class="level-cta-btn">Learn More About Upper Level →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test Sections Deep Dive -->
                <div id="sections" class="test-sections">
                    <div class="comparison-header">
                        <h2>Understanding ISEE Test Sections</h2>
                        <p>A detailed look at what each section measures and how to prepare</p>
                    </div>

                    <!-- Verbal Reasoning -->
                    <div class="section-row">
                        <div class="section-visual">
                            <div class="section-visual-icon">💭</div>
                            <div class="section-visual-label">Verbal Reasoning</div>
                        </div>
                        <div class="section-content">
                            <h3>Vocabulary & Language Skills</h3>
                            <p>Tests your understanding of word meanings, relationships between words, and ability to complete sentences logically.</p>
                            <p><strong>Format:</strong> Two question types—synonyms (finding words with similar meanings) and sentence completions (choosing words that best complete a sentence).</p>
                            <div class="section-meta">
                                <div class="meta-item"><strong>40</strong> questions</div>
                                <div class="meta-item"><strong>20</strong> minutes</div>
                                <div class="meta-item"><strong>30</strong> sec/question</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quantitative Reasoning -->
                    <div class="section-row">
                        <div class="section-visual">
                            <div class="section-visual-icon">🔢</div>
                            <div class="section-visual-label">Quantitative</div>
                        </div>
                        <div class="section-content">
                            <h3>Mathematical Problem-Solving</h3>
                            <p>Evaluates your ability to think flexibly about numbers and solve problems using quantitative reasoning rather than rote calculation.</p>
                            <p><strong>Format:</strong> Word problems and quantitative comparisons that test mathematical thinking, pattern recognition, and logical reasoning.</p>
                            <div class="section-meta">
                                <div class="meta-item"><strong>37</strong> questions</div>
                                <div class="meta-item"><strong>35</strong> minutes</div>
                                <div class="meta-item"><strong>57</strong> sec/question</div>
                            </div>
                        </div>
                    </div>

                    <!-- Reading Comprehension -->
                    <div class="section-row">
                        <div class="section-visual">
                            <div class="section-visual-icon">📖</div>
                            <div class="section-visual-label">Reading</div>
                        </div>
                        <div class="section-content">
                            <h3>Reading Comprehension & Analysis</h3>
                            <p>Measures your ability to understand, analyze, and interpret reading passages from various genres including literature, science, history, and current events.</p>
                            <p><strong>Format:</strong> Six passages with 6 questions each, testing main idea, supporting details, inference, vocabulary in context, and author's purpose.</p>
                            <div class="section-meta">
                                <div class="meta-item"><strong>36</strong> questions</div>
                                <div class="meta-item"><strong>35</strong> minutes</div>
                                <div class="meta-item"><strong>58</strong> sec/question</div>
                            </div>
                        </div>
                    </div>

                    <!-- Mathematics Achievement -->
                    <div class="section-row">
                        <div class="section-visual">
                            <div class="section-visual-icon">📐</div>
                            <div class="section-visual-label">Mathematics</div>
                        </div>
                        <div class="section-content">
                            <h3>Mathematical Knowledge & Application</h3>
                            <p>Tests knowledge of mathematical concepts and ability to apply computational skills across number operations, algebra, geometry, measurement, data analysis, and probability.</p>
                            <p><strong>Format:</strong> Direct questions covering curriculum-based content appropriate for your grade level, including multi-step problems requiring formula application.</p>
                            <div class="section-meta">
                                <div class="meta-item"><strong>47</strong> questions</div>
                                <div class="meta-item"><strong>40</strong> minutes</div>
                                <div class="meta-item"><strong>51</strong> sec/question</div>
                            </div>
                        </div>
                    </div>

                    <!-- Essay -->
                    <div class="section-row">
                        <div class="section-visual">
                            <div class="section-visual-icon">✍️</div>
                            <div class="section-visual-label">Essay</div>
                        </div>
                        <div class="section-content">
                            <h3>Written Expression (Unscored)</h3>
                            <p>While not scored, your essay is sent to schools along with your scores. It provides admissions officers insight into your writing ability, creativity, and thought process.</p>
                            <p><strong>Format:</strong> One prompt requiring a well-organized response with clear introduction, supporting details, and conclusion.</p>
                            <div class="section-meta">
                                <div class="meta-item"><strong>1</strong> prompt</div>
                                <div class="meta-item"><strong>30</strong> minutes</div>
                                <div class="meta-item">Sent to schools</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preparation Timeline -->
                <div id="timeline" class="timeline-section">
                    <div class="timeline-header">
                        <h2>ISEE Preparation Timeline</h2>
                        <p>Strategic milestones for maximizing your ISEE performance</p>
                    </div>

                    <div class="timeline-steps">
                        <!-- Step 1 -->
                        <div class="timeline-step">
                            <div class="step-number">1</div>
                            <div class="step-timing">12 Months Before Test</div>
                            <div class="step-title">Initial Assessment & Foundation Building</div>
                            <div class="step-content">
                                <p>Begin with a diagnostic assessment to identify strengths and areas for improvement. Start building vocabulary systematically and review fundamental math concepts. Establish consistent study habits and familiarize yourself with test format.</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="timeline-step">
                            <div class="step-number">2</div>
                            <div class="step-timing">9-10 Months Before Test</div>
                            <div class="step-title">Skill Development & Strategy Introduction</div>
                            <div class="step-content">
                                <p>Focus on mastering content in each test section. Learn test-taking strategies specific to ISEE format. Practice timed drills to build speed and accuracy. Begin working on essay writing structure and development.</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="timeline-step">
                            <div class="step-number">3</div>
                            <div class="step-timing">6-8 Months Before Test</div>
                            <div class="step-title">Advanced Concepts & Practice Tests</div>
                            <div class="step-content">
                                <p>Tackle more challenging problems and advanced vocabulary. Begin taking full-length practice tests under timed conditions. Analyze practice test results to refine study focus. Strengthen weak areas identified through testing.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="timeline-step">
                            <div class="step-number">4</div>
                            <div class="step-timing">3-5 Months Before Test</div>
                            <div class="step-title">Intensive Practice & Refinement</div>
                            <div class="step-content">
                                <p>Increase practice test frequency to bi-weekly. Fine-tune time management strategies for each section. Practice remaining calm under timed pressure. Review and reinforce all previously learned strategies and content.</p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="timeline-step">
                            <div class="step-number">5</div>
                            <div class="step-timing">Final 8-12 Weeks</div>
                            <div class="step-title">Test Simulation & Optimization</div>
                            <div class="step-content">
                                <p>Take weekly full-length practice tests under actual test conditions. Focus on maintaining consistency across all sections. Address any remaining content gaps. Build test-day confidence and manage test anxiety through simulated experiences.</p>
                            </div>
                        </div>

                        <!-- Step 6 -->
                        <div class="timeline-step">
                            <div class="step-number">6</div>
                            <div class="step-timing">Final 2 Weeks</div>
                            <div class="step-title">Review & Test Readiness</div>
                            <div class="step-content">
                                <p>Light review of key concepts and strategies—avoid cramming new material. Take one final practice test, then focus on rest and confidence-building. Prepare logistics: test center location, required materials, and test-day routine.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Why NYC STEM Club -->
                <div id="why-us" class="why-section">
                    <div class="why-header">
                        <h2>Why Choose NYC STEM Club for ISEE Prep?</h2>
                    </div>

                    <div class="why-features">
                        <div class="feature-item">
                            <div class="feature-icon">👨‍🏫</div>
                            <div class="feature-title">Expert Instructors</div>
                            <p class="feature-description">Our instructors have extensive experience with ISEE preparation and understand the unique challenges of each testing level. They provide personalized guidance tailored to your child's learning style and target schools.</p>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">📊</div>
                            <div class="feature-title">Proven Track Record</div>
                            <p class="feature-description">Our students consistently achieve scores in the 8-9 stanine range, gaining admission to top independent schools throughout NYC and beyond. We track progress meticulously and adjust strategies based on results.</p>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">📚</div>
                            <div class="feature-title">Comprehensive Materials</div>
                            <p class="feature-description">Access to extensive practice materials, official ISEE practice tests, proprietary strategies, and a curated vocabulary program designed specifically for your target ISEE level.</p>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">🎯</div>
                            <div class="feature-title">Flexible Programs</div>
                            <p class="feature-description">Choose from year-round group classes, intensive summer programs, or personalized 1-on-1 tutoring. Both online and in-person options available to fit your schedule and learning preferences.</p>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">📈</div>
                            <div class="feature-title">Progress Tracking</div>
                            <p class="feature-description">Regular assessments and detailed progress reports help identify areas of strength and opportunities for improvement. Parents receive consistent updates on their child's development and readiness.</p>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">🏆</div>
                            <div class="feature-title">Holistic Approach</div>
                            <p class="feature-description">Beyond test prep, we provide comprehensive admissions counseling including school selection guidance, essay development that preserves each student's authentic voice, interview preparation, and ongoing support throughout the entire independent school application process.</p>
                        </div>
                    </div>
                </div>

                <!-- Related Tests -->
                <div class="related-tests">
                    <div class="related-header">
                        <h2>Comparing Admissions Tests?</h2>
                        <p>Explore other standardized tests for private school admissions</p>
                    </div>

                    <div class="related-grid">
                        <a href="/ssat-prep/" class="related-card">
                            <div class="related-icon">🎓</div>
                            <div class="related-name">SSAT</div>
                            <p class="related-description">Secondary School Admission Test for private school entry</p>
                            <div class="related-arrow">Learn More →</div>
                        </a>

                        <a href="/ssat-primary-level/" class="related-card">
                            <div class="related-icon">🏫</div>
                            <div class="related-name">SSAT Primary</div>
                            <p class="related-description">For younger students in grades 3-4</p>
                            <div class="related-arrow">Learn More →</div>
                        </a>

                        <a href="/ssat-middle-level/" class="related-card">
                            <div class="related-icon">📚</div>
                            <div class="related-name">SSAT Middle</div>
                            <p class="related-description">For students in grades 5-7</p>
                            <div class="related-arrow">Learn More →</div>
                        </a>

                        <a href="/ssat-upper-level/" class="related-card">
                            <div class="related-icon">🎯</div>
                            <div class="related-name">SSAT Upper</div>
                            <p class="related-description">For students in grades 8-11</p>
                            <div class="related-arrow">Learn More →</div>
                        </a>
                    </div>

                    <div style="text-align: center; margin-top: 30px;">
                        <p style="font-size: 16px; color: #666;">Not sure which test is right for you? <a href="/isee-vs-ssat/" style="color: #28AFCF; font-weight: 700; text-decoration: none;">Compare ISEE vs SSAT →</a></p>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="cta-section">
                    <h2>Ready to Begin Your ISEE Journey?</h2>
                    <p>Contact NYC STEM Club today to schedule a diagnostic assessment and learn more about our comprehensive ISEE preparation programs for all three levels.</p>
                    <a href="/student-enrollment/" class="cta-button">Get Started Today →</a>
                </div>

                <!-- Testimonials Section -->
                <?php echo do_shortcode('[testimonials]'); ?>

            </div>
        </article>
    </main>
</div>

<?php
get_footer();
