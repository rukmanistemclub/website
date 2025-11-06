<?php
/**
 * Template Name: Enhanced ACT Guide
 * Description: Complete guide to the Enhanced ACT for 2025
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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 400;
        line-height: 1.8;
        color: #2d3748;
        font-size: 18px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 60px 20px;
        text-align: center;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero .subtitle {
        font-size: 1.2em;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Content Sections */
    section {
        padding: 40px 20px;
    }

    .section-alt {
        background: white;
    }

    h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 30px;
        color: #134958;
        line-height: 1.3;
    }

    h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #134958;
        margin: 30px 0 20px;
        line-height: 1.3;
    }

    h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #28AFCF;
        margin: 20px 0 12px;
        line-height: 1.4;
    }

    p {
        margin-bottom: 20px;
        color: #2d3748;
    }

    strong {
        font-weight: 600;
        color: #334155;
    }

    ul, ol {
        margin: 20px 0 20px 30px;
    }

    li {
        margin-bottom: 12px;
        line-height: 1.8;
    }

    /* Comparison Table */
    .comparison-table {
        width: 100%;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        margin: 30px 0;
    }

    .comparison-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .comparison-table th {
        background: #134958;
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
    }

    .comparison-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .comparison-table tr:last-child td {
        border-bottom: none;
    }

    .comparison-table tr:nth-child(even) {
        background: #f8f9fa;
    }

    /* Highlight Boxes */
    .highlight-box {
        background: #f0f8ff;
        border-left: 4px solid #28AFCF;
        padding: 20px;
        margin: 30px 0;
        border-radius: 4px;
    }

    .highlight-box h4 {
        margin-top: 0;
        color: #134958;
    }

    .warning-box {
        background: #fff9f0;
        border-left: 4px solid #FF7F07;
        padding: 20px;
        margin: 30px 0;
        border-radius: 4px;
    }

    .warning-box h4 {
        margin-top: 0;
        color: #FF7F07;
    }

    .success-box {
        background: #f0fdf4;
        border-left: 4px solid #22c55e;
        padding: 20px;
        margin: 30px 0;
        border-radius: 4px;
    }

    .success-box h4 {
        margin-top: 0;
        color: #16a34a;
    }

    /* Timeline */
    .timeline {
        margin: 30px 0;
    }

    .timeline-item {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
        align-items: flex-start;
    }

    .timeline-date {
        font-weight: 700;
        color: #28AFCF;
        min-width: 120px;
        font-size: 1.1em;
    }

    .timeline-content {
        flex: 1;
    }

    /* CTA Button */
    .cta-button {
        display: inline-block;
        background: #FF7F07;
        color: white;
        padding: 16px 40px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.1em;
        transition: transform 0.2s, box-shadow 0.2s;
        margin-top: 20px;
    }

    .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 127, 7, 0.3);
    }

    /* Grid Layout */
    .two-column {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin: 30px 0;
    }

    .card {
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .card h4 {
        margin-top: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 1.8em;
        }

        h2 {
            font-size: 1.6em;
        }

        .comparison-table {
            font-size: 0.9em;
        }

        .two-column {
            grid-template-columns: 1fr;
        }

        .timeline-item {
            flex-direction: column;
            gap: 5px;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
        <article>

<!-- HERO -->
<div class="hero">
    <div class="container">
        <h1>Understanding the Enhanced ACT: Complete Guide for 2025</h1>
        <p class="subtitle">Everything you need to know about the updated ACT format, changes, and how to prepare strategically</p>
    </div>
</div>

<!-- OVERVIEW -->
<section>
    <div class="container">
        <h2>What is the Enhanced ACT?</h2>
        <p>The Enhanced ACT is the updated version of the ACT test that rolled out in <strong>April 2025</strong> (digital format) and <strong>September 2025</strong> (all formats). It represents the most significant changes to the ACT in years, designed to make the test shorter, more flexible, and less stressful while maintaining academic rigor.</p>

        <p>The key philosophy: <strong>fewer questions, more time per question, optional Science section.</strong></p>

        <div class="highlight-box">
            <h4>Bottom Line:</h4>
            <p>The Enhanced ACT is not easier—it's more manageable. You'll have 18% more time per question, face 44-84 fewer questions, and can strategically choose whether to take the Science section based on your college goals.</p>
        </div>
    </div>
</section>

<!-- KEY CHANGES -->
<section class="section-alt">
    <div class="container">
        <h2>Major Changes at a Glance</h2>

        <h3>Test Structure</h3>
        <div class="comparison-table">
            <table>
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Legacy ACT</th>
                        <th>Enhanced ACT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Total Time</strong></td>
                        <td>175 minutes (2hr 55min)</td>
                        <td>125 minutes (2hr 5min) core<br>165 minutes with Science</td>
                    </tr>
                    <tr>
                        <td><strong>Total Questions</strong></td>
                        <td>215 questions</td>
                        <td>131 questions (core)<br>171 questions with Science</td>
                    </tr>
                    <tr>
                        <td><strong>Time Per Question</strong></td>
                        <td>~49 seconds average</td>
                        <td>~57 seconds average (18% more)</td>
                    </tr>
                    <tr>
                        <td><strong>Science Section</strong></td>
                        <td>Required (35 minutes)</td>
                        <td>Optional (40 minutes)</td>
                    </tr>
                    <tr>
                        <td><strong>Math Answer Choices</strong></td>
                        <td>5 options (A-E)</td>
                        <td>4 options (A-D)</td>
                    </tr>
                    <tr>
                        <td><strong>Composite Score</strong></td>
                        <td>Avg of 4 sections<br>(English, Math, Reading, Science)</td>
                        <td>Avg of 3 sections<br>(English, Math, Reading only)</td>
                    </tr>
                    <tr>
                        <td><strong>5th Section</strong></td>
                        <td>Separate 20-min experimental</td>
                        <td>Embedded throughout (mixed in)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3>Section-by-Section Breakdown</h3>

        <div class="two-column">
            <div class="card">
                <h4>English</h4>
                <p><strong>Legacy:</strong> 75 questions, 45 minutes<br>
                <strong>Enhanced:</strong> 60 questions, 36 minutes</p>
                <p>Content and question types remain the same. Slightly more time per question.</p>
            </div>

            <div class="card">
                <h4>Math</h4>
                <p><strong>Legacy:</strong> 60 questions, 60 minutes<br>
                <strong>Enhanced:</strong> 45 questions, 50 minutes</p>
                <p>Reduced from 5 answer choices to 4. Content coverage unchanged.</p>
            </div>

            <div class="card">
                <h4>Reading</h4>
                <p><strong>Legacy:</strong> 40 questions, 35 minutes<br>
                <strong>Enhanced:</strong> 26 questions, 39 minutes</p>
                <p>Shorter passages, more time per question. Passage types remain the same.</p>
            </div>

            <div class="card">
                <h4>Science (Optional)</h4>
                <p><strong>Legacy:</strong> 40 questions, 35 minutes<br>
                <strong>Enhanced:</strong> 40 questions, 40 minutes</p>
                <p>Now optional. Content unchanged, but 5 more minutes if you take it.</p>
            </div>
        </div>
    </div>
</section>

<!-- SCORING -->
<section>
    <div class="container">
        <h2>How Scoring Works Now</h2>

        <h3>The New Composite Score</h3>
        <p>The most important change: <strong>Your Composite score is now based on only 3 sections instead of 4.</strong></p>

        <div class="highlight-box">
            <h4>Enhanced ACT Composite Score Formula:</h4>
            <p><strong>Composite = (English + Math + Reading) ÷ 3</strong></p>
            <p>Science is <strong>NOT</strong> included in your Composite score, even if you take it.</p>
        </div>

        <h3>Score Reporting</h3>
        <div class="two-column">
            <div class="card">
                <h4>If you take Science:</h4>
                <ul>
                    <li>You'll see separate scores for: English, Math, Reading, Science</li>
                    <li>Your Composite = average of English, Math, Reading</li>
                    <li>You'll also receive a <strong>STEM score</strong> = average of Math and Science</li>
                </ul>
            </div>

            <div class="card">
                <h4>If you skip Science:</h4>
                <ul>
                    <li>You'll see scores for: English, Math, Reading</li>
                    <li>Your Composite = average of English, Math, Reading</li>
                    <li>No Science or STEM score reported</li>
                </ul>
            </div>
        </div>

        <h3>Superscoring</h3>
        <p>You can superscore across different ACT versions:</p>
        <ul>
            <li>Your highest English from <em>any</em> test date (legacy or Enhanced)</li>
            <li>Your highest Math from <em>any</em> test date</li>
            <li>Your highest Reading from <em>any</em> test date</li>
        </ul>
        <p>Nearly all colleges superscore across the legacy and Enhanced ACT formats.</p>
    </div>
</section>

<!-- SCIENCE DECISION -->
<section class="section-alt">
    <div class="container">
        <h2>Should You Take the Science Section?</h2>

        <p>This is the biggest strategic decision with the Enhanced ACT. Here's how to decide:</p>

        <h3>✅ Take Science If:</h3>
        <ul>
            <li><strong>Applying to STEM programs</strong> - Engineering, pre-med, computer science, biology, chemistry, physics</li>
            <li><strong>Science is a strength</strong> - You consistently score well on science practice sections</li>
            <li><strong>Target schools require it</strong> - Some competitive schools still require or recommend Science scores</li>
            <li><strong>Want a STEM score</strong> - Helpful for STEM-focused scholarships and programs</li>
            <li><strong>Building a STEM profile</strong> - Science score reinforces your STEM credentials</li>
        </ul>

        <h3>❌ Skip Science If:</h3>
        <ul>
            <li><strong>Humanities/arts focus</strong> - English, history, arts, social sciences, business (non-quantitative)</li>
            <li><strong>Science is your weakest section</strong> - Don't give colleges a weak data point</li>
            <li><strong>Time management struggles</strong> - Shorter test = less fatigue = better performance</li>
            <li><strong>All target schools are test-optional or don't require Science</strong> - Why add 40 minutes if not needed?</li>
            <li><strong>Already submitting SAT</strong> - SAT has no Science, so ACT Science isn't necessary</li>
        </ul>

        <div class="success-box">
            <h4>💡 Strategy Tip:</h4>
            <p>Take a diagnostic practice test with Science and without Science. Compare your performance. If Science significantly lowers your overall confidence or energy level, consider skipping it—especially if your target schools don't require it.</p>
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section>
    <div class="container">
        <h2>Enhanced ACT Rollout Timeline</h2>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-date">April 2025</div>
                <div class="timeline-content">
                    <strong>Enhanced ACT launches</strong> for national (Saturday) online/digital testing only. First test dates with new format.
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-date">June-July 2025</div>
                <div class="timeline-content">
                    <strong>Mixed formats:</strong> Online = Enhanced ACT, Paper = Legacy ACT (last paper tests in old format)
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-date">September 2025</div>
                <div class="timeline-content">
                    <strong>All national tests</strong> (Saturday, both paper and digital) transition to Enhanced ACT format. Legacy ACT retired for national testing.
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-date">Spring 2026</div>
                <div class="timeline-content">
                    <strong>School day testing</strong> (state and district) transitions to Enhanced ACT. All ACT testing now uses Enhanced format.
                </div>
            </div>
        </div>

        <div class="warning-box">
            <h4>📅 Important Note:</h4>
            <p>If you're a junior or senior testing in fall 2025 or beyond, you'll be taking the Enhanced ACT. Make sure your prep materials are updated to the new format.</p>
        </div>
    </div>
</section>

<!-- PREP STRATEGY -->
<section class="section-alt">
    <div class="container">
        <h2>How to Prepare for the Enhanced ACT</h2>

        <h3>1. Prepare with Rigorous, Test-Aligned Materials</h3>
        <p>Train with materials that mirror the actual Enhanced ACT in difficulty, question style, and format. Authentic practice ensures you're truly ready for test day.</p>

        <h3>2. Practice with Both Options</h3>
        <p>Take at least one practice test <em>with</em> Science and one <em>without</em> Science to determine your optimal testing strategy.</p>

        <h3>3. Master Time Management</h3>
        <p>Even with more time per question, pacing is still crucial. The Enhanced ACT is still a fast-paced test—you just have slightly more breathing room.</p>

        <h3>4. Adapt to 4-Choice Math</h3>
        <p>With one fewer answer choice, process of elimination becomes even more powerful. Practice this strategy consistently.</p>

        <h3>5. Build Stamina Strategically</h3>
        <p>If taking Science, build up to the full 2hr 45min test experience. If skipping Science, practice the core 2hr 5min test repeatedly.</p>

        <h3>6. Don't Try to Identify Field-Test Questions</h3>
        <p>Unscored experimental questions are now embedded throughout. You won't know which ones they are, so treat every question as if it counts.</p>

        <div class="highlight-box">
            <h4>Our Enhanced ACT Prep Program Includes:</h4>
            <ul>
                <li>Full-length practice tests in Enhanced ACT format (both with and without Science)</li>
                <li>Strategic guidance on Science section decision</li>
                <li>Timing drills optimized for the new structure</li>
                <li>Math strategies for 4-choice questions</li>
                <li>Approaches for shorter Reading passages</li>
                <li>Comprehensive review of all content areas</li>
            </ul>
            <a href="/student-enrollment/" class="cta-button">Inquire Now</a>
        </div>
    </div>
</section>

<!-- FAQ -->
<section>
    <div class="container">
        <h2>Frequently Asked Questions</h2>

        <h3>Do colleges treat Enhanced ACT scores differently?</h3>
        <p>No. The Enhanced ACT and legacy ACT are considered equivalent by colleges. Your scores are valued the same regardless of which version you took.</p>

        <h3>Is the Enhanced ACT easier?</h3>
        <p>Not easier, but more manageable. You have fewer questions and more time per question, which can reduce careless errors. However, content difficulty remains the same.</p>

        <h3>Can I still use my old ACT scores?</h3>
        <p>Yes! Legacy ACT scores remain fully valid. Colleges accept scores from both versions, and most superscore across versions.</p>

        <h3>Will my old ACT prep books still work?</h3>
        <p>Partially. The content and question types are the same, but the number of questions, timing, and structure have changed. You'll need updated materials for accurate practice test simulation.</p>

        <h3>What if my target school requires Science?</h3>
        <p>Check each school's specific requirements. Most schools that previously required the full ACT have clarified their policies for the Enhanced ACT. Many now accept scores with or without Science.</p>

        <h3>How do I know which schools require Science?</h3>
        <p>Check the admissions website for each school, or contact admissions offices directly. Requirements vary, and some schools "recommend" Science without requiring it.</p>

        <h3>Should I retake if I took the legacy ACT?</h3>
        <p>Only if you believe you can significantly improve your core section scores (English, Math, Reading). The format change alone isn't a reason to retake if you're already at your target score.</p>

        <h3>Can international students take the Enhanced ACT?</h3>
        <p>Yes. International testing transitioned to the Enhanced ACT in September 2025. All international ACT testing is digital/online only.</p>
    </div>
</section>

<!-- FINAL CTA -->
<section class="section-alt">
    <div class="container" style="text-align: center;">
        <h2>Ready to Master the Enhanced ACT?</h2>
        <p style="max-width: 700px; margin: 0 auto 30px;">Our Enhanced ACT prep program is fully updated for the 2025 format. We'll help you navigate the new structure, make strategic decisions about the Science section, and achieve your target score efficiently.</p>
        <a href="/student-enrollment/" class="cta-button">Inquire Now</a>
        <p style="margin-top: 20px; font-size: 0.95em;"><a href="/sat-act-test-prep/" style="color: #28AFCF; text-decoration: none;">← Back to SAT/ACT Prep Overview</a></p>
    </div>
</section>

        </article>
        <?php endwhile; ?>
    </main>
</div>

<?php
get_footer();
