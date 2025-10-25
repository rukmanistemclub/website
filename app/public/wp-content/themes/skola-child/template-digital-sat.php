<?php
/**
 * Template Name: Digital SAT Full Width
 * Description: Custom full-width template for Digital SAT blog post
 */

get_header(); ?>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700;800&display=swap" rel="stylesheet">

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
    font-family: 'Roboto', sans-serif !important;
    font-weight: 600 !important;
    line-height: 1.7;
    color: #333;
    background: #f8f9fa;
}

/* Article Hero Section */
.article-hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    padding: 60px 20px 50px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.article-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 80%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: pulse 8s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.1); opacity: 0.3; }
}

.hero-content {
    max-width: 900px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.announcement-badge {
    display: inline-block;
    background: rgba(255, 127, 7, 0.9);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 20px;
}

.article-title {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 16px;
    line-height: 1.2;
    color: white !important;
}

.article-subtitle {
    font-size: 20px;
    opacity: 0.95;
    margin-bottom: 24px;
}

.timeline-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    padding: 10px 24px;
    border-radius: 25px;
    font-size: 16px;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

/* Main Article Container */
.article-container {
    max-width: 1000px;
    margin: -30px auto 60px;
    padding: 0 20px;
}

.lead-intro {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    font-size: 20px;
    line-height: 1.8;
    margin-bottom: 50px;
    border-left: 5px solid #28AFCF;
}

/* Changes List */
.changes-list {
    background: white;
    padding: 25px 40px 50px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    margin-bottom: 20px;
}

.changes-list h2 {
    font-size: 32px;
    color: #134958;
    margin-bottom: 40px;
    text-align: center;
    font-weight: 800;
}

.change-steps {
    list-style: none;
    counter-reset: change-counter;
}

.change-step {
    counter-increment: change-counter;
    margin-bottom: 50px;
    padding-left: 0;
}

.change-step h3 {
    font-size: 26px;
    color: #28AFCF;
    margin-bottom: 20px;
    font-weight: 700;
    position: relative;
    padding-left: 60px;
}

.change-step h3::before {
    content: counter(change-counter);
    position: absolute;
    left: 0;
    top: -5px;
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #28AFCF, #134958);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: 800;
}

.change-step p {
    font-size: 18px;
    line-height: 1.8;
    margin-bottom: 20px;
    padding-left: 60px;
}

/* Comparison Cards */
.comparison-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin: 30px 0;
    padding-left: 60px;
}

.comparison-card {
    background: #f8f9fa;
    padding: 28px;
    border-radius: 12px;
    text-align: center;
    position: relative;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.comparison-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.before-card {
    border-color: #ddd;
}

.after-card {
    border-color: #28AFCF;
    background: linear-gradient(135deg, rgba(40, 175, 207, 0.05), rgba(19, 73, 88, 0.05));
}

.card-label {
    display: inline-block;
    background: #134958;
    color: white;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 16px;
}

.after-card .card-label {
    background: linear-gradient(135deg, #28AFCF, #134958);
}

.card-stat {
    font-size: 42px;
    font-weight: 800;
    color: #28AFCF;
    margin-bottom: 16px;
}

.card-description {
    font-size: 16px;
    line-height: 1.8;
    color: #666;
}

/* Feature Grid */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin: 30px 0;
    padding-left: 60px;
}

.feature-item {
    background: #f8f9fa;
    padding: 24px;
    border-radius: 10px;
    text-align: center;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.feature-item:hover {
    border-color: #28AFCF;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(40, 175, 207, 0.15);
}

.feature-icon {
    font-size: 36px;
    margin-bottom: 12px;
}

.feature-title {
    font-size: 17px;
    font-weight: 700;
    color: #134958;
    margin-bottom: 8px;
}

.feature-desc {
    font-size: 14px;
    color: #666;
}

/* Info Box */
.info-box {
    background: linear-gradient(135deg, rgba(255, 127, 7, 0.1), rgba(255, 159, 64, 0.1));
    border-left: 5px solid #FF7F07;
    padding: 28px;
    border-radius: 10px;
    margin: 30px 0 30px 60px;
}

.info-box-title {
    font-size: 20px;
    font-weight: 700;
    color: #FF7F07;
    margin-bottom: 12px;
}

.info-box p {
    font-size: 17px;
    line-height: 1.8;
    margin: 0;
    padding: 0;
}

.info-box ul {
    margin: 16px 0 0 20px;
    padding: 0;
}

.info-box li {
    font-size: 17px;
    line-height: 1.8;
    margin-bottom: 10px;
}

/* Impact Section */
.impact-section {
    background: white;
    padding: 10px 40px 50px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    margin-bottom: 40px;
}

.impact-section h2 {
    font-size: 32px;
    color: #134958;
    margin-bottom: 30px;
    text-align: center;
    font-weight: 800;
}

.impact-section p {
    font-size: 18px;
    line-height: 1.8;
    margin-bottom: 20px;
}

.key-points {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    border-left: 5px solid #28AFCF;
    margin: 30px 0;
}

.key-points h3 {
    font-size: 22px;
    color: #28AFCF;
    margin-bottom: 16px;
    font-weight: 700;
}

.key-points ul {
    margin: 0;
    padding-left: 24px;
}

.key-points li {
    font-size: 17px;
    line-height: 1.9;
    margin-bottom: 12px;
}

/* Decision Box */
.decision-box {
    background: linear-gradient(135deg, #28AFCF 0%, #134958 100%);
    color: white;
    padding: 50px 40px;
    border-radius: 12px;
    text-align: center;
    margin-bottom: 40px;
    box-shadow: 0 10px 40px rgba(19, 73, 88, 0.3);
}

.decision-box h2 {
    font-size: 32px;
    margin-bottom: 20px;
    font-weight: 800;
}

.decision-box p {
    font-size: 19px;
    opacity: 0.95;
    margin-bottom: 30px;
    line-height: 1.8;
}

.cta-button {
    display: inline-block;
    background: #FF7F07;
    color: white;
    padding: 18px 40px;
    border-radius: 30px;
    font-size: 18px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(255, 127, 7, 0.3);
}

.cta-button:hover {
    background: #FF9F40;
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(255, 127, 7, 0.4);
}

/* Global CTA Button */
.cta-btn {
    background: #FF7F07;
    color: white;
    padding: 15px 40px;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
}

.cta-btn:hover {
    background: #e66f00;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(255, 127, 7, 0.3);
}

/* CTA Buttons Container */
.cta-buttons-container {
    display: flex;
    gap: 20px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

/* Secondary CTA Button */
.cta-btn-secondary {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    padding: 15px 40px;
    border: 3px solid white;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    backdrop-filter: blur(10px);
}

.cta-btn-secondary:hover {
    background: white;
    color: #134958;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(255, 255, 255, 0.4);
}

/* Responsive */
@media (max-width: 768px) {
    .article-title {
        font-size: 36px;
    }

    .comparison-cards,
    .feature-grid {
        grid-template-columns: 1fr;
    }

    .change-step h3,
    .change-step p,
    .comparison-cards,
    .feature-grid,
    .info-box {
        padding-left: 0;
        margin-left: 0;
    }

    .change-step h3 {
        padding-left: 55px;
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

<div class="entry-content">
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
            <strong>As of January 2024, the College Board has successfully transitioned the SAT to a fully digital format.</strong> This significant shift revolutionizes how test-takers should prepare for the exam. So, what sets the Digital SAT apart from its traditional counterpart?
        </p>

        <!-- Major Changes -->
        <div class="changes-list">
            <h2>Understanding the Major Changes</h2>

            <ol class="change-steps">
                <!-- Change 1: Format -->
                <li class="change-step">
                    <h3>Format: Shorter & More Efficient</h3>

                    <p>The Digital SAT is now a <strong>shorter exam</strong>, completed in 2 hours and 14 minutes, as opposed to the traditional 3 hours and 15 minutes for the paper exam. The exam is divided into four modules—two each for Reading & Writing, and two for Math.</p>

                    <div class="comparison-cards">
                        <div class="comparison-card before-card">
                            <span class="card-label">Paper SAT</span>
                            <div class="card-stat">3h 15m</div>
                            <div class="card-description">
                                154 questions<br>
                                Long passages<br>
                                Single difficulty<br>
                                Paper-based
                            </div>
                        </div>
                        <div class="comparison-card after-card">
                            <span class="card-label">Digital SAT ✨</span>
                            <div class="card-stat">2h 14m</div>
                            <div class="card-description">
                                98 questions<br>
                                Shorter passages<br>
                                Adaptive testing<br>
                                Digital-first
                            </div>
                        </div>
                    </div>

                    <p><strong>Module Breakdown:</strong> Each Reading & Writing module consists of 27 questions (32 minutes each). Each Math module has 22 questions (35 minutes each).</p>

                    <div class="info-box">
                        <div class="info-box-title">🎯 Adaptive Testing</div>
                        <p>The Digital SAT uses <strong>section-level adaptive testing</strong>. Your performance in Module 1 determines the difficulty of Module 2:</p>
                        <ul>
                            <li>Perform well → Get harder questions with higher score potential</li>
                            <li>Struggle initially → Get easier questions with adjusted scoring range</li>
                            <li>Each test is uniquely tailored to your ability level</li>
                        </ul>
                    </div>
                </li>

                <!-- Change 2: Content -->
                <li class="change-step">
                    <h3>Content: Shorter Passages, Focused Questions</h3>

                    <p>Unlike the traditional paper SAT with long, dense passages, the Digital SAT assesses reading comprehension and grammar skills using <strong>short paragraphs for every question</strong>. This makes the test less about stamina and more about skill.</p>

                    <p><strong>Reading & Writing Skills Assessed:</strong></p>

                    <div class="feature-grid">
                        <div class="feature-item">
                            <div class="feature-icon">💡</div>
                            <div class="feature-title">Information and Ideas</div>
                            <div class="feature-desc">Comprehension and analysis of texts</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🎨</div>
                            <div class="feature-title">Craft and Structure</div>
                            <div class="feature-desc">Understanding writing techniques</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✍️</div>
                            <div class="feature-title">Expression of Ideas</div>
                            <div class="feature-desc">Effective communication skills</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📝</div>
                            <div class="feature-title">Standard English Conventions</div>
                            <div class="feature-desc">Grammar and usage rules</div>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-box-title">🧮 Math Section Updates</div>
                        <p><strong>Calculator allowed for BOTH math modules</strong> (previously only one section allowed calculators). You can use your own approved calculator or the built-in Desmos graphing calculator.</p>
                        <p style="margin-top: 12px;"><strong>Math content remains similar:</strong> Algebra, Advanced Math, Problem-Solving & Data Analysis, and Geometry & Trigonometry.</p>
                    </div>
                </li>

                <!-- Change 3: Testing Experience -->
                <li class="change-step">
                    <h3>Testing Experience: Digital Tools & Flexibility</h3>

                    <p>Students can take the Digital SAT on their own laptop, a school-issued device, or borrow one from College Board (request 30 days in advance). The test is administered through the <strong>Bluebook™ app</strong>.</p>

                    <p><strong>Digital Features Include:</strong></p>
                    <ul style="padding-left: 80px; margin-top: 20px;">
                        <li style="margin-bottom: 12px; font-size: 17px;">Built-in timer for each module</li>
                        <li style="margin-bottom: 12px; font-size: 17px;">Digital highlighting and annotation tools</li>
                        <li style="margin-bottom: 12px; font-size: 17px;">Built-in Desmos calculator for all math questions</li>
                        <li style="margin-bottom: 12px; font-size: 17px;">Flag questions for review</li>
                        <li style="margin-bottom: 12px; font-size: 17px;">Work saved automatically (even if internet drops)</li>
                    </ul>

                    <div class="info-box">
                        <div class="info-box-title">⚡ Faster Score Reporting</div>
                        <p>Digital SAT scores are delivered in <strong>days instead of weeks</strong>. You'll receive your results much faster than the traditional paper SAT.</p>
                    </div>
                </li>

                <!-- Change 4: Scoring -->
                <li class="change-step">
                    <h3>Scoring: Same Scale, New Approach</h3>

                    <p>The Digital SAT maintains the <strong>200-1600 point scale</strong> (200-800 per section). However, because of adaptive testing, the same number of correct answers doesn't always equal the same score.</p>

                    <p>The difficulty of questions you receive in Module 2 affects your final score. Higher-difficulty questions are worth more points, rewarding strong performance in Module 1.</p>
                </li>
            </ol>
        </div>

        <!-- Impact Section -->
        <div class="impact-section">
            <h2>How This Impacts Your Test Prep</h2>

            <p>The transition to digital format requires strategic adjustments in how students prepare for the SAT:</p>

            <div class="key-points">
                <h3>✅ What Stays the Same</h3>
                <ul>
                    <li>Core content areas (Reading, Writing, Math) are unchanged</li>
                    <li>1600-point scoring scale remains</li>
                    <li>Colleges accept Digital SAT scores the same as paper SAT</li>
                    <li>Test-taking strategies fundamentally remain effective</li>
                </ul>
            </div>

            <div class="key-points">
                <h3>🔄 What You Need to Practice</h3>
                <ul>
                    <li><strong>Digital interface familiarity:</strong> Practice with Bluebook™ app regularly</li>
                    <li><strong>Shorter reading passages:</strong> Quick comprehension is now critical</li>
                    <li><strong>Module 1 strategy:</strong> Strong start = harder questions = higher score potential</li>
                    <li><strong>Calculator efficiency:</strong> Master the Desmos calculator or your own</li>
                    <li><strong>Digital annotation tools:</strong> Learn to highlight and take notes on-screen</li>
                    <li><strong>Pacing with digital timer:</strong> Each module has its own countdown</li>
                </ul>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="decision-box">
            <h2>Ready to Master the Digital SAT?</h2>
            <p>NYC STEM Club's expert instructors are fully trained on the Digital SAT format. Our comprehensive prep program combines content mastery with digital test-taking strategies to maximize your score.</p>
            <div class="cta-buttons-container">
                <a href="/student-enrollment/" class="cta-btn">Inquire Now</a>
                <a href="/sat-act-test-prep/" class="cta-btn-secondary">View Programs</a>
            </div>
        </div>
    </article>
</div>

<?php get_footer(); ?>
