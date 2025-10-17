<?php
/**
 * Course Benefits Section - Why Choose NYC STEM Club
 * GLOBAL CONTENT with optional per-course override
 */

// Check if course has custom benefits
$custom_benefits = get_field('why_choose_us');
$has_custom = $custom_benefits && is_array($custom_benefits) && count($custom_benefits) > 0;
?>

<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Built for Success</span>
            <h2 class="section-title">Why Choose NYC STEM Club?</h2>
            <p class="section-subtitle">Our comprehensive approach combines expert instruction, proven curriculum, and personalized attention to maximize every student's potential.</p>
        </div>

        <div class="features-bento">
            <?php if ($has_custom) : ?>
                <!-- Custom benefits for this course -->
                <?php foreach ($custom_benefits as $benefit) : ?>
                    <div class="feature-box">
                        <div>
                            <div class="feature-icon-large">
                                <?php if (!empty($benefit['icon_svg'])) : ?>
                                    <?php echo $benefit['icon_svg']; ?>
                                <?php else : ?>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <h3><?php echo esc_html($benefit['title']); ?></h3>
                            <p><?php echo esc_html($benefit['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- Default global benefits -->
                <div class="feature-box">
                    <div>
                        <div class="feature-icon-large">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <h3>Proven Track Record</h3>
                        <p>90%+ acceptance rate consistently for over a decade. Real results, real success stories.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div>
                        <div class="feature-icon-large">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3>Comprehensive Curriculum</h3>
                        <p>Complete 3-module system covering all SHSAT topics with depth and mastery.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div>
                        <div class="feature-icon-large">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3>Small Group Classes</h3>
                        <p>Personalized attention with small class sizes and private tutoring options.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div>
                        <div class="feature-icon-large">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3>Digital SHSAT Ready</h3>
                        <p>Extensive practice on authentic digital platform to prepare for the real test experience.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
