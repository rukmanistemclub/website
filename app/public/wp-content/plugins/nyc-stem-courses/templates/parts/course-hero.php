<?php
/**
 * Course Hero Section - Premium Split Design
 */

// Get hero stats (mini stats in left column)
$hero_stats = get_field('hero_stats');

// Get hero card stats (right column card) - Build array from individual fields
$hero_card_title = get_field('hero_card_title');
$hero_card_stats = array();

// Build stats array from individual ACF fields (ACF Free compatible)
for ($i = 1; $i <= 4; $i++) {
    $number = get_field("hero_card_stat_{$i}_number");
    $label = get_field("hero_card_stat_{$i}_label");

    // Only add stat if at least the label is filled
    if (!empty($label)) {
        $hero_card_stats[] = array(
            'number' => $number,
            'label' => $label,
            'icon_svg' => ''
        );
    }
}
?>

<section class="course-hero">
    <div class="hero-container">

        <!-- Left Column: Content -->
        <div class="hero-content">
            <h1><?php the_title(); ?></h1>

            <?php
            $hero_tagline = get_field('hero_tagline');
            $hide_excerpt = get_field('hide_hero_excerpt');
            $hide_stats = get_field('hide_hero_stats');

            if ($hero_tagline) : ?>
                <p class="hero-tagline"><?php echo wp_kses_post($hero_tagline); ?></p>
            <?php elseif (!$hide_excerpt && has_excerpt()) : ?>
                <p class="hero-excerpt"><?php echo get_the_excerpt(); ?></p>
            <?php endif; ?>

            <?php
            if (!$hide_stats && $hero_stats && is_array($hero_stats)) : ?>
                <div class="hero-stats-mini">
                    <?php foreach ($hero_stats as $stat) : ?>
                        <div class="stat-mini">
                            <div class="stat-mini-icon">
                                <?php if (!empty($stat['icon_svg'])) : ?>
                                    <?php echo NYC_STEM_Courses::sanitize_svg($stat['icon_svg']); ?>
                                <?php else : ?>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="stat-mini-text">
                                <span class="stat-mini-number"><?php echo isset($stat['number']) ? esc_html($stat['number']) : ''; ?></span>
                                <span class="stat-mini-label"><?php echo isset($stat['label']) ? esc_html($stat['label']) : ''; ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- CTA Buttons -->
            <div class="cta-group">
                <?php echo do_shortcode('[inquiry_button]'); ?>
                <?php
                // For SAT/ACT courses, link to main SAT/ACT prep guide
                if (has_term(array('sat', 'act', 'sat-act', 'sat-act-prep', 'college-prep'), 'course_category')) {
                    echo do_shortcode('[inquiry_button color="teal" text="View Complete Guide on SAT/ACT" url="/sat-act-test-prep/"]');
                }
                // For SHSAT courses, link to complete guide
                elseif (has_term('shsat', 'course_category')) {
                    echo do_shortcode('[inquiry_button color="teal" text="View Complete Guide" url="/nyc-top-shsat-prep-program/"]');
                }
                ?>
            </div>
        </div>

        <?php
        // All courses use ACF-driven hero card (replaces all hardcoded track record cards)
        if ($hero_card_stats && is_array($hero_card_stats)) : ?>
            <div class="hero-card">
                <h3><?php echo $hero_card_title ? esc_html($hero_card_title) : 'Our Track Record'; ?></h3>
                <div class="hero-card-grid">
                    <?php foreach ($hero_card_stats as $stat) : ?>
                        <div class="card-stat-box">
                            <div class="card-stat-icon">
                                <?php if (!empty($stat['icon_svg'])) : ?>
                                    <?php echo NYC_STEM_Courses::sanitize_svg($stat['icon_svg']); ?>
                                <?php else : ?>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="card-stat-text">
                                <span class="card-stat-number"><?php echo isset($stat['number']) ? esc_html($stat['number']) : ''; ?></span>
                                <span class="card-stat-label"><?php echo isset($stat['label']) ? esc_html($stat['label']) : ''; ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>
