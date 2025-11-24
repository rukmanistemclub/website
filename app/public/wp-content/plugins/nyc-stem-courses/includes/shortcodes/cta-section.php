<?php
/**
 * CTA Section Shortcode
 *
 * Displays a call-to-action section with gradient background.
 * Usage: [cta_section title="Ready to Get Started?" subtitle="..." button_text="..." button_url="..."]
 *        [cta_section type="enrollment"] - Uses predefined content
 *
 * Created: 2025-11-23 (Phase 2 Refactoring)
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get predefined CTA content by type
 */
function nyc_stem_get_cta_content($type) {
    $ctas = array(
        'enrollment' => array(
            'title' => 'Ready to Get Started?',
            'subtitle' => 'Take the first step toward your academic goals. Contact us today for a free consultation.',
            'button_text' => 'Schedule Free Consultation',
            'button_url' => '/enrollment/',
            'button_style' => 'orange'
        ),
        'shsat' => array(
            'title' => 'Start Your SHSAT Journey Today',
            'subtitle' => 'Join hundreds of students who have achieved their dream of attending a Specialized High School.',
            'button_text' => 'Enroll Now',
            'button_url' => '/enrollment/?course_name=SHSAT+Prep',
            'button_style' => 'orange'
        ),
        'sat_act' => array(
            'title' => 'Boost Your College Admissions Profile',
            'subtitle' => 'Expert SAT and ACT prep to help you reach your target score and get into your dream school.',
            'button_text' => 'Start Your Prep',
            'button_url' => '/enrollment/?course_name=SAT+ACT+Prep',
            'button_style' => 'orange'
        ),
        'contact' => array(
            'title' => 'Have Questions?',
            'subtitle' => 'Our team is here to help. Contact us for personalized guidance on the best program for your child.',
            'button_text' => 'Contact Us',
            'button_url' => '/contact/',
            'button_style' => 'teal'
        )
    );

    return isset($ctas[$type]) ? $ctas[$type] : $ctas['enrollment'];
}

/**
 * CTA Section Shortcode
 *
 * @param array $atts Shortcode attributes
 * @return string HTML output
 */
function nyc_stem_cta_section_shortcode($atts) {
    $atts = shortcode_atts(array(
        'type' => '',
        'title' => '',
        'subtitle' => '',
        'button_text' => 'Get Started',
        'button_url' => '/enrollment/',
        'button_style' => 'orange',  // orange, teal, dark-teal
        'secondary_button_text' => '',
        'secondary_button_url' => '',
    ), $atts, 'cta_section');

    // If type is specified, get predefined content
    if (!empty($atts['type'])) {
        $content = nyc_stem_get_cta_content($atts['type']);
        // Only use predefined values if not explicitly set
        if (empty($atts['title'])) $atts['title'] = $content['title'];
        if (empty($atts['subtitle'])) $atts['subtitle'] = $content['subtitle'];
        if ($atts['button_text'] === 'Get Started') $atts['button_text'] = $content['button_text'];
        if ($atts['button_url'] === '/enrollment/') $atts['button_url'] = $content['button_url'];
        if ($atts['button_style'] === 'orange') $atts['button_style'] = $content['button_style'];
    }

    // Determine button class
    $button_class = 'nyc-stem-inquiry-btn';
    if ($atts['button_style'] === 'teal') {
        $button_class .= ' btn-teal';
    } elseif ($atts['button_style'] === 'dark-teal') {
        $button_class .= ' btn-dark-teal';
    }

    ob_start();
    ?>
    <section class="cta-section">
        <div class="cta-container">

            <?php if ($atts['title']): ?>
            <h2><?php echo esc_html($atts['title']); ?></h2>
            <?php endif; ?>

            <?php if ($atts['subtitle']): ?>
            <p><?php echo esc_html($atts['subtitle']); ?></p>
            <?php endif; ?>

            <div class="cta-buttons">
                <a href="<?php echo esc_url($atts['button_url']); ?>" class="<?php echo esc_attr($button_class); ?>">
                    <?php echo esc_html($atts['button_text']); ?>
                </a>

                <?php if (!empty($atts['secondary_button_text']) && !empty($atts['secondary_button_url'])): ?>
                <a href="<?php echo esc_url($atts['secondary_button_url']); ?>" class="nyc-stem-inquiry-btn btn-teal">
                    <?php echo esc_html($atts['secondary_button_text']); ?>
                </a>
                <?php endif; ?>
            </div>

        </div>
    </section>
    <?php
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('cta_section', 'nyc_stem_cta_section_shortcode');
