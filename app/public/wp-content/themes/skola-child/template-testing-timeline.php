<?php
/**
 * Template Name: Testing Timeline Full Width
 * Description: Custom full-width template for NYC Testing Timeline blog post
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
.page-template-template-testing-timeline {
    padding: 0 !important;
    margin: 0 !important;
}
.page-template-template-testing-timeline .site-content,
.page-template-template-testing-timeline .content-area,
.page-template-template-testing-timeline article,
.page-template-template-testing-timeline .entry-content {
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
    font-family: Georgia, 'Times New Roman', serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.8;
    color: #2d3748;
    background: #f8f9fa;
}

.timeline-article {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Hero Section */
.hero {
    background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
    color: white;
    padding: 80px 40px;
    border-radius: 16px;
    text-align: center;
    margin-bottom: 60px;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
    font-weight: 700;
    color: white;
}

.hero p {
    font-size: 20px;
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto;
}

/* Lead Section */
.lead {
    background: white;
    padding: 40px;
    border-radius: 12px;
    margin-bottom: 60px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.lead p {
    font-size: 18px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 16px;
}

/* Test Cards Grid - 2x2 Layout */
.tests-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin-bottom: 60px;
}

@media (max-width: 900px) {
    .tests-grid {
        grid-template-columns: 1fr;
    }
}

.test-card {
    background: white;
    border-radius: 12px;
    padding: 32px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.test-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.2);
}

.test-header {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 20px;
}

.test-icon {
    font-size: 48px;
}

.test-name {
    font-size: 32px;
    font-weight: 700;
    color: #134958;
}

.test-card p {
    margin-bottom: 12px;
    color: #555;
    font-size: 16px;
}

.test-card strong {
    color: #134958;
}

.target-score {
    margin-top: 16px;
    padding: 12px 16px;
    background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
    border-left: 4px solid #28AFCF;
    border-radius: 6px;
    color: #134958;
    font-size: 16px;
}

/* Learn More Button for ISEE */
.learn-more-btn {
    width: 100%;
    margin-top: 20px;
    padding: 14px 24px;
    background: #28AFCF;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(40, 175, 207, 0.3);
}

.learn-more-btn:hover {
    background: #1f8ba8;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(40, 175, 207, 0.4);
}

.learn-more-btn::after {
    content: " →";
}

/* ISEE Levels Expandable Section */
.isee-levels-section {
    display: none;
    margin-top: 30px;
    padding-top: 30px;
    border-top: 3px solid #28AFCF;
}

.isee-levels-section.active {
    display: block;
    animation: slideDown 0.4s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.isee-intro {
    margin-bottom: 30px;
}

.isee-intro h3 {
    font-size: 24px;
    color: #134958;
    margin-bottom: 12px;
}

.isee-intro p {
    font-size: 16px;
    color: #666;
}

.isee-levels-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.isee-level-card {
    background: #f8f9fa;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
}

/* Level badges removed */

.level-title {
    font-size: 20px;
    font-weight: 700;
    color: #134958;
    margin-bottom: 6px;
}

.level-grades {
    font-size: 16px;
    color: #FF7F07;
    font-weight: 700;
    margin-bottom: 12px;
}

.level-details {
    color: #555;
    margin-bottom: 16px;
    font-size: 16px;
}

.level-sections {
    background: white;
    padding: 14px;
    border-radius: 8px;
}

.level-sections-title {
    font-weight: 700;
    color: #134958;
    margin-bottom: 10px;
    font-size: 16px;
}

.level-sections ul {
    list-style: none;
    padding: 0;
}

.level-sections li {
    padding: 5px 0 5px 20px;
    position: relative;
    color: #555;
    font-size: 16px;
}

.level-sections li::before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #28AFCF;
    font-weight: 700;
}

.important-note {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-top: 20px;
    border-left: 4px solid #28AFCF;
}

.important-note p {
    margin: 0;
    font-weight: 600;
    color: #134958;
    font-size: 16px;
}

.close-isee-btn {
    width: 100%;
    margin-top: 20px;
    padding: 12px 24px;
    background: #134958;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
}

.close-isee-btn:hover {
    background: #0f3740;
}

.close-isee-btn::after {
    content: " ✕";
}

/* Timeline Section */
.timeline-section {
    margin: 60px 0;
}

.timeline-section h2 {
    font-size: 36px;
    color: #134958;
    text-align: center;
    margin-bottom: 50px;
    font-weight: 700;
}

/* Timeline - Centered Signpost Style */
.timeline {
    position: relative;
    padding: 0;
    max-width: 900px;
    margin: 0 auto;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    top: 0;
    bottom: 0;
    width: 6px;
    background: linear-gradient(180deg, #28AFCF 0%, #5DD3F0 25%, #FF7F07 60%, #FFB84D 100%);
    border-radius: 3px;
}

.timeline-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 50px;
    position: relative;
}

/* Timeline badges removed */

.timeline-content {
    width: 100%;
    background: white;
    border: 3px solid #28AFCF;
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
}

.timeline-title {
    font-size: 28px;
    font-weight: 700;
    color: #134958;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.test-emoji {
    font-size: 32px;
}

.timeline-when {
    background: linear-gradient(135deg, #e0f2fe, #bae6fd);
    color: #0891b2;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 700;
    margin-bottom: 20px;
    display: inline-block;
    font-size: 16px;
}

.timeline-content p {
    margin-bottom: 16px;
    color: #555;
    line-height: 1.7;
    font-size: 16px;
}

.timeline-content strong {
    color: #134958;
}

.timeline-details {
    margin-top: 24px;
    padding-top: 24px;
    border-top: 2px solid #e5e7eb;
}

.timeline-details strong {
    display: block;
    font-size: 16px;
    color: #134958;
    margin-bottom: 12px;
}

.timeline-details ul {
    list-style: none;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
}

.timeline-details li {
    padding: 10px 16px;
    background: #f8f9fa;
    border-radius: 6px;
    color: #555;
    position: relative;
    padding-left: 32px;
    font-size: 16px;
}

.timeline-details li::before {
    content: "→";
    position: absolute;
    left: 12px;
    color: #28AFCF;
    font-weight: 700;
}

/* Key Takeaway */
.key-takeaway {
    background: linear-gradient(135deg, #fff7ed, #ffedd5);
    border: 3px solid #FF7F07;
    border-radius: 12px;
    padding: 40px;
    margin: 60px 0;
    text-align: center;
}

.key-takeaway h3 {
    font-size: 28px;
    color: #134958;
    margin-bottom: 20px;
    font-weight: 700;
}

.key-takeaway p {
    font-size: 17px;
    color: #555;
    line-height: 1.8;
    margin-bottom: 12px;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #134958, #28AFCF);
    color: white;
    text-align: center;
    padding: 60px 40px;
    border-radius: 16px;
}

.cta-section h2 {
    font-size: 36px;
    margin-bottom: 16px;
    font-weight: 700;
}

.cta-section p {
    font-size: 18px;
    margin-bottom: 16px;
    opacity: 0.95;
}

/* CTA button styling removed - using global inquiry button */

/* Responsive */
@media (max-width: 1024px) {
    .timeline::before {
        left: 50px;
    }
}

@media (max-width: 768px) {
    .hero h1 {
        font-size: 36px;
    }

    .hero p {
        font-size: 18px;
    }

    .timeline::before {
        display: none;
    }

    .timeline-item {
        flex-direction: column;
        gap: 16px;
    }

    .timeline-title {
        font-size: 24px;
    }

    .tests-grid {
        grid-template-columns: 1fr;
    }

    .isee-levels-grid {
        grid-template-columns: 1fr;
    }

    .cta-section h2 {
        font-size: 28px;
    }
}
</style>

<?php while (have_posts()) : the_post(); ?>

    <article class="timeline-article">
        <!-- Hero Section -->
        <div class="hero">
            <h1>📅 NYC Testing Timeline: When to Start</h1>
            <p>Strategic preparation guidance for SHSAT, ISEE, SAT, and ACT success</p>
        </div>

        <!-- Lead Section -->
        <div class="lead">
            <p>Navigating the journey of standardized testing can be overwhelming for both parents and students. To alleviate concerns and set the stage for success, it's crucial to understand <strong>when to begin preparing for each test</strong>.</p>
            <p>In this comprehensive guide, we'll explore the ideal timelines for starting test preparation, drawing from NYC STEM Club's years of experience in guiding students to achieve their academic goals.</p>
        </div>

        <!-- Test Overview Cards -->
        <div class="tests-grid">
            <div class="test-card">
                <div class="test-header">
                    <div class="test-icon">🎓</div>
                    <div class="test-name">SHSAT</div>
                </div>
                <p><strong>Specialized High Schools Admissions Test</strong> - The gateway to New York City's elite specialized high schools, including Stuyvesant, Bronx Science, and Brooklyn Tech.</p>
                <p>The SHSAT assesses students in English Language Arts and Mathematics and is the sole criterion for admission to these prestigious institutions.</p>
                <div class="target-score">
                    <strong>Target Score:</strong> ~565+ for Stuyvesant (varies by year and school)
                </div>
            </div>

            <div class="test-card">
                <div class="test-header">
                    <div class="test-icon">🏫</div>
                    <div class="test-name">ISEE</div>
                </div>
                <p><strong>Independent School Entrance Examination</strong> - A nationwide test that paves the way for students seeking admission to private elementary, middle, and high schools.</p>
                <p>The ISEE assesses verbal reasoning, quantitative aptitude, reading comprehension, mathematics, and writing skills. Students are evaluated holistically.</p>
                <div class="target-score">
                    <strong>Target Score:</strong> Stanines of 8-9 enhance admission chances
                </div>

                <button class="learn-more-btn" onclick="toggleISEELevels()">Learn More: Lower, Middle & Upper ISEE Levels</button>

                <!-- ISEE Levels Expandable Section -->
                <div id="isee-levels" class="isee-levels-section">
                    <div class="isee-intro">
                        <h3>Three ISEE Testing Levels</h3>
                        <p>The ISEE is offered at three different levels based on the student's current grade. Each level is tailored to assess age-appropriate skills.</p>
                    </div>

                    <div class="isee-levels-grid">
                        <!-- Lower Level -->
                        <div class="isee-level-card">
                            <span class="level-badge">Lower Level</span>
                            <div class="level-title">Primary ISEE</div>
                            <div class="level-grades">For students in Grades 2-4</div>
                            <p class="level-details">Designed for younger students applying to private elementary schools. Focuses on foundational skills in reading, math, and writing.</p>
                            <div class="level-sections">
                                <div class="level-sections-title">Test Sections:</div>
                                <ul>
                                    <li>Reading Comprehension</li>
                                    <li>Mathematics Achievement</li>
                                    <li>Quantitative Reasoning</li>
                                    <li>Essay (unscored)</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Middle Level -->
                        <div class="isee-level-card">
                            <span class="level-badge" style="background: linear-gradient(135deg, #FF7F07, #FFB84D);">Middle Level</span>
                            <div class="level-title">Middle ISEE</div>
                            <div class="level-grades">For students in Grades 5-6</div>
                            <p class="level-details">For students applying to middle school programs at private institutions. Tests more advanced reasoning and comprehension skills.</p>
                            <div class="level-sections">
                                <div class="level-sections-title">Test Sections:</div>
                                <ul>
                                    <li>Verbal Reasoning</li>
                                    <li>Quantitative Reasoning</li>
                                    <li>Reading Comprehension</li>
                                    <li>Mathematics Achievement</li>
                                    <li>Essay (unscored)</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Upper Level -->
                        <div class="isee-level-card">
                            <span class="level-badge" style="background: linear-gradient(135deg, #134958, #28AFCF);">Upper Level</span>
                            <div class="level-title">Upper ISEE</div>
                            <div class="level-grades">For students in Grades 7-11</div>
                            <p class="level-details">The most challenging level, designed for students applying to competitive high schools. Requires advanced critical thinking and problem-solving abilities.</p>
                            <div class="level-sections">
                                <div class="level-sections-title">Test Sections:</div>
                                <ul>
                                    <li>Verbal Reasoning (40 questions)</li>
                                    <li>Quantitative Reasoning (37 questions)</li>
                                    <li>Reading Comprehension (36 questions)</li>
                                    <li>Mathematics Achievement (47 questions)</li>
                                    <li>Essay (unscored)</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="important-note">
                        <p>💡 <strong>Important Note:</strong> Students can only take the ISEE once per testing season (Fall, Winter, Spring/Summer). NYC STEM Club offers comprehensive preparation for all ISEE levels with tailored curriculum and practice materials.</p>
                    </div>

                    <button class="close-isee-btn" onclick="toggleISEELevels()">Close ISEE Details</button>
                </div>
            </div>

            <div class="test-card">
                <div class="test-header">
                    <div class="test-icon">📚</div>
                    <div class="test-name">ACT</div>
                </div>
                <p><strong>American College Testing</strong> - A staple in college admissions, the ACT gauges a student's readiness for college-level work.</p>
                <p>It includes sections on English, mathematics, reading, science, and an optional writing test.</p>
                <div class="target-score">
                    <strong>Target Score:</strong> 34+ for top 20 universities
                </div>
            </div>

            <div class="test-card">
                <div class="test-header">
                    <div class="test-icon">✏️</div>
                    <div class="test-name">SAT</div>
                </div>
                <p><strong>Scholastic Assessment Test</strong> - The SAT, a college admissions test by the College Board, assesses mathematical proficiency, evidence-based reading, and writing skills.</p>
                <p>Beginning in Spring 2023, the SAT is only available in a digital format.</p>
                <div class="target-score">
                    <strong>Target Score:</strong> 1500+ for top 20 schools
                </div>
            </div>
        </div>

        <!-- MAIN TIMELINE SECTION -->
        <div class="timeline-section">
            <h2>📅 Ideal Testing Timeline: When to Start</h2>

            <div class="timeline">
                <!-- SHSAT Timeline -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-title">
                            <span class="test-emoji">🎓</span> SHSAT Preparation
                        </div>
                        <div class="timeline-when">Start: Beginning of 7th Grade (or end of 6th Grade)</div>
                        <p>Given the significance of the SHSAT, students should <strong>start early</strong>, for many topics on the test are not typically addressed in school curricula.</p>
                        <p>Starting at the beginning of 7th grade (or end of 6th grade) gives students ample time to become familiar with the exam's unique format and content.</p>
                        <div class="timeline-details">
                            <strong>NYC STEM Club Offers:</strong>
                            <ul>
                                <li>Module 1: Year-Long Classes</li>
                                <li>Module 2: Summer Bootcamps</li>
                                <li>Module 3: Fall Classes</li>
                                <li>Year-long Group Classes</li>
                                <li>Pre-SHSAT 6th Grade Programs</li>
                                <li>Private Lessons</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ISEE Timeline -->
                <div class="timeline-item">
                    <div class="timeline-content" style="border-color: #5DD3F0;">
                        <div class="timeline-title">
                            <span class="test-emoji">🏫</span> ISEE Preparation
                        </div>
                        <div class="timeline-when" style="background: linear-gradient(135deg, #ecfeff, #cffafe); color: #0891b2;">Start: 1 Year Before Admissions Cycle</div>
                        <p>The ISEE presents students with <strong>new material and thought processes</strong> that might be unfamiliar from their regular schooling.</p>
                        <p>To ensure success, it is ideal to begin a year before the intended admissions cycle, providing ample time for preparation. This approach also allows students to take multiple practice tests.</p>
                        <p>Early preparation can mitigate stress and build confidence as the testing period approaches.</p>
                        <div class="timeline-details">
                            <strong>NYC STEM Club Offers:</strong>
                            <ul>
                                <li>Tailored ISEE Classes</li>
                                <li>Private Lessons</li>
                                <li>Multiple Practice Tests</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ACT Timeline -->
                <div class="timeline-item">
                    <div class="timeline-content" style="border-color: #FF7F07;">
                        <div class="timeline-title">
                            <span class="test-emoji">📚</span> ACT Preparation
                        </div>
                        <div class="timeline-when" style="background: linear-gradient(135deg, #fff7ed, #ffedd5); color: #ea580c;">Start: End of Sophomore Year</div>
                        <p>The ACT journey should begin in the <strong>latter part of a student's sophomore year</strong>, with students taking their first official ACT as early as the end of sophomore year.</p>
                        <p>It's commonly advised to <strong>align ACT test-taking with the completion of Algebra-2 coursework</strong> in school. Since most magnet and specialized schools offer Algebra-2 during sophomore year, taking the ACT early allows students to focus on maintaining their grades, participating in extracurricular activities, and assuming leadership roles during their junior year.</p>
                        <p>This timeline allows for multiple attempts to achieve desired scores before college applications are due.</p>
                        <div class="timeline-details">
                            <strong>NYC STEM Club Offers:</strong>
                            <ul>
                                <li>Private ACT Classes</li>
                                <li>Group ACT Classes</li>
                                <li>Multiple Retake Options</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- SAT Timeline -->
                <div class="timeline-item">
                    <div class="timeline-content" style="border-color: #FFB84D;">
                        <div class="timeline-title">
                            <span class="test-emoji">✏️</span> SAT Preparation
                        </div>
                        <div class="timeline-when" style="background: linear-gradient(135deg, #fefce8, #fef3c7); color: #d97706;">Start: End of Sophomore Year</div>
                        <p>Like the ACT, SAT preparation can start during <strong>sophomore year</strong>, with students taking their first SAT as early as end of sophomore year.</p>
                        <p>This recommended timeline offers <strong>adequate room for retesting and improvement</strong>, essential for compiling an impressive college application.</p>
                        <div class="timeline-details">
                            <strong>NYC STEM Club Offers:</strong>
                            <ul>
                                <li>Comprehensive SAT Prep</li>
                                <li>Private SAT Classes</li>
                                <li>Group SAT Classes</li>
                                <li>Digital SAT Preparation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Takeaway -->
        <div class="key-takeaway">
            <h3>🔑 Key Takeaway: Start Early!</h3>
            <p><strong>Achieving success in these exams is not solely dependent on studying smart; it also hinges on studying early.</strong></p>
            <p>Starting years in advance is the key to admissions. At NYC STEM Club, we provide personalized study plans and tailored resources to meet each student's unique needs.</p>
            <p>For sustained academic excellence, it is beneficial to enroll children in academic enrichment programs from a young age. By prioritizing excellence in education before test preparation becomes a concern, students can gain a competitive advantage in school and enhance their cognitive abilities.</p>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h2>Ready to Start Your Testing Journey?</h2>
            <p>At NYC STEM Club, we provide comprehensive support with personalized study plans, meticulously curated materials, abundant practice tests, and detailed test analysis reports.</p>
            <p><strong>Starting early and exploring various avenues paves the way for long-term academic success.</strong></p>
            <?php echo do_shortcode('[inquiry_button source="timeline-page"]'); ?>
        </div>

        <!-- Testimonials Section -->
        <?php echo do_shortcode('[testimonials]'); ?>
    </article>

    <script>
        function toggleISEELevels() {
            const section = document.getElementById('isee-levels');
            section.classList.toggle('active');

            // Smooth scroll to section when opening
            if (section.classList.contains('active')) {
                setTimeout(() => {
                    section.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            }
        }
    </script>

<?php endwhile; ?>

<?php get_footer(); ?>
