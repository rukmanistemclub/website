<?php
/**
 * Template Name: FAQ Page - Full Width
 * Description: Custom template for SAT & ACT FAQ page
 */

get_header();
?>

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
        background: #f8f9fa !important;
    }

    /* Hide default WordPress elements */
    .entry-header,
    .entry-footer,
    .post-navigation,
    .page-header {
        display: none !important;
    }

    .faq-page-wrapper {
        background: #f8f9fa;
        min-height: 100vh;
        padding: 0;
    }

    .faq-page-wrapper * {
        box-sizing: border-box;
    }

    /* Hero Header */
    .faq-hero {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        color: white;
        padding: 60px 20px;
        text-align: center;
        margin: 0 0 60px 0;
    }

    .faq-hero h1 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 48px !important;
        font-weight: 800 !important;
        line-height: 1.2 !important;
        color: white !important;
        margin: 0 auto 20px !important;
        max-width: 900px;
    }

    .faq-hero p {
        font-family: 'Roboto', sans-serif !important;
        font-size: 20px !important;
        font-weight: 400 !important;
        line-height: 1.6 !important;
        color: white !important;
        opacity: 0.95;
        margin: 0 auto !important;
        max-width: 100%;
    }

    /* FAQ Container */
    .faq-container {
        max-width: 1000px;
        margin: 0 auto 80px;
        padding: 0 20px;
    }

    /* Category Headers */
    .faq-category-header {
        margin: 60px 0 12px 0;
        padding: 0;
    }

    .faq-category-header:first-child {
        margin-top: 0;
    }

    .faq-category-header h3 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 24px !important;
        font-weight: 600 !important;
        line-height: 1.3 !important;
        color: #134958 !important;
        margin: 0 0 8px 0 !important;
    }

    .faq-category-description {
        font-family: 'Roboto', sans-serif !important;
        font-size: 16px !important;
        font-weight: 400 !important;
        line-height: 1.6 !important;
        color: #666 !important;
        margin: 0 0 20px 0 !important;
        font-style: italic;
    }

    .faq-list {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        margin-bottom: 40px;
    }

    .faq-card {
        border-bottom: 1px solid #e7e7ec;
    }

    .faq-card:last-child {
        border-bottom: none;
    }

    .faq-header {
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
    }

    .faq-header:hover {
        background-color: #f8f9fa;
    }

    .faq-card.active .faq-header {
        background-color: #f8f9fa;
    }

    .faq-question {
        font-family: 'Roboto', sans-serif !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        color: #134958 !important;
        margin: 0 !important;
        flex: 1;
        line-height: 1.6 !important;
    }

    .faq-icon {
        flex-shrink: 0;
        margin-left: 1.25rem;
        color: #28AFCF;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
    }

    .faq-card.active .faq-icon {
        transform: rotate(90deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
        background: #fafbfc;
    }

    .faq-answer p {
        padding: 0 1.5rem;
        color: #333;
        line-height: 1.6;
        margin: 0 0 0.75rem 0;
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
    }

    .faq-answer p:first-child {
        padding-top: 0.3rem;
    }

    .faq-answer p:last-child {
        padding-bottom: 0.4rem;
        margin-bottom: 0;
    }

    .faq-answer p + p {
        padding-top: 0;
    }

    .faq-answer ul {
        padding: 0 1.5rem 0.75rem 1.5rem;
        margin: 0 0 0.5rem 0;
        color: #333;
        line-height: 1.6;
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        list-style: none;
    }

    .faq-answer ul li {
        margin-bottom: 0.5rem;
        padding-left: 1.5rem;
        position: relative;
    }

    .faq-answer ul li::before {
        content: "▸";
        position: absolute;
        left: 0;
        font-size: 18px;
        font-weight: 700;
        color: #28AFCF;
        line-height: 1.6;
    }

    .faq-answer ul:last-child {
        padding-bottom: 1rem;
    }

    .faq-answer a {
        color: #28AFCF;
        font-weight: 600;
        text-decoration: none;
    }

    .faq-answer a:hover {
        text-decoration: underline;
    }

    /* CTA Section */
    .faq-cta {
        margin-bottom: 0;
        background: linear-gradient(135deg, #28AFCF 0%, #1a9dbf 100%);
        padding: 60px 40px 0 40px;
        text-align: center;
        position: relative;
    }

    .faq-cta::after {
        content: '';
        display: block;
        height: 30px;
        background: #CDE9F6;
        margin: 0 -40px;
    }

    .faq-cta-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-cta h2 {
        font-family: 'Roboto', sans-serif !important;
        font-size: 32px !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        color: white !important;
        margin: 0 0 20px !important;
    }

    .faq-cta p {
        font-family: 'Roboto', sans-serif !important;
        font-size: 18px !important;
        font-weight: 400 !important;
        line-height: 1.6 !important;
        color: white !important;
        margin: 0 0 30px !important;
    }

    .faq-cta .nyc-stem-inquiry-btn {
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .faq-hero {
            padding: 40px 20px;
        }

        .faq-hero h1 {
            font-size: 32px !important;
        }

        .faq-hero p {
            font-size: 18px !important;
        }

        .faq-question {
            font-size: 16px !important;
        }

        .faq-header {
            padding: 1rem;
        }

        .faq-answer p,
        .faq-answer ul {
            font-size: 15px;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .faq-answer ul {
            padding-left: 2.5rem;
        }

        .faq-cta h2 {
            font-size: 26px !important;
        }

        .faq-cta p {
            font-size: 16px !important;
        }
    }
</style>

<div class="faq-page-wrapper">
    <!-- Hero Section -->
    <div class="faq-hero">
        <h1>SAT & ACT Test Prep<br>Frequently Asked Questions</h1>
        <p>Everything you need to know about choosing the right test, preparing effectively, and achieving your target score.</p>
    </div>

    <!-- FAQ Container -->
    <div class="faq-container">

        <!-- Category 1: Choosing Between SAT & ACT -->
        <div class="faq-category-header">
            <h3>Choosing Between SAT & ACT</h3>
            <p class="faq-category-description">Understanding the differences and finding the right test for you</p>
        </div>
        <div class="faq-list">

            <!-- FAQ 1 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">What's the difference between the SAT and ACT? Which should my child take?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
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

            <!-- FAQ 2 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">Do colleges prefer one test over the other?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>No. All U.S. colleges accept both SAT and ACT equally. There's no admissions advantage to either test. Choose based on which test format suits your strengths better.</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">Can I take both tests?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>Yes. Some students do take both and submit the higher score, but most take diagnostic tests at the beginning and focus their prep on the one they perform better on.</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">How do I know which test is right for me?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>Take full-length practice tests for both under timed conditions. Compare your scores and which test felt more comfortable. We offer <strong>free diagnostic testing and consultation</strong> to help you decide.</p>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">What if I'm stronger in math?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>If math is your superpower and you want it to count for more, the SAT's 50% math weighting works in your favor. However, we see many strong math students actually prefer the ACT—here's why: Since they don't need to focus heavily on the math component (it's straightforward for them), they can dedicate their prep time to English (reading and grammar). If they're also strong in English, their prep becomes much shorter—just practicing with different test papers and getting comfortable with the timing. The ACT's balanced scoring means math excellence still helps significantly while requiring less focused study.</p>
                </div>
            </div>

        </div>

        <!-- Category 2: ACT/SAT Test Format -->
        <div class="faq-category-header">
            <h3>ACT/SAT Test Format</h3>
            <p class="faq-category-description">What's changed with the Digital SAT and Enhanced ACT</p>
        </div>
        <div class="faq-list">

            <!-- FAQ 6 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">How is the Digital SAT different from the paper SAT?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>The Digital SAT, introduced in 2024, has significant differences from the traditional paper test:</p>
                    <p><strong>Adaptive Testing:</strong><br>The Digital SAT adjusts difficulty based on your performance in the first module of each section. Perform well, and you'll see harder questions worth more points. We teach strategies to recognize and adapt to this format.</p>
                    <p><strong>Shorter Test, Less Time Per Section:</strong><br>While the overall test is shorter, sections move faster. Time management becomes even more critical.</p>
                    <p><strong>New Tools & Interface:</strong></p>
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
                    <p><a href="/resources/changes-to-the-new-digital-sat/">Learn more about Digital SAT changes →</a></p>
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">What's included in your Enhanced ACT Prep program?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>The Enhanced ACT refers to the updated 2025 ACT format with significant structural changes that make the test shorter and more flexible.</p>
                    <p><strong>What's New:</strong></p>
                    <ul>
                        <li><strong>Shorter test</strong> - 125 minutes (core) or 165 minutes (with optional Science) vs. 175 minutes previously</li>
                        <li><strong>Fewer questions</strong> - 131 questions without Science, 171 with Science (vs. 215 before)</li>
                        <li><strong>More time per question</strong> - 18% more time to think and reduce careless errors</li>
                        <li><strong>Optional Science section</strong> - Science is now optional, like the Writing section</li>
                        <li><strong>New Composite score</strong> - Based only on English, Math, and Reading (Science reported separately)</li>
                    </ul>
                    <p><strong>Our Enhanced ACT Prep:</strong></p>
                    <ul>
                        <li>Custom materials designed specifically for the Enhanced ACT format</li>
                        <li>Comprehensive coverage of all three core sections: English, Math, and Reading</li>
                        <li>Optional Science prep for STEM applicants or schools requiring Science scores</li>
                        <li>Strategic guidance on whether to take the Science section</li>
                        <li>Full-length practice tests in the Enhanced ACT format</li>
                        <li>Timing and pacing techniques optimized for the new structure</li>
                    </ul>
                    <p>Students who complete Algebra 2 and have strong foundational skills tend to excel on the Enhanced ACT, as math comprises only 25% of the composite score, and the reading/grammar sections align well with high school English curriculum.</p>
                    <p><a href="/whats-new-in-the-enhanced-act/">Learn more about the Enhanced ACT changes →</a></p>
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">Is the ACT Science section hard?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>The Science section doesn't test memorized facts—it tests reading charts and graphs, which is a highly learnable skill. Plus, it's now optional! Most students improve their Science scores significantly with proper prep.</p>
                </div>
            </div>

        </div>

        <!-- Category 3: When to Start Preparing -->
        <div class="faq-category-header">
            <h3>When to Start Preparing</h3>
            <p class="faq-category-description">Optimal timing for test prep success</p>
        </div>
        <div class="faq-list">

            <!-- FAQ 9 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">When should my child start SAT/ACT prep?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
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

            <!-- FAQ 10 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">My peers and seniors tell me to wait until spring of junior year. Should I?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>That advice is valid <strong>if you're not in Algebra 2 during sophomore year</strong>. However, if you <strong>are</strong> taking Algebra 2 in sophomore year, starting ACT prep then creates a double win: the training helps with both your ACT preparation <strong>and</strong> your school grades. You're learning the same concepts simultaneously, reinforcing each other. In fact, the majority of our students achieve a 34+ before entering junior year, giving them one less thing to stress about during their busiest academic year.</p>
                </div>
            </div>

        </div>

        <!-- Category 4: Our Programs & Results -->
        <div class="faq-category-header">
            <h3>Our Programs & Results</h3>
            <p class="faq-category-description">How we help students succeed and what to expect</p>
        </div>
        <div class="faq-list">

            <!-- FAQ 11 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">Do you help students choose between the SAT and ACT, or do you require them to pick one?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
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
                    <p><a href="/resources/sat-vs-act-2025-which-test-is-right-for-you/">SAT vs ACT 2025: Which test is right for you? →</a></p>
                </div>
            </div>

            <!-- FAQ 12 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">Do you offer practice tests?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p><strong>Yes! Practice tests are the cornerstone of our program.</strong></p>
                    <ul>
                        <li><strong>Foundational Course:</strong> 3 full-length practice tests</li>
                        <li><strong>Intensive Programs:</strong> Generally includes 2-3 full-length practice tests</li>
                        <li>All tests administered under <strong>real test conditions</strong> (timed, proctored, proper environment)</li>
                        <li><strong>Detailed score analysis</strong> after every test</li>
                        <li>Personalized feedback identifying specific weaknesses</li>
                        <li>Progress tracking across all practice tests</li>
                    </ul>
                    <p><strong>We also simulate test day conditions</strong> so students are fully prepared for the actual testing environment, timing pressure, and stamina requirements.</p>
                </div>
            </div>

            <!-- FAQ 13 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">How long does it take to see score improvements?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
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

            <!-- FAQ 14 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">What if my child has already taken the SAT/ACT and wants to improve their score?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
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

            <!-- FAQ NEW: Do you guarantee score improvements? -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">Do you guarantee score improvements?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>While we don't offer a specific point guarantee—because improvement depends on multiple factors including student effort, attendance, homework completion, and test-day conditions—our track record demonstrates consistent, significant results:</p>
                    <ul>
                        <li>96% of our students improve their scores from diagnostic to final test</li>
                        <li>Students in 3-6 month programs see an average 6-point ACT increase or 100-point SAT increase</li>
                        <li>Students in full-year programs see an average 9-point ACT increase with even larger SAT gains</li>
                        <li>The majority of our students achieve 34+ on the ACT</li>
                    </ul>
                    <p>What drives these results? Consistent attendance, completing assigned practice work, and implementing instructor feedback. Students who fully engage with our program consistently reach their target scores and see significant improvements.</p>
                </div>
            </div>

        </div>

        <!-- Category 5: Intensive Bootcamp Programs -->
        <div class="faq-category-header">
            <h3>Intensive Bootcamp Programs</h3>
            <p class="faq-category-description">Quick gains with our 3-week summer intensives and Year-Round Bootcamps</p>
        </div>
        <div class="faq-list">

            <!-- FAQ 15 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">How much can my score improve in 3 weeks?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>Score improvement depends on your starting point and target score:</p>
                    <ul>
                        <li>Students typically improve <strong>2-4 composite points</strong> in our 3-week intensive bootcamp</li>
                        <li>The biggest gains come from improved <strong>timing, pacing, and test-taking strategies</strong></li>
                        <li>Individual section scores can improve even more dramatically</li>
                    </ul>
                    <p>This bootcamp is ideal for students who:</p>
                    <ul>
                        <li>Already have content knowledge but struggle with timing</li>
                        <li>Need to refine strategies for specific sections</li>
                        <li>Are close to their target score and need that final push</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ 16 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">Is this bootcamp right for me if I've never taken the test?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>Our bootcamps are designed for students who:</p>
                    <ul>
                        <li>Have already taken the test at least once</li>
                        <li>Have strong foundational knowledge but need strategy refinement</li>
                        <li>Are comfortable with Algebra 2 and basic trigonometry (for ACT)</li>
                        <li>Need to improve their score by 2-4 points to hit their target</li>
                    </ul>
                    <p>If you're new to the test or need foundational content review, we recommend our <strong>ACT-SAT Foundational Course</strong> instead.</p>
                </div>
            </div>

            <!-- FAQ 17 -->
            <div class="faq-card">
                <button class="faq-header" onclick="toggleFAQ(this)">
                    <h3 class="faq-question">When should I take this bootcamp relative to my test date?</h3>
                    <div class="faq-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18l6-6-6-6"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-answer">
                    <p>We recommend completing the bootcamp either leading up to your test date or finishing approximately 4-6 weeks before your official test. This timing allows you to:</p>
                    <ul>
                        <li>Build momentum going into the test</li>
                        <li>Use the final 2-3 weeks for independent review, additional practice, and/or supplemental private tutoring</li>
                        <li>Implement feedback from practice tests</li>
                        <li>Fine-tune your test-day strategy and pacing</li>
                    </ul>
                    <p><strong>Popular timing:</strong> Many students take our summer bootcamp in July/early August to prepare for July-September test dates.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- CTA Section -->
    <div class="faq-cta">
        <div class="faq-cta-content">
            <h2>Still Have Questions?</h2>
            <p>Schedule a free consultation with our test prep experts. We'll assess your needs, answer your questions, and create a personalized plan to help you achieve your target score.</p>
            <?php echo do_shortcode('[inquiry_button rounded="no"]'); ?>
        </div>
    </div>

    <!-- Testimonials Section -->
    <?php echo do_shortcode('[testimonials]'); ?>

</div>

<script>
function toggleFAQ(button) {
    const faqCard = button.closest('.faq-card');
    const isActive = faqCard.classList.contains('active');
    const question = button.querySelector('.faq-question');
    const answer = faqCard.querySelector('.faq-answer');

    // Close all other FAQs (optional - remove if you want multiple open)
    document.querySelectorAll('.faq-card.active').forEach(item => {
        if (item !== faqCard) {
            item.classList.remove('active');
            item.querySelector('.faq-answer').style.maxHeight = '0';
            item.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
        }
    });

    // Toggle active class
    faqCard.classList.toggle('active');

    // Set dynamic max-height based on content
    if (!isActive) {
        answer.style.maxHeight = answer.scrollHeight + 'px';
        question.setAttribute('aria-expanded', 'true');
    } else {
        answer.style.maxHeight = '0';
        question.setAttribute('aria-expanded', 'false');
    }
}
</script>

<?php
/**
 * FAQPage Schema Markup for SEO/AEO
 * Generates JSON-LD structured data for all FAQs on this page
 */
$faq_schema_items = array(
    // Category 1: Choosing Between SAT & ACT
    array(
        'question' => "What's the difference between the SAT and ACT? Which should my child take?",
        'answer' => "Both tests are widely accepted by colleges, but they have distinct differences. The ACT tends to be more straightforward with direct reading passages and consistent scoring, while the SAT provides more time per question but can have more ambiguous passages and answer choices. We help you decide through diagnostic testing. After your child takes practice tests for both exams, we analyze their performance and recommend the test where they'll reach their target score most efficiently."
    ),
    array(
        'question' => "Do colleges prefer one test over the other?",
        'answer' => "No. All U.S. colleges accept both SAT and ACT equally. There's no admissions advantage to either test. Choose based on which test format suits your strengths better."
    ),
    array(
        'question' => "Can I take both tests?",
        'answer' => "Yes. Some students do take both and submit the higher score, but most take diagnostic tests at the beginning and focus their prep on the one they perform better on."
    ),
    array(
        'question' => "How do I know which test is right for me?",
        'answer' => "Take full-length practice tests for both under timed conditions. Compare your scores and which test felt more comfortable. We offer free diagnostic testing and consultation to help you decide."
    ),
    array(
        'question' => "What if I'm stronger in math?",
        'answer' => "If math is your superpower and you want it to count for more, the SAT's 50% math weighting works in your favor. However, we see many strong math students actually prefer the ACT because they can dedicate their prep time to English since the math is straightforward for them."
    ),
    // Category 2: ACT/SAT Test Format
    array(
        'question' => "How is the Digital SAT different from the paper SAT?",
        'answer' => "The Digital SAT, introduced in 2024, features adaptive testing that adjusts difficulty based on your performance, a shorter overall test with faster sections, and new digital tools including a built-in graphing calculator, annotation tools, and on-screen reference sheets. Our Digital SAT Prep includes technology training, screen reading strategies, and time management specific to the digital format."
    ),
    array(
        'question' => "What's included in your Enhanced ACT Prep program?",
        'answer' => "The Enhanced ACT refers to the updated 2025 ACT format with a shorter test (125-165 minutes), fewer questions, 18% more time per question, and optional Science section. Our prep includes custom materials for the Enhanced ACT format, comprehensive coverage of English, Math, and Reading, optional Science prep, and full-length practice tests."
    ),
    array(
        'question' => "Is the ACT Science section hard?",
        'answer' => "The Science section doesn't test memorized facts—it tests reading charts and graphs, which is a highly learnable skill. Plus, it's now optional! Most students improve their Science scores significantly with proper prep."
    ),
    // Category 3: When to Start Preparing
    array(
        'question' => "When should my child start SAT/ACT prep?",
        'answer' => "Ideal timeline: Spring of sophomore year (10th grade). This gives your child time to build a strong foundation, take the test multiple times for superscoring, identify which test suits them best, and achieve their target score before applications intensify. Minimum requirements: For ACT prep, must have completed Algebra 2. For SAT prep, Algebra 1 and Geometry are sufficient."
    ),
    array(
        'question' => "My peers and seniors tell me to wait until spring of junior year. Should I?",
        'answer' => "That advice is valid if you're not in Algebra 2 during sophomore year. However, if you are taking Algebra 2 in sophomore year, starting ACT prep then creates a double win: the training helps with both your ACT preparation and your school grades. The majority of our students achieve a 34+ before entering junior year."
    ),
    // Category 4: Our Programs & Results
    array(
        'question' => "Do you help students choose between the SAT and ACT, or do you require them to pick one?",
        'answer' => "We offer complete flexibility and help you make the best strategic decision through dual diagnostic testing, performance analysis, and personalized recommendations. Students can also prepare for both simultaneously through our foundational courses."
    ),
    array(
        'question' => "Do you offer practice tests?",
        'answer' => "Yes! Practice tests are the cornerstone of our program. Foundational Course includes 3 full-length practice tests, Intensive Programs include 2-3 tests. All tests are administered under real test conditions with detailed score analysis and personalized feedback."
    ),
    array(
        'question' => "How long does it take to see score improvements?",
        'answer' => "Students in 3-6 month programs see an average 6-point ACT increase or 100-point SAT increase. Students in full-year programs see an average 9-point ACT increase. 96% of our students improve their scores from diagnostic to final test. Most students take the test 3 times to achieve their best score."
    ),
    array(
        'question' => "What if my child has already taken the SAT/ACT and wants to improve their score?",
        'answer' => "This is exactly what our bootcamps and intensive modules are designed for! We analyze their score report, create a targeted improvement plan, and enroll them in our intensive bootcamp (typically 4-6 weeks before their next test date) focusing on timing, pacing, and stamina."
    ),
    array(
        'question' => "Do you guarantee score improvements?",
        'answer' => "While we don't offer a specific point guarantee, our track record demonstrates consistent results: 96% of students improve their scores, with average improvements of 6-point ACT increase or 100-point SAT increase in 3-6 month programs, and 9-point ACT increase in full-year programs. The majority of our students achieve 34+ on the ACT."
    ),
    // Category 5: Intensive Bootcamp Programs
    array(
        'question' => "How much can my score improve in 3 weeks?",
        'answer' => "Students typically improve 2-4 composite points in our 3-week intensive bootcamp. The biggest gains come from improved timing, pacing, and test-taking strategies. This bootcamp is ideal for students who already have content knowledge but struggle with timing or need that final push to reach their target score."
    ),
    array(
        'question' => "Is this bootcamp right for me if I've never taken the test?",
        'answer' => "Our bootcamps are designed for students who have already taken the test at least once, have strong foundational knowledge but need strategy refinement, and need to improve their score by 2-4 points. If you're new to the test, we recommend our ACT-SAT Foundational Course instead."
    ),
    array(
        'question' => "When should I take this bootcamp relative to my test date?",
        'answer' => "We recommend completing the bootcamp either leading up to your test date or finishing approximately 4-6 weeks before your official test. This allows you to build momentum, use final weeks for independent review and private tutoring, and fine-tune your test-day strategy."
    )
);

// Build FAQPage schema
$faq_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array()
);

foreach ($faq_schema_items as $item) {
    $faq_schema['mainEntity'][] = array(
        '@type' => 'Question',
        'name' => $item['question'],
        'acceptedAnswer' => array(
            '@type' => 'Answer',
            'text' => $item['answer']
        )
    );
}

echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
?>

<?php get_footer(); ?>
