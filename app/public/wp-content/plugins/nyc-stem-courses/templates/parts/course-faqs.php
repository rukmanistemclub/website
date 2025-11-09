<?php
/**
 * Course FAQs Section - Premium Accordion Design
 */

$faq_badge = get_field('faq_badge');
$faq_title = get_field('faq_title');
$faq_subtitle = get_field('faq_subtitle');
$course_faqs = get_field('course_faqs');
$faq_footer_text = get_field('faq_footer_text');
$faq_link_url = get_field('faq_link_url');
$faq_link_text = get_field('faq_link_text');

if (!$course_faqs || !is_array($course_faqs)) {
    return; // Don't display if no FAQs
}
?>

<section class="section" id="faqs">
    <div class="container">
        <div class="section-header">
            <?php if ($faq_badge) : ?>
                <span class="section-badge"><?php echo esc_html($faq_badge); ?></span>
            <?php endif; ?>

            <h2 class="section-title">
                <?php echo $faq_title ? esc_html($faq_title) : 'Frequently Asked Questions'; ?>
            </h2>

            <?php if ($faq_subtitle) : ?>
                <p class="section-subtitle"><?php echo esc_html($faq_subtitle); ?></p>
            <?php endif; ?>
        </div>

        <div class="faq-grid">
            <?php foreach ($course_faqs as $faq) : ?>
                <div class="faq-card">
                    <button class="faq-header" onclick="toggleFAQ(this)">
                        <h3 class="faq-question"><?php echo esc_html($faq['question']); ?></h3>
                        <div class="faq-icon">
                            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                            </svg>
                        </div>
                    </button>
                    <div class="faq-answer">
                        <?php echo wp_kses_post($faq['answer']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($faq_footer_text || $faq_link_url) : ?>
            <div class="faq-footer">
                <p class="faq-footer-text">
                    <?php if ($faq_footer_text) : ?>
                        <?php echo esc_html($faq_footer_text); ?>
                    <?php endif; ?>
                    <?php if ($faq_link_url) : ?>
                        <a href="<?php echo esc_attr($faq_link_url); ?>" class="faq-link">
                            <?php echo esc_html($faq_link_text ? $faq_link_text : 'View All FAQs'); ?>
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
function toggleFAQ(button) {
    const card = button.closest('.faq-card');
    const answer = card.querySelector('.faq-answer');
    const icon = button.querySelector('.faq-icon');
    const isActive = card.classList.contains('active');

    // Close all other FAQs
    document.querySelectorAll('.faq-card.active').forEach(item => {
        if (item !== card) {
            item.classList.remove('active');
            item.querySelector('.faq-answer').style.maxHeight = null;
        }
    });

    // Toggle current FAQ
    if (isActive) {
        card.classList.remove('active');
        answer.style.maxHeight = null;
    } else {
        card.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
    }
}
</script>
