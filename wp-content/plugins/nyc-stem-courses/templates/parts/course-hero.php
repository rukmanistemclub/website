<?php
/**
 * Course Hero Section - Premium Split Design
 */

// Global inquiry button settings
$inquiry_settings = get_field('inquiry_settings');
$button_text = isset($inquiry_settings['inquiry_button_text']) && !empty($inquiry_settings['inquiry_button_text'])
    ? $inquiry_settings['inquiry_button_text']
    : 'Inquire Now';

$custom_url = isset($inquiry_settings['custom_inquiry_url']) && !empty($inquiry_settings['custom_inquiry_url'])
    ? $inquiry_settings['custom_inquiry_url']
    : '';

// Default to student enrollment page
$inquiry_url = $custom_url ? $custom_url : home_url('/student-enrollment/');

// Add course name to URL as query parameter
$inquiry_url = add_query_arg('course', urlencode(get_the_title()), $inquiry_url);

// Get hero stats (mini stats in left column)
$hero_stats = get_field('hero_stats');

// Get hero card stats (right column card)
$hero_card_title = get_field('hero_card_title');
$hero_card_stats = get_field('hero_card_stats');
?>

<section class="course-hero">
    <div class="hero-container">

        <!-- Left Column: Content -->
        <div class="hero-content">
            <h1><?php the_title(); ?></h1>

            <?php if (has_excerpt()) : ?>
                <p class="hero-excerpt"><?php echo get_the_excerpt(); ?></p>
            <?php endif; ?>

            <!-- Mini Stats -->
            <?php if ($hero_stats && is_array($hero_stats)) : ?>
                <div class="hero-stats-mini">
                    <?php foreach ($hero_stats as $stat) : ?>
                        <div class="stat-mini">
                            <div class="stat-mini-icon">
                                <?php if (!empty($stat['icon_svg'])) : ?>
                                    <?php echo $stat['icon_svg']; ?>
                                <?php else : ?>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="stat-mini-text">
                                <span class="stat-mini-number"><?php echo esc_html($stat['number']); ?></span>
                                <span class="stat-mini-label"><?php echo esc_html($stat['label']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- CTA Buttons -->
            <div class="cta-group">
                <a href="<?php echo esc_url($inquiry_url); ?>" class="cta-button">
                    <?php echo esc_html($button_text); ?>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="#program" class="cta-button cta-button-secondary">
                    Learn More
                </a>
            </div>
        </div>

        <!-- Right Column: Stats Card -->
        <div class="hero-card">
            <h3><?php echo $hero_card_title ? esc_html($hero_card_title) : 'Our Track Record'; ?></h3>
            <div class="hero-card-grid">
                <?php if ($hero_card_stats && is_array($hero_card_stats)) : ?>
                    <?php foreach ($hero_card_stats as $stat) : ?>
                        <div class="card-stat-box">
                            <div class="card-stat-icon">
                                <?php if (!empty($stat['icon_svg'])) : ?>
                                    <?php echo $stat['icon_svg']; ?>
                                <?php else : ?>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="card-stat-text">
                                <span class="card-stat-number"><?php echo esc_html($stat['number']); ?></span>
                                <span class="card-stat-label"><?php echo esc_html($stat['label']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
