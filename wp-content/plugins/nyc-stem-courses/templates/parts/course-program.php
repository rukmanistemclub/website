<?php
/**
 * Course Program Section - Module Timeline
 * Flexible 3-module system or custom program structure
 */

$program_badge = get_field('program_badge');
$program_title = get_field('program_title');
$program_subtitle = get_field('program_subtitle');
$program_modules = get_field('program_modules');

if (!$program_modules || !is_array($program_modules)) {
    return; // Don't display if no modules
}
?>

<section class="section section-alt" id="program">
    <div class="container">
        <div class="section-header">
            <?php if ($program_badge) : ?>
                <span class="section-badge"><?php echo esc_html($program_badge); ?></span>
            <?php endif; ?>

            <h2 class="section-title">
                <?php echo $program_title ? esc_html($program_title) : '3-Module Success System'; ?>
            </h2>

            <?php if ($program_subtitle) : ?>
                <p class="section-subtitle"><?php echo esc_html($program_subtitle); ?></p>
            <?php endif; ?>
        </div>

        <div class="timeline">
            <?php foreach ($program_modules as $index => $module) : ?>
                <div class="timeline-item">
                    <div class="timeline-badge"><?php echo $index + 1; ?></div>
                    <div class="timeline-content">
                        <div class="module-header">
                            <?php if (!empty($module['duration'])) : ?>
                                <span class="module-label"><?php echo esc_html($module['duration']); ?></span>
                            <?php endif; ?>

                            <h3 class="module-title"><?php echo esc_html($module['title']); ?></h3>

                            <?php if (!empty($module['meta'])) : ?>
                                <p class="module-meta"><?php echo esc_html($module['meta']); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($module['description'])) : ?>
                            <p class="module-description"><?php echo esc_html($module['description']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($module['highlights']) && is_array($module['highlights'])) : ?>
                            <ul class="module-list">
                                <?php foreach ($module['highlights'] as $highlight) : ?>
                                    <li><?php echo esc_html($highlight['text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
