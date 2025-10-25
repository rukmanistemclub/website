<?php
/**
 * Template Name: SAT ACT Prep - Full Width
 * Description: Custom template for SAT & ACT Test Preparation page
 */

get_header();
?>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">

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
        font-family: 'Roboto', sans-serif;
        font-weight: 600;
        line-height: 1.6;
        color: #333;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 80px 20px;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 70% 30%;
        gap: 40px;
        align-items: center;
    }

    .hero-content h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero-content .subtitle {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.95;
    }

    .hero-stats-mini {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-mini {
        background: rgba(255, 255, 255, 0.15);
        padding: 15px 20px;
        border-radius: 8px;
        backdrop-filter: blur(10px);
    }

    .stat-mini strong {
        display: block;
        font-size: 1.5rem;
        color: #F0B268;
    }

    .stat-mini span {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .track-record-card {
        background: white;
        color: #134958;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .track-record-card h3 {
        color: #28AFCF;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }

    .track-stat {
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }

    .track-stat:last-child {
        border-bottom: none;
    }

    .track-stat .number {
        font-size: 1.8rem;
        color: #FF7F07;
        font-weight: 700;
    }

    .track-stat .label {
        color: #666;
        font-size: 0.95rem;
    }

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

    /* Trust Bar */
    .trust-bar {
        background: #f8f9fa;
        padding: 30px 20px;
    }

    .trust-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
    }

    .trust-item {
        text-align: center;
    }

    .trust-item .icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    /* Main Content */
    .content-section {
        max-width: 1000px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .content-section h2 {
        color: #134958;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .content-section h3 {
        color: #28AFCF;
        font-size: 1.5rem;
        margin: 30px 0 15px;
    }

    .content-section p {
        margin-bottom: 15px;
        line-height: 1.8;
    }

    .content-section ul {
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .content-section li {
        margin-bottom: 10px;
    }

    /* Why Choose Us */
    .why-choose {
        background: #f8f9fa;
        padding: 60px 20px;
    }

    .why-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .benefit-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .benefit-card .icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .benefit-card h3 {
        color: #134958;
        margin-bottom: 15px;
    }

    /* FAQ Section */
    .faq-section {
        max-width: 1000px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .faq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin: 1.5rem 0;
    }

    .faq-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .faq-card:hover {
        border-color: #28AFCF;
    }

    .faq-header {
        width: 100%;
        padding: 1.5rem;
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: left;
        transition: background 0.3s ease;
        font-family: inherit;
    }

    .faq-header:hover {
        background: #f8fafc;
    }

    .faq-question {
        font-size: 1.1rem;
        font-weight: 600;
        color: #134958;
        margin: 0;
        flex: 1;
    }

    .faq-icon {
        flex-shrink: 0;
        margin-left: 1rem;
        color: #64748b;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
    }

    .faq-card.active .faq-icon {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-answer p {
        padding: 0 1.5rem 1.5rem;
        color: #64748b;
        line-height: 1.7;
        margin: 0;
    }

    .faq-answer p + p {
        padding-top: 0.5rem;
    }

    .faq-answer ul {
        padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        margin: 0 0 0 2rem;
        color: #64748b;
        line-height: 1.7;
    }

    .faq-answer ul li {
        margin-bottom: 0.5rem;
    }

    .faq-card.active .faq-answer {
        max-height: 1000px;
    }

    /* Final CTA */
    .final-cta {
        background: linear-gradient(135deg, #28AFCF 0%, #134958 100%);
        color: white;
        padding: 80px 20px;
        text-align: center;
    }

    .final-cta h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .final-cta p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-container,
        .why-grid,
        .trust-container {
            grid-template-columns: 1fr;
        }

        .hero-stats-mini {
            flex-direction: column;
        }

        .hero-content h1 {
            font-size: 2rem;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <!-- Hero Section -->
            <section class="hero">
                <div class="hero-container">
                    <div class="hero-content">
                        <h1>SAT & ACT Test Prep - Achieve Your Dream College Score</h1>
                        <p class="subtitle">Join the program where 96% of students improve their scores - with an average 6-point ACT increase and 100-point SAT increase. Most of our students score high enough to get into Ivy League schools.</p>

                        <div class="hero-stats-mini">
                            <div class="stat-mini">
                                <strong>10+</strong>
                                <span>Years Experience</span>
                            </div>
                            <div class="stat-mini">
                                <strong>80%+</strong>
                                <span>Score 34+ ACT or 1500+ SAT</span>
                            </div>
                        </div>

                        <a href="/student-enrollment/" class="cta-btn">Inquire Now</a>
                    </div>

                    <div class="track-record-card">
                        <h3>Our Track Record</h3>
                        <div class="track-stat">
                            <div class="number">📈 96%</div>
                            <div class="label">Score Improvement Rate</div>
                        </div>
                        <div class="track-stat">
                            <div class="number">🎯 6-9 Points</div>
                            <div class="label">Average ACT Increase</div>
                        </div>
                        <div class="track-stat">
                            <div class="number">📊 100+ Points</div>
                            <div class="label">Average SAT Increase</div>
                        </div>
                        <div class="track-stat">
                            <div class="number">🏆 Up to 13</div>
                            <div class="label">Top ACT Student Improvement</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Trust Bar -->
            <section class="trust-bar">
                <div class="trust-container">
                    <div class="trust-item">
                        <div class="icon">✅</div>
                        <strong>Expert ACT/SAT Instructors</strong>
                    </div>
                    <div class="trust-item">
                        <div class="icon">✅</div>
                        <strong>96% Saw Score Improvement</strong>
                    </div>
                    <div class="trust-item">
                        <div class="icon">✅</div>
                        <strong>80%+ Score 34+ ACT or 1500+ SAT</strong>
                    </div>
                    <div class="trust-item">
                        <div class="icon">✅</div>
                        <strong>Flexible Scheduling</strong>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content-section">
                <h2 style="text-align: center; margin-bottom: 20px;">Choose Your Path</h2>

                <p class="lead" style="text-align: left; font-size: 1.15rem; line-height: 1.8; color: #555; margin: 0 auto 20px; max-width: 900px;">Transform Your Test Scores with NYC's Most Effective College Entrance Exam Prep</p>

                <p style="text-align: left; max-width: 900px; margin: 0 auto 40px; line-height: 1.8;">At NYC STEM Club, we understand that achieving your target SAT or ACT score isn't just about knowing the content—it's about mastering test-taking strategies, building stamina, and learning to perform under pressure. Our comprehensive program has helped over 500 students achieve Ivy League-level scores, with <strong>96% seeing significant improvements</strong> and over <strong>80% reaching 1500+ on the SAT or 34+ on the ACT.</strong></p>

                <!-- Decision Tree Infographic -->
                <div style="max-width: 1000px; margin: 0 auto 60px;">

                    <!-- Start Node -->
                    <div style="text-align: center; margin-bottom: 20px;">
                        <div style="background: linear-gradient(135deg, #28AFCF, #134958); color: white; padding: 15px 35px; border-radius: 50px; display: inline-block; font-size: 1.1rem; font-weight: 700; box-shadow: 0 4px 15px rgba(40, 175, 207, 0.3);">
                            What Grade Are You In?
                        </div>
                    </div>

                    <!-- Branching Arrows -->
                    <div style="display: flex; justify-content: center; gap: 100px; margin-bottom: 30px;">
                        <div style="text-align: center; width: 2px; height: 40px; background: #28AFCF;"></div>
                        <div style="text-align: center; width: 2px; height: 40px; background: #FF7F07;"></div>
                    </div>

                    <!-- Two Main Branches -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 50px;">

                        <!-- SOPHOMORE PATH -->
                        <div style="text-align: center;">
                            <div style="background: #28AFCF; color: white; padding: 20px; border-radius: 15px 15px 0 0; font-size: 1.4rem; font-weight: 700;">
                                🎓 SOPHOMORE
                            </div>
                            <div style="background: #f0f9fc; border: 3px solid #28AFCF; border-top: none; border-radius: 0 0 15px 15px; padding: 25px; min-height: 520px;">
                                <div style="background: white; padding: 15px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                    <strong style="color: #134958; display: block; margin-bottom: 5px; font-size: 1.1rem;">Foundational Program</strong>
                                    <p style="margin: 5px 0; font-size: 0.95rem;">January - June (5-6 months)</p>
                                </div>

                                <div style="text-align: left; font-size: 0.9rem; line-height: 1.8;">
                                    <strong style="color: #28AFCF;">Suggested Timeline:</strong><br>
                                    ➊ <strong>June</strong> - First attempt<br>
                                    ➋ <strong>July</strong> - Bootcamp + ACT*<br>
                                    &nbsp;&nbsp;&nbsp;OR <strong>August</strong> - SAT attempt<br>
                                    ➌ <strong>Sept/Oct</strong> - Final attempt if needed<br><br>

                                    <div style="font-size: 0.85rem; color: #666; margin-bottom: 15px;">
                                        *July ACT not offered in NY. Students can test in nearby states (NJ, CT).
                                    </div>

                                    <div style="background: #F0B268; color: #134958; padding: 15px; border-radius: 8px; font-weight: 600;">
                                        💡 Added Benefit: Students also see improvement in their school math courses!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JUNIOR PATH -->
                        <div style="text-align: center;">
                            <div style="background: #FF7F07; color: white; padding: 20px; border-radius: 15px 15px 0 0; font-size: 1.4rem; font-weight: 700;">
                                🎓 JUNIOR
                            </div>
                            <div style="background: #fff8f0; border: 3px solid #FF7F07; border-top: none; border-radius: 0 0 15px 15px; padding: 25px; min-height: 520px;">

                                <!-- Junior Decision Point -->
                                <div style="background: white; padding: 15px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                    <strong style="color: #134958; font-size: 1rem;">Do you have foundational gaps?</strong><br>
                                    <span style="font-size: 0.85rem; color: #666;">(200+ pts below SAT goal or 6-9 pts below ACT goal, OR taking Algebra 2 now)</span>
                                </div>

                                <!-- Two options -->
                                <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                    <div style="flex: 1; text-align: center;">
                                        <div style="background: #4CAF50; color: white; padding: 8px; border-radius: 8px 8px 0 0; font-weight: 700; font-size: 0.9rem;">YES</div>
                                        <div style="background: white; border: 2px solid #4CAF50; border-top: none; padding: 15px; border-radius: 0 0 8px 8px; font-size: 0.85rem;">
                                            <strong>Foundational</strong><br>
                                            Jan-June<br>
                                            (5-6 months)
                                        </div>
                                    </div>
                                    <div style="flex: 1; text-align: center;">
                                        <div style="background: #2196F3; color: white; padding: 8px; border-radius: 8px 8px 0 0; font-weight: 700; font-size: 0.9rem;">NO</div>
                                        <div style="background: white; border: 2px solid #2196F3; border-top: none; padding: 15px; border-radius: 0 0 8px 8px; font-size: 0.85rem;">
                                            <strong>Bootcamp</strong><br>
                                            Year-round<br>
                                            (6-8 weeks)
                                        </div>
                                    </div>
                                </div>

                                <div style="text-align: left; font-size: 0.9rem; line-height: 1.8;">
                                    <strong style="color: #FF7F07;">Suggested Timeline:</strong><br>
                                    ➊ <strong>June</strong> - First attempt<br>
                                    ➋ <strong>July/Aug</strong> - Second attempt<br>
                                    ➌ <strong>Early Fall</strong> - Final before apps<br><br>

                                    <div style="background: #fff3e6; padding: 15px; border-radius: 8px; border-left: 3px solid #FF7F07;">
                                        ⚠️ After fall, focus on applications.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps Arrow -->
                    <div style="text-align: center; margin: 40px 0;">
                        <div style="width: 2px; height: 50px; background: linear-gradient(to bottom, transparent, #134958); margin: 0 auto;"></div>
                        <div style="background: #134958; color: white; padding: 15px 30px; border-radius: 50px; display: inline-block; font-weight: 700; margin-top: -10px;">
                            📋 Next: Choose Format & Test
                        </div>
                    </div>
                </div>

                <h2 style="margin-top: 60px;">Step 1: Diagnostic Testing</h2>
                <p>We start with comprehensive diagnostic assessments for both SAT and ACT. This identifies your strengths, determines which test suits you best, and sets realistic score goals.</p>

                <h2 style="margin-top: 40px;">Step 2: Choose Your Format</h2>

                <p style="margin-bottom: 8px;"><strong>Group Classes (Most Popular)</strong></p>
                <p style="margin-bottom: 30px;">Small groups (max 8 students) provide accountability, peer learning, and affordability. Ideal for self-motivated students who benefit from collaborative learning and stay on track with structured schedules.</p>

                <p style="margin-bottom: 8px;"><strong>Private 1-on-1 Tutoring</strong></p>
                <p style="margin-bottom: 10px;">We recommend private tutoring in two scenarios:</p>
                <ul style="margin-bottom: 30px; margin-top: 0;">
                    <li style="margin-bottom: 8px;"><strong>Significant foundational gaps:</strong> Students needing intensive attention on core concepts that won't be addressed quickly enough in a group setting</li>
                    <li style="margin-bottom: 0;"><strong>Advanced test-takers:</strong> Students already scoring high who need minimal, targeted help—making private sessions more cost-effective than a full group program</li>
                </ul>

                <h2 style="margin-top: 40px;">Step 3: ACT or SAT? Understanding the Recent Changes</h2>

                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-top: 30px;">
                    <h3 style="margin-top: 0; color: #134958;">Quick Comparison: Digital SAT vs Enhanced ACT (2025)</h3>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                        <thead>
                            <tr style="background: #134958; color: white;">
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Feature</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Digital SAT</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Enhanced ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Format</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">Fully digital, adaptive</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">Paper or digital, non-adaptive</td>
                            </tr>
                            <tr style="background: #f8f9fa;">
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Total Time</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">2hr 14min</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">2hr 5min (without science)</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Questions</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">98 total</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">131 total (without science)</td>
                            </tr>
                            <tr style="background: #f8f9fa;">
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Passages</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">Short (1 question each)</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">Long (multiple questions)</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Math Weight</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">50% of score</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">25% of score</td>
                            </tr>
                            <tr style="background: #f8f9fa;">
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Science</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">No science section</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">Optional (some colleges require)</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Difficulty</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">Module 2 harder if you do well</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">Consistent throughout</td>
                            </tr>
                            <tr style="background: #f8f9fa;">
                                <td style="padding: 10px; border: 1px solid #ddd;"><strong>Score Stability</strong></td>
                                <td style="padding: 10px; border: 1px solid #ddd;">More stable</td>
                                <td style="padding: 10px; border: 1px solid #ddd;">More volatile (fewer questions)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="background: #e8f7fa; padding: 25px; border-radius: 12px; margin-top: 30px; margin-bottom: 0; border-left: 4px solid #28AFCF;">
                    <strong style="color: #134958; font-size: 1.1rem;">💡 Our Recommendation:</strong> To understand the recent changes and compare the two tests in detail, explore these resources:
                    <div style="margin-top: 15px; display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="/sat-vs-act-2025-which-test-is-right-for-you/" style="display: inline-block; background: #28AFCF; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s;">
                            📖 SAT vs ACT: Complete Guide
                        </a>
                        <a href="/changes-to-the-new-digital-sat/" style="display: inline-block; background: #134958; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s;">
                            💻 What's New in Digital SAT
                        </a>
                        <a href="/whats-new-in-the-enhanced-act/" style="display: inline-block; background: #FF7F07; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; transition: all 0.3s;">
                            🔥 What's New in Enhanced ACT
                        </a>
                    </div>
                </div>

            </section>

            <!-- Why Choose Us -->
            <section class="why-choose" style="padding-top: 0; margin-top: 20px;">
                <div class="content-section">
                    <h2 style="text-align: center; margin-bottom: 30px;">Why Choose NYC STEM Club for SAT/ACT Prep?</h2>
                </div>
                <div class="why-grid">
                    <div class="benefit-card">
                        <div class="icon">🎯</div>
                        <h3>Proven Results That Matter</h3>
                        <p>96% of our students improve their scores. Our average improvements (6-9 points ACT, 100+ points SAT) significantly outpace national averages. Some students improve by up to 13 points on the ACT.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="icon">👨‍🏫</div>
                        <h3>Expert Instructors</h3>
                        <p>Our instructors are test prep specialists with 15+ years of experience, advanced degrees, and proven track records. They don't just teach content—they teach test strategy and build confidence.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="icon">📊</div>
                        <h3>Diagnostic-Driven Personalization</h3>
                        <p>We assess both SAT and ACT to determine your best fit, then create a customized study plan. Every student receives strategies tailored to their learning style and score goals.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="icon">⚡</div>
                        <h3>Flexible Formats for Your Schedule</h3>
                        <p>Choose from private 1-on-1 tutoring, small group classes (max 8 students), online live instruction, or in-person sessions at our Manhattan location. We adapt to your needs.</p>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="faq-section">
                <h2 style="text-align: center; margin-bottom: 40px;">Frequently Asked Questions</h2>

                <div class="faq-grid">
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What's the difference between the SAT and ACT? Which should my child take?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>Both tests are widely accepted by colleges, but they have distinct differences. The ACT tends to be more straightforward with direct reading passages and consistent scoring, while the SAT provides more time per question but can have more ambiguous passages and answer choices.</p>
                            <p><strong>We help you decide through diagnostic testing.</strong> After your child takes practice tests for both exams, we analyze their performance and recommend the test where they'll reach their target score most efficiently. If performance is similar on both, we generally recommend starting with ACT prep because:</p>
                            <ul>
                                <li>ACT math covers more advanced topics (geometry, trigonometry), so mastering it makes switching to SAT easier</li>
                                <li>The ACT has historically had more consistent scoring curves</li>
                                <li>Reading passages are more straightforward</li>
                            </ul>
                            <p>That said, every student is different, and our diagnostic process ensures you choose the right test for your child's strengths.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">How long does it take to see score improvements?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>It depends on your starting point and target score, but here's what our data shows:</strong></p>
                            <ul>
                                <li>Students in <strong>3-6 month programs</strong> see an average <strong>6-point ACT increase</strong> or <strong>100-point SAT increase</strong></li>
                                <li>Students in <strong>full-year programs</strong> (our recommended timeline) see an average <strong>9-point ACT increase</strong> and even larger SAT gains</li>
                                <li><strong>96% of our students improve their scores</strong> from diagnostic to final test</li>
                            </ul>
                            <p><strong>The honest answer:</strong> Some students need very minimal preparation if they're already strong test-takers. Others need foundational work before intensive test prep. We assess your child's needs upfront and create a realistic timeline for reaching their target score.</p>
                            <p><strong>Most students take the test 3 times</strong> to achieve their best score, which is why starting in sophomore spring gives you the time and flexibility to reach your goals without added stress.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">When should my child start SAT/ACT prep?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>Ideal timeline: Spring of sophomore year (10th grade)</strong></p>
                            <p>This gives your child time to:</p>
                            <ul>
                                <li>Build a strong foundation without pressure</li>
                                <li>Take the test multiple times to maximize superscoring opportunities</li>
                                <li>Identify which test (SAT or ACT) suits them best</li>
                                <li>Achieve their target score before college applications intensify in junior/senior year</li>
                                <li>Focus on academics, extracurriculars, and application essays when it matters most</li>
                            </ul>
                            <p><strong>Minimum requirements:</strong></p>
                            <ul>
                                <li><strong>For ACT prep:</strong> Must have completed or be currently enrolled in <strong>Algebra 2</strong></li>
                                <li><strong>For SAT prep:</strong> Algebra 1 and Geometry are sufficient</li>
                            </ul>
                            <p><strong>Late start?</strong> We also work with juniors and seniors who need accelerated timelines. Our intensive bootcamps can help students make significant gains in shorter periods.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Do you offer practice tests?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>Yes! Practice tests are the cornerstone of our program.</strong></p>
                            <ul>
                                <li><strong>Foundational Course:</strong> 3 full-length practice tests</li>
                                <li><strong>Intensive Programs:</strong> 6-8 full-length practice tests</li>
                                <li>All tests administered under <strong>real test conditions</strong> (timed, proctored, proper environment)</li>
                                <li><strong>Detailed score analysis</strong> after every test</li>
                                <li>Personalized feedback identifying specific weaknesses</li>
                                <li>Progress tracking across all practice tests</li>
                            </ul>
                            <p><strong>We also simulate test day conditions</strong> so students are fully prepared for the actual testing environment, timing pressure, and stamina requirements.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What if my child has already taken the SAT/ACT and wants to improve their score?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>This is exactly what our bootcamps and intensive modules are designed for!</strong></p>
                            <p>Most students <strong>need 2-3 attempts</strong> to reach their target score, and that's completely normal. If your child has already taken an official test, we:</p>
                            <ul>
                                <li>Analyze their score report to identify exactly where points were lost</li>
                                <li>Create a targeted improvement plan focusing on their weakest areas</li>
                                <li>Enroll them in our intensive bootcamp (typically 4-6 weeks before their next test date)</li>
                                <li>Focus on timing, pacing, and stamina—often the biggest barriers to score improvement</li>
                            </ul>
                            <p><strong>Students who enroll in bootcamps:</strong></p>
                            <ul>
                                <li>Typically have already taken the test at least once</li>
                                <li>Have strong foundational knowledge but need strategy refinement</li>
                                <li>Are looking to gain those final 2-4 points (ACT) or 50-100 points (SAT) to hit their target</li>
                                <li>Need focused work on specific sections rather than comprehensive review</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">How is the Digital SAT different from the paper SAT?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>The Digital SAT, introduced in 2024, has significant differences from the traditional paper test:</p>
                            <p><strong>Adaptive Testing:</strong><br>The Digital SAT adjusts difficulty based on your performance in the first module of each section. Perform well, and you'll see harder questions worth more points. We teach strategies to recognize and adapt to this format.</p>
                            <p><strong>Shorter Test, Less Time Per Section:</strong><br>While the overall test is shorter, sections move faster. Time management becomes even more critical.</p>
                            <p><strong>New Tools &amp; Interface:</strong></p>
                            <ul>
                                <li>Built-in graphing calculator for all math questions</li>
                                <li>Digital annotation and highlighting tools</li>
                                <li>On-screen reference sheets</li>
                                <li>Different navigation system</li>
                            </ul>
                            <p><strong>Our Digital SAT Prep Includes:</strong></p>
                            <ul>
                                <li>Technology training on the digital testing platform</li>
                                <li>Strategies for reading and annotating on screen</li>
                                <li>Time management specific to the digital format</li>
                                <li>Practice with the exact tools students will use on test day</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What's included in your Enhanced ACT Prep program?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>The <strong>Enhanced ACT</strong> refers to the updated 2025 ACT format, which includes significant changes to test structure and content.</p>
                            <p><strong>What's New:</strong></p>
                            <ul>
                                <li><strong>Shorter, more streamlined test format</strong> - Reduced testing time without sacrificing content coverage</li>
                                <li><strong>Updated content alignment</strong> - Reflects current high school curriculum standards more accurately</li>
                                <li><strong>Science section evolution</strong> - Greater emphasis on data interpretation and scientific reasoning</li>
                            </ul>
                            <p><strong>Our Enhanced ACT Prep:</strong></p>
                            <ul>
                                <li>Custom proprietary materials designed specifically for the new format</li>
                                <li>Comprehensive coverage of all four sections: English, Math, Reading, and Science</li>
                                <li>Advanced strategies for the updated Science section</li>
                                <li>Full-length practice tests in the Enhanced ACT format</li>
                                <li>Timing and pacing techniques optimized for the new structure</li>
                            </ul>
                            <p>Students who complete Algebra 2 and have strong foundational skills tend to excel on the Enhanced ACT, as math comprises only 25% of the composite score, and the reading/grammar sections align well with high school English curriculum.</p>
                        </div>
                    </div>

                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Do you help students choose between the SAT and ACT, or do you require them to pick one?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p><strong>We offer complete flexibility</strong> and help you make the best strategic decision.</p>
                            <p><strong>Our Process:</strong></p>
                            <ul>
                                <li><strong>Dual diagnostic testing</strong> - Students take practice tests for both SAT and ACT</li>
                                <li><strong>Performance analysis</strong> - We compare scores, section strengths, and time management across both tests</li>
                                <li><strong>Personalized recommendation</strong> - We advise which test offers the fastest path to your target score</li>
                                <li><strong>Combo prep available</strong> - Students can prepare for both simultaneously through our foundational courses</li>
                            </ul>
                            <p><strong>Our Philosophy:</strong><br>Different students have different strengths. Some excel with the ACT's fast pace and straightforward passages. Others prefer the SAT's extra time per question. <strong>Our goal is efficiency</strong>—we want your child to reach their target score in the shortest time possible so they can focus on school, extracurriculars, and enjoying their high school experience while building a strong college resume.</p>
                            <p><strong>Strategic Pivot Option:</strong><br>Many students start with ACT prep (which covers more advanced math and faster pacing) and can easily pivot to the SAT if needed. The reverse requires more effort, which is why we often recommend starting with the ACT when diagnostic scores are similar.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final CTA -->
            <section class="final-cta">
                <h2>Ready to Achieve Your Target Score?</h2>
                <p>Join the program where 96% of students improve their scores and over 80% achieve Ivy League-level results. Our expert instructors, proven strategies, and personalized approach have helped hundreds of students gain admission to their dream colleges. Start your journey with a free consultation and diagnostic assessment.</p>
                <a href="/student-enrollment/" class="cta-btn">Inquire Now</a>
            </section>

            <!-- Testimonials Section -->
            <section style="background: #f8f9fa; padding: 60px 20px;">
                <div style="max-width: 1200px; margin: 0 auto;">
                    <h2 style="text-align: center; margin-bottom: 40px; color: #134958; font-size: 2rem;">What Parents & Students Say</h2>
                    <div style="margin: 0 auto;">
                        <?php
                        $reviews_shortcode = get_option('nyc_stem_reviews_shortcode', '[trustindex data-widget-id=d7ccd5b21eb1294a9186eebe1e6]');
                        echo do_shortcode($reviews_shortcode);
                        ?>
                    </div>
                </div>
            </section>

            <script>
                function toggleFAQ(button) {
                    const faqCard = button.closest('.faq-card');
                    const isActive = faqCard.classList.contains('active');
                    const question = button.querySelector('.faq-question');

                    // Toggle active class
                    faqCard.classList.toggle('active');

                    // Update aria-expanded attribute
                    if (question) {
                        question.setAttribute('aria-expanded', isActive ? 'false' : 'true');
                    }
                }
            </script>
        </article>
    </main>
</div>

<?php
get_footer();
