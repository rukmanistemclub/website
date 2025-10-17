<?php
/**
 * Migration Admin Page
 */

if (!defined('ABSPATH')) {
    exit;
}

// Handle migration form submission
$migration_message = '';
$migration_status = '';

if (isset($_POST['run_migration']) && check_admin_referer('nyc_stem_migration', 'migration_nonce')) {
    $results = NYC_STEM_Migration::migrate_products();

    if ($results['success']) {
        $migration_status = 'success';
        $migration_message = sprintf(
            'Migration completed! %d products migrated, %d skipped.',
            $results['migrated'],
            $results['skipped']
        );

        if (!empty($results['errors'])) {
            $migration_message .= '<br><br><strong>Errors:</strong><br>' . implode('<br>', $results['errors']);
        }
    } else {
        $migration_status = 'error';
        $migration_message = $results['message'];
    }
}

// Handle create categories
if (isset($_POST['create_categories']) && check_admin_referer('nyc_stem_categories', 'categories_nonce')) {
    NYC_STEM_Migration::create_default_categories();
    $migration_status = 'success';
    $migration_message = 'Default categories created successfully!';
}

// Get counts
$product_count = wp_count_posts('product');
$course_count = wp_count_posts('course');
?>

<div class="wrap">
    <h1>WooCommerce to Courses Migration</h1>

    <?php if ($migration_message) : ?>
        <div class="notice notice-<?php echo esc_attr($migration_status); ?> is-dismissible">
            <p><?php echo wp_kses_post($migration_message); ?></p>
        </div>
    <?php endif; ?>

    <div class="card" style="max-width: 800px;">
        <h2>Migration Overview</h2>

        <table class="widefat">
            <tr>
                <td><strong>WooCommerce Products:</strong></td>
                <td><?php echo isset($product_count->publish) ? $product_count->publish : 0; ?> published</td>
            </tr>
            <tr>
                <td><strong>Course Posts:</strong></td>
                <td><?php echo isset($course_count->publish) ? $course_count->publish : 0; ?> published</td>
            </tr>
            <tr>
                <td><strong>WooCommerce Status:</strong></td>
                <td>
                    <?php if (class_exists('WooCommerce')) : ?>
                        <span style="color: green;">✓ Active</span>
                    <?php else : ?>
                        <span style="color: red;">✗ Not Active</span>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="card" style="max-width: 800px; margin-top: 20px;">
        <h2>Step 1: Create Default Categories</h2>
        <p>Create the default course categories (SAT/ACT Prep, SHSAT Prep, Regents Prep, etc.)</p>

        <form method="post">
            <?php wp_nonce_field('nyc_stem_categories', 'categories_nonce'); ?>
            <button type="submit" name="create_categories" class="button button-secondary">
                Create Default Categories
            </button>
        </form>
    </div>

    <div class="card" style="max-width: 800px; margin-top: 20px;">
        <h2>Step 2: Run Migration</h2>

        <p><strong>What this will do:</strong></p>
        <ul style="list-style: disc; margin-left: 20px;">
            <li>Convert all WooCommerce products to Course posts</li>
            <li>Copy titles, descriptions, and featured images</li>
            <li>Migrate product categories to course categories</li>
            <li>Set default ACF fields with smart values</li>
            <li>Add default FAQs and benefits</li>
        </ul>

        <p><strong>Note:</strong> Courses that already exist (matching title) will be skipped.</p>

        <?php if (!class_exists('WooCommerce')) : ?>
            <div class="notice notice-error inline">
                <p>WooCommerce must be active to run the migration.</p>
            </div>
        <?php elseif (isset($product_count->publish) && $product_count->publish == 0) : ?>
            <div class="notice notice-warning inline">
                <p>No WooCommerce products found to migrate.</p>
            </div>
        <?php else : ?>
            <form method="post" onsubmit="return confirm('Are you sure you want to run the migration? This will create new course posts from your WooCommerce products.');">
                <?php wp_nonce_field('nyc_stem_migration', 'migration_nonce'); ?>
                <button type="submit" name="run_migration" class="button button-primary">
                    Run Migration
                </button>
            </form>
        <?php endif; ?>
    </div>

    <div class="card" style="max-width: 800px; margin-top: 20px;">
        <h2>Step 3: Review & Customize</h2>
        <p>After migration:</p>
        <ol style="margin-left: 20px;">
            <li>Review each course post</li>
            <li>Customize ACF fields (price, duration, benefits, FAQs)</li>
            <li>Add testimonials and schedule information</li>
            <li>Test the display on the front-end</li>
            <li>Add menu items to navigation</li>
        </ol>

        <p><a href="<?php echo admin_url('edit.php?post_type=course'); ?>" class="button">View All Courses →</a></p>
    </div>

    <div class="card" style="max-width: 800px; margin-top: 20px;">
        <h2>Need Help?</h2>
        <p>If you encounter any issues:</p>
        <ul style="list-style: disc; margin-left: 20px;">
            <li>Make sure ACF (Advanced Custom Fields) is installed and active</li>
            <li>Check that WooCommerce is active before running migration</li>
            <li>Backup your database before running migration</li>
            <li>Contact support if you need assistance</li>
        </ul>
    </div>
</div>

<style>
.card {
    background: #fff;
    border: 1px solid #ccd0d4;
    padding: 20px;
    margin: 20px 0;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
}
.card h2 {
    margin-top: 0;
}
.widefat td {
    padding: 10px;
}
</style>
