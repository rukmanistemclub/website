<?php
/**
 * Template Name: SHSAT Landing Page
 * Description: Complete SHSAT program landing page ported from Elementor with v2.0 typography
 * Version: 2.0
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

    /* Typography v2.0 */
    body {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    /* Hero Section - Matching SHSAT FAQ Page */
    .shsat-hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%) !important;
        color: white !important;
        padding: 15px 20px !important;
        text-align: center !important;
        display: block !important;
    }

    .hero-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        display: block !important;
        text-align: center !important;
    }

    .shsat-hero h1,
    .shsat-hero .hero-container h1 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 48px !important;
        font-weight: 800 !important;
        line-height: 1.2 !important;
        color: white !important;
        margin-bottom: 20px !important;
        margin-top: 0 !important;
        text-align: center !important;
        display: block !important;
        width: 100% !important;
    }

    .shsat-hero h2,
    .shsat-hero .hero-container h2 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: #F0B26B !important;
        margin-bottom: 5px !important;
        margin-top: 20px !important;
        text-align: center !important;
        display: block !important;
        width: 100% !important;
    }

    .shsat-hero p,
    .shsat-hero .hero-container p {
        font-family: 'Roboto', sans-serif !important;
        font-size: 20px !important;
        line-height: 1.6 !important;
        color: white !important;
        margin: 0 auto 15px !important;
        max-width: 900px !important;
        text-align: center !important;
        display: block !important;
        width: 100% !important;
    }

    .shsat-hero p:last-of-type,
    .shsat-hero .hero-container p:last-of-type {
        margin-bottom: 40px !important;
    }

    .shsat-hero .hero-full-width,
    .shsat-hero .hero-container .hero-full-width {
        max-width: 100% !important;
    }

    .shsat-hero .hero-stat,
    .shsat-hero .hero-container .hero-stat {
        color: #F0B26B !important;
        font-weight: 600 !important;
        font-size: 24px !important;
        margin-bottom: 30px !important;
    }

    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .btn-view-programs {
        display: inline-block !important;
        background: #FF9574 !important;
        color: white !important;
        padding: 15px 35px !important;
        border-radius: 0 !important;
        font-family: 'Roboto', sans-serif !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        text-decoration: none !important;
        transition: all 0.3s !important;
        box-shadow: 0 4px 15px rgba(255, 149, 116, 0.3) !important;
        border: none !important;
    }

    .btn-view-programs:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 20px rgba(255, 149, 116, 0.5) !important;
        background: #ff8f84 !important;
        color: white !important;
        text-decoration: none !important;
    }

    /* Style inquiry button in hero to match */
    .hero-buttons .inquiry-button,
    .hero-buttons a[href*="contact"],
    .hero-buttons a.button,
    .hero-buttons .btn {
        display: inline-block !important;
        background: #FF9574 !important;
        color: white !important;
        padding: 15px 35px !important;
        border-radius: 0 !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        text-decoration: none !important;
        transition: all 0.3s !important;
        box-shadow: 0 4px 15px rgba(255, 149, 116, 0.3) !important;
        border: none !important;
    }

    .hero-buttons .inquiry-button:hover,
    .hero-buttons a[href*="contact"]:hover,
    .hero-buttons a.button:hover,
    .hero-buttons .btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 20px rgba(255, 149, 116, 0.5) !important;
        background: #ff8f84 !important;
        color: white !important;
        text-decoration: none !important;
    }

    /* Section Styles */
    .section {
        padding: 15px 20px 60px 20px;
        background: white;
    }

    .section-alt {
        background: #EBFCFF;
        padding: 1px 20px 5px 20px;
    }

    .section-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .section h2,
    .section-alt h2,
    .section-container > h2,
    .programs-section h2,
    .ready-section h2,
    .combined-approach h2,
    .related-title {
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: #134958 !important;
        text-align: center !important;
        margin-bottom: 40px !important;
    }

    .combined-approach h2 {
        color: #F0B26B !important;
    }

    .combined-approach .section-container h2 {
        color: #F0B26B !important;
    }

    section.ready-section h2,
    section.ready-section .section-container h2 {
        color: #FFFFFF !important;
        margin-bottom: 20px !important;
    }

    .section h3 {
        font-size: 24px;
        font-weight: 600;
        line-height: 1.3;
        color: #134958;
        margin-bottom: 15px;
    }

    .section h4 {
        font-size: 18px;
        font-weight: 600;
        line-height: 1.3;
        color: #134958;
        margin-bottom: 12px;
    }

    .section p {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        margin-bottom: 16px;
    }

    .section ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 20px;
    }

    .section ul li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    .section ul li:before {
        content: "✓";
        position: absolute;
        left: 0;
        font-size: 18px;
        font-weight: 700;
        color: #28AFCF;
    }

    /* Programs Tabs Section */
    .programs-section {
        background: #EBFCFF;
        padding: 15px 20px 60px 20px;
    }

    .programs-tabs {
        margin-top: 30px;
    }

    .tabs-nav {
        display: flex !important;
        gap: 0 !important;
        justify-content: flex-start !important;
        margin-bottom: 0 !important;
        flex-wrap: wrap !important;
    }

    .tab-button {
        background: #EBFCFF !important;
        border: 3px solid #28AFCF !important;
        border-bottom: 3px solid #28AFCF !important;
        border-right: none !important;
        padding: 15px 30px !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #134958 !important;
        cursor: pointer !important;
        transition: all 0.3s !important;
        margin-bottom: -3px !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .tab-button:first-child {
        border-top-left-radius: 8px !important;
    }

    .tab-button:last-child {
        border-right: 3px solid #28AFCF !important;
        border-top-right-radius: 8px !important;
    }

    .tab-button:hover {
        background: #d4f4fc !important;
    }

    .tab-button.active {
        background: white !important;
        border-bottom: 3px solid white !important;
        color: #134958 !important;
        position: relative !important;
        z-index: 10 !important;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .tab-panel {
        background: white !important;
        padding: 6px 40px 40px 40px !important;
        border: 3px solid #28AFCF !important;
        border-top: 3px solid #28AFCF !important;
        border-bottom-left-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
    }

    .tab-panel h3 {
        font-size: 18px !important;
        font-weight: 700 !important;
        color: #134958 !important;
        margin-top: 0 !important;
        margin-bottom: 5px !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .tab-panel h3:first-child {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }

    .tab-panel p {
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #333 !important;
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
        margin-bottom: 8px !important;
    }

    .tab-panel .schedule {
        font-size: 16px;
        color: #333;
        margin-bottom: 15px;
    }

    .tab-panel h4 {
        font-size: 16px !important;
        font-weight: 700 !important;
        color: #28AFCF !important;
        margin-bottom: 5px !important;
        font-family: 'Roboto', sans-serif !important;
    }

    .tab-panel > ul {
        list-style: none;
        padding: 0;
        margin: 0 0 10px 0;
    }

    .tab-panel > ul li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 5px;
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #333 !important;
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
    }

    .tab-panel > ul li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    .tab-two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 15px;
    }

    .tab-column h4 {
        font-size: 16px;
        font-weight: 700;
        color: #28AFCF;
        margin-bottom: 8px;
    }

    .tab-column p {
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #333 !important;
        margin-bottom: 8px !important;
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
    }

    .tab-column ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tab-column ul li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 5px;
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: #333 !important;
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
    }

    .tab-column ul li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    .best-for-box {
        background: #f8f9fa;
        border-left: 4px solid #134958;
        padding: 10px;
        margin-top: 10px;
    }

    .best-for-box p {
        margin: 0;
        padding: 0;
        font-size: 16px;
        color: #134958;
        font-weight: 600;
    }

    .best-for-box p strong {
        font-weight: 700;
    }

    /* Combined Approach Section */
    .combined-approach {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        padding: 15px 20px 30px 20px;
        text-align: center;
    }

    .combined-approach h2 {
        font-size: 32px !important;
        font-weight: 700 !important;
        color: #F0B26B !important;
        text-align: center !important;
        margin-bottom: 18px !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .combined-approach .approach-list {
        max-width: 700px;
        margin: 0 auto 20px;
        list-style: none;
        padding: 0;
        text-align: left;
    }

    .combined-approach .approach-list li {
        position: relative;
        padding-left: 40px;
        margin-bottom: 15px;
        font-size: 20px;
        font-weight: 600;
        line-height: 1.6;
        color: white;
        text-align: left;
    }

    .combined-approach .approach-list li:before {
        content: "✓";
        position: absolute;
        left: 0;
        top: 3px;
        color: #134958;
        font-weight: 700;
        font-size: 14px;
        background: #F0B26B;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    .combined-approach .description {
        font-size: 16px !important;
        line-height: 1.6 !important;
        color: white !important;
        max-width: 100% !important;
        width: 100% !important;
        margin: 0 auto 40px !important;
        font-weight: 400 !important;
        text-align: center !important;
    }

    .combined-approach p.description {
        color: white !important;
    }

    .combined-approach .btn-primary {
        background: #FF9574;
        display: inline-block;
        margin: 20px auto 0 auto;
    }

    .combined-approach .inquiry-button {
        text-align: center;
        display: block;
    }

    /* Why Choose Grid - Matching SAT/ACT Style */
    .why-choose-grid {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 20px !important;
        margin: 40px 0 !important;
    }

    .section .why-choose-grid .benefit-card,
    .why-choose-grid .benefit-card {
        background: white !important;
        padding: 20px !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
        border-top: 4px solid #28AFCF !important;
        border-left: 3px solid #28AFCF !important;
        text-align: left !important;
        transition: all 0.3s ease !important;
        min-height: 140px !important;
    }

    .why-choose-grid .benefit-card:nth-child(1) {
        border-left-color: #28AFCF !important;
    }

    .why-choose-grid .benefit-card:nth-child(2) {
        border-left-color: #FF7F07 !important;
    }

    .why-choose-grid .benefit-card:nth-child(3) {
        border-left-color: #F0B268 !important;
    }

    .why-choose-grid .benefit-card:nth-child(4) {
        border-left-color: #28A745 !important;
    }

    .why-choose-grid .benefit-card:hover {
        transform: translateY(-3px) !important;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12) !important;
    }

    .why-choose-grid .benefit-card .benefit-icon,
    .benefit-card .benefit-icon {
        width: 28px !important;
        height: 28px !important;
        border-radius: 6px !important;
        display: inline-block !important;
        vertical-align: middle !important;
        text-align: center !important;
        line-height: 28px !important;
        margin-right: 10px !important;
        float: left !important;
        flex-shrink: 0 !important;
    }

    .why-choose-grid .benefit-card .benefit-icon svg {
        width: 16px !important;
        height: 16px !important;
    }

    .why-choose-grid .benefit-card:nth-child(1) .benefit-icon {
        background: linear-gradient(135deg, #28AFCF, #1a9cb8) !important;
    }

    .why-choose-grid .benefit-card:nth-child(2) .benefit-icon {
        background: linear-gradient(135deg, #FF7F07, #e66f00) !important;
    }

    .why-choose-grid .benefit-card:nth-child(3) .benefit-icon {
        background: linear-gradient(135deg, #F0B268, #d99d52) !important;
    }

    .why-choose-grid .benefit-card:nth-child(4) .benefit-icon {
        background: linear-gradient(135deg, #28A745, #1e7e34) !important;
    }

    .why-choose-grid .benefit-card .benefit-icon svg,
    .benefit-icon svg {
        display: block !important;
        margin: auto !important;
    }

    .why-choose-grid .benefit-card h3,
    .benefit-card h3 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 18px !important;
        font-weight: 600 !important;
        line-height: 1.3 !important;
        color: #134958 !important;
        margin: 0 0 8px 0 !important;
        margin-left: 40px !important;
        margin-top: 0 !important;
        text-align: left !important;
    }

    .why-choose-grid .benefit-card p,
    .benefit-card p {
        font-family: 'Roboto', sans-serif !important;
        font-size: 15px !important;
        line-height: 1.6 !important;
        color: #333 !important;
        margin: 0 !important;
        font-weight: 400 !important;
        clear: both !important;
        text-align: left !important;
    }

    .why-choose-badge {
        background: linear-gradient(135deg, #134958, #1a5f73);
        border-radius: 12px;
        padding: 15px 20px;
        text-align: center;
        box-shadow: 0 6px 25px rgba(19, 73, 88, 0.3);
        margin-top: 20px;
    }

    .why-choose-badge .badge-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .why-choose-badge .badge-icon-text {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .why-choose-badge svg {
        flex-shrink: 0;
    }

    .why-choose-badge .badge-title {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        font-weight: 700;
        color: white;
        margin: 0;
    }

    .why-choose-badge .badge-subtitle {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.9);
    }

    /* Ready to Start Section */
    .ready-section {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        padding: 15px 20px 60px 20px;
        color: white;
        text-align: center;
    }

    section.ready-section h2,
    .ready-section .section-container h2,
    .ready-section h2 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: #FFFFFF !important;
        text-align: center !important;
        margin-bottom: 20px !important;
        margin-top: 0 !important;
        padding-bottom: 0 !important;
    }

    .ready-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 60px;
        max-width: 1200px;
        margin: 0 auto 40px;
        text-align: left;
    }

    .ready-column h3 {
        font-size: 24px !important;
        font-weight: 600 !important;
        line-height: 1.3 !important;
        color: white !important;
        text-align: left !important;
        margin-bottom: 25px !important;
    }

    .ready-column ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .ready-column ul li {
        position: relative;
        padding-left: 50px;
        margin-bottom: 15px;
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        line-height: 1.6;
        color: white;
        font-weight: 400;
    }

    .ready-column:first-child ul li:before {
        content: "✓";
        position: absolute;
        left: 0;
        width: 35px;
        height: 35px;
        background: #F0B26B;
        border-radius: 4px;
        color: white;
        font-weight: 700;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ready-column:last-child ul li:before {
        content: "→";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 35px;
        height: auto;
        background: transparent;
        color: #F0B26B;
        font-weight: 900;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    .ready-footer {
        text-align: center !important;
        max-width: 900px !important;
        margin: 30px auto 0 !important;
    }

    section.ready-section .ready-footer p,
    .ready-section .section-container .ready-footer p,
    .ready-section .ready-footer p,
    .ready-footer p {
        font-family: 'Roboto', sans-serif !important;
        font-size: 20px !important;
        color: #FFFFFF !important;
        margin-bottom: 25px !important;
        font-weight: 400 !important;
        text-align: center !important;
        line-height: 1.6 !important;
    }

    section.ready-section .ready-footer p a,
    .ready-section .section-container .ready-footer p a,
    .ready-section .ready-footer p a,
    .ready-footer p a {
        color: #F0B26B !important;
        text-decoration: none !important;
        font-weight: 700 !important;
        background: transparent !important;
    }

    section.ready-section .ready-footer p a:hover,
    .ready-section .section-container .ready-footer p a:hover,
    .ready-section .ready-footer p a:hover,
    .ready-footer p a:hover {
        text-decoration: underline !important;
        color: #F0B26B !important;
        background: transparent !important;
    }

    /* Private Schools List Links */
    .private-schools-list a {
        color: #F0B26B !important;
        text-decoration: none !important;
        transition: opacity 0.3s ease;
    }

    .private-schools-list a:hover {
        opacity: 0.8;
        text-decoration: underline !important;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        /* Hero Section */
        .shsat-hero h1,
        .shsat-hero .hero-container h1 {
            font-size: 36px !important;
        }

        .shsat-hero h2,
        .shsat-hero .hero-container h2 {
            font-size: 28px !important;
        }

        .shsat-hero {
            padding: 40px 20px !important;
        }

        /* Why Choose Grid */
        .why-choose-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 15px !important;
        }

        /* Ready Section */
        .ready-grid {
            grid-template-columns: 1fr !important;
            gap: 30px !important;
        }

        /* Tabs */
        .tab-two-column {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }

        /* Section Containers */
        .section-container {
            padding: 0 20px !important;
        }

        /* Combined Approach */
        .combined-approach {
            padding: 15px 15px 30px 15px !important;
        }
    }

    @media (max-width: 768px) {
        /* Hero Section */
        .shsat-hero {
            min-height: auto !important;
            padding: 30px 15px !important;
        }

        .shsat-hero h1,
        .shsat-hero .hero-container h1 {
            font-size: 28px !important;
            margin-bottom: 15px !important;
        }

        .shsat-hero h2,
        .shsat-hero .hero-container h2 {
            font-size: 22px !important;
            margin-bottom: 15px !important;
        }

        .shsat-hero p,
        .shsat-hero .hero-container p {
            font-size: 16px !important;
        }

        .hero-buttons {
            flex-direction: column !important;
            gap: 15px !important;
        }

        .btn-view-programs {
            width: 100% !important;
            text-align: center !important;
        }

        /* Make inquiry button full width on mobile too */
        .hero-buttons .inquiry-button,
        .hero-buttons .nyc-stem-inquiry-btn,
        .hero-buttons a.elementor-button {
            width: 100% !important;
            max-width: 100% !important;
            min-width: 100% !important;
            text-align: center !important;
        }

        /* Section Headings - Maintain H2 standard 32px per typography guide */
        .section h2,
        .section-alt h2 {
            font-size: 32px !important;
        }

        .combined-approach h2 {
            font-size: 32px !important;
            margin-bottom: 15px !important;
        }

        /* Why Choose Grid */
        .why-choose-grid {
            grid-template-columns: 1fr !important;
            gap: 15px !important;
        }

        /* Tabs */
        .tabs-nav {
            flex-direction: column !important;
        }

        .tab-button {
            width: 100% !important;
            border-right: 3px solid #28AFCF !important;
        }

        .tab-panel {
            padding: 15px 20px 30px 20px !important;
        }

        .tab-two-column {
            grid-template-columns: 1fr !important;
            gap: 15px !important;
        }

        /* Combined Approach */
        .combined-approach {
            padding: 10px 15px 20px 15px !important;
        }

        .combined-approach .approach-list {
            padding-left: 0 !important;
        }

        .combined-approach .approach-list li {
            font-size: 15px !important;
            padding-left: 35px !important;
        }

        .combined-approach .approach-description {
            font-size: 15px !important;
        }

        /* Ready Section */
        .ready-section {
            padding: 15px 15px 40px 15px !important;
        }

        .ready-section h2 {
            font-size: 26px !important;
        }

        .ready-column h3 {
            font-size: 20px !important;
        }

        .ready-column ul li {
            font-size: 15px !important;
            padding-left: 45px !important;
        }

        .ready-footer p {
            font-size: 16px !important;
        }

        /* Section Containers */
        .section-container {
            padding: 0 15px !important;
        }

        /* Private Schools List */
        .private-schools-list {
            font-size: 14px !important;
            line-height: 1.8 !important;
        }
    }
</style>

<article class="shsat-landing">

    <!-- Hero Section -->
    <section class="shsat-hero">
        <div class="hero-container">
            <h1>Digital SHSAT Prep</h1>
            <h2>90%+ Specialized High School Acceptance Rate</h2>
            <p class="hero-stat">50%+ of our students qualify for Stuyvesant – the most selective school in NYC.</p>
            <p class="hero-full-width">NYC STEM CLUB has helped hundreds of students gain admission to Stuyvesant, Bronx Science, Brooklyn Tech, and other top specialized high schools.</p>
            <div class="hero-buttons">
                <a href="#shsat-programs" class="btn-view-programs">Jump to Courses</a>
                <?php echo do_shortcode('[inquiry_button]'); ?>
            </div>
        </div>
    </section>

    <!-- Programs Section with Tabs -->
    <section class="programs-section" id="SHSATPrograms">
        <div class="section-container">
            <h2>Our SHSAT Programs</h2>

            <div class="programs-tabs">
                <div class="tabs-nav">
                    <button class="tab-button active" onclick="openTab(event, 'tab1')">Module 1 - SHSAT Year-long Program</button>
                    <button class="tab-button" onclick="openTab(event, 'tab2')">Module 2 - Summer Bootcamp</button>
                    <button class="tab-button" onclick="openTab(event, 'tab3')">Module 3 - Fall Classes</button>
                </div>

                <!-- Tab 1: Year-Long Program -->
                <div id="tab1" class="tab-content active">
                    <div class="tab-panel">
                        <h3>Schedule:</h3>
                        <p class="schedule">September – June | 2 classes per week (alternating Math/ELA) | 1.5 hours per session</p>

                        <div class="tab-two-column">
                            <div class="tab-column">
                                <h4>Math Curriculum:</h4>
                                <p>Master 8th grade concepts required for SHSAT including:</p>
                                <ul>
                                    <li>Linear equations, systems, and inequalities</li>
                                    <li>Quadratic expressions and basic factoring</li>
                                    <li>Geometry and coordinate plane</li>
                                    <li>Ratios, proportions, and percentages</li>
                                    <li>Word problems and logic</li>
                                </ul>
                            </div>

                            <div class="tab-column">
                                <h4>ELA Curriculum:</h4>
                                <ul>
                                    <li>Advanced reading comprehension beyond 7th grade level</li>
                                    <li>Poetry analysis and literary devices</li>
                                    <li>Non-fiction analysis across diverse subjects</li>
                                    <li>Grammar, revising, and editing mastery</li>
                                </ul>
                                <p style="margin-top: 15px; font-style: italic;">SHSAT reading passages are significantly more challenging than typical grade-level material, requiring extensive practice with diverse subject matter.</p>
                            </div>
                        </div>

                        <div class="best-for-box">
                            <p><strong>Best for:</strong> Students starting 12+ months before the November SHSAT</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Summer Bootcamp -->
                <div id="tab2" class="tab-content">
                    <div class="tab-panel">
                        <h3>Schedule:</h3>
                        <p class="schedule">3-9 week session | 4 classes per week | 3.5 hours per session</p>

                        <p>Students dive deep into SHSAT-specific test-taking strategies and timed practice with authentic question formats on our digital platform.</p>

                        <div class="tab-two-column">
                            <div class="tab-column">
                                <h4>ELA Strategies:</h4>
                                <ul>
                                    <li>Annotation techniques for reading efficiency</li>
                                    <li>Question type identification and approach</li>
                                    <li>Eliminating trap answer choices</li>
                                    <li>Understanding vocabulary in context</li>
                                    <li>Mastering reading comprehension for poetry, fiction, and nonfiction:
                                        <ul style="margin-left: 20px; margin-top: 10px;">
                                            <li>Main idea and supporting details</li>
                                            <li>Making inferences</li>
                                            <li>Analyzing function of paragraphs, details, and structure</li>
                                            <li>Interpreting quantitative information</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-column">
                                <h4>Math Strategies:</h4>
                                <ul>
                                    <li>Grid-in question approaches</li>
                                    <li>Multi-step problem solving techniques</li>
                                    <li>Calculator-free computation methods</li>
                                    <li>Common SHSAT traps and how to avoid them</li>
                                </ul>
                            </div>
                        </div>

                        <div class="best-for-box">
                            <p><strong>Best for:</strong> Intensive preparation 3-4 months before the final test</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Fall Classes -->
                <div id="tab3" class="tab-content">
                    <div class="tab-panel">
                        <h3>Schedule:</h3>
                        <p class="schedule">~15 sessions | 2 classes per week | 1.5 hours per session</p>

                        <h4>What to Expect:</h4>
                        <ul>
                            <li>Full-length digital practice tests (6+ exams)</li>
                            <li>Detailed score analysis and personalized feedback</li>
                            <li>Individual weakness targeting and improvement plans</li>
                            <li>Test day simulation and environment familiarization</li>
                            <li>Final strategy refinement and confidence building</li>
                        </ul>

                        <div class="best-for-box">
                            <p><strong>Best for:</strong> Final weeks before the October/November SHSAT</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Combined Approach Section -->
    <section class="combined-approach">
        <div class="section-container">
            <h2>Combined Approach – Most Popular & Highest Success Rate</h2>

            <ul class="approach-list">
                <li>Module 1 (September–June): Build strong foundation</li>
                <li>Module 2 (Summer Bootcamp): Intensive test prep</li>
                <li>Module 3 (Fall): Final preparation - Build momentum</li>
            </ul>

            <p class="description">This year-long approach ensures students have both mastery of content AND expert test-taking strategies, maximizing their SHSAT score potential.</p>

            <?php echo do_shortcode('[inquiry_button]'); ?>
        </div>
    </section>

    <!-- Course Cards Section -->
    <section class="section-alt" id="shsat-programs">
        <div class="section-container">
            <?php echo do_shortcode('[course_category category="shsat" title="SHSAT Preparation Programs" columns="4"]'); ?>
        </div>
    </section>

    <!-- Ready to Start Section -->
    <section class="ready-section">
        <div class="section-container">
            <h2>Ready to Start Your SHSAT Journey?</h2>

            <div class="ready-grid">
                <div class="ready-column">
                    <h3>When to Start Preparing</h3>
                    <ul>
                        <li>1. Ideal: 12-18 months before test (7th grade)</li>
                        <li>2. Good: 6-12 months before (early 8th grade)</li>
                        <li>3. Minimum: 3-6 months intensive prep</li>
                    </ul>
                </div>

                <div class="ready-column">
                    <h3>Next Steps</h3>
                    <ul>
                        <li>1. Schedule a free consultation</li>
                        <li>2. Take our diagnostic assessment</li>
                        <li>3. Receive personalized program recommendation</li>
                        <li>4. Enroll and begin your journey</li>
                    </ul>
                </div>
            </div>

            <div class="ready-footer">
                <p style="font-size: 16px; margin-bottom: 15px; opacity: 0.9;">Located in Financial District, Manhattan • Serving all NYC boroughs</p>
                <p>Questions? Check our <a href="/shsat-faq/">SHSAT FAQ</a> or <a href="/contact/">Contact Us</a> directly.</p>
                <?php echo do_shortcode('[inquiry_button]'); ?>
            </div>
        </div>
    </section>

    <!-- Why Choose NYC STEM Club -->
    <section class="section">
        <div class="section-container">
            <?php echo do_shortcode('[why_choose_shsat]'); ?>
        </div>
    </section>

    <!-- About the SHSAT -->
    <section class="section-alt">
        <div class="section-container">
            <h2>About the SHSAT</h2>
            <p style="text-align: center; margin: 0 auto 40px;">The Specialized High Schools Admissions Test (SHSAT) is the gateway to NYC's elite specialized high schools. Students take the test in 8th or 9th grade, and admission is based solely on test scores – making preparation essential.</p>

            <?php echo do_shortcode('[shsat_schools]'); ?>
        </div>
    </section>

    <!-- Beyond Specialized Schools -->
    <section class="section">
        <div class="section-container">
            <h2>Beyond Specialized School</h2>
            <p style="text-align: center; margin: 30px auto 2px;">NYC STEM CLUB students also excel in private and Catholic school admissions, gaining acceptance and scholarships at:</p>
            <p class="private-schools-list" style="text-align: center; margin: 0 auto; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600;">
                <a href="https://www.trinityschoolnyc.org/" target="_blank" rel="noopener noreferrer">Trinity</a> •
                <a href="https://www.brearley.org/" target="_blank" rel="noopener noreferrer">Brearley</a> •
                <a href="https://www.dalton.org/" target="_blank" rel="noopener noreferrer">Dalton</a> •
                <a href="https://www.horacemann.org/" target="_blank" rel="noopener noreferrer">Horace Mann</a> •
                <a href="https://www.riverdale.edu/" target="_blank" rel="noopener noreferrer">Riverdale</a> •
                <a href="https://www.regis.org/" target="_blank" rel="noopener noreferrer">Regis</a> •
                <a href="https://www.collegiateschool.org/" target="_blank" rel="noopener noreferrer">Collegiate</a> •
                <a href="https://www.stpetersprep.org/" target="_blank" rel="noopener noreferrer">St. Peter's Prep</a> •
                <a href="https://www.xavierhs.org/" target="_blank" rel="noopener noreferrer">Xavier</a>
            </p>
        </div>
    </section>

    <!-- Testimonials Section -->
    <?php echo do_shortcode('[testimonials]'); ?>

</article>

<script>
function openTab(evt, tabId) {
    // Hide all tab content
    var tabContent = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabContent.length; i++) {
        tabContent[i].classList.remove("active");
    }

    // Remove active class from all buttons
    var tabButtons = document.getElementsByClassName("tab-button");
    for (var i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("active");
    }

    // Show the current tab and mark button as active
    document.getElementById(tabId).classList.add("active");
    evt.currentTarget.classList.add("active");
}
</script>

<?php get_footer(); ?>
