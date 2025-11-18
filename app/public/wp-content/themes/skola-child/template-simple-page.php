<?php
/**
 * Template Name: Simple Page - Full Width
 * Description: Universal template for simple pages with teal gradient hero and typography compliance
 *
 * Optional ACF Fields:
 * - hero_subtitle (text): Subtitle text below the hero title
 * - show_hero_button (true/false): Display inquiry button in hero
 * - show_bottom_cta (true/false): Display bottom CTA section
 * - cta_heading (text): Bottom CTA heading (default: "Ready to Get Started?")
 * - cta_text (textarea): Bottom CTA description text
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
.page-header,
.entry-thumbnail,
.post-thumbnail,
.page-thumbnail,
.featured-image,
.page-featured-image,
.entry-image,
.hero-image,
img.attachment-post-thumbnail {
    display: none !important;
}

/* Hide theme hero/banner sections */
.page-banner,
.page-hero,
.entry-banner,
.header-image,
.page-title-section,
.page-title-wrapper {
    display: none !important;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Typography Standards - Per TYPOGRAPHY-STYLE-GUIDE.md */
* {
    font-family: 'Roboto', sans-serif !important;
}

body {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
}

/* Ensure font weights are correct */
strong, b {
    font-weight: 700;
}

em, i {
    font-style: italic;
}

/* Hero Section - Teal Gradient */
.simple-page-hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 80px 40px;
    text-align: center;
    width: 100%;
    position: relative;
    z-index: 10;
    display: block !important;
}

.simple-page-hero h1 {
    font-size: 48px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 0;
    color: white !important;
    letter-spacing: -1px;
    display: block !important;
    visibility: visible !important;
}

/* Main Content */
.simple-page-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Typography Compliance - All Headings */
.simple-page-container h1 {
    font-size: 36px;
    font-weight: 700;
    line-height: 1.3;
    color: #134958;
    margin-bottom: 20px;
}

.simple-page-container h2 {
    font-size: 32px;
    font-weight: 700;
    line-height: 1.3;
    color: #134958;
    margin-bottom: 16px;
}

.simple-page-container h3 {
    font-size: 24px;
    font-weight: 600;
    line-height: 1.3;
    color: #134958;
    margin-bottom: 12px;
}

.simple-page-container h4 {
    font-size: 18px;
    font-weight: 600;
    line-height: 1.3;
    color: #134958;
    margin-bottom: 10px;
}

.simple-page-container h5,
.simple-page-container h6 {
    font-size: 16px;
    font-weight: 600;
    line-height: 1.3;
    color: #134958;
}

/* Body Text */
.simple-page-container p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 16px;
    color: #333;
}

.simple-page-container .lead {
    font-size: 18px;
    line-height: 1.6;
    color: #555;
}

.simple-page-container .small,
.simple-page-container .meta,
.simple-page-container .caption {
    font-size: 14px;
    line-height: 1.5;
    color: #666;
}

/* Lists with custom teal bullets per style guide */
.simple-page-container ul {
    list-style: none;
    padding-left: 0;
    margin-bottom: 16px;
}

.simple-page-container ul li {
    padding-left: 30px;
    position: relative;
    margin-bottom: 8px;
    font-size: 16px;
    line-height: 1.6;
}

.simple-page-container ul li:before {
    content: "▸";
    position: absolute;
    left: 0;
    font-size: 18px;
    font-weight: 700;
    color: #28AFCF;
}

/* Ordered lists */
.simple-page-container ol {
    padding-left: 30px;
    margin-bottom: 16px;
}

.simple-page-container ol li {
    margin-bottom: 8px;
    font-size: 16px;
    line-height: 1.6;
}

/* Links */
.simple-page-container a {
    color: #28AFCF;
    text-decoration: none;
    transition: color 0.3s ease;
}

.simple-page-container a:hover {
    color: #134958;
    text-decoration: underline;
}

/* Buttons */
.simple-page-container .btn-primary {
    font-size: 18px;
    font-weight: 700;
    padding: 12px 28px;
    border-radius: 50px;
    background: #FF7F07;
    color: white;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.simple-page-container .btn-primary:hover {
    background: #e66f00;
    transform: translateY(-2px);
    color: white;
}

.simple-page-container .btn-secondary {
    font-size: 16px;
    font-weight: 600;
    padding: 10px 24px;
    border-radius: 8px;
}

/* Tables */
.simple-page-container table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 16px;
}

.simple-page-container table th,
.simple-page-container table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

.simple-page-container table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #134958;
}

/* Images */
.simple-page-container img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

/* Blockquotes */
.simple-page-container blockquote {
    border-left: 4px solid #28AFCF;
    padding-left: 20px;
    margin: 20px 0;
    font-style: italic;
    color: #555;
}

/* Hero Subtitle (optional) */
.simple-page-hero p {
    font-size: 18px;
    line-height: 1.6;
    max-width: 800px;
    margin: 20px auto 40px;
    opacity: 0.95;
    color: white !important;
}

/* Bottom CTA Section (optional) */
.simple-page-cta {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 80px 40px;
    text-align: center;
    width: 100%;
}

.simple-page-cta h2 {
    color: white !important;
    font-size: 32px;
    margin-bottom: 20px;
}

.simple-page-cta p {
    font-size: 18px;
    line-height: 1.6;
    color: white !important;
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto 40px;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .simple-page-hero {
        padding: 40px 20px;
    }

    .simple-page-hero h1 {
        font-size: 36px;
    }

    .simple-page-hero p {
        font-size: 16px;
    }

    .simple-page-container {
        padding: 30px 15px;
    }

    .simple-page-cta {
        padding: 60px 20px;
    }

    .simple-page-container h1 {
        font-size: 32px;
    }

    .simple-page-container h2 {
        font-size: 28px;
    }

    .simple-page-container h3 {
        font-size: 22px;
    }

    .simple-page-container h4 {
        font-size: 17px;
    }
}

@media (max-width: 480px) {
    .simple-page-hero h1 {
        font-size: 28px;
    }

    .simple-page-hero p {
        font-size: 15px;
    }

    .simple-page-container h1 {
        font-size: 28px;
    }

    .simple-page-container h2 {
        font-size: 24px;
    }

    .simple-page-container h3 {
        font-size: 20px;
    }
}

/* TESTIMONIALS PAGE - Force ALL backgrounds to white (override Elementor) */
body.page-id-16284 * {
    background: #ffffff !important;
    background-color: #ffffff !important;
    background-image: none !important;
}

/* Override Elementor CSS variables */
body.page-id-16284 {
    --e-global-color-info: #ffffff !important;
    --info: #ffffff !important;
    --e-global-color-primary: #ffffff !important;
    --e-global-color-secondary: #ffffff !important;
}
</style>

<?php while (have_posts()) : the_post(); ?>

<article>
    <!-- Hero Section -->
    <div class="simple-page-hero">
        <h1><?php the_title(); ?></h1>

        <?php
        // Optional hero subtitle
        $hero_subtitle = get_field('hero_subtitle');
        if ($hero_subtitle) :
        ?>
            <p><?php echo esc_html($hero_subtitle); ?></p>
        <?php endif; ?>

        <?php
        // Optional hero button
        $show_hero_button = get_field('show_hero_button');
        if ($show_hero_button) :
        ?>
            <?php echo do_shortcode('[inquiry_button]'); ?>
        <?php endif; ?>
    </div>

    <!-- Main Content -->
    <div class="simple-page-container">
        <?php the_content(); ?>
    </div>

    <?php
    // Optional bottom CTA section
    $show_bottom_cta = get_field('show_bottom_cta');
    if ($show_bottom_cta) :
        $cta_heading = get_field('cta_heading') ?: 'Ready to Get Started?';
        $cta_text = get_field('cta_text') ?: 'Contact us today to learn more about our programs and how we can help you achieve your goals.';
    ?>
    <!-- Bottom CTA Section -->
    <div class="simple-page-cta">
        <div class="simple-page-container">
            <h2><?php echo esc_html($cta_heading); ?></h2>
            <p><?php echo esc_html($cta_text); ?></p>
            <?php echo do_shortcode('[inquiry_button]'); ?>
        </div>
    </div>
    <?php endif; ?>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>
