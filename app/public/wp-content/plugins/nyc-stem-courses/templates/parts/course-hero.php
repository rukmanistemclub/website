<?php
/**
 * Course Hero Section - Premium Split Design
 */

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
        // Counseling courses get custom track record cards
        // Post IDs: 17143 (Private School), 17145 (College Counseling)
        if (get_the_ID() == 17143) : // Private School Admissions ?>
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
                            <span class="card-stat-label" style="font-size: 14px; line-height: 1.4;">Our students have received offers in their top 3 schools</span>
                        </div>
                    </div>
                    <div class="card-stat-box">
                        <div class="card-stat-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="card-stat-text">
                            <span class="card-stat-label" style="font-size: 13px; line-height: 1.3;">Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Anns, prestigious boarding schools and many more top schools</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif (get_the_ID() == 17145) : // College Counseling ?>
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
                            <span class="card-stat-label" style="font-size: 14px; line-height: 1.4;">Our students have received offers in their top 3 schools</span>
                        </div>
                    </div>
                    <div class="card-stat-box">
                        <div class="card-stat-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                            </svg>
                        </div>
                        <div class="card-stat-text">
                            <span class="card-stat-label" style="font-size: 14px; line-height: 1.4;">Harvard, Princeton, UPenn, UChicago, Cornell, Carnegie Mellon, Georgia Tech and many more</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        // ISEE courses get ISEE-specific track record card
        // Post IDs: 17343 (Lower ISEE), 17344 (Middle ISEE), 17345 (Upper ISEE)
        elseif (in_array(get_the_ID(), [17343, 17344, 17345])) : ?>
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
                            <div class="card-stat-schools" style="font-size: 11px; color: #666; line-height: 1.4; margin-top: 4px;">Trinity, Dalton, Horace Mann, Brearley, Collegiate, Riverdale, St. Ann's, prestigious boarding schools and many more top schools</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        // ACT-SAT Foundational Course and Boot Camp courses get hardcoded "Our Track Record" card
        // Post IDs: 17138 (Foundational), 17139 (ACT Summer), 17140 (SAT Summer), 17141 (ACT Year-Round), 17142 (SAT Year-Round)
        else:
            $track_record_courses = [17138, 17139, 17140, 17141, 17142];
            if (in_array(get_the_ID(), $track_record_courses)) : ?>
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
        <?php
            // All other courses use ACF-driven hero card
            elseif ($hero_card_stats && is_array($hero_card_stats)) : ?>
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
        <?php
            endif; // end elseif for ACF-driven cards
        endif; // end else block
        ?>

    </div>
</section>
