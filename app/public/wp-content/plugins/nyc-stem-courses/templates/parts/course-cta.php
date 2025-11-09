<?php
/**
 * Course CTA Section - Final Call to Action
 * Optional section with custom text or defaults
 */

$cta_badge = get_field('cta_badge');
$cta_title = get_field('cta_title');
$cta_subtitle = get_field('cta_subtitle');
$cta_button_url = get_field('cta_button_url');
$cta_button_text = get_field('cta_button_text');

// Build shortcode with optional URL override (uses global color/rounded defaults)
$shortcode = '[inquiry_button';
if ($cta_button_url) {
    $shortcode .= ' url="' . esc_attr($cta_button_url) . '"';
}
if ($cta_button_text) {
    $shortcode .= ' text="' . esc_attr($cta_button_text) . '"';
}
$shortcode .= ']';
?>

<section class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <?php if ($cta_badge) : ?>
                <span class="cta-badge"><?php echo esc_html($cta_badge); ?></span>
            <?php endif; ?>

            <h2 class="cta-title">
                <?php echo $cta_title ? esc_html($cta_title) : 'Ready to Give Your Child a Head Start?'; ?>
            </h2>

            <?php if ($cta_subtitle) : ?>
                <p class="cta-subtitle"><?php echo esc_html($cta_subtitle); ?></p>
            <?php endif; ?>

            <?php echo do_shortcode($shortcode); ?>
        </div>
    </div>
</section>
