<?php
/**
 * Course Schedule Section
 */

$schedule_info = get_field('schedule_info');

if (!$schedule_info) {
    return;
}
?>

<section class="course-schedule">
    <div class="schedule-container">

        <h2 class="schedule-title">Course Schedule</h2>

        <div class="schedule-content">
            <?php echo wp_kses_post($schedule_info); ?>
        </div>

    </div>
</section>
