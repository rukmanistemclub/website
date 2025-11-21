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

    html {
        scroll-behavior: smooth;
    }

    /* Global Brand Orange for All Inquiry/CTA Buttons */
    .cta-button.cta-primary,
    .nyc-stem-inquiry-btn,
    a.nyc-stem-inquiry-btn,
    button.nyc-stem-inquiry-btn {
        background-color: #FF7F07 !important; /* Brand orange */
        background-image: none !important;
    }

    .cta-button.cta-primary:hover {
        opacity: 0.9;
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
    }

    .card-stat-schools {
        font-size: 11px;
        color: #666;
        line-height: 1.4;
        margin-top: 4px;
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
        text-align: center;
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
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        font-weight: 600;
        line-height: 1.3;
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
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        line-height: 1.6;
        color: #555;
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
        font-family: 'Roboto', sans-serif;
        font-size: 24px;
        font-weight: 600;
        line-height: 1.3;
        color: #134958;
        margin-bottom: 12px;
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
        border-radius: 3px;
        margin-bottom: 60px;
    }

    .cta-section h2 {
        font-size: 40px;
        margin-bottom: 16px;
        color: white !important;
    }

    .cta-section p {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 32px;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        color: white !important;
    }

    .cta-section .inquiry-button {
        border-radius: 3px !important;
    }

    .cta-button {
        display: inline-block;
        padding: 18px 48px;
        background: #FF7F07;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.6;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(255, 127, 7, 0.3);
    }

    .cta-button:hover {
        background: #e67006;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 127, 7, 0.4);
    }

    /* FAQ Section - Modern Collapsible - Typography Compliant */
    .faq-section {
        margin-bottom: 60px;
        font-family: 'Roboto', sans-serif;
    }

    .faq-header {
        text-align: center;
        margin-bottom: 40px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 20px;
    }

    .faq-header h2 {
        font-family: 'Roboto', sans-serif;
        font-size: 32px;
        color: #134958;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 16px;
        text-align: center;
    }

    .faq-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .faq-item {
        background: white;
        margin-bottom: 16px;
        border-radius: 12px;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .faq-item.active {
        border-color: #28AFCF;
        box-shadow: 0 4px 12px rgba(40, 175, 207, 0.15);
    }

    .faq-question {
        padding: 24px 28px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        transition: all 0.3s ease;
        user-select: none;
    }

    .faq-question:hover {
        background: #f8f9fa;
    }

    .faq-item.active .faq-question {
        background: linear-gradient(135deg, #ecfeff, #cffafe);
        border-bottom: 2px solid #e5e7eb;
    }

    .faq-question h3 {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        color: #134958;
        font-weight: 600;
        line-height: 1.3;
        margin: 0;
        flex: 1;
    }

    .faq-toggle {
        width: 32px;
        height: 32px;
        background: #28AFCF;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .faq-toggle:after {
        content: '+';
        color: white;
        font-size: 24px;
        font-weight: 700;
        line-height: 1;
    }

    .faq-item.active .faq-toggle {
        background: #134958;
        transform: rotate(45deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, padding 0.4s ease;
        padding: 0 28px;
    }

    .faq-item.active .faq-answer {
        max-height: 2000px;
        padding: 24px 28px;
    }

    .faq-answer p {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        margin-bottom: 16px;
    }

    .faq-answer p:last-child {
        margin-bottom: 0;
    }

    .faq-answer ul {
        list-style: none;
        padding-left: 0;
        margin: 16px 0;
    }

    .faq-answer ul li {
        font-family: 'Roboto', sans-serif;
        padding-left: 30px;
        position: relative;
        margin-bottom: 8px;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    .faq-answer ul li:before {
        content: "▸";
        position: absolute;
        left: 0;
        font-size: 18px;
        font-weight: 700;
        color: #28AFCF;
    }

    .faq-answer strong {
        font-weight: 700;
        color: #134958;
    }

    /* Mobile Responsive - FAQ Section */
    @media (max-width: 768px) {
        .faq-header h2 {
            font-size: 28px;
        }

        .faq-question {
            padding: 20px 20px;
            gap: 16px;
        }

        .faq-question h3 {
            font-size: 16px;
        }

        .faq-toggle {
            width: 28px;
            height: 28px;
        }

        .faq-toggle:after {
            font-size: 20px;
        }

        .faq-answer {
            padding: 0 20px;
        }

        .faq-item.active .faq-answer {
            padding: 20px 20px;
        }

        .faq-container {
            padding: 0 16px;
        }
    }

    @media (max-width: 480px) {
        .faq-header h2 {
            font-size: 24px;
        }

        .faq-question {
            padding: 16px 16px;
        }

        .faq-question h3 {
            font-size: 18px;
        }

        .faq-answer {
            padding: 0 16px;
        }

        .faq-item.active .faq-answer {
            padding: 16px 16px;
        }
    }

    /* Testimonials Section */
    .nyc-testimonials-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 80px 20px 0;
        margin: 0 -20px 0;
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
        .hero-container {
            grid-template-columns: 1fr;
            gap: 40px;
            padding: 40px 20px;
        }

        .hero-card {
            max-width: 100%;
        }

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
        .course-hero .hero-content h1 {
            font-size: 36px !important;
        }

        .hero-excerpt {
            font-size: 16px;
        }

        .hero-stats-mini {
            flex-direction: column;
            gap: 12px;
        }

        .stat-mini-number {
            font-size: 18px;
        }

        .cta-group {
            flex-direction: column;
            gap: 12px;
        }

        .cta-button {
            width: 100%;
            text-align: center;
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
            padding: 60px 20px 0;
        }

        .nyc-testimonials-title {
            font-size: 2rem;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <!-- Hero Section -->
            <section class="course-hero">
                <div class="hero-container">
                    <!-- Left Column: Main Content -->
                    <div class="hero-content">
                        <h1>ISEE Test Preparation</h1>
                        <p class="hero-excerpt">Comprehensive preparation for the Independent School Entrance Examination across all three testing levels</p>

                        <!-- Mini Stats -->
                        <div class="hero-stats-mini">
                            <div class="stat-mini">
                                <div class="stat-mini-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <div class="stat-mini-text">
                                    <span class="stat-mini-number">85%+</span>
                                    <span class="stat-mini-label">Stanine 7-9 Achievement</span>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="cta-group">
                            <a href="#programs" class="cta-button cta-primary" style="background-color: #FF9574; color: #FFFFFF; padding: 12px 24px; border-radius: 3px; font-family: 'Roboto', sans-serif !important; font-size: 18px !important; font-weight: 700 !important; line-height: 1.8 !important; min-width: 180px !important; width: auto !important; display: inline-block !important; text-align: center !important; text-decoration: none; transition: all .3s;">Jump to Programs</a>
                            <?php echo do_shortcode('[inquiry_button]'); ?>
                        </div>
                    </div>

                    <!-- Right Column: Track Record Card -->
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
                                    <span class="card-stat-number">Over 85%</span>
                                    <span class="card-stat-label">Scored a Stanine of 7-9 on the ISEE</span>
                                </div>
                            </div>
                            <div class="card-stat-box">
                                <div class="card-stat-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="card-stat-text">
                                    <span class="card-stat-number">Top 3 Schools</span>
                                    <span class="card-stat-label">Our students have received offers in one of their top 3 schools</span>
                                    <div class="card-stat-schools">Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Ann's, prestigious boarding schools and many more top schools</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container" style="padding-top: 40px;">

                <!-- Quick Navigation -->
                <div class="quick-nav">
                    <a href="#overview" class="nav-pill">Overview</a>
                    <a href="#levels" class="nav-pill">Three Levels</a>
                    <a href="#programs" class="nav-pill">Programs</a>
                    <a href="#why-us" class="nav-pill">Why Us</a>
                    <a href="#faq" class="nav-pill">FAQ</a>
                </div>

                <!-- Overview Section -->
                <div id="overview" class="overview-section">
                    <div class="section-header">
                        <h2 class="section-title">What is the ISEE?</h2>
                    </div>
                    <div class="overview-content">
                        <p>The <strong>Independent School Entrance Examination (ISEE)</strong> is a standardized test used by private and independent schools across the United States and internationally as part of their admissions process.</p>

                        <p>Developed and administered by the Educational Records Bureau (ERB), the ISEE evaluates students' capabilities in <strong>verbal reasoning, quantitative reasoning, reading comprehension, mathematics achievement, and essay writing</strong>.</p>

                        <div class="highlight-box">
                            <p>The ISEE is specifically designed to assess a student's readiness for independent school education and is accepted by over 1,200 schools worldwide.</p>
                        </div>

                        <p><strong>Target Score Range:</strong> Competitive independent schools typically look for scores in the 8-9 stanine range (89th-99th percentile). Elite schools often expect scores consistently in the 9th stanine across all sections.</p>

                        <p><strong>Testing Frequency & Strategic Timing:</strong> Students may take the ISEE only once per testing season (Fall: August-November, Winter: December-March, Spring/Summer: April-July). However, <strong>realistically only the Fall season and early Winter testing (December) are viable options</strong> for most students, as independent school application deadlines typically fall in early January. Testing after December would miss these critical deadlines, making thorough preparation and strategic test date selection absolutely essential.</p>

                        <!-- Middle School Timing Alert - Moved Inside Overview -->
                        <div class="timing-alert" style="margin: 30px 0;">
                            <div class="timing-alert-content">
                                <h4>Important: Middle School Starting Grades Vary</h4>
                                <p>Some school districts begin middle school in 5th grade, while others start in 6th grade. The ISEE Middle Level test is designed for students applying to grades 7 and 8, making it appropriate for students applying to schools with either middle school structure. Verify your target school's grade configuration when planning your ISEE preparation.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Three Levels Section -->
                <div id="levels" class="levels-section">
                    <div class="levels-intro">
                        <h2>Three ISEE Testing Levels</h2>
                        <p>The ISEE is offered at three different levels based on the student's current grade. Each level is carefully calibrated to assess age-appropriate academic skills.</p>
                    </div>

                    <div class="levels-grid">
                        <!-- Elementary Level -->
                        <div class="level-card">
                            <div class="level-header">
                                <div class="level-badge">Elementary Level</div>
                                <div class="level-name">Lower ISEE</div>
                                <div class="level-grades">For students entering grades 5 and 6</div>
                            </div>
                            <div class="level-body">
                                <p class="level-description">Designed for students applying to competitive middle schools. Focuses on verbal reasoning, reading, mathematics, and analytical thinking skills.</p>

                                <div class="level-details">
                                    <h4>Test Format:</h4>
                                    <ul>
                                        <li>Verbal Reasoning (34 questions, 20 min)</li>
                                        <li>Quantitative Reasoning (38 questions, 35 min)</li>
                                        <li>Reading Comprehension (25 questions, 25 min)</li>
                                        <li>Mathematics Achievement (30 questions, 30 min)</li>
                                        <li>Essay (1 prompt, unscored, 30 min)</li>
                                    </ul>
                                </div>

                                <div class="level-details">
                                    <h4>Key Focus Areas:</h4>
                                    <ul>
                                        <li>Basic reading comprehension</li>
                                        <li>Elementary arithmetic operations</li>
                                        <li>Pattern recognition and problem-solving</li>
                                        <li>Written expression development</li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- Middle Level -->
                        <div class="level-card">
                            <div class="level-header">
                                <div class="level-badge">Middle Level</div>
                                <div class="level-name">Middle ISEE</div>
                                <div class="level-grades">For students applying to grades 7 and 8</div>
                            </div>
                            <div class="level-body">
                                <p class="level-description">For students applying to competitive independent middle and high schools. Tests advanced reasoning, comprehension, and mathematical skills including pre-algebra and geometry.</p>

                                <div class="level-details">
                                    <h4>Test Format:</h4>
                                    <ul>
                                        <li>Verbal Reasoning (40 questions, 20 min)</li>
                                        <li>Quantitative Reasoning (37 questions, 35 min)</li>
                                        <li>Reading Comprehension (36 questions, 35 min)</li>
                                        <li>Mathematics Achievement (47 questions, 40 min)</li>
                                        <li>Essay (1 prompt, unscored, 30 min)</li>
                                    </ul>
                                </div>

                                <div class="level-details">
                                    <h4>Key Focus Areas:</h4>
                                    <ul>
                                        <li>Synonyms and sentence completions</li>
                                        <li>Advanced problem-solving strategies</li>
                                        <li>Complex reading passages</li>
                                        <li>Pre-algebra and geometry concepts</li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- Upper Level -->
                        <div class="level-card">
                            <div class="level-header">
                                <div class="level-badge">Upper Level</div>
                                <div class="level-name">Upper ISEE</div>
                                <div class="level-grades">For students applying to grades 9-12</div>
                            </div>
                            <div class="level-body">
                                <p class="level-description">The most challenging level, designed for students applying to competitive high schools and boarding schools. Requires advanced critical thinking, college-level vocabulary, and strong mathematical foundations including algebra and geometry.</p>

                                <div class="level-details">
                                    <h4>Test Format:</h4>
                                    <ul>
                                        <li>Verbal Reasoning (40 questions, 20 min)</li>
                                        <li>Quantitative Reasoning (37 questions, 35 min)</li>
                                        <li>Reading Comprehension (36 questions, 35 min)</li>
                                        <li>Mathematics Achievement (47 questions, 40 min)</li>
                                        <li>Essay (1 prompt, unscored, 30 min)</li>
                                    </ul>
                                </div>

                                <div class="level-details">
                                    <h4>Key Focus Areas:</h4>
                                    <ul>
                                        <li>College-level vocabulary</li>
                                        <li>Complex quantitative comparisons</li>
                                        <li>Advanced reading analysis</li>
                                        <li>Algebra, geometry, and data analysis</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related ISEE Programs -->
                <div id="programs" class="related-programs-section" style="margin-bottom: 60px;">
                    <div style="text-align: center; margin-bottom: 40px;">
                        <h2 style="font-family: 'Roboto', sans-serif; font-size: 32px; color: #134958; margin-bottom: 16px; font-weight: 700; line-height: 1.3;">ISEE Prep Programs</h2>
                        <p style="font-family: 'Roboto', sans-serif; font-size: 18px; color: #555; line-height: 1.6;">Choose the right program for your grade level</p>
                    </div>
                    <?php echo do_shortcode('[course_category category="isee-prep" title="" columns="3" show_excerpt="yes"]'); ?>
                </div>

                <!-- Why NYC STEM Club -->
                <div id="why-us">
                    <?php echo do_shortcode('[why_choose_isee]'); ?>
                </div>

                <!-- FAQ Section -->
                <div id="faq" class="faq-section">
                    <div class="faq-header">
                        <h2>Frequently Asked Questions</h2>
                    </div>

                    <div class="faq-container">
                        <div class="faq-item active">
                            <div class="faq-question">
                                <h3>What sections are on the ISEE test?</h3>
                                <div class="faq-toggle"></div>
                            </div>
                            <div class="faq-answer">
                                <p>The ISEE consists of five sections:</p>
                                <ul>
                                    <li><strong>Verbal Reasoning:</strong> 40 questions in 20 minutes testing word meanings, relationships, and sentence completion</li>
                                    <li><strong>Quantitative Reasoning:</strong> 37 questions in 35 minutes evaluating mathematical problem-solving</li>
                                    <li><strong>Reading Comprehension:</strong> 36 questions in 35 minutes measuring understanding of passages across literature, science, history, and current events</li>
                                    <li><strong>Mathematics Achievement:</strong> 47 questions in 40 minutes testing knowledge across number operations, algebra, geometry, measurement, data analysis, and probability</li>
                                    <li><strong>Essay (Unscored):</strong> 1 prompt in 30 minutes sent to schools to demonstrate writing ability</li>
                                </ul>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>When should I start preparing for the ISEE?</h3>
                                <div class="faq-toggle"></div>
                            </div>
                            <div class="faq-answer">
                                <p><strong>12 Months Before Test:</strong> Begin with diagnostic assessment, build vocabulary systematically, review fundamental math concepts, and establish consistent study habits.</p>
                                <p><strong>9-10 Months Before:</strong> Focus on mastering content in each section, learn test-taking strategies, practice timed drills, and begin essay writing development.</p>
                                <p><strong>6-8 Months Before:</strong> Tackle challenging problems, begin full-length practice tests, analyze results, and strengthen weak areas.</p>
                                <p><strong>3-5 Months Before:</strong> Increase practice test frequency to bi-weekly, fine-tune time management, and practice remaining calm under pressure.</p>
                                <p><strong>Final 8-12 Weeks:</strong> Take weekly practice tests under actual conditions, maintain consistency, and build test-day confidence.</p>
                                <p><strong>Final 2 Weeks:</strong> Light review only—avoid cramming. Focus on rest, confidence-building, and test-day logistics.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>How often can I take the ISEE?</h3>
                                <div class="faq-toggle"></div>
                            </div>
                            <div class="faq-answer">
                                <p>Students may take the ISEE only once per testing season: Fall (August-November), Winter (December-March), or Spring/Summer (April-July). Realistically, only Fall and early Winter (December) testing are viable for most students, as independent school application deadlines typically fall in early January.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>What is a good ISEE score?</h3>
                                <div class="faq-toggle"></div>
                            </div>
                            <div class="faq-answer">
                                <p>Competitive independent schools typically look for scores in the 8-9 stanine range (89th-99th percentile). Elite schools often expect scores consistently in the 9th stanine across all sections.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Is the essay section scored?</h3>
                                <div class="faq-toggle"></div>
                            </div>
                            <div class="faq-answer">
                                <p>No, the essay is not scored. However, it is sent directly to schools along with your scores, providing admissions officers insight into your writing ability, creativity, and thought process. A well-written essay can strengthen your application.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="cta-section">
                    <h2 style="color: white;">Ready to Begin Your ISEE Journey?</h2>
                    <p style="color: white;">Contact NYC STEM Club today to schedule a diagnostic assessment and learn more about our comprehensive ISEE preparation programs for all three levels.</p>
                    <?php echo do_shortcode('[inquiry_button]'); ?>
                </div>

                <!-- Testimonials Section -->
                <?php echo do_shortcode('[testimonials]'); ?>

            </div>
        </article>
    </main>
</div>

<script>
// FAQ Accordion Functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', function() {
            // Toggle active class on clicked item
            item.classList.toggle('active');

            // Optional: Close other items (comment out if you want multiple open at once)
            // faqItems.forEach(otherItem => {
            //     if (otherItem !== item) {
            //         otherItem.classList.remove('active');
            //     }
            // });
        });
    });
});
</script>

<?php
/**
 * FAQPage Schema Markup for SEO/AEO
 * Generates JSON-LD structured data for ISEE FAQs on this page
 */
$faq_schema_items = array(
    array(
        'question' => "What sections are on the ISEE test?",
        'answer' => "The ISEE consists of five sections: Verbal Reasoning (40 questions in 20 minutes testing word meanings, relationships, and sentence completion), Quantitative Reasoning (37 questions in 35 minutes evaluating mathematical problem-solving), Reading Comprehension (36 questions in 35 minutes measuring understanding of passages across literature, science, history, and current events), Mathematics Achievement (47 questions in 40 minutes testing knowledge across number operations, algebra, geometry, measurement, data analysis, and probability), and Essay (1 prompt in 30 minutes, unscored but sent to schools to demonstrate writing ability)."
    ),
    array(
        'question' => "When should I start preparing for the ISEE?",
        'answer' => "We recommend starting 12 months before the test with diagnostic assessment and vocabulary building. At 9-10 months, focus on mastering content and test-taking strategies. At 6-8 months, tackle challenging problems and begin full-length practice tests. At 3-5 months, increase practice test frequency to bi-weekly. In the final 8-12 weeks, take weekly practice tests under actual conditions. The final 2 weeks should be light review only—focus on rest and confidence-building."
    ),
    array(
        'question' => "How often can I take the ISEE?",
        'answer' => "Students may take the ISEE only once per testing season: Fall (August-November), Winter (December-March), or Spring/Summer (April-July). Realistically, only Fall and early Winter (December) testing are viable for most students, as independent school application deadlines typically fall in early January."
    ),
    array(
        'question' => "What is a good ISEE score?",
        'answer' => "Competitive independent schools typically look for scores in the 8-9 stanine range (89th-99th percentile). Elite schools often expect scores consistently in the 9th stanine across all sections."
    ),
    array(
        'question' => "Is the essay section scored?",
        'answer' => "No, the essay is not scored. However, it is sent directly to schools along with your scores, providing admissions officers insight into your writing ability, creativity, and thought process. A well-written essay can strengthen your application."
    )
);

// Build FAQPage schema
$faq_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array()
);

foreach ($faq_schema_items as $item) {
    $faq_schema['mainEntity'][] = array(
        '@type' => 'Question',
        'name' => $item['question'],
        'acceptedAnswer' => array(
            '@type' => 'Answer',
            'text' => $item['answer']
        )
    );
}

echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";

get_footer();
