<?php
/**
 * Course CTA Section - Final Call to Action
 * Optional section with custom text or defaults
 */

$cta_badge = get_field('cta_badge');
$cta_title = get_field('cta_title');
$cta_subtitle = get_field('cta_subtitle');
$cta_button_text = get_field('cta_button_text');
$cta_button_url = get_field('cta_button_url');

// Get default inquiry settings for fallback
$inquiry_settings = get_field('inquiry_settings');
$default_button_text = isset($inquiry_settings['inquiry_button_text']) && !empty($inquiry_settings['inquiry_button_text'])
    ? $inquiry_settings['inquiry_button_text']
    : 'Inquire Now';

$custom_url = isset($inquiry_settings['custom_inquiry_url']) && !empty($inquiry_settings['custom_inquiry_url'])
    ? $inquiry_settings['custom_inquiry_url']
    : '';

// Default to student enrollment page
$default_url = $custom_url ? $custom_url : home_url('/student-enrollment/');
$default_url = add_query_arg('course', urlencode(get_the_title()), $default_url);

// Use custom values or defaults
$final_button_text = !empty($cta_button_text) ? $cta_button_text : $default_button_text;
$final_button_url = !empty($cta_button_url) ? $cta_button_url : $default_url;
?>

<section class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <?php if ($cta_badge) : ?>
                <span class="cta-badge"><?php echo esc_html($cta_badge); ?></span>
            <?php endif; ?>

            <h2 class="cta-title">
                <?php echo $cta_title ? esc_html($cta_title) : 'Ready to Begin Your Journey?'; ?>
            </h2>

            <?php if ($cta_subtitle) : ?>
                <p class="cta-subtitle"><?php echo esc_html($cta_subtitle); ?></p>
            <?php endif; ?>

            <a href="<?php echo esc_url($final_button_url); ?>" class="cta-button inquiry-cta">
                <?php echo esc_html($final_button_text); ?>
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>
