<?php
/**
 * Template Name: Testing Timeline Full Width
 * Description: Custom full-width template for NYC Testing Timeline blog post
 */

get_header(); ?>

<style>
/* Reset WordPress theme styles for this custom page */
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

/* Hide default WordPress elements */
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
    font-family: 'Roboto', -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 400;
    line-height: 1.6;
    color: #333;
    background: #f8f9fa;
}

.timeline-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Hero Section - Full Width */
.timeline-hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 80px 40px;
    text-align: center;
    margin-bottom: 0;
    width: 100%;
}

.timeline-hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
    font-weight: 700;
    color: white !important;
}

.timeline-hero p {
    font-size: 20px;
    max-width: 700px;
    margin: 0 auto;
    color: white !important;
}

/* Quick Navigation */
.quick-nav {
    background: white;
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 50px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.quick-nav h2 {
    color: #134958;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: 700;
}

.nav-buttons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.nav-button {
    background: linear-gradient(135deg, #28AFCF, #134958);
    color: white !important;
    padding: 15px 25px;
    border-radius: 8px;
    text-decoration: none;
    text-align: center;
    font-weight: 700;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    display: block;
}

.nav-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(40, 175, 207, 0.3);
    color: white !important;
}

/* Visual Timeline Overview */
.timeline-visual {
    background: white;
    padding: 40px;
    border-radius: 12px;
    margin-bottom: 50px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.timeline-visual h2 {
    color: #134958;
    text-align: center;
    margin-bottom: 40px;
    font-size: 32px;
    font-weight: 700;
}

.timeline-bars {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.timeline-bar {
    position: relative;
}

.bar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.bar-label {
    font-size: 18px;
    font-weight: 700;
    color: #134958;
}

.bar-grade {
    font-size: 14px;
    color: #666;
    font-weight: 600;
}

.bar-fill {
    height: 40px;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
    background: #e9ecef;
}

.bar-inner {
    height: 100%;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 14px;
    transition: width 1s ease;
}

.shsat-bar { background: linear-gradient(90deg, #FF7F07, #FFB366); }
.isee-bar { background: linear-gradient(90deg, #28AFCF, #6DD5F1); }
.sat-bar { background: linear-gradient(90deg, #134958, #1B6B81); }
.act-bar { background: linear-gradient(90deg, #F0B268, #F5D5A3); }

/* Test Section Cards */
.test-sections {
    margin-bottom: 50px;
}

.test-card {
    background: white;
    border-radius: 12px;
    padding: 40px;
    margin-bottom: 30px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    border-left: 5px solid;
}

.test-card.shsat { border-color: #FF7F07; }
.test-card.isee { border-color: #28AFCF; }
.test-card.sat { border-color: #134958; }
.test-card.act { border-color: #F0B268; }

.test-card h3 {
    font-size: 32px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 700;
    color: #134958;
}

.test-badge {
    display: inline-block;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 700;
    color: white;
    margin-left: auto;
}

.shsat .test-badge { background: #FF7F07; }
.isee .test-badge { background: #28AFCF; }
.sat .test-badge { background: #134958; }
.act .test-badge { background: #F0B268; }

.test-intro {
    font-size: 18px;
    color: #555;
    margin-bottom: 30px;
    line-height: 1.8;
}

/* Step-by-Step Timeline */
.prep-timeline {
    margin: 30px 0;
}

.prep-timeline h4 {
    color: #134958;
    font-size: 22px;
    margin-bottom: 20px;
    font-weight: 700;
}

.timeline-steps {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.timeline-step {
    display: flex;
    gap: 20px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    transition: background 0.3s ease;
}

.timeline-step:hover {
    background: #e9ecef;
}

.step-number {
    flex-shrink: 0;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #28AFCF, #134958);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 18px;
}

.step-content h5 {
    color: #134958;
    margin-bottom: 8px;
    font-size: 18px;
    font-weight: 700;
}

.step-content p {
    color: #666;
    font-size: 15px;
    line-height: 1.6;
}

/* Key Points */
.key-points {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
    margin: 20px 0;
}

.key-points h5 {
    color: #134958;
    margin-bottom: 15px;
    font-size: 18px;
    font-weight: 700;
}

.key-points ul {
    list-style: none;
    padding-left: 0;
}

.key-points li {
    padding: 8px 0;
    padding-left: 25px;
    position: relative;
    color: #555;
}

.key-points li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #28AFCF;
    font-weight: 700;
}

/* Comparison Section */
.comparison-section {
    background: white;
    padding: 40px;
    border-radius: 12px;
    margin-bottom: 50px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.comparison-section h2 {
    color: #134958;
    text-align: center;
    margin-bottom: 30px;
    font-size: 32px;
    font-weight: 700;
}

.comparison-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.comparison-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
    border-top: 4px solid;
}

.comparison-card.shsat { border-color: #FF7F07; }
.comparison-card.isee { border-color: #28AFCF; }
.comparison-card.sat { border-color: #134958; }
.comparison-card.act { border-color: #F0B268; }

.comparison-card h4 {
    color: #134958;
    margin-bottom: 15px;
    font-size: 20px;
    font-weight: 700;
}

.comparison-item {
    margin-bottom: 12px;
}

.comparison-label {
    font-size: 13px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.comparison-value {
    font-size: 16px;
    color: #333;
    font-weight: 700;
}

/* Key Takeaways */
.key-takeaways {
    background: white;
    padding: 40px;
    border-radius: 12px;
    margin-bottom: 50px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.key-takeaways h2 {
    color: #134958;
    text-align: center;
    margin-bottom: 30px;
    font-size: 32px;
    font-weight: 700;
}

.takeaway-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.takeaway-card {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    padding: 20px;
    border-radius: 12px;
    border-left: 4px solid #28AFCF;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.takeaway-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

.takeaway-card h4 {
    color: #134958;
    margin-bottom: 8px;
    font-size: 20px;
    font-weight: 700;
}

.takeaway-card p {
    color: #666;
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
}

/* CTA Section */
.timeline-cta-section {
    background: linear-gradient(135deg, #FF7F07, #FFB366);
    color: white;
    padding: 50px 40px;
    border-radius: 12px;
    text-align: center;
}

.timeline-cta-section h2 {
    font-size: 36px;
    margin-bottom: 15px;
    color: white;
    font-weight: 700;
}

.timeline-cta-section p {
    font-size: 18px;
    margin-bottom: 30px;
    opacity: 0.95;
    color: white;
}

/* Tablet Responsive */
@media (max-width: 992px) {
    .timeline-container {
        padding: 30px 15px;
    }

    .comparison-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .takeaway-cards {
        grid-template-columns: repeat(2, 1fr);
    }

    .test-card {
        padding: 30px;
    }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .timeline-container {
        padding: 20px 15px;
    }

    .timeline-hero {
        padding: 40px 20px;
    }

    .timeline-hero h1 {
        font-size: 28px;
        margin-bottom: 15px;
    }

    .timeline-hero p {
        font-size: 16px;
        line-height: 1.5;
    }

    .quick-nav {
        padding: 20px;
        margin-bottom: 30px;
    }

    .quick-nav h2 {
        font-size: 20px;
        margin-bottom: 15px;
    }

    .nav-buttons {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .nav-button {
        padding: 12px 20px;
        font-size: 15px;
    }

    .timeline-visual,
    .comparison-section,
    .key-takeaways,
    .timeline-cta-section {
        padding: 25px 20px;
        margin-bottom: 30px;
    }

    .timeline-visual h2,
    .comparison-section h2,
    .key-takeaways h2 {
        font-size: 22px;
        margin-bottom: 25px;
    }

    .bar-label {
        font-size: 16px;
    }

    .bar-grade {
        font-size: 12px;
    }

    .bar-inner {
        font-size: 12px;
        padding: 0 10px;
    }

    .test-card {
        padding: 25px 20px;
        margin-bottom: 20px;
    }

    .test-card h3 {
        font-size: 22px;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .test-badge {
        margin-left: 0;
        margin-top: 8px;
        font-size: 13px;
        padding: 4px 12px;
    }

    .test-intro {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .prep-timeline h4 {
        font-size: 19px;
        margin-bottom: 15px;
    }

    .timeline-step {
        flex-direction: column;
        padding: 15px;
        gap: 15px;
    }

    .step-number {
        width: 40px;
        height: 40px;
        font-size: 16px;
    }

    .step-content h5 {
        font-size: 16px;
        margin-bottom: 6px;
    }

    .step-content p {
        font-size: 14px;
    }

    .key-points {
        padding: 20px;
        margin: 15px 0;
    }

    .key-points h5 {
        font-size: 16px;
        margin-bottom: 12px;
    }

    .key-points li {
        font-size: 14px;
        padding: 6px 0;
        padding-left: 22px;
    }

    .comparison-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .comparison-card {
        padding: 20px;
    }

    .comparison-card h4 {
        font-size: 18px;
        margin-bottom: 12px;
    }

    .comparison-label {
        font-size: 12px;
    }

    .comparison-value {
        font-size: 15px;
    }

    .takeaway-cards {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .takeaway-card {
        padding: 18px 15px;
    }

    .takeaway-card h4 {
        font-size: 18px;
        margin-bottom: 6px;
    }

    .takeaway-card p {
        font-size: 14px;
    }

    .timeline-cta-section h2 {
        font-size: 26px;
        margin-bottom: 12px;
    }

    .timeline-cta-section p {
        font-size: 16px;
        margin-bottom: 20px;
    }
}

/* Extra Small Mobile */
@media (max-width: 480px) {
    .timeline-hero {
        padding: 30px 15px;
    }

    .timeline-hero h1 {
        font-size: 24px;
    }

    .timeline-hero p {
        font-size: 14px;
    }

    .timeline-container {
        padding: 15px 10px;
    }

    .quick-nav,
    .timeline-visual,
    .test-card,
    .comparison-section,
    .key-takeaways,
    .timeline-cta-section {
        padding: 20px 15px;
    }

    .timeline-visual h2,
    .comparison-section h2,
    .key-takeaways h2 {
        font-size: 20px;
    }

    .test-card h3 {
        font-size: 20px;
    }

    .bar-fill {
        height: 35px;
    }

    .bar-inner {
        font-size: 11px;
    }

    .timeline-cta-section h2 {
        font-size: 22px;
    }
}

/* Smooth Scroll */
html {
    scroll-behavior: smooth;
}
</style>

<?php while (have_posts()) : the_post(); ?>

<article>
    <!-- Hero Section - Full Width -->
    <div class="timeline-hero">
        <h1>NYC Testing Timeline: When to Start</h1>
        <p>Strategic preparation timelines for SHSAT, ISEE, SAT, and ACT success in New York City</p>
    </div>

    <div class="timeline-container">
        <!-- Quick Navigation -->
        <div class="quick-nav">
            <h2>Jump to a Test:</h2>
            <div class="nav-buttons">
                <a href="#shsat" class="nav-button">SHSAT (Specialized High Schools)</a>
                <a href="#isee" class="nav-button">ISEE (Independent Schools)</a>
                <a href="#sat" class="nav-button">SAT (College Admission)</a>
                <a href="#act" class="nav-button">ACT (College Admission)</a>
            </div>
        </div>

        <!-- Visual Timeline Overview -->
        <div class="timeline-visual">
            <h2>At-a-Glance: Ideal Prep Start Times</h2>
            <div class="timeline-bars">
                <div class="timeline-bar">
                    <div class="bar-header">
                        <span class="bar-label">SHSAT</span>
                        <span class="bar-grade">Grades 6-7</span>
                    </div>
                    <div class="bar-fill">
                        <div class="bar-inner shsat-bar" style="width: 75%;">
                            Start 12-18 months before test
                        </div>
                    </div>
                </div>

                <div class="timeline-bar">
                    <div class="bar-header">
                        <span class="bar-label">ISEE</span>
                        <span class="bar-grade">1 year before application</span>
                    </div>
                    <div class="bar-fill">
                        <div class="bar-inner isee-bar" style="width: 60%;">
                            Start 6-12 months before test
                        </div>
                    </div>
                </div>

                <div class="timeline-bar">
                    <div class="bar-header">
                        <span class="bar-label">SAT</span>
                        <span class="bar-grade">Grade 10-11</span>
                    </div>
                    <div class="bar-fill">
                        <div class="bar-inner sat-bar" style="width: 50%;">
                            Start sophomore/junior year
                        </div>
                    </div>
                </div>

                <div class="timeline-bar">
                    <div class="bar-header">
                        <span class="bar-label">ACT</span>
                        <span class="bar-grade">Grade 10-11</span>
                    </div>
                    <div class="bar-fill">
                        <div class="bar-inner act-bar" style="width: 50%;">
                            Start sophomore/junior year
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Sections -->
        <div class="test-sections">
            <!-- SHSAT Section -->
            <div id="shsat" class="test-card shsat">
                <h3>
                    SHSAT: Specialized High Schools
                    <span class="test-badge">Grades 8-9</span>
                </h3>
                <p class="test-intro">
                    The SHSAT (Specialized High Schools Admissions Test) determines admission to NYC's elite specialized high schools including Stuyvesant, Bronx Science, and Brooklyn Tech. Students typically take it in the fall of 8th or 9th grade, but optimal preparation begins much earlier.
                </p>

                <div class="prep-timeline">
                    <h4>Recommended Preparation Timeline</h4>
                    <div class="timeline-steps">
                        <div class="timeline-step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h5>Grade 6 (18 months out) - Foundation Building</h5>
                                <p>Begin strengthening math fundamentals and reading comprehension. Focus on building confidence with problem-solving and developing strong reading habits.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h5>Grade 7 (12 months out) - Core Skills Development</h5>
                                <p>Master essential SHSAT content areas: advanced math concepts, reading strategies, and logical reasoning. Build test-taking stamina through regular practice.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h5>Summer Before 8th Grade - Intensive Boot Camp</h5>
                                <p>Dedicate focused time to full-length practice tests, strategy refinement, and targeted skill improvement. This is your power prep period.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h5>Fall of 8th Grade - Final Push</h5>
                                <p>Fine-tune test strategies, maintain momentum, and peak at the right time. Focus on timing, accuracy, and confidence building.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="key-points">
                    <h5>Why Start Early for SHSAT?</h5>
                    <ul>
                        <li>More time for gradual, stress-free learning</li>
                        <li>Builds stronger math and reading foundations</li>
                        <li>Allows multiple practice test cycles</li>
                        <li>Develops test-taking stamina and confidence</li>
                        <li>Early starters score significantly higher on average</li>
                    </ul>
                </div>
            </div>

            <!-- ISEE Section -->
            <div id="isee" class="test-card isee">
                <h3>
                    ISEE: Independent School Entrance
                    <span class="test-badge">All Grades</span>
                </h3>
                <p class="test-intro">
                    The ISEE (Independent School Entrance Examination) is required for admission to many private schools in NYC. Students can take it once per testing season, making strategic preparation timing crucial for success.
                </p>

                <div class="prep-timeline">
                    <h4>Recommended Preparation Timeline</h4>
                    <div class="timeline-steps">
                        <div class="timeline-step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h5>12 Months Before - Assessment & Planning</h5>
                                <p>Take a diagnostic test to identify strengths and weaknesses. Create a personalized study plan based on current level and target schools.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h5>9-6 Months Before - Foundation Building</h5>
                                <p>Focus on vocabulary development, reading comprehension strategies, and math concept mastery. Build a strong foundation in all test sections.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h5>6-3 Months Before - Strategy Development</h5>
                                <p>Learn test-specific strategies for each section. Practice timing, pacing, and answering techniques. Begin regular practice tests.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h5>3 Months Before - Intensive Practice</h5>
                                <p>Complete multiple full-length practice tests under timed conditions. Analyze errors and refine strategies. Peak performance preparation.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="key-points">
                    <h5>Key ISEE Timing Considerations</h5>
                    <ul>
                        <li>Can only take once per testing season (Fall/Winter/Spring-Summer)</li>
                        <li>Most NYC private schools require scores by December/January</li>
                        <li>Vocabulary takes months to build - start early</li>
                        <li>Essay section requires practice and refinement</li>
                        <li>Strategic timing maximizes your one opportunity per season</li>
                    </ul>
                </div>
            </div>

            <!-- SAT Section -->
            <div id="sat" class="test-card sat">
                <h3>
                    SAT: College Admission Test
                    <span class="test-badge">Grade 10-12</span>
                </h3>
                <p class="test-intro">
                    The SAT is a standardized college admission test measuring reading, writing, and math skills. Students can take it multiple times, and most colleges accept both SAT and ACT. Strategic timing allows for score improvement across multiple test dates.
                </p>

                <div class="prep-timeline">
                    <h4>Recommended Preparation Timeline</h4>
                    <div class="timeline-steps">
                        <div class="timeline-step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h5>Sophomore Year (Grade 10) - Early Start</h5>
                                <p>Begin familiarization with SAT format and content. Take a baseline practice test. Start building vocabulary and math foundations during less stressful time.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h5>Summer Before Junior Year - Foundation Building</h5>
                                <p>Dedicate focused time to content review and strategy development. Complete practice sections and short practice tests. Build confidence without school pressure.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h5>Junior Year Fall - First Test Attempt</h5>
                                <p>Take your first official SAT (October/November/December). Use this as a baseline and learning experience. Continue targeted prep based on results.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h5>Junior Year Spring - Score Improvement</h5>
                                <p>Take SAT again (March/May/June) after focused prep on weak areas. Most students see significant score improvements on second attempt.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">5</div>
                            <div class="step-content">
                                <h5>Senior Year Fall - Final Attempt (if needed)</h5>
                                <p>Take one more SAT (August/October) if additional improvement needed. Most students have achieved target scores by this point.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="key-points">
                    <h5>Why This SAT Timeline Works</h5>
                    <ul>
                        <li>Multiple test opportunities allow for score improvement</li>
                        <li>Starting sophomore year reduces junior year stress</li>
                        <li>Summer prep time is focused and efficient</li>
                        <li>Scores are ready for early decision/action applications</li>
                        <li>Room for unexpected challenges or retakes</li>
                    </ul>
                </div>
            </div>

            <!-- ACT Section -->
            <div id="act" class="test-card act">
                <h3>
                    ACT: Alternative College Admission Test
                    <span class="test-badge">Grade 10-12</span>
                </h3>
                <p class="test-intro">
                    The ACT is another standardized college admission test covering English, Math, Reading, and Science, with an optional Writing section. Like the SAT, students can take it multiple times, and most colleges accept either test with no preference.
                </p>

                <div class="prep-timeline">
                    <h4>Recommended Preparation Timeline</h4>
                    <div class="timeline-steps">
                        <div class="timeline-step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h5>Sophomore Year (Grade 10) - Diagnostic Phase</h5>
                                <p>Take practice tests for both SAT and ACT to determine which test suits your strengths better. Some students score higher on one test versus the other.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h5>Summer Before Junior Year - Content Review</h5>
                                <p>Focus on ACT-specific content areas: science reasoning, grammar rules, and faster pacing. The ACT requires quicker timing than SAT.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h5>Junior Year Fall - First Official Test</h5>
                                <p>Take your first ACT (September/October/December). Use results to identify areas needing improvement and adjust preparation strategy.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h5>Junior Year Spring - Score Optimization</h5>
                                <p>Take ACT again (February/April/June) after targeted prep. Focus on timing strategies and weak content areas identified in first attempt.</p>
                            </div>
                        </div>

                        <div class="timeline-step">
                            <div class="step-number">5</div>
                            <div class="step-content">
                                <h5>Senior Year Fall - Final Opportunity</h5>
                                <p>Take final ACT (September/October) if needed for additional improvement. Scores ready for all college application deadlines.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="key-points">
                    <h5>ACT-Specific Timeline Advantages</h5>
                    <ul>
                        <li>Science section requires different prep strategy than SAT</li>
                        <li>Faster pacing means timing practice is crucial</li>
                        <li>Some students naturally score higher on ACT format</li>
                        <li>Optional essay allows flexibility in preparation</li>
                        <li>Multiple test dates throughout the year provide flexibility</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Comparison Section -->
        <div class="comparison-section">
            <h2>Quick Test Comparison</h2>
            <div class="comparison-grid">
                <div class="comparison-card shsat">
                    <h4>SHSAT</h4>
                    <div class="comparison-item">
                        <div class="comparison-label">Best Start Time</div>
                        <div class="comparison-value">Grade 6-7</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Test Date</div>
                        <div class="comparison-value">Fall of Grade 8</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Attempts</div>
                        <div class="comparison-value">One per year</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Prep Duration</div>
                        <div class="comparison-value">12-18 months</div>
                    </div>
                </div>

                <div class="comparison-card isee">
                    <h4>ISEE</h4>
                    <div class="comparison-item">
                        <div class="comparison-label">Best Start Time</div>
                        <div class="comparison-value">1 year before</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Test Date</div>
                        <div class="comparison-value">Fall/Winter</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Attempts</div>
                        <div class="comparison-value">Once per season</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Prep Duration</div>
                        <div class="comparison-value">6-12 months</div>
                    </div>
                </div>

                <div class="comparison-card sat">
                    <h4>SAT</h4>
                    <div class="comparison-item">
                        <div class="comparison-label">Best Start Time</div>
                        <div class="comparison-value">Grade 10</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Test Date</div>
                        <div class="comparison-value">Grade 11-12</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Attempts</div>
                        <div class="comparison-value">Unlimited</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Prep Duration</div>
                        <div class="comparison-value">3-12 months</div>
                    </div>
                </div>

                <div class="comparison-card act">
                    <h4>ACT</h4>
                    <div class="comparison-item">
                        <div class="comparison-label">Best Start Time</div>
                        <div class="comparison-value">Grade 10</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Test Date</div>
                        <div class="comparison-value">Grade 11-12</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Attempts</div>
                        <div class="comparison-value">Unlimited</div>
                    </div>
                    <div class="comparison-item">
                        <div class="comparison-label">Prep Duration</div>
                        <div class="comparison-value">3-12 months</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Takeaways -->
        <div class="key-takeaways">
            <h2>Key Takeaways</h2>
            <div class="takeaway-cards">
                <div class="takeaway-card">
                    <h4>Start Earlier Than You Think</h4>
                    <p>For specialized high school tests (SHSAT, ISEE), starting 12-18 months early builds strong foundations and reduces stress. For college tests (SAT, ACT), sophomore year is ideal.</p>
                </div>

                <div class="takeaway-card">
                    <h4>Multiple Attempts = Better Scores</h4>
                    <p>SAT and ACT allow unlimited retakes, so planning for 2-3 attempts leads to optimal scores. SHSAT and ISEE have limited opportunities, making preparation crucial.</p>
                </div>

                <div class="takeaway-card">
                    <h4>Summer = Power Prep Time</h4>
                    <p>Summer months before critical test years provide focused, uninterrupted preparation time without competing academic demands. This is when students make the biggest gains.</p>
                </div>

                <div class="takeaway-card">
                    <h4>Diagnostic Tests Are Essential</h4>
                    <p>Taking diagnostic tests early identifies strengths, weaknesses, and optimal test choice (SAT vs ACT). This allows for targeted, efficient preparation.</p>
                </div>

                <div class="takeaway-card">
                    <h4>Consistent Practice Beats Cramming</h4>
                    <p>Regular, distributed practice over many months produces better results than intensive last-minute cramming. Start early and maintain steady progress.</p>
                </div>

                <div class="takeaway-card">
                    <h4>Strategic Timing = Less Stress</h4>
                    <p>Proper timeline planning ensures test scores are ready for all application deadlines while leaving room for retakes if needed. Peace of mind matters.</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="timeline-cta-section">
            <h2>Ready to Start Your Test Prep Journey?</h2>
            <p>Let NYC STEM Club help you create a personalized preparation timeline for your student's success</p>
            <?php echo do_shortcode('[inquiry_button color="dark-teal"]'); ?>
        </div>
    </div>
</article>

<script>
// Smooth scroll for navigation buttons
document.querySelectorAll('.nav-button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Animate timeline bars on scroll
const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const bars = entry.target.querySelectorAll('.bar-inner');
            bars.forEach(bar => {
                bar.style.width = bar.style.width; // Trigger animation
            });
        }
    });
}, observerOptions);

const timelineVisual = document.querySelector('.timeline-visual');
if (timelineVisual) {
    observer.observe(timelineVisual);
}
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
