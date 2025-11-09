<?php
/**
 * Course Trust Bar - Optional Section
 * Displays trust indicators below hero
 */

$trust_items = get_field('trust_bar_items');

if (!$trust_items || !is_array($trust_items)) {
    return; // Don't display if no items
}
?>

<div class="trust-bar">
    <div class="trust-container">
        <?php foreach ($trust_items as $item) : ?>
            <div class="trust-item">
                <div class="trust-icon">
                    <?php if (!empty($item['icon_svg'])) : ?>
                        <?php echo NYC_STEM_Courses::sanitize_svg($item['icon_svg']); ?>
                    <?php else : ?>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    <?php endif; ?>
                </div>
                <span class="trust-text"><?php echo esc_html($item['text']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
