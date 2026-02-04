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
            'subtitle' => 'Take the first step toward your academic goals. Contact us to learn more.',
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
        ),
        'enhanced_act' => array(
            'title' => 'Ready to Master the Enhanced ACT?',
            'subtitle' => 'Our Enhanced ACT prep program is fully updated for the 2025 format. We\'ll help you navigate the new structure, make strategic decisions about the Science section, and achieve your target score efficiently.',
            'button_text' => 'Get Started',
            'button_url' => '/enrollment/?course_name=ACT+Prep',
            'button_style' => 'orange'
        ),
        'digital_sat' => array(
            'title' => 'Ready to Master the Digital SAT?',
            'subtitle' => 'NYC STEM Club\'s expert instructors are fully trained on the Digital SAT format. Our comprehensive prep program combines content mastery with digital test-taking strategies to maximize your score.',
            'button_text' => 'Inquire Now',
            'button_url' => '/enrollment/',
            'button_style' => 'orange',
            'button2_text' => 'View Programs',
            'button2_url' => '/sat-act-test-prep/',
            'button2_style' => 'teal'
        ),
        'sat_vs_act' => array(
            'title' => 'Ready to Find Your Best Test?',
            'subtitle' => 'We offer diagnostic testing and consultation to help you choose the right test and create a personalized prep plan.',
            'button_text' => 'Inquire Now',
            'button_url' => '/enrollment/',
            'button_style' => 'orange',
            'button2_text' => 'View SAT/ACT Prep Program',
            'button2_url' => '/sat-act-test-prep/',
            'button2_style' => 'teal'
        ),
        'testing_timeline' => array(
            'title' => 'Ready to Start Your Test Prep Journey?',
            'subtitle' => 'Let NYC STEM Club help you create a personalized preparation timeline for your student\'s success.',
            'button_text' => 'Inquire Now',
            'button_url' => '/enrollment/',
            'button_style' => 'white'
        ),
        'shsat_faq' => array(
            'title' => 'Ready to Start Your SHSAT Prep Journey?',
            'subtitle' => 'Join the program where 90%+ of students gain admission to NYC specialized high schools and 50%+ qualify for Stuyvesant.',
            'button_text' => 'Inquire Now',
            'button_url' => '/enrollment/',
            'button_style' => 'orange'
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
        'button2_text' => '',
        'button2_url' => '',
        'button2_style' => 'teal',
    ), $atts, 'cta_section');

    // If type is specified, get predefined content
    $content = array();
    if (!empty($atts['type'])) {
        $content = nyc_stem_get_cta_content($atts['type']);
        // Only use predefined values if not explicitly set
        if (empty($atts['title'])) $atts['title'] = $content['title'];
        if (empty($atts['subtitle'])) $atts['subtitle'] = $content['subtitle'];
        if (empty($atts['button2_text']) && !empty($content['button2_text'])) {
            $atts['button2_text'] = $content['button2_text'];
            $atts['button2_url'] = $content['button2_url'];
            $atts['button2_style'] = $content['button2_style'];
        }
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
                <?php echo do_shortcode('[inquiry_button]'); ?>
                <?php if (!empty($atts['button2_text']) && !empty($atts['button2_url'])): ?>
                <?php echo do_shortcode('[inquiry_button text="' . esc_attr($atts['button2_text']) . '" url="' . esc_attr($atts['button2_url']) . '" color="' . esc_attr($atts['button2_style']) . '"]'); ?>
                <?php endif; ?>
            </div>

        </div>
    </section>
    <?php
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('cta_section', 'nyc_stem_cta_section_shortcode');
