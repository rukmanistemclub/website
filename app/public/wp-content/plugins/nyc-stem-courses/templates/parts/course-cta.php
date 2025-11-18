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

<?php
// For College Counseling (ID 17145), show university admissions section before CTA
if (get_the_ID() == 17145) : ?>
<section class="admissions-universities-section" style="background: #f8f9fa; padding: 60px 20px; text-align: center;">
    <div style="max-width: 1000px; margin: 0 auto;">
        <h2 style="font-size: 2rem; color: #134958; margin-bottom: 30px; font-weight: 600;">Our Students Have Been Admitted To</h2>
        <p style="font-size: 1.1rem; line-height: 1.8; color: #2d3748;">
            NYC STEM Club students have gained admission to
            <a href="https://www.harvard.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Harvard University</a>,
            <a href="https://www.princeton.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Princeton University</a>,
            <a href="https://www.upenn.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">University of Pennsylvania</a>,
            <a href="https://www.cornell.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Cornell University</a>,
            <a href="https://www.uchicago.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">University of Chicago</a>,
            <a href="https://umich.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">University of Michigan</a>,
            <a href="https://www.gatech.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Georgia Institute of Technology</a>,
            <a href="https://www.purdue.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Purdue University</a>,
            <a href="https://www.tufts.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Tufts University</a>,
            <a href="https://www.babson.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Babson College</a>,
            <a href="https://www.vanderbilt.edu/" target="_blank" rel="noopener" style="color: #134958; font-weight: 600; text-decoration: none; border-bottom: 2px solid #28AFCF;">Vanderbilt University</a>
            and many more prestigious schools.
        </p>
    </div>
</section>
<?php endif; ?>

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

            <?php
            // Add schedules/pricing note for ISEE courses only
            if (in_array(get_the_ID(), [17343, 17344, 17345])) : ?>
                <p style="margin-top: 16px; font-size: 14px; color: #ffffff !important; font-style: italic; font-family: 'Roboto', sans-serif; line-height: 1.5;">
                    Reach out to us for current schedules and pricing
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
