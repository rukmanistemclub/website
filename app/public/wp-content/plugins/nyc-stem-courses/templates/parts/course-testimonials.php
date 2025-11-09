<?php
/**
 * Course Testimonials Section
 * Uses Google Reviews shortcode (Trustindex widget)
 */

// Get the reviews shortcode from settings
$reviews_shortcode = get_option('nyc_stem_reviews_shortcode', '[trustindex data-widget-id=d7ccd5b21eb1294a9186eebe1e6]');
?>

<section class="course-testimonials">
    <div class="testimonials-container">
        <h2 class="testimonials-title">What Our Students and Parents Say</h2>
        <div class="testimonials-content">
            <?php echo do_shortcode($reviews_shortcode); ?>
        </div>
    </div>
</section>
