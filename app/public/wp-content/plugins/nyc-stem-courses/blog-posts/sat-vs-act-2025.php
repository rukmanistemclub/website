<?php
/**
 * SAT vs ACT 2025 Blog Post Generator
 * Uses the unified blog template system
 */

// Load WordPress
if (!defined('ABSPATH')) {
    // Path: blog-posts/ -> nyc-stem-courses/ -> plugins/ -> wp-content/ -> public/ -> wp-load.php
    $wp_load = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/wp-load.php';
    if (file_exists($wp_load)) {
        require_once($wp_load);
    } else {
        die('ERROR: Could not locate wp-load.php at: ' . $wp_load);
    }
}

// Security check
if (!current_user_can('manage_options')) {
    die('❌ ERROR: Permission denied.');
}

// Load the blog template system
require_once(__DIR__ . '/../includes/blog-template-system.php');

// Start output
echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Creating Blog Post</title>
<style>
body { font-family: system-ui; max-width: 900px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
h1 { color: #134958; }
pre { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
.button { display: inline-block; background: #28AFCF; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 10px 5px; font-weight: bold; }
.button:hover { background: #1a8fb0; }
</style>
</head><body>';
echo '<h1>Creating SAT vs ACT 2025 Blog Post...</h1>';
echo '<pre>';
flush();

// === BUILD THE BLOG CONTENT ===

$content = nyc_blog_get_shared_css();

// Lead paragraph
$content .= <<<'HTML'
<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.1rem","lineHeight":"1.7"},"spacing":{"margin":{"bottom":"3rem"}}},"className":"lead-paragraph"} -->
<p class="lead-paragraph" style="font-size:1.1rem;line-height:1.7;margin-bottom:3rem"><strong>Should you take the SAT or ACT?</strong> It's one of the biggest questions in college prep—and the answer isn't the same for everyone. Both tests are accepted by all U.S. colleges, but they have important differences that can impact your score. At NYC STEM Club, we've helped hundreds of students choose the right test and achieve their target scores. Here's everything you need to know.</p>
<!-- /wp:paragraph -->
HTML;

// Quick Answer Callout
$content .= <<<'HTML'
<!-- wp:group {"className":"callout-box"} -->
<div class="wp-block-group callout-box">
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.4rem"}}} -->
<h3 style="font-size:1.4rem">Quick Answer</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.7"}}} -->
<p style="line-height:1.7"><strong>Both tests are accepted by ALL U.S. colleges.</strong> There's no admissions advantage to one over the other.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"typography":{"lineHeight":"1.7"}}} -->
<ul style="line-height:1.7" class="wp-block-list">
<li><strong>For most students:</strong> We recommend starting with the ACT (more straightforward questions, balanced scoring)</li>
<li><strong>For some students:</strong> The SAT is better (more time per question, less advanced math)</li>
<li><strong>Best approach:</strong> Take practice tests for BOTH to see which suits your strengths</li>
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
HTML;

// Quick Comparison Section
$content .= <<<'HTML'
<!-- wp:heading {"style":{"spacing":{"margin":{"top":"3.5rem","bottom":"1.5rem"}},"typography":{"fontSize":"2.25rem"}}} -->
<h2 class="wp-block-heading" style="margin-top:3.5rem;margin-bottom:1.5rem;font-size:2.25rem">Quick Comparison</h2>
<!-- /wp:heading -->

<!-- wp:html -->
HTML;

// VS Comparison cards
$act_card = <<<'HTML'
<div style="background: white; border-radius: 16px; padding: 2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
    <h3 style="color: #28AFCF; font-size: 1.5rem; margin: 0 0 1.5rem 0; text-align: center;">Enhanced ACT</h3>
    <div class="quick-stats">
        <div style="text-align: center;">
            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">Time</div>
            <div style="font-size: 1.3rem; font-weight: 700; color: #134958;">2h 5m</div>
        </div>
        <div style="text-align: center;">
            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">Questions</div>
            <div style="font-size: 1.3rem; font-weight: 700; color: #134958;">131</div>
        </div>
        <div style="text-align: center;">
            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">Score</div>
            <div style="font-size: 1.3rem; font-weight: 700; color: #134958;">1-36</div>
        </div>
    </div>
    <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 2px solid #f1f5f9;">
        <p style="margin: 0.5rem 0; line-height: 1.7;"><strong>Sections:</strong> English, Math, Reading</p>
        <p style="margin: 0.5rem 0; line-height: 1.7;"><strong>Math Weight:</strong> <span style="color: #28AFCF; font-weight: 700;">33%</span> (1 of 3 sections)</p>
        <p style="margin: 0.5rem 0; line-height: 1.7;"><strong>Science:</strong> Optional add-on</p>
    </div>
</div>
HTML;

$sat_card = <<<'HTML'
<div style="background: white; border-radius: 16px; padding: 2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
    <h3 style="color: #FF7F07; font-size: 1.5rem; margin: 0 0 1.5rem 0; text-align: center;">Digital SAT</h3>
    <div class="quick-stats">
        <div style="text-align: center;">
            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">Time</div>
            <div style="font-size: 1.3rem; font-weight: 700; color: #134958;">2h 14m</div>
        </div>
        <div style="text-align: center;">
            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">Questions</div>
            <div style="font-size: 1.3rem; font-weight: 700; color: #134958;">98</div>
        </div>
        <div style="text-align: center;">
            <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">Score</div>
            <div style="font-size: 1.3rem; font-weight: 700; color: #134958;">400-1600</div>
        </div>
    </div>
    <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 2px solid #f1f5f9;">
        <p style="margin: 0.5rem 0; line-height: 1.7;"><strong>Sections:</strong> Reading & Writing, Math</p>
        <p style="margin: 0.5rem 0; line-height: 1.7;"><strong>Math Weight:</strong> <span style="color: #FF7F07; font-weight: 700;">50%</span> (1 of 2 sections)</p>
        <p style="margin: 0.5rem 0; line-height: 1.7;"><strong>Science:</strong> No dedicated section</p>
    </div>
</div>
HTML;

$content .= nyc_blog_vs_comparison($act_card, $sat_card);
$content .= "\n<!-- /wp:html -->\n\n";

// Who Should Take Which Test
$content .= <<<'HTML'
<!-- wp:heading {"style":{"spacing":{"margin":{"top":"3.5rem","bottom":"1.5rem"}},"typography":{"fontSize":"2.25rem"}}} -->
<h2 class="wp-block-heading" style="margin-top:3.5rem;margin-bottom:1.5rem;font-size:2.25rem">Who Should Take Which Test?</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div class="recommendation-cards">
    <div class="recommendation-card act">
        <h3 style="color: #28AFCF; font-size: 1.4rem; margin: 0 0 1.5rem 0;">
            Choose ACT if you...
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #28AFCF; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Work quickly under time pressure</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #28AFCF; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Excel at reading charts & graphs</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #28AFCF; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Completed Algebra 2 or higher</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #28AFCF; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Prefer straightforward questions</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #28AFCF; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Want balanced scoring (math = 33%)</span>
            </li>
        </ul>
    </div>

    <div class="recommendation-card sat">
        <h3 style="color: #FF7F07; font-size: 1.4rem; margin: 0 0 1.5rem 0;">
            Choose SAT if you...
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #FF7F07; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Need more time per question</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #FF7F07; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Math is your superpower (50% weight)</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #FF7F07; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Still in Algebra 1 or Geometry</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #FF7F07; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Prefer no science section</span>
            </li>
            <li style="padding: 0.5rem 0; display: flex; align-items: start; gap: 0.75rem;">
                <span style="color: #FF7F07; font-size: 1.2rem; flex-shrink: 0;">✓</span>
                <span>Think methodically through problems</span>
            </li>
        </ul>
    </div>
</div>
<!-- /wp:html -->
HTML;

// Why We Recommend ACT
$content .= <<<'HTML'
<!-- wp:heading {"style":{"spacing":{"margin":{"top":"3.5rem","bottom":"1.5rem"}},"typography":{"fontSize":"2.25rem"}}} -->
<h2 class="wp-block-heading" style="margin-top:3.5rem;margin-bottom:1.5rem;font-size:2.25rem">Why NYC STEM Club Recommends Starting with the ACT</h2>
<!-- /wp:heading -->

<!-- wp:html -->
HTML;

// Convert to simple list instead of feature grid with icons
$content .= <<<'HTML'
<ul style="list-style: none; padding: 0; margin: 2rem 0;">
    <li style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0;">
        <strong style="color: #134958; font-size: 1.1rem;">Straightforward Questions</strong>
        <p style="margin: 0.5rem 0 0 0; color: #64748b; line-height: 1.7;">ACT asks what the passage says. SAT often asks what it "suggests"—more subjective.</p>
    </li>
    <li style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0;">
        <strong style="color: #134958; font-size: 1.1rem;">Balanced Scoring</strong>
        <p style="margin: 0.5rem 0 0 0; color: #64748b; line-height: 1.7;">Math = only 33%. Compensate with strong English/Reading performance.</p>
    </li>
    <li style="padding: 1rem 0; border-bottom: 1px solid #e2e8f0;">
        <strong style="color: #134958; font-size: 1.1rem;">Train at Higher Level</strong>
        <p style="margin: 0.5rem 0 0 0; color: #64748b; line-height: 1.7;">Master ACT's trig & logs, and SAT math feels easier. Flexible strategy.</p>
    </li>
    <li style="padding: 1rem 0;">
        <strong style="color: #134958; font-size: 1.1rem;">Science = Optional</strong>
        <p style="margin: 0.5rem 0 0 0; color: #64748b; line-height: 1.7;">Tests chart-reading (learnable skill). Now optional—take if it helps!</p>
    </li>
</ul>
<!-- /wp:html -->
HTML;

// FAQ Section
$content .= <<<'HTML'
<!-- wp:heading {"style":{"spacing":{"margin":{"top":"3.5rem","bottom":"1.5rem"}},"typography":{"fontSize":"2.25rem"}}} -->
<h2 class="wp-block-heading" style="margin-top:3.5rem;margin-bottom:1.5rem;font-size:2.25rem">Common Questions</h2>
<!-- /wp:heading -->

<!-- wp:html -->
HTML;

$faqs = array(
    array(
        'question' => 'Do colleges prefer one test over the other?',
        'answer' => 'No. All U.S. colleges accept both SAT and ACT equally. There\'s no admissions advantage to either test. Choose based on which test format suits your strengths better.'
    ),
    array(
        'question' => 'Can I take both tests?',
        'answer' => 'Yes! Many students take both and submit whichever score is higher. We recommend taking practice tests for both first, then focusing your prep on the one where you perform better.'
    ),
    array(
        'question' => 'How do I know which test is right for me?',
        'answer' => 'Take full-length practice tests for both under timed conditions. Compare your scores and which test felt more comfortable. We offer <strong>free diagnostic testing and consultation</strong> to help you decide.'
    ),
    array(
        'question' => 'When should I start preparing?',
        'answer' => 'Ideally, spring of sophomore year. This gives you time to take the test multiple times (most students take it 2-3 times for their best score) before the stress of junior/senior year.'
    ),
    array(
        'question' => 'What if I\'m stronger in math?',
        'answer' => 'If math is your superpower and you want it to count for more, the SAT\'s 50% math weighting works in your favor. If you\'re well-rounded, the ACT\'s balanced scoring gives you more ways to shine.'
    ),
    array(
        'question' => 'Is the ACT Science section hard?',
        'answer' => 'The Science section doesn\'t test memorized facts—it tests reading charts and graphs, which is a highly learnable skill. Plus, it\'s now optional! Most students improve their Science scores significantly with proper prep.'
    ),
);

$content .= nyc_blog_faq_accordion($faqs);
$content .= "<!-- /wp:html -->\n\n";

// The Bottom Line
$content .= <<<'HTML'
<!-- wp:heading {"style":{"spacing":{"margin":{"top":"3.5rem","bottom":"1.5rem"}},"typography":{"fontSize":"2.25rem"}}} -->
<h2 class="wp-block-heading" style="margin-top:3.5rem;margin-bottom:1.5rem;font-size:2.25rem">The Bottom Line</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); border-radius: 16px; padding: 2.5rem; margin-bottom: 3rem; border-left: 6px solid #28AFCF; box-shadow: 0 4px 16px rgba(0,0,0,0.08);">
    <div style="text-align: center; margin-bottom: 2rem;">
        <p style="font-size: 1.25rem; font-weight: 600; color: #134958; margin: 0; line-height: 1.5;">
            The question isn't <em>"Which test is better?"</em><br>
            It's <strong style="color: #28AFCF;">"Which test is better for YOU?"</strong>
        </p>
    </div>

    <div style="background: white; border-radius: 12px; padding: 2rem; margin-top: 1.5rem;">
        <h4 style="color: #134958; font-size: 1.1rem; margin: 0 0 1.25rem 0;">
            Our 4-Step Process
        </h4>
HTML;

$steps = array(
    'Take diagnostic practice tests for both SAT and ACT',
    'Compare your performance and comfort level',
    'Choose the test where you can reach your target score fastest',
    'Focus your prep on that test (optionally take both)'
);

$content .= nyc_blog_process_steps($steps);

$content .= <<<'HTML'
    </div>
</div>
<!-- /wp:html -->
HTML;

// CTA Section
$content .= "<!-- wp:html -->\n";
$content .= nyc_blog_cta(
    'Ready to Find Your Best Test?',
    'We offer <strong>free diagnostic testing and consultation</strong> to help you choose the right test and create a personalized prep plan.',
    array(
        array('text' => 'Schedule Free Consultation', 'url' => '/student-enrollment/', 'class' => 'primary'),
        array('text' => 'View SAT/ACT Prep Program', 'url' => '/courses/sat-act-prep-course/', 'class' => 'secondary')
    )
);
$content .= "\n<!-- /wp:html -->";

// === CREATE THE BLOG POST ===

$result = nyc_blog_create_post(array(
    'title' => 'SAT vs ACT 2025: Which Test Is Right for You?',
    'slug' => 'sat-vs-act-2025-which-test-is-right-for-you',
    'content' => $content,
    'excerpt' => 'Should you take the SAT or ACT? Complete 2025 comparison guide with test formats, timing, and expert recommendations. Discover which test suits your strengths and how to reach your target score fastest.',
    'categories' => array('Test Prep', 'College Admissions'),
    'tags' => 'SAT,ACT,test prep,college entrance exams,standardized testing,2025,Digital SAT,Enhanced ACT',
    'seo' => array(
        'title' => 'SAT vs ACT 2025: Which Test Is Right for You? | NYC STEM Club',
        'description' => 'Complete 2025 SAT vs ACT comparison guide. Discover which test suits your strengths with expert recommendations from NYC STEM Club. Free diagnostic testing available.',
        'focus_keyword' => 'SAT vs ACT 2025'
    )
));

if ($result['success']) {
    echo "\n✅ Successfully {$result['action']} blog post!\n";
    echo "   Post ID: {$result['post_id']}\n";
    echo "   Title: SAT vs ACT 2025: Which Test Is Right for You?\n\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "</pre>";
    echo '<a href="' . $result['url'] . '" class="button">View Blog Post →</a>';
    echo '<a href="' . $result['edit_url'] . '" class="button" style="background:#134958;">Edit Post →</a>';
} else {
    echo "\n❌ Error: {$result['error']}\n";
    echo "</pre>";
}

echo '</body></html>';
