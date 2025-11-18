<?php
/**
 * Direct Course Content Editor
 * Workaround for when ACF fields don't show in admin
 */

if (!defined('ABSPATH')) {
    exit;
}

// Add admin menu
add_action('admin_menu', 'nyc_stem_add_direct_editor');

function nyc_stem_add_direct_editor() {
    add_submenu_page(
        'edit.php?post_type=course',
        'Edit Course Content',
        '✏️ Edit Content',
        'edit_posts',
        'nyc-stem-course-editor',
        'nyc_stem_render_editor'
    );
}

function nyc_stem_render_editor() {
    // Handle form submission
    if (isset($_POST['nyc_stem_save']) && check_admin_referer('nyc_stem_editor')) {
        $course_id = intval($_POST['course_id']);
        $course_description = wp_kses_post($_POST['course_description']);

        update_field('course_description', $course_description, $course_id);

        echo '<div class="notice notice-success"><p>✅ Course content saved successfully!</p></div>';
    }

    // Get all courses
    $courses = get_posts(array(
        'post_type' => 'course',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    // Get selected course
    $selected_course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 17138;
    $course_description = get_field('course_description', $selected_course_id, false);

    ?>
    <div class="wrap">
        <h1>✏️ Direct Course Content Editor</h1>
        <p>Edit your course content directly without the metabox.</p>

        <!-- Course Selector -->
        <form method="get" style="margin: 20px 0;">
            <input type="hidden" name="post_type" value="course">
            <input type="hidden" name="page" value="nyc-stem-course-editor">
            <label for="course_id"><strong>Select Course:</strong></label>
            <select name="course_id" id="course_id" onchange="this.form.submit()" style="min-width: 300px;">
                <?php foreach ($courses as $course) : ?>
                    <option value="<?php echo $course->ID; ?>" <?php selected($selected_course_id, $course->ID); ?>>
                        <?php echo esc_html($course->post_title); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <hr>

        <!-- Editor Form -->
        <form method="post" action="">
            <?php wp_nonce_field('nyc_stem_editor'); ?>
            <input type="hidden" name="course_id" value="<?php echo $selected_course_id; ?>">

            <h2>Course Description Content</h2>
            <p>This is the main content that appears in the course description section.</p>

            <?php
            wp_editor(
                $course_description,
                'course_description',
                array(
                    'textarea_name' => 'course_description',
                    'textarea_rows' => 25,
                    'media_buttons' => true,
                    'teeny' => false,
                    'tinymce' => array(
                        'toolbar1' => 'formatselect,bold,italic,underline,bullist,numlist,link,unlink,blockquote,alignleft,aligncenter,alignright,undo,redo',
                        'toolbar2' => 'styleselect,forecolor,backcolor,outdent,indent,hr,removeformat,code,fullscreen',
                    ),
                )
            );
            ?>

            <p style="margin-top: 20px;">
                <button type="submit" name="nyc_stem_save" class="button button-primary button-large">
                    💾 Save Course Content
                </button>
                <a href="<?php echo get_permalink($selected_course_id); ?>" class="button button-secondary" target="_blank">
                    👁️ View Course Page
                </a>
            </p>
        </form>

        <hr style="margin: 40px 0;">

        <div style="background: #f0f9ff; border-left: 4px solid #0ea5e9; padding: 15px; border-radius: 4px;">
            <h3 style="margin-top: 0;">💡 Tips for Editing</h3>
            <ul>
                <li><strong>Visual mode:</strong> Edit like a word processor</li>
                <li><strong>Text mode:</strong> Edit HTML directly (click "Text" tab above editor)</li>
                <li><strong>Add structure:</strong> Use headings (H2, H3) to organize content</li>
                <li><strong>Special formatting:</strong> Wrap text in <code>&lt;div class="course-intro"&gt;</code> for larger intro text</li>
            </ul>
        </div>
    </div>
    <?php
}
