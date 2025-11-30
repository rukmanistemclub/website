<?php
/**
 * Template Name: SAT vs ACT 2025 - Full Width
 * Description: Custom template for SAT vs ACT comparison page
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
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.6;
        color: #333;
        background: #f8f9fa;
        overflow-x: hidden;
        max-width: 100vw;
    }

    /* Global image containment */
    img, video, iframe {
        max-width: 100%;
        height: auto;
    }

    .sat-act-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px 20px;
        box-sizing: border-box;
        width: 100%;
        overflow-x: hidden;
    }

    /* Ensure all children respect container width */
    .sat-act-container > * {
        max-width: 100%;
        box-sizing: border-box;
    }

    /* Hero Section with Image - Compact */
    .hero-section {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        padding: 30px 0;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .hero-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero H1 - Mobile first: 32px → 40px (tablet) → 48px (desktop) */
    /* !important needed to override design-system.css generic h1 rules */
    .hero-section h1 {
        font-size: 32px !important;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
        color: white;
        letter-spacing: -1px;
        text-align: left;
    }

    @media (min-width: 768px) {
        .hero-section h1 {
            font-size: 40px !important;
        }
    }

    @media (min-width: 1024px) {
        .hero-section h1 {
            font-size: 48px !important;
        }
    }

    /* Hero subtitle - Lead paragraph style per typography standards */
    .hero-subtitle {
        font-size: 18px;
        margin: 0;
        position: relative;
        z-index: 2;
        color: white;
        line-height: 1.7;
        text-align: left;
        opacity: 0.95;
        width: 100%;
        max-width: 100%;
    }

    @media (min-width: 1024px) {
        .hero-subtitle {
            white-space: nowrap;
            width: fit-content;
        }
    }

    .hero-image-container {
        max-width: 600px;
        margin: 15px auto 0;
        position: relative;
        z-index: 2;
    }

    .hero-image-container img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
    }

    /* Lead Paragraph */
    .lead-paragraph {
        font-size: 18px;
        line-height: 1.7;
        margin-bottom: 1rem;
        color: #555;
        font-weight: 400;
    }

    /* Callout Box - Compact */
    .callout-box {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-left: 4px solid #28AFCF;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        margin: 5px 0 1rem 0;
        box-shadow: 0 2px 8px rgba(40, 175, 207, 0.1);
        width: 100%;
        box-sizing: border-box;
    }

    .callout-box h3 {
        font-size: 20px;
        color: #134958;
        font-weight: 600;
        line-height: 1.3;
        margin-bottom: 8px;
    }

    @media (min-width: 768px) {
        .callout-box h3 {
            font-size: 24px;
        }
    }

    .callout-box p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 8px;
    }

    .callout-box ul {
        list-style: none;
        padding: 0;
        margin: 0.5rem 0 0 0;
    }

    .callout-box li {
        padding: 0.25rem 0;
        line-height: 1.6;
        font-size: 16px;
    }

    .callout-box strong {
        color: #134958;
    }

    .callout-box.quick-answer {
        padding-top: 0;
    }

    /* Section Headings - Typography Standards */
    h2 {
        font-size: 24px;
        color: #134958;
        margin: 1rem 0 10px 0;
        font-weight: 700;
        line-height: 1.3;
    }

    @media (min-width: 768px) {
        h2 { font-size: 28px; }
    }

    @media (min-width: 1024px) {
        h2 { font-size: 36px; }
    }

    h3 {
        font-size: 20px;
        color: #134958;
        font-weight: 600;
        line-height: 1.375;
        margin-bottom: 8px;
    }

    @media (min-width: 768px) {
        h3 { font-size: 24px; }
    }

    h4 {
        font-size: 18px;
        color: #134958;
        font-weight: 600;
        line-height: 1.375;
        margin-bottom: 6px;
    }

    @media (min-width: 768px) {
        h4 { font-size: 20px; }
    }

    /* VS Comparison Container - Compact */
    .vs-comparison {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        align-items: stretch;
        margin: 0.5rem 0;
        width: 100%;
    }

    @media (min-width: 768px) {
        .vs-comparison {
            grid-template-columns: 1fr auto 1fr;
            gap: 0.75rem;
            align-items: center;
        }
    }

    .vs-divider {
        font-size: 2rem;
        font-weight: 700;
        color: #cbd5e1;
        padding: 0 0.5rem;
    }

    .comparison-card {
        background: white;
        border-radius: 8px;
        padding: 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: all 0.3s ease;
        width: 100%;
        min-width: 0;
        box-sizing: border-box;
    }

    .comparison-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .comparison-card h3 {
        font-size: 20px;
        margin: 0;
        padding: 0.5rem 1rem;
        text-align: center;
        color: white;
        font-weight: 600;
        line-height: 1.3;
    }

    @media (min-width: 768px) {
        .comparison-card h3 {
            font-size: 24px;
        }
    }

    .comparison-card .card-content {
        padding: 0.75rem 1rem;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .quick-stats > div {
        text-align: center;
    }

    .quick-stats .label {
        font-size: 12px;
        color: #666;
        margin-bottom: 0.25rem;
        line-height: 1.4;
    }

    .quick-stats .value {
        font-size: 18px;
        font-weight: 700;
        color: #134958;
        line-height: 1.2;
    }

    .card-details {
        margin-top: 0.5rem;
        padding-top: 0.5rem;
        border-top: 1px solid #f1f5f9;
    }

    .card-details p {
        margin: 0.25rem 0;
        line-height: 1.6;
        font-size: 16px;
    }

    /* Recommendation Cards - Compact */
    .recommendation-cards {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin: 0.5rem 0;
        width: 100%;
    }

    @media (min-width: 768px) {
        .recommendation-cards {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }
    }

    .recommendation-card {
        border-radius: 8px;
        padding: 0.75rem 1rem 0.75rem 1.25rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        width: 100%;
        min-width: 0;
        box-sizing: border-box;
    }

    .recommendation-card.act {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-left: 4px solid #28AFCF;
    }

    .recommendation-card.sat {
        background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
        border-left: 4px solid #FF7F07;
    }

    .recommendation-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(40, 175, 207, 0.15);
    }

    .recommendation-card h3 {
        font-size: 20px;
        font-weight: 600;
        line-height: 1.3;
        color: #134958;
        margin: 0 0 0.5rem 0;
    }

    @media (min-width: 768px) {
        .recommendation-card h3 {
            font-size: 24px;
        }
    }

    /* Two-column layout for SAT/ACT sections */
    .two-col-section {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .two-col-section > div {
        max-width: 100%;
        min-width: 0;
    }

    @media (min-width: 768px) {
        .two-col-section {
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
    }

    /* Test Breakdown Sections - SAT/ACT */
    .test-breakdown-section {
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 2rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        width: 100%;
        box-sizing: border-box;
    }

    .test-header {
        padding: 1rem 1.25rem;
    }

    .test-header h3 {
        color: white;
        font-size: 20px;
        font-weight: 700;
        margin: 0;
    }

    @media (min-width: 768px) {
        .test-header h3 {
            font-size: 24px;
        }
    }

    .sat-header {
        background: linear-gradient(135deg, #FF7F07 0%, #ff9933 100%);
    }

    .act-header {
        background: linear-gradient(135deg, #28AFCF 0%, #3bc4e4 100%);
    }

    .test-content {
        background: white;
        padding: 1.25rem;
    }

    @media (min-width: 768px) {
        .test-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            padding: 1.5rem;
        }
    }

    .choose-box {
        margin-bottom: 1.5rem;
    }

    @media (min-width: 768px) {
        .choose-box {
            margin-bottom: 0;
            padding-right: 1rem;
            border-right: 1px solid #e5e7eb;
        }
    }

    .choose-box h4,
    .know-box h4 {
        font-size: 18px;
        font-weight: 600;
        color: #134958;
        margin: 0 0 1rem 0;
    }

    .sat-section .choose-box h4 {
        color: #FF7F07;
    }

    .act-section .choose-box h4 {
        color: #28AFCF;
    }

    .check-list {
        list-style: none;
        padding: 0;
        margin: 0 0 1rem 0;
    }

    .check-list li {
        position: relative;
        padding-left: 1.75rem;
        margin-bottom: 0.75rem;
        font-size: 15px;
        line-height: 1.5;
    }

    .check-list li::before {
        content: "✓";
        position: absolute;
        left: 0;
        font-weight: 700;
    }

    .sat-section .check-list li::before {
        color: #FF7F07;
    }

    .act-section .check-list li::before {
        color: #28AFCF;
    }

    .advantages {
        font-size: 14px;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
        margin: 0;
        line-height: 1.6;
        color: #555;
    }

    .arrow-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .arrow-list li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 1rem;
        font-size: 15px;
        line-height: 1.6;
    }

    .arrow-list li:last-child {
        margin-bottom: 0;
    }

    .arrow-list li::before {
        content: "➤";
        position: absolute;
        left: 0;
        font-size: 14px;
    }

    .sat-section .arrow-list li::before {
        color: #FF7F07;
    }

    .act-section .arrow-list li::before {
        color: #28AFCF;
    }

    /* Strategic heading */
    .strategic-heading {
        font-size: 20px;
        font-weight: 600;
        color: #134958;
        margin: 0 0 1rem 0;
    }

    @media (min-width: 768px) {
        .strategic-heading {
            font-size: 24px;
        }
    }

    .recommendation-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .recommendation-card li {
        padding: 0.2rem 0;
        display: flex;
        align-items: start;
        gap: 0.5rem;
        font-size: 16px;
        line-height: 1.6;
    }

    .recommendation-card .checkmark {
        font-size: 1rem;
        flex-shrink: 0;
    }

    /* Feature Grid - Compact */
    .feature-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.75rem;
        margin: 0.5rem 0 1rem 0;
        width: 100%;
    }

    @media (min-width: 768px) {
        .feature-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
        }
    }

    .feature-item {
        background: white;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border-left: 3px solid #28AFCF;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(40, 175, 207, 0.15);
    }

    .feature-item h4 {
        font-size: 18px;
        color: #134958;
        margin-bottom: 4px;
        font-weight: 600;
        line-height: 1.3;
    }

    @media (min-width: 768px) {
        .feature-item h4 {
            font-size: 20px;
        }
    }

    .feature-item p {
        color: #333;
        line-height: 1.6;
        margin: 0;
        font-size: 16px;
    }

    /* FAQ Accordion - Compact */
    .faq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.5rem;
        margin: 0.5rem 0;
    }

    .faq-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .faq-card:hover {
        border-color: #28AFCF;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .faq-header {
        width: 100%;
        padding: 0.75rem 1rem;
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
        font-size: 16px;
        font-weight: 600;
        color: #134958;
        margin: 0;
        flex: 1;
        line-height: 1.4;
    }

    @media (min-width: 768px) {
        .faq-question {
            font-size: 18px;
        }
    }

    .faq-icon {
        flex-shrink: 0;
        margin-left: 0.5rem;
        color: #666;
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
        padding: 0 1rem 0.75rem;
        color: #333;
        line-height: 1.6;
        margin: 0;
        font-size: 16px;
    }

    .faq-answer p + p {
        padding-top: 0.25rem;
    }

    .faq-answer ul {
        padding: 0.25rem 1rem 0.25rem 1rem;
        margin: 0 0 0 1.5rem;
        color: #64748b;
        line-height: 1.5;
    }

    .faq-answer ul li {
        margin-bottom: 0.25rem;
        font-size: 16px;
    }

    .faq-card.active .faq-answer {
        max-height: 500px;
        overflow-y: auto;
    }

    /* Bottom Line Box - Compact */
    .bottom-line {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-radius: 8px;
        padding: 1rem;
        margin: 1rem 0;
        border-left: 4px solid #28AFCF;
        box-shadow: 0 2px 8px rgba(40, 175, 207, 0.1);
    }

    .bottom-line-intro {
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .bottom-line-intro p {
        font-size: 16px;
        font-weight: 600;
        color: #134958;
        margin: 0;
        line-height: 1.5;
    }

    .bottom-line-box {
        background: white;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        margin-top: 0.5rem;
    }

    .bottom-line-box h4 {
        color: #134958;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.3;
        margin: 0 0 6px 0;
    }

    @media (min-width: 768px) {
        .bottom-line-box h4 {
            font-size: 20px;
        }
    }

    .process-steps {
        counter-reset: step-counter;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .process-steps li {
        counter-increment: step-counter;
        padding: 0.35rem 0 0.35rem 2rem;
        position: relative;
        line-height: 1.6;
        color: #333;
        font-size: 16px;
    }

    .process-steps li::before {
        content: counter(step-counter);
        position: absolute;
        left: 0;
        top: 0.65rem;
        width: 1.75rem;
        height: 1.75rem;
        background: #28AFCF;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
    }

    /* CTA Section - Full Width */
    .cta-section {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        text-align: center;
        padding: 40px 0;
        margin: 0;
    }

    .cta-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .cta-section h2 {
        font-size: 24px;
        font-weight: 700;
        line-height: 1.3;
        color: white !important;
        margin: 0 0 16px 0;
    }

    @media (min-width: 768px) {
        .cta-section h2 {
            font-size: 28px;
        }
    }

    @media (min-width: 1024px) {
        .cta-section h2 {
            font-size: 36px;
        }
    }

    .cta-section p {
        font-size: 16px;
        color: white !important;
        max-width: 700px;
        margin: 0 auto 2rem;
        line-height: 1.6;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* Testimonials Section - Full Width */
    .nyc-testimonials-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 40px 0;
        margin: 0;
    }

    .nyc-testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .nyc-testimonials-title {
        font-size: 24px;
        font-weight: 700;
        color: #134958;
        text-align: center;
        margin-bottom: 40px;
    }

    @media (min-width: 768px) {
        .nyc-testimonials-title {
            font-size: 28px;
        }
    }

    @media (min-width: 1024px) {
        .nyc-testimonials-title {
            font-size: 36px;
        }
    }

    .nyc-testimonials-content {
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
        /* Left-align all content on mobile */
        .hero-section,
        .hero-section h1,
        .hero-subtitle,
        .sat-act-container,
        .sat-act-container h2,
        .sat-act-container h3,
        .sat-act-container p,
        .section,
        .section h2,
        .section p,
        .vs-card h3,
        .vs-card p,
        .recommendation-card,
        .recommendation-card h3,
        .recommendation-card p,
        .feature-card h3,
        .feature-card p,
        .quick-stats,
        .nyc-testimonials-section,
        .nyc-testimonials-title {
            text-align: left !important;
        }

        .hero-section {
            padding: 30px 0;
        }

        .hero-inner {
            padding: 0 16px;
        }

        /* H1 already 32px from mobile-first base */

        .hero-subtitle {
            font-size: 16px !important;
        }

        h2 {
            font-size: 24px !important;
        }

        /* Grid overrides now handled by mobile-first base styles */

        .vs-divider {
            display: none;
        }

        .cta-section {
            padding: 30px 0;
        }

        .cta-inner {
            padding: 0 16px;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: flex-start;
        }

        .nyc-testimonials-section {
            padding: 30px 0;
        }

        .nyc-testimonials-title {
            font-size: 24px !important;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <!-- Hero Section with Image - Full Width -->
            <div class="hero-section">
                <div class="hero-inner">
                    <h1>SAT vs ACT: Which Test Is Right for You?</h1>
                    <p class="hero-subtitle">Complete 2025 comparison guide with expert recommendations to help you choose the test that fits your strengths</p>
                    <div class="hero-image-container">
                        <img src="<?php echo home_url('/wp-content/uploads/fork-in-sat-act-road.jpg'); ?>" alt="Fork in the SAT-ACT Road" />
                    </div>
                </div>
            </div>

            <div class="sat-act-container">

                <!-- Lead Paragraph -->
                <p class="lead-paragraph"><strong>Should you take the SAT or ACT?</strong> It's one of the biggest questions in college prep—and the answer isn't the same for everyone. Both tests are accepted by all U.S. colleges, but they have important differences that can impact your score. At NYC STEM Club, we've helped hundreds of students choose the right test and achieve their target scores. Here's everything you need to know.</p>

                <!-- Quick Answer Callout -->
                <div class="callout-box quick-answer">
                    <h3>Quick Answer</h3>
                    <p><strong>Both tests are accepted by ALL U.S. colleges.</strong> There's no admissions advantage to one over the other.</p>
                    <ul>
                        <li><strong>For most students:</strong> We recommend starting with the ACT (more straightforward questions, balanced scoring)</li>
                        <li><strong>For some students:</strong> The SAT is better (more time per question, less advanced math)</li>
                        <li><strong>Best approach:</strong> Take practice tests for BOTH to see which suits your strengths</li>
                    </ul>
                </div>

                <!-- Quick Comparison -->
                <h2>Quick Comparison</h2>
                <div class="vs-comparison">
                    <div class="comparison-card" style="border: 2px solid #28AFCF;">
                        <h3 style="background: #28AFCF;">Enhanced ACT</h3>
                        <div class="card-content">
                            <div class="quick-stats">
                                <div>
                                    <div class="label">Time</div>
                                    <div class="value">2h 5m</div>
                                </div>
                                <div>
                                    <div class="label">Questions</div>
                                    <div class="value">131</div>
                                </div>
                                <div>
                                    <div class="label">Score</div>
                                    <div class="value">1-36</div>
                                </div>
                            </div>
                            <div class="card-details">
                                <p><strong>Sections:</strong> English, Math, Reading</p>
                                <p><strong>Math Weight:</strong> <span style="color: #28AFCF; font-weight: 700;">33%</span> (1 of 3 sections)</p>
                                <p><strong>Science:</strong> Optional add-on</p>
                            </div>
                        </div>
                    </div>
                    <div class="vs-divider">VS</div>
                    <div class="comparison-card" style="border: 2px solid #FF7F07;">
                        <h3 style="background: #FF7F07;">Digital SAT</h3>
                        <div class="card-content">
                            <div class="quick-stats">
                                <div>
                                    <div class="label">Time</div>
                                    <div class="value">2h 14m</div>
                                </div>
                                <div>
                                    <div class="label">Questions</div>
                                    <div class="value">98</div>
                                </div>
                                <div>
                                    <div class="label">Score</div>
                                    <div class="value">400-1600</div>
                                </div>
                            </div>
                            <div class="card-details">
                                <p><strong>Sections:</strong> Reading & Writing, Math</p>
                                <p><strong>Math Weight:</strong> <span style="color: #FF7F07; font-weight: 700;">50%</span> (1 of 2 sections)</p>
                                <p><strong>Science:</strong> No dedicated section</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Understanding the Recent Changes -->
                <h2>Understanding the Recent Changes</h2>

                <div class="callout-box" style="background: #fff3e6; border-left: 4px solid #FF7F07; margin-bottom: 2.5rem;">
                    <p style="margin: 0;"><strong style="color: #FF7F07; font-size: 1.1rem;">Important:</strong> Both tests have undergone major changes. The SAT is now fully digital and adaptive, while the ACT has become "Enhanced" with fewer questions and optional science.</p>
                </div>

                <!-- Digital SAT Section -->
                <div class="test-breakdown-section sat-section">
                    <div class="test-header sat-header">
                        <h3>Digital SAT (Fully Digital, Adaptive)</h3>
                    </div>
                    <div class="test-content">
                        <div class="choose-box">
                            <h4>Choose SAT if you...</h4>
                            <ul class="check-list">
                                <li>Want more time per question (2hr 14min, 98 questions total)</li>
                                <li>Prefer shorter reading passages (one question per passage)</li>
                                <li>Are strong in math even without advanced topics (math is 50% of score)</li>
                                <li>Don't mind adaptive testing</li>
                            </ul>
                            <p class="advantages"><strong>Advantages:</strong> Prep materials available (Khan Academy, Bluebook), more time per question, and higher level Math topics are not typically included.</p>
                        </div>
                        <div class="know-box">
                            <h4>What to know about the Digital SAT:</h4>
                            <ul class="arrow-list">
                                <li><strong>The Adaptive Format Can Create Anxiety:</strong> If you do well in Module 1, Module 2 becomes noticeably harder. Students report this difficulty spike causes stress.</li>
                                <li><strong>Practice vs Real Test Gap:</strong> Many students score lower on the actual exam than on CollegeBoard's official practice tests.</li>
                                <li><strong>Reading 50+ Short Passages on Screen:</strong> While shorter passages sound easier, reading dozens of them digitally can be exhausting.</li>
                                <li><strong>Math Doesn't Cover Much Algebra 2:</strong> Better for students not taking higher-level math courses.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Enhanced ACT Section -->
                <div class="test-breakdown-section act-section">
                    <div class="test-header act-header">
                        <h3>Enhanced ACT (Paper or Digital, Non-Adaptive)</h3>
                    </div>
                    <div class="test-content">
                        <div class="choose-box">
                            <h4>Choose ACT if you...</h4>
                            <ul class="check-list">
                                <li>Prefer paper testing (still available, even though Digital tests have been introduced)</li>
                                <li>Are comfortable with higher-order math topics like trigonometry (math is only 25% of score)</li>
                                <li>Like non-adaptive, linear tests where difficulty stays consistent</li>
                                <li>Excel at fast-paced problem-solving</li>
                            </ul>
                            <p class="advantages"><strong>Advantages:</strong> Paper option available, science section now optional, non-adaptive (less stressful for some), shorter overall (2hr 5min without science).</p>
                        </div>
                        <div class="know-box">
                            <h4>What to know about the Enhanced ACT:</h4>
                            <ul class="arrow-list">
                                <li><strong>English Is Now Significantly Harder:</strong> With only 40 scored questions instead of 75, the "easy giveaways" have been removed.</li>
                                <li><strong>Score Volatility Is a Major Issue:</strong> Fewer questions mean scaling is more volatile. On the Reading section (only 27 scored items), a few wrong answers can drastically drop your score.</li>
                                <li><strong>Digital ACT Had Rocky Launch:</strong> April 2025 test-takers reported technical issues—laptop malfunctions, delays, and some students switched to paper last-minute.</li>
                                <li><strong>Myth: Enhanced Is Easier:</strong> The ACT removed easier questions disproportionately, so don't assume it's gotten simpler.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Why We Recommend ACT -->
                <h2>Why NYC STEM Club Recommends Starting with the ACT</h2>

                <div class="feature-grid" style="margin: 1.5rem 0 2rem 0;">
                    <div class="feature-item">
                        <h4>Straightforward Questions</h4>
                        <p>ACT asks what the passage directly states. SAT asks what it "implies" or "suggests"—making answers more subjective. If you prefer clear, concrete questions, the ACT is better.</p>
                    </div>
                    <div class="feature-item">
                        <h4>Balanced Scoring</h4>
                        <p>Math is only 33% of your ACT score (1 of 3 sections). Strong English and Reading can offset weaker math. SAT weights math at 50%, making it harder to compensate.</p>
                    </div>
                    <div class="feature-item">
                        <h4>Train at Higher Level</h4>
                        <p>ACT covers advanced math (trigonometry, logarithms, matrices). Master these for the ACT, and SAT math (only up to Algebra 2) becomes much easier. This flexibility lets you pivot to SAT later without learning new content.</p>
                    </div>
                    <div class="feature-item">
                        <h4>Science = Optional</h4>
                        <p>The Science section tests chart and graph reading, not science facts. It's a learnable skill. Plus, it's now optional—take it only if it helps your score.</p>
                    </div>
                </div>

                <h3 class="strategic-heading">The Strategic Advantage: Easy Pivot to SAT</h3>
                <p>Starting with the ACT gives you <strong>maximum flexibility</strong>. Since the ACT covers more advanced content (including Algebra 2, trigonometry, and logarithms), students who prepare for the ACT can easily pivot to the SAT with just a few practice exams to familiarize themselves with the format—no new content to learn.</p>
                <p><strong>Going the other way is much harder.</strong> If you start with the SAT and later want to try the ACT, you'll need to learn new mathematical content during an already stressful junior year. This adds unnecessary pressure when college applications, APs, and extracurriculars are competing for your time.</p>
                <p style="margin-bottom: 2rem;"><strong>Bottom line:</strong> Train at the higher level (ACT), keep your options open, and pivot to SAT if needed—without the stress of learning new material.</p>

                <!-- FAQ Section -->
                <h2>Common Questions</h2>
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
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Do colleges prefer one test over the other?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>No. All U.S. colleges accept both SAT and ACT equally. There's no admissions advantage to either test. Choose based on which test format suits your strengths better.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Can I take both tests?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>Yes. Some students do take both and submit the higher score, but most take diagnostic tests at the beginning and focus their prep on the one they perform better on.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">How do I know which test is right for me?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>Take full-length practice tests for both under timed conditions. Compare your scores and which test felt more comfortable. We offer <strong>free diagnostic testing and consultation</strong> to help you decide.</p>
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
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What if I'm stronger in math?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>If math is your superpower and you want it to count for more, the SAT's 50% math weighting works in your favor. However, we see many strong math students actually prefer the ACT—here's why: Since they don't need to focus heavily on the math component (it's straightforward for them), they can dedicate their prep time to English (reading and grammar). If they're also strong in English, their prep becomes much shorter—just practicing with different test papers and getting comfortable with the timing. The ACT's balanced scoring means math excellence still helps significantly while requiring less focused study.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Is the ACT Science section hard?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>The Science section doesn't test memorized facts—it tests reading charts and graphs, which is a highly learnable skill. Plus, it's now optional! Most students improve their Science scores significantly with proper prep.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">My peers and seniors tell me to wait until spring of junior year. Should I?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>That advice is valid <strong>if you're not in Algebra 2 during sophomore year</strong>. However, if you <strong>are</strong> taking Algebra 2 in sophomore year, starting ACT prep then creates a double win: the training helps with both your ACT preparation <strong>and</strong> your school grades. You're learning the same concepts simultaneously, reinforcing each other. In fact, the majority of our students achieve a 34+ before entering junior year, giving them one less thing to stress about during their busiest academic year.</p>
                        </div>
                    </div>
                </div>

                <!-- The Bottom Line -->
                <h2>The Bottom Line</h2>
                <div class="bottom-line">
                    <div class="bottom-line-intro">
                        <p>
                            The question isn't <em>"Which test is better?"</em><br>
                            It's <strong style="color: #28AFCF;">"Which test is better for YOU?"</strong>
                        </p>
                    </div>
                    <div class="bottom-line-box">
                        <h4>
                            Our 4-Step Process
                        </h4>
                        <ol class="process-steps">
                            <li>Take diagnostic practice tests for both SAT and ACT</li>
                            <li>Compare your performance and comfort level</li>
                            <li>Choose the test where you can reach your target score fastest</li>
                            <li>Focus your prep on that test (optionally take both)</li>
                        </ol>
                    </div>
                </div>

            </div>

            <!-- CTA Section - Full Width -->
            <section class="cta-section">
                <div class="cta-inner">
                    <h2>Ready to Find Your Best Test?</h2>
                    <p>We offer <strong>free diagnostic testing and consultation</strong> to help you choose the right test and create a personalized prep plan.</p>
                    <div class="cta-buttons">
                        <?php echo do_shortcode('[inquiry_button]'); ?>
                        <?php echo do_shortcode('[inquiry_button color="teal" text="View SAT/ACT Prep Program" url="/courses/sat-act-prep-course/"]'); ?>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <?php echo do_shortcode('[testimonials]'); ?>

        </article>
    </main>
</div>

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

<?php get_footer();
