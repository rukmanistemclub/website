<?php
/**
 * Unified Why Choose Shortcode
 *
 * Replaces 4 separate shortcodes with a single parameterized shortcode.
 * Usage: [why_choose type="sat_act|shsat|isee|enrichment"]
 *
 * Created: 2025-11-23 (Phase 1 Refactoring)
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get benefits content by type
 * Centralized content storage - edit here instead of in code
 */
function nyc_stem_get_why_choose_benefits($type) {
    $benefits = array(
        'sat_act' => array(
            'title' => 'Why Choose NYC STEM Club?',
            'subtitle' => 'Our comprehensive approach combines expert instruction, proven curriculum, and personalized attention to maximize every student\'s potential.',
            'badge_title' => 'Fully Updated for Digital SAT & Enhanced ACT',
            'badge_text' => 'Our curriculum reflects all the latest test format changes to ensure you\'re fully prepared.',
            'cards' => array(
                array(
                    'icon' => 'star',
                    'color' => 'teal',
                    'title' => 'Proven Score Improvements',
                    'desc' => '96% of our students see significant score increases. Average gains: 6-9 points on ACT, 100+ points on SAT.'
                ),
                array(
                    'icon' => 'calendar',
                    'color' => 'orange',
                    'title' => 'Personalized, Diagnostic-Driven Strategy',
                    'desc' => 'Every student starts with diagnostic testing. We tailor our approach to your starting point, target score, and timeline.'
                ),
                array(
                    'icon' => 'user',
                    'color' => 'gold',
                    'title' => 'Expert Test-Prep Instructors with 15+ Years Experience',
                    'desc' => 'Specialists in SAT/ACT strategies with deep expertise in both Enhanced ACT and Digital SAT formats.'
                ),
                array(
                    'icon' => 'flexible',
                    'color' => 'green',
                    'title' => 'Flexible Learning Options That Fit Your Life',
                    'desc' => 'Private 1-on-1 sessions, small group classes, in-person at our Downtown Manhattan location, or live online.'
                )
            )
        ),
        'shsat' => array(
            'title' => 'Why Choose NYC STEM Club?',
            'subtitle' => 'With 15+ years of experience and proven results, we provide the most comprehensive SHSAT preparation in NYC.',
            'badge_title' => 'NYC\'s Premier SHSAT Prep Program',
            'badge_text' => '90%+ Specialized High School acceptance rate among our fully committed students.',
            'cards' => array(
                array(
                    'icon' => 'trophy',
                    'color' => 'teal',
                    'title' => 'Proven Track Record',
                    'desc' => '90%+ acceptance rate to Specialized High Schools. 50%+ of our students score above the Stuyvesant cutoff.'
                ),
                array(
                    'icon' => 'calendar',
                    'color' => 'orange',
                    'title' => 'Year-Round Preparation',
                    'desc' => 'Our 3-phase program starts as early as 5th grade, building skills progressively for maximum readiness.'
                ),
                array(
                    'icon' => 'user',
                    'color' => 'gold',
                    'title' => 'Expert SHSAT Specialists',
                    'desc' => '15+ years of SHSAT-specific teaching experience. Deep understanding of test patterns and scoring strategies.'
                ),
                array(
                    'icon' => 'class',
                    'color' => 'green',
                    'title' => 'Small Class Sizes',
                    'desc' => 'Maximum 12 students per class ensures personalized attention and individualized feedback.'
                )
            )
        ),
        'isee' => array(
            'title' => 'Why Choose NYC STEM Club?',
            'subtitle' => 'Our specialized ISEE prep program combines proven strategies with personalized attention to help your child succeed.',
            'badge_title' => 'Comprehensive Private School Prep',
            'badge_text' => 'Helping students gain admission to NYC\'s top private schools since 2008.',
            'cards' => array(
                array(
                    'icon' => 'star',
                    'color' => 'teal',
                    'title' => 'Proven Results',
                    'desc' => 'Our students consistently achieve scores in the 90th percentile and above on all ISEE levels.'
                ),
                array(
                    'icon' => 'target',
                    'color' => 'orange',
                    'title' => 'Level-Specific Preparation',
                    'desc' => 'Tailored curriculum for Primary, Lower, Middle, and Upper level ISEE tests.'
                ),
                array(
                    'icon' => 'user',
                    'color' => 'gold',
                    'title' => 'Experienced Instructors',
                    'desc' => 'Teachers with deep knowledge of ISEE content and private school admissions requirements.'
                ),
                array(
                    'icon' => 'flexible',
                    'color' => 'green',
                    'title' => 'Flexible Scheduling',
                    'desc' => 'Private sessions, small groups, weekday and weekend options to fit your family\'s schedule.'
                )
            )
        ),
        'enrichment' => array(
            'title' => 'Why Choose NYC STEM Club?',
            'subtitle' => 'Beyond test prep, we offer comprehensive academic enrichment to help students excel in school and develop lifelong learning skills.',
            'badge_title' => 'Building Strong Academic Foundations',
            'badge_text' => 'Helping students develop critical thinking and academic skills that last a lifetime.',
            'cards' => array(
                array(
                    'icon' => 'book',
                    'color' => 'teal',
                    'title' => 'Comprehensive Curriculum',
                    'desc' => 'ELA, Math, and subject-specific enrichment programs aligned with school standards and beyond.'
                ),
                array(
                    'icon' => 'user',
                    'color' => 'orange',
                    'title' => 'Individualized Attention',
                    'desc' => 'Small groups and private tutoring ensure each student gets the support they need to thrive.'
                ),
                array(
                    'icon' => 'growth',
                    'color' => 'gold',
                    'title' => 'Build Confidence & Skills',
                    'desc' => 'We focus not just on grades but on developing independent learners with strong study habits.'
                ),
                array(
                    'icon' => 'flexible',
                    'color' => 'green',
                    'title' => 'Flexible Programs',
                    'desc' => 'After-school, weekend, and summer programs available to fit your schedule.'
                )
            )
        )
    );

    return isset($benefits[$type]) ? $benefits[$type] : $benefits['sat_act'];
}

/**
 * Get SVG icon by name
 */
function nyc_stem_get_why_choose_icon($name) {
    $icons = array(
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/></svg>',
        'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M9 11H7V9H9M13 11H11V9H13M17 11H15V9H17M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M19 19H5V8H19V19Z"/></svg>',
        'user' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12M12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/></svg>',
        'flexible' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2M12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20M7 13H9V15H11V13H13V11H11V9H9V11H7V13Z"/></svg>',
        'trophy' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M18 2C17.1 2 16 3 16 4H8C8 3 6.9 2 6 2H2V11C2 12 3 13 4 13H6.2C6.6 15 7.9 16.7 11 17V19.1C8.8 19.3 8 20.4 8 21.7V22H16V21.7C16 20.4 15.2 19.3 13 19.1V17C16.1 16.7 17.4 15 17.8 13H20C21 13 22 12 22 11V2H18M6 11H4V4H6V11M20 11H18V4H20V11Z"/></svg>',
        'class' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 3L1 9L12 15L21 10.09V17H23V9M5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z"/></svg>',
        'target' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.47 2 2 6.47 2 12C2 17.53 6.47 22 12 22C17.53 22 22 17.53 22 12C22 6.47 17.53 2 12 2M12 20C7.58 20 4 16.42 4 12C4 7.58 7.58 4 12 4C16.42 4 20 7.58 20 12C20 16.42 16.42 20 12 20M12 6C8.69 6 6 8.69 6 12C6 15.31 8.69 18 12 18C15.31 18 18 15.31 18 12C18 8.69 15.31 6 12 6M12 16C9.79 16 8 14.21 8 12C8 9.79 9.79 8 12 8C14.21 8 16 9.79 16 12C16 14.21 14.21 16 12 16M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"/></svg>',
        'book' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M18 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V4C20 2.9 19.1 2 18 2M6 4H11V12L8.5 10.5L6 12V4Z"/></svg>',
        'growth' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M16 6L18.29 8.29L13.41 13.17L9.41 9.17L2 16.59L3.41 18L9.41 12L13.41 16L19.71 9.71L22 12V6H16Z"/></svg>',
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"/></svg>'
    );

    return isset($icons[$name]) ? $icons[$name] : $icons['star'];
}

/**
 * Unified Why Choose Shortcode
 *
 * @param array $atts Shortcode attributes
 * @return string HTML output
 */
function nyc_stem_why_choose_shortcode($atts) {
    $atts = shortcode_atts(array(
        'type' => 'sat_act',
    ), $atts, 'why_choose');

    $content = nyc_stem_get_why_choose_benefits($atts['type']);

    ob_start();
    ?>
    <section class="why-choose-section">
        <div class="why-choose-container">

            <!-- Header -->
            <div class="why-choose-header">
                <h2><?php echo esc_html($content['title']); ?></h2>
                <p><?php echo esc_html($content['subtitle']); ?></p>
            </div>

            <!-- Benefits Grid -->
            <div class="why-choose-grid">
                <?php foreach ($content['cards'] as $index => $card): ?>
                <div class="why-choose-card why-choose-card--<?php echo esc_attr($card['color']); ?>">
                    <div class="why-choose-card__icon why-choose-card__icon--<?php echo esc_attr($card['color']); ?>">
                        <?php echo nyc_stem_get_why_choose_icon($card['icon']); ?>
                    </div>
                    <h3 class="why-choose-card__title"><?php echo esc_html($card['title']); ?></h3>
                    <p class="why-choose-card__desc"><?php echo esc_html($card['desc']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Badge -->
            <div class="why-choose-badge">
                <div class="why-choose-badge__content">
                    <div class="why-choose-badge__icon">
                        <?php echo nyc_stem_get_why_choose_icon('check'); ?>
                        <span class="why-choose-badge__title"><?php echo esc_html($content['badge_title']); ?></span>
                    </div>
                    <span class="why-choose-badge__text"><?php echo esc_html($content['badge_text']); ?></span>
                </div>
            </div>

        </div>
    </section>
    <?php
    return ob_get_clean();
}

// Register the unified shortcode
add_shortcode('why_choose', 'nyc_stem_why_choose_shortcode');
