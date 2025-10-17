<?php
/**
 * Course Testimonials Section
 * Shows testimonials - can be filtered by category
 */

$category_filter = get_field('testimonial_category_filter');
$custom_testimonials = get_field('testimonials');

// Use custom testimonials if provided
$testimonials = array();

if ($custom_testimonials && is_array($custom_testimonials)) {
    // Filter by category if specified
    if ($category_filter) {
        foreach ($custom_testimonials as $testimonial) {
            if (isset($testimonial['category']) && $testimonial['category'] == $category_filter) {
                $testimonials[] = $testimonial;
            }
        }
    } else {
        $testimonials = $custom_testimonials;
    }
}

if (empty($testimonials)) {
    return;
}
?>

<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-badge">Success Stories</span>
            <h2 class="section-title">What Our Students Say</h2>
        </div>

        <div class="testimonials-grid">
            <?php foreach ($testimonials as $testimonial) : ?>
                <div class="testimonial-card">
                    <p class="testimonial-text">"<?php echo esc_html($testimonial['text']); ?>"</p>
                    <div class="testimonial-author">
                        <strong><?php echo esc_html($testimonial['name']); ?></strong>
                        <?php if (!empty($testimonial['role'])) : ?>
                            <span><?php echo esc_html($testimonial['role']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
