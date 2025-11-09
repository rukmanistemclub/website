<?php
/**
 * Course Program Highlights Section
 * Displays schedule, target audience, and benefits
 */

$program_highlights = get_field('program_highlights');

if (empty($program_highlights)) {
    return;
}
?>

<section class="program-highlights-section">
    <div class="program-highlights-container">
        <div class="program-highlights-grid">
            <?php foreach ($program_highlights as $highlight) : ?>
                <div class="highlight-item">
                    <h3 class="highlight-title"><?php echo esc_html($highlight['title']); ?></h3>
                    <p class="highlight-content"><?php echo esc_html($highlight['content']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
