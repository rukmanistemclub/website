<?php
/**
 * FAQ Section Shortcode
 *
 * Displays an accordion-style FAQ section.
 * Usage: [faq_section field="faq_items"] - Uses ACF repeater field
 *        [faq_section type="shsat"] - Uses predefined FAQ content
 *
 * Created: 2025-11-23 (Phase 2 Refactoring)
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get predefined FAQ content by type
 */
function nyc_stem_get_faq_content($type) {
    $faqs = array(
        'shsat' => array(
            'title' => 'Frequently Asked Questions',
            'subtitle' => 'Get answers to common questions about SHSAT preparation.',
            'items' => array(
                array(
                    'question' => 'When should my child start SHSAT prep?',
                    'answer' => 'We recommend starting in 6th grade for optimal preparation, though our intensive programs can help students who start in 7th or even early 8th grade. The earlier you start, the more time for skill development and practice.'
                ),
                array(
                    'question' => 'What is included in the SHSAT prep program?',
                    'answer' => 'Our comprehensive program includes diagnostic testing, weekly classes covering both ELA and Math sections, homework assignments, practice tests, and individualized feedback. Students also receive study materials and access to our online practice platform.'
                ),
                array(
                    'question' => 'How are classes structured?',
                    'answer' => 'Classes are small (maximum 12 students) to ensure personalized attention. Each session covers both ELA and Math content, with a mix of instruction, guided practice, and independent work. We also offer private 1-on-1 tutoring for students who need more individualized support.'
                ),
                array(
                    'question' => 'What are your results?',
                    'answer' => 'Over 90% of our fully committed students receive offers from Specialized High Schools, with more than 50% scoring above the Stuyvesant cutoff. Our students consistently outperform city averages.'
                )
            )
        ),
        'sat_act' => array(
            'title' => 'Frequently Asked Questions',
            'subtitle' => 'Common questions about SAT and ACT preparation.',
            'items' => array(
                array(
                    'question' => 'Should my child take the SAT or ACT?',
                    'answer' => 'Both tests are accepted equally by colleges. We recommend taking a diagnostic of each to see which format suits your child better. Some students perform better on the ACT\'s straightforward style, while others prefer the SAT\'s approach.'
                ),
                array(
                    'question' => 'How long does SAT/ACT prep take?',
                    'answer' => 'Most students see significant improvement with 2-3 months of consistent preparation. However, the ideal timeline depends on your starting score, target score, and available study time. We create personalized study plans for each student.'
                ),
                array(
                    'question' => 'Do you prepare for the Digital SAT?',
                    'answer' => 'Yes! Our curriculum is fully updated for the Digital SAT format, including adaptive testing strategies, on-screen tools practice, and the new question types. We also cover the Enhanced ACT changes.'
                ),
                array(
                    'question' => 'What score improvements can I expect?',
                    'answer' => '96% of our students see significant score increases. On average, students improve 100+ points on the SAT and 4-6 points on the ACT, with many students achieving even greater gains.'
                )
            )
        ),
        'isee' => array(
            'title' => 'Frequently Asked Questions',
            'subtitle' => 'Common questions about ISEE preparation and private school admissions.',
            'items' => array(
                array(
                    'question' => 'Which ISEE level does my child need?',
                    'answer' => 'The ISEE has four levels: Primary (grades 2-4), Lower (grades 5-6), Middle (grades 7-8), and Upper (grades 9-12). Your child takes the level corresponding to the grade they\'re applying to enter.'
                ),
                array(
                    'question' => 'How is the ISEE different from school tests?',
                    'answer' => 'The ISEE tests reasoning and problem-solving abilities rather than just content knowledge. It includes Verbal Reasoning, Quantitative Reasoning, Reading Comprehension, Math Achievement, and an Essay section.'
                ),
                array(
                    'question' => 'When should we start ISEE prep?',
                    'answer' => 'We recommend starting 3-6 months before your test date. This allows time for skill development, practice, and addressing any weak areas while avoiding burnout.'
                ),
                array(
                    'question' => 'Do you help with private school applications?',
                    'answer' => 'Yes! In addition to ISEE prep, we offer comprehensive private school admissions counseling, including school selection, application review, interview preparation, and essay guidance.'
                )
            )
        )
    );

    return isset($faqs[$type]) ? $faqs[$type] : $faqs['shsat'];
}

/**
 * FAQ Section Shortcode
 *
 * @param array $atts Shortcode attributes
 * @return string HTML output
 */
function nyc_stem_faq_section_shortcode($atts) {
    $atts = shortcode_atts(array(
        'type' => '',           // Predefined type: shsat, sat_act, isee
        'field' => '',          // ACF repeater field name
        'title' => 'Frequently Asked Questions',
        'subtitle' => '',
    ), $atts, 'faq_section');

    // Get FAQ items from ACF field or predefined content
    $faq_items = array();
    $title = $atts['title'];
    $subtitle = $atts['subtitle'];

    if (!empty($atts['field']) && function_exists('get_field')) {
        // Use ACF repeater field
        $acf_items = get_field($atts['field']);
        if ($acf_items && is_array($acf_items)) {
            foreach ($acf_items as $item) {
                $faq_items[] = array(
                    'question' => $item['question'] ?? $item['faq_question'] ?? '',
                    'answer' => $item['answer'] ?? $item['faq_answer'] ?? ''
                );
            }
        }
    } elseif (!empty($atts['type'])) {
        // Use predefined content
        $content = nyc_stem_get_faq_content($atts['type']);
        $faq_items = $content['items'];
        $title = $content['title'];
        $subtitle = $content['subtitle'];
    }

    if (empty($faq_items)) {
        return '<!-- FAQ Section: No items found -->';
    }

    // Generate unique ID for this FAQ instance
    $faq_id = 'faq-' . uniqid();

    ob_start();
    ?>
    <section class="faq-section" id="<?php echo esc_attr($faq_id); ?>">
        <div class="faq-container">

            <?php if ($title || $subtitle): ?>
            <div class="faq-intro">
                <?php if ($title): ?>
                <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if ($subtitle): ?>
                <p><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="faq-list">
                <?php foreach ($faq_items as $index => $item): ?>
                <div class="faq-item" data-faq-index="<?php echo $index; ?>">
                    <button class="faq-question" aria-expanded="false" aria-controls="<?php echo esc_attr($faq_id); ?>-answer-<?php echo $index; ?>">
                        <span><?php echo esc_html($item['question']); ?></span>
                        <svg class="faq-question__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </button>
                    <div class="faq-answer" id="<?php echo esc_attr($faq_id); ?>-answer-<?php echo $index; ?>" aria-hidden="true">
                        <?php echo wp_kses_post($item['answer']); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <script>
    (function() {
        const faqSection = document.getElementById('<?php echo esc_js($faq_id); ?>');
        if (!faqSection) return;

        const questions = faqSection.querySelectorAll('.faq-question');

        questions.forEach(function(question) {
            question.addEventListener('click', function() {
                const faqItem = this.closest('.faq-item');
                const answer = faqItem.querySelector('.faq-answer');
                const isActive = faqItem.classList.contains('active');

                // Close all other items
                faqSection.querySelectorAll('.faq-item.active').forEach(function(item) {
                    if (item !== faqItem) {
                        item.classList.remove('active');
                        item.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
                        item.querySelector('.faq-answer').setAttribute('aria-hidden', 'true');
                    }
                });

                // Toggle current item
                faqItem.classList.toggle('active');
                this.setAttribute('aria-expanded', !isActive);
                answer.setAttribute('aria-hidden', isActive);
            });
        });
    })();
    </script>
    <?php
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('faq_section', 'nyc_stem_faq_section_shortcode');
