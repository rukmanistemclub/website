<?php
/**
 * Template Name: Digital SAT Full Width
 * Description: Custom full-width template for Digital SAT blog post
 */

get_header(); ?>

<style>
/* Reset theme styles for this page */
.site-content {
    padding: 0 !important;
    margin: 0 auto !important;
    width: 100% !important;
    max-width: 100% !important;
}
.content-area {
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}
article {
    padding: 0 !important;
    margin: 0 auto !important;
    width: 100% !important;
}
.entry-content {
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}
.entry-header {
    display: none !important;
}
#primary {
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}
#content {
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}

/* Override any theme container styles */
.container, .site-main {
    max-width: 100% !important;
    width: 100% !important;
    padding: 0 !important;
    margin: 0 auto !important;
}

/* Force full width and remove any theme-imposed offsets */
.page-template-template-digital-sat {
    padding: 0 !important;
    margin: 0 !important;
}
.page-template-template-digital-sat .site-content,
.page-template-template-digital-sat .content-area,
.page-template-template-digital-sat article,
.page-template-template-digital-sat .entry-content {
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: auto !important;
    margin-right: auto !important;
}

/* Original HTML Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 17px;
    line-height: 1.7;
    color: #2c3e50;
    background: #ffffff;
}

/* Hero Section */
.article-hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    padding: 60px 20px 40px;
    color: white;
    position: relative;
    overflow: hidden;
}

.article-hero::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    transform: translate(30%, -30%);
}

.hero-content {
    max-width: 900px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.announcement-badge {
    display: inline-block;
    background: #FF7F07;
    padding: 8px 20px;
    border-radius: 24px;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 20px;
    text-transform: uppercase;
    box-shadow: 0 4px 12px rgba(255, 127, 7, 0.3);
}

.article-title {
    font-size: 2.75rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
    letter-spacing: -0.02em;
}

.article-subtitle {
    font-size: 1.3rem;
    opacity: 0.95;
    font-weight: 400;
    line-height: 1.5;
}

.timeline-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.15);
    padding: 10px 20px;
    border-radius: 8px;
    margin-top: 24px;
    font-size: 15px;
    font-weight: 600;
}

/* Main Content */
.article-container {
    max-width: 900px;
    margin: 0 auto !important;
    padding: 60px 20px;
    width: 100%;
    box-sizing: border-box;
}

/* Lead Introduction */
.lead-intro {
    font-size: 1.25rem;
    line-height: 1.8;
    color: #1e3a5f;
    margin-bottom: 56px;
    font-weight: 500;
}

/* Numbered Steps Section */
.changes-list {
    margin: 56px 0;
}

.changes-list h2 {
    font-size: 2rem;
    color: #134958;
    margin-bottom: 40px;
    text-align: center;
}

.change-steps {
    counter-reset: step-counter;
    list-style: none;
    padding: 0;
}

.change-step {
    counter-increment: step-counter;
    padding: 48px 0;
    border-bottom: 1px solid #e2e8f0;
    position: relative;
    padding-left: 100px;
}

.change-step:last-child {
    border-bottom: none;
}

.change-step::before {
    content: counter(step-counter);
    position: absolute;
    left: 0;
    top: 48px;
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #28AFCF, #5DD3F0);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    font-weight: 700;
    box-shadow: 0 4px 16px rgba(40, 175, 207, 0.3);
}

.change-step h3 {
    font-size: 1.75rem;
    color: #134958;
    margin-bottom: 20px;
    font-weight: 700;
}

.change-step p {
    color: #475569;
    line-height: 1.8;
    margin-bottom: 20px;
}

.change-step strong {
    color: #134958;
    font-weight: 600;
}

/* Comparison Cards */
.comparison-cards {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin: 32px 0;
}

.comparison-card {
    padding: 28px;
    border-radius: 12px;
    position: relative;
}

.before-card {
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    border: 2px solid #cbd5e1;
}

.after-card {
    background: linear-gradient(135deg, #ecfeff 0%, #cffafe 100%);
    border: 2px solid #28AFCF;
}

.card-label {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 16px;
}

.before-card .card-label {
    background: #64748b;
    color: white;
}

.after-card .card-label {
    background: #28AFCF;
    color: white;
}

.card-stat {
    font-size: 2.5rem;
    font-weight: 700;
    color: #134958;
    margin: 12px 0;
}

.card-description {
    font-size: 0.95rem;
    color: #64748b;
    line-height: 1.6;
}

/* Feature Grid */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin: 32px 0;
}

.feature-item {
    background: white;
    padding: 24px;
    border-radius: 12px;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
}

.feature-item:hover {
    border-color: #28AFCF;
    box-shadow: 0 4px 16px rgba(40, 175, 207, 0.15);
    transform: translateY(-2px);
}

.feature-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 16px;
}

.feature-title {
    font-weight: 700;
    color: #134958;
    margin-bottom: 8px;
    font-size: 1.05rem;
}

.feature-desc {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.6;
}

/* Info Box */
.info-box {
    background: #fff7ed;
    border-left: 4px solid #FF7F07;
    padding: 24px 28px;
    border-radius: 12px;
    margin: 32px 0;
}

.info-box-title {
    font-weight: 700;
    color: #134958;
    font-size: 1.1rem;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.info-box p {
    margin-bottom: 12px;
}

.info-box ul {
    margin-top: 8px;
    padding-left: 24px;
}

.info-box li {
    margin-bottom: 8px;
    color: #475569;
}

/* Impact Section */
.impact-section {
    margin: 56px 0;
    padding: 48px;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 16px;
}

.impact-section h2 {
    font-size: 2rem;
    color: #134958;
    margin-bottom: 32px;
    text-align: center;
}

.impact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
}

.impact-column h3 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.impact-column.benefits h3 {
    color: #059669;
}

.impact-column.downsides h3 {
    color: #dc2626;
}

.impact-column ul {
    list-style: none;
    padding: 0;
}

.impact-column li {
    padding: 12px 0;
    padding-left: 32px;
    position: relative;
    color: #475569;
    line-height: 1.7;
}

.impact-column.benefits li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #10b981;
    font-weight: bold;
    font-size: 1.3rem;
}

.impact-column.downsides li::before {
    content: '!';
    position: absolute;
    left: 0;
    width: 24px;
    height: 24px;
    background: #fef2f2;
    border: 2px solid #ef4444;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ef4444;
    font-weight: bold;
    font-size: 1rem;
}

/* Decision CTA */
.decision-box {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 48px;
    border-radius: 16px;
    margin: 56px 0;
    box-shadow: 0 8px 32px rgba(19, 73, 88, 0.3);
}

.decision-box h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: white;
    text-align: center;
}

.decision-box p {
    font-size: 1.1rem;
    line-height: 1.8;
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto 20px;
    text-align: left;
}

.decision-box .cta-button-wrapper {
    text-align: center;
    margin-top: 32px;
}

.cta-button {
    display: inline-block;
    background: #FF7F07;
    color: white;
    padding: 16px 40px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 16px rgba(255, 127, 7, 0.3);
}

.cta-button:hover {
    background: #e67200;
    transform: translateY(-2px);
    box-shadow: 0 6px 24px rgba(255, 127, 7, 0.4);
}

/* Responsive */
@media (max-width: 768px) {
    .article-title {
        font-size: 2rem;
    }

    .change-step {
        padding-left: 0;
        padding-top: 90px;
    }

    .change-step::before {
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
    }

    .comparison-cards,
    .feature-grid,
    .impact-grid {
        grid-template-columns: 1fr;
    }

    .article-hero {
        padding: 40px 20px 30px;
    }

    .impact-section,
    .decision-box {
        padding: 32px 24px;
    }
}
</style>

<?php while (have_posts()) : the_post(); ?>

    <!-- Hero Section -->
    <div class="article-hero">
        <div class="hero-content">
            <span class="announcement-badge">🆕 Important Update</span>
            <h1 class="article-title">Changes to the New Digital SAT</h1>
            <p class="article-subtitle">Everything you need to know about the Digital SAT transition and how it affects your test prep strategy</p>
            <div class="timeline-badge">
                📅 Effective: January 2024
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <article class="article-container">
        <!-- Lead Introduction -->
        <p class="lead-intro">
            <strong>As of January 2024, the College Board has successfully transitioned the Digital SAT.</strong> This significant shift revolutionizes how test-takers should prepare for the exam. So, what sets the Digital SAT apart from its traditional counterpart?
        </p>

        <!-- Major Changes - Numbered Steps -->
        <div class="changes-list">
            <h2>Understanding the Major Changes</h2>

            <ol class="change-steps">
                <!-- Change 1: Format -->
                <li class="change-step">
                    <h3>Format</h3>

                    <p>The Digital SAT is now a <strong>shorter exam</strong>, completed in 2 hours and 14 minutes, as opposed to the traditional 3 hours and 15 minutes for the paper exam. The exam is divided into four modules—two each for Reading and Verbal, and two for Math.</p>

                    <div class="comparison-cards">
                        <div class="comparison-card before-card">
                            <span class="card-label">Paper SAT</span>
                            <div class="card-stat">3h 15m</div>
                            <div class="card-description">
                                Long passages<br>
                                Single difficulty level<br>
                                Paper-based
                            </div>
                        </div>
                        <div class="comparison-card after-card">
                            <span class="card-label">Digital SAT ✨</span>
                            <div class="card-stat">2h 14m</div>
                            <div class="card-description">
                                Shorter format<br>
                                Adaptive testing<br>
                                Digital-first
                            </div>
                        </div>
                    </div>

                    <p><strong>Module Breakdown:</strong> Each Reading and Verbal module consists of 27 questions, taking 32 minutes to complete. Each Math module comprises 22 questions, taking 35 minutes to complete.</p>

                    <div class="info-box">
                        <div class="info-box-title">⚡ Adaptive Testing</div>
                        <p>Crucially, the Digital SAT is an <strong>adaptive exam</strong>, where your performance in the first set of modules determines the difficulty level of the second set.</p>
                        <p><strong>For instance:</strong> If you excel in the first Reading and Verbal module, you will encounter the advanced module for the second section. Conversely, scoring lower on the first module will result in encountering an easier module for the second section.</p>
                    </div>
                </li>

                <!-- Change 2: Content + Questions -->
                <li class="change-step">
                    <h3>Content + Questions</h3>

                    <p>Unlike the traditional paper SAT, the Digital SAT no longer utilizes long and dense passages for the Reading and Verbal section. Instead, it assesses reading comprehension and grammar skills using <strong>short paragraphs for every question</strong>.</p>

                    <p>The skills tested are simplified into the following categories:</p>

                    <div class="feature-grid">
                        <div class="feature-item">
                            <div class="feature-icon">💡</div>
                            <div class="feature-title">Information and Ideas</div>
                            <div class="feature-desc">Comprehension and analysis</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🎨</div>
                            <div class="feature-title">Craft and Structure</div>
                            <div class="feature-desc">Writing techniques</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✍️</div>
                            <div class="feature-title">Expression of Ideas</div>
                            <div class="feature-desc">Effective communication</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📝</div>
                            <div class="feature-title">Standard English Conventions</div>
                            <div class="feature-desc">Grammar and usage</div>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-box-title">🧮 Math Section Modifications</div>
                        <p>The Math section has also been modified. <strong>You can now use the calculator for both sections</strong>, and the topics covered have been simplified into the following categories:</p>
                        <ul>
                            <li><strong>Algebra</strong></li>
                            <li><strong>Advanced Math</strong></li>
                            <li><strong>Problem-Solving and Data Analysis</strong></li>
                            <li><strong>Geometry and Trigonometry</strong></li>
                        </ul>
                    </div>
                </li>

                <!-- Change 3: Impact -->
                <li class="change-step">
                    <h3>How It Impacts YOU</h3>

                    <p>The Digital SAT aims to be <strong>more accessible for students</strong>, allowing you to focus on demonstrating proficiency rather than enduring a grueling 3-hour exam.</p>

                    <p>In the past, students had to contend not only with the skills tested but also overcome factors like testing stamina, focus, and fatigue. With the Digital SAT, these concerns are reduced due to the shorter test duration and more straightforward questions.</p>

                    <p><strong>The biggest impact might be the reduction in anxiety.</strong> Students report that the Digital SAT is preferred over the paper exam, not only because it's shorter but also because the questions are perceived as fairer and more straightforward.</p>
                </li>
            </ol>
        </div>

        <!-- Impact Section -->
        <div class="impact-section">
            <h2>Benefits & Downsides</h2>

            <div class="impact-grid">
                <div class="impact-column benefits">
                    <h3>✅ Benefits</h3>
                    <ul>
                        <li>Shorter test duration (2h 14m vs 3h 15m)</li>
                        <li>Reduced testing fatigue and anxiety</li>
                        <li>More straightforward questions</li>
                        <li>Fairer assessment of skills</li>
                        <li>Better focus without stamina concerns</li>
                        <li>Calculator allowed for all math sections</li>
                    </ul>
                </div>

                <div class="impact-column downsides">
                    <h3>⚠️ Downsides</h3>
                    <ul>
                        <li>Limited preparation materials (only 4 practice tests)</li>
                        <li>Stricter scoring curve - one mistake can cost 0-30 points</li>
                        <li>Uncertainty in scoring system</li>
                        <li>Requires strong foundational knowledge</li>
                        <li>New format = less predictability</li>
                        <li>Practice performance may differ from real exam</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Decision Section -->
        <div class="decision-box">
            <h2>So, Should I Take the Digital SAT?</h2>
            <p>The decision depends on the type of student and test-taker you are. If you struggle with long durations or feel anxious during high-stakes testing, the Digital SAT might be a good option.</p>
            <p>However, it's crucial to note that, being a new format, uncertainties exist. There is no guarantee that you will score better on the Digital SAT than on the paper version. Furthermore, performance in practice might differ significantly from the real exam.</p>
            <p><strong>One thing is clear though:</strong> just as you must practice for the paper SAT, targeted practice in content and strategies is also necessary for the digital version.</p>
            <div class="cta-button-wrapper">
                <a href="/student-enrollment/" class="cta-button">Inquire About Our Digital SAT Course →</a>
            </div>
        </div>
    </article>

<?php endwhile; ?>

<?php get_footer(); ?>
