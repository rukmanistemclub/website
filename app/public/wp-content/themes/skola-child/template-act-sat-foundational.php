<?php
/**
 * Template Name: ACT-SAT Foundational Course - Full Width [OBSOLETE - DO NOT USE]
 * Description: Streamlined template for ACT-SAT Foundational Course page
 *
 * ⚠️ OBSOLETE - 2025-01-11
 * This template is no longer in use. The ACT/SAT courses now use the
 * Custom Post Type "course" with single-course.php template.
 * Location: /wp-content/plugins/nyc-stem-courses/templates/single-course.php
 *
 * This file is kept for reference only and should be deleted once confirmed
 * that no pages are using it.
 */

// STOP - This template should not be used
wp_die('This template is obsolete. Please use the Custom Post Type "course" instead.');

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
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.6;
        color: #333;
    }

    /* =============================
       HERO SECTION
       ============================= */
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

    .hero-content h1 {
        font-size: 48px !important;
        font-weight: 800 !important;
        color: #ffffff !important;
        margin-bottom: 20px !important;
        line-height: 1.2 !important;
        letter-spacing: -1px;
    }

    .hero-excerpt {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.9) !important;
        margin-bottom: 40px !important;
        font-weight: 400 !important;
        line-height: 1.6 !important;
    }

    .cta-group {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    /* Hero Card - Track Record */
    .hero-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .hero-card h3 {
        font-size: 24px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 25px !important;
        text-align: center !important;
        line-height: 1.3 !important;
    }

    .hero-card-grid {
        display: block;
    }

    .card-stat-box {
        background: linear-gradient(135deg, #f8fafc, #ffffff);
        border-radius: 12px;
        padding: 20px;
        border: 2px solid #e8f4f8;
        transition: all 0.3s ease;
    }

    .card-stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(40, 175, 207, 0.2);
        border-color: #28AFCF;
    }

    .card-stat-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #28AFCF, #134958);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .card-stat-icon svg {
        width: 24px;
        height: 24px;
        color: white;
    }

    .card-stat-number {
        font-size: 32px !important;
        font-weight: 800 !important;
        color: #134958 !important;
        display: block;
        line-height: 1 !important;
        margin-bottom: 8px !important;
    }

    .card-stat-label {
        font-size: 14px !important;
        color: #64748b !important;
        line-height: 1.5 !important;
        font-weight: 400 !important;
    }

    /* =============================
       SECTIONS
       ============================= */
    .section-white {
        background: white;
        padding: 60px 20px;
    }

    .section-light {
        background: #F7F9FB;
        padding: 60px 20px;
    }

    .content-section {
        max-width: 1200px;
        margin: 0 auto;
    }

    .content-section h2 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: #134958 !important;
        text-align: center !important;
        margin-bottom: 15px !important;
    }

    .content-section > p {
        text-align: center;
        max-width: 900px;
        margin: 0 auto 40px;
        font-size: 18px;
        line-height: 1.6;
        color: #555;
    }

    /* Callout Box */
    .callout-box {
        background: linear-gradient(135deg, #E8F5F9, #F0F9FC);
        border-left: 5px solid #28AFCF;
        border-radius: 12px;
        padding: 30px 40px;
        margin: 40px auto;
        max-width: 1000px;
        box-shadow: 0 4px 20px rgba(40, 175, 207, 0.1);
    }

    .callout-box h3 {
        font-size: 24px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 15px !important;
        line-height: 1.3 !important;
    }

    .callout-box p {
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #333 !important;
        margin-bottom: 15px !important;
    }

    .callout-box ul {
        margin: 15px 0 20px 25px;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    .callout-box li {
        margin-bottom: 8px;
    }

    .callout-box .btn-link {
        display: inline-block;
        background: #28AFCF;
        color: white;
        padding: 14px 28px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s;
        margin: 15px 0 10px 0;
    }

    .callout-box .btn-link:hover {
        background: #134958;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(19, 73, 88, 0.3);
    }

    .callout-details {
        font-size: 14px !important;
        color: #666 !important;
        line-height: 1.5 !important;
        margin-top: 15px !important;
    }

    /* Module Cards */
    .modules-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin: 50px auto;
        max-width: 1200px;
    }

    .module-card {
        background: white;
        border-radius: 15px;
        padding: 30px 25px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border-top: 5px solid #28AFCF;
        transition: all 0.3s ease;
        text-align: center;
    }

    .module-card:nth-child(2) {
        border-top-color: #134958;
    }

    .module-card:nth-child(3) {
        border-top-color: #FF7F07;
    }

    .module-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .module-icon {
        font-size: 64px;
        margin-bottom: 20px;
        display: block;
    }

    .module-title {
        font-size: 24px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 8px !important;
        line-height: 1.3 !important;
    }

    .module-timeline {
        font-size: 14px !important;
        color: #28AFCF !important;
        font-weight: 600 !important;
        margin-bottom: 20px !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .module-card ul {
        text-align: left;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .module-card li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .module-card li::before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    /* Timeline Visual */
    .timeline-visual {
        max-width: 900px;
        margin: 50px auto;
        padding: 40px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .timeline-step {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        position: relative;
    }

    .timeline-step:last-child {
        margin-bottom: 0;
    }

    .timeline-step::after {
        content: '';
        position: absolute;
        left: 30px;
        top: 60px;
        width: 3px;
        height: calc(100% + 30px);
        background: linear-gradient(to bottom, #28AFCF, #E8F5F9);
    }

    .timeline-step:last-child::after {
        display: none;
    }

    .timeline-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #28AFCF, #134958);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        font-weight: 700;
        flex-shrink: 0;
        margin-right: 25px;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 15px rgba(40, 175, 207, 0.3);
    }

    .timeline-content {
        flex: 1;
    }

    .timeline-content h4 {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 8px !important;
        line-height: 1.3 !important;
    }

    .timeline-content p {
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #555 !important;
        margin: 0 !important;
    }

    .timeline-note {
        background: #FFF9F0;
        border-left: 4px solid #F0B268;
        padding: 20px;
        border-radius: 8px;
        margin-top: 30px;
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .timeline-note strong {
        color: #134958;
        font-weight: 700;
    }

    /* Comparison Table */
    .comparison-table {
        max-width: 1100px;
        margin: 50px auto;
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .comparison-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .comparison-table th {
        background: linear-gradient(135deg, #134958, #28AFCF);
        color: white;
        padding: 20px;
        text-align: left;
        font-size: 18px;
        font-weight: 600;
    }

    .comparison-table td {
        padding: 20px;
        border-bottom: 1px solid #E8F5F9;
        font-size: 16px;
        line-height: 1.6;
        vertical-align: top;
    }

    .comparison-table tr:last-child td {
        border-bottom: none;
    }

    .comparison-table tr:nth-child(even) {
        background: #F8FAFB;
    }

    .comparison-table td:first-child {
        font-weight: 700;
        color: #134958;
        width: 30%;
    }

    .comparison-table .checkmark {
        color: #28AFCF;
        font-weight: 700;
        margin-right: 5px;
    }

    .comparison-table .highlight-box {
        background: #E8F5F9;
        padding: 15px;
        border-radius: 8px;
        margin-top: 10px;
        border-left: 3px solid #28AFCF;
    }

    .comparison-table .highlight-box strong {
        color: #134958;
    }

    /* Course Details Box */
    .course-details-box {
        background: #F7F9FB;
        border-radius: 15px;
        padding: 35px 40px;
        max-width: 1000px;
        margin: 50px auto;
        border-left: 5px solid #28AFCF;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .course-details-box h3 {
        font-size: 24px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 25px !important;
        line-height: 1.3 !important;
    }

    .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .detail-section h4 {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #28AFCF !important;
        margin-bottom: 12px !important;
        line-height: 1.3 !important;
    }

    .detail-section ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .detail-section li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .detail-section li::before {
        content: "▸";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
    }

    /* Format Cards Compact */
    .formats-compact {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        max-width: 1000px;
        margin: 40px auto;
    }

    .format-compact-card {
        background: white;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border-top: 4px solid #28AFCF;
        transition: all 0.3s ease;
    }

    .format-compact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .format-icon {
        font-size: 48px;
        margin-bottom: 15px;
        display: block;
    }

    .format-compact-card h4 {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 8px !important;
        line-height: 1.3 !important;
    }

    .format-compact-card p {
        font-size: 14px !important;
        color: #666 !important;
        line-height: 1.5 !important;
        margin-bottom: 10px !important;
    }

    .format-compact-card .badge-small {
        display: inline-block;
        background: #F0B268;
        color: white;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 700;
        margin-top: 5px;
    }

    .formats-link {
        text-align: center;
        margin-top: 25px;
    }

    .formats-link a {
        color: #28AFCF;
        text-decoration: none;
        font-weight: 700;
        font-size: 16px;
        transition: color 0.3s;
    }

    .formats-link a:hover {
        color: #134958;
        text-decoration: underline;
    }

    /* FAQ Section */
    .faq-section {
        max-width: 1000px;
        margin: 0 auto;
    }

    .faq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        margin: 40px 0;
    }

    .faq-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        border: 1px solid #E8F5F9;
        transition: all 0.3s ease;
    }

    .faq-card:hover {
        box-shadow: 0 4px 20px rgba(0,0,0,0.12);
    }

    .faq-header {
        width: 100%;
        padding: 20px 25px;
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-align: left;
        transition: background 0.3s ease;
    }

    .faq-header:hover {
        background: #F8FAFB;
    }

    .faq-question {
        font-size: 18px !important;
        font-weight: 700 !important;
        color: #134958 !important;
        margin: 0 !important;
        flex: 1;
        line-height: 1.3 !important;
    }

    .faq-icon {
        flex-shrink: 0;
        margin-left: 20px;
        color: #28AFCF;
        transition: transform 0.3s ease;
    }

    .faq-card.active .faq-icon {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-answer-content {
        padding: 0 25px 25px 25px;
    }

    .faq-answer p {
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #555 !important;
        margin-bottom: 15px !important;
    }

    .faq-answer ul {
        margin: 15px 0 15px 25px;
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .faq-answer li {
        margin-bottom: 10px;
    }

    .faq-card.active .faq-answer {
        max-height: 1000px;
    }

    /* Final CTA */
    .final-cta {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 60px 20px;
        text-align: center;
    }

    .final-cta h2 {
        font-size: 32px !important;
        font-weight: 700 !important;
        margin-bottom: 15px !important;
        color: white !important;
        line-height: 1.3 !important;
    }

    .final-cta p {
        font-size: 18px !important;
        margin-bottom: 35px !important;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6 !important;
        color: rgba(255, 255, 255, 0.95) !important;
    }

    .final-cta .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .final-cta .cta-button {
        padding: 16px 32px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        font-size: 18px;
        transition: all 0.3s;
    }

    .final-cta .cta-primary {
        background: #FF7F07;
        color: white;
    }

    .final-cta .cta-primary:hover {
        background: #e66f00;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 127, 7, 0.4);
    }

    .final-cta .cta-secondary {
        background: white;
        color: #134958;
    }

    .final-cta .cta-secondary:hover {
        background: #F0F9FC;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
    }

    /* NEW STYLES FOR REDESIGNED COURSE DESCRIPTION */

    /* Focus Box with Pathway Visual */
    .focus-box-primary {
        background: linear-gradient(135deg, #E8F5F9, #F0F9FC);
        border: 2px solid #28AFCF;
        border-radius: 16px;
        padding: 40px;
        margin: 40px 0;
        box-shadow: 0 8px 30px rgba(40, 175, 207, 0.15);
    }

    .focus-box-primary h3 {
        font-size: 24px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        text-align: center !important;
        margin-bottom: 20px !important;
    }

    /* Pathway Visual - Chevron Timeline */
    .pathway-visual {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 30px 0;
        gap: 15px;
    }

    .pathway-step {
        flex: 1;
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border-top: 4px solid #28AFCF;
        transition: all 0.3s ease;
    }

    .pathway-step:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(40, 175, 207, 0.2);
    }

    .step-badge {
        display: inline-block;
        background: linear-gradient(135deg, #28AFCF, #134958);
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .pathway-step h4 {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 8px !important;
    }

    .step-timeline {
        font-size: 14px !important;
        color: #28AFCF !important;
        font-weight: 600 !important;
        margin-bottom: 10px !important;
    }

    .pathway-step p:last-child {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
        margin: 0;
    }

    .pathway-arrow {
        font-size: 28px;
        color: #28AFCF;
        font-weight: 700;
        flex-shrink: 0;
    }

    /* Decision Callout */
    .decision-callout {
        background: #FFF9F0;
        border-left: 5px solid #F0B268;
        border-radius: 8px;
        padding: 25px;
        margin: 30px 0;
    }

    .decision-callout p {
        margin-bottom: 10px;
        font-size: 16px;
        line-height: 1.6;
    }

    .link-primary {
        color: #28AFCF;
        font-weight: 700;
        text-decoration: none;
        transition: color 0.3s;
    }

    .link-primary:hover {
        color: #134958;
        text-decoration: underline;
    }

    /* Curriculum Grid - Phase Cards */
    .curriculum-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin: 40px 0;
    }

    .phase-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border-top: 4px solid #28AFCF;
        transition: all 0.3s ease;
    }

    .phase-card:nth-child(2) {
        border-top-color: #134958;
    }

    .phase-card:nth-child(3) {
        border-top-color: #FF7F07;
    }

    .phase-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .phase-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .phase-icon {
        font-size: 48px;
        display: block;
        margin-bottom: 15px;
    }

    .phase-header h3 {
        font-size: 20px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 8px !important;
    }

    .phase-duration {
        display: block;
        font-size: 14px;
        color: #28AFCF;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .phase-highlights {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .phase-highlights li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .phase-highlights li::before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    .phase-bonus {
        margin-top: 15px;
        padding: 12px;
        background: #FFF9F0;
        border-radius: 8px;
        font-size: 14px !important;
        color: #134958 !important;
        font-weight: 600 !important;
        text-align: center;
    }

    /* Comparison Grid */
    .comparison-grid {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        gap: 30px;
        align-items: center;
        margin: 40px 0;
        padding: 40px;
        background: linear-gradient(135deg, #F8FAFB, #FFFFFF);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .comparison-col {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border: 2px solid #E8F5F9;
    }

    .comparison-title {
        font-size: 20px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        text-align: center !important;
        margin-bottom: 20px !important;
        padding-bottom: 15px;
        border-bottom: 3px solid #28AFCF;
    }

    .comparison-item {
        padding: 12px 0;
        border-bottom: 1px solid #F0F9FC;
        font-size: 16px;
        line-height: 1.6;
    }

    .comparison-item:last-child {
        border-bottom: none;
    }

    .comparison-vs {
        font-size: 24px;
        font-weight: 700;
        color: #28AFCF;
        text-align: center;
    }

    /* Details Compact */
    .details-compact {
        max-width: 900px;
        margin: 40px auto;
    }

    .detail-row {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 25px;
        background: white;
        border-radius: 12px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        border-left: 4px solid #28AFCF;
        transition: all 0.3s ease;
    }

    .detail-row:hover {
        box-shadow: 0 4px 20px rgba(40, 175, 207, 0.15);
        transform: translateX(5px);
    }

    .detail-icon {
        font-size: 32px;
        flex-shrink: 0;
    }

    .detail-content h4 {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        margin-bottom: 8px !important;
    }

    .detail-content p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
        margin: 0;
    }

    /* Commitment Box */
    .commitment-box {
        background: linear-gradient(135deg, #134958, #28AFCF);
        color: white;
        border-radius: 16px;
        padding: 40px;
        margin: 50px 0;
        text-align: center;
        box-shadow: 0 8px 30px rgba(19, 73, 88, 0.3);
    }

    .commitment-box h3 {
        font-size: 24px !important;
        font-weight: 600 !important;
        color: white !important;
        margin-bottom: 15px !important;
    }

    .commitment-box p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 15px;
        color: rgba(255, 255, 255, 0.95);
    }

    .commitment-box strong {
        color: #F0B268;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .modules-grid,
        .formats-compact,
        .curriculum-grid {
            grid-template-columns: 1fr;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }

        .pathway-visual {
            flex-direction: column;
        }

        .pathway-arrow {
            transform: rotate(90deg);
            font-size: 24px;
        }

        .comparison-grid {
            grid-template-columns: 1fr;
            padding: 20px;
        }

        .comparison-vs {
            display: none;
        }
    }

    @media (max-width: 968px) {
        .timeline-row {
            flex-direction: column !important;
            gap: 15px !important;
        }

        .timeline-row > div[style*="right: -12px"] {
            display: none !important;
        }

        .two-col {
            grid-template-columns: 1fr !important;
        }
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 32px !important;
        }

        .content-section h2 {
            font-size: 24px !important;
        }

        .comparison-table {
            overflow-x: auto;
        }

        .timeline-visual {
            padding: 20px;
        }

        .hero-container {
            padding: 30px 20px;
        }

        .section-white,
        .section-light {
            padding: 40px 15px;
        }

        .focus-box-primary {
            padding: 25px;
        }

        .pathway-step {
            padding: 15px;
        }

        .phase-card,
        .comparison-col {
            padding: 20px;
        }

        .detail-row {
            flex-direction: column;
            padding: 20px;
        }

        .detail-icon {
            font-size: 28px;
        }

        .commitment-box {
            padding: 30px 20px;
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
                        <h1>SAT/ACT Foundational Program:<br>Build Your Test Success from the Ground Up</h1>
                        <p class="hero-excerpt">Our comprehensive 5-6 month program for students who need time to master advanced math, develop critical reading skills, and build test-taking strategies. Perfect for sophomores starting early or juniors closing foundational gaps.</p>

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

            <!-- Is This Course Right for You? -->
            <section class="section-white">
                <div class="content-section">
                    <div class="callout-box">
                        <h3>💡 Not sure if you need the Foundational Program or a Bootcamp?</h3>
                        <p>We offer multiple SAT/ACT prep formats designed for different student needs and timelines. Our Foundational Program is ideal for students who:</p>
                        <ul>
                            <li>Are in Sophomore year (ideal starting point)</li>
                            <li>Have 200+ points to gain on SAT or 6-9 points on ACT</li>
                            <li>Are currently taking Algebra 2 or need math foundations</li>
                            <li>Want comprehensive prep, not just test-taking tricks</li>
                        </ul>

                        <a href="/sat-act-test-prep/" class="btn-link">View Complete SAT/ACT Prep Guide →</a>

                        <p class="callout-details"><strong>This comprehensive guide will help you understand:</strong><br>
                        • SAT vs ACT - which test is right for you<br>
                        • All available formats (Foundational, Bootcamp, Private)<br>
                        • Recommended timelines by grade level<br>
                        • How to choose the best path for your goals</p>
                    </div>
                </div>
            </section>

            <!-- Foundational Course Section -->
            <section class="section-white">
                <div class="content-section">
                    <!-- Foundational Course Section - Visual Appeal -->
                    <div style="margin: 40px 0;">

                        <!-- Who Should Take This - Elevated Cards with Tilt -->
                        <div style="background: white; padding: 35px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); margin-bottom: 25px; position: relative;">

                            <!-- Decorative corner accent -->
                            <div style="position: absolute; top: 0; right: 0; width: 100px; height: 100px; background: linear-gradient(135deg, transparent 50%, rgba(40, 175, 207, 0.05) 50%); border-radius: 0 12px 0 0;"></div>

                            <div style="text-align: center; margin-bottom: 28px;">
                                <div style="display: inline-block; background: linear-gradient(135deg, #134958 0%, #0d3540 100%); color: white; padding: 8px 24px; border-radius: 25px; font-size: 14px; font-weight: 600; letter-spacing: 1.5px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(19, 73, 88, 0.3);">IS THIS RIGHT FOR YOU?</div>
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0 0 8px;">Choose Your Path</h3>
                                <p style="font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.5; color: #555; margin: 0;">
                                    We begin with a diagnostic assessment to determine if this comprehensive course matches your needs and goals.
                                </p>
                            </div>

                            <!-- Two Column: Tilted Cards -->
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">

                                <!-- Ideal For - Elevated Card -->
                                <div style="background: linear-gradient(135deg, #e8f5f7 0%, #d4eef6 100%); padding: 28px; border-radius: 12px; border-top: 5px solid #28AFCF; transform: rotate(-0.5deg); box-shadow: 0 6px 18px rgba(40, 175, 207, 0.15); position: relative;">
                                    <div style="position: absolute; top: 15px; right: 15px; width: 60px; height: 60px; background: rgba(40, 175, 207, 0.1); border-radius: 50%; transform: rotate(15deg);"></div>

                                    <div style="transform: rotate(0.5deg);">
                                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 18px;">
                                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #28AFCF 0%, #1a9dbf 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(40, 175, 207, 0.3);">
                                                <span style="color: white; font-size: 20px; font-weight: 700;">✓</span>
                                            </div>
                                            <h4 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0;">Ideal For</h4>
                                        </div>

                                        <ul style="list-style: none; padding: 0; margin: 0 0 18px 0;">
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                                <strong>Sophomores:</strong> Starting spring semester (ideal timeline)
                                            </li>
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                                <strong>Juniors:</strong> With foundational gaps (200+ pts below SAT goal or 6-9 pts below ACT goal, OR taking Algebra 2 now)
                                            </li>
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                                Students who need core content mastery
                                            </li>
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                                Undecided between SAT and ACT
                                            </li>
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                                Want comprehensive preparation (not just test-taking tricks)
                                            </li>
                                        </ul>

                                        <div style="background: white; padding: 14px; border-radius: 8px; border-left: 3px solid #28AFCF; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                                            <p style="font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.5; color: #555; margin: 0;">
                                                <strong style="color: #134958;">Note:</strong> Sophomores get the full strategic advantage, but juniors with significant gaps will benefit from this foundational work before intensive test prep.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Consider Alternatives - Elevated Card -->
                                <div style="background: linear-gradient(135deg, #fff9f0 0%, #fff3e0 100%); padding: 28px; border-radius: 12px; border-top: 5px solid #FF7F07; transform: rotate(0.5deg); box-shadow: 0 6px 18px rgba(255, 127, 7, 0.15); position: relative;">
                                    <div style="position: absolute; top: 15px; right: 15px; width: 60px; height: 60px; background: rgba(255, 127, 7, 0.1); border-radius: 50%; transform: rotate(-15deg);"></div>

                                    <div style="transform: rotate(-0.5deg);">
                                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 18px;">
                                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #FF7F07 0%, #e66f00 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(255, 127, 7, 0.3);">
                                                <span style="color: white; font-size: 20px; font-weight: 700;">→</span>
                                            </div>
                                            <h4 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0;">Consider Alternatives If You:</h4>
                                        </div>

                                        <ul style="list-style: none; padding: 0; margin: 0 0 18px 0;">
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #FF7F07;">▸</span>
                                                Have strong content mastery already
                                            </li>
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #FF7F07;">▸</span>
                                                Need only 100-150 point improvement
                                            </li>
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #FF7F07;">▸</span>
                                                Starting junior year (too late for Module 1)
                                            </li>
                                            <li style="padding: 8px 0 8px 30px; position: relative; font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.6; color: #333;">
                                                <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #FF7F07;">▸</span>
                                                Only have 6-8 weeks available
                                            </li>
                                        </ul>

                                        <div style="background: white; padding: 14px; border-radius: 8px; border-left: 3px solid #F0B268; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                                            <p style="font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.5; color: #555; margin: 0;">
                                                <strong style="color: #134958;">Try:</strong> Summer Intensive Bootcamp or Private Tutoring instead
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Course Structure - Overlapping Cards Style -->
                        <div style="background: linear-gradient(135deg, white 0%, #f8f9fa 100%); padding: 40px 35px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); margin-bottom: 25px; position: relative; overflow: hidden;">

                            <!-- Background pattern -->
                            <div style="position: absolute; top: 0; left: 0; right: 0; height: 120px; background: linear-gradient(135deg, rgba(40, 175, 207, 0.03) 0%, rgba(19, 73, 88, 0.03) 100%); border-radius: 12px 12px 0 0;"></div>

                            <div style="text-align: center; margin-bottom: 28px; position: relative; z-index: 1;">
                                <div style="display: inline-block; background: linear-gradient(135deg, #28AFCF 0%, #1a9dbf 100%); color: white; padding: 8px 24px; border-radius: 25px; font-size: 14px; font-weight: 600; letter-spacing: 1.5px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(40, 175, 207, 0.3);">COURSE STRUCTURE</div>
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0 0 8px;">What's Included</h3>
                                <p style="font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.5; color: #555; margin: 0;">
                                    5-6 months (Spring Sophomore Year: January - June)
                                </p>
                            </div>

                            <!-- What's Included - Tight & Centered -->
                            <div style="max-width: 700px; margin: 0 auto 25px; background: white; padding: 25px 30px; border-radius: 10px; border: 2px solid #28AFCF; box-shadow: 0 4px 12px rgba(40, 175, 207, 0.15);">

                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <li style="padding: 8px 0 8px 28px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.6; color: #333;">
                                        <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                        <strong style="color: #134958;">Core Content Mastery:</strong> Math, Reading, Writing across all test sections
                                    </li>
                                    <li style="padding: 8px 0 8px 28px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.6; color: #333;">
                                        <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                        <strong style="color: #134958;">Test-Taking Strategies:</strong> Fundamental approaches and time management
                                    </li>
                                    <li style="padding: 8px 0 8px 28px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.6; color: #333;">
                                        <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                        <strong style="color: #134958;">Practice Testing:</strong> 3 full-length diagnostic and practice tests
                                    </li>
                                    <li style="padding: 8px 0 8px 28px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.6; color: #333;">
                                        <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                        <strong style="color: #134958;">Test Selection:</strong> SAT vs ACT determination and guidance
                                    </li>
                                    <li style="padding: 8px 0 8px 28px; position: relative; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.6; color: #333;">
                                        <span style="position: absolute; left: 0; top: 8px; font-weight: 700; font-size: 18px; color: #28AFCF;">▸</span>
                                        <strong style="color: #134958;">Progress Tracking & Analysis:</strong> Comprehensive score analysis and personalized improvement plans
                                    </li>
                                </ul>
                            </div>

                            <!-- Goal Box - Angled -->
                            <div style="background: linear-gradient(135deg, #134958 0%, #0d3540 100%); padding: 25px; border-radius: 12px; text-align: center; transform: rotate(-0.3deg); box-shadow: 0 6px 18px rgba(19, 73, 88, 0.25); position: relative; overflow: hidden;">
                                <div style="position: absolute; bottom: -20px; right: -20px; width: 120px; height: 120px; background: rgba(255, 255, 255, 0.05); border-radius: 50%;"></div>
                                <div style="transform: rotate(0.3deg); position: relative; z-index: 1;">
                                    <div style="display: inline-block; background: rgba(255, 127, 7, 0.9); padding: 4px 14px; border-radius: 15px; font-size: 14px; font-weight: 600; color: white; letter-spacing: 1px; margin-bottom: 10px;">COURSE GOAL</div>
                                    <h4 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 600; line-height: 1.3; color: white; margin: 0;">
                                        Establish a strong baseline score and prepare students for Module 2 (Summer Intensive) where they'll achieve their first competitive official test score
                                    </h4>
                                </div>
                            </div>

                        </div>

                        <!-- Format Options - Premium Cards -->
                        <div style="background: white; padding: 35px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); margin-bottom: 25px;">

                            <div style="text-align: center; margin-bottom: 28px;">
                                <div style="display: inline-block; background: linear-gradient(135deg, #F0B268 0%, #d99d52 100%); color: white; padding: 8px 24px; border-radius: 25px; font-size: 14px; font-weight: 600; letter-spacing: 1.5px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(240, 178, 104, 0.3);">FLEXIBLE FORMATS</div>
                                <h3 style="font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0;">Choose Your Learning Style</h3>
                            </div>

                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">

                                <!-- Small Group - Elevated -->
                                <div style="background: linear-gradient(135deg, #e8f5f7 0%, #d4eef6 100%); padding: 28px 22px; border-radius: 12px; text-align: center; border-top: 4px solid #28AFCF; position: relative; box-shadow: 0 6px 18px rgba(40, 175, 207, 0.12); transition: transform 0.3s;">
                                    <div style="position: absolute; top: -12px; right: 20px; background: linear-gradient(135deg, #28AFCF 0%, #1a9dbf 100%); color: white; padding: 4px 12px; border-radius: 15px; font-size: 14px; font-weight: 600; box-shadow: 0 3px 8px rgba(40, 175, 207, 0.3);">POPULAR</div>
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #28AFCF 0%, #1a9dbf 100%); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(40, 175, 207, 0.3);">
                                        <span style="color: white; font-size: 24px;">👥</span>
                                    </div>
                                    <h4 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0 0 12px;">Small Group</h4>
                                    <p style="font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.5; color: #555; margin: 0;">
                                        4-6 students per class<br>
                                        Collaborative learning<br>
                                        Peer motivation
                                    </p>
                                </div>

                                <!-- Semi-Private -->
                                <div style="background: linear-gradient(135deg, #fff9f0 0%, #fff3e0 100%); padding: 28px 22px; border-radius: 12px; text-align: center; border-top: 4px solid #FF7F07; box-shadow: 0 6px 18px rgba(255, 127, 7, 0.12);">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #FF7F07 0%, #e66f00 100%); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(255, 127, 7, 0.3);">
                                        <span style="color: white; font-size: 24px;">👤👤</span>
                                    </div>
                                    <h4 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0 0 12px;">Semi-Private</h4>
                                    <p style="font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.5; color: #555; margin: 0;">
                                        2-3 students per class<br>
                                        More individual attention<br>
                                        Flexible pacing
                                    </p>
                                </div>

                                <!-- Private 1-on-1 -->
                                <div style="background: linear-gradient(135deg, #fef9f0 0%, #fef5e8 100%); padding: 28px 22px; border-radius: 12px; text-align: center; border-top: 4px solid #F0B268; box-shadow: 0 6px 18px rgba(240, 178, 104, 0.12);">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #F0B268 0%, #d99d52 100%); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(240, 178, 104, 0.3);">
                                        <span style="color: white; font-size: 24px;">👤</span>
                                    </div>
                                    <h4 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 600; line-height: 1.3; color: #134958; margin: 0 0 12px;">Private 1-on-1</h4>
                                    <p style="font-family: 'Roboto', sans-serif; font-size: 14px; line-height: 1.5; color: #555; margin: 0;">
                                        Fully personalized<br>
                                        Custom schedule<br>
                                        Targeted instruction
                                    </p>
                                </div>

                            </div>
                        </div>

                        <!-- SAT vs ACT Callout - Floating Style -->
                        <div style="background: linear-gradient(135deg, #28AFCF 0%, #1a9dbf 100%); padding: 30px; border-radius: 12px; text-align: center; margin-bottom: 25px; box-shadow: 0 8px 24px rgba(40, 175, 207, 0.25); position: relative; overflow: hidden;">
                            <div style="position: absolute; top: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255, 255, 255, 0.08); border-radius: 50%;"></div>
                            <div style="position: absolute; bottom: -40px; right: -40px; width: 180px; height: 180px; background: rgba(255, 255, 255, 0.08); border-radius: 50%;"></div>

                            <div style="position: relative; z-index: 1;">
                                <h4 style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 600; line-height: 1.3; color: white; margin: 0 0 10px;">Not Sure Which Test to Take?</h4>
                                <p style="font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.6; color: white; margin: 0 0 20px; opacity: 0.95;">
                                    Read our guide on SAT vs. ACT to determine which test aligns with your strengths. Part of the Foundational Course includes helping you make this decision.
                                </p>
                                <?php echo do_shortcode('[inquiry_button text="Read SAT vs ACT Guide →" url="/resources/sat-vs-act-2025-which-test-is-right-for-you/" color="teal"]'); ?>
                            </div>
                        </div>

                        <!-- Final CTA - Premium Button -->
                        <div style="text-align: center;">
                            <?php echo do_shortcode('[inquiry_button]'); ?>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Learning Formats - Brief with Link -->
            <section class="section-light">
                <div class="content-section">
                    <h2>Choose Your Learning Style</h2>
                    <p>This course is available in multiple formats to match your needs</p>

                    <div class="formats-compact">
                        <div class="format-compact-card">
                            <span class="format-icon">🎓</span>
                            <h4>Small Group Classes</h4>
                            <p>Max 8 students<br>Collaborative learning</p>
                            <span class="badge-small">Most Popular</span>
                        </div>

                        <div class="format-compact-card">
                            <span class="format-icon">👤</span>
                            <h4>Private 1-on-1 Tutoring</h4>
                            <p>Personalized attention<br>Flexible schedule</p>
                            <span class="badge-small">Most Customized</span>
                        </div>

                        <div class="format-compact-card">
                            <span class="format-icon">🔄</span>
                            <h4>Hybrid Approach</h4>
                            <p>Group + Private combination<br>Best of both</p>
                            <span class="badge-small">Best Value</span>
                        </div>
                    </div>

                    <div class="formats-link">
                        <a href="/sat-act-test-prep/#formats">View Complete Format Comparison & Pricing →</a>
                    </div>
                </div>
            </section>

            <!-- Why Choose NYC STEM Club -->
            <?php echo do_shortcode('[why_choose_sat_act]'); ?>

            <!-- Ready to Achieve Your Target Score -->
            <section class="section-white">
                <div style="max-width: none !important; width: 100% !important; padding: 0 40px !important;">
                    <h2 style="text-align: center; margin-bottom: 20px;">Ready to achieve your target score?</h2>

                    <p style="font-size: 18px; line-height: 1.6; margin: 0 0 30px; text-align: center; max-width: none !important;">
                        Join the program where 96% of students improve their scores and over 80% achieve Ivy League-level results. Our expert instructors, proven strategies, and personalized approach have helped hundreds of students gain admission to their dream colleges. Start your journey with a free consultation and diagnostic assessment.
                    </p>

                    <div style="text-align: center;">
                        <?php echo do_shortcode('[inquiry_button]'); ?>
                    </div>
                </div>
            </section>

            <!-- FAQ Section - Course Specific -->
            <section class="section-white">
                <div class="content-section">
                    <div class="faq-section">
                        <h2>Frequently Asked Questions</h2>

                        <div class="faq-grid">
                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">Is the Foundational Program right for my child or should they do a Bootcamp?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p><strong>The Foundational Program is ideal if your child:</strong></p>
                                        <ul>
                                            <li>Is in 10th grade (sophomore year) - the ideal starting point</li>
                                            <li>Is in 11th grade but has 200+ SAT points or 6-9 ACT points to gain</li>
                                            <li>Is currently taking Algebra 2 or needs to strengthen geometry/trigonometry</li>
                                            <li>Has enough time (6+ months) before their first desired test attempt</li>
                                        </ul>
                                        <p><strong>Choose a Bootcamp if your child:</strong></p>
                                        <ul>
                                            <li>Is within 50-150 SAT points or 2-4 ACT points of their goal</li>
                                            <li>Already has strong math foundations (finished Algebra 2/Pre-calc)</li>
                                            <li>Needs intensive prep before a specific test date (6-8 weeks away)</li>
                                        </ul>
                                        <p>Still unsure? <a href="/sat-act-test-prep/" style="color: #28AFCF; font-weight: 700;">View our complete SAT/ACT Prep Guide</a> or schedule a free consultation and we'll assess which format is best for your child's situation.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">My child is a junior - is it too late for the Foundational Course?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p>It depends on timing. If it's fall/early winter of junior year and your child has foundational gaps, the Foundational Course is still your best option. You'll finish in spring and have summer for additional prep and 2-3 test attempts before application season.</p>
                                        <p>If it's late spring of junior year, a summer Bootcamp may be more appropriate to prepare for fall testing. We'll help you create the right timeline during your consultation.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">Can students do both Foundational AND Bootcamp?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p><strong>Yes! This is actually a common and effective strategy:</strong></p>
                                        <ul>
                                            <li>Complete Foundational Course (Jan-Jun) to build comprehensive skills</li>
                                            <li>Take first official test in June</li>
                                            <li>Do summer Bootcamp (Jul-Aug) for intensive review and fine-tuning</li>
                                            <li>Take second test in August/September with optimized strategies</li>
                                        </ul>
                                        <p>This "comprehensive + intensive" approach gives students the best of both worlds and often leads to the highest score improvements.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">What materials and resources are included?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p><strong>Everything needed for success:</strong></p>
                                        <ul>
                                            <li>Official College Board (SAT) and ACT practice tests</li>
                                            <li>Proprietary curriculum materials and workbooks</li>
                                            <li>Online practice platform access</li>
                                            <li>Homework assignments and answer explanations</li>
                                            <li>Progress tracking dashboard for parents</li>
                                            <li>Strategy guides for each test section</li>
                                        </ul>
                                        <p>No need to purchase additional prep books - we provide comprehensive materials.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">How is this different from just doing practice tests?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p>Practice tests alone won't close foundational gaps. Our program:</p>
                                        <ul>
                                            <li><strong>TEACHES</strong> advanced math concepts (geometry, trigonometry, complex algebra)</li>
                                            <li><strong>DEVELOPS</strong> critical reading and analytical skills from scratch</li>
                                            <li><strong>BUILDS</strong> test-taking strategies progressively</li>
                                            <li><strong>PROVIDES</strong> expert instruction, not just practice and review</li>
                                            <li><strong>TRACKS</strong> progress and adjusts instruction to each student's needs</li>
                                        </ul>
                                        <p>Think of it like learning a musical instrument - you need lessons AND practice, not just practice alone.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">Do you guarantee score improvements?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p>While we cannot guarantee specific scores (no ethical test prep company can), our track record speaks for itself:</p>
                                        <ul>
                                            <li>96% of students improve their scores</li>
                                            <li>Average 9-point ACT increase for foundational students</li>
                                            <li>Average 150+ point SAT increase for foundational students</li>
                                            <li>Many students exceed their initial goal scores</li>
                                        </ul>
                                        <p>Success requires consistent attendance, completion of homework, and practice between sessions. We provide the expertise and curriculum; students must bring effort and commitment.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">What are the requirements for online classes?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p>We maintain the same high standards for online students as in-person students:</p>
                                        <ul>
                                            <li><strong>Homework must be completed before every class</strong> - No exceptions. This is critical for keeping pace with the curriculum.</li>
                                            <li><strong>Homework must be submitted for grading</strong> - Instructors provide detailed feedback with annotations showing efficient strategies.</li>
                                            <li><strong>Recommended setup:</strong> iPad + laptop (iPad for viewing PDFs, laptop for Zoom). This dual-screen setup maximizes learning efficiency.</li>
                                            <li><strong>Cameras must be on</strong> - Engagement and visual interaction are critical for success in online learning.</li>
                                        </ul>
                                        <p><strong>Accountability:</strong> Incomplete or missed homework is escalated immediately to parents and leadership. Our online offerings match in-person quality through rigorous structure, accountability, and instructor excellence.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">What is the time commitment? How much homework should I expect?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p><strong>In-Class Time:</strong></p>
                                        <ul>
                                            <li>2-3 sessions per week</li>
                                            <li>1.5-2 hours per session</li>
                                            <li>Approximately 4-6 hours of instruction per week</li>
                                        </ul>
                                        <p><strong>Homework/Practice Time:</strong></p>
                                        <ul>
                                            <li>3-5 hours per week of homework and practice problems</li>
                                            <li>1-2 full-length practice tests per month (3-4 hours each)</li>
                                            <li>Total commitment: 10-15 hours per week including class time</li>
                                        </ul>
                                        <p>This time investment over 5-6 months builds the strong foundation needed for significant score improvements. Students who commit to this schedule see the best results.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">What happens if my child misses a class?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p><strong>For planned absences:</strong></p>
                                        <ul>
                                            <li>Notify us in advance whenever possible</li>
                                            <li>We provide class recordings and materials for review</li>
                                            <li>Students are responsible for completing missed work and homework before the next session</li>
                                        </ul>
                                        <p><strong>Make-up options:</strong></p>
                                        <ul>
                                            <li>Office hours with instructors (group review sessions)</li>
                                            <li>Optional private tutoring sessions (additional fee) for critical missed content</li>
                                            <li>Access to recorded class sessions for independent review</li>
                                        </ul>
                                        <p><strong>Important:</strong> Regular attendance is crucial for success. Students who miss more than 2-3 classes often struggle to keep pace with the curriculum. We recommend scheduling around known conflicts before enrolling.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <button class="faq-header" onclick="toggleFAQ(this)">
                                    <h3 class="faq-question">How do you handle students at different skill levels in a group class?</h3>
                                    <div class="faq-icon">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <p><strong>We use several strategies to ensure every student gets what they need:</strong></p>
                                        <ul>
                                            <li><strong>Diagnostic placement:</strong> Students are grouped with others at similar skill levels based on initial diagnostic testing</li>
                                            <li><strong>Differentiated homework:</strong> Advanced students receive challenge problems while students needing more practice get additional foundational work</li>
                                            <li><strong>Flexible pacing:</strong> We adjust the curriculum pace based on group mastery, ensuring no one falls behind</li>
                                            <li><strong>Small group sizes:</strong> With maximum 6-8 students per class, instructors can provide individualized attention</li>
                                            <li><strong>Progress monitoring:</strong> Regular assessments help us identify students who need additional support or more challenging material</li>
                                        </ul>
                                        <p>If a student is significantly ahead or behind their group, we'll recommend switching to a better-matched class or transitioning to private tutoring for optimal results.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p style="text-align: center; margin-top: 30px; font-size: 16px; color: #666;">
                            For general SAT/ACT questions, see our <a href="/sat-act-test-prep/" style="color: #28AFCF; font-weight: 700;">Complete Prep Guide</a> or visit our <a href="/resources/sat-vs-act-2025-which-test-is-right-for-you/" style="color: #28AFCF; font-weight: 700;">SAT vs ACT Comparison</a>
                        </p>
                    </div>
                </div>
            </section>

            <!-- Final CTA -->
            <section class="final-cta">
                <div class="content-section">
                    <h2>Ready to Build Your Foundation for Test Success?</h2>
                    <p>Schedule your free consultation and diagnostic assessment today.</p>
                    <div class="cta-buttons">
                        <?php echo do_shortcode('[inquiry_button]'); ?>
                        <?php echo do_shortcode('[inquiry_button text="View All SAT/ACT Programs" url="/sat-act-test-prep/" color="teal"]'); ?>
                    </div>
                </div>
            </section>
        </article>
    </main>
</div>

<script>
function toggleFAQ(button) {
    const card = button.closest('.faq-card');
    const answer = card.querySelector('.faq-answer');
    const isActive = card.classList.contains('active');

    // Close all other FAQs
    document.querySelectorAll('.faq-card.active').forEach(item => {
        if (item !== card) {
            item.classList.remove('active');
            item.querySelector('.faq-answer').style.maxHeight = null;
        }
    });

    // Toggle current FAQ
    if (isActive) {
        card.classList.remove('active');
        answer.style.maxHeight = null;
    } else {
        card.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
    }
}
</script>

<?php get_footer(); ?>
