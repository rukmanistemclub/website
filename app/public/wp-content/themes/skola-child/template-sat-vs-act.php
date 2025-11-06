<?php
/**
 * Template Name: SAT vs ACT 2025 - Full Width
 * Description: Custom template for SAT vs ACT comparison page
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

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    /* Hero Section with Image */
    .hero-section {
        background: linear-gradient(135deg, #134958 0%, #28AFCF 100%);
        padding: 40px 40px 30px;
        margin: -30px -20px 40px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .hero-section h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
        color: white;
    }

    .hero-subtitle {
        font-size: 20px;
        max-width: 800px;
        margin: 0 auto 20px;
        position: relative;
        z-index: 2;
        color: white;
        opacity: 0.95;
    }

    .hero-image-container {
        max-width: 800px;
        margin: 20px auto 0;
        position: relative;
        z-index: 2;
    }

    .hero-image-container img {
        width: 100%;
        height: auto;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    /* Lead Paragraph */
    .lead-paragraph {
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 2rem;
        color: #334155;
    }

    /* Callout Box */
    .callout-box {
        background: linear-gradient(135deg, #ecfeff, #cffafe);
        border-left: 6px solid #28AFCF;
        border-radius: 12px;
        padding: 1.5rem;
        margin: 2rem 0;
    }

    .callout-box h3 {
        font-size: 1.4rem;
        color: #134958;
        margin-bottom: 1rem;
    }

    .callout-box p {
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .callout-box ul {
        list-style: none;
        padding: 0;
        margin: 1rem 0 0 0;
    }

    .callout-box li {
        padding: 0.5rem 0;
        line-height: 1.7;
        font-size: 1.05rem;
    }

    .callout-box strong {
        color: #134958;
    }

    /* Section Headings */
    h2 {
        font-size: 2.25rem;
        color: #134958;
        margin: 2.5rem 0 1.25rem 0;
        font-weight: 700;
    }

    /* VS Comparison Container */
    .vs-comparison {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        gap: 2rem;
        align-items: center;
        margin: 1.5rem 0;
    }

    .vs-divider {
        font-size: 3rem;
        font-weight: 700;
        color: #cbd5e1;
        padding: 0 1.5rem;
    }

    .comparison-card {
        background: white;
        border-radius: 16px;
        padding: 0;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .comparison-card h3 {
        font-size: 1.5rem;
        margin: 0;
        padding: 1.25rem 2rem;
        text-align: center;
        color: white;
        font-weight: 700;
    }

    .comparison-card .card-content {
        padding: 2rem;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .quick-stats > div {
        text-align: center;
    }

    .quick-stats .label {
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 0.5rem;
    }

    .quick-stats .value {
        font-size: 1.3rem;
        font-weight: 700;
        color: #134958;
    }

    .card-details {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid #f1f5f9;
    }

    .card-details p {
        margin: 0.5rem 0;
        line-height: 1.7;
    }

    /* Recommendation Cards */
    .recommendation-cards {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        margin: 1.5rem 0;
    }

    .recommendation-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .recommendation-card.act {
        border-color: #28AFCF;
    }

    .recommendation-card.sat {
        border-color: #FF7F07;
    }

    .recommendation-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .recommendation-card h3 {
        font-size: 1.4rem;
        margin: 0 0 1.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .recommendation-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
        line-height: 2;
    }

    .recommendation-card li {
        padding: 0.5rem 0;
        display: flex;
        align-items: start;
        gap: 0.75rem;
    }

    .recommendation-card .checkmark {
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    /* Feature Grid */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin: 1.5rem 0;
    }

    .feature-item {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .feature-item .icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .feature-item h4 {
        font-size: 1.1rem;
        color: #134958;
        margin-bottom: 0.75rem;
        font-weight: 700;
    }

    .feature-item p {
        color: #64748b;
        line-height: 1.6;
    }

    /* FAQ Accordion */
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

    /* Bottom Line Box */
    .bottom-line {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 16px;
        padding: 2rem;
        margin: 2rem 0;
        border-left: 6px solid #28AFCF;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }

    .bottom-line-intro {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .bottom-line-intro p {
        font-size: 1.25rem;
        font-weight: 600;
        color: #134958;
        margin: 0;
        line-height: 1.5;
    }

    .bottom-line-box {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-top: 1.5rem;
    }

    .bottom-line-box h4 {
        color: #134958;
        font-size: 1.1rem;
        margin: 0 0 1.25rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .process-steps {
        counter-reset: step-counter;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .process-steps li {
        counter-increment: step-counter;
        padding: 0.75rem 0 0.75rem 2.5rem;
        position: relative;
        line-height: 1.6;
        color: #475569;
    }

    .process-steps li::before {
        content: counter(step-counter);
        position: absolute;
        left: 0;
        top: 0.65rem;
        width: 1.75rem;
        height: 1.75rem;
        background: #28AFCF;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.85rem;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #134958, #28AFCF);
        color: white;
        text-align: center;
        padding: 2.5rem 2rem;
        border-radius: 16px;
        margin: 2.5rem 0;
    }

    .cta-section h2 {
        font-size: 2rem;
        color: white;
        margin: 0 0 1rem 0;
    }

    .cta-section p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-button {
        display: inline-block;
        padding: 1rem 2rem;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .cta-button.primary {
        background: #FF7F07;
        color: white;
        box-shadow: 0 4px 12px rgba(255, 127, 7, 0.3);
    }

    .cta-button.primary:hover {
        background: #e67006;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 127, 7, 0.4);
    }

    .cta-button.secondary {
        background: white;
        color: #134958;
    }

    .cta-button.secondary:hover {
        background: #f1f5f9;
        transform: translateY(-2px);
    }

    /* Testimonials Section */
    .nyc-testimonials-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 60px 20px;
        margin: 40px -20px -30px;
        border-radius: 16px 16px 0 0;
    }

    .nyc-testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .nyc-testimonials-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #134958;
        text-align: center;
        margin-bottom: 40px;
    }

    .nyc-testimonials-content {
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            padding: 40px 20px 30px;
        }

        .hero-section h1 {
            font-size: 32px;
        }

        .hero-subtitle {
            font-size: 18px;
        }

        h2 {
            font-size: 1.75rem;
        }

        .vs-comparison {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .vs-divider {
            display: none;
        }

        .recommendation-cards,
        .feature-grid {
            grid-template-columns: 1fr;
        }

        .quick-stats {
            gap: 1rem;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .cta-button {
            width: 100%;
        }

        .nyc-testimonials-section {
            padding: 60px 20px;
        }

        .nyc-testimonials-title {
            font-size: 2rem;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <div class="container">
                <!-- Hero Section with Image -->
                <div class="hero-section">
                    <h1>SAT vs ACT: Which Test Is Right for You?</h1>
                    <p class="hero-subtitle">Complete 2025 comparison guide with expert recommendations to help you choose the test that fits your strengths</p>
                    <div class="hero-image-container">
                        <img src="<?php echo home_url('/wp-content/uploads/fork-in-sat-act-road.jpg'); ?>" alt="Fork in the SAT-ACT Road" />
                    </div>
                </div>

                <!-- Lead Paragraph -->
                <p class="lead-paragraph"><strong>Should you take the SAT or ACT?</strong> It's one of the biggest questions in college prep—and the answer isn't the same for everyone. Both tests are accepted by all U.S. colleges, but they have important differences that can impact your score. At NYC STEM Club, we've helped hundreds of students choose the right test and achieve their target scores. Here's everything you need to know.</p>

                <!-- Quick Answer Callout -->
                <div class="callout-box">
                    <h3>📌 Quick Answer</h3>
                    <p><strong>Both tests are accepted by ALL U.S. colleges.</strong> There's no admissions advantage to one over the other.</p>
                    <ul>
                        <li><strong>For most students:</strong> We recommend starting with the ACT (more straightforward questions, balanced scoring)</li>
                        <li><strong>For some students:</strong> The SAT is better (more time per question, less advanced math)</li>
                        <li><strong>Best approach:</strong> Take practice tests for BOTH to see which suits your strengths</li>
                    </ul>
                </div>

                <!-- Quick Comparison -->
                <h2>📊 Quick Comparison</h2>
                <div class="vs-comparison">
                    <div class="comparison-card">
                        <h3 style="background: #28AFCF;">Enhanced ACT</h3>
                        <div class="card-content">
                            <div class="quick-stats">
                                <div>
                                    <div class="label">Time</div>
                                    <div class="value">2h 5m</div>
                                </div>
                                <div>
                                    <div class="label">Questions</div>
                                    <div class="value">131</div>
                                </div>
                                <div>
                                    <div class="label">Score</div>
                                    <div class="value">1-36</div>
                                </div>
                            </div>
                            <div class="card-details">
                                <p><strong>Sections:</strong> English, Math, Reading</p>
                                <p><strong>Math Weight:</strong> <span style="color: #28AFCF; font-weight: 700;">33%</span> (1 of 3 sections)</p>
                                <p><strong>Science:</strong> Optional add-on</p>
                            </div>
                        </div>
                    </div>
                    <div class="vs-divider">VS</div>
                    <div class="comparison-card">
                        <h3 style="background: #FF7F07;">Digital SAT</h3>
                        <div class="card-content">
                            <div class="quick-stats">
                                <div>
                                    <div class="label">Time</div>
                                    <div class="value">2h 14m</div>
                                </div>
                                <div>
                                    <div class="label">Questions</div>
                                    <div class="value">98</div>
                                </div>
                                <div>
                                    <div class="label">Score</div>
                                    <div class="value">400-1600</div>
                                </div>
                            </div>
                            <div class="card-details">
                                <p><strong>Sections:</strong> Reading & Writing, Math</p>
                                <p><strong>Math Weight:</strong> <span style="color: #FF7F07; font-weight: 700;">50%</span> (1 of 2 sections)</p>
                                <p><strong>Science:</strong> No dedicated section</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Understanding the Recent Changes -->
                <h2>🔄 Understanding the Recent Changes</h2>

                <div class="callout-box" style="background: #fff3e6; border-left: 4px solid #FF7F07; margin-bottom: 2.5rem;">
                    <p style="margin: 0;"><strong style="color: #FF7F07; font-size: 1.1rem;">⚠️ Important:</strong> Both tests have undergone major changes. The SAT is now fully digital and adaptive, while the ACT has become "Enhanced" with fewer questions and optional science.</p>
                </div>

                <h3 style="color: #28AFCF; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">Digital SAT (Fully Digital, Adaptive)</h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <!-- Left Column: Choose SAT Box -->
                    <div class="recommendation-card sat">
                        <h3 style="color: #FF7F07;">
                            <span style="font-size: 1.8rem;">🎯</span> Choose SAT if you...
                        </h3>
                        <ul>
                            <li><span class="checkmark" style="color: #FF7F07;">✓</span> <span>Want more time per question (2hr 14min, 98 questions total)</span></li>
                            <li><span class="checkmark" style="color: #FF7F07;">✓</span> <span>Prefer shorter reading passages (one question per passage)</span></li>
                            <li><span class="checkmark" style="color: #FF7F07;">✓</span> <span>Are strong in math even without advanced topics (math is 50% of score)</span></li>
                            <li><span class="checkmark" style="color: #FF7F07;">✓</span> <span>Don't mind adaptive testing</span></li>
                        </ul>
                        <p style="margin-top: 1rem; padding-top: 1rem; border-top: 2px solid #f1f5f9; margin-bottom: 0;"><strong>✅ Advantages:</strong> Prep materials available (Khan Academy, Bluebook), more time per question, and higher level Math topics are not typically included.</p>
                    </div>

                    <!-- Right Column: What to Know -->
                    <div>
                        <p style="margin-top: 1.5rem; margin-bottom: 1.5rem; font-size: 1.15rem;"><strong>ℹ️ What to know about the Digital SAT:</strong></p>
                        <ul style="margin-bottom: 0; list-style: none; padding-left: 0;">
                            <li style="margin-bottom: 1.75rem; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #FF7F07;">➤</span> <strong>The Adaptive Format Can Create Anxiety:</strong> If you do well in Module 1, Module 2 becomes noticeably harder. Students report this difficulty spike causes stress.</li>
                            <li style="margin-bottom: 1.75rem; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #FF7F07;">➤</span> <strong>Practice vs Real Test Gap:</strong> Many students score lower on the actual exam than on CollegeBoard's official practice tests.</li>
                            <li style="margin-bottom: 1.75rem; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #FF7F07;">➤</span> <strong>Reading 50+ Short Passages on Screen:</strong> While shorter passages sound easier, reading dozens of them digitally can be exhausting.</li>
                            <li style="margin-bottom: 0; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #FF7F07;">➤</span> <strong>Math Doesn't Cover Much Algebra 2:</strong> Better for students not taking higher-level math courses.</li>
                        </ul>
                    </div>
                </div>

                <h3 style="color: #FF7F07; font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">Enhanced ACT (Paper or Digital, Non-Adaptive)</h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 3rem;">
                    <!-- Left Column: Choose ACT Box -->
                    <div class="recommendation-card act">
                        <h3 style="color: #28AFCF;">
                            <span style="font-size: 1.8rem;">⚡</span> Choose ACT if you...
                        </h3>
                        <ul>
                            <li><span class="checkmark" style="color: #28AFCF;">✓</span> <span>Prefer paper testing (still available, even though Digital tests have been introduced)</span></li>
                            <li><span class="checkmark" style="color: #28AFCF;">✓</span> <span>Are comfortable with higher-order math topics like trigonometry (math is only 25% of score)</span></li>
                            <li><span class="checkmark" style="color: #28AFCF;">✓</span> <span>Like non-adaptive, linear tests where difficulty stays consistent</span></li>
                            <li><span class="checkmark" style="color: #28AFCF;">✓</span> <span>Excel at fast-paced problem-solving</span></li>
                        </ul>
                        <p style="margin-top: 1rem; padding-top: 1rem; border-top: 2px solid #f1f5f9; margin-bottom: 0;"><strong>✅ Advantages:</strong> Paper option available, science section now optional, non-adaptive (less stressful for some), shorter overall (2hr 5min without science).</p>
                    </div>

                    <!-- Right Column: What to Know -->
                    <div>
                        <p style="margin-top: 1.5rem; margin-bottom: 1.5rem; font-size: 1.15rem;"><strong>ℹ️ What to know about the Enhanced ACT:</strong></p>
                        <ul style="margin-bottom: 0; list-style: none; padding-left: 0;">
                            <li style="margin-bottom: 1.75rem; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #28AFCF;">➤</span> <strong>English Is Now Significantly Harder:</strong> With only 40 scored questions instead of 75, the "easy giveaways" have been removed.</li>
                            <li style="margin-bottom: 1.75rem; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #28AFCF;">➤</span> <strong>Score Volatility Is a Major Issue:</strong> Fewer questions mean scaling is more volatile. On the Reading section (only 27 scored items), a few wrong answers can drastically drop your score.</li>
                            <li style="margin-bottom: 1.75rem; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #28AFCF;">➤</span> <strong>Digital ACT Had Rocky Launch:</strong> April 2025 test-takers reported technical issues—laptop malfunctions, delays, and some students switched to paper last-minute.</li>
                            <li style="margin-bottom: 0; padding-left: 1.5rem; position: relative;"><span style="position: absolute; left: 0; color: #28AFCF;">➤</span> <strong>Myth: Enhanced Is Easier:</strong> The ACT removed easier questions disproportionately, so don't assume it's gotten simpler.</li>
                        </ul>
                    </div>
                </div>

                <!-- Why We Recommend ACT -->
                <h2>💡 Why NYC STEM Club Recommends Starting with the ACT</h2>
                <div class="callout-box" style="margin-top: 1.5rem; margin-bottom: 0; padding: 2rem;">
                    <div class="feature-grid" style="margin: 0 0 2rem 0;">
                        <div class="feature-item">
                            <div class="icon">📝</div>
                            <h4>Straightforward Questions</h4>
                            <p>ACT asks what the passage directly states. SAT asks what it "implies" or "suggests"—making answers more subjective. If you prefer clear, concrete questions, the ACT is better.</p>
                        </div>
                        <div class="feature-item">
                            <div class="icon">⚖️</div>
                            <h4>Balanced Scoring</h4>
                            <p>Math is only 33% of your ACT score (1 of 3 sections). Strong English and Reading can offset weaker math. SAT weights math at 50%, making it harder to compensate.</p>
                        </div>
                        <div class="feature-item">
                            <div class="icon">📈</div>
                            <h4>Train at Higher Level</h4>
                            <p>ACT covers advanced math (trigonometry, logarithms, matrices). Master these for the ACT, and SAT math (only up to Algebra 2) becomes much easier. This flexibility lets you pivot to SAT later without learning new content.</p>
                        </div>
                        <div class="feature-item">
                            <div class="icon">🔬</div>
                            <h4>Science = Optional</h4>
                            <p>The Science section tests chart and graph reading, not science facts. It's a learnable skill. Plus, it's now optional—take it only if it helps your score.</p>
                        </div>
                    </div>

                    <h3 style="color: #134958; font-size: 1.4rem; margin-bottom: 1rem;">🔄 The Strategic Advantage: Easy Pivot to SAT</h3>
                    <p style="font-size: 1.05rem;">Starting with the ACT gives you <strong>maximum flexibility</strong>. Since the ACT covers more advanced content (including Algebra 2, trigonometry, and logarithms), students who prepare for the ACT can easily pivot to the SAT with just a few practice exams to familiarize themselves with the format—no new content to learn.</p>
                    <p style="font-size: 1.05rem;"><strong>Going the other way is much harder.</strong> If you start with the SAT and later want to try the ACT, you'll need to learn new mathematical content during an already stressful junior year. This adds unnecessary pressure when college applications, APs, and extracurriculars are competing for your time.</p>
                    <p style="font-size: 1.05rem; margin-bottom: 0;"><strong>Bottom line:</strong> Train at the higher level (ACT), keep your options open, and pivot to SAT if needed—without the stress of learning new material.</p>
                </div>

                <!-- FAQ Section -->
                <h2>❓ Common Questions</h2>
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
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Do colleges prefer one test over the other?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>No. All U.S. colleges accept both SAT and ACT equally. There's no admissions advantage to either test. Choose based on which test format suits your strengths better.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Can I take both tests?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>Yes. Some students do take both and submit the higher score, but most take diagnostic tests at the beginning and focus their prep on the one they perform better on.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">How do I know which test is right for me?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>Take full-length practice tests for both under timed conditions. Compare your scores and which test felt more comfortable. We offer <strong>free diagnostic testing and consultation</strong> to help you decide.</p>
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
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">What if I'm stronger in math?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>If math is your superpower and you want it to count for more, the SAT's 50% math weighting works in your favor. However, we see many strong math students actually prefer the ACT—here's why: Since they don't need to focus heavily on the math component (it's straightforward for them), they can dedicate their prep time to English (reading and grammar). If they're also strong in English, their prep becomes much shorter—just practicing with different test papers and getting comfortable with the timing. The ACT's balanced scoring means math excellence still helps significantly while requiring less focused study.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">Is the ACT Science section hard?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>The Science section doesn't test memorized facts—it tests reading charts and graphs, which is a highly learnable skill. Plus, it's now optional! Most students improve their Science scores significantly with proper prep.</p>
                        </div>
                    </div>
                    <div class="faq-card">
                        <button class="faq-header" onclick="toggleFAQ(this)">
                            <h3 class="faq-question" role="button" aria-expanded="false" tabindex="0">My peers and seniors tell me to wait until spring of junior year. Should I?</h3>
                            <div class="faq-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <p>That advice is valid <strong>if you're not in Algebra 2 during sophomore year</strong>. However, if you <strong>are</strong> taking Algebra 2 in sophomore year, starting ACT prep then creates a double win: the training helps with both your ACT preparation <strong>and</strong> your school grades. You're learning the same concepts simultaneously, reinforcing each other. In fact, the majority of our students achieve a 34+ before entering junior year, giving them one less thing to stress about during their busiest academic year.</p>
                        </div>
                    </div>
                </div>

                <!-- The Bottom Line -->
                <h2>🎯 The Bottom Line</h2>
                <div class="bottom-line">
                    <div class="bottom-line-intro">
                        <p>
                            The question isn't <em>"Which test is better?"</em><br>
                            It's <strong style="color: #28AFCF;">"Which test is better for YOU?"</strong>
                        </p>
                    </div>
                    <div class="bottom-line-box">
                        <h4>
                            <span style="font-size: 1.5rem;">🎯</span> Our 4-Step Process
                        </h4>
                        <ol class="process-steps">
                            <li>Take diagnostic practice tests for both SAT and ACT</li>
                            <li>Compare your performance and comfort level</li>
                            <li>Choose the test where you can reach your target score fastest</li>
                            <li>Focus your prep on that test (optionally take both)</li>
                        </ol>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="cta-section">
                    <h2>Ready to Find Your Best Test?</h2>
                    <p>We offer <strong>free diagnostic testing and consultation</strong> to help you choose the right test and create a personalized prep plan.</p>
                    <div class="cta-buttons">
                        <a href="/student-enrollment/" class="cta-button primary">Inquire Now</a>
                        <a href="/courses/sat-act-prep-course/" class="cta-button secondary">View SAT/ACT Prep Program</a>
                    </div>
                </div>

                <!-- Testimonials Section -->
                <section class="nyc-testimonials-section">
                    <div class="nyc-testimonials-container">
                        <h2 class="nyc-testimonials-title">What Our Students & Parents Say</h2>
                        <div class="nyc-testimonials-content">
                            <?php
                            $reviews_shortcode = get_option('nyc_stem_reviews_shortcode', '[trustindex data-widget-id=d7ccd5b21eb1294a9186eebe1e6]');
                            echo do_shortcode($reviews_shortcode);
                            ?>
                        </div>
                    </div>
                </section>

            </div>
        </article>
    </main>
</div>

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

<?php
get_footer();
