<?php
/**
 * Template Name: Enhanced ACT Guide
 * Description: Complete guide to the Enhanced ACT for 2025
 * Version: 2.1 - Balanced Format
 */

get_header();
?>

<style>
    /* Reset WordPress theme styles */
    #primary.content-area,
    .site-main,
    .entry-content,
    article {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        background: white !important;
    }

    .entry-header,
    .entry-footer,
    .post-navigation,
    .page-header {
        display: none !important;
    }

    /* Scoped resets - only affect content within article */
    article * {
        box-sizing: border-box;
    }

    /* Use unique class name to avoid conflicts with theme header */
    .act-content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero Section */
    article .hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 24px 0;
        text-align: center;
    }

    article .hero h1 {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -1px;
        color: white !important;
    }

    article .hero .subtitle {
        font-size: 18px;
        line-height: 1.6;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto;
        color: white !important;
    }

    /* Content Sections */
    article section {
        padding: 16px 0;
    }

    article .section-alt {
        background: #f8f9fa;
    }

    article h2 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 30px;
        color: #134958;
        line-height: 1.3;
        padding-bottom: 15px;
        border-bottom: 3px solid #28AFCF;
        display: inline-block;
    }

    article h3 {
        font-size: 24px;
        font-weight: 600;
        color: #134958;
        margin: 30px 0 20px;
        line-height: 1.3;
        padding-left: 15px;
        border-left: 4px solid #28AFCF;
    }

    article h4 {
        font-size: 18px;
        font-weight: 600;
        color: #134958;
        margin: 25px 0 15px;
        line-height: 1.3;
    }

    article p {
        margin-bottom: 20px;
        color: #333;
        line-height: 1.6;
        max-width: 100%;
    }

    article strong {
        font-weight: 700;
        color: #134958;
    }

    article ul, article ol {
        margin: 20px 0;
        padding-left: 0;
        list-style: none;
        max-width: 100%;
    }

    article li {
        margin-bottom: 12px;
        line-height: 1.6;
        padding-left: 30px;
        position: relative;
    }

    article li:before {
        content: "▸";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    /* Comparison Table */
    article .comparison-table {
        width: 100%;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        margin: 30px 0;
    }

    article .comparison-table table {
        width: 100%;
        border-collapse: collapse;
    }

    article .comparison-table th {
        background: #134958;
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
    }

    article .comparison-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    article .comparison-table tr:last-child td {
        border-bottom: none;
    }

    article .comparison-table tr:nth-child(even) {
        background: #f8f9fa;
    }

    /* Highlight Boxes */
    article .highlight-box {
        background: linear-gradient(135deg, #f0f8ff, #e6f4ff);
        border-left: 5px solid #28AFCF;
        padding: 25px 30px;
        margin: 30px 0;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(40, 175, 207, 0.1);
        max-width: 100%;
    }

    article .highlight-box h4 {
        margin-top: 0;
        color: #134958;
        border-left: none;
        padding-left: 0;
    }

    article .warning-box {
        background: linear-gradient(135deg, #fff9f0, #ffedd5);
        border-left: 5px solid #FF7F07;
        padding: 25px 30px;
        margin: 30px 0;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(255, 127, 7, 0.1);
        max-width: 100%;
    }

    article .warning-box h4 {
        margin-top: 0;
        color: #FF7F07;
        border-left: none;
        padding-left: 0;
    }

    /* Grid Layout */
    article .two-column {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin: 30px 0;
    }

    article .card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        border-top: 3px solid #28AFCF;
        transition: all 0.3s ease;
    }

    article .card:hover {
        box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        transform: translateY(-4px);
    }

    article .card h4 {
        margin-top: 0;
        color: #134958;
        border-left: none;
        padding-left: 0;
    }

    /* FAQ Section */
    article .faq-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    article .faq-list {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        margin: 30px 0;
    }

    article .faq-item {
        border-bottom: 1px solid #e7e7ec;
    }

    article .faq-item:last-child {
        border-bottom: none;
    }

    article .faq-question {
        width: 100%;
        background: transparent;
        border: none;
        padding: 1.25rem 1.5rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: background-color 0.2s ease;
        text-align: left;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.6;
        color: #134958 !important;
    }

    article .faq-question:hover {
        background-color: #f8f9fa;
    }

    article .faq-item.active .faq-question {
        background-color: #f8f9fa;
    }

    article .faq-toggle {
        flex-shrink: 0;
        margin-left: 1.25rem;
        color: #28AFCF;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
        font-size: 1.5rem;
        font-weight: 700;
    }

    article .faq-item.active .faq-toggle {
        transform: rotate(90deg);
    }

    article .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
        background: #fafbfc;
    }

    article .faq-answer.active {
        max-height: 3000px;
    }

    article .faq-answer p {
        margin: 0 0 0.75rem 0 !important;
        padding: 0 1.5rem !important;
        font-family: 'Roboto', sans-serif !important;
        font-size: 16px !important;
        font-weight: 400 !important;
        line-height: 1.6 !important;
        color: #666 !important;
    }

    article .faq-answer p + p {
        margin-top: 0 !important;
    }

    article .faq-answer p strong {
        color: #134958;
        font-weight: 700;
    }

    article .faq-answer ul {
        margin: 0 0 0.75rem 2rem;
        padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        list-style: none;
    }

    article .faq-answer ul li {
        margin-bottom: 0.5rem;
        padding-left: 1.5rem;
        position: relative;
    }

    article .faq-answer ul li:before {
        content: "▸";
        position: absolute;
        left: 0;
        color: #28AFCF;
        font-weight: 700;
        font-size: 18px;
    }

    article .faq-answer > *:first-child {
        margin-top: 1rem !important;
    }

    article .faq-answer > *:last-child {
        margin-bottom: 1rem !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        /* Left-align all content on mobile */
        article .hero,
        article .hero h1,
        article .hero .subtitle,
        article section,
        article h2,
        article h3,
        article p,
        article .highlight-box,
        article .highlight-box p,
        article .warning-box,
        article .warning-box p,
        article .card,
        article .card h3,
        article .card p,
        article .faq-question,
        article .faq-answer,
        article .faq-answer p {
            text-align: left !important;
        }

        .act-content-wrapper {
            padding: 0 16px;
        }

        article section {
            padding: 12px 0;
        }

        article .hero {
            padding: 30px 16px;
        }

        article .hero h1 {
            font-size: 28px !important;
        }

        article .hero .subtitle {
            font-size: 16px !important;
        }

        article h2 {
            font-size: 24px !important;
            display: block;
        }

        article h3 {
            font-size: 20px !important;
        }

        article .comparison-table {
            font-size: 13px;
            overflow-x: auto;
        }

        article .comparison-table table {
            min-width: 600px;
        }

        article .comparison-table th,
        article .comparison-table td {
            padding: 10px 8px;
        }

        article .two-column {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        article .highlight-box,
        article .warning-box {
            padding: 15px 16px;
            margin: 20px 0;
        }

        article .card {
            padding: 20px 16px;
        }

        article .faq-question {
            font-size: 16px !important;
            padding: 15px 12px;
        }

        article .faq-toggle {
            font-size: 1.3rem;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
        <article>

<!-- HERO -->
<div class="hero">
    <div class="act-content-wrapper">
        <h1>Understanding the Enhanced ACT</h1>
        <p class="subtitle">The updated ACT is here—shorter, more flexible, with an optional Science section</p>
    </div>
</div>

<!-- OVERVIEW -->
<section>
    <div class="act-content-wrapper">
        <h2>What is the Enhanced ACT?</h2>
        <p>The Enhanced ACT launched in April 2025 and represents the most significant update to the ACT in years. The test is now shorter (125 minutes vs. 175 minutes), has fewer questions (131 vs. 215), and gives students 18% more time per question. Most notably, the Science section is now optional.</p>

        <div class="highlight-box">
            <h4>Key Changes at a Glance</h4>
            <ul>
                <li>131 questions instead of 215 (44-84 fewer questions)</li>
                <li>125 minutes instead of 175 minutes (50 minutes shorter without Science)</li>
                <li>~57 seconds per question vs. ~49 seconds (18% more time)</li>
                <li>Science section is now optional</li>
                <li>Composite score based on 3 sections (English, Math, Reading) instead of 4</li>
                <li>Math has 4 answer choices instead of 5</li>
            </ul>
        </div>

        <p><strong>Bottom Line:</strong> The Enhanced ACT isn't easier—it's more manageable. Same content difficulty, better pacing, and strategic flexibility with Science.</p>
    </div>
</section>

<!-- COMPARISON -->
<section class="section-alt">
    <div class="act-content-wrapper">
        <h2>Legacy ACT vs. Enhanced ACT</h2>

        <div class="comparison-table">
            <table>
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Legacy ACT</th>
                        <th>Enhanced ACT</th>
                        <th>Key Changes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>English</strong></td>
                        <td>75 questions, 45 minutes</td>
                        <td>60 questions, 36 minutes</td>
                        <td>Slightly more time per question. Content unchanged.</td>
                    </tr>
                    <tr>
                        <td><strong>Math</strong></td>
                        <td>60 questions, 60 minutes<br>5 answer choices (A-E)</td>
                        <td>45 questions, 50 minutes<br>4 answer choices (A-D)</td>
                        <td>Reduced to 4 answer choices. Content coverage unchanged.</td>
                    </tr>
                    <tr>
                        <td><strong>Reading</strong></td>
                        <td>40 questions, 35 minutes</td>
                        <td>26 questions, 39 minutes</td>
                        <td>Shorter passages, more time per question. Passage types unchanged.</td>
                    </tr>
                    <tr>
                        <td><strong>Science</strong></td>
                        <td>40 questions, 35 minutes<br>(Required)</td>
                        <td>40 questions, 40 minutes<br>(Optional)</td>
                        <td>Now optional. 5 more minutes if taken. Content unchanged.</td>
                    </tr>
                    <tr>
                        <td><strong>Total Time</strong></td>
                        <td>175 minutes (with Science)</td>
                        <td>125 minutes (core)<br>165 minutes (with Science)</td>
                        <td>50 minutes shorter without Science</td>
                    </tr>
                    <tr>
                        <td><strong>Total Questions</strong></td>
                        <td>215 questions</td>
                        <td>131 questions (core)<br>171 questions (with Science)</td>
                        <td>44-84 fewer questions</td>
                    </tr>
                    <tr>
                        <td><strong>Composite Score</strong></td>
                        <td>Average of 4 sections<br>(English, Math, Reading, Science)</td>
                        <td>Average of 3 sections<br>(English, Math, Reading)</td>
                        <td>Science NOT included in Composite, even if taken</td>
                    </tr>
                    <tr>
                        <td><strong>Score Reporting</strong></td>
                        <td>4 section scores + Composite</td>
                        <td>With Science: 4 section scores + STEM score + Composite<br>Without Science: 3 section scores + Composite</td>
                        <td>STEM score = (Math + Science) ÷ 2</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p style="margin-top: 30px;"><strong>Superscoring:</strong> You can superscore across any ACT test dates—legacy or Enhanced. Nearly all colleges accept superscores combining your highest English, Math, and Reading from different tests.</p>
    </div>
</section>

<!-- SCIENCE DECISION -->
<section class="section-alt">
    <div class="act-content-wrapper">
        <h2>Should You Take the Science Section?</h2>

        <p>This is the biggest strategic decision with the Enhanced ACT.</p>

        <h3>Take Science If:</h3>
        <ul>
            <li>Applying to STEM programs (engineering, pre-med, computer science, biology, chemistry, physics)</li>
            <li>Science is a strength—you consistently score well on practice sections</li>
            <li>Target schools require or recommend it</li>
            <li>Want a STEM score for STEM-focused scholarships and programs</li>
            <li>Building a STEM profile—Science score reinforces your credentials</li>
        </ul>

        <h3>Skip Science If:</h3>
        <ul>
            <li>Humanities/arts focus (English, history, arts, social sciences, non-quantitative business)</li>
            <li>Science is your weakest section—don't give colleges a weak data point</li>
            <li>Struggle with time management—shorter test = less fatigue = better performance</li>
            <li>All target schools are test-optional or don't require Science</li>
            <li>Already submitting SAT (which has no Science section)</li>
        </ul>

        <div class="warning-box">
            <h4>Strategy Tip</h4>
            <p>Take a diagnostic practice test with Science and without Science. Compare your performance. If Science significantly lowers your overall confidence or energy level, consider skipping it—especially if your target schools don't require it.</p>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background: linear-gradient(135deg, #134958 0%, #28AFCF 100%); padding: 20px 0; text-align: center;">
    <div class="act-content-wrapper">
        <h2 style="color: white !important; border-bottom: none; display: block; padding-bottom: 0;">Ready to Master the Enhanced ACT?</h2>
        <p style="color: white !important; max-width: 1200px; margin: 0 auto 20px; opacity: 0.95;">Our Enhanced ACT prep program is fully updated for the 2025 format. We'll help you navigate the new structure, make strategic decisions about the Science section, and achieve your target score efficiently. Our program includes full-length practice tests in Enhanced ACT format (both with and without Science), strategic guidance on the Science section decision, timing drills optimized for the new structure, math strategies for 4-choice questions, approaches for shorter Reading passages, and comprehensive review of all content areas.</p>
        <?php echo do_shortcode('[inquiry_button]'); ?>
    </div>
</section>

<!-- FAQ -->
<section class="section-alt">
    <div class="act-content-wrapper">
        <h2>Frequently Asked Questions</h2>

        <div class="faq-list">

            <!-- FAQ Item 1 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Do colleges treat Enhanced ACT scores differently?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>No.</strong> The Enhanced ACT and legacy ACT are considered equivalent by colleges. Your scores are valued the same regardless of which version you took.</p>
                    <p>Legacy ACT scores remain fully valid. Colleges accept scores from both versions, and most superscore across versions.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Is the Enhanced ACT easier?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Not easier, but more manageable.</strong> You have fewer questions and more time per question, which can reduce careless errors. However, content difficulty remains the same.</p>
                    <p>The Enhanced ACT maintains the same academic rigor—you just have better pacing and less mental fatigue.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Can I still use my old ACT prep books?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Partially.</strong> The content and question types are the same, but the number of questions, timing, and structure have changed.</p>
                    <p>You can use old materials for content review, but you'll need updated materials for accurate practice test simulation and timing strategies.</p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What if my target school requires Science?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Check each school's specific requirements. Most schools that previously required the full ACT have clarified their policies for the Enhanced ACT. Many now accept scores with or without Science.</p>
                    <p>Visit admissions websites or contact offices directly. Note the difference between "required" and "recommended."</p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Should I retake if I took the legacy ACT?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Only if you believe you can significantly improve your core section scores</strong> (English, Math, Reading).</p>
                    <p>The format change alone isn't a reason to retake if you're already at your target score. However, if you struggled with time management or Science dragged down your composite, the Enhanced ACT might work better for you.</p>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>When did the Enhanced ACT roll out?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>April 2025:</strong> Enhanced ACT launched for national (Saturday) online/digital testing</p>
                    <p><strong>September 2025:</strong> All national tests (Saturday, paper and digital) transitioned to Enhanced ACT</p>
                    <p><strong>Spring 2026:</strong> School day testing (state and district) transitions to Enhanced ACT</p>
                    <p>If you're testing fall 2025 or beyond, you'll be taking the Enhanced ACT.</p>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Can international students take the Enhanced ACT?</span>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p><strong>Yes.</strong> International testing transitioned to the Enhanced ACT in September 2025. All international ACT testing is digital/online only.</p>
                </div>
            </div>

        </div><!-- .faq-list -->
    </div>
</section>

        </article>
        <?php endwhile; ?>
    </main>
</div>

<script>
function toggleFAQ(element) {
    const faqItem = element.closest('.faq-item');
    const answer = element.nextElementSibling;
    const isActive = faqItem.classList.contains('active');

    // Close all other FAQs
    document.querySelectorAll('.faq-item.active').forEach(item => {
        item.classList.remove('active');
        item.querySelector('.faq-answer').classList.remove('active');
    });

    // Toggle current FAQ
    if (!isActive) {
        faqItem.classList.add('active');
        answer.classList.add('active');
    }
}
</script>

<?php
/**
 * Article Schema Markup for SEO
 */
$article_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => "What's New in the Enhanced ACT 2025: Complete Guide",
    'description' => 'Complete guide to Enhanced ACT 2025 changes including shorter test time, optional Science section, and new scoring.',
    'author' => array(
        '@type' => 'Organization',
        'name' => 'NYC STEM Club',
        'url' => 'https://nycstemclub.com'
    ),
    'publisher' => array(
        '@type' => 'Organization',
        'name' => 'NYC STEM Club',
        'url' => 'https://nycstemclub.com'
    ),
    'keywords' => 'Enhanced ACT, ACT 2025, ACT changes, optional Science, ACT prep'
);
echo '<script type="application/ld+json">' . wp_json_encode($article_schema, JSON_UNESCAPED_SLASHES) . '</script>';

get_footer();
